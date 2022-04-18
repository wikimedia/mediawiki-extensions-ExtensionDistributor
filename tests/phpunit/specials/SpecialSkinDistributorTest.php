<?php

use MediaWiki\Extension\ExtensionDistributor\Specials\SpecialSkinDistributor;

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
		$mockStatsDataFactory = $this->createMock( IBufferingStatsdDataFactory::class );
		return new SpecialSkinDistributor( $mockStatsDataFactory );
	}

	public function testSpecialPageDoesNotFatal() {
		$this->executeSpecialPage();
		$this->assertTrue( true );
	}
}
