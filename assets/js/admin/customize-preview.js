"use strict";
(function ($) {	
	// Header text.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#header_text, .site-description' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
				// Add class for different logo styles if title and description are hidden.
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				$( '#header_text, .site-description' ).css({
					clip: 'auto',
					position: 'relative'
				});
				$( '#header_text, .site-description' ).css({
                    color: to
                });
				// Add class for different logo styles if title and description are visible.
				$( 'body' ).removeClass( 'title-tagline-hidden' );
			}
		});
	});
})(jQuery);