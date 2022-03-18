<?php

namespace MediaWiki\Extension\ExtensionDistributor\Specials;

use MediaWiki\Extension\ExtensionDistributor\Providers\ExtDistProvider;

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
		$list = parent::getPopularList();
		if ( $list ) {
			return $list;
		}

		return $this->getConfig()->get( 'ExtDistPopularExtList' ) ?: false;
	}
}
