<?php
	function wonderblog_child_enqueue_styles() {

		// Enqueue Stylesheets
		wp_enqueue_style( 'wundermag_init_css', get_template_directory_uri() . '/dist/css/init.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/dist/fonts/fontawesome/style.css' );
		wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/dist/fonts/ionicons/ionicons.min.css' );
		wp_enqueue_style( 'vossen-icons', get_template_directory_uri() . '/dist/fonts/vs-icons/vossen-icons.css' );
		wp_enqueue_style( 'wonderfont', get_template_directory_uri() . '/dist/fonts/wonder/style.css' );
		wp_enqueue_style( 'source-serif', get_template_directory_uri() . '/dist/fonts/source-serif-pro/style.css' );

		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

		// Enqueue JS
		wp_enqueue_script( 'wundermag_init_js', get_template_directory_uri() . '/dist/js/init.js', array('jquery'), null, true );
		wp_enqueue_script( 'wundermag_scripts', get_template_directory_uri() . '/dist/js/scripts.js?ver=1.6', array('jquery'), null, true );

	}
	add_action( 'wp_enqueue_scripts', 'wonderblog_child_enqueue_styles' );

	//////////////////////////////////////////
	//  Theme customization starts here
	/////////////////////////////////////////
