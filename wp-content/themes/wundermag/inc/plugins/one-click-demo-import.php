<?php

function wundermag_ocdi_import_files() {
	return array(
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 1', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-1.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-1.png' )
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 2', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-2.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-2.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 3', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-3.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-3.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 4', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-4.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-4.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 5', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-5.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-5.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 6', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-6.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-6.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 7', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-7.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-7.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 8', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-8.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-8.png' ),
		),
		array(
			'import_file_name'              	=> esc_html__( 'Import Demo 9', 'wundermag' ),
			'import_file_url'             		=> esc_url( 'http://wundermag.thememeister.com/theme-content/content.xml' ),
			'import_widget_file_url'      		=> esc_url( 'http://wundermag.thememeister.com/theme-content/widgets.wie' ),
			'import_customizer_file_url'        => esc_url( 'http://wundermag.thememeister.com/theme-content/customizer-9.dat' ),
			'import_preview_image_url'      	=> esc_url( 'http://wundermag.thememeister.com/theme-content/demo-9.png' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'wundermag_ocdi_import_files' );

function wundermag_processed_import_post( $post_id ) {
	wp_remove_object_terms( $post_id, 'uncategorized', 'category' );
}
add_action( 'wxr_importer.processed.post', 'wundermag_processed_import_post', 10, 1 );

// Disable OCDI Branding
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
