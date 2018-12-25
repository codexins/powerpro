/**
 * File customize-preview.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
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

	// Header Search.
    wp.customize( 'cx_enable_header_search', function ( value ) {
        value.bind( function ( to ) {
            if ( to ) {
                $( 'header .header-search' ).show();
            } else {
            	$( 'header .header-search' ).hide();
            }
        });
    });

	// Header Socials.
    wp.customize( 'cx_enable_header_socials', function ( value ) {
        value.bind( function ( to ) {
            if ( to ) {
                $( 'header .header-social' ).show();
            } else {
            	$( 'header .header-social' ).hide();
            }
        });
    });

	// Header Phone.
    wp.customize( 'cx_enable_header_phone', function ( value ) {
        value.bind( function ( to ) {
            if ( to ) {
                $( 'header .header-right>a:first-child').show();
            } else {
            	$( 'header .header-right>a:first-child').hide();
            }
        });
    });

    // Header Phone Text.
    wp.customize( 'cx_header_phone_number', function (value) {
        value.bind( function ( to ) {
            $( 'header .header-right>a:first-child' ).html( to );
        });
    });

    // Header Button Text.
    wp.customize( 'cx_header_button', function (value) {
        value.bind( function ( to ) {
            $( 'header .header-right>a:last-child' ).html( to );
        });
    });
})(jQuery);
