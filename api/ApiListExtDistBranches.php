<?php

use MediaWiki\Logger\LoggerFactory;

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

	public function execute() {
		$logger = LoggerFactory::getInstance( 'ExtensionDistributor' );
		$extProvider = ExtDistProvider::getProviderFor( ExtDistProvider::EXTENSIONS );
		$extProvider->setLogger( $logger );
		$skinProvider = ExtDistProvider::getProviderFor( ExtDistProvider::SKINS );
		$skinProvider->setLogger( $logger );
		$info = array();
		ApiResult::setArrayType( $info, 'assoc' );
		$params = $this->extractRequestParams();
		foreach ( $params['exts'] as $ext ) {
			$info['extensions'][$ext] = $extProvider->getBranches( $ext );
			ApiResult::setArrayType( $info['extensions'][$ext], 'assoc' );
		}
		foreach ( $params['skins'] as $skin ) {
			$info['skins'][$skin] = $skinProvider->getBranches( $skin );
			ApiResult::setArrayType( $info['skins'][$skin], 'assoc' );
		}
		$this->getResult()->addValue(
			'query',
			$this->getModuleName(),
			$info
		);
	}

	public function getAllowedParams() {
		return array(
			'exts' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => $this->getProvider( ExtDistProvider::EXTENSIONS )->getRepositoryList(),
			),
			'skins' => array(
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_TYPE => $this->getProvider( ExtDistProvider::SKINS )->getRepositoryList(),
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
