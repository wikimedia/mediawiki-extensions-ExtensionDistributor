<?php

/**
 * @covers SpecialSkinDistributor
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
