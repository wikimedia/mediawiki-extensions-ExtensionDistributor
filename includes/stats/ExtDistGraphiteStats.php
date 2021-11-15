<?php

use MediaWiki\MediaWikiServices;
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
	 */
	public function setLogger( LoggerInterface $logger ) {
		$this->logger = $logger;
	}

	/**
	 * @param string $type 'extensions' or 'skins'
	 *
	 * TODO we need some way to limit the number of extensions returning?
	 *
	 * @return array|bool array of extensions in order of popularity or false on failure
	 */
	public function getPopularList( $type ) {
		global $wgExtDistGraphiteRenderApi, $wgServerName, $wgStatsdMetricPrefix;
		if ( !$wgExtDistGraphiteRenderApi ) {
			return false;
		}

		$cache = ObjectCache::getInstance( CACHE_ANYTHING );
		$cacheKey = $this->getCacheKey( $cache, $type );

		$cachedValue = $cache->get( $cacheKey );
		if ( $cachedValue ) {
			$this->logger->debug( "Retrieved PopularList of $type from cache" );
			// @phan-suppress-next-line PhanCoalescingNeverNull $cachedValue can be null
			return $cachedValue ?? false;
		}

		$metric = "$wgStatsdMetricPrefix.extdist.$type.*.*.sum";
		$requestParams = [
			'target' => 'sortByMaxima(groupByNode(summarize(' . $metric . ',"4w","sum",true),3,"sum"))',
			'format' => 'json',
			'from' => '-4w',
			'until' => 'now',
		];

		$httpOptions = [
			'userAgent' => "$wgServerName - ExtensionDistributor  - MediaWiki Extension",
		];
		$url = $wgExtDistGraphiteRenderApi . '/?' . http_build_query( $requestParams );
		$req = MediaWikiServices::getInstance()->getHttpRequestFactory()
			->create( $url, $httpOptions, __METHOD__ );
		$status = $req->execute();
		if ( !$status->isOK() ) {
			$this->logger->error( "Could not fetch popularList of $type from graphite, " .
				"received: {$status}"
			);
			// Store a negative cache entry so we don't hammer graphite
			$cache->set( $cacheKey, null, 60 * 60 );
			return false;
		}

		$info = wfObjectToArray( FormatJson::decode( $req->getContent(), true ), true );
		'@phan-var array[] $info';

		$popularList = [];
		foreach ( $info as $dataSet ) {
			$popularList[] = $dataSet['target'];
		}
		if ( !$popularList ) {
			$this->logger->error( "Graphite result resulted in empty PopularList of $type" );
			// Store a negative cache entry so we don't hammer graphite
			$cache->set( $cacheKey, null, 60 * 60 );
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
	 * @param BagOStuff $cache
	 * @param string $type
	 * @return string
	 */
	private function getCacheKey( BagOStuff $cache, $type ) {
		return $cache->makeKey( 'extdist', 'GraphiteStats', $type, 'PopularList' );
	}

	public function clearCache() {
		$cache = ObjectCache::getInstance( CACHE_ANYTHING );
		$typesToClear = [
			ExtDistProvider::EXTENSIONS,
			ExtDistProvider::SKINS
		];
		foreach ( $typesToClear as $type ) {
			$success = $cache->delete( $this->getCacheKey( $cache, $type ) );
			if ( !$success ) {
				$this->logger->error( "Failed to clear PopularList cache for $type" );
			}
		}
	}

}
