<?php
/**
 *
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package 	Codexin
 * @subpackage 	Templates
 * @since 		1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	echo '<div class="nopassword">' . esc_html__( 'This post is password protected. Enter the password to view any comments.', 'powerpro' ) . '</div>';
	return;
}

?>

<div id="comments" class="comments-area">
	<?php

	// Checking if there is any comments.
	if ( have_comments() ) { ?>
		<h3 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( 1 === (int) $comments_number ) {
				printf(
					/* translators: %s: post title */
					esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'powerpro' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'powerpro'
					) ),
					intval( number_format_i18n( $comments_number ) ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3>
		<ol class="comment-list clearfix">
			<?php
				wp_list_comments( 'type=all&callback=codexin_comment_function' );
			?>
		</ol><!-- end of comment-list -->
		<?php codexin_comments_nav(); ?>

	<?php

	} // End if().

	// If comments are closed and there are comments, let's leave a little note.
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'powerpro' ); ?></p>
	<?php
	} // End if().

	// Getting parametes for Comment Form.
	$commenter 	= wp_get_current_commenter();
	$req 		= get_option( 'require_name_email' );
	$aria_req 	= ( $req ? " aria-required='true'" : '' );
	$html5     	= current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$consent  	= empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	// Building Comment Form.
	comment_form(array(
		'fields' => apply_filters( 'comment_form_default_fields',
			array(
				'comment_notes_after'	=> '',
				'author' 				=>
					'<div class="row">
						<div class="col-12 col-sm-12 col-md-4">
							<div class="comment-form-author">
								<fieldset>
									<input id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', 'powerpro' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
								</fieldset>
							</div>
						</div>',
				'email' 				=>
					'<div class="col-12 col-sm-12 col-md-4">
						<div class="comment-form-email">
							<fieldset>
								<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_html__( 'Email', 'powerpro' ) . ( $req ? ' *' : '' ) . '" ' . $aria_req . ' />
							</fieldset>
						</div>
					</div>',
				'url' 					=>
					'<div class="col-12 col-sm-12 col-md-4">
						<div class="comment-form-url">
							<fieldset>
								<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( 'Website', 'powerpro' ) . '" size="30" />
							</fieldset>
						</div>
					</div>',
				'cookies' 				=>
					'<div class="col-12 col-sm-12 col-md-12">
						<div class="comment-form-cookies-consent">
							<fieldset>
								<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' /> ' .
								'<label class="form-check-label" for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment', 'powerpro' ) . '</label>
							</fieldset>
						</div>
					</div>
				</div>',
			)
		),
		'comment_notes_before' 			=> '',
		'comment_notes_after' 			=> '',
		'title_reply' 					=> esc_html__( 'Leave a Comment', 'powerpro' ),
		'title_reply_to' 				=> esc_html__( 'Leave a Comment', 'powerpro' ),
		'cancel_reply_link' 			=> esc_html__( 'Cancel Comment', 'powerpro' ),
		'comment_field' 				=>
			'<div class="comment-form-comment">
				<fieldset>' . '<textarea id="comment" placeholder="' . esc_html_x( 'Comment', 'noun', 'powerpro' ) . ( $req ? ' *' : '' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				</fieldset>
			</div>',
		'label_submit' 					=> esc_html__( 'Submit Comment', 'powerpro' ),
		'id_submit' 					=> 'submit_my_comment',
		'class_submit' 					=> 'default-btn',
	));
	?>
</div><!-- end of #comments -->
