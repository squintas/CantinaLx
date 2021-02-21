<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

$gloriafood_discussion = gloriafood_get_discussion_data();
?>

<div id="comments" class="<?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
    <div class="<?php echo $gloriafood_discussion->responses > 0 ? 'comments-title-wrap' : 'comments-title-wrap no-responses'; ?>">
        <h2 class="comments-title">
			<?php
			if ( comments_open() ) {
				if ( have_comments() ) {
					esc_html_e( 'Join the Conversation', 'gloriafood-restaurant' );
				} else {
					esc_html_e( 'Leave a comment', 'gloriafood-restaurant' );
				}
			} else {
				if ( '1' === $gloriafood_discussion->responses ) {
					/* translators: %s: post title */
					printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'gloriafood-restaurant' ), get_the_title() );
				} else {
					printf(
					/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s reply on &ldquo;%2$s&rdquo;',
							'%1$s replies on &ldquo;%2$s&rdquo;',
							$gloriafood_discussion->responses,
							'comments title',
							'gloriafood-restaurant'
						),
						number_format_i18n( $gloriafood_discussion->responses ),
						get_the_title()
					);
				}
			}
			?>
        </h2><!-- .comments-title -->
    </div><!-- .comments-title-flex -->
	<?php
	if ( have_comments() ) :

		// Show comment form at top if showing newest comments at the top.
		if ( comments_open() ) {
			gloriafood_comment_form( 'desc' );
		}

		?>
        <ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => gloriafood_get_avatar_size(),
					'short_ping'  => true,
					'style'       => 'ol',
				)
			);
			?>
        </ol><!-- .comment-list -->
		<?php

		// Show comment navigation.
		if ( have_comments() ) :
			the_comments_navigation(
				array(
					'prev_text' => sprintf( '<span class="nav-prev-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span>', __( 'Previous', 'gloriafood-restaurant' ), __( 'Comments', 'gloriafood-restaurant' ) ),
					'next_text' => sprintf( '<span class="nav-next-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span>', __( 'Next', 'gloriafood-restaurant' ), __( 'Comments', 'gloriafood-restaurant' ) ),
				)
			);
		endif;

		// Show comment form at bottom if showing newest comments at the bottom.
		if ( comments_open() && 'asc' === strtolower( get_option( 'comment_order', 'asc' ) ) ) :
			?>
            <div class="comment-form-flex">
                <span class="screen-reader-text"><?php esc_html_e( 'Leave a comment', 'gloriafood-restaurant' ); ?></span>
                <h2 class="comments-title"
                    aria-hidden="true"><?php esc_html_e( 'Leave a comment', 'gloriafood-restaurant' ); ?></h2>
				<?php gloriafood_comment_form( 'asc' ); ?>
            </div>
		<?php
		endif;

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
            <p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'gloriafood-restaurant' ); ?>
            </p>
		<?php
		endif;

	else :

		// Show comment form.
		gloriafood_comment_form( true );

	endif; // if have_comments.
	?>
</div><!-- #comments -->
