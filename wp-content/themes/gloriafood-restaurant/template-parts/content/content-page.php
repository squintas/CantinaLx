<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
		<?php
		the_content();

		if ( gloriafood_is_glf_plugin_active_and_configured() ) {
			$gloriafood_menu_page = get_theme_mod( 'glf_restaurant_menu_page', '' );

			if ( get_the_ID() === $gloriafood_menu_page ) {
				$gloriafood_restaurant_settings = gloriafood_get_glf_plugin_settings();

				if ( $gloriafood_restaurant_settings ) {
					echo do_shortcode( '[restaurant-full-menu ruid="' . $gloriafood_restaurant_settings['ruid'] . '"]' );
				}
			}
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gloriafood-restaurant' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'gloriafood-restaurant' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
        </footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
