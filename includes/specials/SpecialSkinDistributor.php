<?php

/**
 * Special page that allows users to download skins as tar archives.
 *
 * @author Legoktm
 */
class SpecialSkinDistributor extends SpecialBaseDistributor {

	protected $type = ExtDistProvider::SKINS;

	public function __construct() {
		parent::__construct( 'SkinDistributor' );
	}

	protected function getPopularList() {
		global $wgExtDistPopularSkinList;

		$list = parent::getPopularList();
		if ( $list ) {
			return $list;
		}

		return $wgExtDistPopularSkinList ?: false;
	}
}
