<?php
/**
 * Defines locations for sidebar and footer widgets.
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_widgets_init' ) ) {
	/**
	 * Registering various widget locations for the theme.
	 *
	 * @since v1.0
	 */
	function codexin_widgets_init() {

		$footer_layout = ! empty( codexin_get_option( 'footer_layout_setting' ) ) ? codexin_get_option( 'footer_layout_setting' ) : 'four';
		$widget_count = 4;

		if ( 'two' === $footer_layout ) {
			$widget_count = 2;
		} elseif ( 'three' === $footer_layout ) {
			$widget_count = 3;
		} elseif ( 'five' === $footer_layout ) {
			$widget_count = 5;
		} else {
			$widget_count = 4;
		}

		register_sidebar( array(
			'name'				=> esc_html__( 'Sidebar (General)', 'powerpro' ),
			'id'				=> 'codexin-sidebar-general',
			'description'		=> esc_html__( 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.', 'powerpro' ),
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget">',
			'after_widget'  	=> '</div>',
		) );

		register_sidebar( array(
			'name'				=> esc_html__( 'Sidebar (Pages)', 'powerpro' ),
			'id'				=> 'codexin-sidebar-page',
			'description'		=> esc_html__( 'This sidebar will show on all Pages.', 'powerpro' ),
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget">',
			'after_widget'  	=> '</div>',
		) );

		register_sidebar( array(
			'name' 				=> esc_html__( 'Sidebar (Blog)', 'powerpro' ),
			'id'				=> 'codexin-sidebar-blog',
			'description'		=> esc_html__( 'This sidebar will show on all blog Posts.', 'powerpro' ),
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget">',
			'after_widget'  	=> '</div>',
		) );

		if( codexin_get_option( 'cx_enable_footer_widget' ) ) {
			for ( $i = 1; $i <= $widget_count ; $i++ ) {
				register_sidebar( array(
					/* translators: %s: column number */
					'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'powerpro' ), $i ),
					'id'				=> 'codexin-footer-col-' . $i . '',
					/* translators: %s: column number */
					'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'powerpro' ), $i ),
					'before_title'		=> '<h4 class="widgettitle">',
					'after_title'		=> '</h4>',
					'before_widget' 	=> '<aside id="%1$s" class="%2$s footer-widget">',
					'after_widget'  	=> '</aside>',
				) );
			}
		}
	}
} // End if().

// Hooking into widgets_init.
add_action( 'widgets_init', 'codexin_widgets_init' );
