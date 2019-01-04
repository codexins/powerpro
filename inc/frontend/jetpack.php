<?php
/**
 * Jetpack Compatibility File.
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_infinite_scroll_render' ) ) {
	/**
	 * Custom render function for Jetpack Infinite Scroll.
	 *
	 * @since   v1.0
	 */
	function codexin_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/post/content', get_post_format() );
		}
	}
}

if ( ! function_exists( 'codexin_jetpack_social_menu' ) ) {
	/**
	 * Only display social menu if function exists.
	 *
	 * @since   v1.0
	 */
	function codexin_jetpack_social_menu() {
		if ( ! function_exists( 'jetpack_social_menu' ) ) {
			return;
		} else {
			jetpack_social_menu();
		}
	}
}
