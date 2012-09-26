<?php

class ExtensionDistributorSVN extends ExtensionDistributorVCS {
	/**
	 * @param $dir string
	 * @return Status
	 */
	public function updateAndGetVersion( $dir ) {
		$cmd = "svn up --non-interactive " . wfEscapeShellArg( $dir ) . " 2>&1";
		$retval = -1;
		$result = wfShellExec( $cmd, $retval );

		if ( $retval ) {
			return Status::newFatal( 'extdist-svn-error', $result );
		}

		// Determine last changed revision
		$cmd = "svn info --non-interactive --xml " . wfEscapeShellArg( $dir );
		$retval = -1;
		$result = wfShellExec( $cmd, $retval );

		if ( $retval ) {
			return Status::newFatal( 'extdist-svn-error', $result );
		}

		$sx = new SimpleXMLElement( $result );
		$rev = $sx->entry->commit['revision'];

		if ( !$rev || strpos( $rev, '/' ) !== false || strpos( $rev, "\000" ) !== false ) {
			return Status::newFatal( 'extdist-svn-parse-error', $result );
		}

		return Status::newGood( "r$rev" );
	}
}
