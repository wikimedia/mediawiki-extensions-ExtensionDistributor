<?php

/**
 * Special page that allows users to download skins as tar archives.
 */
class SpecialSkinDistributor extends SpecialBaseDistributor {

	protected $type = ExtDistProvider::SKINS;

	public function __construct() {
		parent::__construct( 'SkinDistributor' );
	}
}
