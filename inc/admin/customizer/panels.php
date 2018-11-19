<?php  

/**
 * Customizer Panels definition
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

Kirki::add_panel( 'general_settings', array(
    'priority'    => 10,
    'title'       => esc_html__( 'General Settings', 'TEXT_DOMAIN' ),
    'description' => esc_html__( 'General Settings', 'TEXT_DOMAIN' ),
    'icon' 		  => 'dashicons-admin-generic',
) );

Kirki::add_panel( 'header_settings', array(
    'priority'    => 11,
    'title'       => esc_html__( 'Header Settings', 'TEXT_DOMAIN' ),
    'description' => esc_html__( 'Logo and Page Title settings', 'TEXT_DOMAIN' ),
    'icon' 		  => 'dashicons-editor-kitchensink',
) );

Kirki::add_panel( 'typography_settings', array(
    'priority'    => 12,
    'title'       => esc_html__( 'Typography Settings', 'TEXT_DOMAIN' ),
    'description' => esc_html__( 'All the typography settings', 'TEXT_DOMAIN' ),
    'icon' 		  => 'dashicons-editor-spellcheck',
) );

Kirki::add_panel( 'blog_settings', array(
    'priority'    => 25,
    'title'       => esc_html__( 'Blog Settings', 'TEXT_DOMAIN' ),
    'description' => esc_html__( 'Blog, Archive and Single Post settings', 'TEXT_DOMAIN' ),
    'icon' 		  => 'dashicons-schedule',
) );

Kirki::add_panel( 'footer_settings', array(
    'priority'    => 27,
    'title'       => esc_html__( 'Footer Settings', 'TEXT_DOMAIN' ),
    'description' => esc_html__( 'Footer Settings', 'TEXT_DOMAIN' ),
    'icon' 		  => 'dashicons-download',
) );
?>