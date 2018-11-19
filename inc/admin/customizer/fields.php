<?php  

/**
 * Customizer Fields definition
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

$color_selectors = codexin_color_selectors();

/************************************************************
	General Settings
*************************************************************/

Kirki::add_field( $config_id, array(
    'type'        => 'text',
    'settings'    => 'cx_google_map_api',
    'label'       => esc_html__( 'Google Map API Key', 'TEXT_DOMAIN' ),
    'description' => sprintf('%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__('Get Your Google Map API Key from ', 'TEXT_DOMAIN'), esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ), esc_html__( 'here', 'TEXT_DOMAIN' ) ),
    'section'     => 'cx_google_map_settings',
    'default'     => '',
    'priority'    => 10,
    'sanitize_callback' => 'codexin_sanitize_text'
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_totop',
	'label'       => esc_html__( 'Enable Scroll To-Top Button?', 'TEXT_DOMAIN' ),
	'section'     => 'cx_extra_settings',
	'default'     => 1,
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_pageloader',
	'label'       => esc_html__( 'Enable Page Loader?', 'TEXT_DOMAIN' ),
	'section'     => 'cx_extra_settings',
	'default'     => 1,
	'priority'    => 15,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
    'settings'    => 'cx_logo_top_spacing',
    'label'       => esc_html__('Logo Top Spacing', 'TEXT_DOMAIN'),
    'section'     => 'title_tagline',
    'type'        => 'slider',
    'priority'    => 50,
    'default'     => 5,
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
));

Kirki::add_field( $config_id, array(
    'settings'    => 'cx_logo_bottom_spacing',
    'label'       => esc_html__('Logo Bottom Spacing', 'TEXT_DOMAIN'),
    'section'     => 'title_tagline',
    'type'        => 'slider',
    'priority'    => 51,
    'default'     => 5,
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
));

/************************************************************
	Typography Settings
*************************************************************/

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_body_font',
    'label'       => esc_html__('Body Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change Body font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_body',
	'default'     => array(
		'font-family'    => 'Roboto',
		'font-weight'    => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5'
	),
    'priority'    => 10,
    'choices'     => array(
        'font-style'  => true,
        'font-family' => true,
        'font-size'   => true,
        'line-height' => true,
        'font-weight' => true
    ),
    'transport'   => 'auto',
    'output'      => array(
        array(
            'element' => 'body, button, input, select, textarea',
        ),
    ),
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_nav_font',
    'label'       => esc_html__('Navigation Menu Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change Navigation Menu font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_nav',
	'default'     => array(
        'font-size'         => '14px',
        'line-height'       => '33px',
        'font-family'       => 'Montserrat',
        'font-weight'       => '400',
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
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_h1_font',
    'label'       => esc_html__('\'h1\' Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change h1 font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_h1',
	'default'     => array(
        'font-size'   		=> '32px',
        'font-family' 		=> 'Montserrat',
        'font-weight' 		=> '600',
        'text-transform'    => 'uppercase',
        'line-height'    	=> '1.2'
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
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_h2_font',
    'label'       => esc_html__('\'h2\' Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change h2 font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_h2',
	'default'     => array(
        'font-size'   		=> '28px',
        'font-family' 		=> 'Montserrat',
        'font-weight' 		=> '600',
        'text-transform'    => 'uppercase',
        'line-height'    	=> '1.2'
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
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_h3_font',
    'label'       => esc_html__('\'h3\' Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change h3 font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_h3',
	'default'     => array(
        'font-size'   		=> '24px',
        'font-family' 		=> 'Montserrat',
        'font-weight' 		=> '600',
        'text-transform'    => 'uppercase',
        'line-height'    	=> '1.2'
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
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_h4_font',
    'label'       => esc_html__('\'h4\' Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change h4 font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_h4',
	'default'     => array(
        'font-size'   		=> '21px',
        'font-family' 		=> 'Montserrat',
        'font-weight' 		=> '600',
        'text-transform'    => 'uppercase',
        'line-height'    	=> '1.2'
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
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_h5_font',
    'label'       => esc_html__('\'h5\' Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change h5 font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_h5',
	'default'     => array(
        'font-size'   		=> '18px',
        'font-family' 		=> 'Montserrat',
        'font-weight' 		=> '600',
        'text-transform'    => 'uppercase',
        'line-height'    	=> '1.2'
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
));

Kirki::add_field( $config_id, array(
    'type'        => 'typography',
    'settings'    => 'cx_h6_font',
    'label'       => esc_html__('\'h6\' Font Style', 'TEXT_DOMAIN'),
    'description' => esc_html__('Change h6 font family and font style.', 'TEXT_DOMAIN'),
    'section'     => 'cx_typography_h6',
	'default'     => array(
        'font-size'   		=> '15px',
        'font-family' 		=> 'Montserrat',
        'font-weight' 		=> '600',
        'text-transform'    => 'uppercase',
        'line-height'    	=> '1.2'
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
));

/************************************************************
	Color Settings
*************************************************************/

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_text_color',
    'label'             => esc_html__('Body Text Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Body Text Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 20,
    'default'           => '#333',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => 'body',
            'property' => 'color',
        ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_main_menu_color',
    'label'             => esc_html__('Main Menu Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Main Menu Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 20,
    'default'           => '#fff',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => '#main_nav li a',
            'property' => 'color',
        ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_primary_color',
    'label'             => esc_html__('Primary Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Primary Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 30,
    'default'           => '#295970',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => $color_selectors['primary_color_selectors'],
            'property' => 'color',
        ),

        array(
            'element'  => $color_selectors['primary_color_in_bg_selectors'],
            'property' => 'background-color'
        ),

        // array(
        //     'element'  => 'h2',
        //     'property' => 'border-color',
        // ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_secondary_color',
    'label'             => esc_html__('Secondary Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Secondary Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 40,
    'default'           => '#fce38a',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => '',
            'property' => 'color',
        ),

        array(
            'element'  => '',
            'property' => 'background-color',
        ),

        array(
            'element'  => '',
            'property' => 'border-color',
        ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_tertiary_color',
    'label'             => esc_html__('Tertiary Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Tertiary Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 50,
    'default'           => '#fce38a',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => '',
            'property' => 'color',
        ),

        array(
            'element'  => '',
            'property' => 'background-color',
        ),

        array(
            'element'  => '',
            'property' => 'border-color',
        ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_border_color',
    'label'             => esc_html__('Border Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Border Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 60,
    'default'           => '#ddd',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => '',
            'property' => 'border-color',
        ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_offset_color',
    'label'             => esc_html__('Offset Color:', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Please Choose the Offset Color', 'TEXT_DOMAIN'),
    'section'           => 'cx_color_scheme',
    'type'              => 'color',
    'priority'          => 70,
    'default'           => '#fafafa',
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => '',
            'property' => 'background-color',
        ),
    ),
    'transport'         => 'auto',
));

/************************************************************
	header Settings
*************************************************************/

Kirki::add_field( $config_id, array(
    'settings'          => 'header_background_color',
    'label'             => esc_html__('Header Background Color', 'TEXT_DOMAIN'),
    'description'       => esc_html__('Change Header Background Color', 'TEXT_DOMAIN'),
    'section'           => 'header_image',
    'type'              => 'color',
    'priority'          => 100,
    'sanitize_callback' => 'codexin_sanitize_color',
    'output'            => array(
        array(
            'element'  => 'header',
            'property' => 'background',
        ),
    ),
    'transport'         => 'auto',
));

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_fixed_header',
	'label'       => esc_html__( 'Enable Fixed Header?', 'TEXT_DOMAIN' ),
	'section'     => 'header_image',
	'default'     => 1,
	'priority'    => 110,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
    'settings' 		=> 'cx_page_title_position',
    'label'         => esc_html__('Page Title Position', 'TEXT_DOMAIN'),
    'description'   => esc_html__('Please Select Page Title Position', 'TEXT_DOMAIN'),
    'type'     		=> 'radio-buttonset',
    'section'  		=> 'cx_page_title_section',
    'default'  		=> 'left',
    'priority' 		=> 10,
    'choices'  		=> array(
        'left' 		=> esc_html__( 'Left', 'TEXT_DOMAIN' ),
        'center' 	=> esc_html__( 'Center', 'TEXT_DOMAIN' ),
        'right'		=> esc_html__( 'Right', 'TEXT_DOMAIN' ),
    ),
    'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '#page_title.page-title h1',
            'property' => 'text-align'
        ),
    ),
));

Kirki::add_field( $config_id, array(
	'settings'    	=> 'title_background_setting',
	'label'       	=> esc_html__( 'Page Title Background', 'TEXT_DOMAIN' ),
	'description' 	=> esc_html__( 'Page header with image, color, etc.', 'TEXT_DOMAIN' ),
	'type'        	=> 'background',
	'section'     	=> 'cx_page_title_section',
	'priority' 		=> 15,
	'default'     	=> array(
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '#page_title.page-title',
            'property' => 'background',
        ),
    ),
) );

Kirki::add_field( $config_id, array(
    'settings'      => 'cx_pt_top_spacing',
    'label'         => esc_html__( 'Page Title Top Spacing', 'TEXT_DOMAIN' ),
    'section'       => 'cx_page_title_section',
    'type'          => 'slider',
    'priority'      => 20,
    'default'       => 40,
    'choices'       => array(
        'max'  => 100,
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
));

Kirki::add_field( $config_id, array(
    'settings'      => 'cx_pt_bottom_spacing',
    'label'         => esc_html__( 'Page Title Bottom Spacing', 'TEXT_DOMAIN' ),
    'section'       => 'cx_page_title_section',
    'type'          => 'slider',
    'priority'      => 25,
    'default'       => 40,
    'choices'       => array(
        'max'  => 100,
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
));

Kirki::add_field( $config_id, array(
	'type'        => 'switch',
	'settings'    => 'cx_enable_breadcrumb',
	'label'       => esc_html__( 'Enable Breadcrumb?', 'TEXT_DOMAIN' ),
	'section'     => 'cx_page_bcrumb_section',
	'default'     => 1,
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
    'settings' 		=> 'cx_breadcrumb_position',
    'label'         => esc_html__('Breadcrumb Position', 'TEXT_DOMAIN'),
    'description'   => esc_html__('Please Select Breadcrumb Position', 'TEXT_DOMAIN'),
    'type'     		=> 'radio-buttonset',
    'section'  		=> 'cx_page_bcrumb_section',
    'default'  		=> 'flex-start',
    'priority' 		=> 20,
    'choices'  		=> array(
        'flex-start' 	=> esc_html__( 'Left', 'TEXT_DOMAIN' ),
        'center' 		=> esc_html__( 'Center', 'TEXT_DOMAIN' ),
        'flex-end'		=> esc_html__( 'Right', 'TEXT_DOMAIN' ),
    ),
    'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '#page_title.page-title .breadcrumb',
            'property' => 'justify-content'
        ),
    ),
    'required' => array(
        array(
			'setting' => 'cx_enable_breadcrumb', 
			'operator' => '==', 
			'value' => 1
        )
    )
));

/************************************************************
	Blog Settings
*************************************************************/

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_blog_title',
	'label'       	=> esc_html__( 'Blog Page Custom Title', 'TEXT_DOMAIN' ),
	'description'   => esc_html__( 'Enter Custom Title for Blog Page', 'TEXT_DOMAIN' ),
	'type'        	=> 'text',
	'section'     	=> 'cx_blog_section',
	'default'     	=> esc_html__( 'Blog', 'TEXT_DOMAIN' ),
	'priority'    	=> 10,
	'sanitize_callback' => 'codexin_sanitize_text'
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_blog_arc_layout',
	'label'       	=> esc_html__( 'Select Blog & Archive Page Layout', 'TEXT_DOMAIN' ),
	'description'   => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'TEXT_DOMAIN' ),
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
	'label'       => esc_html__( 'Limit Blog Title & Excerpt Length by Character?', 'TEXT_DOMAIN' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_section',
	'default'     => 0,
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
    'settings'      => 'cx_post_title_length',
    'label'         => esc_html__( 'Title Length for Posts (In Character)', 'TEXT_DOMAIN' ),
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
			'value' => 1
        )
    ),
    'sanitize_callback' => 'codexin_sanitize_number'
));

Kirki::add_field( $config_id, array(
    'settings'      => 'cx_post_excerpt_length',
    'label'         => esc_html__( 'Excerpt Length for Posts (In Character)', 'TEXT_DOMAIN' ),
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
			'value' => 1
        )
    ),
    'sanitize_callback' => 'codexin_sanitize_number'
));

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_readmore',
	'label'       => esc_html__( 'Enable Read More Button?', 'TEXT_DOMAIN' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_section',
	'default'     => 1,
	'priority'    => 60,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_blog_pagination',
	'label'       => esc_html__( 'Pagination Type', 'TEXT_DOMAIN' ),
	'type'        => 'select',
	'section'     => 'cx_blog_section',
	'default'     => 'button',
	'priority'    => 70,
	'choices'     => array(
		'button'  	=> esc_html__( 'Next - Previous Button', 'TEXT_DOMAIN' ),
		'numbered' 	=> esc_html__( 'Numbered pagination', 'TEXT_DOMAIN' ),
	),
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'cx_blog_single_layout',
	'label'       	=> esc_html__( 'Select Single Post Layout', 'TEXT_DOMAIN' ),
	'description'   => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'TEXT_DOMAIN' ),
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

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_share_link',
	'label'       => esc_html__( 'Enable Share Links?', 'TEXT_DOMAIN' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_single_section',
	'default'     => 1,
	'priority'    => 20,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_comments',
	'label'       => esc_html__( 'Enable Comments?', 'TEXT_DOMAIN' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_single_section',
	'default'     => 1,
	'priority'    => 30,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_post_nav',
	'label'       => esc_html__( 'Enable Post Navigation?', 'TEXT_DOMAIN' ),
	'type'        => 'switch',
	'section'     => 'cx_blog_single_section',
	'default'     => 1,
	'priority'    => 40,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_post_pagination',
	'label'       => esc_html__( 'Pagination Type', 'TEXT_DOMAIN' ),
	'type'        => 'select',
	'section'     => 'cx_blog_single_section',
	'default'     => 'button',
	'priority'    => 70,
	'choices'     => array(
		'button'  	=> esc_html__( 'Next - Previous Button', 'TEXT_DOMAIN' ),
		'text' 		=> esc_html__( 'Button with Post Title text', 'TEXT_DOMAIN' ),
	),
    'required' => array(
        array(
			'setting' => 'cx_enable_post_nav', 
			'operator' => '==', 
			'value' => 1
        )
    ),
) );

/************************************************************
    Social Media Settings
*************************************************************/

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_facebook_link',
    'label'             => esc_html__( 'Facebook URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 10,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_twitter_link',
    'label'             => esc_html__( 'Twiter URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 15,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_instagram_link',
    'label'             => esc_html__( 'Instagram URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 20,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_pinterest_link',
    'label'             => esc_html__( 'Pinterest URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 25,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_behance_link',
    'label'             => esc_html__( 'Behance URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 30,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_gplus_link',
    'label'             => esc_html__( 'Google Plus URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 35,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_linkedin_link',
    'label'             => esc_html__( 'Linked In URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 40,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_youtube_link',
    'label'             => esc_html__( 'Youtube URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 45,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_vimeoyoutube_link',
    'label'             => esc_html__( 'Vimeo URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 50,
    'sanitize_callback' => 'esc_url_raw',
));

Kirki::add_field( $config_id, array(
    'settings'          => 'cx_skype_link',
    'label'             => esc_html__( 'Skype URL', 'TEXT_DOMAIN' ),
    'section'           => 'cx_social_profiles',
    'type'              => 'url',
    'priority'          => 55,
    'sanitize_callback' => 'esc_url_raw',
));

/************************************************************
	Footer Settings
*************************************************************/

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_background_setting',
	'label'       	=> esc_html__( 'Footer Background', 'TEXT_DOMAIN' ),
	'description' 	=> esc_html__( 'Footer with image, color, etc.', 'TEXT_DOMAIN' ),
	'type'        	=> 'background',
	'section'     	=> 'cx_footer_section',
	'priority' 		=> 10,
	'default'     	=> array(
		'background-color'      => '#333',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
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
    'label'         => esc_html__( 'Footer Top Spacing', 'TEXT_DOMAIN' ),
    'section'       => 'cx_footer_section',
    'type'          => 'slider',
    'priority'      => 20,
    'default'       => 40,
    'choices'       => array(
        'max'  => 100,
        'min'  => 0,
        'step' => 1,
    ),
    'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '.footer-widgets-area',
            'property' => 'padding-top',
            'units'    => 'px',
        ),
    ),
    'sanitize_callback' => 'codexin_sanitize_number',
));

Kirki::add_field( $config_id, array(
    'settings'      => 'cx_footer_bottom_spacing',
    'label'         => esc_html__( 'Footer Bottom Spacing', 'TEXT_DOMAIN' ),
    'section'       => 'cx_footer_section',
    'type'          => 'slider',
    'priority'      => 25,
    'default'       => 40,
    'choices'       => array(
        'max'  => 100,
        'min'  => 0,
        'step' => 1,
    ),
    'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '.footer-widgets-area',
            'property' => 'padding-bottom',
            'units'    => 'px',
        ),
    ),
    'sanitize_callback' => 'codexin_sanitize_number',
));

Kirki::add_field( $config_id, array(
	'settings'    => 'cx_enable_copyright',
	'label'       => esc_html__( 'Enable Footer Copyright?', 'TEXT_DOMAIN' ),
	'type'        => 'switch',
	'section'     => 'cx_footer_copy_section',
	'default'     => 1,
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'TEXT_DOMAIN' ),
		'off' => esc_html__( 'Off', 'TEXT_DOMAIN' ),
	),
	'sanitize_callback' => 'codexin_sanitize_checkbox'
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_copy_background',
	'label'       	=> esc_html__( 'Footer Copyright Background', 'TEXT_DOMAIN' ),
	'description' 	=> esc_html__( 'Footer Copyright Background Color', 'TEXT_DOMAIN' ),
	'type'        	=> 'color-alpha',
	'section'     	=> 'cx_footer_copy_section',
	'priority' 		=> 10,
    'default'       => '#333',
	'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '.footer-copyright',
            'property' => 'background-color',
        ),
    ),
    'required' => array(
        array(
			'setting' => 'cx_enable_copyright', 
			'operator' => '==', 
			'value' => 1
        )
    ),
    'sanitize_callback' => 'codexin_sanitize_color'
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_copy_text_color',
	'label'       	=> esc_html__( 'Footer Copyright Text Color', 'TEXT_DOMAIN' ),
	'description' 	=> esc_html__( 'Footer Copyright text Color', 'TEXT_DOMAIN' ),
	'type'        	=> 'color',
	'section'     	=> 'cx_footer_copy_section',
	'priority' 		=> 10,
    'default'       => '#fff',
	'transport'     => 'auto',
    'output'        => array(
        array(
            'element'  => '.footer-copyright',
            'property' => 'color',
        ),
    ),
    'required' => array(
        array(
			'setting' => 'cx_enable_copyright', 
			'operator' => '==', 
			'value' => 1
        )
    ),
    'sanitize_callback' => 'codexin_sanitize_color'
) );

Kirki::add_field( $config_id, array(
	'settings'    	=> 'footer_copy_text',
	'label'       	=> esc_html__( 'Footer Copyright Text', 'TEXT_DOMAIN' ),
	'description' 	=> esc_html__( 'Please Add Your Copyright Text', 'TEXT_DOMAIN' ),
	'type'        	=> 'textarea',
	'section'     	=> 'cx_footer_copy_section',
	'priority' 		=> 10,
	'default'     	=> esc_html__( 'Copyright &copy; 2018. All Right Reserved.', 'TEXT_DOMAIN' ),
    'sanitize_callback' => 'codexin_sanitize_text',
    'required' => array(
        array(
			'setting' => 'cx_enable_copyright', 
			'operator' => '==', 
			'value' => 1
        )
    ),
) );

// Kirki::add_field( $config_id, array(
// 	'settings'    	=> 'cx_advanced_custom_js',
// 	'label'       	=> esc_html__( 'Custom JS', 'TEXT_DOMAIN' ),
// 	'description' 	=> esc_html__( 'Please Add Your Custom JS', 'TEXT_DOMAIN' ),
// 	'type'        	=> 'code',
// 	'section'     	=> 'cx_custom_js',
// 	'priority' 		=> 10,
// 	'default'       => "jQuery(document).ready(function(){\n\n});",
//     'choices'     => array(
//         'language' => 'js',
//         'theme'    => 'monokai',
//         'height' 	=> '500px'
//     ),
//     'sanitize_callback' => 'codexin_sanitize_text'
// ) );

?>