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
		return new SpecialSkinDistributor();
	}

	public function testSpecialPageDoesNotFatal() {
		$this->executeSpecialPage();
		$this->assertTrue( true );
	}
}
