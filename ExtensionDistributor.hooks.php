<?php

class ExtensionDistributorHooks {

	/**
	 * @param ApiQuerySiteInfo $api
	 * @param array $data
	 * @return bool
	 */
	public static function onAPIQuerySiteInfoGeneralInfo( ApiQuerySiteInfo $api, array &$data ) {
		global $wgExtDistSnapshotRefs, $wgExtDistListFile;
		$data['extensiondistributor'] = array(
			'snapshots' => $wgExtDistSnapshotRefs,
			'list' => $wgExtDistListFile ?: ''
		);
		$api->getResult()->setIndexedTagName(
			$data['extensiondistributor']['snapshots'],
			'snapshot'
		);

		return true;
	}

	/**
	 * Handler for UnitTestsList hook.
	 * @see http://www.mediawiki.org/wiki/Manual:Hooks/UnitTestsList
	 * @param &$files Array of unit test files
	 * @return bool true in all cases
	 */
	public static function onUnitTestsList( &$files ) {
		// @codeCoverageIgnoreStart
		$directoryIterator = new RecursiveDirectoryIterator( __DIR__ . '/tests/' );

		/**
		 * @var SplFileInfo $fileInfo
		 */
		$ourFiles = array();
		foreach ( new RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
			if ( substr( $fileInfo->getFilename(), -8 ) === 'Test.php' ) {
				$ourFiles[] = $fileInfo->getPathname();
			}
		}

		$files = array_merge( $files, $ourFiles );

		return true;
		// @codeCoverageIgnoreEnd
	}

}
