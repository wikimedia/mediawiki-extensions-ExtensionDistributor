<?php

namespace MediaWiki\Extension\ExtensionDistributor;

use ApiQuerySiteinfo;
use MediaWiki\Api\Hook\APIQuerySiteInfoGeneralInfoHook;

class Hooks implements APIQuerySiteInfoGeneralInfoHook {

	/**
	 * @param ApiQuerySiteinfo $api
	 * @param array &$data
	 */
	public function onAPIQuerySiteInfoGeneralInfo( $api, &$data ) {
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
