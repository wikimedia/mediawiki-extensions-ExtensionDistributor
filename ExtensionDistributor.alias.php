<?php
/**
 * Aliases for extension ExtensionDistributor
 *
 * @file
 * @ingroup Extensions
 */

$specialPageAliases = array();

/** English
 * @author Chad Horohoe
 */
$specialPageAliases['en'] = array(
	'ExtensionDistributor' => array( 'ExtensionDistributor' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;
