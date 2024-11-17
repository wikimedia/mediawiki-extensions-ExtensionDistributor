<?php

namespace MediaWiki\Extension\ExtensionDistributor\Api;

use MediaWiki\Api\ApiBase;
use MediaWiki\Api\ApiQuery;
use MediaWiki\Api\ApiQueryBase;
use MediaWiki\Api\ApiResult;
use MediaWiki\Extension\ExtensionDistributor\Providers\ExtDistProvider;
use MediaWiki\Logger\LoggerFactory;
use Wikimedia\ParamValidator\ParamValidator;

/**
 * @author Legoktm
 */
class ApiListExtDistBranches extends ApiQueryBase {

	/** @var (ExtDistProvider|null)[] */
	private $providers = [];

	public function __construct( ApiQuery $query, string $moduleName ) {
		parent::__construct( $query, $moduleName, 'edb' );
	}

	/**
	 * @param string $type
	 * @return ExtDistProvider|null
	 */
	protected function getProvider( $type ) {
		if ( !isset( $this->providers[$type] ) ) {
			$this->providers[$type] = ExtDistProvider::getProviderFor( $type );
		}

		return $this->providers[$type];
	}

	/** @inheritDoc */
	public function getCacheMode( $params ) {
		return 'public';
	}

	public function execute() {
		$logger = LoggerFactory::getInstance( 'ExtensionDistributor' );
		$extProvider = ExtDistProvider::getProviderFor( ExtDistProvider::EXTENSIONS );
		$extProvider->setLogger( $logger );
		$skinProvider = ExtDistProvider::getProviderFor( ExtDistProvider::SKINS );
		$skinProvider->setLogger( $logger );
		$info = [];
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
		$out = [];
		foreach ( $repos as $repo ) {
			$out[$repo] = [];
			$branches = $provider->getBranches( $repo );
			foreach ( $branches as $branch => $sha1 ) {
				$out[$repo][$branch] = $provider->getTarballLocation( $repo, $branch );
			}
			$source = $provider->getSourceURL( $repo );
			if ( $source !== false ) {
				// As long as 'source' is never added to $wgExtDistSnapshotRefs,
				// we'll be totally fine.
				$out[$repo]['source'] = $source;
			}
			ApiResult::setArrayType( $out[$repo], 'assoc' );
		}

		return $out;
	}

	/** @inheritDoc */
	public function isInternal() {
		return true;
	}

	/** @inheritDoc */
	public function getAllowedParams() {
		$extensionsProvider = $this->getProvider( ExtDistProvider::EXTENSIONS );
		$skinsProvider = $this->getProvider( ExtDistProvider::SKINS );
		return [
			'exts' => [
				ParamValidator::PARAM_ISMULTI => true,
				ParamValidator::PARAM_TYPE => $extensionsProvider
					? $extensionsProvider->getRepositoryList()
					: [],
			],
			'skins' => [
				ParamValidator::PARAM_ISMULTI => true,
				ParamValidator::PARAM_TYPE => $skinsProvider
					? $skinsProvider->getRepositoryList()
					: [],
			]
		];
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 * @return array
	 */
	protected function getExamplesMessages() {
		return [
			'action=query&list=extdistbranches&edbexts=ExtensionDistributor'
				=> 'apihelp-query+extdistbranches-example-1',
		];
	}
}
