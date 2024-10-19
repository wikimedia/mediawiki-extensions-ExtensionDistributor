<?php

use MediaWiki\Extension\ExtensionDistributor\Specials\SpecialExtensionDistributor;
use Wikimedia\Stats\IBufferingStatsdDataFactory;

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
		$mockStatsDataFacotory = $this->createMock( IBufferingStatsdDataFactory::class );
		return new SpecialExtensionDistributor( $mockStatsDataFacotory );
	}

	public function testSpecialPageDoesNotFatal() {
		$this->executeSpecialPage();
		$this->assertTrue( true );
	}
}
