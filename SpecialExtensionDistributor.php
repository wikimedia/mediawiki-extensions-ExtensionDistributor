<?php

/**
 * Special page that allows users to download extensions as tar archives.
 *
 * @author Tim Starling
 */
class SpecialExtensionDistributor extends SpecialPage {

	/**
	 * @var ExtDistProvider
	 */
	private $provider;

	public function __construct() {
		parent::__construct( 'ExtensionDistributor' );
	}

	/**
	 * @param $subpage string
	 */
	public function execute( $subpage ) {
		global $wgExtDistListFile, $wgExtDistArchiveAPI;

		$this->setHeaders();

		if ( !$wgExtDistListFile || !$wgExtDistArchiveAPI ) {
			$this->getOutput()->addWikiMsg( 'extdist-not-configured' );
			return;
		}

		if ( $subpage ) {
			$parts = explode( '/', $subpage, 2 );

			if ( count( $parts ) == 1 ) {
				$parts[] = false;
			}

			list( $extension, $version ) = $parts;
		} else {
			$extension = $this->getRequest()->getVal( 'extdist_extension' );
			$version = $this->getRequest()->getVal( 'extdist_version' );
		}

		if ( !$extension ) {
			$this->showExtensionSelector();
			return;
		}

		if ( !in_array( $extension, $this->getExtensionList() ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-such-extension', $extension );
			$this->showExtensionSelector();
			return;
		}

		if ( !$version ) {
			$this->showVersionSelector( $extension );
			return;
		}

		if ( !$this->getProvider()->hasExtBranch( $extension, $version ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-such-version', $extension, $version );
			return;
		}

		$this->doDownload( $extension, $version );
	}

	/**
	 * @return array
	 */
	protected function getExtensionList() {
		global $wgExtDistListFile, $wgMemc;

		$extList = $wgMemc->get( 'extdist-list' );
		if( !$extList ) {
			$extList = array();
			$res = Http::get( $wgExtDistListFile );
			if( $res ) {
				$extList = array_filter( array_map( 'trim', explode( "\n", $res ) ) );
				$wgMemc->set( 'extdist-list', $extList, 3600 );
			}
		}
		return $extList;
	}

	protected function showExtensionSelector() {
		$extensions = $this->getExtensionList();

		if ( !$extensions ) {
			$this->getOutput()->addWikiMsg( 'extdist-list-missing' );
			return;
		}

		$out = $this->getOutput();
		$out->addWikiMsg( 'extdist-choose-extension' );
		$out->addHTML(
			Xml::openElement( 'form', array(
				'action' => $this->getPageTitle()->getLocalUrl(),
				'method' => 'GET' ) ) .
			Xml::openElement( 'select', array(
				'name' => 'extdist_extension' ) ) .
			Xml::element( 'option', array(
				'value' => '' ) )
		);

		foreach ( $extensions as $extension ) {
			$out->addHTML( Xml::element( 'option', array( 'value' => $extension ), $extension ) . "\n" );
		}

		$out->addHTML(
			Xml::closeElement( 'select' ) . ' ' .
			Xml::submitButton(
				$this->msg( 'extdist-submit-extension' )->text(),
				array( 'name' => 'extdist_submit' )
			) .
			Xml::closeElement( 'form' ) . "\n"
		);
	}

	/**
	 * @param $extensionName string
	 * @return mixed
	 */
	protected function showVersionSelector( $extensionName ) {
		global $wgExtDistSnapshotRefs;

		if ( !$wgExtDistSnapshotRefs ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-versions', $extensionName );
			$this->showExtensionSelector();
			return;
		}

		$out = $this->getOutput();
		$out->addWikiMsg( 'extdist-choose-version', $extensionName );
		$html =
			Xml::openElement( 'form', array(
				'action' => $this->getPageTitle()->getLocalUrl(),
				'method' => 'GET' ) ) .
			Xml::element( 'input' , array(
				'type' => 'hidden',
				'name' => 'extdist_extension',
				'value' => $extensionName ) ) .
			Xml::openElement( 'select', array(
				'name' => 'extdist_version' ) );

		$selected = 0;

		foreach ( $wgExtDistSnapshotRefs as $branchName ) {
			if ( $this->getProvider()->hasExtBranch( $extensionName, $branchName ) ) {
				$branchMsg = $this->msg( "extdist-branch-$branchName" );
				$branchDesc = $branchMsg->isDisabled() ? $branchName : $branchMsg->plain();
				$html .= Xml::option( $branchDesc, $branchName, ($selected == 1) );
				$selected++;
			}
		}
		if ( $selected !== 0 ) {
			$out->addHTML( $html );
			$out->addHTML(
				Xml::closeElement( 'select' ) . ' ' .
				Xml::submitButton(
					$this->msg( 'extdist-submit-version' )->text(),
					array( 'name' => 'extdist_submit' )
				) .
				Xml::closeElement( 'form' ) . "\n"
			);
		} else {
			wfDebugLog( 'ExtensionDistributor', "Couldn't find any branches for \"{$extensionName}\"" );
			$out->wrapWikiMsg( '<div class="error">$1</div>', 'extdist-no-branches' );
		}

	}

	/**
	 * @param $extension string
	 * @param $version string
	 */
	protected function doDownload( $extension, $version ) {
		global $wgExtensionAssetsPath;

		if( !$this->getProvider()->hasExtBranch( $extension, $version ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-tar-error' );
			return;
		}

		// Show a message
		$sha1 = $this->getProvider()->getExtBranchSha( $extension, $version );
		$url = $this->getProvider()->getTarballLocation( $extension, $version );
		$fileName = $this->getProvider()->getExpectedTarballName( $extension, $version );
		$downloadImg = "$wgExtensionAssetsPath/ExtensionDistributor/download.png";
		$this->getOutput()->addWikiMsg( 'extdist-created', $extension, $sha1,
			$version, $url, $fileName );
		$this->getOutput()->addHTML(
			Xml::openElement( 'p', array( 'style' => 'font-size:150%' ) ) .
			Linker::link( $this->getPageTitle(),
				Xml::element( 'img', array( 'src' => $downloadImg ) ) .
				$this->msg( 'extdist-want-more' )->escaped() ) .
			Xml::closeElement( 'p' ) . "\n"
		);

		// Redirect to the file
		header( 'Refresh: 5;url=' . $url );
	}

	/**
	 * @throws MWException
	 * @return ExtDistProvider
	 */
	protected function getProvider() {
		if ( $this->provider === null ) {
			global $wgExtDistAPIConfig;
			if ( !is_array( $wgExtDistAPIConfig ) ) {
				throw new MWException('$wgExtDistAPIConfig not configured properly' );
			}
			$this->provider = ExtDistProvider::factory( $wgExtDistAPIConfig );
		}

		return $this->provider;
	}
}
