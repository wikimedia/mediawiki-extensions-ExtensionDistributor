<?php

/**
 * Subversion invoker for inetd
 */

if ( php_sapi_name() !== 'cli' ) {
	echo "This script can only be run from the command line\n";
	exit( 1 );
}

$wgExtDistWorkingCopy = false;
$wgExtDistLockFile = false;
$confFile = realpath( dirname( $_SERVER["SCRIPT_FILENAME"] ) ) . '/svn-invoker.conf';
if ( !file_exists( $confFile ) ) {
	echo "Error: please create svn-invoker.conf based on svn-invoker.conf.sample\n";
	exit( 1 );
}
require( $confFile );

executeInvoker();

/**
 * @param $s string
 * @return bool
 */
function svnValidate( $s ) {
	return strpos( $s, '..' ) === false;
}

/**
 * @param $cmd
 * @param $retval
 * @return string
 */
function invokerShellExec( $cmd, &$retval ) {
	$retval = 1; // error by default?
	ob_start();
	passthru( $cmd, $retval );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * @param $msg
 * @param bool $info
 */
function invokerError( $msg, $info = false ) {
	echo json_encode( array( 'error' => $msg, 'errorInfo' => $info ) );
}

function executeInvoker() {
	global $wgExtDistWorkingCopy, $wgExtDistLockFile;

	$encCommand = '';
	$done = false;
	while ( !$done && STDIN && !feof( STDIN ) ) {
		$buf = fread( STDIN, 8192 );
		$nullPos = strpos( $buf, "\000" );
		if ( $nullPos !== false ) {
			$buf = substr( $buf, 0, $nullPos );
			$done = true;
		}
		$encCommand .= $buf;
	}
	if ( !$encCommand ) {
		invokerError( 'extdist-remote-error', "Invalid command." );
		return;
	}

	if ( $wgExtDistLockFile ) {
		$lockFile = fopen( $wgExtDistLockFile, 'a' );
		if ( !$lockFile ) {
			invokerError( 'extdist-remote-error', "Unable to open lock file." );
			return;
		}
		$timeout = 3;
		for ( $i = 0; $i < $timeout; $i++ ) {
			if ( flock( $lockFile, LOCK_EX | LOCK_NB ) ) {
				break;
			}
			sleep( 1 );
		}
		if ( $i == $timeout ) {
			invokerError( 'extdist-remote-error', "Lock wait timeout." );
			return;
		}
	}

	$command = json_decode( $encCommand );
	if ( !isset( $command->version ) || !isset( $command->extension ) || !isset( $command->vcs ) ) {
		invokerError( 'extdist-remote-error', "Missing version, extension or vcs parameter." );
		return;
	}
	if ( !svnValidate( $command->version ) ) {
		invokerError( 'extdist-remote-error', "Invalid version parameter" );
		return;
	} elseif ( !svnValidate( $command->extension ) ) {
		invokerError( 'extdist-remote-error', "Invalid extension parameter" );
		return;
	}

	$version = $command->version;
	$extension = $command->extension;
	$vcs = $command->vcs;
	if ( !in_array( $vcs, array( 'git', 'svn' ) ) ) {
		invokerError( 'extdist-remote-error', "Invalid vcs parameter" );
		return;
	}

	$dir = "$wgExtDistWorkingCopy/$version/extensions/$extension";
	$remoteRev = null;
	if ( $vcs === 'svn' ) {
		$remoteRev = svnExecute( $dir );
	} elseif( $vcs === 'git' ) {
		$remoteRev = gitExecute( $dir );
	}

	if ( $remoteRev === null ) {
		return;
	}

	echo json_encode( array( 'revision' => $remoteRev ) );
}

/**
 * @param $dir string
 * @return null|string
 */
function svnExecute( $dir ) {
	// Determine last changed revision in the checkout
	$localRev = svnGetRev( $dir, $remoteDir );
	if ( !$localRev ) {
		return null;
	}

	// Determine last changed revision in the repo
	$remoteRev = svnGetRev( $remoteDir );
	if ( !$remoteRev ) {
		return null;
	}

	if ( $remoteRev != $localRev ) {
		// Bad luck, we need to svn up
		$cmd = "svn up --non-interactive " . escapeshellarg( $dir ) . " 2>&1";
		$retval = -1;
		$result = invokerShellExec( $cmd, $retval );
		if ( $retval ) {
			invokerError( 'extdist-svn-error', $result );
			return null;
		}
	}
	return $remoteRev;
}

/**
 * Returns the last changed revision or false
 *
 * @param $dir string
 * @param $url null|string Output param $url Remote location of the folder
 * @return bool|string
 */
function svnGetRev( $dir, &$url = null ) {
	$cmd = "svn info --non-interactive --xml " . escapeshellarg( $dir );
	$retval = -1;
	$result = invokerShellExec( $cmd, $retval );
	if ( $retval ) {
		invokerError( 'extdist-svn-error', $result );
		return false;
	}

	try {
		$sx = new SimpleXMLElement( $result );
		$rev = strval( $sx->entry->commit['revision'] );
		$url = $sx->entry->url;
	} catch ( Exception $e ) {
		$rev = false;
	}
	if ( !$rev || strpos( $rev, '/' ) !== false || strpos( $rev, "\000" ) !== false ) {
		invokerError( 'extdist-svn-parse-error', $result );
		return false;
	}

	return $rev;
}

/**
 * @param $dir string
 * @return null|string
 */
function gitExecute( $dir ) {
	$localRev = gitGetRev( $dir );
	if ( !$localRev ) {
		return null;
	}

	// TODO: Need to check remote before attempting update, bit daft unconditionally pulling
	chdir( $dir );

	$cmd = "git checkout master -q";
	$retval = -1;
	$result = invokerShellExec( $cmd, $retval );
	if ( $retval ) {
		invokerError( 'extdist-git-error', $result );
		return null;
	}

	$cmd = "git pull -q";
	$retval = -1;
	$result = invokerShellExec( $cmd, $retval );
	if ( $retval ) {
		invokerError( 'extdist-git-error', $result );
		return null;
	}

	$newLocalRev = gitGetRev( $dir );
	if ( !$newLocalRev ) {
		return null;
	}
	return $newLocalRev;
}

/**
 * @param $dir string
 * @return bool|string
 */
function gitGetRev( $dir ) {
	chdir( $dir );
	$cmd = "git rev-parse HEAD";
	$retval = -1;
	$result = invokerShellExec( $cmd, $retval );
	if ( $retval ) {
		invokerError( 'extdist-git-error', $result );
		return false;
	}

	// Trim trailing whitespace
	$result = rtrim( $result );

	// Check it looks like a SHA1 hash
	if ( !preg_match( '/^[0-9a-f]{40}$/i', $result ) ) {
		invokerError( 'extdist-git-invalidsha1', $result );
		return false;
	}

	return substr( $result, 0, 7 );
}
