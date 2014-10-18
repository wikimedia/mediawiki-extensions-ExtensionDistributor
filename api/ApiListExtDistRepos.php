<?php

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
		global $wgExtDistAPIConfig;
		$provider = ExtDistProvider::factory( $wgExtDistAPIConfig );
		$info = array(
			'extensions' => $provider->getExtensionList(),
		);
		$this->getResult()->setIndexedTagName( $info['extensions'], 'extension' );
		$this->getResult()->addValue(
			'query',
			$this->getModuleName(),
			$info
		);
	}

	public function getDescription() {
		return array(
			'Returns the list of repositories supported by ExtensionDistributor'
		);
	}

	public function getExamples() {
		return 'api.php?action=query&list=extdistrepos';
	}
}
