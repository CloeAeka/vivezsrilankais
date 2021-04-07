<?php

// Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

// Disable ACF Update Notification
function wundermag_acf_update($value) {
  if ( isset( $value ) && is_object( $value ) ) {
	unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
  }
  return $value;
}
add_filter('site_transient_update_plugins', 'wundermag_acf_update');

// ACF Get Field Function
function wundermag_get_field( $key, $id = false, $default = '', $format_value = true ) {
	global $post;
	$key = trim( filter_var( $key, FILTER_SANITIZE_STRING ) );
	$result = '';
	if ( function_exists( 'get_field' ) ) {
		if ( isset( $post->ID ) && !$id ) {
			$result = get_field( $key, false, $format_value );
		} else {
			$result = get_field( $key, $id, $format_value );
			if ($result == '' && $default !== '') {
				$result = $default;
			}
		}
	} else {
		$result = $default;
	}
	return $result;
}

//////////////////////////////////////////
if( function_exists('acf_add_local_field_group') ) {

////////////////////////////////
// Single Post Formats
////////////////////////////////

	// Post Format Gallery
	acf_add_local_field_group( array (
		'key' => 'group_post_format_gallery',
		'title' => esc_html__( 'Gallery Images', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_post_format_gallery',
				'name' => 'post_format_gallery',
				'type' => 'gallery',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'height' => '',
					'class' => '',
					'id' => '',
				),
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'gallery',
				),
			),
		),
		'menu_order' => 2,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Post Format Video
	acf_add_local_field_group(array (
		'key' => 'group_post_format_video',
		'title' => esc_html__( 'Video Embed', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_post_format_video',
				'name' => 'post_format_video',
				'type' => 'oembed',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'width' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Post Format Audio
	acf_add_local_field_group(array (
		'key' => 'group_post_format_audio',
		'title' => esc_html__( 'Audio Embed', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_post_format_audio',
				'name' => 'post_format_audio',
				'type' => 'oembed',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'width' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Post Format Link
	acf_add_local_field_group(array (
		'key' => 'group_post_format_link',
		'title' => esc_html__( 'Post Header Content', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_post_format_link',
				'name' => 'post_format_link',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'width' => '',
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'link',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );


////////////////////////////////
// Single Post Fields Options
////////////////////////////////

	// Single Post Gallery Style Options
	acf_add_local_field_group(array (
		'key' => 'group_post_gallery_type',
		'title' => esc_html__( 'Gallery Type', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_post_gallery_type',
				'name' => 'post_gallery_type',
				'type' => 'select',
				'required' => 0,
				'conditional_logic' => 0,
				'choices' => array (
					'slider' => esc_html__( 'Slider', 'wundermag' ),
					'justified' => esc_html__( 'Justified', 'wundermag' ),
				),
				'default_value' => array (
					0 => 'slider',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'gallery',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Single Posts & Pages Layout Options
	acf_add_local_field_group( array (
		'key' => 'group_layout_options',
		'title' => esc_html__( 'Layout Options', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'fields_layout_options',
				'name' => 'individual_post_page_layout',
				'type' => 'select',
				'choices' => array (
					'' => esc_html__( 'Default', 'wundermag' ),
					'individual-sidebar-left' => esc_html__( 'Left Sidebar', 'wundermag' ),
					'individual-no-sidebar' => esc_html__( 'No Sidebar / Fullwidth', 'wundermag' ),
					'individual-sidebar-right' => esc_html__( 'Right Sidebar', 'wundermag' ),
				),
				'default_value' => array (
					0 => '',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Single Post Header Style
	acf_add_local_field_group(array (
		'key' => 'group_individual_post_header',
		'title' => esc_html__( 'Featured Media Options', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_individual_post_header',
				'name' => 'individual_post_header',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'choices' => array (
					'' => esc_html__( 'Default', 'wundermag' ),
					'standard' => esc_html__( 'Standard', 'wundermag' ),
					'large' => esc_html__( 'Large', 'wundermag' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'wundermag' ),
			),
				'default_value' => array (
				0 => '',
			),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Single Post Header Style
	acf_add_local_field_group(array (
		'key' => 'group_individual_page_header',
		'title' => esc_html__( 'Featured Image Options', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_individual_page_header',
				'name' => 'individual_page_header',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'choices' => array (
					'' => esc_html__( 'Default', 'wundermag' ),
					'standard' => esc_html__( 'Standard', 'wundermag' ),
					'large' => esc_html__( 'Large', 'wundermag' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'wundermag' ),
			),
				'default_value' => array (
				0 => '',
			),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Individual Page Hide Title
	acf_add_local_field_group(array (
		'key' => 'group_individual_page_hide_title',
		'title' => esc_html__( 'Hide Page Title', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_individual_page_hide_title',
				'name' => 'individual_page_hide_title',
				'type' => 'checkbox',
				'label' => '',
				'instructions' => 'If option is enabled, title of this page will be hidden.',
				'required' => 0,
				'conditional_logic' => 0,
				'choices' => array (
					'true' => esc_html__( 'Hide Page Title', 'wundermag' ),
				),
				'default_value' => array (

				),
				'layout' => 'vertical',
				'toggle' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'side',
		'style' => 'normal',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Single Post Set as Featured
	acf_add_local_field_group(array (
		'key' => 'group_set_featured_post',
		'title' => esc_html__( 'Set as Featured Post', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_set_featured_post',
				'name' => 'set_featured_post',
				'type' => 'checkbox',
				'label' => '',
				'instructions' => 'If option is enabled, this post will appear in Featured Posts Slider',
				'required' => 0,
				'conditional_logic' => 0,
				'choices' => array (
					'true' => esc_html__( 'Set as Featured Post', 'wundermag' ),
				),
				'default_value' => array (

				),
				'layout' => 'vertical',
				'toggle' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'normal',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

	// Single Post Set as Stand-Out
	acf_add_local_field_group(array (
		'key' => 'group_set_standout_post',
		'title' => esc_html__( 'Set as Stand-Out Post', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_set_standout_post',
				'name' => 'set_standout_post',
				'type' => 'checkbox',
				'label' => '',
				'instructions' => 'If option is enabled, this post will be styled differently on Home & Category pages.',
				'required' => 0,
				'conditional_logic' => 0,
				'choices' => array (
					'true' => esc_html__( 'Set as Stand-Out Post', 'wundermag' ),
				),
				'default_value' => array (

				),
				'layout' => 'vertical',
				'toggle' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'normal',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );


////////////////////////////////
// Category Options
////////////////////////////////

	// Category Posts Layout & Category Sidebar Layout
	acf_add_local_field_group(array (
		'key' => 'group_category_options',
		'title' => esc_html__('Category Options', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_category_layout_archive',
				'label' => esc_html__( 'Set Category Layout', 'wundermag' ),
				'name' => 'individual_cat_layout',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					''   => esc_html__( 'Default', 'wundermag' ),
					'full' => esc_html__( 'Full', 'wundermag' ),
					'list'     => esc_html__( 'List', 'wundermag' ),
					'grid'     => esc_html__( 'Grid', 'wundermag' ),
					'full-list'     => esc_html__( 'Full then List', 'wundermag' ),
					'full-grid'     => esc_html__( 'Full then Grid', 'wundermag' ),
				),
				'default_value' => array (
					0 => '',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
			),
			array (
				'key' => 'field_category_sidebar_layout',
				'label' => esc_html__( 'Set Category Sidebar Position', 'wundermag' ),
				'name' => 'individual_cat_sidebar',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'' => esc_html__( 'Default', 'wundermag' ),
					'individual-cat-sidebar-left' => esc_html__( 'Left Sidebar', 'wundermag' ),
					'individual-cat-no-sidebar' => esc_html__( 'No Sidebar / Fullwidth', 'wundermag' ),
					'individual-cat-sidebar-right' => esc_html__( 'Right Sidebar', 'wundermag' ),
				),
				'default_value' => array (
					0 => '',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
			),
		),
		'location' => array (
			array (
				array (
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

}
