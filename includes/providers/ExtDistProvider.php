<?php

use MediaWiki\MediaWikiServices;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Base ExtensionDistributor provider
 *
 * @author Legoktm
 *
 * Parameters that apply to all providers:
 *  proxy (optional) - HTTP proxy used in requests
 *  apiUrl - API endpoint to use
 *  tarballUrl - Where tarballs are stored
 *  sourceUrl - URL to the VCS repository
 *  'repoType' - Either "skins" or "extensions"
 */
abstract class ExtDistProvider implements LoggerAwareInterface {

	public const EXTENSIONS = 'extensions';
	public const SKINS = 'skins';

	/**
	 * @var string|bool Proxy url, false if no proxy
	 */
	protected $proxy = false;

	protected $tarballUrl;
	protected $tarballName;
	protected $apiUrl;
	protected $repoType;
	protected $sourceUrl = false;
	/**
	 * @var LoggerInterface
	 */
	protected $logger;

	/**
	 * @var array Instance cache of repo name => branches
	 */
	private $branches = [];

	/**
	 * @param array $options
	 */
	public function __construct( array $options ) {
		if ( isset( $options['proxy'] ) ) {
			$this->proxy = $options['proxy'];
		}
		$this->tarballUrl = $options['tarballUrl'];
		$this->tarballName = $options['tarballName'];
		$this->apiUrl = $options['apiUrl'];
		$this->repoType = $options['repoType'];
		if ( isset( $options['sourceUrl'] ) ) {
			$this->sourceUrl = $options['sourceUrl'];
		}
		$this->setLogger( new NullLogger() );
	}

	public function setLogger( LoggerInterface $logger ) {
		$this->logger = $logger;
	}

	/**
	 * Main entry point
	 *
	 * @param array $options
	 * @return ExtDistProvider
	 */
	public static function factory( array $options ) {
		return new $options['class']( $options );
	}

	/**
	 * Get the provider configured for the given type
	 *
	 * @param string $type
	 * @return ExtDistProvider|null
	 */
	public static function getProviderFor( $type ) {
		global $wgExtDistAPIConfig;

		if ( !$wgExtDistAPIConfig ) {
			return null;
		}
		return self::factory(
			$wgExtDistAPIConfig + [ 'repoType' => $type ]
		);
	}

	/**
	 * List of branches enabled by configuration
	 *
	 * @return array
	 */
	protected function getEnabledBranches() {
		global $wgExtDistSnapshotRefs;
		return $wgExtDistSnapshotRefs;
	}

	/**
	 * Quick helper for subclasses to replace $EXT, $REF, $SHA, and $TYPE
	 *
	 * @param string $url
	 * @param string $ext
	 * @param string $version
	 * @param string $hash
	 * @return string
	 */
	protected function substituteUrlVariables( $url, $ext = '', $version = '', $hash = '' ) {
		return str_replace(
			[ '$EXT', '$REF', '$SHA', '$TYPE' ],
			[
				rawurlencode( $ext ), rawurlencode( $version ),
				rawurlencode( $hash ), rawurlencode( $this->repoType )
			],
			$url
		);
	}

	/**
	 * How long we cache the list of branches for
	 *
	 * @return int
	 */
	abstract protected function getCacheDuration();

	/**
	 * Does $name have a branch named $version?
	 *
	 * @param string $name
	 * @param string $version
	 * @return bool
	 */
	public function hasBranch( $name, $version ) {
		$branches = $this->getBranches( $name );
		return isset( $branches[$version] );
	}

	/**
	 * Returns short sha hash for the branch. Callers should have
	 * called hasBranch first.
	 *
	 * If you need the full hash, use getBranches directly.
	 *
	 * @param string $name
	 * @param string $version
	 * @return string
	 */
	public function getBranchSha( $name, $version ) {
		$branches = $this->getBranches( $name );
		return substr( $branches[$version], 0, 7 );
	}

	/**
	 * Return an array of validated branch names the
	 * repo has.
	 *
	 * @param string $name
	 * @return array branch name => sha1
	 */
	public function getBranches( $name ) {
		// We'll probably call this function multiple
		// times, so use instance cache
		if ( isset( $this->branches[$name] ) ) {
			return $this->branches[$name];
		}

		// If a new release branch is added, the repos probably also
		// got that branch, so vary cache on that
		$branches = $this->getEnabledBranches();
		sort( $branches );
		$confHash = md5( serialize( $branches ) );

		$cache = MediaWikiServices::getInstance()->getMainWANObjectCache();
		$data = $cache->getWithSetCallback(
			$cache->makeGlobalKey( "extdist-branches", $this->repoType, $name, $confHash ),
			$this->getCacheDuration(),
			function () use ( $name ) {
				return $this->fetchBranches( $name );
			}
		);

		$enabled = [];
		foreach ( $data as $branch => $sha ) {
			if ( in_array( $branch, $this->getEnabledBranches() ) ) {
				$enabled[$branch] = $sha;
			}
		}

		$this->branches[$name] = $enabled;

		return $enabled;
	}

	/**
	 * What do we expect the tarball name to be when downloaded
	 *
	 * @param string $ext
	 * @param string $version
	 * @return string
	 */
	public function getExpectedTarballName( $ext, $version ) {
		$shortHash = $this->getBranchSha( $ext, $version );
		return $this->substituteUrlVariables( $this->tarballName, $ext, $version, $shortHash );
	}

	/**
	 * Returns a fully qualified URL pointing to the location of the
	 * tarball, given the repo name and version.
	 *
	 * @param string $ext
	 * @param string $version
	 * @return string
	 */
	abstract public function getTarballLocation( $ext, $version );

	/**
	 * Should return an array of branches that
	 * the repo has, don't validate whether they
	 * are in $wgExtDistSnapshotRefs
	 *
	 * @param string $name
	 * @return array
	 */
	abstract protected function fetchBranches( $name );

	/**
	 * Get a list of repository names
	 *
	 * @return array
	 */
	public function getRepositoryList() {
		$cache = MediaWikiServices::getInstance()->getMainWANObjectCache();

		return $cache->getWithSetCallback(
			$cache->makeGlobalKey( "extdist-list", $this->repoType ),
			$cache::TTL_HOUR,
			function () {
				return $this->fetchRepositoryList();
			}
		);
	}

	/**
	 * Default implementation that requires a
	 * list of repository names to be available
	 * at $wgExtDistListFile.
	 *
	 * @return array
	 */
	protected function fetchRepositoryList() {
		global $wgExtDistListFile;
		$extList = [];
		$res = Http::get( $wgExtDistListFile, [], __METHOD__ );
		if ( $res ) {
			$extList = array_filter( array_map( 'trim', explode( "\n", $res ) ) );
		}

		return $extList;
	}

	/**
	 * Get the URL to the source VCS repository
	 *
	 * @param string $name
	 * @return bool|string false if not configured
	 */
	public function getSourceURL( $name ) {
		if ( $this->sourceUrl !== false ) {
			return $this->substituteUrlVariables( $this->sourceUrl, $name );
		} else {
			return false;
		}
	}
}
