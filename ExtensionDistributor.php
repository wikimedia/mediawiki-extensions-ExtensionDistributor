<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'ExtensionDistributor' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['ExtensionDistributor'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['ExtensionDistributorAliases'] = __DIR__ . '/ExtensionDistributor.alias.php';
	/* wfWarn(
		'Deprecated PHP entry point used for ExtensionDistributor extension. Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return;
} else {
	die( 'This version of the ExtensionDistributor extension requires MediaWiki 1.25+' );
}
