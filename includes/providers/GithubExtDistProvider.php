<?php

/**
 * ExtensionDistributor provider for Github.com
 *
 * Provider-specific parameters:
 *  token - OAuth authentication token, see https://github.com/blog/1509-personal-api-tokens
 *
 * Example configuration for the Wikimedia Github account:
 *
 * $wgExtDistAPIConfig = array(
 *  'class' => 'GithubExtDistProvider',
 *  'apiUrl' => 'https://api.github.com/repos/wikimedia/mediawiki-$TYPE-$EXT/branches',
 *  'tarballUrl' => 'https://codeload.github.com/wikimedia/mediawiki-$TYPE-$EXT/legacy.tar.gz/$REF',
 *  'tarballName' => 'wikimedia-mediawiki-$TYPE-$EXT-$SHA.tar.gz'
 *  'token' => 'YOUR TOKEN HERE',
 * );
 *
 */
class GithubExtDistProvider extends ExtDistProvider {

	private $oAuthToken = false;

	public function __construct( array $options ) {
		parent::__construct( $options );
		if ( isset( $options['token'] ) ) {
			$this->oAuthToken = $options['token'];
		}
	}

	/**
	 * Cache for an hour
	 *
	 * @return int
	 */
	protected function getCacheDuration() {
		return 60 * 60;
	}

	public function getTarballLocation( $ext, $version ) {
		return $this->substituteUrlVariables( $this->tarballUrl, $ext, $version );
	}

	protected function fetchBranches( $name ) {
		if ( $this->proxy ) {
			$options = array( 'proxy' => $this->proxy );
		} else {
			$options = null; // Default
		}

		$url = $this->substituteUrlVariables( $this->apiUrl, $name );
		if ( $this->oAuthToken ) {
			// See https://developer.github.com/v3/#authentication
			$url = wfAppendQuery( $url, array( 'access_token' => $this->oAuthToken ) );
		}

		$req = MWHttpRequest::factory( $url, $options );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			$this->logger->error( __METHOD__ . ": Could not fetch branches for $name, " .
				"received: {$status->errors[0]}"
			);
			return array();
		}

		$info = wfObjectToArray( FormatJson::decode( $req->getContent() ), true );
		$branches = array();
		foreach( $info as $branch ) {
			$branches[$branch['name']] = $branch['commit']['sha1'];
		}

		return $branches;
	}
}