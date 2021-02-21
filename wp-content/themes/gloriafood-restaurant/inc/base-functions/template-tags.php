<?php
/**
 * Custom template tags for this theme
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

if ( ! function_exists( 'gloriafood_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function gloriafood_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">on <a href="%1$s" rel="bookmark">%2$s</a></span>. ',
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'gloriafood_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function gloriafood_posted_by() {
		printf(
		/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
			'<span class="byline"><span style="margin-right:5px;">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span> ',
			__( 'Posted by', 'gloriafood-restaurant' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'gloriafood_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function gloriafood_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';

			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'gloriafood-restaurant' ), get_the_title() ) );

			echo '</span> ';
		}
	}
endif;

if ( ! function_exists( 'gloriafood_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function gloriafood_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			gloriafood_posted_by();

			// Posted on
			gloriafood_posted_on();

			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'gloriafood-restaurant' ) );
			if ( $categories_list ) {
				printf(
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links"><span class="">%1$s</span> %2$s</span>. ',
					__( 'Posted in', 'gloriafood-restaurant' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'gloriafood-restaurant' ) );
			if ( $tags_list ) {
				printf(
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
					'<span class="tags-links">%1$s %2$s</span>. ',
					__( 'Tags:', 'gloriafood-restaurant' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Comment count.
		if ( ! is_singular() ) {
			gloriafood_comment_count();
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'gloriafood-restaurant' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
	}
endif;

if ( ! function_exists( 'gloriafood_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function gloriafood_post_thumbnail() {
		if ( ! gloriafood_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

            <figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
            </figure><!-- .post-thumbnail -->

		<?php
		else :
			?>

            <figure class="post-thumbnail">
                <a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
                </a>
            </figure>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'gloriafood_comment_avatar' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function gloriafood_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, gloriafood_get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'gloriafood_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function gloriafood_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;

if ( ! function_exists( 'gloriafood_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function gloriafood_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'<span class="nav-prev-text">&laquo; %s</span>',
					__( 'Newer posts', 'gloriafood-restaurant' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s &raquo;</span>',
					__( 'Older posts', 'gloriafood-restaurant' )
				),
			)
		);
	}
endif;
