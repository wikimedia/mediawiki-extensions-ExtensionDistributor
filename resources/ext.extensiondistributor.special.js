/* global OO, window */
( function ( $, mw, OO ) {
	'use strict';
	$( function () {
		// infusing the DropdownInputWidgets makes
		// them look prettier.
		var selector = OO.ui.infuse( 'mw-extdist-selector' ),
			distributorType, progress,
			$continue = $( '#mw-extdist-continue' );
		if ( mw.config.get( 'wgCanonicalSpecialPageName' ) === 'ExtensionDistributor' ) {
			distributorType = 'extensions';
		} else {
			distributorType = 'skins';
		}

		/**
		 * Note: Keep this in-sync with the PHP version
		 *
		 * @param {string} version
		 * @return {string}
		 */
		function formatVersion( version ) {
			if ( version.indexOf( 'REL' ) === 0 ) {
				return version.slice( 3 ).replace( '_', '.' );
			} else {
				return version;
			}
		}

		/**
		 * Note: Keep this in-sync with the PHP version
		 *
		 * @param {string} branch
		 * @return {string}
		 */
		function formatBranch( branch ) {
			var version = formatVersion( branch );
			if ( branch === 'master' ) {
				// Special case
				return mw.msg( 'extdist-branch-alpha' );
			} else if ( branch === mw.config.get( 'wgExtDistDefaultSnapshot' ) ) {
				return mw.msg( 'extdist-branch-stable', version );
			} else if ( branch === mw.config.get( 'wgExtDistCandidateSnapshot' ) ) {
				return mw.msg( 'extdist-branch-candidate', version );
			} else {
				return version;
			}
		}

		function processAPIResponse( data ) {
			var info = data.query.extdistbranches[ distributorType ][ selector.getValue() ],
				options = [],
				versionSelector,
				versionButton;
			$.each( mw.config.get( 'wgExtDistSnapshotRefs' ), function ( i, value ) {
				if ( info[ value ] ) {
					options.push( { data: value, label: formatBranch( value ) } );
				}
			} );
			// Hide progress bar
			progress.$element.remove();
			if ( !options.length ) {
				// Eek, no branches found....
				$continue.text( mw.message(
						'extdist-no-versions-' + distributorType,
						selector.getValue()
				).text() );
				return;
			}
			versionSelector = new OO.ui.DropdownInputWidget( {
				id: 'mw-extdist-selector-version',
				options: options,
				value: mw.config.get( 'wgExtDistDefaultSnapshot' ),
				name: 'extdist_version'
			} );
			// JS parser doesn't handle \n\n, see T100229
			$continue.html( mw.message(
				'extdist-choose-version-' + distributorType,
				selector.getValue()
			).parse().replace( /\n\n/g, '<p>' ) );
			// Add version selector after the help text
			$continue.after( versionSelector.$element );
			versionButton = new OO.ui.ButtonInputWidget( {
				id: 'mw-extdist-submit-button',
				name: 'extdist_submit',
				label: mw.msg( 'extdist-submit-version' ),
				flags: [ 'primary', 'progressive' ]
			} ).on( 'click', function () {
				// Redirect to download page:
				// extdist_name=ExtensionDistributor&extdist_version=master
				window.location.href = mw.util.getUrl( mw.config.get( 'wgPageName' ), {
					// jscs:disable requireCamelCaseOrUpperCaseIdentifiers
					extdist_name: selector.getValue(),
					extdist_version: versionSelector.getValue()
					// jscs:enable requireCamelCaseOrUpperCaseIdentifiers
				} );
			} );
			versionSelector.$element.after( versionButton.$element );
		}
		selector.on( 'change', function () {
			var params;
			// Hide any things created for previous selections
			$( '#mw-extdist-selector-version' ).remove();
			$( '#mw-extdist-submit-button' ).remove();
			$continue.text( '' );
			// Add a progress bar to the page
			progress = new OO.ui.ProgressBarWidget();
			$continue.before( progress.$element );
			params = {
				action: 'query',
				list: 'extdistbranches',
				// Set maxage of 30 minutes, which is same as server-side cache
				maxage: 30 * 60,
				smaxage: 30 * 60
			};
			if ( distributorType === 'extensions' ) {
				params.edbexts = selector.getValue();
			} else {
				params.edbskins = selector.getValue();
			}

			( new mw.Api() ).get( params ).done( processAPIResponse );
		} );

		$( '.mw-extdist-plinks' ).on( 'click', function ( e ) {
			var name = $( this ).data( 'name' );
			e.preventDefault();
			selector.setValue( name );
			return false;
		} );
	} );
}( jQuery, mediaWiki, OO ) );
