<?php

namespace MediaWiki\Extension\ExtensionDistributor\Specials;

use MediaWiki\Extension\ExtensionDistributor\Providers\ExtDistProvider;
use Wikimedia\Stats\IBufferingStatsdDataFactory;

/**
 * Special page that allows users to download extensions as tar archives.
 *
 * @author Tim Starling
 */
class SpecialExtensionDistributor extends SpecialBaseDistributor {

	/** @var string */
	protected $type = ExtDistProvider::EXTENSIONS;

	/**
	 * @param IBufferingStatsdDataFactory $statsFactory
	 */
	public function __construct( IBufferingStatsdDataFactory $statsFactory ) {
		parent::__construct( 'ExtensionDistributor', $statsFactory );
	}

	protected function getPopularList() {
		$list = parent::getPopularList();
		if ( $list ) {
			return $list;
		}

		return $this->getConfig()->get( 'ExtDistPopularExtList' ) ?: false;
	}
}
