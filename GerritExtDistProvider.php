<?php

/**
 * ExtensionDistributor provider for the Gerrit Code Review system
 * Requires an external service to provide tarballs
 *
 * Example configuration for Wikimedia sites:
 *
 * $wgExtDistAPIConfig = array(
 *  'class' => 'GerritExtDistProvider',
 *  'apiUrl' => 'https://gerrit.wikimedia.org/r/projects/mediawiki%2Fextensions%2F$EXT/branches',
 *  'tarballUrl' => 'http://extdist.wmflabs.org/dist/$EXT-$REF-$SHA.tar.gz',
 *  'tarballName' => '$EXT-$REF-$SHA.tar.gz',
 * );
 *
 */
class GerritExtDistProvider extends ExtDistProvider {
	protected function fetchExtensionBranches( $ext ) {
		$url = $this->substituteUrlVariables( $this->apiUrl, $ext );
		if ( $this->proxy ) {
			$options = array( 'proxy' => $this->proxy );
		} else {
			$options = null; // Default
		}
		$req = MWHttpRequest::factory( $url, $options );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			wfDebugLog( 'ExtensionDistributor', __METHOD__ . ": Could not fetch branches for $ext, " .
				"received: {$status->errors[0]}"
			);
			return array();
		}
		// Gerrit API responses start with )]}' so trim it, then parse the JSON
		$clean = substr( $req->getContent(), 4 );
		$info = wfObjectToArray( FormatJson::decode( $clean ), true );
		$branches = array();
		foreach( $info as $branch ) {
			if ( strpos( $branch['ref'], 'refs/heads/' ) === 0 ) {
				$name = substr( $branch['ref'], strlen( 'refs/heads/' ) );
				$branches[$name] = $branch['revision'];
			}
		}

		return $branches;
	}

	public function getTarballLocation( $ext, $version ) {
		$shortHash = $this->getExtBranchSha( $ext, $version );
		return $this->substituteUrlVariables( $this->tarballUrl, $ext, $version, $shortHash );
	}

	/**
	 * Cache list of branches for 30 minutes
	 *
	 * @return int
	 */
	protected function getCacheDuration() {
		return 60 * 30;
	}
}
