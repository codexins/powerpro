<?php

/**
 * Functions definition to add stylesheets and scripts for frontend
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

if ( ! function_exists( 'codexin_framework_scripts' ) ) {
	/**
	 * Enquequing stylesheets and scripts
	 *
	 * @uses 	wp_enqueue_style()
	 * @uses 	wp_enqueue_script()
	 * @since 	v1.0
	 */
	function codexin_framework_scripts() {

		/**
		 * Load the stylesheets
		 *
		 */

		// Bootstrap
		wp_enqueue_style( 'bootstrap', trailingslashit( get_template_directory_uri() ) . 'assets/css/bootstrap.min.css', false, '4.1.3', 'all' );

	    $typography_body = codexin_get_option( 'cx_typography_body' );

	    // Register Google fonts fallback if not set from theme options.
	    if( ! isset( $typography_body['font-family'] ) || $typography_body['font-family'] == '' ) {
	        wp_enqueue_style( 'codexin-fonts', codexin_default_google_fonts(), array(), null );
	    }

		// Font Awesome Icon Font
		wp_enqueue_style( 'font-awesome', trailingslashit( get_template_directory_uri() ) . 'assets/css/font-awesome.min.css', false, '4.7.0', 'all');

		// Ionicons Icon Font
		wp_enqueue_style( 'ionicons', trailingslashit( get_template_directory_uri() ) . 'assets/css/ionicons.min.css', false, '4.4.6', 'all');

		// Animate CSS
		wp_enqueue_style( 'animate', trailingslashit( get_template_directory_uri() ) . 'assets/css/animate.min.css', false, '3.7.0', 'all');

		// Superfish Menu
		wp_enqueue_style( 'jquery-superfish', trailingslashit( get_template_directory_uri() ) . 'assets/css/superfish.min.css', false, '1.7.10', 'all');

		// Swiper Slider
		if( ! wp_style_is( 'swiper', 'enqueued' ) ) {
			wp_enqueue_style( 'swiper', trailingslashit( get_template_directory_uri() ) . 'assets/css/swiper.min.css', false, '4.4.2', 'all');
		}

		// Photoswipe
		if( ! wp_style_is( 'photoswipe', 'enqueued' ) ) {
			wp_enqueue_style( 'photoswipe', trailingslashit( get_template_directory_uri() ) . 'assets/css/photoswipe.min.css', false, '4.1.2', 'all');
		}

		// Mobile Menu
		wp_enqueue_style( 'mobile-menu', trailingslashit( get_template_directory_uri() ) . 'assets/css/mobile-menu.css', false, '1.0', 'all');

		// Shotcodes
		wp_enqueue_style( 'codexin-shortcodes', trailingslashit( get_template_directory_uri() ) . 'assets/css/shortcodes.css', false, '1.0', 'all');

		// Main Stylesheet
		wp_enqueue_style( 'codexin-main', get_stylesheet_uri(), false, '1.0', 'all');

		/**
		 * Load the scripts
		 *
		 */

		// Popper JS
		wp_enqueue_script( 'popper', trailingslashit( get_template_directory_uri() ) . 'assets/js/popper.min.js', array ( 'jquery' ), 1.0, true);

		// Bootstrap
		wp_enqueue_script( 'bootstrap', trailingslashit( get_template_directory_uri() ) . 'assets/js/bootstrap.min.js', array ( 'jquery' ), 4.1, true);

		// Modernizr
		wp_enqueue_script( 'modernizr-js', trailingslashit( get_template_directory_uri() ) . 'assets/js/modernizr-custom.min.js', array ( 'jquery' ), 2.8, true);

		// Hover Intent
		wp_enqueue_script( 'hoverintent-js', trailingslashit( get_template_directory_uri() ) . 'assets/js/hoverIntent.js', array ( 'jquery' ), 1.1, true);

		// Query Easing
		wp_enqueue_script( 'jquery-easing-js', trailingslashit( get_template_directory_uri() ) . 'assets/js/jquery.easing.1.3.js', array ( 'jquery' ), 1.3, true);

		// Superfish Menu
		wp_enqueue_script( 'jquery-superfish', trailingslashit( get_template_directory_uri() ) . 'assets/js/superfish.min.js', array ( 'jquery' ), 1.7, true);

		// Swiper Slider
		if( ! wp_script_is( 'swiper', 'enqueued' ) ) {
			wp_enqueue_script( 'swiper', trailingslashit( get_template_directory_uri() ) . 'assets/js/swiper.min.js', array ( 'jquery' ), 4.4, true);
		}

		// Photoswipe
		if( ! wp_script_is( 'photoswipe', 'enqueued' ) ) {
			wp_enqueue_script( 'photoswipe', trailingslashit( get_template_directory_uri() ) . 'assets/js/photoswipe.js', array ( 'jquery' ), 4.1, true);
		}

		// Mobile Menu
		wp_enqueue_script( 'mobile-menu-js', trailingslashit( get_template_directory_uri() ) . 'assets/js/mobile-menu.min.js', array ( 'jquery' ), 1.0, true);

		// Comment Reply Ajax Support
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Main Script
		wp_enqueue_script( 'codexin-main-script', trailingslashit( get_template_directory_uri() ) . 'assets/js/main.js', array ( 'jquery' ), 1.0, true);
	}

} // codexin_framework_scripts ()

// Hooking the styles and scripts into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'codexin_framework_scripts');
?>