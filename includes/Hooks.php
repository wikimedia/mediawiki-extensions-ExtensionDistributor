<?php

namespace MediaWiki\Extension\ExtensionDistributor;

use ApiQuerySiteinfo;

class Hooks {

	/**
	 * @param ApiQuerySiteinfo $api
	 * @param array &$data
	 */
	public static function onAPIQuerySiteInfoGeneralInfo( ApiQuerySiteinfo $api, array &$data ) {
		$config = $api->getConfig();
		$data['extensiondistributor'] = [
			'snapshots' => $config->get( 'ExtDistSnapshotRefs' ),
			'list' => $config->get( 'ExtDistListFile' ) ?: ''
		];
		$api->getResult()->setIndexedTagName(
			$data['extensiondistributor']['snapshots'],
			'snapshot'
		);
	}
}
