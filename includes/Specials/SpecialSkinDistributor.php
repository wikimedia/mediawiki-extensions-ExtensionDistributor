<?php

namespace MediaWiki\Extension\ExtensionDistributor\Specials;

use MediaWiki\Extension\ExtensionDistributor\Providers\ExtDistProvider;

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
		$list = parent::getPopularList();
		if ( $list ) {
			return $list;
		}

		return $this->getConfig()->get( 'ExtDistPopularSkinList' ) ?: false;
	}
}
