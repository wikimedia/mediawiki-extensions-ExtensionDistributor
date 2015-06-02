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
		global $wgExtDistSnapshotRefs, $wgExtDistDefaultSnapshot;
		$repos = $this->getProvider()->getRepositoryList();

		if ( !$repos ) {
			// extdist-list-missing-extensions, extdist-list-missing-skins
			$this->getOutput()->addWikiMsg( $this->msgKey( 'extdist-list-missing-$TYPE' ) );
			return;
		}

		$out = $this->getOutput();
		$out->enableOOUI();
		// extdist-choose-extensions, extdist-choose-skins
		$out->addWikiMsg( $this->msgKey( 'extdist-choose-$TYPE' ) );
		$out->addHTML(
			Xml::openElement( 'form', array(
				'action' => $this->getPageTitle()->getLocalUrl(),
				'method' => 'GET' ) )
		);
		$items = array( array( 'data' => '' ) );

		foreach ( $repos as $name ) {
			$items[] = array( 'data' => $name );
		}
		// Add JS infuse magic
		$out->addModules( 'ext.extensiondistributor.special' );
		$out->addJsConfigVars( array(
			'wgExtDistSnapshotRefs' => $wgExtDistSnapshotRefs,
			'wgExtDistDefaultSnapshot' => $wgExtDistDefaultSnapshot
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
			Html::element( 'div', array( 'id' => 'mw-extdist-continue' ) )
		);
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
				$branchMsg = $this->msg( "extdist-branch-$branchName" );
				$branchDesc = $branchMsg->isDisabled() ? $branchName : $branchMsg->plain();
				$options[] = array( 'data' => $branchName, 'label' => $branchDesc );
				$selected++;
			}
		}
		if ( $selected !== 0 ) {
			$out->addHTML( $html );
			// Add JS infuse magic
			$out->addModules( 'ext.extensiondistributor.special.infuse' );
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
		$this->getOutput()->addHTML(
			Xml::openElement( 'p', array( 'style' => 'font-size:150%' ) ) .
			Linker::link( $this->getPageTitle(),
				Xml::element( 'img', array( 'src' => $downloadImg ) ) .
				// extdist-want-more-extensions, extdist-want-more-skins
				$this->msg( $this->msgKey( 'extdist-want-more-$TYPE' ) )->escaped() ) .
			Xml::closeElement( 'p' ) . "\n"
		);

		$this->doEventLogging( $extension, $version );

		// Redirect to the file
		header( 'Refresh: 5;url=' . $url );
	}

	/**
	 * If enabled, log the download to EventLogging
	 *
	 * @param string $repo
	 * @param string $version
	 */
	protected function doEventLogging( $repo, $version ) {
		global $wgExtDistUseEventLogging;
		if ( !$wgExtDistUseEventLogging || !class_exists( 'EventLogging' ) ) {
			return;
		}

		EventLogging::logEvent( 'ExtDistDownloads', 12369387, array(
			'name' => $repo,
			'version' => $version,
			'type' => $this->type,
		) );
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
}
