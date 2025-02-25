<?php

use MediaWiki\Extension\ExtensionDistributor\Specials\SpecialExtensionDistributor;
use Wikimedia\Stats\StatsFactory;

/**
 * @covers \MediaWiki\Extension\ExtensionDistributor\Specials\SpecialExtensionDistributor
 * @covers \MediaWiki\Extension\ExtensionDistributor\Specials\SpecialBaseDistributor
 *
 * @group SpecialPage
 *
 * @author Addshore
 */
class SpecialExtensionDistributorTest extends SpecialPageTestBase {

	protected function newSpecialPage() {
		$mockStatsFactory = $this->createMock( StatsFactory::class );
		return new SpecialExtensionDistributor( $mockStatsFactory );
	}

	public function testSpecialPageDoesNotFatal() {
		$this->executeSpecialPage();
		$this->assertTrue( true );
	}
}
