<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param   array $classes Classes for the body element.
	 * @return  array
	 * @since   v1.0
	 */
	function codexin_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Page Sidebar conditional check.
		if ( is_page() && ( is_active_sidebar( 'codexin-sidebar-page' ) || is_active_sidebar( 'codexin-sidebar-general' ) ) ) {
			if ( is_page_template( 'page-templates/page-full-width.php' ) || is_page_template( 'page-templates/page-home.php' ) || is_page_template( 'page-templates/page-no-sidebar.php' ) ) {
				$classes[] = 'page-sidebar-inactive';
			} else {
				$classes[] = 'page-sidebar-active';
			}
		}

		if ( ! is_front_page() & ! is_page() ) {

			// Archive Sidebar conditional check.
			if ( is_home() || is_archive() || is_search() ) {
				$classes[] = ( 'no' === codexin_get_option( 'cx_blog_arc_layout' ) ) ? 'archive-sidebar-inactive' : 'archive-sidebar-active';
			}

			// Single Sidebar conditional check.
			if ( is_single() || is_singular() ) {
				$classes[] = ( 'no' === codexin_get_option( 'cx_blog_single_layout' ) ) ? 'single-sidebar-inactive' : 'single-sidebar-active';
			}
		}

		return $classes;
	}
} // End if().
add_filter( 'body_class', 'codexin_body_classes' );

if ( ! function_exists( 'codexin_adjust_body_class' ) ) {
	/**
	 * Removes tag class from the body_class array to avoid
	 * Bootstrap markup styling issues.
	 *
	 * @param   string $classes CSS classes.
	 * @return  mixed
	 * @since   v1.0
	 */
	function codexin_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;
	}
}
add_filter( 'body_class', 'codexin_adjust_body_class' );

if ( ! function_exists( 'codexin_excerpt_more' ) ) {
    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ...
     *
     * @param string $more Default Read More excerpt link.
     * @return string Filtered Read More excerpt link.
     */
    function codexin_excerpt_more( $more ) {
        return ' &hellip; ';
    }
}
add_filter( 'excerpt_more', 'codexin_excerpt_more' );

if ( ! function_exists( 'codexin_pingback_header' ) ) {
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 *
	 * @uses 	add_action()
	 * @since 	v1.0
	 */
	function codexin_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
add_action( 'wp_head', 'codexin_pingback_header' );

if ( ! function_exists( 'codexin_remove_thumbnail_dimensions' ) ) {
	/**
	 * Removing width & height from featured image
	 *
	 * @param 	string  $html The HTML.
	 * @param 	integer $post_id Post ID.
	 * @param 	integer $post_image_id Image ID.
	 * @return 	mixed
	 * @since 	v1.0
	 */
	function codexin_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
		return $html;
	}
}
add_filter( 'post_thumbnail_html', 'codexin_remove_thumbnail_dimensions', 10, 3 );

/**
 * Providing Shortcode Support on text widget
 *
 * @since v1.0
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Removing srcset from featured image
 *
 * @since v1.0
 */
add_filter( 'max_srcset_image_width', function() {
	return 1;
});