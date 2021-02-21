<?php
// Theme starter content
$gloriafood_starter_content = array(
	'widgets' => array(
		'glf-homepage'  => array(
			'about-us-card' => array(
				'glf-about-us',
				array(
					'title'    => __( 'We are Pronto NY', 'gloriafood-restaurant' ),
					'subtitle' => __( 'About Us', 'gloriafood-restaurant' ),
					'text'     => __( '<p>At Restaurant Pronto we pride ourselves with the ability to offer our customers delicious and authentic Italian food, created at the highest standards. Every single meal we make is unique. We guarantee that you won`t get disappointed.</p><p>The key to our success is simple: providing exquisite meals, made out of only the purest and freshest of ingredients that taste great every single time.</p><p>Our goal is to help you enjoy the little things in life that matter. So eat delicious food. Grab a drink. But most of all, relax! We thank you from the bottom of our hearts for your continued support.</p>', 'gloriafood-restaurant' ),
					'columns'  => 2,
					'image_1'  => get_theme_file_uri() . '/assets/starter/about-1.jpg',
					'image_2'  => get_theme_file_uri() . '/assets/starter/about-2.jpg',
				)
			),
			'promos-card'   => array(
				'glf-promo-cards',
				array(
					'title_1'       => __( 'Best Friends Deal', 'gloriafood-restaurant' ),
					'subtitle_1'    => __( 'Sharing Is Caring', 'gloriafood-restaurant' ),
					'text_1'        => __( '<p>2 Medium Pizzas</p><p>Soft Drinks</p><p>Garlic Bread or Patato Wedges</p><o>Salad to share</o>', 'gloriafood-restaurant' ),
					'price_label_1' => __( 'Only', 'gloriafood-restaurant' ),
					'price_1'       => __( '$20', 'gloriafood-restaurant' ),
					'title_2'       => __( 'Buy 1 Get 1 FREE', 'gloriafood-restaurant' ),
					'subtitle_2'    => __( 'This Week Only', 'gloriafood-restaurant' ),
					'text_2'        => __( '<p>Hope you are hungry. Buy one regular priced pizza online and get a second pizza totally free!</p><p>Online only!</p>', 'gloriafood-restaurant' ),
					'price_label_2' => __( 'Order code:', 'gloriafood-restaurant' ),
					'price_2'       => __( '7867', 'gloriafood-restaurant' ),
					'title_3'       => __( 'Awesome Foursome', 'gloriafood-restaurant' ),
					'subtitle_3'    => __( 'Sundays Only', 'gloriafood-restaurant' ),
					'text_3'        => __( '<p>6 Delicious regular size pizzas to choose from: Margherita, Capricciosa, Prosciutto e Funghi, Diavola, Calzone, Primavera.</p>', 'gloriafood-restaurant' ),
					'price_label_3' => __( 'Only', 'gloriafood-restaurant' ),
					'price_3'       => __( '$40', 'gloriafood-restaurant' ),
				),
			),
			'gallery-card'  => array(
				'glf-gallery',
				array(
					'title'    => __( 'Delicious Italian Food', 'gloriafood-restaurant' ),
					'subtitle' => __( 'Love At First Bite', 'gloriafood-restaurant' ),
					'images'   => get_theme_file_uri() . '/assets/starter/gallery-1.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-2.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-3.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-4.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-5.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-6.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-7.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-8.jpg' . ',' . get_theme_file_uri() . '/assets/starter/gallery-9.jpg',
				),
			),
			'catering-card' => array(
				'custom_html',
				array(
					'title'   => '',
					'content' => __( '<div class="col text-center">
	<h2>Catering</h2>
	<span class="glf-card-subbtitle-container text-center">
	<span class="glf-card-subtitle-dash ml-auto"></span>
		<span class="glf-card-subtitle mr-auto subtitle">Party time</span></span></div>

<p style="text-align: center">Restaurant Pronto can cater to any party or event irrespective of how big or small. We specialize in catering with personalised service and special menus on request. In our menu palette, you`ll discover unique and sophisticated tastes - all of which will help you uncover the true greatness of the Italian cuisine.
<br><br>
Tell us about your event at office@pronto-wp.com</p>', 'gloriafood-restaurant' ),
				)
			),
			'delivery-card' => array(
				'glf-about-us',
				array(
					'title'    => __( 'Food Delivery in NY', 'gloriafood-restaurant' ),
					'subtitle' => __( 'Get Served Like a King', 'gloriafood-restaurant' ),
					'text'     => __( '<p>Looking for food delivery nearby? Not everybody knows or has the time to prepare tasty food.</p><p>When you want to get served like a king then food delivery from restaurant Pronto will be your best choice.</p><p>Simply select "Delivery" at the checkout screen and we hope you\'ll appreciate our food delivery service.</p>', 'gloriafood-restaurant' ),
					'columns'  => 1,
					'image_1'  => get_theme_file_uri() . '/assets/starter/food-delivery.jpg',
				)
			),
		),
		'footer-left'   => array(
			'navigation_links' => array(
				'nav_menu',
				array(
					'title'    => __( 'Links', 'gloriafood-restaurant' ),
					'nav_menu' => 'menu-1'
				)
			)
		),
		'footer-middle' => array(
			'text_contact_us' => array(
				'text',
				array(
					'title' => __( 'Contact Us', 'gloriafood-restaurant' ),
					'text'  => __( "100 Tenth Avenue, New York City, NY 1001\nPhone: (044) 359 0173", 'gloriafood-restaurant' )
				)
			)
		),
		'footer-right'  => array(
			'glf_opening_hours' => array(
				'text',
				array(
					'title' => __( 'Opening Hours', 'gloriafood-restaurant' ),
					'text'  => __( "Monday - Sunday: 5PM - 10PM\nTuesday - Friday: 11AM - 2PM", 'gloriafood-restaurant' )
				)
			)
		),
	),

	'posts' => array(
		'home',
		'blog' => array(),
	),

	'attachments' => array(
		'image-hero'      => array(
			'post_title' => _x( 'Hero image', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/header.jpg',
		),
		'image-offers'    => array(
			'post_title' => _x( 'Background 1', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/background-1.jpg',
		),
		'image-bg2'       => array(
			'post_title' => _x( 'Background 2', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/background-2.jpg',
		),
		'image-bg3'       => array(
			'post_title' => _x( 'Background 3', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/background-3.jpg',
		),
		'image-gallery-1' => array(
			'post_title' => _x( 'Gallery 1', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-1.jpg',
		),
		'image-gallery-2' => array(
			'post_title' => _x( 'Gallery 2', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-2.jpg',
		),
		'image-gallery-3' => array(
			'post_title' => _x( 'Gallery 3', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-3.jpg',
		),
		'image-gallery-4' => array(
			'post_title' => _x( 'Gallery 4', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-4.jpg',
		),
		'image-gallery-5' => array(
			'post_title' => _x( 'Gallery 5', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-5.jpg',
		),
		'image-gallery-6' => array(
			'post_title' => _x( 'Gallery 6', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-6.jpg',
		),
		'image-gallery-7' => array(
			'post_title' => _x( 'Gallery 7', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-7.jpg',
		),
		'image-gallery-8' => array(
			'post_title' => _x( 'Gallery 8', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-8.jpg',
		),
		'image-gallery-9' => array(
			'post_title' => _x( 'Gallery 9', 'Theme starter content', 'gloriafood-restaurant' ),
			'file'       => 'assets/starter/gallery-9.jpg',
		)
	),

	'options' => array(
		'show_on_front'          => 'page',
		'page_on_front'          => '{{home}}',
		'page_for_posts'         => '{{blog}}',
		'glf_background_image_1' => '{{image-offers}}',
		'glf_background_image_2' => '{{image-bg2}}',
		'glf_background_image_3' => '{{image-bg3}}',
	),

	'nav_menus' => array(
		'menu-1' => array(
			'name'  => __( 'Top Menu', 'gloriafood-restaurant' ),
			'items' => array(
				'link_home',
				'page_blog',
			),
		),
	),
);

add_theme_support( 'starter-content', $gloriafood_starter_content );