<?php

/**
 * Various helper functions definition related to Codexin framework
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

if (!function_exists('codexin_get_option')){
    /**
     * Function to get options in front-end from customizer
     * @param   int         $field_id           The option we need from the DB
     * @param   string      $default_value      If $option doesn't exist in DB return $default value
     * @return  string
     */
    function codexin_get_option( $field_id, $default_value = '' ){
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
     * @param   string     $key        The meta key name from which we want to get the value
     * @param   array      $args       The arguments of the meta key
     * @param   int        $post_id    The ID of the post
     * @return  mixed
     * @since   v1.0
     */
    function codexin_meta( $key, $args = array(), $post_id = null ){
        if( function_exists( 'rwmb_meta' ) ) {
            return rwmb_meta( $key, $args, $post_id );
        } else {
            return null;
        }
    }
}

if ( ! function_exists( 'codexin_comment_function' ) ) {
    /**
     * Custom Callback Function for Comment layout
     *
     * @param   $comment
     * @param   $args
     * @param   $depth
     * @since   v1.0
     */
    function codexin_comment_function( $comment, $args, $depth ) {

        $GLOBALS['comment'] = $comment; ?>

        <li id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment-body">
                <div class="comment-single">
                    <div class="comment-single-left comment-author vcard">
                        <?php echo get_avatar( $comment, $size='90' ); ?>
                    </div>

                    <div class="comment-single-right comment-info">
                    <?php printf( '<span class="fn" itemprop="name">%s</span>', get_comment_author_link() ); ?>
                        <div class="comment-text" itemprop="text">
                            <?php comment_text(); ?>
                        </div>

                        <div class="comment-meta">
                            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                                <time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished">
                                    <?php printf( esc_html__('%1$s at %2$s', 'TEXT_DOMAIN'), get_comment_date(), get_comment_time() ); ?>
                                </time>
                            </a>
                            <?php edit_comment_link( esc_html__( '(Edit)', 'TEXT_DOMAIN' ),'  ','' ) ?>
                            <span class="comment-reply">
                                <?php 
                                comment_reply_link( array_merge( $args, 
                                    array( 
                                        'depth' => $depth, 
                                        'max_depth' => $args['max_depth'], 
                                        'before' => ' &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;' 
                                    ) 
                                ) ); 
                                ?>
                            </span>
                        </div>

                        <?php if ($comment->comment_approved == '0') { ?>
                            <div class="moderation-notice"><em><?php echo esc_html__('Your comment is awaiting moderation.', 'TEXT_DOMAIN') ?></em></div>
                        <?php } ?>

                    </div>
                </div>     
            </div>

     <?php
    }
}


if ( ! function_exists( 'codexin_hex_to_rgba' ) ) {
    /**
     * Helper function to convert hex color to RGBA
     *
     * @param   string      $hex_color     The color code in hexadecimal
     * @param   float       $opacity       The color opacity we want
     * @return  string
     * @since   v1.0
     */
    function codexin_hex_to_rgba( $hex_color, $opacity = '' ) {
        $hex_color = str_replace( "#", "", $hex_color );
        if ( strlen( $hex_color ) == 3 ) {
            $r = hexdec( substr( $hex_color, 0, 1 ) . substr( $hex_color, 0, 1 ) );
            $g = hexdec( substr( $hex_color, 1, 1 ) . substr( $hex_color, 1, 1 ) );
            $b = hexdec( substr( $hex_color, 2, 1 ) . substr( $hex_color, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex_color, 0, 2 ) );
            $g = hexdec( substr( $hex_color, 2, 2 ) );
            $b = hexdec( substr( $hex_color, 4, 2 ) );
        }
        $rgb = $r . ',' . $g . ',' . $b;

        if ( '' == $opacity ) {
            return $rgb;
        } else {
            $opacity = floatval( $opacity );
            return 'rgba(' . $rgb . ',' . $opacity . ')';
        }
    }
}


if ( ! function_exists( 'codexin_adjust_color_brightness' ) ) {
    /**
     * Helper function to adjust brightness of a color
     *
     * @param   string      $hex_color        The color code in hexadecimal
     * @param   float       $percent_adjust   The percentage we want to lighten/darken the color
     * @return  string
     * @since   v1.0
     */
    function codexin_adjust_color_brightness( $hex_color, $percent_adjust = 0 ) {
        $percent_adjust = round( $percent_adjust/100,2 );    
        $hex = str_replace( "#","",$hex_color );

        $r = ( strlen( $hex ) == 3 ) ? hexdec ( substr ( $hex,0,1 ) . substr( $hex,0,1 ) ) : hexdec( substr( $hex,0,2 ) );
        $g = ( strlen( $hex ) == 3 ) ? hexdec ( substr ( $hex,1,1 ) . substr( $hex,1,1 ) ) : hexdec( substr( $hex,2,2 ) );
        $b = ( strlen( $hex ) == 3 ) ? hexdec ( substr ( $hex,2,1 ) . substr( $hex,2,1 ) ) : hexdec( substr( $hex,4,2 ) );
        $r = round( $r - ( $r*$percent_adjust ) );
        $g = round( $g - ( $g*$percent_adjust ) );
        $b = round( $b - ( $b*$percent_adjust ) );

        $new_hex = "#".str_pad( dechex( max( 0,min( 255,$r ) ) ),2,"0",STR_PAD_LEFT )
            .str_pad( dechex( max( 0,min( 255,$g ) ) ),2,"0",STR_PAD_LEFT)
            .str_pad( dechex( max( 0,min( 255,$b ) ) ),2,"0",STR_PAD_LEFT);

        return codexin_sanitize_hex_color( $new_hex );    
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

        if( empty( $header_bg ) ) {
            return;
        }
        return rwmb_the_value( $header_bg, '', '', false );
    }
}


if ( ! function_exists( 'codexin_get_page_title' ) ) {
    /**
     * Helper function to return a custom formated page title
     *
     * @param   string      $title      Title to show
     * @param   int         $id         Post ID
     * @return  mixed
     * @since   v1.0
     */
    function codexin_get_page_title( $title, $id = null ) {

        $alignment = codexin_get_option( 'cx_page_title_position' );
        $bcrumb    = codexin_get_option( 'cx_enable_breadcrumb' );
        $page_bg   = ( ! empty( codexin_meta( 'codexin_page_background' ) ) ) ? rwmb_the_value( 'codexin_page_background', '', '', false ) : '';
        $alignment_single = codexin_meta( 'codexin_page_title_alignment' );
        $bcrumb_position = '';
        $alignment_class = '';

        if( is_page() ) {
            $bcrumb_position = ( ! empty( $alignment_single ) ) && ( $alignment_single != 'global' ) ? $alignment_single : '';
        } 

        if( $bcrumb_position == 'left' ) {
            $alignment_class = 'text-md-left';
        } elseif( $bcrumb_position == 'right' ) {
            $alignment_class = 'text-md-right';
        } elseif( $bcrumb_position == 'center' ) {
            $alignment_class = 'text-md-center';
        }

        ?>
        <!-- Start of Page Title -->
        <div id="page_title" class="page-title" style="<?php echo esc_attr( $page_bg ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <h1 class="<?php echo esc_attr( $alignment_class ); ?>"><?php echo wp_kses_post( $title ); ?></h1>
                        <?php 
                        // Rendering Breadcrumbs
                        if( $bcrumb ) {
                            echo codexin_breadcrumbs();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Page Title -->
        <?php
    }
}


if ( ! function_exists( 'codexin_char_limit' ) ) {
    /**
     * Helper Function to limit the character length without breaking any word
     *
     * @param   int       $limit     The number of character to limit
     * @param   string    $type      The type of content (possible values: title/excerpt)
     * @return  mixed
     * @since   v1.0
     */
    function codexin_char_limit( $limit, $type ) {
        $content = ( $type == 'title' && $type !== 'excerpt' ) ? get_the_title() : get_the_excerpt();
        $limit++;

        if ( mb_strlen( $content ) > $limit ) {
            $subex = mb_substr( $content, 0, $limit);
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                echo mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }
            echo '...';
        } else {
            return $content;
        }
    }
}

if ( ! function_exists( 'codexin_default_google_fonts' ) ) {
    /**
     * Register Google fonts fallback if not set from theme options.
     *
     * @return    string      Google fonts URL.
     * @since     v1.0.0
     */
    function codexin_default_google_fonts() {
        $fonts_url = '';
        $fonts     =  apply_filters( 'codexin_default_google_fonts', array( 'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i', 'Montserrat+Roboto:400,700' ) );
        if ( $fonts ) {
            $subsets   = apply_filters( 'codexin_default_google_fonts', 'latin' );
            $fonts_url = add_query_arg( array(
                'family' => implode( '%7C', $fonts ),
                'subset' => urlencode( $subsets ),
            ),  'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
}

if ( ! function_exists( 'codexin_attachment_metas' ) ) {
    /**
     * Helper Function to get some meta data from attachments
     *
     * @param   int        $post_id    The ID of the attachment
     * @return  array
     * @since   v1.0
     */
    function codexin_attachment_metas( $attachment_id = null ) {

        $metas = array();

        $attachment         = wp_prepare_attachment_for_js( $attachment_id );
        $metas['width']     = $attachment['width'];
        $metas['height']    = $attachment['height'];
        $metas['size']      = $attachment['width'] . 'x' . $attachment['height'];
        $metas['alt']       = ( ! empty( $attachment['alt'] ) ) ? 'alt="' . esc_attr( $attachment['alt'] ) . '"' : 'alt="' .get_the_title() . '"';
        $metas['caption']   = ( ! empty( $attachment['caption'] ) ) ? $attachment['caption'] : '';

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
        if( is_page_template( 'page-templates/page-home.php' ) ) {
            if ( class_exists( 'SmartSlider3' ) ) {

                $slider_id = codexin_meta( 'codexin_page_slider' ); 

                $result .= '<div class="slider-wrapper">';
                    if( ! empty( $slider_id ) ){
                        $result .= do_shortcode('[smartslider3 slider='. $slider_id .']');
                    } else {
                        $result .= sprintf( '<div class="no-slider text-center"><h3>%1$s</h3></div>', esc_html__( 'Please select a \'Slider Name\' from \'Page Edit\' section and click on \'Update\'', 'TEXT_DOMAIN' ) );
                    }
                $result .= '</div> <!-- end of slider-wrapper -->';

            } else {
                $result .= '';
            }
        }

        return $result;
    }
}

/**
 * Styles the header image and text displayed on the blog
 *
 * @since   v1.0
 */
if ( ! function_exists( 'codexin_header_style' ) ) {
function codexin_header_style() {
    $header_text_color = get_header_textcolor(); ?>
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
        ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }
        <?php } ?>
    </style>
    <?php
    }
}