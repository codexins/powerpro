<?php  

/**
 * Customizer Sections definition
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

Kirki::add_section( 'cx_google_map_settings', array(
    'title'          => esc_html__( 'Google Map Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Google Map Settings', 'TEXT_DOMAIN' ),
    'panel'          => 'general_settings',
    'priority'       => 200,
) );

Kirki::add_section( 'cx_extra_settings', array(
    'title'          => esc_html__( 'Extra Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Extra Settings', 'TEXT_DOMAIN' ),
    'panel'          => 'general_settings',
    'priority'       => 201,
) );

Kirki::add_section( 'cx_typography_body', array(
    'title'          => esc_html__( 'Body Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify the body font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 10
) );

Kirki::add_section( 'cx_typography_nav', array(
    'title'          => esc_html__( 'Main Menu Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify the Navigation Menu font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 20
) );

Kirki::add_section( 'cx_typography_h1', array(
    'title'          => esc_html__( 'Heading 1 Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify h1 font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 30
) );

Kirki::add_section( 'cx_typography_h2', array(
    'title'          => esc_html__( 'Heading 2 Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify h2 font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 40
) );

Kirki::add_section( 'cx_typography_h3', array(
    'title'          => esc_html__( 'Heading 3 Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify h3 font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 50
) );

Kirki::add_section( 'cx_typography_h4', array(
    'title'          => esc_html__( 'Heading 4 Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify h4 font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 60
) );

Kirki::add_section( 'cx_typography_h5', array(
    'title'          => esc_html__( 'Heading 5 Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify h5 font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 70
) );

Kirki::add_section( 'cx_typography_h6', array(
    'title'          => esc_html__( 'Heading 6 Font', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Specify h6 font properties.', 'TEXT_DOMAIN' ),
    'panel'          => 'typography_settings',
    'priority'       => 80
) );

Kirki::add_section( 'cx_color_scheme', array(
    'title'          => esc_html__( 'Colors', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Color Properties', 'TEXT_DOMAIN' ),
    'priority'       => 15,
    'icon'			 => 'dashicons-admin-customizer'
) );

Kirki::add_section( 'cx_logo_section', array(
    'title'          => esc_html__( 'Logo', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Logo Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'header_settings',
    'priority'       => 10
) );

Kirki::add_section( 'cx_page_title_section', array(
    'title'          => esc_html__( 'Page Title Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Page Title Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'header_settings',
    'priority'       => 100
) );

Kirki::add_section( 'cx_page_bcrumb_section', array(
    'title'          => esc_html__( 'Breadcrumb Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Breadcrumb Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'header_settings',
    'priority'       => 110
) );

Kirki::add_section( 'cx_blog_section', array(
    'title'          => esc_html__( 'Blog and Archive Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Blog and Archive Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'blog_settings',
    'priority'       => 10
) );

Kirki::add_section( 'cx_blog_single_section', array(
    'title'          => esc_html__( 'Blog Single Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Blog Single Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'blog_settings',
    'priority'       => 15
) );

Kirki::add_section( 'cx_social_profiles', array(
    'title'          => esc_html__( 'Social Media Settings', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Please enter your Social Media Profile information', 'TEXT_DOMAIN' ),
    'priority'       => 26,
    'icon'           => 'dashicons-admin-site'
) );

Kirki::add_section( 'cx_footer_section', array(
    'title'          => esc_html__( 'Footer Options', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Footer Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'footer_settings',
    'priority'       => 10
) );

Kirki::add_section( 'cx_footer_copy_section', array(
    'title'          => esc_html__( 'Footer Copyright Options', 'TEXT_DOMAIN' ),
    'description'    => esc_html__( 'Footer Copyright Properties', 'TEXT_DOMAIN' ),
    'panel'          => 'footer_settings',
    'priority'       => 20
) );
?>