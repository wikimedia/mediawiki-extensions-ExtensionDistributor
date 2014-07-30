<?php

/**
 * Base ExtensionDistributor provider
 *
 * Parameters that apply to all providers:
 *  proxy (optional) - HTTP proxy used in requests
 *  apiUrl - API endpoint to use
 *  tarballUrl - Where tarballs are stored
 */
abstract class ExtDistProvider {

	/**
	 * @var string|bool Proxy url, false if no proxy
	 */
	protected $proxy = false;

	protected $tarballUrl;
	protected $tarballName;
	protected $apiUrl;

	/**
	 * @var array Instance cache of extension => branches
	 */
	private $extBranches = array();

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
	 * List of branches enabled by configuration
	 *
	 * @return array
	 */
	protected function getEnabledBranches() {
		global $wgExtDistSnapshotRefs;
		return $wgExtDistSnapshotRefs;
	}

	/**
	 * Quick helper for subclasses to replace $EXT, $REF, and $SHA
	 *
	 * @param string $url
	 * @param string $ext
	 * @param string $version
	 * @param string $hash
	 * @return string
	 */
	protected function substituteUrlVariables( $url, $ext, $version = '', $hash = '' ) {
		return str_replace(
			array( '$EXT', '$REF', '$SHA' ),
			array( rawurlencode( $ext ), rawurlencode( $version ), rawurlencode( $hash ) ),
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
	 * Does $ext have a branch named $version?
	 *
	 * @param string $ext
	 * @param string $version
	 * @return bool
	 */
	public function hasExtBranch( $ext, $version ) {
		$branches = $this->getExtensionBranches( $ext );
		//var_dump($branches);
		return isset( $branches[$version] );
	}

	/**
	 * Returns short sha hash for the branch. Callers should have
	 * called hasExtBranch first.
	 *
	 * If you need the full hash, use getExtensionBranches directly.
	 *
	 * @param string $ext
	 * @param string $version
	 * @return string
	 */
	public function getExtBranchSha( $ext, $version ) {
		$branches = $this->getExtensionBranches( $ext );
		return substr( $branches[$version], 0, 7 );
	}

	/**
	 * Return an array of validated branch names the
	 * extension has.
	 *
	 * @param string $ext
	 * @return array branch name => sha1
	 */
	public function getExtensionBranches( $ext ) {
		global $wgMemc;

		// We'll probably call this function multiple
		// times, so use instance cache
		if ( isset( $this->extBranches[$ext] ) ) {
			return $this->extBranches[$ext];
		}

		// If a new release branch is added, the extensions probably also
		// got that branch, so vary cache on that
		$branches = $this->getEnabledBranches();
		sort( $branches );
		$confHash = md5( serialize( $branches ) );

		$key = "extdist-branches-$ext-$confHash";
		$data = $wgMemc->get( $key );
		if ( $data === false ) {
			$data = $this->fetchExtensionBranches( $ext );
			$wgMemc->set( $key, $data, $this->getCacheDuration() );
		}

		$enabled = array();
		foreach ( $data as $branch => $sha ) {
			if ( in_array( $branch, $this->getEnabledBranches() ) ) {
				$enabled[$branch] = $sha;
			}
		}

		$this->extBranches[$ext] = $enabled;

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
		$shortHash = $this->getExtBranchSha( $ext, $version );
		return $this->substituteUrlVariables( $this->tarballName, $ext, $version, $shortHash );
	}

	/**
	 * Returns a fully qualified URL pointing to the location of the
	 * tarball, given the extension name and version.
	 *
	 * @param string $ext
	 * @param string $version
	 * @return string
	 */
	abstract public function getTarballLocation( $ext, $version );

	/**
	 * Should return an array of branches that
	 * the extension has, don't validate whether they
	 * are in $wgExtDistSnapshotRefs
	 *
	 * @param string $ext
	 * @return array
	 */
	abstract protected function fetchExtensionBranches( $ext );
}