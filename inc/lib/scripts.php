<?php
/**
 * Functions definition to add stylesheets and scripts for frontend
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

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
		 */

		// Bootstrap.
		wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.min.css' ), array(), '4.2.1', 'all' );

		$typography_body = codexin_get_option( 'cx_body_font' );

		// Register Google fonts fallback if not set from theme options.
		if ( ! isset( $typography_body['font-family'] ) || '' === $typography_body['font-family'] ) {
			wp_enqueue_style( 'codexin-fonts', codexin_default_google_fonts(), array(), null );
		}

		// Font Awesome Icon Font.
		wp_enqueue_style( 'font-awesome', get_theme_file_uri( 'assets/css/font-awesome.min.css' ), array(), '4.7.0', 'all' );

		// Ionicons Icon Font.
		wp_enqueue_style( 'ionicons', get_theme_file_uri( 'assets/css/ionicons.min.css' ), array(), '4.4.6', 'all' );

		// Animate CSS.
		wp_enqueue_style( 'animate', get_theme_file_uri( 'assets/css/animate.min.css' ), array(), '3.7.0', 'all' );

		// Superfish Menu.
		wp_enqueue_style( 'jquery-superfish', get_theme_file_uri( 'assets/css/superfish.min.css' ), array(), '1.7.10', 'all' );

		// Swiper Slider.
		wp_enqueue_style( 'swiper', get_theme_file_uri( 'assets/css/swiper.min.css' ), array(), '4.4.2', 'all' );

		// Photoswipe.
		wp_enqueue_style( 'photoswipe', get_theme_file_uri( 'assets/css/photoswipe.min.css' ), array(), '4.1.2', 'all' );

		// Photoswipe default skin.
		wp_enqueue_style( 'photoswipe-default-skin', get_theme_file_uri( 'assets/css/photoswipe-default-skin.min.css' ), array(), '4.1.2', 'all' );

		// Mobile Menu.
		wp_enqueue_style( 'slide-push-menu', get_theme_file_uri( 'assets/css/mobile-menu.css' ), array(), '1.0', 'all' );

		// Shotcodes.
		wp_enqueue_style( 'codexin-shortcodes', get_theme_file_uri( 'assets/css/shortcodes.css' ), array(), '1.0', 'all' );

		// Main Stylesheet.
		wp_enqueue_style( 'codexin-main', get_theme_file_uri( 'style.css' ), array(), '1.0', 'all' );

		/**
		 * Load the scripts
		 */

		// Popper JS.
		wp_enqueue_script( 'popper', get_theme_file_uri( 'assets/js/popper.min.js' ), array( 'jquery' ), '1.14.6', true );

		// Bootstrap.
		wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/js/bootstrap.min.js' ), array( 'jquery' ), '4.2.1', true );

		// Modernizr.
		wp_enqueue_script( 'modernizr-js', get_theme_file_uri( 'assets/js/modernizr-custom.min.js' ), array( 'jquery' ), '2.8.3', true );

		// Hover Intent.
		wp_enqueue_script( 'hoverintent-js', get_theme_file_uri( 'assets/js/hoverIntent.js' ), array( 'jquery' ), '1.1', true );

		// Query Easing.
		wp_enqueue_script( 'jquery-easing-js', get_theme_file_uri( 'assets/js/jquery.easing.1.3.js' ), array( 'jquery' ), '1.3', true );

		// Superfish Menu.
		wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( 'assets/js/superfish.min.js' ), array( 'jquery' ), '1.7.10', true );

		// Swiper Slider.
		wp_enqueue_script( 'swiper', get_theme_file_uri( 'assets/js/swiper.min.js' ), array( 'jquery' ), '4.4.2', true );

		// Photoswipe.
		wp_enqueue_script( 'photoswipe', get_theme_file_uri( 'assets/js/photoswipe.min.js' ), array( 'jquery' ), '4.1.2', true );

		// Photoswipe default ui.
		wp_enqueue_script( 'photoswipe-ui-default', get_theme_file_uri( 'assets/js/photoswipe-ui-default.min.js' ), array( 'jquery' ), '4.1.2', true );

		// Photoswipe trigger.
		wp_enqueue_script( 'photoswipe-trigger', get_theme_file_uri( 'assets/js/photoswipe-trigger.js' ), array( 'jquery' ), '4.1.2', true );

		// Mobile Menu.
		wp_enqueue_script( 'slide-push-menu-js', get_theme_file_uri( 'assets/js/mobile-menu.min.js' ), array( 'jquery' ), '1.0', true );

		// Sticky JS.
		wp_enqueue_script( 'sticky-js', get_theme_file_uri( 'assets/js/jquery.sticky.js' ), array( 'jquery' ), '1.0', true );

		// Comment Reply Ajax Support.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Main Script.
		wp_enqueue_script( 'codexin-main-script', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), '1.0', true );
	}
} // End if().

// Hooking the styles and scripts into wp_enqueue_scripts.
add_action( 'wp_enqueue_scripts', 'codexin_framework_scripts' );
