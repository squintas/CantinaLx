<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

get_header();

if ( is_front_page() ) {
	echo '<section id="primary" class="content-area"><main id="main" class="site-main">';
	dynamic_sidebar( 'homepage' );
	echo '</main></section>';
} else {
	?>

    <div class="container">
        <section id="primary" class="content-area">
            <main id="main" class="site-main">

				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile; // End of the loop.
				?>

            </main><!-- #main -->
        </section><!-- #primary -->
    </div>
	<?php
}
get_footer();
