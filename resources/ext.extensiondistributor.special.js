( function () {
	'use strict';
	$( function () {
		// infusing the DropdownInputWidgets makes
		// them look prettier.
		var selector = OO.ui.infuse( $( '.mw-extdist-selector' ) ),
			distributorType, progress,
			$continue = $( '.mw-extdist-continue' );
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

		/**
		 * Set up a handler for someone pressing back
		 *
		 * @param {Object} event
		 */
		window.onpopstate = function ( event ) {
			if ( event.state && event.state.name ) {
				// This will trigger our change function below
				selector.setValue( event.state.name );
			}
		};

		/**
		 * If history.pushState is supported, set the new URL
		 *
		 * @param {string} name
		 */
		function updateURL( name ) {
			if ( history.pushState ) {
				history.pushState(
					{ name: name },
					name,
					mw.util.getUrl( mw.config.get( 'wgPageName' ) + '/' + name )
				);
			}
		}

		/**
		 * Handle an API response after the selector is changed
		 *
		 * @param {Object} data
		 */
		function processAPIResponse( data ) {
			var info = data.query.extdistbranches[ distributorType ][ selector.getValue() ],
				options = [],
				versionField,
				versionSelector,
				versionButton;
			$.each( mw.config.get( 'wgExtDistSnapshotRefs' ), function ( i, value ) {
				if ( info[ value ] ) {
					options.push( { data: value, label: formatBranch( value ) } );
				}
			} );
			updateURL( selector.getValue() );
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
				classes: [ 'mw-extdist-selector-version' ],
				options: options,
				value: mw.config.get( 'wgExtDistDefaultSnapshot' ),
				name: 'extdistversion'
			} );
			// JS parser doesn't handle \n\n, see T100229
			$continue.html( mw.message(
				'extdist-choose-version-' + distributorType,
				selector.getValue()
			).parse().replace( /\n\n/g, '<p>' ) );
			versionButton = new OO.ui.ButtonInputWidget( {
				classes: [ 'mw-extdist-submit-button' ],
				label: mw.msg( 'extdist-submit-version' ),
				flags: [ 'primary', 'progressive' ]
			} ).on( 'click', function () {
				// Redirect to download page:
				// extdistname=ExtensionDistributor&extdistversion=master
				window.location.href = mw.util.getUrl( mw.config.get( 'wgPageName' ), {
					extdistname: selector.getValue(),
					extdistversion: versionSelector.getValue()
				} );
			} );
			versionField = new OO.ui.ActionFieldLayout( versionSelector, versionButton, {
				align: 'top'
			} );
			// Add version selector after the help text
			$continue.after( versionField.$element );
		}
		selector.on( 'change', function () {
			var params;
			// Hide any things created for previous selections
			$( '.mw-extdist-selector-version' ).remove();
			$( '.mw-extdist-submit-button' ).remove();
			$continue.text( '' );

			// If they pick the empty option, just bail out here
			if ( !selector.getValue() ) {
				return;
			}

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
}() );
