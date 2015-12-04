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
	 * Hook to register our ResourceLoader module that depends upon configuration
	 * @todo get rid of this hook
	 * @param ResourceLoader $resourceLoader
	 */
	public static function onResourceLoaderRegisterModules( ResourceLoader &$resourceLoader ) {
		$module = array(
			'scripts' => 'ext.extensiondistributor.special.js',
			'dependencies' => array(
				'mediawiki.api',
				'mediawiki.jqueryMsg',
				'oojs-ui'
			),
			'messages' => array(
				'extdist-choose-version-extensions',
				'extdist-choose-version-skins',
				'extdist-submit-version',
				'extdist-no-versions-extensions',
				'extdist-no-versions-skins',
				'extdist-branch-alpha',
				'extdist-branch-stable',
				'extdist-branch-candidate',
			),
			'localBasePath' => __DIR__ . '/resources',
			'remoteExtPath' => 'ExtensionDistributor/resources',
		);
		$resourceLoader->register( 'ext.extensiondistributor.special', $module );
	}
}
