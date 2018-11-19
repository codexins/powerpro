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
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'powerpro' ) );

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	echo '<div class="nopassword">'. esc_html__( 'This post is password protected. Enter the password to view any comments.', 'powerpro' ) .'</div>';
    return;
}

?>

<div id="comments" class="comments-area">
	<?php

		// Checking if there is any comments
		if ( have_comments() ) { ?>
			<h3>
				<?php
					// Diplaying the comment number
					comments_number(
					esc_html__( 'This post has no comments', 'powerpro' ), 
					esc_html__( 'This post has One Comment', 'powerpro' ), 
					wp_kses_post( 'This post has <span>%</span> Comments', 'powerpro' )
					); 
				?>
			</h3>
			<ol class="comment-list clearfix">
				<?php
					wp_list_comments('type=all&callback=codexin_comment_function');
				?>
			</ol><!-- end of comment-list -->
			<?php codexin_comments_nav(); ?>

		<?php

	} // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'powerpro' ); ?></p>
	<?php
	} // Check for comments closed

	// Getting parametes for Comment Form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	// Building Comment Form
	comment_form(array(
		'fields' => apply_filters( 'comment_form_default_fields', 
			array(			
				'comment_notes_after'	=> '',	
				'author' 				=> 
					'<div class="row">
						<div class="col-12 col-sm-12 col-md-4">
							<div class="comment-form-author">
								<fieldset>
									<input id="author" name="author" type="text" placeholder="'.esc_html__( 'Name', 'powerpro' ). ( $req ? ' *' : '' ).'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
								</fieldset>
							</div>
						</div>',
				'email' 				=> 
					'<div class="col-12 col-sm-12 col-md-4">
						<div class="comment-form-email">
							<fieldset>
								<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'. esc_html__( 'Email', 'powerpro' ) . ( $req ? ' *' : '' ) .'" ' . $aria_req . ' />
							</fieldset>
						</div>
					</div>',
				'url' 					=> 
					'<div class="col-12 col-sm-12 col-md-4">
						<div class="comment-form-url">
							<fieldset>
								<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="'.esc_html__( 'Website', 'powerpro' ).'" size="30" />
							</fieldset>
						</div>
					</div>
				</div>'
			)
		),
		'comment_notes_before' 			=> '',
		'comment_notes_after' 			=> '',
		'title_reply' 					=> esc_html__( 'Leave a Comment', 'powerpro' ),
		'title_reply_to' 				=> esc_html__( 'Leave a  Comment', 'powerpro' ),
		'cancel_reply_link' 			=> esc_html__( 'Cancel Comment', 'powerpro' ),	
		'comment_field' 				=> 
			'<div class="comment-form-comment">
				<fieldset>' . '<textarea id="comment" placeholder="' . esc_html__( 'Your Comment', 'powerpro' ) . ( $req ? ' *' : '' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				</fieldset>
			</div>',
		'label_submit' 					=> esc_html__( 'Submit Comment', 'powerpro' ),
		'id_submit' 					=> 'submit_my_comment'
		
	));
	?>
</div><!-- end of #comments -->
