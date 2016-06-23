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
			$name = $this->getRequest()->getVal( 'extdist_name' );
			$version = $this->getRequest()->getVal( 'extdist_version' );
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
		// extdist-choose-extensions, extdist-choose-skins
		$out->addHTML( '<div id="mw-extdist-container"><div id="mw-extdist-form">' );
		$out->addWikiMsg( $this->msgKey( 'extdist-choose-$TYPE' ) );
		$out->addHTML(
			Xml::openElement( 'form', array(
				'action' => $this->getPageTitle()->getLocalUrl(),
				'method' => 'GET' ) )
		);
		$items = array( array( 'data' => '' ) );

		natcasesort( $repos );
		foreach ( $repos as $name ) {
			$items[] = array( 'data' => $name );
		}
		// Add JS infuse magic
		$out->addModules( 'ext.extensiondistributor.special' );
		$out->addModuleStyles( 'ext.extensiondistributor.special.styles' );
		$out->addJsConfigVars( array(
			'wgExtDistSnapshotRefs' => $wgExtDistSnapshotRefs,
			'wgExtDistDefaultSnapshot' => $wgExtDistDefaultSnapshot,
			'wgExtDistCandidateSnapshot' => $wgExtDistCandidateSnapshot,
		) );
		$out->addHTML(
			new OOUI\DropdownInputWidget( array(
				'id' => 'mw-extdist-selector',
				'infusable' => true,
				'options' => $items,
				'name' => 'extdist_name',
			) ) .
			// noscript because JS triggers on selector
			Html::rawElement( 'noscript', array(), new OOUI\ButtonInputWidget( array(
				'id' => 'mw-extdist-ext-submit',
				'infusable' => true,
				'name' => 'extdist_submit',
				'label' => $this->msg( 'extdist-submit-extension' )->text(),
				'type' => 'submit',
				'flags' => array( 'primary', 'progressive' ),
			) ) ) .
			Xml::closeElement( 'form' ) . "\n" .
			Html::element( 'div', array( 'id' => 'mw-extdist-continue' ) ) .
			"</div>"
		);

		$popularList = $this->getPopularList();
		if ( !$popularList ) {
			// Close the container div
			$out->addHTML( '</div>' );
			return;
		}

		$out->addHTML(
			'<div id="mw-extdist-popular">' .
			$this->msg( $this->msgKey( 'extdist-popular-$TYPE' ) )
				->numParams( count( $popularList ) )
				->escaped() .
			"\n<ol>"
		);
		foreach ( $popularList as $popularItem ) {
			$link = Linker::link(
				$this->getPageTitle( $popularItem ),
				htmlspecialchars( $popularItem ),
				array(
					'data-name' => $popularItem,
					'class' => 'mw-extdist-plinks',
				)
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
			Xml::openElement( 'form', array(
				'action' => $this->getPageTitle()->getLocalUrl(),
				'method' => 'GET' ) ) .
			Html::hidden( 'extdist_name', $repoName );
		$options = array();
		$selected = 0;

		foreach ( $wgExtDistSnapshotRefs as $branchName ) {
			if ( $this->getProvider()->hasBranch( $repoName, $branchName ) ) {
				$branchDesc = $this->formatBranch( $branchName );
				$options[] = array( 'data' => $branchName, 'label' => $branchDesc );
				$selected++;
			}
		}
		if ( $selected !== 0 ) {
			$out->addHTML( $html );
			$out->enableOOUI();
			$out->addHTML(
				new OOUI\DropdownInputWidget( array(
					'id' => 'mw-extdist-selector-version',
					'infusable' => true,
					'options' => $options,
					'value' => $wgExtDistDefaultSnapshot,
					'name' => 'extdist_version',
				) ) .
				new OOUI\ButtonInputWidget( array(
					'name' => 'extdist_submit',
					'label' => $this->msg( 'extdist-submit-version' )->text(),
					'type' => 'submit',
					'flags' => array( 'primary', 'progressive' ),
				) ) .
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
		if ( $pageTitle->isKnown() ) {
			$this->getOutput()->addHTML(
				Xml::openElement( 'p' ) .
				Linker::link(
					$pageTitle,
					// extdist-goto-extensions-page, extdist-goto-skins-page
					$this->msg( $this->msgKey( 'extdist-goto-$TYPE-page' ), $extension )->plain()
				) .
				Xml::closeElement( 'p' ) . "\n"
			);
		}

		$this->getOutput()->addHTML(
			Xml::openElement( 'p', array( 'style' => 'font-size:150%' ) ) .
			Linker::link( $this->getPageTitle(),
				Xml::element( 'img', array( 'src' => $downloadImg ) ) .
				// extdist-want-more-extensions, extdist-want-more-skins
				$this->msg( $this->msgKey( 'extdist-want-more-$TYPE' ) )->escaped() ) .
			Xml::closeElement( 'p' ) . "\n"
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
