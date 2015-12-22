<?php

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

/**
 * Class for retrieving stats about downloads from a Graphite render url
 *
 * @author Addshore
 */
class ExtDistGraphiteStats implements LoggerAwareInterface {

	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * Sets a logger instance on the object
	 *
	 * @param LoggerInterface $logger
	 *
	 * @return null
	 */
	public function setLogger( LoggerInterface $logger ) {
		$this->logger = $logger;
	}

	/**
	 * @param string $type 'extensions' or 'skins'
	 *
	 * TODO we need some way to limit the number of extensions returning?
	 *
	 * @returns array|bool array of extensions in order of popularity or false on failure
	 */
	public function getPopularList( $type ) {
		global $wgExtDistGraphiteRenderApi, $wgServerName;
		if ( !$wgExtDistGraphiteRenderApi ) {
			return false;
		}

		$cacheKey = $this->getCacheKey( $type );
		$cache = wfGetCache( CACHE_ANYTHING );

		$cachedValue = $cache->get( $cacheKey );
		if ( $cachedValue ) {
			$this->logger->debug( "Retrieved PopularList of $type from cache" );
			return $cachedValue;
		}

		$metric = "MediaWiki.extdist.$type.*.*.sum";
		$requestParams = array(
			'target' => 'sortByMaxima(groupByNode(summarize(' . $metric . ',"4w","sum",true),3,"sum"))',
			'format' => 'json',
			'from' => '-4w',
			'until' => 'now',
		);

		$httpOptions = array(
			'userAgent' => "$wgServerName - ExtensionDistributor  - Mediawiki Extension",
		);
		$url = $wgExtDistGraphiteRenderApi . '/?' . http_build_query( $requestParams );
		$req = MWHttpRequest::factory( $url, $httpOptions );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			$this->logger->error( "Could not fetch popularList of $type from graphite, " .
				"received: {$status->errors[0]}"
			);
			return false;
		}

		$info = wfObjectToArray( FormatJson::decode( $req->getContent(), true ), true );

		$popularList = array();
		foreach ( $info as $dataSet ) {
			$popularList[] = $dataSet['target'];
		}
		if ( !$popularList ) {
			$this->logger->error( "Graphite result resulted in empty PopularList of $type" );
			return false;
		}

		$popularList = array_slice( $popularList, 0, 15 );

		// Cache list for 1 day
		$cacheSuccess = $cache->set( $cacheKey, $popularList, 60 * 60 * 24 );
		if ( !$cacheSuccess ) {
			$this->logger->error( "Could not store PopularList of $type in cache." );
		}

		return $popularList;
	}

	/**
	 * @param string $type
	 *
	 * @return string
	 */
	private function getCacheKey( $type ) {
		return wfMemcKey( 'extdist', 'GraphiteStats', $type, 'PopularList' );
	}

	public function clearCache() {
		$cache = wfGetCache( CACHE_ANYTHING );
		$typesToClear = array(
			ExtDistProvider::EXTENSIONS,
			ExtDistProvider::SKINS
		);
		foreach ( $typesToClear as $type ) {
			$success = $cache->delete( $this->getCacheKey( $type ) );
			if ( !$success ) {
				$this->logger->error( "Failed to clear PopularList cache for $type" );
			}
		}
	}

}