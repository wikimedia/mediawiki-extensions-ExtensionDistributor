<?php

use MediaWiki\Logger\LoggerFactory;

/**
 * @author Legoktm
 */
class ApiListExtDistRepos extends ApiQueryBase {

	public function __construct( ApiQuery $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'edr' );
	}

	public function execute() {
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
