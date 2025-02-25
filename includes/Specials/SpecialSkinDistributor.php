<?php

namespace MediaWiki\Extension\ExtensionDistributor\Specials;

use MediaWiki\Extension\ExtensionDistributor\Providers\ExtDistProvider;
use Wikimedia\Stats\StatsFactory;

/**
 * Special page that allows users to download skins as tar archives.
 *
 * @author Legoktm
 */
class SpecialSkinDistributor extends SpecialBaseDistributor {

	/** @var string */
	protected $type = ExtDistProvider::SKINS;

	/**
	 * @param StatsFactory $statsFactory
	 */
	public function __construct( StatsFactory $statsFactory ) {
		parent::__construct( 'SkinDistributor', $statsFactory );
	}

	/** @inheritDoc */
	protected function getPopularList() {
		$list = parent::getPopularList();
		if ( $list ) {
			return $list;
		}

		return $this->getConfig()->get( 'ExtDistPopularSkinList' ) ?: false;
	}
}
