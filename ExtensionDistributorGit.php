<?php

class ExtensionDistributorGit extends ExtensionDistributorVCS {

	/**
	 * @param $dir string
	 * @return Status
	 */
	public function updateAndGetVersion( $dir ) {
		if ( !chdir( $dir ) ) {
			return Status::newFatal( 'extdist-git-invalid-dir' );
		}
		// Is -q (quiet) enough?
		$cmd = "git pull -q 2>&1";
		$retval = -1;

		$result = wfShellExec( $cmd, $retval );

		if ( $retval ) {
			return Status::newFatal( 'extdist-git-error', $result );
		}

		// Determine last changed revision
		$cmd = "git rev-parse HEAD";
		$retval = -1;
		$result = wfShellExec( $cmd, $retval );

		if ( $retval ) {
			return Status::newFatal( 'extdist-git-error', $result );
		}

		// Trim trailing whitespace
		$result = rtrim( $result );

		// Check it looks like a SHA1 hash
		if ( !preg_match( '/^[0-9a-f]{40}$/i', $result ) ) {
			return Status::newFatal( 'extdist-git-invalidsha1', $result );
		}

		return Status::newGood( $result );
	}
}
