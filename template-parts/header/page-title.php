<?php
/**
 * Template partial for displaying page title
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

$blog_title = codexin_get_option( 'cx_blog_title' );

if( is_home() ) {

	codexin_get_page_title( ! empty( $blog_title ) ? esc_html( $blog_title ) : esc_html__( 'Blog', 'TEXT_DOMAIN' ) );

} elseif( is_archive() ) {

	$title = get_the_archive_title();
	codexin_get_page_title( $title );

} elseif( is_search() ) {

	$title = esc_html__( 'Search results for', 'TEXT_DOMAIN' ) . ' "' . get_search_query().'"';
	$title = sprintf( '%1$s"' . get_search_query().'"', esc_html__( 'Search results for ', 'TEXT_DOMAIN' ) );
	codexin_get_page_title( $title );

} elseif(is_404()) {

	$title = esc_html__( 'Page Not Found', 'TEXT_DOMAIN' );
	codexin_get_page_title( $title );

} else {
	
	codexin_get_page_title( the_title( '', '', FALSE ), get_the_ID() );
}
?>
