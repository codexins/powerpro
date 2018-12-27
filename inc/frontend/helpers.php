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

if ( ! function_exists( 'codexin_comment_function' ) ) {
	/**
	 * Custom Callback Function for Comment layout
	 *
	 * @param 	Object $comment WP Comment Object.
	 * @param 	array  $args Formatting options.
	 * @param 	int    $depth The comments depth.
	 * @since   v1.0
	 */
	function codexin_comment_function( $comment, $args, $depth ) {
	?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body">
				<div class="comment-single media">
					<?php
					if ( ! empty( get_avatar( $comment ) ) ) {
					?>
						<div class="comment-single-left comment-author vcard">
							<?php
							echo get_avatar(
								$comment,
								$size = '90'
							);
							?>
						</div> <!-- end of comment-author -->
					<?php
					}
					?>

					<div class="comment-single-right comment-info media-body">
					<?php
					printf(
						'<span class="fn" itemprop="name">%s</span>',
						get_comment_author_link()
					);
					?>
						<div class="comment-meta">
							<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
								<time datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>" itemprop="datePublished">
									<?php
									/* translators: 1: comment date, 2: comment time */
									printf( esc_html__( '%1$s at %2$s', 'powerpro' ), get_comment_date(), get_comment_time() );
									?>
								</time>
							</a>
							<?php
							edit_comment_link( esc_html__( '(Edit)', 'powerpro' ), '  ', '' );
							?>
						</div>
						
						<div class="comment-text" itemprop="text">
							<?php comment_text(); ?>
						</div>

						<?php
						if ( '0' == $comment->comment_approved ) {
						?>
							<div class="moderation-notice"><em><?php echo esc_html__( 'Your comment is awaiting moderation.', 'powerpro' ) ?></em></div>
						<?php
						}
						?>

						<div class="comment-reply">
							<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'depth' 	=> $depth,
										'max_depth' => $args['max_depth'],
									)
								)
							);
							?>
						</div>
					</div> <!-- end of comment-info -->
				</div> <!-- end of comment-single -->
			</div> <!-- end of #comment-## -->
	<?php
	}
} // End if().

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
		return rwmb_the_value( $header_bg, '', '', false );
	}
}


if ( ! function_exists( 'codexin_get_page_title' ) ) {
	/**
	 * Helper function to return a custom formated page title
	 *
	 * @param   string $title Title to show.
	 * @param   int    $id Post ID.
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

		if ( is_page() ) {
			$bcrumb_position = ( ! empty( $alignment_single ) ) && ( 'global' !== $alignment_single ) ? $alignment_single : '';
		}

		if ( 'left' === $bcrumb_position ) {
			$alignment_class = 'text-md-left';
		} elseif ( 'right' === $bcrumb_position ) {
			$alignment_class = 'text-md-right';
		} elseif ( 'center' === $bcrumb_position ) {
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
						// Rendering Breadcrumbs.
						if ( $bcrumb ) {
							codexin_breadcrumbs();
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- End of Page Title -->
		<?php
	}
} // End if().


if ( ! function_exists( 'codexin_char_limit' ) ) {
	/**
	 * Helper Function to limit the character length without breaking any word
	 *
	 * @param   int    $limit The number of character to limit.
	 * @param   string $type The type of content (possible values: title/excerpt).
	 * @return  mixed
	 * @since   v1.0
	 */
	function codexin_char_limit( $limit, $type ) {
		$content = ( 'title' === $type && 'excerpt' !== $type ) ? get_the_title() : get_the_excerpt();
		$limit++;

		if ( mb_strlen( $content ) > $limit ) {
			$subex = mb_substr( $content, 0, $limit );
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
					'family' => implode( '|', $fonts ),
					'subset' => urlencode( $subsets ),
				),  'https://fonts.googleapis.com/css' );
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
				if ( ! empty( $$header_text_color  ) ) {
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
}

if ( ! function_exists( 'codexin_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param   array $classes Classes for the body element.
	 * @return  array
	 * @since   v1.0
	 */
	function codexin_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Page Sidebar conditional check.
		if ( is_page() && ( is_active_sidebar( 'codexin-sidebar-page' ) || is_active_sidebar( 'codexin-sidebar-general' ) ) ) {
			if ( is_page_template( 'page-templates/page-full-width.php' ) || is_page_template( 'page-templates/page-home.php' ) || is_page_template( 'page-templates/page-no-sidebar.php' ) ) {
				$classes[] = 'page-sidebar-inactive';
			} else {
				$classes[] = 'page-sidebar-active';
			}
		}

		if ( ! is_front_page() & ! is_page() ) {

			// Archive Sidebar conditional check.
			if ( is_home() || is_archive() || is_search() ) {
				$classes[] = ( 'no' === codexin_get_option( 'cx_blog_arc_layout' ) ) ? 'archive-sidebar-inactive' : 'archive-sidebar-active';
			}

			// Single Sidebar conditional check.
			if ( is_single() || is_singular() ) {
				$classes[] = ( 'no' === codexin_get_option( 'cx_blog_single_layout' ) ) ? 'single-sidebar-inactive' : 'single-sidebar-active';
			}
		}

		return $classes;
	}
} // End if().
add_filter( 'body_class', 'codexin_body_classes' );

if ( ! function_exists( 'codexin_adjust_body_class' ) ) {
	/**
	 * Removes tag class from the body_class array to avoid
	 * Bootstrap markup styling issues.
	 *
	 * @param   string $classes CSS classes.
	 * @return  mixed
	 * @since   v1.0
	 */
	function codexin_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;
	}
}
add_filter( 'body_class', 'codexin_adjust_body_class' );

add_filter( 'excerpt_more', 'codexin_excerpt_more' );
if ( ! function_exists( 'codexin_excerpt_more' ) ) {
    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ...
     *
     * @param string $more Default Read More excerpt link.
     * @return string Filtered Read More excerpt link.
     */
    function codexin_excerpt_more( $more ) {
        return ' &hellip; ';
    }
}

if ( ! function_exists( 'codexin_infinite_scroll_render' ) ) {
	/**
	 * Custom render function for Jetpack Infinite Scroll.
	 *
	 * @since   v1.0
	 */
	function codexin_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/post/content', get_post_format() );
		}
	}
}

if ( ! function_exists( 'codexin_jectpack_social_menu' ) ) {
	/**
	 * Render function for Jetpack Social Menu.
	 *
	 * @since   v1.0
	 */
	function codexin_jectpack_social_menu() {
		if ( ! function_exists( 'jetpack_social_menu' ) ) {
			return;
		} else {
			jetpack_social_menu();
		}
	}
}

if ( ! function_exists( 'codexin_posts_meta' ) ) {
	/**
	 * Renders meta information for posts
	 *
	 * @since   v1.0
	 */
	function codexin_posts_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	?>
		<div class="media meta-container">
			<div class="author-media">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
			</div>

			<div class="meta-details media-body">
				<div class="post-author">
					
					<?php
						// Posted by.
						printf(
							'<span class="byline"><span class="screen-reader-text">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
							/* translators: 1: post author, only visible to screen readers. 2: author link. 3: author */
							esc_html__( 'Posted by', 'powerpro' ),
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							esc_html( get_the_author() )
						);
					?>
				</div>

				<ul class="list-inline">
					<li class=" list-inline-item post-time">
						<a href="<?php echo esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) );  ?>">
							<?php
								// Posted on.
								printf(
									'<span class="posted-on">%s</span>',
									$time_string
								);
							?>
						</a>
					</li>
					<?php
					if ( ! is_single() ) {
					?>
						<li class="list-inline-item post-comments">
							<a href="<?php comments_link(); ?>">
								<i class="ion ion-md-chatbubbles"></i>
								<?php
								if ( ! post_password_required() ) {
									comments_number( '0', '1', '%' );
								} else {
									echo esc_html__( '?', 'powerpro' );
								}
								?>
							</a>
						</li>
					<?php
					}
					?>
					<li class=" list-inline-item post-categories">
						<?php
						// Posted in.
						the_category( ', ' );
						?>
					</li>
				</ul>
			</div>
		</div>
	<?php
	}
} // End if().

if ( ! function_exists( 'codexin_posts_footer' ) ) {
	/**
	 * Renders footer information for posts
	 *
	 * @since   v1.0
	 */
	function codexin_posts_footer() {

		$read_more 		= codexin_get_option( 'cx_enable_readmore' );
		$social_share  	= codexin_get_option( 'cx_enable_share_link' );

		if ( ! is_single() ) {

			// Read More button.
			if ( $read_more ) {
				?>				
				<div class="read-more post-btn">
					<a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'powerpro' ); ?></a>
				</div>
				<?php
			}
		} else {
			if ( ! post_password_required() ) {

				// Tags.
				if ( has_tag() ) {
				?>
					<div class="tagcloud">
						<?php the_tags( '', ' ', '' ); ?>
					</div>
				<?php
				}

				// Social Share buttons.
				if ( $social_share ) {
					if ( class_exists( 'Codexin_Core' ) && class_exists( 'Kirki' ) ) {
						echo do_shortcode( '[cx_social_share]' );
					}
				}
			}
		} // End if().
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
