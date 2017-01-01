<?php

use MediaWiki\Logger\LoggerFactory;

/**
 * Base class for special pages that allow users to download repository snapshots
 *
 * @author Tim Starling
 */
abstract class SpecialBaseDistributor extends SpecialPage {

	/**
	 * @var string either "extensions" or "skins"
	 */
	protected $type;

	/**
	 * @var Psr\Log\LoggerInterface
	 */
	protected $logger;

	/**
	 * @var ExtDistProvider
	 */
	protected $provider;

	/**
	 * Substitute $TYPE in a message key
	 *
	 * @param $key
	 * @return mixed
	 */
	protected function msgKey( $key ) {
		return str_replace( '$TYPE', $this->type, $key );
	}

	/**
	 * @param $subpage string
	 */
	public function execute( $subpage ) {
		global $wgExtDistAPIConfig;

		$this->setHeaders();
		$this->logger = LoggerFactory::getInstance( 'ExtensionDistributor' );

		if ( !$wgExtDistAPIConfig ) {
			$this->getOutput()->addWikiMsg( 'extdist-not-configured' );
			return;
		}
		if ( $subpage ) {
			$parts = explode( '/', $subpage, 2 );

			if ( count( $parts ) == 1 ) {
				$parts[] = false;
			}

			list( $name, $version ) = $parts;
		} else {
			$name = $this->getRequest()->getVal( 'extdistname' );
			$version = $this->getRequest()->getVal( 'extdistversion' );
		}

		if ( !$name ) {
			$this->showExtensionSelector();
			return;
		}

		if ( !in_array( $name, $this->getProvider()->getRepositoryList() ) ) {
			// extdist-no-such-extensions, extdist-no-such-skins
			$this->getOutput()->addWikiMsg( $this->msgKey( 'extdist-no-such-$TYPE' ), $name );
			$this->showExtensionSelector();
			return;
		}

		if ( !$version ) {
			$this->showVersionSelector( $name );
			return;
		}

		if ( !$this->getProvider()->hasBranch( $name, $version ) ) {
			// extdist-no-such-version-extensions, extdist-no-such-version-skins
			$this->getOutput()->addWikiMsg( $this->msgKey( 'extdist-no-such-version-$TYPE' ), $name, $version );
			return;
		}

		$this->doDownload( $name, $version );
	}

	protected function showExtensionSelector() {
		global $wgExtDistSnapshotRefs, $wgExtDistDefaultSnapshot, $wgExtDistCandidateSnapshot;
		$repos = $this->getProvider()->getRepositoryList();

		if ( !$repos ) {
			// extdist-list-missing-extensions, extdist-list-missing-skins
			$this->getOutput()->addWikiMsg( $this->msgKey( 'extdist-list-missing-$TYPE' ) );
			return;
		}

		$out = $this->getOutput();
		$out->enableOOUI();
		$out->addHTML( '<div class="mw-extdist-container"><div class="mw-extdist-form">' );
		// extdist-choose-extensions, extdist-choose-skins
		$out->addWikiMsg( $this->msgKey( 'extdist-choose-$TYPE' ) );
		$out->addHTML(
			Xml::openElement( 'form', [
				'action' => $this->getPageTitle()->getLocalUrl(),
				'method' => 'GET' ] )
		);
		$items = [ [ 'data' => '' ] ];

		natcasesort( $repos );
		foreach ( $repos as $name ) {
			$items[] = [ 'data' => $name ];
		}
		// Add JS infuse magic
		$out->addModules( 'ext.extensiondistributor.special' );
		$out->addModuleStyles( 'ext.extensiondistributor.special.styles' );
		$out->addJsConfigVars( [
			'wgExtDistSnapshotRefs' => $wgExtDistSnapshotRefs,
			'wgExtDistDefaultSnapshot' => $wgExtDistDefaultSnapshot,
			'wgExtDistCandidateSnapshot' => $wgExtDistCandidateSnapshot,
		] );
		$out->addHTML(
			new OOUI\DropdownInputWidget( [
				'classes' => [ 'mw-extdist-selector' ],
				'infusable' => true,
				'options' => $items,
				'name' => 'extdistname',
			] ) .
			// only shown to no-JS users via CSS
			new OOUI\ButtonInputWidget( [
				'classes' => [ 'mw-extdist-ext-submit' ],
				'infusable' => true,
				'label' => $this->msg( 'extdist-submit-extension' )->text(),
				'type' => 'submit',
				'flags' => [ 'primary', 'progressive' ],
			] ) .
			Xml::closeElement( 'form' ) . "\n" .
			Html::element( 'div', [ 'class' => 'mw-extdist-continue' ] ) .
			"</div>"
		);

		$popularList = $this->getPopularList();
		if ( !$popularList ) {
			// Close the container div
			$out->addHTML( '</div>' );
			return;
		}

		$out->addHTML(
			'<div class="mw-extdist-popular">' .
			$this->msg( $this->msgKey( 'extdist-popular-$TYPE' ) )
				->numParams( count( $popularList ) )
				->escaped() .
			"\n<ol>"
		);
		$linkRenderer = $this->getLinkRenderer();
		foreach ( $popularList as $popularItem ) {
			$link = $linkRenderer->makeLink(
				$this->getPageTitle( $popularItem ),
				$popularItem,
				[
					'data-name' => $popularItem,
					'class' => 'mw-extdist-plinks',
				]
			);
			$out->addHTML( "<li>$link</li>\n" );
		}
		$out->addHTML( '</ol>' );
		// Closes popular and container
		$out->addHTML( '</div></div>' );
	}

	/**
	 * @param string $version
	 * @return string
	 */
	protected function formatVersion( $version ) {
		if ( strpos( $version, 'REL' ) === 0 ) {
			// Strip "REL" prefix, and convert _ to .
			return str_replace( '_', '.', substr( $version, 3 ) );
		} else {
			// Don't touch it
			return $version;
		}

	}

	/**
	 * @note Keep this in-sync with the JavaScript version
	 * @param string $branch Branch name
	 * @return string formatted text
	 */
	protected function formatBranch( $branch ) {
		global $wgExtDistDefaultSnapshot, $wgExtDistCandidateSnapshot;

		$version = $this->formatVersion( $branch );
		if ( $branch === 'master' ) {
			// Special case
			return $this->msg( 'extdist-branch-alpha' )->text();
		} elseif ( $branch === $wgExtDistDefaultSnapshot ) {
			return $this->msg( 'extdist-branch-stable' )->params( $version )->text();
		} elseif ( $branch === $wgExtDistCandidateSnapshot ) {
			return $this->msg( 'extdist-branch-candidate' )->params( $version )->text();
		} else {
			// Don't touch it
			return $version;
		}
	}

	/**
	 * @param $repoName string
	 * @return mixed
	 */
	protected function showVersionSelector( $repoName ) {
		global $wgExtDistSnapshotRefs, $wgExtDistDefaultSnapshot;

		if ( !$wgExtDistSnapshotRefs ) {
			// extdist-no-versions-extensions, extdist-no-versions-skins
			$this->getOutput()->addWikiMsg( $this->msgKey( 'extdist-no-versions-$TYPE' ), $repoName );
			$this->showExtensionSelector();
			return;
		}

		$out = $this->getOutput();
		// extdist-choose-version-extensions, extdist-choose-version-skins
		$out->addWikiMsg( $this->msgKey( 'extdist-choose-version-$TYPE' ), $repoName );
		$html =
			Xml::openElement( 'form', [
				'action' => $this->getPageTitle()->getLocalURL(),
				'method' => 'GET' ] ) .
			Html::hidden( 'extdistname', $repoName );
		$options = [];
		$selected = 0;

		foreach ( $wgExtDistSnapshotRefs as $branchName ) {
			if ( $this->getProvider()->hasBranch( $repoName, $branchName ) ) {
				$branchDesc = $this->formatBranch( $branchName );
				$options[] = [ 'data' => $branchName, 'label' => $branchDesc ];
				$selected++;
			}
		}
		if ( $selected !== 0 ) {
			$out->addHTML( $html );
			$out->enableOOUI();
			$out->addHTML(
				new OOUI\ActionFieldLayout(
					new OOUI\DropdownInputWidget( [
						'id' => 'mw-extdist-selector-version',
						'infusable' => true,
						'options' => $options,
						'value' => $wgExtDistDefaultSnapshot,
						'name' => 'extdistversion',
					] ),
					new OOUI\ButtonInputWidget( [
						'label' => $this->msg( 'extdist-submit-version' )->text(),
						'type' => 'submit',
						'flags' => [ 'primary', 'progressive' ],
					] ),
					[
						'align' => 'top'
					]
				) .
				Xml::closeElement( 'form' ) . "\n"
			);
		} else {
			$this->logger->warning( "Couldn't find any branches for \"{$repoName}\"" );
			$out->wrapWikiMsg( '<div class="error">$1</div>', 'extdist-no-branches' );
		}

	}

	/**
	 * @param $extension string
	 * @param $version string
	 */
	protected function doDownload( $extension, $version ) {
		global $wgExtensionAssetsPath;

		if( !$this->getProvider()->hasBranch( $extension, $version ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-tar-error' );
			return;
		}

		// Show a message
		$sha1 = $this->getProvider()->getBranchSha( $extension, $version );
		$url = $this->getProvider()->getTarballLocation( $extension, $version );
		$fileName = $this->getProvider()->getExpectedTarballName( $extension, $version );
		$downloadImg = "$wgExtensionAssetsPath/ExtensionDistributor/download.png";
		// extdist-created-extensions, extdist-created-skins
		$this->getOutput()->addWikiMsg( $this->msgKey( 'extdist-created-$TYPE' ), $extension, $sha1,
			$version, $url, $fileName );

		// Add link to the extension/skin's page
		$pageTitle = Title::newFromText(
			( $this->type === ExtDistProvider::EXTENSIONS ? 'Extension:' : 'Skin:' ) . $extension
		);
		$linkRenderer = $this->getLinkRenderer();
		if ( $pageTitle->isKnown() ) {
			$this->getOutput()->addHTML(
				Xml::openElement( 'p' ) .
				$linkRenderer->makeKnownLink(
					$pageTitle,
					// extdist-goto-extensions-page, extdist-goto-skins-page
					new HtmlArmor(
						$this
							->msg( $this->msgKey( 'extdist-goto-$TYPE-page' ), $extension )
							->parse()
					)
				) .
				Xml::closeElement( 'p' ) . "\n"
			);
		}

		$this->getOutput()->addHTML(
			Xml::openElement( 'p', [ 'style' => 'font-size:150%' ] ) .
			$linkRenderer->makeLink(
				$this->getPageTitle(),
				new HtmlArmor(
					Xml::element( 'img', [ 'src' => $downloadImg ] ) .
					// extdist-want-more-extensions, extdist-want-more-skins
					$this->msg( $this->msgKey( 'extdist-want-more-$TYPE' ) )->escaped()
				)
			) . Xml::closeElement( 'p' ) . "\n"
		);

		$this->doStats( $extension, $version );

		// Redirect to the file
		header( 'Refresh: 5;url=' . $url );
	}

	/**
	 * Record some download metrics
	 *
	 * @param string $repo
	 * @param string $version
	 */
	protected function doStats( $repo, $version ) {
		$stats = $this->getContext()->getStats();
		// Overall repo downloads
		$stats->increment( "extdist.{$this->type}.$repo" );
		// Repo split by version
		$stats->increment( "extdist.{$this->type}.$repo.$version" );
		// MediaWiki core version adoption
		$stats->increment( "extdist.$version" );
	}

	/**
	 * @return ExtDistProvider
	 */
	protected function getProvider() {
		if ( !$this->provider ) {
			$this->provider = ExtDistProvider::getProviderFor( $this->type );
			$this->provider->setLogger( $this->logger );
		}
		return $this->provider;
	}

	protected function getGroupName() {
		return 'developer';
	}

	/**
	 * Get the list of popular items for this special page,
	 * or false if none are configured
	 *
	 * @return string[]|bool
	 */
	protected function getPopularList() {
		return $this->getGraphiteStats()->getPopularList( $this->type );
	}

	/**
	 * @return ExtDistGraphiteStats
	 */
	protected function getGraphiteStats() {
		$stats = new ExtDistGraphiteStats();
		$stats->setLogger( $this->logger );
		return $stats;
	}

}
