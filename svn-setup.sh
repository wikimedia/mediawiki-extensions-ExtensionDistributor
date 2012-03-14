#!/bin/bash
set -e

svn co -N http://svn.wikimedia.org/svnroot/mediawiki mw-snapshot
cd mw-snapshot
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/trunk
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches
cd branches
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_10
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_11
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_12
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_13
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_14
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_15
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_16
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_17
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_18
svn co -N http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_19
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_10/extensions REL1_10/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_11/extensions REL1_11/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_12/extensions REL1_12/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_13/extensions REL1_13/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_14/extensions REL1_14/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_15/extensions REL1_15/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_16/extensions REL1_16/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_17/extensions REL1_17/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_18/extensions REL1_18/extensions
svn co http://svn.wikimedia.org/svnroot/mediawiki/branches/REL1_19/extensions REL1_19/extensions
cd ../trunk
svn co http://svn.wikimedia.org/svnroot/mediawiki/trunk/extensions
