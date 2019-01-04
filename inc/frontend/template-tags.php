<?php
/**
 * Custom template tags for this theme
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
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
								$size = '90',
								$default = '',
								$alt = sprintf( '%1$s %2$s', esc_html__( 'Avatar for', 'powerpro' ), get_comment_author() )
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
		<div id="page-title" class="page-title">
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

if ( ! function_exists( 'codexin_posts_meta' ) ) {
	/**
	 * Renders meta information for posts
	 *
	 * @since   v1.0
	 */
	function codexin_posts_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated screen-reader-text" datetime="%3$s">%4$s</time>';
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
				<?php
				echo get_avatar(
					get_the_author_meta( 'ID' ),
					$size = '96',
					$default = '',
					$alt = sprintf( '%1$s %2$s', esc_html__( 'Avatar for', 'powerpro' ), get_the_author_meta('display_name') )
				);
				?>
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
			if ( ! class_exists( 'kirki' ) ) {
				$read_more = true;
			}
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
