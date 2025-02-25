<?php

use MediaWiki\Extension\ExtensionDistributor\Specials\SpecialSkinDistributor;
use Wikimedia\Stats\StatsFactory;

/**
 * @covers \MediaWiki\Extension\ExtensionDistributor\Specials\SpecialSkinDistributor
 * @covers \MediaWiki\Extension\ExtensionDistributor\Specials\SpecialBaseDistributor
 *
 * @group SpecialPage
 *
 * @author Addshore
 */
class SpecialSkinDistributorTest extends SpecialPageTestBase {

	protected function newSpecialPage() {
		$mockStatsFactory = $this->createMock( StatsFactory::class );
		return new SpecialSkinDistributor( $mockStatsFactory );
	}

	public function testSpecialPageDoesNotFatal() {
		$this->executeSpecialPage();
		$this->assertTrue( true );
	}
}
