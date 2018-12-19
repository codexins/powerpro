<?php
/**
 * Template part for displaying video posts
 *
 * @package 	Codexin
 * @subpackage 	Template Parts
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

$length_switch   = codexin_get_option( 'cx_enable_blog_title_excerpt' );
$title_length    = codexin_get_option( 'cx_post_title_length' );
$excerpt_length  = codexin_get_option( 'cx_post_excerpt_length' );
$video 			 = codexin_meta( 'codexin_video' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
	<div class="post-content-wrapper">
		<header class="entry-header">
			<div class="entry-meta">
				<?php codexin_posts_meta(); ?>
			</div>

			<h2 class="post-title">
				<?php
				if ( ! is_single() ) {
					echo ( ( is_sticky() && is_home() && ! is_paged() ) ) ? '<span>' . esc_html__( 'Featured', 'powerpro' ) . '</span>' : '';
				?>
					<a href="<?php the_permalink(); ?>">
						<?php
						if ( $length_switch ) {
							// Limit the title characters.
							echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
						} else {
							the_title();
						}
						?>
					</a>
				<?php
				} else {
					the_title();
				}
				?>
			</h2>
		</header> <!-- end of entry-header -->

		<div class="entry-content">
			<?php
			if ( ! post_password_required() ) {
				if ( ! empty( $video ) ) {
					echo '<div class="cx-fluid-wrapper">';
						echo sprintf( '%s', $video );
					echo '</div> <!-- end of cx-fluid-wrapper -->';
				}
			}

			if ( ! is_single() ) {
			?>
				<div class="post-excerpt">
					<?php
					if ( $length_switch ) {
						echo '<p>';
							// Limit the excerpt characters.
							echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
						echo '</p>';
					} else {
						the_excerpt();
					}
					?>
				</div>
			<?php
			} else {
				echo '<div class="post-details clearfix">';
					the_content();

					// This section is for pagination purpose for a long large page that is seperated using nextpage tags.
					$args = array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'powerpro' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'powerpro' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					);
					wp_link_pages( $args );
				echo '</div>';
			}
			?>
		</div> <!-- end of entry-content -->
		
		<footer class="entry-footer">
			<?php
			codexin_posts_footer();
			?>
		</footer> <!-- end of entry-footer -->
	 </div> <!-- end of post-content-wrapper -->
</article> <!-- end of #post-## -->
