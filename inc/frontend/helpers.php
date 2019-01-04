<?php
/**
 * Various helper functions definition related to Codexin framework
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_get_option' ) ) {
	/**
	 * Function to get options in front-end from customizer
	 *
	 * @param   int    $field_id The option we need from the DB.
	 * @param   string $default_value If $option doesn't exist in DB return $default value.
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_get_option( $field_id, $default_value = '' ) {
		if ( $field_id ) {
			if ( ! $default_value ) {
				if ( class_exists( 'Kirki' ) && isset( Kirki::$fields[ $field_id ] ) && isset( Kirki::$fields[ $field_id ]['default'] ) ) {
					$default_value = Kirki::$fields[ $field_id ]['default'];
				}
			}
			$value = get_theme_mod( $field_id, $default_value );
			return $value;
		}
		return false;
	}
}

if ( ! function_exists( 'codexin_meta' ) ) {
	/**
	 * Helper Function to get meta data from metabox
	 *
	 * @param   string $key The meta key name from which we want to get the value.
	 * @param   array  $args The arguments of the meta key.
	 * @param   int    $post_id The ID of the post.
	 * @return  mixed
	 * @since   v1.0
	 */
	function codexin_meta( $key, $args = array(), $post_id = null ) {
		if ( function_exists( 'rwmb_meta' ) ) {
			return rwmb_meta( $key, $args, $post_id );
		} else {
			return null;
		}
	}
}

if ( ! function_exists( 'codexin_title_background' ) ) {
	/**
	 * Helper function to return page tile background url
	 *
	 * @since   v1.0
	 */
	function codexin_title_background() {
		$header_bg = codexin_meta( 'codexin_page_background' );

		if ( empty( $header_bg ) ) {
			return;
		}
		return rwmb_the_value( 'codexin_page_background', '', '', false );
	}
}

if ( ! function_exists( 'codexin_default_google_fonts' ) ) {
	/**
	 * Register Google fonts fallback if not set from theme options.
	 *
	 * @return    string Google fonts URL.
	 * @since     v1.0
	 */
	function codexin_default_google_fonts() {
		$fonts_url = '';

		/*
		 * Translators: If there are characters in the language that are not supported
		 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'powerpro' ) ) {
			$fonts = apply_filters( 'codexin_default_google_fonts', array( 'Source+Sans+Pro:400,400i,600,700', 'Oswald:400,500' ) );
			if ( $fonts ) {
				$subsets   = apply_filters( 'codexin_default_google_fonts', 'latin' );
				$fonts_url = add_query_arg( array(
					'family' => implode( '%7C', $fonts ),
					'subset' => urlencode( $subsets ),
				),  '//fonts.googleapis.com/css' );
			}
		}
		return esc_url_raw( $fonts_url );
	}
}

if ( ! function_exists( 'codexin_attachment_metas' ) ) {
	/**
	 * Helper Function to get some meta data from attachments
	 *
	 * @param   int $attachment_id The ID of the attachment.
	 * @return  array
	 * @since   v1.0
	 */
	function codexin_attachment_metas( $attachment_id = null ) {

		$metas = array();

		$attachment        = wp_prepare_attachment_for_js( $attachment_id );
		$metas['width']    = $attachment['width'];
		$metas['height']   = $attachment['height'];
		$metas['size']     = $attachment['width'] . 'x' . $attachment['height'];
		$metas['alt']      = ( ! empty( $attachment['alt'] ) ) ? 'alt="' . esc_attr( $attachment['alt'] ) . '"' : 'alt="' . get_the_title() . '"';
		$metas['caption']  = ( ! empty( $attachment['caption'] ) ) ? $attachment['caption'] : '';

		return $metas;
	}
}

if ( ! function_exists( 'codexin_get_smart_slider' ) ) {
	/**
	 * Helper Function to get smart slider
	 *
	 * @since   v1.0
	 */
	function codexin_get_smart_slider() {

		$result = '';
		if ( is_page_template( 'page-templates/page-home.php' ) ) {
			if ( class_exists( 'SmartSlider3' ) ) {

				$slider_id = codexin_meta( 'codexin_page_slider' );

				$result .= '<div class="slider-wrapper">';
				if ( ! empty( $slider_id ) ) {
					$result .= do_shortcode( '[smartslider3 slider=' . esc_attr( $slider_id ) . ']' );
				}
				$result .= '</div> <!-- end of slider-wrapper -->';

			} else {
				$result .= '';
			}
		}

		echo sprintf( '%s', $result );
	}
}

if ( ! function_exists( 'codexin_header_style' ) ) {
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @since   v1.0
	 */
	function codexin_header_style() {
		$header_text_color = get_header_textcolor();
		?>

		<style type="text/css">
			<?php
			if ( ! display_header_text() ) {
			?>
				.site-title a,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			} else {
				if ( ! empty( $$header_text_color ) ) {
			?>
				.site-title a,
				.site-description {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php
				}
			}
			?>
		</style>

		<?php
	}
} // End if().



if ( ! function_exists( 'codexin_header_socials' ) ) {
	/**
	 * Render function for header social icons.
	 *
	 * @since   v1.0
	 */
	function codexin_header_socials() {
		$social_array = array(
			'facebook'		=> codexin_get_option( 'cx_facebook_link' ),
			'twitter'		=> codexin_get_option( 'cx_twitter_link' ),
			'instagram'		=> codexin_get_option( 'cx_instagram_link' ),
			'pinterest'		=> codexin_get_option( 'cx_pinterest_link' ),
			'behance'		=> codexin_get_option( 'cx_behance_link' ),
			'google_plus'	=> codexin_get_option( 'cx_gplus_link' ),
			'linkedin'		=> codexin_get_option( 'cx_linkedin_link' ),
			'youtube'		=> codexin_get_option( 'cx_youtube_link' ),
			'vimeo'			=> codexin_get_option( 'cx_vimeo_link' ),
			'skype'			=> codexin_get_option( 'cx_skype_link' ),
		);

		echo '<div class="header-social">';
		foreach ( $social_array as $social_key => $social_value ) {
			if ( ! empty( $social_value ) ) {

				$key = ( 'google_plus' === $social_key ) ? str_replace( '_', '-', $social_key ) : $social_key;

				echo '<a href="' . esc_url( $social_value ) . '" title="' . esc_attr( ucfirst( $key ) ) . '" target="_blank">';
						echo '<i class="fa fa-' . esc_attr( $key ) . '"></i>';
				echo '</a>';
			}
		}
		echo '</div>';
	}
}

if ( ! function_exists( 'codexin_get_header_class' ) ) {
	/**
	 * Header classes.
	 *
	 * @return  string
	 * @since   v1.0
	 */
	function codexin_get_header_class() {

		$header_classes 	 = array( 'header' );
		$header_color_scheme = ! empty( codexin_get_option( 'header_color_scheme' ) ) ? codexin_get_option( 'header_color_scheme' ) : 'white';

		if ( is_front_page() ) {
			array_push( $header_classes, 'front-header' );
		} else {
			array_push( $header_classes, 'inner-header' );
		}

		if ( 'white' === $header_color_scheme ) {
			array_push( $header_classes, 'header-element-white' );
		} else {
			array_push( $header_classes, 'header-element-dark' );
		}

		if ( codexin_meta( 'codexin_disable_page_title' ) ) {
			array_push( $header_classes, 'no-page-title' );
		}

		return implode( ' ', $header_classes );
	}
}
