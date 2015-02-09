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
}
