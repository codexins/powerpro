<?php
/**
 * Functions definition related to various pagination
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! function_exists( 'codexin_posts_nav' ) ) {
	/**
	 * Function for getting the next/previous posts link
	 *
	 * @param    string $prev Text for previous link.
	 * @param    string $next Text for next link.
	 * @param	 object $custom Name of the Custom query object.
	 * @return   mixed
	 * @since    v1.0
	 */
	function codexin_posts_nav( $prev = null, $next = null, $custom = null ) {
		$prev = ! empty( $prev ) ? $prev : esc_html__( 'Newer Posts', 'powerpro' );
		$next = ! empty( $next ) ? $next : esc_html__( 'Older Posts', 'powerpro' );

		$prev_link = get_previous_posts_link( '&laquo; ' . $prev );
		$next_link = ( null !== $custom ) ? get_next_posts_link( $next . ' &raquo; ', $custom->max_num_pages ) : get_next_posts_link( $next . ' &raquo; ' );

		if ( empty( $prev_link ) && empty( $next_link ) ) {
			return;
		}

		$nav = '';

		$nav .= '<nav class="posts-nav clearfix" aria-label="' . esc_html__( 'Posts navigation', 'powerpro' ) . '">';
		if ( $next_link ) {
			$nav .= '<div class="nav-next alignright post-btn">' . $next_link . '</div>';
		}

		if ( $prev_link ) {
			$nav .= '<div class="nav-previous alignleft post-btn">' . $prev_link . '</div>';
		}
		$nav .= '</nav> <!-- end of posts-nav -->';
		echo sprintf( '%s', apply_filters( 'codexin_posts_nav', $nav ) );
	}
}

if ( ! function_exists( 'codexin_post_nav' ) ) {
	/**
	 * Function for getting the next/previous single post link
	 *
	 * @param    string $prev Text for previous link.
	 * @param    string $next Text for next link.
	 * @return   mixed
	 * @since    v1.0
	 */
	function codexin_post_nav( $prev = null, $next = null ) {
		$prev = ! empty( $prev ) ? $prev : esc_html__( 'Previous Post', 'powerpro' );
		$next = ! empty( $next ) ? $next : esc_html__( 'Next Post', 'powerpro' );

		$prev_link = get_previous_post_link( '%link', esc_html( $prev . ' &raquo;' ) );
		$next_link = get_next_post_link( '%link', esc_html( '&laquo; ' . $next ) );

		if ( ( 'button' === codexin_get_option( 'cx_post_pagination' ) ) ) {
			$prev_link = get_previous_post_link( '%link', esc_html( $prev . ' &raquo;' ) );
			$next_link = get_next_post_link( '%link', esc_html( '&laquo; ' . $next ) );
		} elseif ( 'text' === codexin_get_option( 'cx_post_pagination' ) ) {
			$prev_link = get_previous_post_link( '%link', esc_html__( '%title &raquo;', 'powerpro' ) );
			$next_link = get_next_post_link( '%link', esc_html__( '&laquo; %title', 'powerpro' ) );
		}

		if ( empty( $prev_link ) && empty( $next_link ) ) {
			return;
		}

		$nav = '';

		$nav .= '<nav class="posts-nav clearfix" aria-label="' . esc_html__( 'Post navigation', 'powerpro' ) . '">';
		if ( $next_link ) {
			$nav .= '<div class="nav-next alignleft post-btn">' . $next_link . '</div>';
		}

		if ( $prev_link ) {
			$nav .= '<div class="nav-previous alignright post-btn">' . $prev_link . '</div>';
		}
		$nav .= '</nav> <!-- end of posts-nav -->';
		echo sprintf( '%s', apply_filters( 'codexin_post_nav', $nav ) );
	}
} // End if().

if ( ! function_exists( 'codexin_numbered_posts_nav' ) ) {
	/**
	 * Function for numeric pagination for posts
	 *
	 * @uses     paginate_links()
	 * @param    object $custom Name of the Custom query object.
	 * @return   mixed
	 * @since    v1.0
	 */
	function codexin_numbered_posts_nav( $custom = null ) {

		global $wp_query;
		// Stop execution if there's only 1 page.
		if ( ( ( null !== $custom ) ? $custom->max_num_pages : $wp_query->max_num_pages ) <= 1 ) {
			return;
		}

		ob_start();
		?>
			<nav class="number-pagination" aria-label="<?php echo esc_html__( 'Posts navigation', 'powerpro' ); ?>">
				<?php
				$current = max( 1, absint( get_query_var( 'paged' ) ) );
				$pagination = paginate_links( array(
					'base'      => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
					'format'    => '?paged=%#%',
					'current'   => $current,
					'total'     => ( null !== $custom ) ? $custom->max_num_pages : $wp_query->max_num_pages,
					'type'      => 'array',
					'prev_text' => '&laquo;',
					'next_text' => '&raquo;',
				) );

				if ( ! empty( $pagination ) ) {
				?>
					<ul class="pagination">
						<?php
						foreach ( $pagination as $key => $page_link ) {
						?>
							<li class="paginated_link<?php echo esc_attr( ( false !== strpos( $page_link, 'current' ) ) ? ' active' : '' ); ?>"><?php echo sprintf( '%s', $page_link ); ?></li>
						<?php
						}
						?>
					</ul> <!-- end of pagination -->
				<?php
				}
				?>
			</nav> <!-- end of number-pagination -->
		<?php
		$links = ob_get_clean();
		echo sprintf( '%s', apply_filters( 'codexin_numbered_posts_nav', $links ) );
	}
} // End if().

if ( ! function_exists( 'codexin_comments_nav' ) ) {
	/**
	 * Function to display previous/next comments navigation if needed
	 *
	 * @since v1.0
	 */
	function codexin_comments_nav() {

		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
		?>
			<nav id="comment-nav-below" class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'powerpro' ); ?></h2>
				<div class="nav-links clearfix">
					<div class="nav-previous alignleft post-btn"><?php previous_comments_link( esc_html__( '&laquo; Older Comments', 'powerpro' ) ); ?></div>
					<div class="nav-next alignright post-btn"><?php next_comments_link( esc_html__( 'Newer Comments &raquo;', 'powerpro' ) ); ?></div>
				</div><!-- end of nav-links -->
			</nav><!-- end of #comment-nav-below -->
		<?php
		}
	}
}
