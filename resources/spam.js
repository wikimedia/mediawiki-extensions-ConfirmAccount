// Contributed by Mark W. Datysgeld https://icannwiki.org/Mark_W._Datysgeld
function handleSpamForm( html, $li, reviewUrl ) {
	// Parse the HTML and find the confirm form.
	const $doc = $( '<div>' ).append( $.parseHTML( html ) );
	const $form = $doc.find( 'form[name="accountconfirm"]' );
	if ( !$form.length ) {
		mw.notify( mw.msg( 'confirmaccount-cannot-find-form' ), { type: 'error' } );
		return;
	}

	// Collect all form fields (inputs, textareas, selects).
	const data = {};
	$form.find( 'input, textarea, select' ).each( function () {
		const $fld = $( this );
		const name = $fld.attr( 'name' );
		if ( !name ) {
			return;
		}
		const type = $fld.attr( 'type' );
		if ( type === 'radio' ) {
			// Skip all radio buttons; we’ll set wpSubmitType manually.
			return;
		} else if ( type === 'checkbox' ) {
			data[ name ] = $fld.prop( 'checked' ) ? $fld.val() : '';
		} else {
			data[ name ] = $fld.val();
		}
	} );

	// Override fields for the spam action.
	data.wpSubmitType = 'spam';
	data.wpReason = '';

	// Post the form to its action URL.
	const actionUrl = $form.attr( 'action' ) || reviewUrl;
	$.post( actionUrl, data )
		.then(
			() => {
				// On success, remove the entry from the queue.
				$li.addClass( 'fade-out' );
			},
			( _, status, error ) => {
				mw.notify( mw.msg( 'confirmaccount-failed-to-mark', error ), { type: 'error' } );
			} );
}

// Adds spam links on page load
function addSpamLinks() {
	$( 'li.mw-confirmaccount-type-0', document.getElementById( 'mw-content-text' ) ).each( function () {
		const $li = $( this );
		const $reviewLink = $li.find( 'a[href*="acrid="]' ).first();
		if ( !$reviewLink.length ) {
			return;
		}
		const match = $reviewLink.attr( 'href' ).match( /[?&]acrid=(\d+)/ );
		if ( !match ) {
			return;
		}
		const acrid = match[ 1 ];
		const queueTitle = mw.config.get( 'wgPageName' );

		const $spamLink = $( '<a>' )
			.attr( 'href', '#' )
			.attr( 'id', 'confirmaccount-spam-link' )
			.text( mw.msg( 'confirmaccount-spam-link' ) )
			.on( 'click', ( ev ) => {
				ev.preventDefault();
				OO.ui.confirm( mw.msg( 'confirmaccount-mark-request-spam', acrid ) ).then(
					( confirmed ) => {
						if ( confirmed ) {
							// Build the URL of the review page to fetch the form.
							const reviewUrl = mw.util.wikiScript() + '?title=' +
									encodeURIComponent( queueTitle ) + '&acrid=' + encodeURIComponent( acrid );

							// Retrieve the review form via AJAX.
							$.get( reviewUrl ).then(
								( html ) => {
									handleSpamForm( html, $li, reviewUrl );
								},
								() => {
									mw.notify( mw.msg( 'confirmaccount-cannot-load-review' ), { type: 'error' } );
								} );
							return;
						}
					} );
			} );

		$reviewLink.after( ' · ', $spamLink );
	} );
}
$( addSpamLinks );
