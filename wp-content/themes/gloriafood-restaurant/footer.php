<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

?>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
				<?php if ( is_active_sidebar( 'footer-left' ) ) {
					dynamic_sidebar( 'footer-left' );
				} ?>
            </div>
            <div class="col-md-4">
				<?php if ( is_active_sidebar( 'footer-middle' ) ) {
					dynamic_sidebar( 'footer-middle' );
				} ?>
            </div>
            <div class="col-md-4">
				<?php if ( is_active_sidebar( 'footer-right' ) ) {
					dynamic_sidebar( 'footer-right' );
				} ?>
            </div>
        </div>
    </div>
</footer>

<?php
if ( 1 === get_theme_mod( 'glf_order_buttons_show_buttons', 0 ) ) {
	if ( $gloriafood_order_buttons = gloriafood_generate_order_buttons_html() ) {
		echo "<div id='glf-footer-navigation-order-buttons' class='d-md-none d-lg-none d-xl-none d-none'>" . $gloriafood_order_buttons . "</div>";
	}
}
?>

<?php wp_footer(); ?>
</body>
</html>
