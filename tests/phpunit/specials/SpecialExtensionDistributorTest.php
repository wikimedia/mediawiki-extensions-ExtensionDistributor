<?php

use MediaWiki\Extension\ExtensionDistributor\Specials\SpecialExtensionDistributor;

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
		return new SpecialExtensionDistributor();
	}

	public function testSpecialPageDoesNotFatal() {
		$this->executeSpecialPage();
		$this->assertTrue( true );
	}
}
