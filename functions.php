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

// Including Codexin Framework.
include_once wp_normalize_path( get_theme_file_path() . '/inc/class-codexin-framework.php' );

// Instantiating framework.
$framework_init = new Codexin_Framework;
