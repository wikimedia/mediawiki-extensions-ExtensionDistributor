<?php

/**
 * This is an extension for distributing snapshot archives of extensions,
 * to be run on mediawiki.org
 */

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'Extension Distributor',
	'author'         => array( 'Tim Starling', 'Sam Reed', 'Chad Horohoe' ),
	'url'            => 'https://www.mediawiki.org/wiki/Extension:ExtensionDistributor',
	'descriptionmsg' => 'extensiondistributor-desc',
);

/********************
 * Configuration
 */

/**
 * File to fetch list of extensions from, with one extension per line
 *
 * Example url: https://gerrit.wikimedia.org/mediawiki-extensions.txt
 */
$wgExtDistListFile = false;

/**
 * URL to get a Location: header from for the actual archive. This is based on
 * GitHub's REST API for fetching archives. In theory, it could be any service
 * that can respond with a 302 and a Location: header pointing to where the
 * archive can be retrieved. That archive should be a tar.gz file, and contain
 * a content-disposition header of the format:
 *    "attachment; filename=<extension>-<sha1>.tar.gz"
 *
 * Example url: https://api.github.com/repos/wikimedia/mediawiki-extensions-$EXT/tarball/$REF
 *
 * $EXT is replaced with the extension name (eg: ParserFunctions)
 * "tarball" is the archive format
 * $REF is the branch/tag name (eg: master, REL1_21)
 */
$wgExtDistArchiveAPI = false;

/**
 * Supported branches/tags, master is the default (and shouldn't be removed)
 */
$wgExtDistSnapshotRefs = array(
	'master',
);

/**
 * Proxy to use, if not the default proxy
 */
$wgExtDistProxy = false;

/********************
 * Registration
 */
$dir = __DIR__ . '/';

// Internationlization files
$wgMessagesDirs['ExtensionDistributor'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ExtensionDistributor'] = $dir . 'ExtensionDistributor.i18n.php';
$wgExtensionMessagesFiles['ExtensionDistributorAliases'] = $dir . 'ExtensionDistributor.alias.php';

// Special page classes
$wgSpecialPages['ExtensionDistributor'] = 'SpecialExtensionDistributor';
$wgSpecialPageGroups['ExtensionDistributor'] = 'developer';
$wgAutoloadClasses['SpecialExtensionDistributor'] = $dir . 'SpecialExtensionDistributor.php';
