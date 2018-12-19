/**
 * File post-format.js.
 *
 * Corresponding Post Format metabox fields display.
 *
 * Contains logics to show/hide metabox fields.
 */

jQuery( document ).ready(function( $ ) {
	"use strict";

	var metaboxes = [
		"#codexin-gallery-meta",
		"#codexin-video-meta",
		"#codexin-audio-meta",
		"#codexin-quote-meta",
		"#codexin-link-meta",
	];

	var ids = metaboxes.join( ", " );

	// Default Hide.
	$( ids ).hide();

	$( "#post-formats-select input:radio[name=post_format]" ).change(function() {

		var cx_input_selected = $( "#post-formats-select input:radio[name=post_format]:checked" ).val();

		// Hide during changing.
		$( ids ).hide();
		if ( this.value == cx_input_selected ) {
			$( "#codexin-" + cx_input_selected + "-meta" ).show().insertAfter( $( "#titlediv" ) ).css( { "marginTop": "20px", "marginBottom": "0px" } );
		}
	});

	var cx_input_selected = $( "#post-formats-select input:radio[name=post_format]:checked" ).val();

	// Show Default checked.
	$( "#codexin-" + cx_input_selected + "-meta" ).show().insertAfter( $( "#titlediv" ) ).css( { "marginTop": "20px", "marginBottom": "0px" } );
});
