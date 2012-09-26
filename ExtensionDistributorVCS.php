<?php

abstract class ExtensionDistributorVCS {
	/**
	 * @param $vcs string
	 * @return ExtensionDistributorGIT|ExtensionDistributorSVN|null
	 */
	public static function factory( $vcs ) {
		if ( $vcs === 'svn' ) {
			return new ExtensionDistributorSVN;
		} elseif ( $vcs === 'git' ) {
			return new ExtensionDistributorGit;
		}
		return null;
	}

	/**
	 * @abstract
	 * @param $dir string
	 * @return Status
	 */
	abstract function updateAndGetVersion( $dir );
}
