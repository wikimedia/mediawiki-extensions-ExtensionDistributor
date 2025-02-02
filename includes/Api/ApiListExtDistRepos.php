<?php

namespace MediaWiki\Extension\ExtensionDistributor\Api;

use MediaWiki\Api\ApiQuery;
use MediaWiki\Api\ApiQueryBase;
use MediaWiki\Extension\ExtensionDistributor\Providers\ExtDistProvider;
use MediaWiki\Logger\LoggerFactory;

/**
 * @author Legoktm
 */
class ApiListExtDistRepos extends ApiQueryBase {

	public function __construct( ApiQuery $query, string $moduleName ) {
		parent::__construct( $query, $moduleName, 'edr' );
	}

	public function execute() {
		$logger = LoggerFactory::getInstance( 'ExtensionDistributor' );
		$extProvider = ExtDistProvider::getProviderFor( ExtDistProvider::EXTENSIONS );
		$extProvider->setLogger( $logger );
		$skinProvider = ExtDistProvider::getProviderFor( ExtDistProvider::SKINS );
		$skinProvider->setLogger( $logger );
		$info = [
			'extensions' => $extProvider->getRepositoryList(),
			'skins' => $skinProvider->getRepositoryList(),
		];
		$this->getResult()->setIndexedTagName( $info['extensions'], 'extension' );
		$this->getResult()->setIndexedTagName( $info['skins'], 'skin' );
		$this->getResult()->addValue(
			'query',
			$this->getModuleName(),
			$info
		);
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 * @return array
	 */
	protected function getExamplesMessages() {
		return [
			'action=query&list=extdistrepos'
				=> 'apihelp-query+extdistrepos-example-1',
		];
	}
}
