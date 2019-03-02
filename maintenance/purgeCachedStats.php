<?php

use MediaWiki\Logger\LoggerFactory;

if ( getenv( 'MW_INSTALL_PATH' ) ) {
	$IP = getenv( 'MW_INSTALL_PATH' );
} else {
	$IP = __DIR__ . '/../../..';
}
require_once "$IP/maintenance/Maintenance.php";

/**
 * @author Addshore
 */
class ExtDistPurgeCachedStats extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->mDescription = "Purge cached ExtensionDistributor stats";
		$this->requireExtension( 'Extension Distributor' );
	}

	public function execute() {
		$graphiteStats = new ExtDistGraphiteStats();
		$graphiteStats->setLogger( LoggerFactory::getInstance( 'ExtensionDistributor' ) );
		$graphiteStats->clearCache();
		$this->output( "Done.\n" );
	}

}

$maintClass = ExtDistPurgeCachedStats::class;
require_once RUN_MAINTENANCE_IF_MAIN;
