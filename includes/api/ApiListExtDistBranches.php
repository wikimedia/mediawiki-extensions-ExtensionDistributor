<?php

use MediaWiki\Logger\LoggerFactory;

/**
 * @author Legoktm
 */
class ApiListExtDistBranches extends ApiQueryBase {

	private $providers = array();

	public function __construct( ApiQuery $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'edb' );
	}

	/**
	 * @param string $type
	 * @return ExtDistProvider
	 */
	protected function getProvider( $type ) {
		if ( !isset( $this->providers[$type] ) ) {
			$this->providers[$type] = ExtDistProvider::getProviderFor( $type );
		}

		return $this->providers[$type];
	}

	public function getCacheMode( $params ) {
		return 'public';
	}

	public function execute() {
		$logger = LoggerFactory::getInstance( 'ExtensionDistributor' );
		$extProvider = ExtDistProvider::getProviderFor( ExtDistProvider::EXTENSIONS );
		$extProvider->setLogger( $logger );
		$skinProvider = ExtDistProvider::getProviderFor( ExtDistProvider::SKINS );
		$skinProvider->setLogger( $logger );
		$info = array();
		ApiResult::setArrayType( $info, 'assoc' );
		$params = $this->extractRequestParams();
		if ( $params['exts'] ) {
			$info['extensions'] = $this->getInfo( $extProvider, $params['exts'] );
		}
		if ( $params['skins'] ) {
			$info['skins'] = $this->getInfo( $skinProvider, $params['skins'] );
		}
		$this->getResult()->addValue(
			'query',
			$this->getModuleName(),
			$info
		);
	}

	/**
	 * Get the info to output for a given provider
	 *
	 * @param ExtDistProvider $provider
	 * @param array $repos
	 * @return array
	 */
	private function getInfo( ExtDistProvider $provider, array $repos ) {
		$out = array();
		foreach ( $repos as $repo ) {
			$out[$repo] = array();
			$branches = $provider->getBranches( $repo );
			foreach ( $branches as $branch => $sha1 ) {
				$out[$repo][$branch] = $provider->getTarballLocation( $repo, $branch );
			}
			ApiResult::setArrayType( $out[$repo], 'assoc' );
		}

		return $out;
	}

	public function isInternal() {
		return true;
	}

	public function getAllowedParams() {
		$extensionsProvider = $this->getProvider( ExtDistProvider::EXTENSIONS );
		$skinsProvider = $this->getProvider( ExtDistProvider::SKINS );
		return array(
			'exts' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => $extensionsProvider
					? $extensionsProvider->getRepositoryList()
					: array(),
			),
			'skins' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => $skinsProvider
					? $skinsProvider->getRepositoryList()
					: array(),
			)
		);
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return array(
			'action=query&list=extdistbranches&edbexts=ExtensionDistributor'
				=> 'apihelp-query+extdistbranches-example-1',
		);
	}
}
