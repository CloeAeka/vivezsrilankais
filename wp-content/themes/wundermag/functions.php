<?php

///////////////////////////////////////////
// Wundermag functions and definitions.
//////////////////////////////////////////

if ( ! function_exists( 'wundermag_setup' ) ) {

function wundermag_setup() {

		// Make theme available for translation. Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'wundermag', get_template_directory() . '/lang' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'wundermag' ),
			'side_menu' => esc_html__( 'Side Menu', 'wundermag' ),
			'footer_menu' => esc_html__( 'Footer Menu', 'wundermag' ),
		) );

		//Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Post Formats
		add_theme_support( 'post-formats', array(
			'image',
			'gallery',
			'slider',
			'video',
			'audio',
			'link'
		) );

		// Post Featured Img
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'wundermag_1920x1080', 1920, 1080, array( 'center', 'top' ) );
		add_image_size( 'wundermag_1140x700', 1140, 700, true );
		add_image_size( 'wundermag_600x600', 600, 600, true );
		add_image_size( 'wundermag_600x400', 600, 400, true );
		add_image_size( 'wundermag_300x300', 300, 300, true );
		add_image_size( 'wundermag_268x402', 268, 402, true );
		add_image_size( 'wundermag_128x128', 128, 128, true );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wundermag_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

	}
}
add_action( 'after_setup_theme', 'wundermag_setup' );

function wundermag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wundermag_content_width', 640 );
}
add_action( 'after_setup_theme', 'wundermag_content_width', 0 );

function wundermag_front_page() {
	// Set Front Page
	update_option( 'page_on_front', 'posts' );
}
add_action( 'after_switch_theme', 'wundermag_front_page' );

//////////////////////////////////
// Enqueue the scripts and styles
/////////////////////////////////

function wundermag_scripts_styles() {

	// Enqueue Stylesheets
	wp_enqueue_style( 'wundermag_init_css', get_stylesheet_directory_uri() . '/dist/css/init.css' );

	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/dist/fonts/fontawesome/style.css' );
	wp_enqueue_style( 'ionicons', get_stylesheet_directory_uri() . '/dist/fonts/ionicons/ionicons.min.css' );
	wp_enqueue_style( 'vossen-icons', get_stylesheet_directory_uri() . '/dist/fonts/vs-icons/vossen-icons.css' );

	wp_enqueue_style( 'wonderfont', get_stylesheet_directory_uri() . '/dist/fonts/wonder/style.css' );
	wp_enqueue_style( 'source-serif', get_stylesheet_directory_uri() . '/dist/fonts/source-serif-pro/style.css' );

	wp_enqueue_style( 'wundermag_style', get_stylesheet_uri(), array(), '2.1.5' );

	// Enqueue JS
	wp_enqueue_script( 'wundermag_init_js', get_stylesheet_directory_uri() . '/dist/js/init.js', array('jquery'), '2.1.5', true );
	if( get_theme_mod( 'infinite_scroll', false ) == true ) {
		wp_enqueue_script( 'infinite_scroll', get_stylesheet_directory_uri() . '/dist/js/infinite-scroll.pkgd.min.js', array('jquery'), '3.0.2', true );
	}
	wp_enqueue_script( 'wundermag_scripts', get_stylesheet_directory_uri() . '/dist/js/scripts.js', array('jquery'), '2.1.5', true );

	// Adds Javascript to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

}
add_action( 'wp_enqueue_scripts', 'wundermag_scripts_styles' );

// For child theme use get_stylesheet_directory_uri() instead of get_template_directory_uri()
function wundermag_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/dist/css/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'wundermag_admin_style' );

//////////////////////////////////////////
// Menus
/////////////////////////////////////////

function wundermag_primary_menu() {
	$primary_menu = wp_nav_menu( array(
		'theme_location' => 'primary',
		'fallback_cb'    => false,
		'echo'           => false,
	) );
	if ( $primary_menu ) {
		wp_nav_menu( array(
			'theme_location' 	=> 'primary',
			'menu_class'     	=> 'nav-menu',
		) );
	} else {
		echo '<a href="'. esc_url(admin_url('nav-menus.php')) .'" class="no-menu">'. esc_html__( 'You can edit your menu content in the Appearance > Menus and set as', 'wundermag' ). ' <strong>' . esc_html__( 'Primary Menu', 'wundermag' ) .'</strong></a>';
	}
}

function wundermag_side_menu() {
	$side_menu = wp_nav_menu( array(
		'theme_location' => 'side_menu',
		'fallback_cb'    => false,
		'echo'           => false,
	) );
	if ( $side_menu ) {
		wp_nav_menu( array(
			'theme_location' 	=> 'side_menu',
			'menu_class'     	=> 'nav-menu',
		) );
	} else {
		echo '<a href="'. esc_url(admin_url('nav-menus.php')) .'" class="no-menu">'. esc_html__( 'You can edit your side menu content in the Appearance > Menus and set as', 'wundermag' ). ' <strong>' . esc_html__( 'Side Menu.', 'wundermag' ) .'</strong></a>';
	}
}

function wundermag_footer_menu() {
	$footer_menu = wp_nav_menu( array(
		'theme_location' => 'footer_menu',
		'fallback_cb'    => false,
		'echo'           => false,
	) );
	if ( $footer_menu ) {
		wp_nav_menu( array(
			'theme_location' 	=> 'footer_menu',
			'menu_class'     	=> 'nav-menu',
		) );
	} else {
		echo '<a href="'. esc_url(admin_url('nav-menus.php')) .'" class="no-menu">'. esc_html__( 'You can edit your footer menu content in the Appearance > Menus and set as', 'wundermag' ). ' <strong>' . esc_html__( 'Footer Menu.', 'wundermag' ) .'</strong></a>';
	}
}

//////////////////////////////////////////
// Include files
/////////////////////////////////////////

$wundermag_includes = array(

	'/inc/plugins/kirki/kirki.php',
	'/lib/theme_mods.php',
	'/lib/theme_fields.php',
	'/lib/theme_functions.php',

	'/inc/widgets/widget-about.php',
	'/inc/widgets/widget-social.php',
	'/inc/widgets/widget-banner.php',

	'/inc/widgets/widget-latest-posts.php',
	'/inc/widgets/widget-popular-posts.php',
	'/inc/widgets/widget-facebook.php',

	'/inc/plugins/tgm/tgm.php',
	'/inc/plugins/one-click-demo-import.php',

);

foreach ($wundermag_includes as $php_file) {
	include_once get_template_directory() . $php_file;
}

//////////////////////////////////////////
// Register Sidebars
/////////////////////////////////////////

function wundermag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wundermag' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'wundermag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Side Menu Widgets', 'wundermag' ),
		'id'            => 'side_menu_sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'wundermag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'wundermag' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown in Footer columns on all posts and pages.', 'wundermag' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'wundermag_widgets_init' );

//////////////////////////////////////////
// Favicon
/////////////////////////////////////////

function wundermag_site_icon() {
	if( !(function_exists( 'has_site_icon' ) && has_site_icon()) ) {
		if(get_theme_mod('wundermag_favicon')) {
		   echo '<link rel="shortcut icon" href="' . esc_url(get_theme_mod('wundermag_favicon')) . '" />';
		}
	}
}
add_filter('wp_head', 'wundermag_site_icon');
