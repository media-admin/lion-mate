function pvbCf7CalculatorPoweredByEnable(aElm, msgWait, msgOK) {
	jQuery( aElm ).text( msgWait );
	jQuery.post(
		ajaxurl,
		{action: 'pvb_powered_by_opt_in'},
		function() {
			jQuery( aElm ).text( msgOK );
		}
	);
}

function pvbCf7CalculatorHideAdminNotices(period, target) {
	jQuery( target ).closest( '.notice' ).remove();

	if (period == 1) {
		// Dismiss temporarily
		jQuery.post( ajaxurl, {action: 'pvb_promo_pause'} );
	} else {
		// Dismiss permanently
		jQuery.post( ajaxurl, {action: 'pvb_promo_disable'} );
	}

}
