<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

?>
<div class="container">
    <section class="no-results not-found">
        <div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'gloriafood-restaurant' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

            elseif ( is_search() ) :
				?>

                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gloriafood-restaurant' ); ?></p>
				<?php
				get_search_form();

			else :
				?>

                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gloriafood-restaurant' ); ?></p>
				<?php
				get_search_form();

			endif;
			?>
        </div><!-- .page-content -->
    </section><!-- .no-results -->
</div>