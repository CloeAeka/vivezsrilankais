<?php

class wundermag_widget_social extends WP_Widget {

	function __construct() {

		parent::__construct( 'wundermag_social_wg', esc_html__( '*Wundermag: Social Media', 'wundermag' ), array (
			'description' => esc_html__( 'An Social Media Widget.', 'wundermag' )
		) );

	}

	function form( $instance ) {

		$defaults = array(
			'title'         => '',
			'facebook'      => '',
			'twitter'       => '',
			'youtube'       => '',
			'vimeo'         => '',
			'tumblr'        => '',
			'bloglovin'     => '',
			'linkedin'      => '',
			'pinterest'     => '',
			'snapchat'      => '',
			'instagram'     => '',
			'googleplus'    => '',
			'vk'    => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Widget Title:', 'wundermag'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" type="text"/>
		</p>
		<p class="description"><?php esc_html_e('Note: Set your social links in the Customizer/Social Media Settings', 'wundermag'); ?></p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>">Show Facebook:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>">Show Twitter:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>">Show Youtube:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>">Show Vimeo:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo' )); ?>" <?php checked( (bool) $instance['vimeo'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>">Show Tumblr:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' )); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>">Show Bloglovin:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'bloglovin' )); ?>" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>">Show Linkedin:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' )); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>">Show Pinterest:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'snapchat' )); ?>">Show Snapchat:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'snapchat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'snapchat' )); ?>" <?php checked( (bool) $instance['snapchat'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>">Show Instagram:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>">Show Google Plus:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'googleplus' )); ?>" <?php checked( (bool) $instance['googleplus'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'vk' )); ?>">Show VK:</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'vk' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vk' )); ?>" <?php checked( (bool) $instance['vk'], true ); ?> />
		</p>

	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : null );
		$facebook = isset($instance['facebook']) ? $instance['facebook'] : null;
		$twitter = isset($instance['twitter']) ? $instance['twitter'] : null;
		$youtube = isset($instance['youtube']) ? $instance['youtube'] : null;
		$vimeo = isset($instance['vimeo']) ? $instance['vimeo'] : null;
		$tumblr = isset($instance['tumblr']) ? $instance['tumblr'] : null;
		$bloglovin = isset($instance['bloglovin']) ? $instance['bloglovin'] : null;
		$linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : null;
		$pinterest = isset($instance['pinterest']) ? $instance['pinterest'] : null;
		$snapchat = isset($instance['snapchat']) ? $instance['snapchat'] : null;
		$instagram = isset($instance['instagram']) ? $instance['instagram'] : null;
		$googleplus = isset($instance['googleplus']) ? $instance['googleplus'] : null;
		$vk = isset($instance['vk']) ? $instance['vk'] : null;

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

			<div class="widget-social">

				<?php if($facebook) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_facebook' )); ?>" target="_blank" title="<?php echo esc_attr( 'Facebook', 'wundermag' ); ?>">
						<i class="fa fa-facebook"></i>
					</a>
				<?php endif; ?>
				<?php if($twitter) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_twitter' )); ?>" target="_blank" title="<?php echo esc_attr( 'Twitter', 'wundermag' ); ?>">
						<i class="fa fa-twitter"></i>
					</a>
				<?php endif; ?>
				<?php if($youtube) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_youtube' )); ?>" target="_blank" title="<?php echo esc_attr( 'Youtube', 'wundermag' ); ?>">
						<i class="fa fa-youtube-play"></i>
					</a>
				<?php endif; ?>
				<?php if($vimeo) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_vimeo' )); ?>" target="_blank" title="<?php echo esc_attr( 'Vimeo', 'wundermag' ); ?>">
						<i class="fa fa-vimeo"></i>
					</a>
				<?php endif; ?>
				<?php if($tumblr) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_tumblr' )); ?>" target="_blank" title="<?php echo esc_attr( 'Tumblr', 'wundermag' ); ?>">
						<i class="fa fa-tumblr"></i>
					</a>
				<?php endif; ?>
				<?php if($bloglovin) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_bloglovin' )); ?>" target="_blank" title="<?php echo esc_attr( 'Bloglovin', 'wundermag' ); ?>">
						<i class="fa fa-heart"></i>
					</a>
				<?php endif; ?>
				<?php if($linkedin) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_linkedin' )); ?>" target="_blank" title="<?php echo esc_attr( 'Linkedin', 'wundermag' ); ?>">
						<i class="fa fa-linkedin-square"></i>
					</a>
				<?php endif; ?>
				<?php if($pinterest) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_pinterest' )); ?>" target="_blank" title="<?php echo esc_attr( 'Pinterest', 'wundermag' ); ?>">
						<i class="fa fa-pinterest"></i>
					</a>
				<?php endif; ?>
				<?php if($snapchat) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_snapchat' )); ?>" target="_blank" title="<?php echo esc_attr( 'Snapchat', 'wundermag' ); ?>">
						<i class="fa fa-snapchat"></i>
					</a>
				<?php endif; ?>
				<?php if($instagram) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_instagram' )); ?>" target="_blank" title="<?php echo esc_attr( 'Instagram', 'wundermag' ); ?>">
						<i class="fa fa-instagram"></i>
					</a>
				<?php endif; ?>
				<?php if($googleplus) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_googleplus' )); ?>" target="_blank" title="<?php echo esc_attr( 'Google+', 'wundermag' ); ?>">
						<i class="fa fa-google-plus"></i>
					</a>
				<?php endif; ?>
				<?php if($vk) : ?>
					<a href="<?php echo wp_kses_post(get_theme_mod( 'social_vk' )); ?>" target="_blank" title="<?php echo esc_attr( 'VK', 'wundermag' ); ?>">
						<i class="fa fa-vk"></i>
					</a>
				<?php endif; ?>

			</div>

		<?php

		echo wp_kses($after_widget, $allowed_tags);
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['bloglovin'] = strip_tags( $new_instance['bloglovin'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['snapchat'] = strip_tags( $new_instance['snapchat'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['vk'] = strip_tags( $new_instance['vk'] );

		return $instance;
	}

}

function wundermag_register_widget_social() {
	register_widget( 'wundermag_widget_social' );
}
add_action( 'widgets_init', 'wundermag_register_widget_social' );

?>
