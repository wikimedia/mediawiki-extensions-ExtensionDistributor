/* global OO, window */
( function( $, mw, OO ) {
	'use strict';
	$( function() {
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

		function processAPIResponse( data ) {
			var info = data.query.extdistbranches[distributorType][selector.getValue()],
				options = [],
				versionSelector;
			$.each( mw.config.get( 'wgExtDistSnapshotRefs' ), function( i, value ) {
				if ( info[value] ) {
					options.push( { data: value, label: mw.msg( 'extdist-branch-' + value ) } );
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
			var versionButton = new OO.ui.ButtonInputWidget( {
				id: 'mw-extdist-submit-button',
				name: 'extdist_submit',
				label: mw.msg( 'extdist-submit-version' ),
				flags: ['primary', 'progressive']
			} ).on( 'click', function() {
				// Redirect to download page:
				// extdist_name=ExtensionDistributor&extdist_version=master
				window.location.href = mw.util.getUrl( mw.config.get( 'wgPageName' ), {
					'extdist_name': selector.getValue(),
					'extdist_version': versionSelector.getValue()
				} );
			} );
			versionSelector.$element.after( versionButton.$element );
		}
		selector.on( 'change', function() {
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
				list: 'extdistbranches'
			};
			if ( distributorType === 'extensions' ) {
				params.edbexts = selector.getValue();
			} else {
				params.edbskins = selector.getValue();
			}

			( new mw.Api() ).get( params ).done( processAPIResponse );
		} );
	} );
}( jQuery, mediaWiki, OO ) );
