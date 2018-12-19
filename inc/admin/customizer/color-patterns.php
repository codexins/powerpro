<?php
/**
 * Framework function to pass colors from customizer
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_color_selectors' ) ) {
	/**
	 * Function to get the selectors to pass colors from customizer
	 *
	 * @return  array
	 * @since   v1.0
	 */
	function codexin_color_selectors() {

		$selectors = array();

		// Primary Color targeting selectors.
		$selectors['primary_color_selectors'] = array(
			'.color-primary',
			'a',
		);

		// Primary color in background targeting selectors.
		$selectors['primary_color_in_bg_selectors'] = array(
			'',
		);

		return $selectors;
	}
}
