<?php

namespace MediaWiki\Extension\ExtensionDistributor\Providers;

use FormatJson;
use MediaWiki\MediaWikiServices;
use MediaWiki\Status\Status;

/**
 * ExtensionDistributor provider for Github.com
 *
 * @author Legoktm
 *
 * Provider-specific parameters:
 *  token - OAuth authentication token, see https://github.com/blog/1509-personal-api-tokens
 *
 * Example configuration for the Wikimedia Github account:
 *
 * use MediaWiki\Extension\ExtensionDistributor\Providers\GithubExtDistProvider;
 *
 * $wgExtDistAPIConfig = [
 *  'class' => GithubExtDistProvider::class,
 *  'apiUrl' => 'https://api.github.com/repos/wikimedia/mediawiki-$TYPE-$EXT/branches',
 *  'tarballUrl' => 'https://codeload.github.com/wikimedia/mediawiki-$TYPE-$EXT/legacy.tar.gz/$REF',
 *  'tarballName' => 'wikimedia-mediawiki-$TYPE-$EXT-$SHA.tar.gz'
 *  'sourceUrl' => 'https://github.com/wikimedia/mediawiki-$TYPE-$EXT',
 *  'token' => 'YOUR TOKEN HERE',
 * ];
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
		$options = [];
		if ( $this->proxy ) {
			$options['proxy'] = $this->proxy;
		}

		$url = $this->substituteUrlVariables( $this->apiUrl, $name );
		if ( $this->oAuthToken ) {
			// See https://developer.github.com/v3/#authentication
			$url = wfAppendQuery( $url, [ 'access_token' => $this->oAuthToken ] );
		}

		$req = MediaWikiServices::getInstance()->getHttpRequestFactory()
			->create( $url, $options, __METHOD__ );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			$errorText = Status::wrap( $status )->getWikiText( false, false, 'en' );
			$this->logger->error( __METHOD__ . ": Could not fetch branches for $name, " .
				"received: " . $errorText
			);
			return [];
		}

		$info = wfObjectToArray( FormatJson::decode( $req->getContent() ), true );
		'@phan-var array[] $info';
		$branches = [];
		foreach ( $info as $branch ) {
			$branches[$branch['name']] = $branch['commit']['sha1'];
		}

		return $branches;
	}
}
