<?php

class wundermag_widget_banner extends WP_Widget {

	function __construct() {

		parent::__construct( 'banner_vs', esc_html__( '*Wundermag: Banner', 'wundermag' ), array (
			'description' => esc_html__( 'Widget for Image Banner.', 'wundermag' )
		) );

	}

	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance );

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );

		if ( !isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$widget_id = $args[ 'widget_id' ];
		$image = wundermag_get_field( 'image', 'widget_' . $widget_id);
		$link = wundermag_get_field( 'link', 'widget_' . $widget_id);

		$allowed_tags = array(
			'div' => array(
					'id' => array(),
					'class' => array()
			),
			'h4' => array(
				'class' => array()
			)
		);
		echo wp_kses($before_widget, $allowed_tags); ?>

			<div class="widget-banner">

				<?php if( $image ) : ?>
					<div class="widget-banner-img">
						<?php if( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>">
							<?php echo wp_get_attachment_image( $image, 'full' ); ?>
						</a>
						<?php else : ?>
							<?php echo wp_get_attachment_image( $image, 'full' ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>

			<?php

		echo wp_kses($after_widget, $allowed_tags);
	}

}

function wundermag_register_widget_banner() {
	register_widget( 'wundermag_widget_banner' );
}
add_action( 'widgets_init', 'wundermag_register_widget_banner' );

if( function_exists('acf_add_local_field_group') ) {

	acf_add_local_field_group( array (
		'key' => 'group_widget_banner',
		'title' => esc_html__( 'Banner Widget', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_banner_image',
				'label' => esc_html__( 'Image:', 'wundermag' ),
				'name' => 'image',
				'type' => 'image',
				'required' => 0,
				'conditional_logic' => 0,
				'return_format' => 'id',
				'preview_size' => 'mini',
				'library' => 'all',
			),
			array (
				'key' => 'field_banner_link',
				'label' => esc_html__( 'URL:', 'wundermag' ),
				'name' => 'link',
				'type' => 'url',
				'instructions' => 'Image click will lead to this URL.',
				'required' => 0,
				'conditional_logic' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'widget',
					'operator' => '==',
					'value' => 'banner_vs',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	) );

}

?>
