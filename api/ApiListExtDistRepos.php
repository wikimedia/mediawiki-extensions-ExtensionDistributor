<?php

use MediaWiki\Logger\LoggerFactory;

class ApiListExtDistRepos extends ApiQueryGeneratorBase {

	public function __construct( ApiQuery $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'edr' );
	}

	public function execute() {
		$this->run();
	}

	public function executeGenerator( $resultPageSet ) {
		$this->run();
	}

	public function run() {
		$logger = LoggerFactory::getInstance( 'ExtensionDistributor' );
		$extProvider = ExtDistProvider::getProviderFor( ExtDistProvider::EXTENSIONS );
		$extProvider->setLogger( $logger );
		$skinProvider = ExtDistProvider::getProviderFor( ExtDistProvider::SKINS );
		$skinProvider->setLogger( $logger );
		$info = array(
			'extensions' => $extProvider->getRepositoryList(),
			'skins' => $skinProvider->getRepositoryList(),
		);
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
	 */
	protected function getExamplesMessages() {
		return array(
			'action=query&list=extdistrepos'
				=> 'apihelp-query+extdistrepos-example-1',
		);
	}
}
