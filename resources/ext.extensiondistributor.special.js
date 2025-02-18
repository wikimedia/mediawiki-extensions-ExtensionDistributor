/* eslint-disable no-jquery/no-global-selector */
( function () {
	'use strict';
	$( () => {
		// infusing the DropdownInputWidgets makes
		// them look prettier.
		const selector = OO.ui.infuse( $( '.mw-extdist-selector' ) ),
			api = new mw.Api(),
			$continue = $( '.mw-extdist-continue' );
		let progress;

		let distributorType;
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
			const version = formatVersion( branch );
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
			const info = data.query.extdistbranches[ distributorType ][ selector.getValue() ],
				options = [];
			mw.config.get( 'wgExtDistSnapshotRefs' ).forEach( ( value ) => {
				if ( info[ value ] ) {
					options.push( { data: value, label: formatBranch( value ) } );
				}
			} );
			updateURL( selector.getValue() );
			// Hide progress bar
			progress.$element.remove();
			if ( !options.length ) {
				// Eek, no branches found....
				// The following messages are used here:
				// * extdist-no-versions-extensions
				// * extdist-no-versions-skins
				$continue.text( mw.message(
					'extdist-no-versions-' + distributorType,
					selector.getValue()
				).text() );
				return;
			}
			const versionSelector = new OO.ui.DropdownInputWidget( {
				classes: [ 'mw-extdist-selector-version' ],
				options: options,
				value: mw.config.get( 'wgExtDistDefaultSnapshot' ),
				name: 'extdistversion'
			} );
			// JS parser doesn't handle \n\n, see T100229
			// The following messages are used here:
			// * extdist-choose-version-extensions
			// * extdist-choose-version-skins
			$continue.html( mw.message(
				'extdist-choose-version-' + distributorType,
				selector.getValue()
			).parse().replace( /\n\n/g, '<p>' ) );
			const versionButton = new OO.ui.ButtonInputWidget( {
				classes: [ 'mw-extdist-submit-button' ],
				label: mw.msg( 'extdist-submit-version' ),
				flags: [ 'primary', 'progressive' ]
			} ).on( 'click', () => {
				// Redirect to download page:
				// extdistname=ExtensionDistributor&extdistversion=master
				window.location.href = mw.util.getUrl( mw.config.get( 'wgPageName' ), {
					extdistname: selector.getValue(),
					extdistversion: versionSelector.getValue()
				} );
			} );
			const versionField = new OO.ui.ActionFieldLayout( versionSelector, versionButton, {
				align: 'top'
			} );
			// Add version selector after the help text
			$continue.after( versionField.$element );
		}
		selector.on( 'change', () => {
			// Abort unfinished requests in case user
			// makes new selection before previous
			// request is done
			if ( progress ) {
				progress.$element.remove();
			}
			api.abort();

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
			const params = {
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

			api.get( params ).done( processAPIResponse );
		} );

		$( '.mw-extdist-plinks' ).on( 'click', function ( e ) {
			const name = $( this ).data( 'name' );
			e.preventDefault();
			selector.setValue( name );
			return false;
		} );
	} );
}() );
