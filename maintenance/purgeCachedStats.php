<?php

use MediaWiki\Extension\ExtensionDistributor\Stats\ExtDistGraphiteStats;
use MediaWiki\Logger\LoggerFactory;
use MediaWiki\Maintenance\Maintenance;

// @codeCoverageIgnoreStart
if ( getenv( 'MW_INSTALL_PATH' ) ) {
	$IP = getenv( 'MW_INSTALL_PATH' );
} else {
	$IP = __DIR__ . '/../../..';
}
require_once "$IP/maintenance/Maintenance.php";
// @codeCoverageIgnoreEnd

/**
 * @author Addshore
 */
class PurgeCachedStats extends Maintenance {

	public function __construct() {
		parent::__construct();
		$this->addDescription( "Purge cached ExtensionDistributor stats" );
		$this->requireExtension( 'ExtensionDistributor' );
	}

	public function execute() {
		$graphiteStats = new ExtDistGraphiteStats();
		$graphiteStats->setLogger( LoggerFactory::getInstance( 'ExtensionDistributor' ) );
		$graphiteStats->clearCache();
		$this->output( "Done.\n" );
	}

}

// @codeCoverageIgnoreStart
$maintClass = PurgeCachedStats::class;
require_once RUN_MAINTENANCE_IF_MAIN;
// @codeCoverageIgnoreEnd
