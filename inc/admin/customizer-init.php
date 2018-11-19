<?php

/**
 * Init for theme customizer
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

/**
 * Initialize kirki if found active
 *
 * @uses 	add_action()
 * @uses 	add_filter()
 * @since 	v1.0
 */
if( class_exists( 'Kirki' ) ) {
	// setup kirki
	add_action( 'init', 'codexin_setup_kirki' );

	// Modifying existing controls
	add_action( 'customize_register', 'codexin_modify_customizer' );

	// Disable kirki Custom Loader
	add_filter( 'kirki/config', 'codexin_customizer_styles' );

	// Selective refresh js
	add_action( 'customize_preview_init', 'codexin_customizer_preview_js' );

	// Customizer css
	add_action( 'customize_controls_enqueue_scripts', 'codexin_controls_enqueue_scripts', 11 );
}

/**
 * Setting up Kirki Toolkit
 *
 */
function codexin_setup_kirki() {
	$config_id 	= 'codexin_framework';
	$args		= array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	);

	// Panel Definitions
	require_once trailingslashit( get_template_directory() ) . 'inc/admin/customizer/panels.php';

	// Section Definitions
	require_once trailingslashit( get_template_directory() ) . 'inc/admin/customizer/sections.php';

	// Color Selectors
	require_once trailingslashit( get_template_directory() ) . 'inc/admin/customizer/color-patterns.php';

	// Fields Definitions
	require_once trailingslashit( get_template_directory() ) . 'inc/admin/customizer/fields.php';

	// Sanitization helpers
	require_once trailingslashit( get_template_directory() ) . 'inc/admin/customizer/sanitization.php';

	// Adding kirki configuration
	Kirki::add_config( $config_id, $args );
}

/**
 * Modifying some existing sections and controls
 *
 */
function codexin_modify_customizer( $wp_customize ) {

    // Move background color setting alongside background image.
    $wp_customize->get_control('background_color')->section  = 'background_image';
    $wp_customize->get_control('background_color')->priority = 20;

    $wp_customize->get_control('header_textcolor')->section  = 'header_image';
    $wp_customize->get_control('header_textcolor')->priority = 11;

	// Change some default title and description.
    $wp_customize->get_section('background_image')->title       = esc_html__('Site Background', 'powerpro');
    $wp_customize->get_section('background_image')->description = esc_html__('Site Background Options', 'powerpro');
    $wp_customize->get_section('title_tagline')->title 			= esc_html__('Site Logo/Title/Tagline', 'powerpro');
    $wp_customize->get_section('header_image')->title 			= esc_html__('Header Options', 'powerpro');

	// move some general controls
    $wp_customize->get_section('static_front_page')->panel = 'general_settings';
    $wp_customize->get_section('title_tagline')->panel     = 'general_settings';
    $wp_customize->get_section('background_image')->panel  = 'general_settings';
    $wp_customize->get_section('header_image')->panel      = 'header_settings';

	// Selective refresh.
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector'        => 'header #header_text',
        'render_callback' => function () {
            bloginfo( 'name' );
        },
    ));

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector'        => 'header .site-description',
        'render_callback' => function () {
            bloginfo( 'description' );
        },
    ));
}

/**
 * Disabling Kirki custom loader
 *
 */
function codexin_customizer_styles( $config ) {
	return wp_parse_args( array(
		'disable_loader'  => true,
	), $config );
}

/**
 * JS for Live Preview
 *
 */
function codexin_customizer_preview_js() {
    wp_enqueue_script('custom_css_preview', trailingslashit( get_template_directory_uri() ) . 'assets/js/admin/customize-preview.js', array( 'customize-preview', 'jquery') );
}

/**
 * Customizer CSS
 *
 */
function codexin_controls_enqueue_scripts($wp_customize) {
    wp_enqueue_style('customizercustom_css', trailingslashit( get_template_directory_uri() ) . 'assets/css/admin/customizer.css');
}
?>