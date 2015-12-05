<?php

/**
 * Special page that allows users to download extensions as tar archives.
 *
 * @author Tim Starling
 */
class SpecialExtensionDistributor extends SpecialBaseDistributor {

	protected $type = ExtDistProvider::EXTENSIONS;

	public function __construct() {
		parent::__construct( 'ExtensionDistributor' );
	}

	protected function getPopularList() {
		global $wgExtDistPopularExtList;

		$list = parent::getPopularList();
		if ( $list ) {
			return $list;
		}

		return $wgExtDistPopularExtList ?: false;
	}
}
