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
 *  'extensionListUrl' => 'https://gerrit.wikimedia.org/r/projects/?p=mediawiki/extensions/',
 * );
 *
 */
class GerritExtDistProvider extends ExtDistProvider {

	private $extensionListUrl = false;

	public function __construct( array $options ) {
		parent::__construct( $options );
		if ( isset( $options['extensionListUrl'] ) ) {
			$this->extensionListUrl = $options['extensionListUrl'];
		}
	}

	/**
	 * @param string $url full URL to request
	 * @return array
	 */
	private function makeGerritApiRequest( $url ) {
		if ( $this->proxy ) {
			$options = array( 'proxy' => $this->proxy );
		} else {
			$options = null; // Default
		}
		$req = MWHttpRequest::factory( $url, $options );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			wfDebugLog( 'ExtensionDistributor', __METHOD__ . ": Could not fetch \"{$url}\", " .
				"received: {$status->errors[0]}"
			);
			return array();
		}
		// Gerrit API responses start with )]}' so trim it, then parse the JSON
		$clean = substr( $req->getContent(), 4 );
		return wfObjectToArray( FormatJson::decode( $clean ), true );
	}

	protected function fetchExtensionBranches( $ext ) {
		$url = $this->substituteUrlVariables( $this->apiUrl, $ext );
		$info = $this->makeGerritApiRequest( $url );
		$branches = array();
		foreach( $info as $branch ) {
			if ( strpos( $branch['ref'], 'refs/heads/' ) === 0 ) {
				$name = substr( $branch['ref'], strlen( 'refs/heads/' ) );
				$branches[$name] = $branch['revision'];
			}
		}

		return $branches;
	}

	protected function fetchExtensionList() {
		if ( !$this->extensionListUrl ) {
			// Not configured, fallback to default
			return parent::fetchExtensionList();
		}

		$extensions = array();
		$out = $this->makeGerritApiRequest( $this->extensionListUrl );
		foreach ( $out as $name => $info ) {
			$parts = explode( '/', $name );
			if ( count( $parts ) === 3 ) {
				$extensions[] = array_pop( $parts );
			}
		}

		return $extensions;
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
