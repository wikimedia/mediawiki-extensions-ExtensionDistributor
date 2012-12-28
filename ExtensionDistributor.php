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

/** File to fetch list of extensions from */
$wgExtDistListFile = 'https://gerrit.wikimedia.org/mediawiki-extensions.txt';

/**
 * URL to get a Location: header from for the actual archive. This is based on
 * GitHub's REST API for fetching archives. In theory, it could be any service
 * that can respond with a 302 and a Location: header pointing to where the
 * archive can be retrieved. That archive should be a tar.gz file, and contain
 * a content-disposition header of the format:
 *    "attachment; filename=<extension>-<sha1>.tar.gz"
 *
 * $EXT is replaced with the extension name (eg: ParserFunctions)
 * "tarball" is the archive format
 * $REF is the branch name (eg: master, REL1_21)
 */
$wgExtDistArchiveAPI = 'https://api.github.com/repos/wikimedia/mediawiki-extensions-$EXT/tarball/$REF';

/**
 * Supported branches, master is the default (and shouldn't be removed)
 */
$wgExtDistBranches = array(
	'master',
);

/********************
 * Registration
 */
$dir = __DIR__ . '/';

// Internationlization files
$wgExtensionMessagesFiles['ExtensionDistributor'] = $dir . 'ExtensionDistributor.i18n.php';
$wgExtensionMessagesFiles['ExtensionDistributorAliases'] = $dir . 'ExtensionDistributor.alias.php';

// Special page classes
$wgSpecialPages['ExtensionDistributor'] = 'SpecialExtensionDistributor';
$wgSpecialPageGroups['ExtensionDistributor'] = 'developer';
$wgAutoloadClasses['SpecialExtensionDistributor'] = $dir . 'SpecialExtensionDistributor.php';
