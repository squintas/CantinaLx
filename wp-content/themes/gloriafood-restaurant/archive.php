<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>
    <div class="container">
        <section id="primary" class="content-area">
            <main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', 'excerpt' );

						// End the loop.
					endwhile;

					// Previous/next page navigation.
					gloriafood_the_posts_navigation();

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>
            </main><!-- #main -->
        </section><!-- #primary -->
    </div>
<?php
get_footer();
