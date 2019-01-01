<?php
/**
 * Gutenberg: dynamic CSS building up
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_get_option' ) ) {
	/**
	 * Function to pass dynamic css from customizer into block editor
	 *
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_gutenberg_dynamic_css() {

        // Retrieving values from customizer
        $body_bg            = !empty( codexin_get_option( 'cx_body_bg' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_body_bg' ) ) : '#fff';
        $text_color         = !empty( codexin_get_option( 'cx_text_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_text_color' ) ) : '#333';
        $primary_color      = !empty( codexin_get_option( 'cx_primary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_primary_color' ) ) : '#295970';
        $secondary_color    = !empty( codexin_get_option( 'cx_secondary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_secondary_color' ) ): '#fce38a';
        $border_color       = !empty( codexin_get_option( 'cx_border_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_border_color' ) ) : '#ddd';
        $secondary_bg       = !empty( codexin_get_option( 'cx_secondary_bg' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_secondary_bg' ) ) : '#fafafa';
	}
}