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
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

// Declaring constant for Theme Options
define( 'CODEXIN_THEME_OPTIONS', 'codexin_get_option' );

/**
 * Codexin Themes Framework. Definition of main framework core class.
 *
 * @since 		1.0
 */
if( ! class_exists( 'Codexin_Framework' ) ) {
	/**
	 * Main class for the Codexin Themes Framework
	 * 
	 * @since v1.0.0
	 */
	class Codexin_Framework {
		/**
		 * Call all loading functions for the theme. They will be started right after theme setup.
		 * 
		 * @since v1.0.0
		 */
		public function __construct() {
			// Loading the theme framework files
			$this -> codexin_includes();

			// Run after installation setup.
			$this -> codexin_setup();

			// Register actions
			$this -> codexin_actions();

			// Loading admin related actions
			$this -> codexin_admin_actions();
		}

		/**
		 * Loading the theme framework files. Register custom elements
		 * and functionality in the theme.
		 * 
		 * @since v1.0.0
		 */
		public function codexin_includes() {
			/**
			 * Registering Navigation Menus
			 *
			 */
			require_once trailingslashit( get_template_directory() ) . 'inc/lib/menus.php';

			/**
			 * Register widgets locations
			 *
			 */
			require_once trailingslashit( get_template_directory() ) . 'inc/lib/widget-locations.php';

			/**
			 * Adding the function to enqueue styles and javascripts
			 *
			 */
			require trailingslashit( get_template_directory() ) . 'inc/lib/scripts.php';

			/**
			 * Adding the customizer
			 *
			 */
			require_once trailingslashit( get_template_directory() ) . 'inc/admin/customizer-init.php';

			/**
			 * Include required plugins to run framework
			 *
			 */
			require trailingslashit( get_template_directory() ) . 'inc/admin/required-plugins.php';

			/**
			 * Adding the function to show breadcrumbs
			 *
			 */
			require_once trailingslashit( get_template_directory() ) . 'inc/frontend/breadcrumbs.php';

			/**
			 * Adding the helper functions
			 *
			 */
			require_once trailingslashit( get_template_directory() ) . 'inc/frontend/helpers.php';

			/**
			 * Adding the functions for various paginations
			 *
			 */
			require_once trailingslashit( get_template_directory() ) . 'inc/frontend/paginations.php';
		}

		/**
		* Initial Theme Setup
		* @uses add_action()
		* @since v1.0.0
		*/
		public function codexin_setup() {
			/**
			* Add after_setup_theme() for specific functions.
			* The action call is here, because it fits more just for the theme
			* setup, instead for all other actions during using of Subtle.
			*/
			add_action( 'after_setup_theme', array( $this, 'codexin_setup_core' ) );

			/**
			 * Set content width for custom media information
			 *
			 */
			if( ! isset( $content_width ) ) {
				$content_width = 1140;
			}
		}

		/**
		 * The core functionality that has to be registred after the theme is setted up
		 * 
		 * @since v1.0.0
		 */
		public function codexin_setup_core() {
			/**
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on TEXT_DOMAIN, use a find and replace
			 * to change 'TEXT_DOMAIN' to the name of your theme in all the template files.
			 */
			load_theme_textdomain( 'TEXT_DOMAIN', trailingslashit( get_template_directory() ) . 'languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 *
			 */
			add_theme_support( 'automatic-feed-links' );

			/**
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/**
			 * Add support for post formats.
			 *
			 */
			add_theme_support( 'post-formats',
				array(
					'gallery',
					'audio',
					'video',
					'quote',
					'link',
				)
			);

			/**
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			/**
			 * Enable support for adding custom image sizes
			 *
			 */
			if( function_exists( 'add_image_size' ) ) {
				add_image_size('codexin-fr-rect-one', 600, 375, true);
				add_image_size('codexin-fr-rect-two', 800, 354, true);
				add_image_size('codexin-fr-rect-three', 1170, 400, true);
				add_image_size('codexin-fr-rect-four', 800, 450, true);
			}

			/**
			 * Adding custom header support to the theme
			 *
			 */
			$theme_args = array(
		        'default-image'         => '',
		        'default-text-color'    => 'ee3733',
			    'width'         		=> 1280,
			    'height'        		=> 150,
			    'flex-height'   		=> true,
			    'wp-head-callback'      => 'codexin_header_style',
			);
			add_theme_support( 'custom-header', $theme_args );

			/**
			 * Adding custom background support to the theme
			 *
			 */	
			add_theme_support( 'custom-background' );

			/**
			 * Adding custom logo support to the theme
			 *
			 */	
			$logo_args = array(
				'width'       => 250,
				'height'      => 60,
				'flex-width'  => true,
				'flex-height' => true
			);
			add_theme_support( 'custom-logo', $logo_args );

			/**
			 * Partial refresh support in the Customize
			 *
			 */
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Declaring woocommerce support
			 *
			 */
			add_action( 'after_setup_theme', 'codexin_woocommerce_support' );
			function codexin_woocommerce_support() {
			    add_theme_support( 'woocommerce' );
			}
		}

		/**
		 * Add actions and filters in Codexin themes framework. All the actions will be hooked here.
		 * 
		 * @since v1.0.0
		 */
		public function codexin_actions() {
			/**
			 * Providing Shortcode Support on text widget
			 *
			 * @uses add_filter()
			 * @since v1.0.0
			 */
			add_filter( 'widget_text', 'do_shortcode' );

			/**
			 * Removing srcset from featured image
			 *
			 * @uses 	add_filter()
			 * @since 	v1.0
			 */
			add_filter( 'max_srcset_image_width', function() { return 1; } );

			/**
			 * Removing width & height from featured image
			 *
			 * @param 	string 		$html
			 * @param 	integer 	$post_id
			 * @param 	integer 	$post_image_id
			 * @return 	mixed
			 * @uses 	add_filter()
			 * @since 	v1.0
			 */
			add_filter( 'post_thumbnail_html', 'codexin_remove_thumbnail_dimensions', 10, 3 );
			if( ! function_exists( 'codexin_remove_thumbnail_dimensions' ) ) {
				function codexin_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
				    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
				    return $html;
				}
			}

			/**
			 * Apply theme's stylesheet to the visual editor.
			 *
			 * @uses 	add_action()
			 * @uses 	add_editor_style() Links a stylesheet to visual editor
			 * @since 	v1.0
			 */
			add_action( 'admin_init', 'codexin_editor_styles' );
			if( ! function_exists( 'codexin_editor_styles' ) ) {
				function codexin_editor_styles() {
					add_editor_style( 'assets/css/admin/editor-style.css' );
				}
			}

			/**
			 * Add a pingback url auto-discovery header for singularly identifiable articles.
			 *
			 * @uses 	add_action()
			 * @since 	v1.0
			 */
			add_action( 'wp_head', 'codexin_pingback_header' );
			if( ! function_exists( 'codexin_pingback_header' ) ) {
				function codexin_pingback_header() {
					if( is_singular() && pings_open() ) {
						printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
					}
				}
			}

			/**
			 * Adding woocommerce compitability to theme structure
			 *
			 * @uses 	add_action()
			 * @uses 	remove_action()
			 * @since 	v1.0
			 */
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

			add_action('woocommerce_before_main_content', 'codexin_wrapper_start', 10);
			add_action('woocommerce_after_main_content', 'codexin_wrapper_end', 10);

			function codexin_wrapper_start() {
				echo '<div class="container">';
			}

			function codexin_wrapper_end() {
				echo '</div>';
			}
		}

		/**
		 * Registering admin tasks
		 * 
		 * @uses 	add_action()
		 * @since v1.0.0
		 */
		public function codexin_admin_actions() {
			add_action( 'admin_enqueue_scripts', array( $this, 'codexin_post_formats_script' ), 10, 1 );
		}

		/**
		 * Enqueque admin scripts for post formats
		 *
		 * @uses 	wp_enqueue_script()
		 * @since 	v1.0
		 */
		public function codexin_post_formats_script( $hook ) {
		    global $post;
		    if( $hook == 'post-new.php' || $hook == 'post.php' ) {
		        if( 'post' === $post->post_type ) {
		            wp_enqueue_script(  'codexin-post-formats', trailingslashit( get_template_directory_uri() ) . 'assets/js/admin/post-format.js' );
		        }
		    }
		}
	}
}


// Instantiating framework
$framework_init = new Codexin_Framework;