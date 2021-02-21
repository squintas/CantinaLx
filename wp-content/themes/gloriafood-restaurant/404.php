<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

get_header();
?>
    <div class="container">
        <section id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="error-404 not-found">
                    <div class="page-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'gloriafood-restaurant' ); ?></p>
						<?php get_search_form(); ?>
                    </div><!-- .page-content -->
                </div><!-- .error-404 -->

            </main><!-- #main -->
        </section><!-- #primary -->
    </div>
<?php
get_footer();
