<?php

class ExtensionDistributorHooks {

	/**
	 * @param ApiQuerySiteinfo $api
	 * @param array &$data
	 */
	public static function onAPIQuerySiteInfoGeneralInfo( ApiQuerySiteinfo $api, array &$data ) {
		global $wgExtDistSnapshotRefs, $wgExtDistListFile;
		$data['extensiondistributor'] = [
			'snapshots' => $wgExtDistSnapshotRefs,
			'list' => $wgExtDistListFile ?: ''
		];
		$api->getResult()->setIndexedTagName(
			$data['extensiondistributor']['snapshots'],
			'snapshot'
		);
	}
}
