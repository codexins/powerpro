<?php
/**
 * Customizer Fields definition
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$color_selectors = codexin_color_selectors();

/**
 * Selective Refresh functions.
 */

// Header Phone Number.
function codexin_partial_refresh_header_phone() {
    echo '<a class="default-btn white-scheme" href="#">' . wp_kses_post( codexin_get_option( 'cx_header_phone_number' ) ) . '</a>';
}

// Header Button.
function codexin_partial_refresh_header_button() {
    echo '<a class="default-btn white-scheme" href="#">' . wp_kses_post( codexin_get_option( 'cx_header_button' ) ) . '</a>';
}

// Blog Title Text.
function codexin_partial_refresh_blog_title() {
    echo '<h1>' . wp_kses_post( codexin_get_option( 'cx_blog_title' ) ) . '</h1>';
}

// Footer Copyright Text.
function codexin_partial_refresh_footer_copyright() {
    echo '<p class="copyright-legal">' . wp_kses_post( codexin_get_option( 'footer_copy_text' ) ) . '</p>';
}

/**
 * General Settings
 */

Kirki::add_field( $config_id, array(
	'type'        => 'text',
	'settings'    => 'cx_google_map_api',
	'label'       => esc_html__( 'Google Map API Key', 'powerpro' ),
	'description' =>
		sprintf(
			'%1$s<a href="%2$s" target="_blank">%3$s</a>',
			esc_html__( 'Get Your Google Map API Key from ', 'powerpro' ),
			esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ),
			esc_html__( 'here', 'powerpro' )
		),
	'section'     => 'cx_google_map_settings',
	'default'     => '',
	'priority'    => 10,
	'sanitize_callback' => 'codexin_sanitize_text',
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_totop',
	'label'       => esc_html__( 'Enable Scroll To-Top Button?', 'powerpro' ),
	'section'     => 'cx_extra_settings',
	'default'     => 1,
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_pageloader',
	'label'       => esc_html__( 'Enable Page Loader?', 'powerpro' ),
	'section'     => 'cx_extra_settings',
	'default'     => 1,
	'priority'    => 15,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_logo_size',
	'label'       => esc_html__( 'Logo Size', 'powerpro' ),
	'section'     => 'title_tagline',
	'type'        => 'slider',
	'priority'    => 50,
	'default'     => 180,
	'choices'     => array(
		'max'  => 300,
		'min'  => 0,
		'step' => 1,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.header .logo',
			'property' => 'width',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_logo_top_spacing',
	'label'       => esc_html__( 'Logo Top Spacing', 'powerpro' ),
	'section'     => 'title_tagline',
	'type'        => 'slider',
	'priority'    => 51,
	'default'     => 0,
	'choices'     => array(
		'max'  => 100,
		'min'  => 0,
		'step' => 1,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.navbar-brand',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_logo_bottom_spacing',
	'label'       => esc_html__( 'Logo Bottom Spacing', 'powerpro' ),
	'section'     => 'title_tagline',
	'type'        => 'slider',
	'priority'    => 52,
	'default'     => 0,
	'choices'     => array(
		'max'  => 100,
		'min'  => 0,
		'step' => 1,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.navbar-brand',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

// Kirki::add_field( $config_id, array(
// 	'settings'      => 'sticky_logo_setting',
// 	'label'         => esc_html__( 'Sticky Logo', 'powerpro' ),
// 	'description'   => esc_html__( 'Upload sticky logo', 'powerpro' ),
// 	'type'          => 'image',
// 	'section'       => 'title_tagline',
// 	'priority'      => 53,
// 	'transport'     => 'postMessage',
// ) );

/**
 * Typography Settings
 */

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_body_font',
	'label'       => esc_html__( 'Body Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change Body font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_body',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'    	 => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.5',
	),
	'priority'    => 10,
	'choices'     => array(
		'font-style'  => true,
		'font-family' => true,
		'font-size'   => true,
		'line-height' => true,
		'font-weight' => true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'body, button, input, select, textarea',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_header_text_font',
	'label'       => esc_html__( 'Header Text Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change Header Text font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_header',
	'default'     => array(
		'font-size'         => '26px',
		'line-height'       => '32px',
		'font-family'       => 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
	),
	'priority'    => 10,
	'choices'     => array(
		'font-style'        => true,
		'font-family'       => true,
		'font-size'         => true,
		'line-height'       => true,
		'font-weight'       => true,
		'font-transform'    => true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'header .site-title',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_header_desc_font',
	'label'       => esc_html__( 'Header Description Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change Header Description font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_header',
	'default'     => array(
		'font-size'         => '16px',
		'line-height'       => '33px',
		'font-family'       => 'Source Sans Pro',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'capitalize',
	),
	'priority'    => 20,
	'choices'     => array(
		'font-style'        => true,
		'font-family'       => true,
		'font-size'         => true,
		'line-height'       => true,
		'font-weight'       => true,
		'font-transform'    => true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'header .site-description',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_nav_font',
	'label'       => esc_html__( 'Navigation Menu Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change Navigation Menu font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_nav',
	'default'     => array(
		'font-size'         => '16px',
		'line-height'       => '22px',
		'font-family'       => 'Source Sans Pro',
		'font-weight'       => '600',
		'text-transform'    => 'uppercase',
	),
	'priority'    => 20,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#main_menu li a',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_page_title_font',
	'label'       => esc_html__( 'page Title Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change page Title font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_page_title',
	'default'     => array(
		'font-size'         => '34px',
		'line-height'       => '40px',
		'font-family'       => 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
	),
	'priority'    => 25,
	'choices'     => array(
		'font-style'        => true,
		'font-family'       => true,
		'font-size'         => true,
		'line-height'       => true,
		'font-weight'       => true,
		'font-transform'    => true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#page_title.page-title h1',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_h1_font',
	'label'       => esc_html__( '\'h1\' Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change h1 font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_h1',
	'default'     => array(
		'font-size'   		=> '32px',
		'font-family' 		=> 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
		'line-height'    	=> '1.2',
	),
	'priority'    => 30,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'h1, .h1',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_h2_font',
	'label'       => esc_html__( '\'h2\' Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change h2 font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_h2',
	'default'     => array(
		'font-size'   		=> '28px',
		'font-family' 		=> 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
		'line-height'    	=> '1.2',
	),
	'priority'    => 40,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'h2, .h2',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_h3_font',
	'label'       => esc_html__( '\'h3\' Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change h3 font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_h3',
	'default'     => array(
		'font-size'   		=> '24px',
		'font-family' 		=> 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
		'line-height'    	=> '1.2',
	),
	'priority'    => 50,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'h3, .h3',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_h4_font',
	'label'       => esc_html__( '\'h4\' Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change h4 font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_h4',
	'default'     => array(
		'font-size'   		=> '21px',
		'font-family' 		=> 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
		'line-height'    	=> '1.2',
	),
	'priority'    => 60,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'h4, .h4',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_h5_font',
	'label'       => esc_html__( '\'h5\' Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change h5 font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_h5',
	'default'     => array(
		'font-size'   		=> '16px',
		'font-family' 		=> 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
		'line-height'    	=> '1.2',
	),
	'priority'    => 70,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'h5, .h5',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'typography',
	'settings'    => 'cx_h6_font',
	'label'       => esc_html__( '\'h6\' Font Style', 'powerpro' ),
	'description' => esc_html__( 'Change h6 font family and font style.', 'powerpro' ),
	'section'     => 'cx_typography_h6',
	'default'     => array(
		'font-size'   		=> '14px',
		'font-family' 		=> 'Oswald',
		'variant'    	 	=> 'regular',
		'text-transform'    => 'uppercase',
		'line-height'    	=> '1.2',
	),
	'priority'    => 80,
	'choices'     => array(
		'font-style'  		=> true,
		'font-family' 		=> true,
		'font-size'   		=> true,
		'line-height' 		=> true,
		'font-weight' 		=> true,
		'font-transform' 	=> true,
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'h6, .h6',
		),
	),
) );

/**
 * Color Settings
 */

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_text_color',
	'label'             => esc_html__( 'Body Text Color:', 'powerpro' ),
	'description'       => esc_html__( 'Please Choose the Body Text Color', 'powerpro' ),
	'section'           => 'cx_color_scheme',
	'type'              => 'color',
	'priority'          => 20,
	'default'           => '#000',
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => 'body',
			'property' => 'color',
		),
	),
	'transport'         => 'auto',
) );

// Kirki::add_field( $config_id, array(
// 	'settings'          => 'cx_main_menu_color',
// 	'label'             => esc_html__( 'Main Menu Color:', 'powerpro' ),
// 	'description'       => esc_html__( 'Please Choose the Main Menu Color', 'powerpro' ),
// 	'section'           => 'cx_color_scheme',
// 	'type'              => 'color',
// 	'priority'          => 20,
// 	'default'           => '#fff',
// 	'sanitize_callback' => 'codexin_sanitize_color',
// 	'output'            => array(
// 		array(
// 			'element'  => '#main_nav li a',
// 			'property' => 'color',
// 		),
// 	),
// 	'transport'         => 'auto',
// ) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_primary_color',
	'label'             => esc_html__( 'Primary Color:', 'powerpro' ),
	'description'       => esc_html__( 'Please Choose the Primary Color', 'powerpro' ),
	'section'           => 'cx_color_scheme',
	'type'              => 'color',
	'priority'          => 30,
	'default'           => '#42ad61',
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => $color_selectors['primary_color_selectors'],
			'property' => 'color',
		),

		array(
			'element'  => $color_selectors['primary_color_in_bg_color_selectors'],
			'property' => 'background-color',
		),

		array(
			'element'  => $color_selectors['primary_color_in_border_color_selectors'],
			'property' => 'border-color',
		),
	),
	'transport'         => 'auto',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_secondary_color',
	'label'             => esc_html__( 'Secondary Color:', 'powerpro' ),
	'description'       => esc_html__( 'Please Choose the Secondary Color', 'powerpro' ),
	'section'           => 'cx_color_scheme',
	'type'              => 'color',
	'priority'          => 40,
	'default'           => '#f58025',
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => $color_selectors['secodnary_color_selectors'],
			'property' => 'color',
		),

		array(
			'element'  => $color_selectors['secodnary_color_in_bg_color_selectors'],
			'property' => 'background-color',
		),

		array(
			'element'  => $color_selectors['secodnary_color_in_border_color_selectors'],
			'property' => 'border-color',
		),
	),
	'transport'         => 'auto',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_tertiary_color',
	'label'             => esc_html__( 'Tertiary Color:', 'powerpro' ),
	'description'       => esc_html__( 'Please Choose the Tertiary Color', 'powerpro' ),
	'section'           => 'cx_color_scheme',
	'type'              => 'color',
	'priority'          => 50,
	'default'           => '#212331',
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => $color_selectors['tertiary_color_selectors'],
			'property' => 'color',
		),

		array(
			'element'  => $color_selectors['tertiary_color_in_bg_color_selectors'],
			'property' => 'background-color',
		),

		array(
			'element'  => $color_selectors['tertiary_color_in_border_color_selectors'],
			'property' => 'border-color',
		),
	),
	'transport'         => 'auto',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_border_color',
	'label'             => esc_html__( 'Border Color:', 'powerpro' ),
	'description'       => esc_html__( 'Please Choose the Border Color', 'powerpro' ),
	'section'           => 'cx_color_scheme',
	'type'              => 'color',
	'priority'          => 60,
	'default'           => '#ddd',
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => $color_selectors['default_border_color_selectors'],
			'property' => 'border-color',
		),

		array(
			'element'  => $color_selectors['default_border_color_in_bg_color_selectors'],
			'property' => 'background-color',
		),
	),
	'transport'         => 'auto',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_offset_color',
	'label'             => esc_html__( 'Offset Color:', 'powerpro' ),
	'description'       => esc_html__( 'Please Choose the Offset Color', 'powerpro' ),
	'section'           => 'cx_color_scheme',
	'type'              => 'color',
	'priority'          => 70,
	'default'           => '#f6f6f6',
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => $color_selectors['offset_color_selectors'],
			'property' => 'color',
		),

		array(
			'element'  => $color_selectors['offset_color_in_bg_color_selectors'],
			'property' => 'background-color',
		),

		array(
			'element'  => $color_selectors['offset_color_in_border_color_selectors'],
			'property' => 'border-color',
		),
	),
	'transport'         => 'auto',
) );

/**
 * Header Settings
 */

Kirki::add_field( $config_id, array(
	'settings'    	=> 'header_background_size',
	'label'       	=> esc_html__( 'Header Background Size', 'powerpro' ),
	'type'        	=> 'select',
	'section'     	=> 'header_image',
	'priority' 		=> 100,
	'choices'		=> array(
		'cover'     => esc_html__( 'Cover', 'powerpro' ),
		'contain'   => esc_html__( 'Contain', 'powerpro' ),
		'Auto'      => esc_html__( 'Auto', 'powerpro' ),
	),
	'default'     	=> 'cover',
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => 'header.header',
			'property' => 'background-size',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'header_background_position',
	'label'       	=> esc_html__( 'Header Background Position', 'powerpro' ),
	'type'        	=> 'select',
	'section'     	=> 'header_image',
	'priority' 		=> 101,
	'choices'		=> array(
		'left top'     		=> esc_html__( 'X: Left and Y: Top', 'powerpro' ),
		'left center'     	=> esc_html__( 'X: Left and Y: Center', 'powerpro' ),
		'left bottom'     	=> esc_html__( 'X: Left and Y: Bottom', 'powerpro' ),
		'center top'     	=> esc_html__( 'X: Center and Y: top', 'powerpro' ),
		'center center'     => esc_html__( 'X: Center and Y: Center', 'powerpro' ),
		'center bottom'     => esc_html__( 'X: Center and Y: Bottom', 'powerpro' ),
		'right top'     	=> esc_html__( 'X: Right and Y: Top', 'powerpro' ),
		'right center'     	=> esc_html__( 'X: Right and Y: Center', 'powerpro' ),
		'right bottom'     	=> esc_html__( 'X: Right and Y: Bottom', 'powerpro' ),
	),
	'default'     	=> 'center center',
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => 'header.header',
			'property' => 'background-position',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'header_background_repeat',
	'label'       	=> esc_html__( 'Header Background Repeat', 'powerpro' ),
	'type'        	=> 'select',
	'section'     	=> 'header_image',
	'priority' 		=> 102,
	'choices'		=> array(
		'repeat'     	=> esc_html__( 'Repeat', 'powerpro' ),
		'no-repeat'   	=> esc_html__( 'No Repeat', 'powerpro' ),
	),
	'default'     	=> 'no-repeat',
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => 'header.header',
			'property' => 'background-repeat',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'header_background_attachment',
	'label'       	=> esc_html__( 'Header Background Attachment', 'powerpro' ),
	'type'        	=> 'select',
	'section'     	=> 'header_image',
	'priority' 		=> 103,
	'choices'		=> array(
		'scroll'     	=> esc_html__( 'Scroll', 'powerpro' ),
		'fixed'   		=> esc_html__( 'Fixed', 'powerpro' ),
	),
	'default'     	=> 'scroll',
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => 'header.header',
			'property' => 'background-attachment',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'header_background_color',
	'label'             => esc_html__( 'Header Background Color', 'powerpro' ),
	'description'       => esc_html__( 'Change Header Background Color', 'powerpro' ),
	'section'           => 'header_image',
	'type'              => 'color',
	'priority'          => 104,
	'sanitize_callback' => 'codexin_sanitize_color',
	'output'            => array(
		array(
			'element'  => 'header.header',
			'property' => 'background',
		),
	),
	'transport'         => 'auto',
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'title_background_overlay_setting',
	'label'         => esc_html__( 'Page Title Background Overlay', 'powerpro' ),
	'description'   => esc_html__( 'Page header background overlay', 'powerpro' ),
	'type'          => 'color',
	'section'       => 'header_image',
	'priority'      => 105,
	'default'       => 'rgba(0,0,0,.6)',
	'choices'     => array(
		'alpha' => true,
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => 'header.header::before',
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_header_search',
	'label'       => esc_html__( 'Enable Header Search?', 'powerpro' ),
	'description' => esc_html__( 'Enable/Disable header search', 'powerpro' ),
	'section'     => 'cx_header_options',
	'default'     => 1,
	'priority'    => 10,
	'transport'   => 'postMessage',
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_header_socials',
	'label'       => esc_html__( 'Enable Header Socials?', 'powerpro' ),
	// 'description' => esc_html__( 'Please provide social information in \'Social Media Settings\' Section. If no social information is set, no social icon will be shown.', 'powerpro' ),
	'description' =>
		sprintf(
			'%1$s <a href="%2$s">%3$s</a>%4$s',
			esc_html__( 'Please provide social information in', 'powerpro' ),
			esc_url( admin_url( '/customize.php?autofocus[section]=cx_social_profiles' ) ),
			esc_html__( 'Social Media Settings. ', 'powerpro' ),
			esc_html__( 'If no social information is set, no social icon will be shown.', 'powerpro' )
		),
	'section'     => 'cx_header_options',
	'default'     => 1,
	'priority'    => 15,
	'transport'   => 'postMessage',
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_header_phone',
	'label'       => esc_html__( 'Enable Header Phone?', 'powerpro' ),
	'description' => esc_html__( 'Enable/Disable header phone button', 'powerpro' ),
	'section'     => 'cx_header_options',
	'default'     => 1,
	'priority'    => 20,
	'transport'   => 'postMessage',
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_header_phone_number',
	'label'       	=> esc_html__( 'Header Phone Number', 'powerpro' ),
	'description'   => esc_html__( 'Enter header phone number', 'powerpro' ),
	'type'        	=> 'text',
	'section'     	=> 'cx_header_options',
	'default'     	=> esc_html__( '(555) 555 5555', 'powerpro' ),
	'priority'    	=> 25,
	'transport'     => 'postMessage',
	'required' => array(
		array(
			'setting' => 'cx_enable_header_phone',
			'operator' => '==',
			'value' => 1,
		),
	),
    'partial_refresh'   => array(
        'cx_header_phone_number' => array(
            'selector'            => 'header .header-right>a:first-child',
            'container_inclusive' => true,
            'render_callback'     => 'codexin_partial_refresh_header_phone',
        ),
    ),
	'sanitize_callback' => 'codexin_sanitize_text',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_header_phone_url',
	'label'       	=> esc_html__( 'Header Phone Number URL', 'powerpro' ),
	'description'   => esc_html__( 'Enter header phone number URL without \'+\'', 'powerpro' ),
	'type'        	=> 'text',
	'section'     	=> 'cx_header_options',
	'default'     	=> esc_html__( '+15555555555', 'powerpro' ),
	'priority'    	=> 30,
	'required' => array(
		array(
			'setting' => 'cx_enable_header_phone',
			'operator' => '==',
			'value' => 1,
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_header_button',
	'label'       	=> esc_html__( 'Header Button Text', 'powerpro' ),
	'description'   => esc_html__( 'Enter header Button Text', 'powerpro' ),
	'type'        	=> 'text',
	'section'     	=> 'cx_header_options',
	'default'     	=> esc_html__( 'Get a Quote', 'powerpro' ),
	'priority'    	=> 35,
	'transport'     => 'postMessage',
    'partial_refresh'   => array(
        'cx_header_button' => array(
            'selector'            => 'header .header-right>a:last-child',
            'container_inclusive' => true,
            'render_callback'     => 'codexin_partial_refresh_header_button',
        ),
    ),
	'sanitize_callback' => 'codexin_sanitize_text',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_header_button_url',
	'label'       	=> esc_html__( 'Enter Page URL for Header Button', 'powerpro' ),
	'description'   => esc_html__( 'enter page URL for button i.e. \'/contact-us/\' or \'www.abc.com\' ', 'powerpro' ),
	'type'        	=> 'link',
	'section'     	=> 'cx_header_options',
	'priority'    	=> 40,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_fixed_header',
	'label'       => esc_html__( 'Enable Fixed Header?', 'powerpro' ),
	'section'     => 'cx_header_options',
	'default'     => 1,
	'priority'    => 110,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings' 		=> 'cx_page_title_position',
	'label'         => esc_html__( 'Page Title Position', 'powerpro' ),
	'description'   => esc_html__( 'Please Select Page Title Position', 'powerpro' ),
	'type'     		=> 'radio-buttonset',
	'section'  		=> 'cx_page_title_section',
	'default'  		=> 'center',
	'priority' 		=> 10,
	'choices'  		=> array(
		'left' 		=> esc_html__( 'Left', 'powerpro' ),
		'center' 	=> esc_html__( 'Center', 'powerpro' ),
		'right'		=> esc_html__( 'Right', 'powerpro' ),
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#page_title.page-title h1',
			'property' => 'text-align',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'cx_pt_top_spacing',
	'label'         => esc_html__( 'Page Title Top Spacing', 'powerpro' ),
	'section'       => 'cx_page_title_section',
	'type'          => 'slider',
	'priority'      => 20,
	'default'       => 100,
	'choices'       => array(
		'max'  => 500,
		'min'  => 0,
		'step' => 1,
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#page_title.page-title',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'cx_pt_bottom_spacing',
	'label'         => esc_html__( 'Page Title Bottom Spacing', 'powerpro' ),
	'section'       => 'cx_page_title_section',
	'type'          => 'slider',
	'priority'      => 25,
	'default'       => 80,
	'choices'       => array(
		'max'  => 500,
		'min'  => 0,
		'step' => 1,
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#page_title.page-title',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_breadcrumb',
	'label'       => esc_html__( 'Enable Breadcrumb?', 'powerpro' ),
	'section'     => 'cx_page_title_section',
	'default'     => 1,
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings' 		=> 'cx_breadcrumb_position',
	'label'         => esc_html__( 'Breadcrumb Position', 'powerpro' ),
	'description'   => esc_html__( 'Please Select Breadcrumb Position', 'powerpro' ),
	'type'     		=> 'radio-buttonset',
	'section'  		=> 'cx_page_title_section',
	'default'  		=> 'center',
	'priority' 		=> 40,
		'choices'  		=> array(
		'flex-start' 	=> esc_html__( 'Left', 'powerpro' ),
		'center' 		=> esc_html__( 'Center', 'powerpro' ),
		'flex-end'		=> esc_html__( 'Right', 'powerpro' ),
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#page_title.page-title .breadcrumb',
			'property' => 'justify-content',
		),
	),
	'required' => array(
		array(
			'setting' => 'cx_enable_breadcrumb',
			'operator' => '==',
			'value' => 1,
		),
	),
) );

/**
 * Blog Settings
 */

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_blog_title',
	'label'       	=> esc_html__( 'Blog Page Custom Title', 'powerpro' ),
	'description'   => esc_html__( 'Enter Custom Title for Blog Page', 'powerpro' ),
	'type'        	=> 'text',
	'section'     	=> 'cx_blog_section',
	'default'     	=> esc_html__( 'Blog', 'powerpro' ),
	'priority'    	=> 10,
	'transport'     => 'postMessage',
    'partial_refresh'   => array(
        'cx_header_button' => array(
            'selector'            => '.home.blog .page-title h1',
            'container_inclusive' => true,
            'render_callback'     => 'codexin_partial_refresh_blog_title',
        ),
    ),
	'sanitize_callback' => 'codexin_sanitize_text',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_blog_arc_layout',
	'label'       	=> esc_html__( 'Select Blog & Archive Page Layout', 'powerpro' ),
	'description'   => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'powerpro' ),
	'type'        	=> 'radio-image',
	'section'     	=> 'cx_blog_section',
	'default'     	=> 'right',
	'priority'    	=> 20,
	'choices'       => array(
		'no' 	=> trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/1col.png',
		'left' 	=> trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cl.png',
		'right' => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cr.png',
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_blog_title_excerpt',
	'label'       => esc_html__( 'Limit Blog Title & Excerpt Length by Character?', 'powerpro' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_section',
	'default'     => 0,
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'cx_post_title_length',
	'label'         => esc_html__( 'Title Length for Posts (In Character)', 'powerpro' ),
	'section'       => 'cx_blog_section',
	'type'          => 'slider',
	'priority'      => 40,
	'default'       => 30,
	'choices'       => array(
		'max'  => 150,
		'min'  => 10,
		'step' => 1,
	),
	'required' => array(
		array(
			'setting' => 'cx_enable_blog_title_excerpt',
			'operator' => '==',
			'value' => 1,
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'cx_post_excerpt_length',
	'label'         => esc_html__( 'Excerpt Length for Posts (In Character)', 'powerpro' ),
	'section'       => 'cx_blog_section',
	'type'          => 'slider',
	'priority'      => 50,
	'default'       => 180,
	'choices'       => array(
		'max'  => 500,
		'min'  => 20,
		'step' => 1,
	),
	'required' => array(
		array(
			'setting' => 'cx_enable_blog_title_excerpt',
			'operator' => '==',
			'value' => 1,
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_readmore',
	'label'       => esc_html__( 'Enable Read More Button?', 'powerpro' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_section',
	'default'     => 1,
	'priority'    => 60,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'transport'     => 'postMessage',
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_blog_pagination',
	'label'       => esc_html__( 'Pagination Type', 'powerpro' ),
	'type'        => 'select',
	'section'     => 'cx_blog_section',
	'default'     => 'button',
	'priority'    => 70,
	'choices'     => array(
		'button'  	=> esc_html__( 'Next - Previous Button', 'powerpro' ),
		'numbered' 	=> esc_html__( 'Numbered pagination', 'powerpro' ),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_blog_single_layout',
	'label'       	=> esc_html__( 'Select Single Post Layout', 'powerpro' ),
	'description'   => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'powerpro' ),
	'type'        	=> 'radio-image',
	'section'     	=> 'cx_blog_single_section',
	'default'     	=> 'right',
	'priority'    	=> 10,
	'choices'       => array(
		'no' 	=> trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/1col.png',
		'left' 	=> trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cl.png',
		'right' => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cr.png',
	),
) );

if ( class_exists( 'Codexin_Core' ) ) {
	Kirki::add_field( $config_id, array(
		'settings'    => 'cx_enable_share_link',
		'label'       => esc_html__( 'Enable Share Links?', 'powerpro' ),
		'type'        => 'switch',
		'section'     => 'cx_blog_single_section',
		'default'     => 1,
		'priority'    => 20,
		'choices'     => array(
			'on'  => esc_html__( 'On', 'powerpro' ),
			'off' => esc_html__( 'Off', 'powerpro' ),
		),
		'transport'     => 'postMessage',
		'sanitize_callback' => 'codexin_sanitize_checkbox',
	) );
}

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_comments',
	'label'       => esc_html__( 'Enable Comments?', 'powerpro' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_single_section',
	'default'     => 1,
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'transport'     => 'postMessage',
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_post_nav',
	'label'       => esc_html__( 'Enable Post Navigation?', 'powerpro' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_single_section',
	'default'     => 1,
	'priority'    => 40,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'transport'     => 'postMessage',
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_post_pagination',
	'label'       => esc_html__( 'Pagination Type', 'powerpro' ),
	'type'        => 'select',
	'section'     => 'cx_blog_single_section',
	'default'     => 'button',
	'priority'    => 70,
	'choices'     => array(
		'button'  	=> esc_html__( 'Next - Previous Button', 'powerpro' ),
		'text' 		=> esc_html__( 'Button with Post Title text', 'powerpro' ),
	),
	'required' => array(
		array(
			'setting' => 'cx_enable_post_nav',
			'operator' => '==',
			'value' => 1,
		),
	),
) );

/**
 * Social Media Settings
 */

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_facebook_link',
	'label'             => esc_html__( 'Facebook URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 10,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_twitter_link',
	'label'             => esc_html__( 'Twiter URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 15,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_instagram_link',
	'label'             => esc_html__( 'Instagram URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 20,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_pinterest_link',
	'label'             => esc_html__( 'Pinterest URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 25,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_behance_link',
	'label'             => esc_html__( 'Behance URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 30,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_gplus_link',
	'label'             => esc_html__( 'Google Plus URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 35,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_linkedin_link',
	'label'             => esc_html__( 'Linked In URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 40,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_youtube_link',
	'label'             => esc_html__( 'Youtube URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 45,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_vimeo_link',
	'label'             => esc_html__( 'Vimeo URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 50,
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( $config_id, array(
	'settings'          => 'cx_skype_link',
	'label'             => esc_html__( 'Skype URL', 'powerpro' ),
	'section'           => 'cx_social_profiles',
	'type'              => 'url',
	'priority'          => 55,
	'sanitize_callback' => 'esc_url_raw',
) );

/**
 * Footer Settings
 */

Kirki::add_field( $config_id, array(
	'settings'      => 'footer_layout_setting',
	'label'         => esc_html__( 'Select Footer Layout', 'powerpro' ),
	'description'   => esc_html__( 'Choose footer columns', 'powerpro' ),
	'type'          => 'radio-image',
	'section'       => 'cx_footer_section',
	'default'       => 'one',
	'priority'      => 10,
	'choices'       => array(
		'one'       => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/footer-1.jpg',
		'two'       => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/footer-2.jpg',
		'three'     => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/footer-3.jpg',
		'four'      => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/footer-4.jpg',
		'five'      => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/footer-5.jpg',
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_background_setting',
	'label'       	=> esc_html__( 'Footer Background', 'powerpro' ),
	'description' 	=> esc_html__( 'Footer with image, color, etc.', 'powerpro' ),
	'type'        	=> 'background',
	'section'     	=> 'cx_footer_section',
	'priority' 		=> 15,
	'default'     	=> array(
		'background-color'      => '#212331',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => 'footer#colophon',
			'property' => 'background',
		),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'cx_footer_top_spacing',
	'label'         => esc_html__( 'Footer Top Spacing', 'powerpro' ),
	'section'       => 'cx_footer_section',
	'type'          => 'slider',
	'priority'      => 20,
	'default'       => 80,
	'choices'       => array(
		'max'  => 500,
		'min'  => 0,
		'step' => 1,
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#colophon .footer-widgets-area',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'      => 'cx_footer_bottom_spacing',
	'label'         => esc_html__( 'Footer Bottom Spacing', 'powerpro' ),
	'section'       => 'cx_footer_section',
	'type'          => 'slider',
	'priority'      => 25,
	'default'       => 80,
	'choices'       => array(
		'max'  => 500,
		'min'  => 0,
		'step' => 1,
	),
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#colophon .footer-widgets-area',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
	'sanitize_callback' => 'codexin_sanitize_number',
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_copyright',
	'label'       => esc_html__( 'Enable Footer Copyright?', 'powerpro' ),
	'type'        => 'switch',
	'section'     => 'cx_footer_copy_section',
	'default'     => 1,
	'priority'    => 10,
	'transport'   => 'postMessage',
	'choices'     => array(
		'on'  => esc_html__( 'On', 'powerpro' ),
		'off' => esc_html__( 'Off', 'powerpro' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_copy_background',
	'label'       	=> esc_html__( 'Footer Copyright Background', 'powerpro' ),
	'description' 	=> esc_html__( 'Footer Copyright Background Color', 'powerpro' ),
	'type'        	=> 'color',
	'section'     	=> 'cx_footer_copy_section',
	'priority' 		=> 10,
	'default'       => 'rgba(0, 0, 0, 0.3)',
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#colophon .footer-copyright',
			'property' => 'background-color',
		),
	),
	'choices'     => array(
		'alpha' => true,
	),
	'required' => array(
		array(
			'setting' => 'cx_enable_copyright',
			'operator' => '==',
			'value' => 1,
		),
	),
	'sanitize_callback' => 'codexin_sanitize_color',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_copy_text_color',
	'label'       	=> esc_html__( 'Footer Copyright Text Color', 'powerpro' ),
	'description' 	=> esc_html__( 'Footer Copyright text Color', 'powerpro' ),
	'type'        	=> 'color',
	'section'     	=> 'cx_footer_copy_section',
	'priority' 		=> 10,
	'default'       => '#fff',
	'transport'     => 'auto',
	'output'        => array(
		array(
			'element'  => '#colophon .copyright-legal',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting' => 'cx_enable_copyright',
			'operator' => '==',
			'value' => 1,
		),
	),
	'sanitize_callback' => 'codexin_sanitize_color',
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_copy_text',
	'label'       	=> esc_html__( 'Footer Copyright Text', 'powerpro' ),
	'description' 	=> esc_html__( 'Please Add Your Copyright Text', 'powerpro' ),
	'type'        	=> 'textarea',
	'section'     	=> 'cx_footer_copy_section',
	'priority' 		=> 10,
	'default'     	=> esc_html__( 'Copyright &copy; 2018. All Right Reserved.', 'powerpro' ),
	'sanitize_callback' => 'codexin_sanitize_text',
	'required' => array(
		array(
			'setting' => 'cx_enable_copyright',
			'operator' => '==',
			'value' => 1,
		),
	),
	'transport'     => 'postMessage',
    'partial_refresh'   => array(
        'cx_header_button' => array(
            'selector'            => '#colophon .copyright-legal',
            'container_inclusive' => true,
            'render_callback'     => 'codexin_partial_refresh_footer_copyright',
        ),
    ),
) );
