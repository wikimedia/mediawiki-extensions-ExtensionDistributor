<?php

/**
 * This is an extension for distributing snapshot archives of extensions,
 * to be run on mediawiki.org
 */

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'Extension Distributor',
	'author'         => array( 'Tim Starling', 'Sam Reed', 'Chad Horohoe', 'Kunal Mehta' ),
	'url'            => 'https://www.mediawiki.org/wiki/Extension:ExtensionDistributor',
	'descriptionmsg' => 'extensiondistributor-desc',
);

define( 'MW_ED_SUPPORTS_SKINS', true );

/********************
 * Configuration
 */

/**
 * Configuration for the API client to use
 *
 * Must have a 'class' key, can either be
 * "GithubExtDistProvider" or "GerritExtDistProvider"
 *
 * Common parameters:
 *  'apiUrl' - API url to use with $EXT and $REF variables
 *  'tarballUrl' - API url where tarballs are located
 *  'tarballName' - Expected filename of tarballs
 *  'proxy' - Proxy to use (optional)
 *
 * Github specific parameters:
 *  'token' - An OAuth token for authenticating requests
 *
 * Gerrit specific parameters:
 *  'repoListUrl' - API url to fetch a list of repositories
 *
 * @var array
 */
$wgExtDistAPIConfig = false;

/**
 * File to fetch list of extensions from, with one extension per line
 *
 * Example url: https://gerrit.wikimedia.org/mediawiki-extensions.txt
 */
$wgExtDistListFile = false;

/**
 * Supported branches/tags, master is the default (and shouldn't be removed)
 */
$wgExtDistSnapshotRefs = array(
	'master',
);

/********************
 * Registration
 */

// Internationlization files
$wgMessagesDirs['ExtensionDistributor'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ExtensionDistributor'] = __DIR__ . '/ExtensionDistributor.i18n.php';
$wgExtensionMessagesFiles['ExtensionDistributorAliases'] = __DIR__ . '/ExtensionDistributor.alias.php';

// Special page classes
$wgSpecialPages['ExtensionDistributor'] = 'SpecialExtensionDistributor';
$wgSpecialPages['SkinDistributor'] = 'SpecialSkinDistributor';
$wgSpecialPageGroups['ExtensionDistributor'] = 'developer';
$wgSpecialPageGroups['SkinDistributor'] = 'developer';
$wgAutoloadClasses['SpecialBaseDistributor'] = __DIR__ . '/specials/SpecialBaseDistributor.php';
$wgAutoloadClasses['SpecialExtensionDistributor'] = __DIR__ . '/specials/SpecialExtensionDistributor.php';
$wgAutoloadClasses['SpecialSkinDistributor'] = __DIR__ . '/specials/SpecialSkinDistributor.php';
$wgAutoloadClasses['ExtDistProvider'] = __DIR__ . '/providers/ExtDistProvider.php';
$wgAutoloadClasses['GerritExtDistProvider'] = __DIR__ . '/providers/GerritExtDistProvider.php';
$wgAutoloadClasses['GithubExtDistProvider'] = __DIR__ . '/providers/GithubExtDistProvider.php';
$wgAutoloadClasses['ApiListExtDistRepos'] = __DIR__ . '/api/ApiListExtDistRepos.php';
$wgAPIListModules['extdistrepos'] = 'ApiListExtDistRepos';
$wgHooks['APIQuerySiteInfoGeneralInfo'][] = function( ApiQuerySiteInfo $api, array &$data ) {
	global $wgExtDistSnapshotRefs, $wgExtDistListFile;
	$data['extensiondistributor'] = array(
		'snapshots' => $wgExtDistSnapshotRefs,
		'list' => $wgExtDistListFile ? : ''
	);
	$api->getResult()->setIndexedTagName(
		$data['extensiondistributor']['snapshots'],
		'snapshot'
	);

	return true;
};
