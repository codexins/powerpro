<?php  

/**
 * Framework function to pass colors from customizer
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

if( ! function_exists( 'codexin_color_selectors' ) ) {
	
	function codexin_color_selectors() {

		$selectors = array();

		// Primary Color targeting selectors
		$selectors['primary_color_selectors'] = array( 
		    '.color-primary', 
		    'a'
		);

		// Primary color in background targeting selectors
		$selectors['primary_color_in_bg_selectors'] = array( 
		    'h1', 
		    'h2', 
		    'h3' 
		);

		return $selectors;
	}
}
?>