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

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getDescription() {
		return array(
			'Returns the list of repositories supported by ExtensionDistributor'
		);
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getExamples() {
		return 'api.php?action=query&list=extdistrepos';
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
