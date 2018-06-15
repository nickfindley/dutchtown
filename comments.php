<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( have_comments() ) : ?>

<div class="comments-container" id="comments">
	
	<div class="comments-container-target">

		<section class="comments">

			<h3 class="comments-title">
			<?php
				dutchtown_comment_count( array(
					'cap'		=> true,
					'phrase'	=> true,
					'after_phrase'	=> ' on &ldquo;' . get_the_title() . '&rdquo;'
					)
				);
			?>
			</h3><!-- .comments-title -->

			<?php the_comments_navigation(); ?>

			<?php
				wp_list_comments( array(
					'style'     	=> 'ol-article',
					'short_ping'	=> true,
					'type'			=> 'comment',
					'walker'		=> new Dutchtown_Walker_Comment
				) );
			?>
			
			<?php the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?><p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dutchtown' ); ?></p><?php
			endif; ?>
		</section><!-- .comments -->
	
	</div><!-- .comments-container-target -->

</div><!-- .comments-container -->
<?php endif; // check have_comments() ?>

<?php if ( comments_open() ) : ?>
<div class="comment-form-container" id="leave-comment">

	<div class="comment-form-container-target">

		<section class="comment-form">
			
			<?php
				comment_form( array(
					'class_form'			=> 'comment-form-form',
					'comment_notes_before'	=> __( '<p>Your email address will not be published. Required fields are marked with an asterisk (*).</p>', 'dutchtown' ),
					'comment_field'			=> '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea></p>',
					'label_submit'			=> __( 'Post Your Comment', 'dutchtown' ),
					'format'				=> 'html5'
				));
			?>
		
		</section><!-- .comment-form -->

	</div><!-- .comment-form-container-target -->

</div><!-- .comment-form-container -->
<?php endif; // check comments_open ?>
