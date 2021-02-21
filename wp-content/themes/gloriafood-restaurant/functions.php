<?php
/**
 * GloriaFood Restaurant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GloriaFoodRestaurant
 * @since 1.0.0
 */

if ( ! function_exists( 'gloriafood_setup' ) ) :
	/**
	 * Register theme supported items
	 */
	function gloriafood_setup() {
		//Add translations support
		load_theme_textdomain( 'gloriafood-restaurant', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-header', array(
			'height'        => 650,
			'width'         => 1600,
			'flex-width'    => true,
			'flex-height'   => true,
			'default-image' => get_template_directory_uri() . '/assets/starter/header.jpg',
		) );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_ () in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'gloriafood-restaurant' ),
				'footer' => __( 'Footer Menu', 'gloriafood-restaurant' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 500,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		//Add image sizes
		add_image_size( 'glf_background', 1920, 9999, false );
		add_image_size( 'glf_about_us_single', 600, 9999, false );
		add_image_size( 'glf_about_us_double', 300, 9999, false );

         // Custom background color.
        add_theme_support("custom-background", []);

		/**
		 * Theme starter content
		 */
		require get_template_directory() . '/inc/starter_content.php';
	}
endif;
add_action( 'after_setup_theme', 'gloriafood_setup' );

function gloriafood_get_version() {
	return wp_get_theme()->get( 'Version' ) . ( defined( 'WP_DEBUG' ) ? ( WP_DEBUG ? '_' . time() : '' ) : '' );
}

/**
 * Register widget area.
 */
function gloriafood_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Homepage', 'gloriafood-restaurant' ),
			'id'            => 'glf-homepage',
			'description'   => __( 'Add widgets here to build your homepage.', 'gloriafood-restaurant' ),
			'before_widget' => '<div class="container-fluid glf-background-card"><div  id="%1s" class="container glf-card"><div class="widget %2s">',
			'after_widget'  => '</div></div></div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer left', 'gloriafood-restaurant' ),
			'id'            => 'footer-left',
			'description'   => __( 'Add widgets here to appear in your left footer column.', 'gloriafood-restaurant' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer middle', 'gloriafood-restaurant' ),
			'id'            => 'footer-middle',
			'description'   => __( 'Add widgets here to appear in your middle footer column.', 'gloriafood-restaurant' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer right', 'gloriafood-restaurant' ),
			'id'            => 'footer-right',
			'description'   => __( 'Add widgets here to appear in your right footer column.', 'gloriafood-restaurant' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

}

add_action( 'widgets_init', 'gloriafood_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function gloriafood_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gloriafood_content_width', 640 );
}

add_action( 'after_setup_theme', 'gloriafood_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function gloriafood_scripts() {
	wp_enqueue_style( 'bootstrap', get_theme_file_uri() . '/css/bootstrap.css', array(), gloriafood_get_version() );
	wp_enqueue_style( 'gloriafood-style', get_stylesheet_uri(), array( 'bootstrap' ), gloriafood_get_version() );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri() . '/js/bootstrap.js', array( 'jquery' ), gloriafood_get_version(), true );

	wp_enqueue_style( 'gloriafood-print-style', "https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i|PT+Serif:400,400i,700,700i", array(), gloriafood_get_version(), 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( gloriafood_can_generate_order_buttons_html() && 1 === get_theme_mod( 'glf_order_buttons_show_buttons', 0 ) ) {
		wp_enqueue_script( 'gloriafood-order-buttons', get_theme_file_uri() . '/js/gloriafood-order-buttons.js', array( 'jquery' ), gloriafood_get_version(), true );
	}
}

add_action( 'wp_enqueue_scripts', 'gloriafood_scripts' );

require_once get_template_directory() . "/widgets/class-glf-about-us-widget.php";
require_once get_template_directory() . "/widgets/class-glf-promo-cards.php";
require_once get_template_directory() . "/widgets/class-glf-gallery.php";

function gloriafood_register_all_widgets() {
	register_widget( 'Glf_About_Us_Widget' );
	register_widget( 'Glf_Promo_Cards' );
	register_widget( 'Glf_Gallery' );
}

add_action( 'widgets_init', 'gloriafood_register_all_widgets' );

require_once get_template_directory() . '/inc/theme-customization.php';

/**
 * Test if the GloriaFood plugin is active and configured
 *
 * @return bool
 */
function gloriafood_is_glf_plugin_active_and_configured() {
	if ( class_exists( 'GLF_Restaurant_System' ) ) {
		if ( get_option( 'glf_mor_restaurant_data', false ) ) {
			return true;
		}
	}

	return false;
}

function gloriafood_get_glf_plugin_version() {
	if ( gloriafood_is_glf_plugin_active_and_configured() ) {
		$plugin_data = get_file_data( WP_PLUGIN_DIR . '/menu-ordering-reservations/restaurant-system.php', array(
			'version' => 'Version'
		), 'plugin' );

		if ( $plugin_data && ! empty( $plugin_data['version'] ) ) {
			return $plugin_data['version'];
		}
	}

	return false;
}

function gloriafood_glf_plugin_has_menu_shortcode() {
	$version = gloriafood_get_glf_plugin_version();

	if ( $version ) {
		return ( version_compare( '1.3.0', $version ) < 1 );
	}

	return false;
}

/**
 * Get restaurant settings from GloriaFood plugin (is plugin available)
 *
 * @return array|bool
 */
function gloriafood_get_glf_plugin_settings() {
	if ( gloriafood_is_glf_plugin_active_and_configured() ) {
		$glf_plugin_options = get_option( 'glf_mor_restaurant_data' );
		$restaurant_index   = get_theme_mod( 'glf_selected_restaurant', 0 );
		if ( ! empty( $glf_plugin_options->restaurants ) && ! empty( $glf_plugin_options->restaurants[ $restaurant_index ] ) && ! empty( $glf_plugin_options->restaurants[ $restaurant_index ]->uid ) ) {
			return array(
				'ruid'        => $glf_plugin_options->restaurants[ $restaurant_index ]->uid,
				'ordering'    => ( $glf_plugin_options->restaurants[ $restaurant_index ]->has_pickup || $glf_plugin_options->restaurants[ $restaurant_index ]->has_delivery ),
				'reservation' => ( 1 == $glf_plugin_options->restaurants[ $restaurant_index ]->has_reservation )
			);
		}
	}

	return false;
}

function gloriafood_generate_order_buttons_html() {
	if ( $gfl_plugin_settings = gloriafood_get_glf_plugin_settings() ) {
		if ( $gfl_plugin_settings['ordering'] || $gfl_plugin_settings['reservation'] ) {
			$html = '';

			if ( $gfl_plugin_settings['reservation'] ) {
				$html .= do_shortcode( "[restaurant-reservations ruid='{$gfl_plugin_settings['ruid']}']" );
			}

			if ( $gfl_plugin_settings['ordering'] ) {
				$html .= do_shortcode( "[restaurant-menu-and-ordering ruid='{$gfl_plugin_settings['ruid']}']" );
			}

			return $html;
		}
	} else {
		$order_text       = get_theme_mod( 'glf_order_buttons_order_text', __( 'See MENU & Order', 'gloriafood-restaurant' ) );
		$order_link       = get_theme_mod( 'glf_order_buttons_order_link', '#' );
		$reservation_text = get_theme_mod( 'glf_order_buttons_reservation_text', __( 'Table Reservation', 'gloriafood-restaurant' ) );
		$reservation_link = get_theme_mod( 'glf_order_buttons_reservation_link', '#' );

		if ( $order_link || $reservation_link ) {
			$html = '';

			if ( $reservation_link ) {
				$html .= "<a class='glf-button-default glf-button reservation custom-reservation-button' href='{$reservation_link}' target='_blank'>{$reservation_text}</a>";
			}

			if ( $order_link ) {
				$html .= "<a class='glf-button-default glf-button custom-order-button' href='{$order_link}' target='_blank'>{$order_text}</a>";
			}

			return $html;
		}
	}

	return false;
}

function gloriafood_get_order_buttons_count() {
	if ( $glf_plugin_settings = gloriafood_get_glf_plugin_settings() ) {
		if ( $glf_plugin_settings['ordering'] || $glf_plugin_settings['reservation'] ) {
			if ( $glf_plugin_settings['ordering'] && $glf_plugin_settings['reservation'] ) {
				return 2;
			} else {
				return 1;
			}
		}
	} elseif ( get_theme_mod( 'glf_order_buttons_order_link', '#' ) || get_theme_mod( 'glf_order_buttons_reservation_link', '#' ) ) {
		if ( get_theme_mod( 'glf_order_buttons_order_link', '#' ) && get_theme_mod( 'glf_order_buttons_reservation_link', '#' ) ) {
			return 2;
		} else {
			return 1;
		}
	}

	return 0;
}

function gloriafood_can_generate_order_buttons_html() {
	if ( $glf_plugin_settings = gloriafood_get_glf_plugin_settings() ) {
		if ( $glf_plugin_settings['ordering'] || $glf_plugin_settings['reservation'] ) {
			return true;
		}
	} elseif ( get_theme_mod( 'glf_order_buttons_order_link', '#' ) || get_theme_mod( 'glf_order_buttons_reservation_link', '#' ) ) {
		return true;
	}

	return false;
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function gloriafood_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'     => __( "GloriaFood Menu - Ordering - Reservations", 'gloriafood-restaurant' ),
			'slug'     => 'menu-ordering-reservations',
			'required' => false,
		),
		array(
			'name'     => __( "One Click Demo Import", 'gloriafood-restaurant' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		)
	);

	$config = array(
		'id'           => 'gloriafood-restaurant',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => ''
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'gloriafood_register_recommended_plugins' );


/**
 * Base template functions and tags enhancements
 */
require get_template_directory() . '/inc/base-functions/template-functions.php';
require get_template_directory() . '/inc/base-functions/template-tags.php';

/**
 * Bootstrap 4 nav walker
 */
require get_template_directory() . '/inc/bs4navwalker.php';

add_action( 'wp_enqueue_scripts', 'gloriafood_gallery_frontend_assets' );
function gloriafood_gallery_frontend_assets() {
	if ( is_active_widget( '', '', 'glf-gallery' ) ) {
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_style( 'thickbox' );

		wp_enqueue_script( 'glf-gallery-thickbox', get_template_directory_uri() . '/widgets/glf-gallery-thickbox.js', array(
			'jquery',
			'thickbox'
		), gloriafood_get_version() );
	}
}

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Registers an editor stylesheet for the theme.
 */
function gloriafood_theme_add_editor_styles() {
    add_editor_style( ['/assets/css/glf-editor-style.css'] );
}
add_action( 'init', 'gloriafood_theme_add_editor_styles' );
