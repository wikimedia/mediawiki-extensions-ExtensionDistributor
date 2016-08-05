<?php

/**
 * @covers SpecialExtensionDistributor
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
