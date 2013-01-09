<?php

/**
 * Special page that allows users to download extensions as tar archives.
 *
 * @author Tim Starling
 */
class SpecialExtensionDistributor extends SpecialPage {
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

		if ( !$this->fetchArchiveInfo( $extension, $version ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-such-version', $extension, $version );
			return;
		}

		$this->doDownload( $extension, $version );
	}

	/**
	 * @return array
	 */
	protected function getExtensionList() {
		global $wgExtDistListFile, $wgExtDistProxy, $wgMemc;

		$extList = $wgMemc->get( 'extdist-list' );
		if( !$extList ) {
			$extList = array();
			$httpOptions = $wgExtDistProxy ?
				array( 'proxy' => $wgExtDistProxy ) : array();
			$res = Http::get( $wgExtDistListFile, $httpOptions );
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
				'action' => $this->getTitle()->getLocalUrl(),
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
		global $wgExtDistBranches;

		if ( !$wgExtDistBranches ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-versions', $extensionName );
			$this->showExtensionSelector();
			return;
		}

		$out = $this->getOutput();
		$out->wrapWikiMsg(
			"<h2>\n$1\n</h2>",
			array( 'extdist-choose-version', $extensionName )
		);
		$out->addHTML(
			Xml::openElement( 'form', array(
				'action' => $this->getTitle()->getLocalUrl(),
				'method' => 'GET' ) ) .
			Xml::element( 'input' , array(
				'type' => 'hidden',
				'name' => 'extdist_extension',
				'value' => $extensionName ) ) .
			Xml::openElement( 'select', array(
				'name' => 'extdist_version' ) )
		);

		$selected = 0;

		foreach ( $wgExtDistBranches as $branchName ) {
			$info = $this->fetchArchiveInfo( $extensionName, $branchName );
			if( $info ) {
				$branchMsg = $this->msg( "extdist-branch-$branchName" );
				$branchDesc = $branchMsg->isDisabled() ? $branchName : $branchMsg->plain();
				$out->addHTML( Xml::option( $branchDesc, $branchName, ($selected == 1) ) );
				$selected++;
			}
		}

		$out->addHTML(
			Xml::closeElement( 'select' ) . ' ' .
			Xml::submitButton(
				$this->msg( 'extdist-submit-version' )->text(),
				array( 'name' => 'extdist_submit' )
			) .
			Xml::closeElement( 'form' ) . "\n"
		);
	}

	/**
	 * @param $extension string
	 * @param $version string
	 */
	protected function doDownload( $extension, $version ) {
		global $wgExtensionAssetsPath;
		$info = $this->fetchArchiveInfo( $extension, $version );

		if( !$info ) {
			$this->getOutput()->addWikiMsg( 'extdist-tar-error' );
			return;
		}

		// Show a message
		$downloadImg = "$wgExtensionAssetsPath/ExtensionDistributor/download.png";
		$this->getOutput()->addWikiMsg( 'extdist-created', $extension, $info['sha1'],
			$version, $info['url'], $info['archive'] );
		$this->getOutput()->addHTML(
			Xml::openElement( 'p', array( 'style' => 'font-size:150%' ) ) .
			Linker::link( $this->getTitle(),
				Xml::element( 'img', array( 'src' => $downloadImg ) ) .
				$this->msg( 'extdist-want-more' )->escaped() ) .
			Xml::closeElement( 'p' ) . "\n"
		);

		// Redirect to the file
		header( 'Refresh: 5;url=' . $info['url'] );
	}

	/**
	 * Fetch information about the file we'd like to download
	 *
	 * @param $extension string
	 * @param $version string
	 * @return array|false
	 */
	protected function fetchArchiveInfo( $extension, $version ) {
		global $wgExtDistArchiveAPI, $wgExtDistProxy, $wgMemc;

		$key = "extdist-ext-$extension-$version";
		$archiveInfo = $wgMemc->get( $key );
		$httpOptions = array( 'followRedirects' => false );
		if( $wgExtDistProxy ) {
			$httpOptions['proxy'] = $wgExtDistProxy;
		}
		if( !$archiveInfo ) {
			$url = str_replace(
				array( '$EXT', '$REF' ),
				array( rawurlencode( $extension ), rawurlencode( $version ) ),
				$wgExtDistArchiveAPI
			);

			$req = MWHttpRequest::factory( $url, $httpOptions );
			$res = $req->execute();
			$headers = $req->getResponseHeaders();
			if( !$res->isOK() || !isset( $headers['location'][0] ) ) {
				$archiveInfo = false;
			} else {
				$url = $headers['location'][0];
				$req = MWHttpRequest::factory( $url, $httpOptions );
				$res = $req->execute();
				$headers = $req->getResponseHeaders();
				if( !$res->isOK() || !isset( $headers['content-disposition'][0] ) ) {
					$archiveInfo = false;
				} else {
					$tarName = str_replace( "attachment; filename=", "", $headers['content-disposition'][0] );
					$sha1 = substr( $tarName, strrpos( $tarName, "-" ) + 1, 7 );
					$archiveInfo = array(
						'url' => $url,
						'archive' => $tarName,
						'sha1' => $sha1
					);
					$cacheLength = $version == 'master' ? 3600 : 3600 * 24 * 7;
					$wgMemc->set( $key, $archiveInfo, $cacheLength );
				}
			}
		}
		return $archiveInfo;
	}
}
