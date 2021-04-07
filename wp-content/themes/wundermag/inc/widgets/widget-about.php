<?php

class wundermag_widget_about extends WP_Widget {

	function __construct() {

		parent::__construct( 'about_vs', esc_html__( '*Wundermag: About', 'wundermag' ), array (
			'description' => esc_html__( 'An About Widget.', 'wundermag' )
		) );

	}

	function form( $instance ) {

		$defaults = array(
			'title'     => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Widget Title:', 'wundermag'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" type="text"/>
		</p>

	<?php // Rest of the fields are done by ACF plugin
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );

		if ( !isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$widget_id = $args[ 'widget_id' ];
		$title = apply_filters( 'widget_title', isset($instance['title'] ) ? $instance['title'] : null );
		$image = wundermag_get_field( 'image', 'widget_' . $widget_id);
		$link = wundermag_get_field( 'link', 'widget_' . $widget_id);
		$content = wundermag_get_field( 'content', 'widget_' . $widget_id);
		$signature_image = wundermag_get_field( 'signature_image', 'widget_' . $widget_id);

		$allowed_tags = array(
			'div' => array(
					'id' => array(),
					'class' => array()
			),
			'h4' => array(
				'class' => array()
			)
		);
		echo wp_kses($before_widget, $allowed_tags);
		if ( $title ) echo wp_kses($before_title, $allowed_tags) . esc_html($title) . wp_kses($after_title, $allowed_tags); ?>

			<div class="widget-about">

				<?php if( $image ) : ?>
					<div class="widget-about-img">
						<?php if( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>">
							<?php echo wp_get_attachment_image( $image, 'wundermag_600x420' ); ?>
						</a>
						<?php else : ?>
							<?php echo wp_get_attachment_image( $image, 'wundermag_600x420' ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php echo wp_kses_post( $content ); ?>

				<?php if( $signature_image ) : ?>
					<div class="widget-about-sig">
						<?php if( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>">
							<?php echo wp_get_attachment_image( $signature_image, 'full' ); ?>
						</a>
						<?php else : ?>
							<?php echo wp_get_attachment_image( $signature_image, 'full' ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>

			<?php

		echo wp_kses($after_widget, $allowed_tags);
	}

}

function wundermag_register_widget_about() {
	register_widget( 'wundermag_widget_about' );
}
add_action( 'widgets_init', 'wundermag_register_widget_about' );

if( function_exists('acf_add_local_field_group') ) {

	acf_add_local_field_group( array (
		'key' => 'group_widget_about',
		'title' => esc_html__( 'About Widget', 'wundermag' ),
		'fields' => array (
			array (
				'key' => 'field_about_image',
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
				'key' => 'field_about_link',
				'label' => esc_html__( 'Image Link:', 'wundermag' ),
				'name' => 'link',
				'type' => 'url',
				'instructions' => 'Insert your About page URL.',
				'required' => 0,
				'conditional_logic' => 0,
			),
			array (
				'key' => 'field_about_text',
				'label' => esc_html__( 'Content:', 'wundermag' ),
				'name' => 'content',
				'type' => 'wysiwyg',
				'required' => 0,
				'conditional_logic' => 0,
				'tabs' => 'all',
				'toolbar' => 'basic',
				'media_upload' => 0,
			),
			array (
				'key' => 'field_about_signature_image',
				'label' => esc_html__( 'Signature Image:', 'wundermag' ),
				'name' => 'signature_image',
				'type' => 'image',
				'required' => 0,
				'conditional_logic' => 0,
				'return_format' => 'id',
				'preview_size' => 'mini',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'widget',
					'operator' => '==',
					'value' => 'about_vs',
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
