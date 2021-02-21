<?php
/**
 * Theme customizer sections and options
 **/

/**
 * Add theme customizer options for the GloriaFood theme
 *
 * @param $wp_customize
 */
function gloriafood_theme_customizer( $wp_customize ) {
	/* Useful links - START */
	$wp_customize->add_section(
		'glf_useful_links',
		array(
			'title'    => __( 'Useful Links', 'gloriafood-restaurant' ),
			'priority' => 10,
		)
	);

	$wp_customize->add_setting(
		'glf_useful_links_docs',
		array(
			'default'           => '',
			'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'glf_useful_links_docs',
			array(
				'label'       => '',
				// translators: link to documentation
				'description' => sprintf( __( '<a href="%s" target="_blank">Documentation</a>', 'gloriafood-restaurant' ), esc_url( 'https://www.gloriafood.com/free-restaurant-wordpress-theme' ) ),
				'section'     => 'glf_useful_links',
			)
		)
	);
	/* Useful links - END */

	/* Card background images - START */
	$wp_customize->add_section(
		'glf_background_images',
		array(
			'title'       => __( 'Background Images', 'gloriafood-restaurant' ),
			// translators: link to documentation
			'description' => __( '<p>Use the included default images of personalize your site by uploading your own images.</p><p>The default images are <b>1600 pixels wide and between 1000-1300 pixels tall</b>.</p>', 'gloriafood-restaurant' ),
			'priority'    => 84,
		)
	);

	for ( $i = 1; $i <= 6; $i ++ ) {
		$wp_customize->add_setting(
			'glf_background_image_' . $i,
			array(
				'default'           => '',
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'glf_background_image_' . $i,
				array(
					'label'    => __( 'Background Image', 'gloriafood-restaurant' ) . ' ' . $i,
					'settings' => 'glf_background_image_' . $i,
					'section'  => 'glf_background_images',
				)
			)
		);
		$wp_customize->add_setting(
			'glf_background_image_darkness_' . $i,
			array(
				'default'           => '50',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Slider_Custom_Control(
				$wp_customize,
				'glf_background_image_darkness_' . $i,
				array(
					'label'       => esc_html__( 'Darkness', 'gloriafood-restaurant' ),
					'section'     => 'glf_background_images',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				)
			)
		);

		if ( $i < 6 ) {
			$wp_customize->add_setting(
				'sample_simple_notice_' . $i,
				array(
					'default'           => '',
					'transport'         => 'refresh',
					'sanitize_callback' => 'skyrocket_text_sanitization',
				)
			);

			$wp_customize->add_control(
				new Skyrocket_Simple_Notice_Custom_control(
					$wp_customize,
					'sample_simple_notice_' . $i,
					array(
						'label'       => '',
						'description' => '<br><br>',
						'section'     => 'glf_background_images',
					)
				)
			);
		}
	}
	/* Card background images - END */

	/* Colors - START */
	$wp_customize->add_setting(
		'glf_accent_color',
		array(
			'default'           => '#f09c48',
			'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'glf_accent_color',
			array(
				'label'       => __( 'Accent color', 'gloriafood-restaurant' ),
				'description' => esc_html__( 'Change the default accent color for links, buttons, and more.', 'gloriafood-restaurant' ),
				'settings'    => 'glf_accent_color',
				'section'     => 'colors',
			)
		)
	);
	/* Colors - END */

	/* Header image - START */
	$wp_customize->add_setting(
		'glf_header_image_darkness',
		array(
			'default'           => '50',
			'sanitize_callback' => 'skyrocket_sanitize_integer',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'glf_header_image_darkness',
			array(
				'label'       => esc_html__( 'Darkness', 'gloriafood-restaurant' ),
				'section'     => 'header_image',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			)
		)
	);
	/* Header image - END */

	/* Navigation settings - START */
	$wp_customize->add_section(
		'glf_order_buttons',
		array(
			'title'       => __( 'Call to Action Buttons', 'gloriafood-restaurant' ),
			'description' => esc_html__( 'Customize the display and location of the order and table reservation buttons', 'gloriafood-restaurant' ),
			'priority'    => 83,
		)
	);

	$wp_customize->add_setting(
		'glf_order_buttons_show_buttons',
		array(
			'default'           => 0,
			'sanitize_callback' => 'skyrocket_switch_sanitization',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'glf_order_buttons_show_buttons',
			array(
				'label'       => esc_html__( 'Show buttons on scroll', 'gloriafood-restaurant' ),
				'description' => esc_html__( 'Replace primary menu with the call to action buttons after scrolling the page', 'gloriafood-restaurant' ),
				'section'     => 'glf_order_buttons',
			)
		)
	);

	if ( ! gloriafood_is_glf_plugin_active_and_configured() ) {
		$wp_customize->add_setting(
			'glf_custom_buttons_notice',
			array(
				'default'           => '',
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh'
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'glf_custom_buttons_notice',
				array(
					'label'       => esc_html__( 'Set your call to action buttons:', 'gloriafood-restaurant' ),
					'description' => __( '1) Activate the Menu - Ordering - Reservation plugin to take free online orders and reservations with the GloriaFood system<br><br>OR<br><br>2) Set custom buttons', 'gloriafood-restaurant' ),
					'section'     => 'glf_order_buttons',
				)
			)
		);

		$wp_customize->add_setting(
			'glf_order_buttons_order_text',
			array(
				'default'           => __( 'See MENU & Order', 'gloriafood-restaurant' ),
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh'
			)
		);
		$wp_customize->add_control(
			'glf_order_buttons_order_text',
			array(
				'label'       => __( 'Online ordering button', 'gloriafood-restaurant' ),
				'description' => '',
				'section'     => 'glf_order_buttons',
				'type'        => 'text',
			)
		);

		$wp_customize->add_setting(
			'glf_order_buttons_order_link',
			array(
				'default'           => '#',
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			'glf_order_buttons_order_link',
			array(
				'label'       => '',
				'description' => '',
				'section'     => 'glf_order_buttons',
				'type'        => 'text',
			)
		);

		$wp_customize->add_setting(
			'glf_order_buttons_reservation_text',
			array(
				'default'           => __( 'Table Reservation', 'gloriafood-restaurant' ),
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh'
			)
		);
		$wp_customize->add_control(
			'glf_order_buttons_reservation_text',
			array(
				'label'       => __( 'Table reservations button', 'gloriafood-restaurant' ),
				'description' => '',
				'section'     => 'glf_order_buttons',
				'type'        => 'text',
			)
		);

		$wp_customize->add_setting(
			'glf_order_buttons_reservation_link',
			array(
				'default'           => '#',
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			'glf_order_buttons_reservation_link',
			array(
				'label'       => '',
				'description' => '',
				'section'     => 'glf_order_buttons',
				'type'        => 'text',
			)
		);
	}
	/* Navigation settings - END */

	/* Restaurant selection if plugin installed - START */
	if ( gloriafood_is_glf_plugin_active_and_configured() ) {
		$wp_customize->add_section(
			'glf_restaurant',
			array(
				'title'       => __( 'Restaurant config', 'gloriafood-restaurant' ),
				'description' => esc_html__( 'Configure the restaurant from your GloriaFood account you want to use on this website', 'gloriafood-restaurant' ),
				'priority'    => 82,
			)
		);

		$wp_customize->add_setting(
			'glf_selected_restaurant',
			array(
				'default'           => 0,
				'sanitize_callback' => 'gloriafood_sanitize_customizer_input',
				'transport'         => 'refresh',
			)
		);

		$plugin_settings = get_option( 'glf_mor_restaurant_data' );
		if ( count( $plugin_settings->restaurants ) > 1 ) {
			$control_options = array();
			foreach ( $plugin_settings->restaurants as $index => $restaurant ) {
				$control_options[ $index ] = esc_html( $restaurant->name );
			}

			$wp_customize->add_control(
				'glf_selected_restaurant',
				array(
					'type'        => 'select',
					'section'     => 'glf_restaurant',
					'label'       => esc_html__( 'Selected restaurant', 'gloriafood-restaurant' ),
					'description' => esc_html__( 'Select the GloriaFood restaurant that you want to link to this website', 'gloriafood-restaurant' ),
					'choices'     => $control_options,
				)
			);
		} else {
			$wp_customize->add_control(
				new Skyrocket_Simple_Notice_Custom_control(
					$wp_customize,
					'glf_selected_restaurant',
					array(
						'label'       => esc_html__( 'Selected restaurant', 'gloriafood-restaurant' ),
						'description' => esc_html( $plugin_settings->restaurants[0]->name ),
						'section'     => 'glf_restaurant',
					)
				)
			);
		}

		if ( gloriafood_glf_plugin_has_menu_shortcode() ) {
			$wp_customize->add_setting(
				'glf_restaurant_menu_page',
				array(
					'default'           => '',
					'sanitize_callback' => 'gloriafood_sanitize_dropdown_pages',
				)
			);
			$wp_customize->add_control(
				'glf_restaurant_menu_page',
				array(
					'type'        => 'dropdown-pages',
					'section'     => 'glf_restaurant',
					'label'       => esc_html__( 'Menu page', 'gloriafood-restaurant' ),
					'description' => esc_html__( 'The menu will be appended to the page content', 'gloriafood-restaurant' ),
				)
			);
		}
	}

	wp_enqueue_style( 'customizer-glf-icons', trailingslashit( get_template_directory_uri() ) . 'css/glf_icons.css', array(), gloriafood_get_version() );
	/* Restaurant selection if plugin installed - END */
}

add_action( 'customize_register', 'gloriafood_theme_customizer' );

function gloriafood_sanitize_customizer_input( $input ) {
	return wp_strip_all_tags( stripslashes( $input ) );
}

function gloriafood_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );

	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function gloriafood_generate_customizer_css() {
	$has_css_changes = false;

	$response = "<style type='text/css'>";

	if ( $accent_color = get_theme_mod( 'glf_accent_color' ) ) {
		$has_css_changes = true;

		$response .= "a,
		 a:hover,
		 a:focus {
			color: {$accent_color};
		}
		
		.glf-promo-card-price {
			color: {$accent_color};
		}
		span.glf-card-subtitle {
			color: {$accent_color};
		}
		.glf-promo-card {
			border-color: {$accent_color};
		}
		
		div.glf-background-card:nth-child(2n+2) div.widget {
			box-shadow: inset 0 0 0 1px {$accent_color};
		}
		
		.navbar-light .navbar-nav .show > .nav-link,
		.navbar-light .navbar-nav .active > .nav-link,
		.navbar-light .navbar-nav .nav-link.show,
		.navbar-light .navbar-nav .nav-link.active {
		    color: {$accent_color};
		}
		
		span.sticky-post {
			background: {$accent_color};
		}
		
		body.blog article.sticky,
		body.archive article.sticky {
		    border: 2px solid {$accent_color};
		}
		
		blockquote {
			border-left: 0.25rem solid {$accent_color};
		}
		
		.navbar .navbar-nav a.dropdown-item.active,
		.navbar .navbar-nav a.dropdown-item:active {
		    background-color: {$accent_color};
		}
		
		span.glf-card-subtitle-dash {
			border-color: {$accent_color};
		}
		
		.glf-button.reservation.custom-reservation-button {
			color: {$accent_color};
		}
		
		.glf-button.custom-order-button {
			background-color: {$accent_color};
		}
		";
	} else {
		$has_css_changes = true;

		$response .= '.gloriafood-button,
		.glf-button {
		    background-color: #f09c49;
		}
		
		.gloriafood-button.reservation,
		.glf-button.reservation {
		    color: #f09c49;
		}
		
		.gloriafood-button.reservation:hover,
		.glf-button.reservation:hover {
		    color: #f09c49;
		}
		';
	}

	if ( 1 == gloriafood_get_order_buttons_count() ) {
		$response.="#glf-footer-navigation-order-buttons > span, #glf-footer-navigation-order-buttons > a {
			width:100%;
		}";
	}

	if ( ! display_header_text() ) {
		$response .= "div.jumbotron h1,
		.jumbotron span.jumbotron-description.lead {
			display: none;
		}
		
		.jumbotron span.jumbotron-description-left-dash,
		.jumbotron span.jumbotron-description-right-dash {
			display: none;
		}
		";
	} elseif ( $header_textcolor = get_theme_mod( 'header_textcolor', false ) ) {
		$response .= "div.jumbotron h1,
		.jumbotron span.jumbotron-description.lead {
			color: #{$header_textcolor};
		}
		
		.jumbotron span.jumbotron-description-left-dash,
		.jumbotron span.jumbotron-description-right-dash {
			border-color: #{$header_textcolor};
		}
		";
	}

	if ( $header_image = get_header_image() ) {
		$has_css_changes = true;

		$darkness = get_theme_mod( 'glf_header_image_darkness', 50 );

		$response .= '.jumbotron {
			background: linear-gradient(rgba(0, 0, 0, ' . ( $darkness / 100 ) . '), rgba(0, 0, 0, ' . ( $darkness / 100 ) . ")), url({$header_image});
			background-size: cover;
			background-position: center center;
		}
		";
	}

	$bg_images_count = 0;
	for ( $i = 1; $i <= 6; $i ++ ) {
		if ( $bg_image = get_theme_mod( 'glf_background_image_' . $i ) ) {
			$bg_images_count ++;
		}
	}

	if ( $bg_images_count ) {
		global $wpdb;

		$has_css_changes = true;
		$bg_images_count = $bg_images_count * 2;

		$current_bg_image = 0;
		for ( $i = 1; $i <= 6; $i ++ ) {
			if ( $bg_image = get_theme_mod( 'glf_background_image_' . $i ) ) {
				if ( is_numeric( $bg_image ) ) {
					$bg_image = wp_get_attachment_image_src( $bg_image, 'glf_background' );
				} else {
					$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid=%s;", $bg_image ) );
					$bg_image   = wp_get_attachment_image_src( $attachment[0], 'glf_background' );
				}

				$current_bg_image += 2;

				$darkness = get_theme_mod( 'glf_background_image_darkness_' . $i, 50 );

				$response .= ".container-fluid.glf-background-card:nth-child({$bg_images_count}n+{$current_bg_image}) {
				    background: linear-gradient(rgba(0, 0, 0, " . ( $darkness / 100 ) . '), rgba(0, 0, 0, ' . ( $darkness / 100 ) . ")), url({$bg_image[0]});
				    background-size: cover;
				    background-position: center center;
				}
				";
			}
		}
	}

	$response .= '</style>';

	if ( $has_css_changes ) {
		echo $response;
	}
}

add_action( 'wp_head', 'gloriafood_generate_customizer_css' );

require_once get_template_directory() . '/inc/skyrocket-custom-controls.php';
