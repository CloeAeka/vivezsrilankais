<?php

function wundermag_standard_fonts( $standard_fonts ) {
	$fonts['wundermag-heading-font'] = array(
		'label' => 'WunderMag',
		'variants' => array('400','500','700'),
		'stack' => 'wundermag-heading-font',
	);
	$fonts['wundermag-body-font'] = array(
		'label' => 'Source Pro Serif',
		'variants' => array('300','300italic','regular','italic'),
		'stack' => 'wundermag-body-font',
	);
	return $fonts;
}
add_filter( 'kirki/fonts/standard_fonts', 'wundermag_standard_fonts', 1 );

// Register Kirki Theme Mods
Kirki::add_config( 'theme_mod', array(
  'capability'    => 'edit_theme_options',
  'option_type'   => 'theme_mod',
));

////////////////////////////
// Lyout Settings
///////////////////////////

// Section
Kirki::add_section( 'layouts_settings', array(
	'title'          => esc_html__( 'Layout Settings', 'wundermag' ),
	'panel'          => '', // Not typically needed.
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
) );

// Homepage Layout
Kirki::add_field( 'theme_mod', array(
	'type'        => 'radio-image',
	'settings'    => 'layout_homepage',
	'label'       => esc_html__( 'Homepage Layout', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => 'list',
	'priority'    => 1,
	'choices'     => array(
		'full'      => get_template_directory_uri() . '/dist/img/layout-full.png',
		'list'      => get_template_directory_uri() . '/dist/img/layout-list.png',
		'grid'      => get_template_directory_uri() . '/dist/img/layout-grid.png',
	),
) );


// Archive Layout
Kirki::add_field( 'theme_mod', array(
	'type'        => 'radio-image',
	'settings'    => 'global_layout_archive',
	'label'       => esc_html__( 'Archive Layout', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => 'list',
	'priority'    => 1,
	'choices'     => array(
		'full'      => get_template_directory_uri() . '/dist/img/layout-full.png',
		'list'      => get_template_directory_uri() . '/dist/img/layout-list.png',
		'grid'      => get_template_directory_uri() . '/dist/img/layout-grid.png',
	),
));

// Homepage First Full Post
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'layout_homepage_first_full_post',
	'label'       => esc_html__( 'First Post Fullwidth on Homepage', 'wundermag' ),
	'description' => esc_html__( 'Make first post fullwidth on list & grid layouts.', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

// Archives First Full Post
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'global_layout_archive_first',
	'label'       => esc_html__( 'First Post Fullwidth on Archive', 'wundermag' ),
	'description' => esc_html__( 'Make first post fullwidth on list & grid layouts.', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

// Sidebar on Posts & Pages
Kirki::add_field( 'theme_mod', array(
	'type'        => 'radio-image',
	'settings'    => 'global_sidebar',
	'label'       => esc_html__( 'Sidebar on Posts & Pages', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => 'right',
	'priority'    => 1,
	'choices'     => array(
		'left'   => get_template_directory_uri() . '/dist/img/layout-sidebar-left.png',
		'no-sidebar'     => get_template_directory_uri() . '/dist/img/layout-full.png',
		'right'  => get_template_directory_uri() . '/dist/img/layout-sidebar-right.png',
	),
));

// Sidebar on Archives
Kirki::add_field( 'theme_mod', array(
	'type'        => 'radio-image',
	'settings'    => 'global_archive_sidebar',
	'label'       => esc_html__( 'Sidebar on Archives', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => 'right',
	'priority'    => 1,
	'choices'     => array(
		'left'   => get_template_directory_uri() . '/dist/img/layout-sidebar-left.png',
		'no-sidebar'     => get_template_directory_uri() . '/dist/img/layout-full.png',
		'right'  => get_template_directory_uri() . '/dist/img/layout-sidebar-right.png',
	),
));

// Enable Sticky Sidebar
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'enable-sticky-sidebar',
	'label'       => esc_html__( 'Enable Sticky Sidebar', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

// Enable Infinite Scroll
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'infinite_scroll',
	'label'       => esc_html__( 'Enable Infinite Scroll', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'infinite_button',
	'label'       => esc_html__( 'Show Load More Button', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'infinite_scroll_single',
	'label'       => esc_html__( 'Infinite Scroll for Single Posts', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

// Pagination Type
Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'pagination_type',
	'label'       => esc_html__( 'Pagination Style:', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => 'numeric',
	'priority'    => 1,
	'choices'     => array(
		'numeric'     	=> esc_html__( 'Numeric', 'wundermag' ),
		'links'     	=> esc_html__( 'Links', 'wundermag' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'infinite_scroll',
			'operator' => '==',
			'value'    => '0',
		),
	),
) );

// Enable Fade In Effect
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'waypoint-on',
	'label'       => esc_html__( 'Enable Fade In effect for Posts', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => true,
	'priority'    => 1,
));

// Homepage Width
Kirki::add_config( 'homepage_width_config' );
Kirki::add_field( 'homepage_width_config', array(
	'type'     => 'slider',
	'settings' => 'homepage_width',
	'label'       => esc_html__( 'Homepage Width', 'wundermag' ),
	'section'  => 'layouts_settings',
	'default'  => 1140,
	'priority' => 1,
	'choices'  => array(
		'min'  => 400,
		'max'  => 1920,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.home .container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Archives Width
Kirki::add_config( 'archive_width_config' );
Kirki::add_field( 'archive_width_config', array(
	'type'     => 'slider',
	'settings' => 'archive_width',
	'label'       => esc_html__( 'Archive Width', 'wundermag' ),
	'section'  => 'layouts_settings',
	'default'  => 1140,
	'priority' => 1,
	'choices'  => array(
		'min'  => 400,
		'max'  => 1920,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.archive .container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Single Post w/ Sidebar Width
Kirki::add_config( 'single_sidebar_width_config' );
Kirki::add_field( 'single_sidebar_width_config', array(
	'type'     => 'slider',
	'settings' => 'single_sidebar_width',
	'label'       => esc_html__( 'Sidebar Post Width', 'wundermag' ),
	'section'  => 'layouts_settings',
	'default'  => 1140,
	'priority' => 1,
	'choices'  => array(
		'min'  => 400,
		'max'  => 1920,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.layout-sidebar-right .single-post .container, .layout-sidebar-left .single-post .container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Single Post Fullwidth Width
Kirki::add_config( 'single_fullwidth_width_config' );
Kirki::add_field( 'single_fullwidth_width_config', array(
	'type'     => 'slider',
	'settings' => 'single_fullwidth_width',
	'label'       => esc_html__( 'Fullwidth Post Width', 'wundermag' ),
	'section'  => 'layouts_settings',
	'default'  => 940,
	'priority' => 1,
	'choices'  => array(
		'min'  => 400,
		'max'  => 1920,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.single-post.layout-fullwidth .content-area',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Page w/ Sidebar Width
Kirki::add_config( 'page_sidebar_width_config' );
Kirki::add_field( 'page_sidebar_width_config', array(
	'type'     => 'slider',
	'settings' => 'page_sidebar_width',
	'label'       => esc_html__( 'Sidebar Page Width', 'wundermag' ),
	'section'  => 'layouts_settings',
	'default'  => 1140,
	'priority' => 1,
	'choices'  => array(
		'min'  => 400,
		'max'  => 1920,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.page.layout-sidebar-right .site .container, .page.layout-sidebar-left .site .container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Page Fullwidth Width
Kirki::add_config( 'page_fullwidth_width_config' );
Kirki::add_field( 'page_fullwidth_width_config', array(
	'type'     => 'slider',
	'settings' => 'page_fullwidth_width',
	'label'       => esc_html__( 'Fullwidth Page Width', 'wundermag' ),
	'section'  => 'layouts_settings',
	'default'  => 940,
	'priority' => 1,
	'choices'  => array(
		'min'  => 400,
		'max'  => 1920,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.page.layout-no-sidebar .site .container, .page.layout-no-sidebar .site .container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Full Posts on Homepage
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'full_posts_homepage',
	'label'       => esc_html__( 'Display Full Posts on Homepage', 'wundermag' ),
	'description' => esc_html__( 'Option is only for Fullwidth Posts Homepage Layout.', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
));

// Hide Scrollbar
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'hide_scrollbar',
	'label'       => esc_html__( 'Hide Scrollbar', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '::-webkit-scrollbar',
			'property'      => 'display',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => 'none',
		),
	),

));

// Hide Cat List
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'hide_cat_list',
	'label'       => esc_html__( 'Hide Categories List', 'wundermag' ),
	'section'     => 'layouts_settings',
	'default'     => false,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.category-cat-list',
			'property'      => 'display',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => 'none',
		),
	),

));

////////////////////////////
// Header Settings
///////////////////////////

// Section
Kirki::add_section( 'header_settings', array(
	'title'          => esc_html__( 'Header Settings', 'wundermag' ),
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'header_type',
	'label'       => esc_html__( 'Header Type:', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'     => esc_html__( 'Header 1', 'wundermag' ),
		'2'     => esc_html__( 'Header 2', 'wundermag' ),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_logo',
	'label'       => esc_html__( 'Show Logo', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '[class^="nav-primary"] .header-title',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'header_show_tagline',
	'label'       => esc_html__( 'Show Tagline', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
) );

// Header Logo Image
Kirki::add_field( 'theme_mod', array(
	'type'        => 'image',
	'settings'    => 'header_logo',
	'label'       => esc_html__( 'Logo Image', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '',
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_logo_size',
	'label'       => esc_html__( 'Logo Image Size:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 265,
	'priority' => 1,
	'choices'  => array(
		'min'  => 40,
		'max'  => 1140,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.nav-primary .header-title img',
			'property'    => 'width',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_logo_primary_2_size',
	'label'       => esc_html__( 'Logo Image Size:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 165,
	'priority' => 1,
	'choices'  => array(
		'min'  => 40,
		'max'  => 1140,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.nav-primary-2 .header-title img',
			'property'    => 'width',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '2',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_logo_text_size',
	'label'       => esc_html__( 'Logo Text Size:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 52,
	'priority' => 1,
	'choices'  => array(
		'min'  => 10,
		'max'  => 400,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.nav-primary .header-title h1',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_logo_primary_2_text_size',
	'label'       => esc_html__( 'Logo Text Size:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 38,
	'priority' => 1,
	'choices'  => array(
		'min'  => 10,
		'max'  => 400,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.nav-primary-2 .header-title h1',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '2',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_logo_pad_top',
	'label'      	 => esc_html__( 'Logo Padding Top:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 62,
	'priority' => 1,
	'choices'  => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.nav-primary .header-title',
			'property'    => 'padding-top',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_logo_pad_bottom',
	'label'       	=> esc_html__( 'Logo Padding Bottom:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 30,
	'priority' => 1,
	'choices'  => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.nav-primary .header-title',
			'property'    => 'padding-bottom',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'header_tagline_pad_top',
	'label'      	 => esc_html__( 'Tagline Margin Top:', 'wundermag' ),
	'section'  => 'header_settings',
	'default'  => 5,
	'priority' => 1,
	'choices'  => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.header-title h5',
			'property'    => 'margin-top',
			'units'       => 'px',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_search',
	'label'       => esc_html__( 'Show Search Icon', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.open-popup-link',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none!important',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_cart',
	'label'       => esc_html__( 'Show Shop Cart', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.wundermag-shop-bag',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none!important',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_social',
	'label'       => esc_html__( 'Show Social Media', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '[class^="nav-primary"] .nav-social',
			'property'      => 'visibility',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'hidden',
		),
	),
) );

/*
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_primary_menu',
	'label'       => esc_html__( 'Show Primary Menu', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => true,
	'priority'    => 1,
) );
*/
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_primary_menu',
	'label'       => esc_html__( 'Show Primary Menu', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '[class^="nav-primary"] .main-navigation',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none!important',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'header_side_menu_option',
	'label'       => esc_html__( 'Show Side Menu Only on Mobile', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '0',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.open-side-menu',
			'property'      => 'display',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => 'none!important',
			'media_query' => '@media (min-width: 992px)',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_header_sticky_logo',
	'label'       => esc_html__( 'Show Sticky Bar Logo', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.nav-sticky .header-title',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none!important',
		),
	),
) );

// Sticky Nav Logo Image
Kirki::add_field( 'theme_mod', array(
	'type'        => 'image',
	'settings'    => 'header_logo_sticky',
	'label'       => esc_html__( 'Sticky Bar Logo', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '',
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'header_sticky_disable',
	'label'       => esc_html__( 'Disable Sticky Bar', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '0',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.nav-sticky',
			'property'      => 'display',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => 'none!important',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'header_mobile_sticky',
	'label'       => esc_html__( 'Top Bar Sticky on Mobile', 'wundermag' ),
	'section'     => 'header_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.header-type-primary-2 #main',
			'property'      => 'padding-top',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => '80px',
			'media_query' => '@media (max-width: 992px)',
		),
		array(
			'element'       => '.header-type-primary-1 #main',
			'property'      => 'padding-top',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => '56px',
			'media_query' => '@media (max-width: 992px)',
		),
		array(
			'element'       => '.nav-bar',
			'property'      => 'position',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => 'fixed',
			'media_query' => '@media (max-width: 992px)',
		),
		array(
			'element'       => '.nav-bar',
			'property'      => 'top',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => '0px',
			'media_query' => '@media (max-width: 992px)',
		),
		array(
			'element'       => '.nav-bar',
			'property'      => 'z-index',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => '999',
			'media_query' => '@media (max-width: 992px)',
		),
		array(
			'element'       => '.nav-bar',
			'property'      => 'width',
			'exclude'       => array( false, 0, '0' ),
			'value_pattern' => '100%',
			'media_query' => '@media (max-width: 992px)',
		),
	),
) );

////////////////////////////
// Featured Slider Settings
///////////////////////////

// Section
Kirki::add_section( 'featured_settings', array(
	'title'          => esc_html__( 'Featured Posts Slider', 'wundermag' ),
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_featured_slider',
	'label'       => esc_html__( 'Show Featured Slider', 'wundermag' ),
	'section'     => 'featured_settings',
	'description'        => esc_html__( 'To set a post as featured, open your post in editor & on the right side (near the bottom) check "Set as Featured Post".', 'wundermag' ),
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'featured_slider_type',
	'label'       => esc_html__( 'Slider Type:', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'     => esc_html__( 'Slider 1', 'wundermag' ),
		'2'     => esc_html__( 'Slider 2', 'wundermag' ),
		'3'     => esc_html__( 'Slider 3', 'wundermag' ),
		'4'     => esc_html__( 'Slider 4', 'wundermag' ),
		'5'     => esc_html__( 'Slider 5', 'wundermag' ),
		'6'     => esc_html__( 'Slider 6', 'wundermag' ),
		'7'     => esc_html__( 'Slider 7', 'wundermag' ),
		'8'     => esc_html__( 'Slider 8', 'wundermag' ),
		'9'     => esc_html__( 'Slider 9', 'wundermag' ),
	),
) );

Kirki::add_config( 'featured_posts_num_field' );
Kirki::add_field( 'featured_posts_num_field', array(
	'type'     => 'slider',
	'settings' => 'featured_posts_num',
	'label'       => esc_html__( 'Number of Post Slides:', 'wundermag' ),
	'section'  => 'featured_settings',
	'default'  => 6,
	'priority' => 1,
	'choices'  => array(
		'min'  => 4,
		'max'  => 30,
		'step' => 1,
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'featured_posts_latest',
	'label'       => esc_html__( 'Display Latest Posts instead of Featured', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => false,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'featured_autoplay',
	'label'       => esc_html__( 'Enable Autoplay', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'featured_autoplay_speed',
	'label'       => esc_html__( 'Slider Autoplay Speed', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => '8000',
	'priority'    => 1,
	'choices'     => array(
		'1000'     => esc_html__( '1s', 'wundermag' ),
		'2000'     => esc_html__( '2s', 'wundermag' ),
		'3000'     => esc_html__( '3s', 'wundermag' ),
		'4000'     => esc_html__( '4s', 'wundermag' ),
		'5000'     => esc_html__( '5s', 'wundermag' ),
		'6000'     => esc_html__( '6s', 'wundermag' ),
		'7000'     => esc_html__( '7s', 'wundermag' ),
		'8000'     => esc_html__( '8s', 'wundermag' ),
		'9000'     => esc_html__( '9s', 'wundermag' ),
		'10000'    => esc_html__( '10s', 'wundermag' ),
		'11000'    => esc_html__( '11s', 'wundermag' ),
		'12000'    => esc_html__( '12s', 'wundermag' ),
		'13000'    => esc_html__( '13s', 'wundermag' ),
		'14000'    => esc_html__( '14s', 'wundermag' ),
		'15000'    => esc_html__( '15s', 'wundermag' ),
		'16000'    => esc_html__( '16s', 'wundermag' ),
		'17000'    => esc_html__( '17s', 'wundermag' ),
		'18000'    => esc_html__( '18s', 'wundermag' ),
		'19000'    => esc_html__( '19s', 'wundermag' ),
		'20000'    => esc_html__( '20s', 'wundermag' ),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'featured_loop',
	'label'       => esc_html__( 'Enable Infinite Loop', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => true,
	'priority'    => 1,
) );

/*
Kirki::add_config( 'featured_height_field' );
Kirki::add_field( 'featured_height_field', array(
	'type'     => 'slider',
	'settings' => 'featured_height',
	'label'       => esc_html__( 'Slide Height', 'wundermag' ),
	'section'  => 'featured_settings',
	'default'  => 500,
	'priority' => 1,
	'choices'  => array(
		'min'  => 100,
		'max'  => 1000,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'     => '.featured-slider, .featured-slider .owl-item',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)'
		),
	),
) );
*/

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_featured_cat',
	'label'       => esc_html__( 'Show Category', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_featured_title',
	'label'       => esc_html__( 'Show Title', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_featured_read_more',
	'label'       => esc_html__( 'Show "View Post" Button', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_config( 'show_featured_overlay_config', array('capability'=>'edit_theme_options','option_type'=>'theme_mod',));
Kirki::add_field( 'show_featured_overlay_config', array(
	'type'        => 'toggle',
	'settings'    => 'show_featured_overlay',
	'label'       => esc_html__( 'Show Dark Overlay', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.featured-post .featured-post-container,.featured-post-content-bottom',
			'property'      => 'background-color',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'transparent!important',
		),
	),
) );

Kirki::add_config( 'show_featured_bottom_strip_config', array('capability'=>'edit_theme_options','option_type'=>'theme_mod',));
Kirki::add_field( 'show_featured_bottom_strip_config', array(
	'type'        => 'toggle',
	'settings'    => 'show_featured_bottom_strip',
	'label'       => esc_html__( 'Show Bottom Strip on Slider 1 & 5', 'wundermag' ),
	'section'     => 'featured_settings',
	'default'     => '1',
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.featured-post-content-bottom',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none',
		),
	),
) );

////////////////////////////
// Popular Posts Slider
///////////////////////////

// Section
Kirki::add_section( 'popular_slider_settings', array(
	'title'          => esc_html__( 'Trending Posts Slider', 'wundermag' ),
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_popular_slider',
	'label'       => esc_html__( 'Show Trending Posts Slider', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => false,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'popular_time_range',
	'label'       => esc_html__( 'Set Time Range', 'wundermag' ),
	'description' => esc_html__( 'List those posts that have been the most popular within a specific time range:', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => '',
	'priority'    => 1,
	'choices'     => array(
		''     			=> esc_html__( 'Unlimited', 'wundermag' ),
		'24 hour ago'        => esc_html__( 'Last 24 Hours', 'wundermag' ),
		'7 day ago'       => esc_html__( 'Last 7 Days', 'wundermag' ),
		'1 month ago'      => esc_html__( 'Last 30 Days', 'wundermag' ),
		'2 month ago'     => esc_html__( 'Last 2 Months', 'wundermag' ),
		'3 month ago'     => esc_html__( 'Last 3 Months', 'wundermag' ),
		'6 month ago'     => esc_html__( 'Last 6 Months', 'wundermag' ),
		'12 month ago'     => esc_html__( 'Last Year', 'wundermag' ),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'popular_columns',
	'label'       => esc_html__( 'Number of Columns:', 'wundermag' ),
	'section'  => 'popular_slider_settings',
	'default'  => 4,
	'priority' => 1,
	'choices'  => array(
		'min'  => 2,
		'max'  => 8,
		'step' => 1,
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'popular_posts_num',
	'label'       => esc_html__( 'Max Number of Posts:', 'wundermag' ),
	'section'  => 'popular_slider_settings',
	'default'  => 8,
	'priority' => 1,
	'choices'  => array(
		'min'  => 3,
		'max'  => 20,
		'step' => 1,
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_popular_cat',
	'label'       => esc_html__( 'Show Category Link', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_popular_title',
	'label'       => esc_html__( 'Show Title', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'show_popular_views',
	'label'       => esc_html__( 'Show Views Count', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'popular_autoplay',
	'label'       => esc_html__( 'Enable Autoplay', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'popular_autoplay_speed',
	'label'       => esc_html__( 'Slider Autoplay Speed', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => '10000',
	'priority'    => 1,
	'choices'     => array(
		'1000'     => esc_html__( '1s', 'wundermag' ),
		'2000'     => esc_html__( '2s', 'wundermag' ),
		'3000'     => esc_html__( '3s', 'wundermag' ),
		'4000'     => esc_html__( '4s', 'wundermag' ),
		'5000'     => esc_html__( '5s', 'wundermag' ),
		'6000'     => esc_html__( '6s', 'wundermag' ),
		'7000'     => esc_html__( '7s', 'wundermag' ),
		'8000'     => esc_html__( '8s', 'wundermag' ),
		'9000'     => esc_html__( '9s', 'wundermag' ),
		'10000'    => esc_html__( '10s', 'wundermag' ),
		'11000'    => esc_html__( '11s', 'wundermag' ),
		'12000'    => esc_html__( '12s', 'wundermag' ),
		'13000'    => esc_html__( '13s', 'wundermag' ),
		'14000'    => esc_html__( '14s', 'wundermag' ),
		'15000'    => esc_html__( '15s', 'wundermag' ),
		'16000'    => esc_html__( '16s', 'wundermag' ),
		'17000'    => esc_html__( '17s', 'wundermag' ),
		'18000'    => esc_html__( '18s', 'wundermag' ),
		'19000'    => esc_html__( '19s', 'wundermag' ),
		'20000'    => esc_html__( '20s', 'wundermag' ),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'popular_loop',
	'label'       => esc_html__( 'Enable Infinite Loop', 'wundermag' ),
	'section'     => 'popular_slider_settings',
	'default'     => true,
	'priority'    => 1,
) );

////////////////////////////
// Post Settings
///////////////////////////

// Section
Kirki::add_section( 'post_settings', array(
	'title'          => esc_html__( 'Post Settings', 'wundermag' ),
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-header-show-cat',
	'label'       => esc_html__( 'Show Category Link', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_config( 'post_header_text_align' );
Kirki::add_field( 'post_header_text_align', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'post_header_align',
	'label'       => esc_html__( 'Post Header Text Position', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => 'center',
	'priority'    => 1,
	'choices'     => array(
		'left'   => esc_attr__( 'Left', 'wundermag' ),
		'center' => esc_attr__( 'Center', 'wundermag' ),
		'right'  => esc_attr__( 'Right', 'wundermag' ),
	),
	'output' => array(
		array(
			'element'  => '.single-post .post-header, .full-post .post-header',
			'property' => 'text-align',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-header-show-views',
	'label'       => esc_html__( 'Show Post Views Counter', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-header-show-date',
	'label'       => esc_html__( 'Show Post Date', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-header-show-comments',
	'label'       => esc_html__( 'Show Comments Link', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-header-show-author',
	'label'       => esc_html__( 'Show Author Link', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => false,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'disable_single_featured_crop',
	'label'       => esc_html__( 'Disable Cropping of Featured Image in Single Posts', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => false,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-pin-it',
	'label'       => esc_html__( 'Enable "Pin It" Button', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post-lightbox',
	'label'       => esc_html__( 'Enable Lightbox Feature', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'wundermag_hide_excerpt',
	'label'       => esc_html__( 'Show Post Excerpt', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'wundermag_hide_btn_more',
	'label'       => esc_html__( 'Show "Read More" Button', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky',
	'label'       => esc_html__( 'Show Share Links Bar', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky_face',
	'label'       => esc_html__( 'Share on Facebook', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.share-face',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none !important',
		),
	),
	'required' => array(
        array(
            'setting'  => 'post_share_sticky',
            'value'    => true,
            'operator' => '=='
        ),
    ),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky_twitter',
	'label'       => esc_html__( 'Share on Twitter', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.share-twitter',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none !important',
		),
	),
	'required' => array(
        array(
            'setting'  => 'post_share_sticky',
            'value'    => true,
            'operator' => '=='
        ),
    ),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky_pin',
	'label'       => esc_html__( 'Share on Pinterest', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.share-pin',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none !important',
		),
	),
	'required' => array(
        array(
            'setting'  => 'post_share_sticky',
            'value'    => true,
            'operator' => '=='
        ),
    ),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky_gplus',
	'label'       => esc_html__( 'Share on Google+', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.share-gplus',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none !important',
		),
	),
	'required' => array(
        array(
            'setting'  => 'post_share_sticky',
            'value'    => true,
            'operator' => '=='
        ),
    ),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky_mail',
	'label'       => esc_html__( 'Share by Email', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.share-mail',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none !important',
		),
	),
	'required' => array(
        array(
            'setting'  => 'post_share_sticky',
            'value'    => true,
            'operator' => '=='
        ),
    ),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_share_sticky_comments',
	'label'       => esc_html__( 'Comments Link', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
	'output'      => array(
		array(
			'element'       => '.post-share-sticky .comments-scroll',
			'property'      => 'display',
			'exclude'       => array( true, 1, '1' ),
			'value_pattern' => 'none !important',
		),
	),
	'required' => array(
        array(
            'setting'  => 'post_share_sticky',
            'value'    => true,
            'operator' => '=='
        ),
    ),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_tags',
	'label'       => esc_html__( 'Show Post Tags', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'single_author_info',
	'label'       => esc_html__( 'Show Post Author Info', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'single_related',
	'label'       => esc_html__( 'Show Related Posts', 'wundermag' ),
	'description' => esc_html__( 'The related posts feature displays posts based on tags.', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'single_comments',
	'label'       => esc_html__( 'Show Post Comments', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'single_pagination',
	'label'       => esc_html__( 'Show Post Pagination', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'global_single_post_header',
	'label'       => esc_html__( 'Post Header Options', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => 'standard',
	'priority'    => 1,
	'choices'     => array(
		'standard'      => esc_html__( 'Standard', 'wundermag' ),
		'large'         => esc_html__( 'Large', 'wundermag' ),
		'fullwidth'     => esc_html__( 'Fullwidth', 'wundermag' ),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'gallery_options',
	'label'       => esc_html__( 'Gallery Options', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => 'slider',
	'priority'    => 1,
	'choices'     => array(
		'slider'        => esc_html__( 'Slider Gallery', 'wundermag' ),
		'justified'     => esc_html__( 'Justified Gallery', 'wundermag' ),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'post_slider_autoplay',
	'label'       => esc_html__( 'Slider Gallery Autoplay', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'post_slider_speed',
	'label'       => esc_html__( 'Slider Autoplay Speed', 'wundermag' ),
	'section'     => 'post_settings',
	'default'     => '8000',
	'priority'    => 1,
	'choices'     => array(
		'1000'     => esc_html__( '1s', 'wundermag' ),
		'2000'     => esc_html__( '2s', 'wundermag' ),
		'3000'     => esc_html__( '3s', 'wundermag' ),
		'4000'     => esc_html__( '4s', 'wundermag' ),
		'5000'     => esc_html__( '5s', 'wundermag' ),
		'6000'     => esc_html__( '6s', 'wundermag' ),
		'7000'     => esc_html__( '7s', 'wundermag' ),
		'8000'     => esc_html__( '8s', 'wundermag' ),
		'9000'     => esc_html__( '9s', 'wundermag' ),
		'10000'    => esc_html__( '10s', 'wundermag' ),
		'11000'    => esc_html__( '11s', 'wundermag' ),
		'12000'    => esc_html__( '12s', 'wundermag' ),
		'13000'    => esc_html__( '13s', 'wundermag' ),
		'14000'    => esc_html__( '14s', 'wundermag' ),
		'15000'    => esc_html__( '15s', 'wundermag' ),
		'16000'    => esc_html__( '16s', 'wundermag' ),
		'17000'    => esc_html__( '17s', 'wundermag' ),
		'18000'    => esc_html__( '18s', 'wundermag' ),
		'19000'    => esc_html__( '19s', 'wundermag' ),
		'20000'    => esc_html__( '20s', 'wundermag' ),
	),
) );

Kirki::add_config( 'cat_posts_number_field' );
Kirki::add_field( 'cat_posts_number_field', array(
	'type'     => 'slider',
	'settings' => 'cat_posts_number',
	'label'       => esc_html__( 'Limit Posts Per Category Page:', 'wundermag' ),
	'section'  => 'post_settings',
	'default'  => 6,
	'priority' => 1,
	'choices'  => array(
		'min'  => 1,
		'max'  => 40,
		'step' => 1,
	),
) );

////////////////////////////
// Page Settings
///////////////////////////

// Section
Kirki::add_section( 'page_settings', array(
	'title'          => esc_html__( 'Page Settings', 'wundermag' ),
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'page_show_title',
	'label'       => esc_html__( 'Show Page Titles', 'wundermag' ),
	'section'     => 'page_settings',
	'default'     => true,
	'priority'    => 1,
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'global_page_header',
	'label'       => esc_html__( 'Featured Image Type', 'wundermag' ),
	'section'     => 'page_settings',
	'default'     => 'large',
	'priority'    => 1,
	'choices'     => array(
		'standard'      => esc_html__( 'Standard', 'wundermag' ),
		'large'         => esc_html__( 'Large', 'wundermag' ),
		'fullwidth'     => esc_html__( 'Fullwidth', 'wundermag' ),
	),
) );

////////////////////////////
// Social Media Settings
///////////////////////////

// Section
Kirki::add_section( 'social_media_settings', array(
	'title'          => esc_html__( 'Social Media Settings', 'wundermag' ),
	'panel'          => '', // Not typically needed.
	'description'    => 'Enter your social media links. Icons will be hidden if fields are left blank.',
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Facebook',
	),
	'settings'    => 'social_facebook',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Twitter',
	),
	'settings'    => 'social_twitter',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Youtube',
	),
	'settings'    => 'social_youtube',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Vimeo',
	),
	'settings'    => 'social_vimeo',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Tumblr',
	),
	'settings'    => 'social_tumblr',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Bloglovin',
	),
	'settings'    => 'social_bloglovin',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Linkedin',
	),
	'settings'    => 'social_linkedin',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Pinterest',
	),
	'settings'    => 'social_pinterest',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Instagram',
	),
	'settings'    => 'social_instagram',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Snapchat',
	),
	'settings'    => 'social_snapchat',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'Google+',
	),
	'settings'    => 'social_googleplus',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );
Kirki::add_field( 'theme_mod', array(
	'type'        => 'generic',
	'choices'     => array(
		'element'     => 'input',
		'type'        => 'text',
		'placeholder' => 'vk',
	),
	'settings'    => 'social_vk',
	'section'     => 'social_media_settings',
	'priority'    => 1,
) );

////////////////////////////
// Typography Settings
///////////////////////////

$font_body = 'wundermag-body-font';
$font_headings = 'wundermag-heading-font';

// Panel
Kirki::add_panel( 'typo_settings', array(
	'priority'    => 2,
	'title'       => esc_html__( 'Typography Settings', 'wundermag' ),
));

// TYPO GENERAL

// Section
Kirki::add_section( 'typo_general', array(
	'priority'    => 1,
	'title'       => esc_html__( 'General', 'wundermag' ),
	'panel'       => 'typo_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_body',
	'label'       => esc_html__( 'Body Font', 'wundermag' ),
	'section'     => 'typo_general',
	'default'     => array(
		'font-family'    => $font_body,
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '15px',
		'line-height'    => '24px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
));

// Section
Kirki::add_section( 'typo_header', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Header', 'wundermag' ),
	'panel'       => 'typo_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_primary_menu',
	'label'       => esc_html__( 'Primary Menu', 'wundermag' ),
	'section'     => 'typo_header',
	'default'     => array(
		'font-family'    => $font_headings,
		'variant'        => '700',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '12.6px',
		'line-height'    => '46px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.main-navigation li, .main-navigation li a, .main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a, .main-navigation .current_page_item > a, .main-navigation .current_page_ancestor > a',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_primary_menu_dropdown',
	'label'       => esc_html__( 'Primary Menu Dropdown', 'wundermag' ),
	'section'     => 'typo_header',
	'default'     => array(
		'font-family'    => $font_headings,
		'variant'        => '700',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '11.6px',
		'line-height'    => '24px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.main-navigation li ul li a',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_side_menu',
	'label'       => esc_html__( 'Side Menu', 'wundermag' ),
	'section'     => 'typo_header',
	'default'     => array(
		'font-family'    => $font_headings,
		'variant'        => '700',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '13px',
		'line-height'    => '24px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.side-menu-nav li, .widget_nav_menu li',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_side_menu_dropdown',
	'label'       => esc_html__( 'Side Menu Dropdown', 'wundermag' ),
	'section'     => 'typo_header',
	'default'     => array(
		'font-family'    => $font_headings,
		'variant'        => '700',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '12.1px',
		'line-height'    => '27px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.side-menu-nav li .sub-menu li, .widget_nav_menu li .sub-menu li',
		),
	),
));

// Section
Kirki::add_section( 'typo_headings', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Headings', 'wundermag' ),
	'panel'       => 'typo_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_page_title',
	'label'       => esc_html__( 'Page Title', 'wundermag' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '58px',
		'line-height'    => '1.2',
		'letter-spacing' => '-2px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.page-header-fullwidth h1,.page-large-header h1,.page-standard-header h1',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_h1',
	'label'       => esc_html__( 'Heading 1', 'wundermag' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '42px',
		'line-height'    => '1.2',
		'letter-spacing' => '-2px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'h1',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_h2',
	'label'       => esc_html__( 'Heading 2', 'wundermag' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '36px',
		'line-height'    => '1.2',
		'letter-spacing' => '-1.4px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'h2',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_h3',
	'label'       => esc_html__( 'Heading 3', 'wundermag' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '26px',
		'line-height'    => '1.2',
		'letter-spacing' => '-1px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'h3',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_h4',
	'label'       => esc_html__( 'Heading 4', 'wundermag' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '19px',
		'line-height'    => '1.2',
		'letter-spacing' => '-1px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'h4',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_h5',
	'label'       => esc_html__( 'Heading 5', 'wundermag' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '14px',
		'line-height'    => '1.2',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'h5',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_h6',
	'label'       => esc_html__( 'Heading 6', 'wundermag' ),
	'subsets'        => array( 'latin-ext' ),
	'section'     => 'typo_headings',
	'default'     => array(
		'font-family'    => $font_headings,
		'variant'        => '700',
		'font-size'      => '13px',
		'line-height'    => '1.2',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'h6',
		),
	),
));

// Section
Kirki::add_section( 'typo_buttons', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Buttons & Links', 'wundermag' ),
	'panel'       => 'typo_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'select',
	'settings'    => 'button_style',
	'label'       => esc_html__( 'Button Style:', 'wundermag' ),
	'section'     => 'typo_buttons',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'     => esc_html__( 'Square', 'wundermag' ),
		'2'     => esc_html__( 'Round', 'wundermag' ),
	),
	'output'      => array(
		array(
			'element'       => '.btn,input.btn,.footer-widgets .wundermag-subscribe-form input.btn,.woocommerce button.button, .woocommerce button.button.alt,button,.wpcf7-submit,.mc4wp-form input[type="submit"],.widget_wysija input[type="submit"],.featured-post .post-read-more a.btn',
			'property'      => 'border-radius',
			'exclude'       => array( 1, '1' ),
			'value_pattern' => '100px !important',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_button',
	'label'       => esc_html__( 'Button', 'wundermag' ),
	'section'     => 'typo_buttons',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '11px',
		'line-height'    => '14px',
		'letter-spacing' => '2px',
		'text-transform' => 'uppercase',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.btn, .wpcf7-submit, .post-password-form input[type="submit"],.woocommerce button.button, .woocommerce button.button.alt,.woocommerce button,.woocommerce .button',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_links_read',
	'label'       => esc_html__( 'Continue Reading Link', 'wundermag' ),
	'section'     => 'typo_buttons',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '12.1px',
		'line-height'    => '16px',
		'letter-spacing' => '1.6px',
		'text-transform' => 'uppercase',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.post-read-more a',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_links_pagination',
	'label'       => esc_html__( 'Pagination Links', 'wundermag' ),
	'section'     => 'typo_buttons',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '13.1px',
		'line-height'    => '16px',
		'letter-spacing' => '1.4px',
		'text-transform' => 'uppercase',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.pagination-num .nav-links > a.next, .pagination-num .nav-links > a.prev',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_links_pagination_num',
	'label'       => esc_html__( 'Pagination Numbers', 'wundermag' ),
	'section'     => 'typo_buttons',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '14px',
		'line-height'    => '16px',
		'letter-spacing' => '0px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.pagination-num .nav-links > span, .pagination-num .nav-links > a',
		),
	),
));

// Section
Kirki::add_section( 'typo_posts', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Posts', 'wundermag' ),
	'panel'       => 'typo_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_post_title_list',
	'label'       => esc_html__( 'Post Title', 'wundermag' ),
	'description'	=> esc_html__( 'List Layout', 'wundermag' ),
	'section'     => 'typo_posts',
	'default'     => array(
		'font-size'      => '32px',
		'letter-spacing'    => '-1.6px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.list-post .post-header .post-title',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_post_title_grid',
	'label'       => esc_html__( 'Post Title', 'wundermag' ),
	'description'	=> esc_html__( 'Grid Layout', 'wundermag' ),
	'section'     => 'typo_posts',
	'default'     => array(
		'font-size'      => '30px',
		'letter-spacing'    => '-1.5px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.grid-post .post-header .post-title',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_paragraph',
	'label'       => esc_html__( 'Paragraphs', 'wundermag' ),
	'section'     => 'typo_posts',
	'default'     => array(
		'font-family'    => $font_body,
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '15px',
		'line-height'    => '26px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'p',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_posts_meta',
	'label'       => esc_html__( 'Post Meta', 'wundermag' ),
	'section'     => 'typo_posts',
	'default'     => array(
		'font-family'    => $font_body,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => 'italic',
		'font-size'      => '14px',
		'line-height'    => '26px',
		'letter-spacing' => '-.2px',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.by-author, .post-date, .post-header-info, .post-header-info a, .in-cat',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_posts_quote',
	'label'       => esc_html__( 'Quotes', 'wundermag' ),
	'section'     => 'typo_posts',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '28px',
		'line-height'    => '34px',
		'letter-spacing' => '-1px',
		'text-transform' => '',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'blockquote p',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_posts_tags',
	'label'       => esc_html__( 'Tags', 'wundermag' ),
	'section'     => 'typo_posts',
	'default'     => array(
		'font-family'    => $font_headings,
		'subsets'        => array( 'latin-ext' ),
		'variant'        => '700',
		'font-size'      => '10.1px',
		'line-height'    => '1',
		'letter-spacing' => '1px',
		'text-transform' => 'uppercase',
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.post-tags a',
		),
	),
));

// Section
Kirki::add_section( 'typo_misc', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Misc', 'wundermag' ),
	'panel'       => 'typo_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_miscs',
	'label'       => esc_html__( 'Miscellaneous', 'wundermag' ),
	'section'     => 'typo_misc',
	'default'     => array(
		'font-family'    => $font_headings,
		'variant'        => '',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => '.h4-up,
.list-categories a,
.list-categories li a,
.tagcloud a,
.post-tags a,
table th,
.post-password-form label,
.vs-head-rd,
blockquote ul,
.main-navigation li a,
.post-cat,
.promo-box-text h6,
.post-bottom a,
.posts-pagination a,
.comment-author,
.btn,
.wpcf7-submit,
.mc4wp-form input[type="submit"],
.widget_wysija input[type="submit"],
.post-password-form input[type="submit"],
.nav-search .searchform input,
figure .icon-pinterest span,
.wundermag-shop-bag i span,
.pagination-num .nav-links,
.side-menu-nav li,
.widget_nav_menu li,
.comment-link,
blockquote p,
.single-post .post-share-sticky a span,
.vossen-main-shop-category a,
.woocommerce-cart .woocommerce > form table.shop_table tbody tr td.actions .coupon label,
.woocommerce table.shop_table td.product-name a,
.woocommerce .quantity .qty,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce select,
.woocommerce .wundermag-shop ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce-tabs ul.tabs li a,
.shop-single-meta-name,
.woocommerce table.shop_table th,
.woocommerce button.button,
.woocommerce button.button.alt,
.woocommerce a.button,
.woocommerce a.button.alt,
.woocommerce .button,
.woocommerce input.button,
.woocommerce input.button.alt,
.woocommerce #respond input#submit,
.woocommerce .cart_totals table.shop_table tbody tr td,
.woocommerce-cart .amount,
.woocommerce-checkout .amount,
.woocommerce-cart table.cart td.actions .coupon .input-text,
.woocommerce-thankyou-order-received,
.woocommerce div.product form.cart .variations td.label,
.woocommerce div.product form.cart .reset_variations,
.product_meta span,
.wundermag-shop ul.products li.product .price,
.woocommerce ul.products li.product .price,
.woocommerce div.product p.price,
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.shop-single-cat a',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'typography',
	'settings'    => 'typo_input',
	'label'       => esc_html__( 'Form Inputs', 'wundermag' ),
	'section'     => 'typo_misc',
	'default'     => array(
		'font-family'    => $font_body,
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 1,
	'output'      => array(
		array(
			'element' => 'input, textarea',
		),
	),
));

////////////////////////////
// Color Settings
///////////////////////////

// Panel
Kirki::add_panel( 'color_settings', array(
	'priority'    => 2,
	'title'       => esc_html__( 'Color Settings', 'wundermag' ),
));

// COLOR GENERAL

// Section
Kirki::add_section( 'color_general', array(
	'priority'    => 1,
	'title'       => esc_html__( 'General', 'wundermag' ),
	'panel'       => 'color_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_general_links',
	'label'       => esc_html__( 'Links Color', 'wundermag' ),
	'section'     => 'color_general',
	'priority'    => 1,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => '#000',
		'hover'     => '#3a3c3c',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => 'a',
			'property'  => 'color',
		),
		array(
			'choice'    => 'hover',
			'element'   => 'a:hover,a:hover i',
			'property'  => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_general_button',
	'label'       => esc_html__( 'Buttons Color', 'wundermag' ),
	'section'     => 'color_general',
	'priority'    => 1,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => '#000',
		'hover'     => '#3a3c3c',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => '.btn,input.btn,.footer-widgets .wundermag-subscribe-form input.btn,.woocommerce button.button, .woocommerce button.button.alt,button,.wpcf7-submit,.mc4wp-form input[type="submit"],.widget_wysija input[type="submit"],.featured-post .post-read-more a.btn',
			'property'  => 'background-color',
		),
		array(
			'choice'    => 'hover',
			'element'   => '.btn:hover,input.btn:hover,.footer-widgets .wundermag-subscribe-form input.btn:hover,.woocommerce button.button, .woocommerce button.button.alt:hover,button:hover,.wpcf7-submit:hover,.mc4wp-form input[type="submit"]:hover,.widget_wysija input[type="submit"]:hover,.featured-post .post-read-more a.btn:hover',
			'property'  => 'background-color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_general_body',
	'label'       => esc_html__( 'Body Background', 'wundermag' ),
	'section'     => 'color_general',
	'default'     => '#fff',
	'priority'    => 1,
	'output' => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
));

// COLOR HEADER

// Section
Kirki::add_section( 'color_header', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Header', 'wundermag' ),
	'panel'       => 'color_settings',
));

// Field
Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_nav_bar_bg',
	'label'       => esc_html__( 'Top Bar Background', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#fff',
	'output' => array(
		array(
			'element'  => '.nav-bar',
			'property' => 'background-color',
		),
	),
));

// Field
Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_nav_bar_text',
	'label'       => esc_html__( 'Top Bar Links', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#000',
	'output' => array(
		array(
			'element'  => '.nav-bar .nav-social a, .nav-bar .top-bar-right a',
			'property' => 'color',
		),
		array(
			'element'  => '.menu-toggle span',
			'property' => 'background',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_nav_bar_text_hover',
	'label'       => esc_html__( 'Top Bar Hover', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#444',
	'output' => array(
		array(
			'element'  => '.nav-bar .nav-social a:hover,.nav-bar .nav-social a:hover i, .nav-bar .top-bar-right a:hover, .nav-bar .top-bar-right a:hover i',
			'property' => 'color',
		),
		array(
			'element'  => '.menu-toggle:hover span',
			'property' => 'background',
		),
	),
));

// Field
Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_header_bg',
	'label'       => esc_html__( 'Header Background', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#fff',
	'output' => array(
		array(
			'element'  => '.header',
			'property' => 'background-color',
		)
	),
));

// Field
Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_header_menu',
	'label'       => esc_html__( 'Menu Links', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#000',
	'output' => array(
		array(
			'element'  => '.main-navigation li a,.menu-item-has-children>a::after,.main-navigation li ul li a',
			'property' => 'color',
		)
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_header_menu_hover',
	'label'       => esc_html__( 'Menu Hover', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#444',
	'output' => array(
		array(
			'element'  => '.main-navigation li a:hover,.menu-item-has-children>a:hover::after,.main-navigation li ul li a:hover',
			'property' => 'color',
		)
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_header_menu_dropdown_bg',
	'label'       => esc_html__( 'Menu Dropdown Background', 'wundermag' ),
	'section'     => 'color_header',
	'default'     => '#fff',
	'output' => array(
		array(
			'element'  => '.main-navigation li ul',
			'property' => 'background-color',
		)
	),
));

// COLOR POSTS

// Section
Kirki::add_section( 'color_posts', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Posts & Pages', 'wundermag' ),
	'panel'       => 'color_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_posts_text',
	'label'       => esc_html__( 'Text', 'wundermag' ),
	'section'     => 'color_posts',
	'default'     => '#696969',
	'output' => array(
		array(
			'element'  => 'p,ol, ul',
			'property' => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_posts_heading',
	'label'       => esc_html__( 'Headings', 'wundermag' ),
	'section'     => 'color_posts',
	'default'     => '#000',
	'output' => array(
		array(
			'element'  => 'h1, h2, h3, h4, h5, h6, .post h1,.post h2,.post h3,.post h4,.post h5,.post h6,.single-large-header .post-title,.single-standard-header .post-title,.elementor-heading-title,.page h1,.page h2,.page h3,.page h4,.page h5,.page h6,.elementor-667 .elementor-element.elementor-element-42jglga .elementor-heading-title',
			'property' => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_posts_quotes',
	'label'       => esc_html__( 'Quotes', 'wundermag' ),
	'section'     => 'color_posts',
	'default'     => '#000',
	'output' => array(
		array(
			'element'  => 'blockquote, blockquote p',
			'property' => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_posts_meta',
	'label'       => esc_html__( 'Meta Color', 'wundermag' ),
	'section'     => 'color_posts',
	'default'     => 'rgba(72, 72, 72, 0.5)',
	'output' => array(
		array(
			'element'  => '.in-cat, .by-author, .post-date, .post-header-info, .post-header-info a, .post-header-info a i',
			'property' => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_posts_pin_lightbox',
	'label'       => esc_html__( 'Pinterest & Ligtbox Buttons', 'wundermag' ),
	'section'     => 'color_posts',
	'priority'    => 10,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => 'rgba(24, 24, 24, 0.3)',
		'hover'     => 'rgba(0,0,0, .88)',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => 'figure .icon-pinterest,.img-lightbox-overlay i',
			'property'  => 'background-color',
		),
		array(
			'choice'    => 'hover',
			'element'   => 'figure .icon-pinterest:hover,figure:hover .img-lightbox-overlay i, .single-lightbox-src:hover .img-lightbox-overlay i,figure:hover .icon-pinterest',
			'property'  => 'background-color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_posts_links',
	'label'       => esc_html__( 'Post Text Links', 'wundermag' ),
	'section'     => 'color_posts',
	'priority'    => 10,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => '#000',
		'hover'     => '#666',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => '.single .post-entry-content a',
			'property'  => 'color',
		),
		array(
			'choice'    => 'hover',
			'element'   => '.single .post-entry-content a:hover',
			'property'  => 'color',
		),
	),
));

// COLOR WIDGETS

// Section
Kirki::add_section( 'color_sidebar', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Sidebar', 'wundermag' ),
	'panel'       => 'color_settings',
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_sidebar_title',
	'label'       => esc_html__( 'Widget Title', 'wundermag' ),
	'section'     => 'color_sidebar',
	'default'     => '#000',
	'output' => array(
		array(
			'element'  => '.widget-area .widget-title',
			'property' => 'color',
		),
	),
));

// COLOR FOOTER

// Section
Kirki::add_section( 'color_footer', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Footer', 'wundermag' ),
	'panel'       => 'color_settings',
));

// Field
Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_footer_bg',
	'label'       => esc_html__( 'Background Color', 'wundermag' ),
	'section'     => 'color_footer',
	'default'     => '#040404',
	'output' => array(
		array(
			'element'  => '#footer.footer-one',
			'property' => 'background-color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_footer_links',
	'label'       => esc_html__( 'Social Icons', 'wundermag' ),
	'section'     => 'color_footer',
	'priority'    => 10,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => '#fff',
		'hover'     => '#3a3c3c',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => '#footer a, #footer a i',
			'property'  => 'color',
		),
		array(
			'choice'    => 'hover',
			'element'   => '#footer a:hover, #footer a:hover i',
			'property'  => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_footer_text_color',
	'label'       => esc_html__( 'Text', 'wundermag' ),
	'section'     => 'color_footer',
	'default'     => 'rgba(118, 118, 118, 0.75)',
	'output' => array(
		array(
			'element'  => '#footer .footer-copyright',
			'property' => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_footer_copy_link',
	'label'       => esc_html__( 'Copyright Link', 'wundermag' ),
	'section'     => 'color_footer',
	'default'     => 'rgba(118, 118, 118, 0.75)',
	'output' => array(
		array(
			'element'  => '#footer .footer-copyright a',
			'property' => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_footer_to_top_bg',
	'label'       => esc_html__( '"To Top" Button', 'wundermag' ),
	'section'     => 'color_footer',
	'priority'    => 10,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => '#18191a',
		'hover'     => '#3a3c3c',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => 'footer .scroll-top i',
			'property'  => 'background-color',
		),
		array(
			'choice'    => 'hover',
			'element'   => 'footer .scroll-top:hover i',
			'property'  => 'background-color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'multicolor',
	'settings'    => 'color_footer_menu',
	'label'       => esc_html__( 'Footer Menu', 'wundermag' ),
	'section'     => 'color_footer',
	'priority'    => 10,
	'choices'     => array(
		'default'   => esc_html__( 'Default', 'wundermag' ),
		'hover'     => esc_html__( 'Hover', 'wundermag' ),
	),
	'default'     => array(
		'default'   => '#767676',
		'hover'     => '#fff',
	),
	'output'    => array(
		array(
			'choice'    => 'default',
			'element'   => '#footer .main-navigation.footer-menu li a, #footer .footer-menu .menu-item-has-children>a::after',
			'property'  => 'color',
		),
		array(
			'choice'    => 'hover',
			'element'   => '.main-navigation.footer-menu li:hover a, .footer-menu .menu-item-has-children>a:hover::after',
			'property'  => 'color',
		),
	),
));

Kirki::add_field( 'theme_mod', array(
	'type'        => 'color',
	'settings'    => 'color_footer_menu_dropdown',
	'label'       => esc_html__( 'Footer Menu Dropdown', 'wundermag' ),
	'section'     => 'color_footer',
	'default'     => '#18191a',
	'output' => array(
		array(
			'element'  => '#footer .main-navigation.footer-menu .sub-menu',
			'property' => 'background',
		),
	),
));

////////////////////////////
// Footer Settings
///////////////////////////

// Section
Kirki::add_section( 'footer_settings', array(
	'title'          => esc_html__( 'Footer Settings', 'wundermag' ),
	'panel'          => '', // Not typically needed.
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
) );

// Footer Logo Image
Kirki::add_field( 'theme_mod', array(
	'type'        => 'image',
	'settings'    => 'footer_logo',
	'label'       => esc_html__( 'Logo Image', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => get_template_directory_uri() . '/dist/img/logo-light.png',
	'priority'    => 1,
) );

// Footer Logo Size
Kirki::add_config( 'footer_logo_size' );

Kirki::add_field( 'footer_logo_size', array(
	'type'     => 'slider',
	'settings' => 'footer_logo_img_size',
	'label'       => esc_html__( 'Logo Size', 'wundermag' ),
	'section'  => 'footer_settings',
	'default'  => 190,
	'priority' => 1,
	'choices'  => array(
		'min'  => 40,
		'max'  => 1140,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '.footer-logo-img',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
) );

// Footer Padding
Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'footer_logo_padding_top',
	'label'       => esc_html__( 'Footer Padding Top', 'wundermag' ),
	'section'  => 'footer_settings',
	'default'  => 97,
	'priority' => 1,
	'choices'  => array(
		'min'  => 0,
		'max'  => 500,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '#footer.footer-one',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Kirki::add_field( 'theme_mod', array(
	'type'     => 'slider',
	'settings' => 'footer_logo_padding_bottom',
	'label'       => esc_html__( 'Footer Padding Bottom', 'wundermag' ),
	'section'  => 'footer_settings',
	'default'  => 100,
	'priority' => 1,
	'choices'  => array(
		'min'  => 0,
		'max'  => 500,
		'step' => 1,
	),
	'output' => array(
		array(
			'element'  => '#footer.footer-one',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

// Footer Copyright
Kirki::add_field( 'theme_mod', array(
	'type'        => 'editor',
	'settings'    => 'footer_copyright',
	'label'       => esc_html__( 'Footer Copyright Text', 'wundermag' ),
	'section'     => 'footer_settings',
	'sanitize_callback' => 'wp_kses_post',
	'priority'    => 1,
) );

// Footer Social
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'footer_social',
	'label'       => esc_html__( 'Show social media icons', 'wundermag' ),
	'description' => esc_html__( 'To set social media icons, go to Social Media Settings section.', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => true,
	'priority'    => 1,
) );

// Footer Menu
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'footer_menu',
	'label'       => esc_html__( 'Show Menu in Footer', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => false,
	'priority'    => 1,
) );

// Footer To Top Button
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'footer_to_top',
	'label'       => esc_html__( 'Show "back to top" button', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => true,
	'priority'    => 1,
) );

// Footer Instagram
Kirki::add_field( 'theme_mod', array(
	'type'        => 'text',
	'settings'    => 'footer_instagram',
	'label'       => esc_html__( 'Footer Instagram Username', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => '',
	'priority'    => 1,
) );

// Footer Instagram Likes
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'footer_instagram_likes',
	'label'       => esc_html__( 'Show Instagram Likes', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => true,
	'priority'    => 1,
) );

// Footer Instagram Comments
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'footer_instagram_comments',
	'label'       => esc_html__( 'Show Instagram Comments', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => true,
	'priority'    => 1,
) );

// Footer Instagram Description
Kirki::add_field( 'theme_mod', array(
	'type'        => 'toggle',
	'settings'    => 'footer_instagram_description',
	'label'       => esc_html__( 'Show Instagram Description', 'wundermag' ),
	'section'     => 'footer_settings',
	'default'     => false,
	'priority'    => 1,
) );

// Footer Logo Size
Kirki::add_config( 'footer_instagram_number_field' );

Kirki::add_field( 'footer_instagram_number_field', array(
	'type'     => 'slider',
	'settings' => 'footer_instagram_number',
	'label'       => esc_html__( 'Number of Instagram Photos: ', 'wundermag' ),
	'section'  => 'footer_settings',
	'default'  => 6,
	'priority' => 1,
	'choices'  => array(
		'min'  => 5,
		'max'  => 9,
		'step' => 1,
	),
) );


// Remove Customizer Sections
function wundermag_customizer_options( $wp_customize ) {
	//$wp_customize->remove_section( 'title_tagline');
	//$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');
}
add_action( 'customize_register', 'wundermag_customizer_options' );
