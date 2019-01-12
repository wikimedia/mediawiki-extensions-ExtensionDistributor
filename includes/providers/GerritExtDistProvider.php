<?php

/**
 * ExtensionDistributor provider for the Gerrit Code Review system
 * Requires an external service to provide tarballs
 *
 * @author Legoktm
 *
 * Example configuration for Wikimedia sites:
 *
 * $wgExtDistAPIConfig = [
 *  'class' => 'GerritExtDistProvider',
 *  'apiUrl' => 'https://gerrit.wikimedia.org/r/projects/mediawiki%2F$TYPE%2F$EXT/branches',
 *  'tarballUrl' => 'http://extdist.wmflabs.org/dist/$TYPE/$EXT-$REF-$SHA.tar.gz',
 *  'tarballName' => '$EXT-$REF-$SHA.tar.gz',
 *  'repoListUrl' => 'https://gerrit.wikimedia.org/r/projects/?b=master&p=mediawiki/$TYPE/',
 *  'sourceUrl' => 'https://gerrit.wikimedia.org/r/mediawiki/$TYPE/$EXT.git',
 * ];
 *
 */
class GerritExtDistProvider extends ExtDistProvider {

	private $repoListUrl = false;

	public function __construct( array $options ) {
		parent::__construct( $options );
		if ( isset( $options['repoListUrl'] ) ) {
			$this->repoListUrl = $options['repoListUrl'];
		}
	}

	/**
	 * @param string $url full URL to request
	 * @return array
	 */
	private function makeGerritApiRequest( $url ) {
		if ( $this->proxy ) {
			$options = [ 'proxy' => $this->proxy ];
		} else {
			$options = null; // Default
		}
		$req = MWHttpRequest::factory( $url, $options );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			$errorText = Status::wrap( $status )->getWikiText( false, false, 'en' );
			$this->logger->error( __METHOD__ . ": Could not fetch \"{$url}\", " .
				"received: " . $errorText
			);
			return [];
		}
		// Gerrit API responses start with )]}' so trim it, then parse the JSON
		$clean = substr( $req->getContent(), 4 );
		return wfObjectToArray( FormatJson::decode( $clean ), true );
	}

	protected function fetchBranches( $name ) {
		$url = $this->substituteUrlVariables( $this->apiUrl, $name );
		$info = $this->makeGerritApiRequest( $url );
		$branches = [];
		foreach ( $info as $branch ) {
			if ( strpos( $branch['ref'], 'refs/heads/' ) === 0 ) {
				$name = substr( $branch['ref'], strlen( 'refs/heads/' ) );
				$branches[$name] = $branch['revision'];
			}
		}

		return $branches;
	}

	protected function fetchRepositoryList() {
		if ( !$this->repoListUrl ) {
			// Not configured, fallback to default
			return parent::fetchRepositoryList();
		}

		$repos = [];
		$out = $this->makeGerritApiRequest(
			$this->substituteUrlVariables( $this->repoListUrl )
		);
		foreach ( $out as $name => $info ) {
			// Skip read-only repositories
			if ( isset( $info['state'] ) && $info['state'] === 'READ_ONLY' ) {
				continue;
			}
			$parts = explode( '/', $name );
			if ( count( $parts ) === 3 ) {
				$repos[] = array_pop( $parts );
			}
		}

		return $repos;
	}

	public function getTarballLocation( $ext, $version ) {
		$shortHash = $this->getBranchSha( $ext, $version );
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
