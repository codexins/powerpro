<?php
/**
 * The sidebar containing the main widget area
 *
 * @package 	Codexin
 * @subpackage 	Templates
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

if ( is_page() && is_active_sidebar( 'codexin-sidebar-page' ) ) {

	dynamic_sidebar( 'codexin-sidebar-page' );

} elseif ( is_single() && is_active_sidebar( 'codexin-sidebar-blog' ) ) {

	dynamic_sidebar( 'codexin-sidebar-blog' );

} elseif ( is_home() && is_active_sidebar( 'codexin-sidebar-blog' ) ) {

	dynamic_sidebar( 'codexin-sidebar-blog' );

} elseif ( is_archive() && is_active_sidebar( 'codexin-sidebar-blog' ) ) {

	dynamic_sidebar( 'codexin-sidebar-blog' );

} else {

	dynamic_sidebar( 'codexin-sidebar-general' );

}
?>