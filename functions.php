<?php
/**
 * Various definitions of global variables.
 *
 * Framework files and functions are hooked here.
 *
 * @link 		https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * PowerPro Theme only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_theme_file_path( '/inc/admin/back-compat.php' );
	return;
}

// Including Codexin Framework.
include_once wp_normalize_path( get_theme_file_path() . '/inc/class-codexin-framework.php' );

// Instantiating framework.
$framework_init = new Codexin_Framework;
