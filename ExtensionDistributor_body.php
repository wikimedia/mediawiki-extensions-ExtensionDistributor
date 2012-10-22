<?php

/**
 * Special page that allows users to download extensions as tar archives.
 *
 * @author Tim Starling
 */
class ExtensionDistributorPage extends SpecialPage {
	protected $extensionList; // cached list of extensions

	public function __construct() {
		parent::__construct( 'ExtensionDistributor' );
	}

	/**
	 * @param $subpage string
	 */
	public function execute( $subpage ) {
		global $wgExtDistTarDir, $wgExtDistWorkingCopy;

		$this->setHeaders();

		if ( !$wgExtDistTarDir || !$wgExtDistWorkingCopy ) {
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

		$extensions = $this->getExtensionList();
		if ( !in_array( $extension, $extensions['trunk'] ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-such-extension', $extension );
			$this->showExtensionSelector();
			return;
		}

		if ( !$version ) {
			$this->showVersionSelector( $extension );
			return;
		}

		if ( !isset( $extensions[$version] ) || !in_array( $extension, $extensions[$version] ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-such-version', $extension, $version );
			return;
		}

		$this->doDownload( $extension, $version );
	}

	/**
	 * @return bool
	 */
	protected function getExtensionList() {
		global $wgExtDistWorkingCopy, $wgExtDistBranches;

		if ( isset( $this->extensionList ) ) {
			return $this->extensionList;
		}

		$this->extensionList = array();

		foreach ( $wgExtDistBranches as $branchPath => $branch ) {
			$wc = "$wgExtDistWorkingCopy/$branchPath/extensions";
			$dir = opendir( $wc );

			if ( !$dir ) {
				return false;
			}

			$this->extensionList[$branchPath] = array();

			while ( false !== ( $file = readdir( $dir ) ) ) {
				if ( substr( $file, 0, 1 ) == '.' ) {
					continue;
				}

				if ( !is_dir( "$wc/$file" ) ) {
					continue;
				}

				if ( file_exists( "$wc/$file/NO-DIST" ) ) {
					continue;
				}

				$this->extensionList[$branchPath][] = $file;
			}

			natcasesort( $this->extensionList[$branchPath] );
		}

		return $this->extensionList;
	}

	/**
	 * @param $path string
	 * @return bool|String
	 */
	protected function getBranchName( $path ) {
		global $wgExtDistBranches;

		if ( !isset( $wgExtDistBranches[$path] ) ) {
			return false;
		}

		if ( isset( $wgExtDistBranches[$path]['msgName'] ) ) {
			return $this->msg( $wgExtDistBranches[$path]['msgName'] )->text();
		} else {
			return $wgExtDistBranches[$path]['name'];
		}
	}

	protected function showExtensionSelector() {
		$extensions = $this->getExtensionList();

		if ( $extensions === false ) {
			$this->getOutput()->addWikiMsg( 'extdist-wc-missing' );
			return;
		}

		if ( !isset( $extensions['trunk'] ) || !$extensions['trunk'] ) {
			$this->getOutput()->addWikiMsg( 'extdist-wc-empty' );
			return;
		}

		$out = $this->getOutput();
		$out->addWikiMsg( 'extdist-choose-extension' );
		$out->addHTML(
			Xml::openElement( 'form', array(
				'action' => $this->getTitle()->getLocalUrl(),
				'method' => 'GET' ) ) .
			"<select name=\"extdist_extension\">\n" .
			"<option value=''></option>\n"
		);

		foreach ( $extensions['trunk'] as $extension ) {
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

		$extensions = $this->getExtensionList();

		$versions = array();

		foreach ( $wgExtDistBranches as $branchPath => $branch ) {
			if ( !in_array( $extensionName, $extensions[$branchPath] ) ) {
				continue;
			}

			if ( isset( $branch['msgName'] ) ) {
				$branchName = $this->msg( $branch['msgName'] )->text();
			} else {
				$branchName = $branch['name'];
			}

			$versions[$branchPath] = $branchName;
		}

		if ( !$versions ) {
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
			Xml::element( 'input' , array( 'type' => 'hidden',
				'name' => 'extdist_extension', 'value' => $extensionName ) ) .
			"<select name=\"extdist_version\">\n" );

		$selected = 0;

		foreach ( $versions as $branchPath => $branchName ) {
			$out->addHTML( Xml::option( $branchName, $branchPath, ($selected == 1) ) );

			$selected++;
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
		global $wgExtDistWorkingCopy, $wgExtDistTarDir, $wgExtDistBranches,
			$wgExtDistTarUrl, $wgExtDistRemoteClient;

		$vcs = isset( $wgExtDistBranches[$version]['vcs'] ) ? $wgExtDistBranches[$version]['vcs'] : 'svn';
		if ( $wgExtDistRemoteClient ) {
			$rev = $this->updateAndGetRevisionRemote( $extension, $version, $vcs );
		} else {
			$rev = $this->updateAndGetRevisionLocal( $extension, $version, $vcs );
		}

		if ( $rev === false ) {
			// Error already displayed
			return;
		}

		// Determine tar name.
		$cleanName = str_replace( '/', '_', $extension );
		$versionName = $wgExtDistBranches[$version]['tarLabel'];
		$tarName = "$cleanName-$versionName-$rev.tar.gz";
		$tarFile = "$wgExtDistTarDir/$tarName";

		// Create the archive if it doesn't exist.
		if ( !file_exists( $tarFile ) ) {
			// Does the tar file need ExtensionFunctions.php?
			$dir = "$wgExtDistWorkingCopy/$version/extensions/$extension";
			$retval = - 1;
			$needEF = false;
			if ( file_exists( 'ExtensionFunctions.php' ) ) {
				$files = call_user_func_array( 'wfEscapeShellArg', glob( "$dir/*.php" ) );
				wfShellExec( "grep -q '\bExtensionFunctions' " . $files, $retval );
				$needEF = !$retval;
			}

			// Create the archive.
			$cmd = 'tar -czf ' . wfEscapeShellArg( $tarFile ) .
				' --exclude \'*/.svn*\'' .
				' -C ' . wfEscapeShellArg( "$wgExtDistWorkingCopy/$version/extensions" ) .
				' ' . wfEscapeShellArg( $extension ) .
				( $needEF ? ' ExtensionFunctions.php' : '' ) .
				' 2>&1';

			$retval = - 1;
			$result = wfShellExec( $cmd, $retval );

			if ( $retval ) {
				$this->getOutput()->addWikiMsg( 'extdist-tar-error', $retval );
				$this->getOutput()->addHTML( '<pre>' . htmlspecialchars( $result ) . '</pre>' );
				return;
			}
		}

		$url = wfExpandUrl( "$wgExtDistTarUrl/$tarName", PROTO_CURRENT );

		// Show a message
		$this->getOutput()->addWikiMsg( 'extdist-created', $extension, $rev,
			$this->getBranchName( $version ), $url, $tarName );
		$this->getOutput()->addHTML( '<p><br /><h2>' .
			'<a href="' . $this->getTitle()->escapeLocalUrl() . '">' .
				$this->msg( 'extdist-want-more' )->escaped() . '</a></h2></p>' );

		// Redirect to the file
		header( 'Refresh: 5;url=' . $url );
	}

	/**
	 * @param $extension string
	 * @param $version string
	 * @param $vcs string Version control system to use for branch
	 * @return bool|string
	 */
	protected function updateAndGetRevisionLocal( $extension, $version, $vcs ) {
		global $wgExtDistWorkingCopy;

		$dir = "$wgExtDistWorkingCopy/$version/extensions/$extension";

		$ed = ExtensionDistributorVCS::factory( $vcs );
		if ( $ed === null ) {
			$this->getOutput()->addWikiMsg( 'extdist-vcs-unsupported', $vcs );
			return false;
		}

		$result = $ed->updateAndGetVersion( $dir );
		if ( !$result->isGood() ) {
			$this->getOutput()->addWikiText( $result->getWikiText() );
			return false;
		}
		return $result->value;
	}

	/**
	 * @param $extension string
	 * @param $version string
	 * @param $vcs string Version control system to use for branch
	 * @return bool|string
	 */
	protected function updateAndGetRevisionRemote( $extension, $version, $vcs ) {
		global $wgExtDistRemoteClient;

		$cmd = json_encode(
			array(
				'extension' => $extension,
				'version' => $version,
				'vcs' => $vcs
			)
		);
		$cmd = str_replace( "\000", '', $cmd );

		list( $host, $port ) = explode( ':', $wgExtDistRemoteClient, 2 );

		$sock = fsockopen( $host, $port );

		if ( !$sock ) {
			$this->getOutput()->addWikiMsg( 'extdist-no-remote' );
			return false;
		}

		$encResponse = '';

		fwrite( $sock, $cmd . "\000\000\000" );
		while ( $sock && !feof( $sock ) ) {
			$encResponse .= fread( $sock, 8192 );
		}
		fclose( $sock );

		$response = json_decode( $encResponse );

		if ( isset( $response->error ) ) {
			$info = isset( $response->errorInfo ) ? $response->errorInfo : '';
			$this->getOutput()->addWikiMsg( $response->error, $info );
			return false;
		}

		if ( !isset( $response->revision ) ) {
			$this->getOutput()->addWikiMsg( 'extdist-remote-invalid-response' );
			return false;
		}

		return $response->revision;
	}
}
