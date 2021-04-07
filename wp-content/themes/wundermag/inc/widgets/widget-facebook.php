<?php

class wundermag_widget_facebook_like_box extends WP_Widget {

	function __construct() {

		parent::__construct( 'wundermag_facebook_like_box_wg', esc_html__( '*Wundermag: Facebook Like Box', 'wundermag' ), array (
			'description' => esc_html__( 'Widget for promoting Facebook Page.', 'wundermag' )
		) );

	}

	function form( $instance ) {

		$defaults = array(
			'title'                 => '',
			'page_url'              => '',
			'use_small_header'      => false,
			'hide_cover'            => false,
			'show_friends'          => true,
			'hide_posts'            => true,
			'face_lang'            => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Widget Title:', 'wundermag'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" type="text"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>"><?php esc_html_e('Facebook Page URL:', 'wundermag'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'page_url' )); ?>" value="<?php echo esc_attr($instance['page_url']); ?>" class="widefat" type="text"/>
			<p class="description"><?php esc_html_e('Example URL: http://www.facebook.com/vossenthemes', 'wundermag'); ?></p>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'use_small_header' )); ?>"><?php esc_html_e('Use Small Header', 'wundermag'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'use_small_header' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'use_small_header' )); ?>" <?php checked( (bool) $instance['use_small_header'], true ); ?>/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'hide_cover' )); ?>"><?php esc_html_e('Hide Cover Photo', 'wundermag'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'hide_cover' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'hide_cover' )); ?>" <?php checked( (bool) $instance['hide_cover'], true ); ?>/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_friends' )); ?>"><?php esc_html_e('Show Friends Faces', 'wundermag'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_friends' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_friends' )); ?>" <?php checked( (bool) $instance['show_friends'], true ); ?>/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'hide_posts' )); ?>"><?php esc_html_e('Hide Page Posts', 'wundermag'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'hide_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'hide_posts' )); ?>" <?php checked( (bool) $instance['hide_posts'], true ); ?>/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'face_lang' )); ?>"><?php esc_html_e('Change Language:', 'wundermag'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'face_lang' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'face_lang' )); ?>" value="<?php echo esc_attr($instance['face_lang']); ?>" class="widefat" type="text"/>
		</p>

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['use_small_header'] = strip_tags( $new_instance['use_small_header'] );
		$instance['hide_cover'] = strip_tags( $new_instance['hide_cover'] );
		$instance['show_friends'] = strip_tags( $new_instance['show_friends'] );
		$instance['hide_posts'] = strip_tags( $new_instance['hide_posts'] );
		$instance['face_lang'] = strip_tags( $new_instance['face_lang'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : null );
		$page_url = isset( $instance['page_url'] ) ? $instance['page_url'] : null;
		$use_small_header = isset( $instance['use_small_header'] ) ? $instance['use_small_header'] : null;
		$hide_cover = isset( $instance['hide_cover'] ) ? $instance['hide_cover'] : null;
		$show_friends = isset( $instance['show_friends'] ) ? $instance['show_friends'] : null;
		$hide_posts = isset( $instance['hide_posts'] ) ? $instance['hide_posts'] : null;
		$face_lang = isset( $instance['face_lang'] ) ? $instance['face_lang'] : null;

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

			<div class="widget-facebook-like-box">

				<div class="fb-page" data-href="<?php echo esc_url($page_url); ?>"
					 data-small-header="<?php if($use_small_header) { echo 'true'; } else { echo 'false'; } ?>"
					 data-hide-cover="<?php if($hide_cover) { echo 'true'; } else { echo 'false'; } ?>"
					 data-show-facepile="<?php if($show_friends) { echo 'true'; } else { echo 'false'; } ?>"
					 data-show-posts="<?php if($hide_posts) { echo 'false'; } else { echo 'true'; } ?>"
					 data-face-lang="<?php echo get_locale() ?>">
				</div>

			</div>

		<?php

		echo wp_kses($after_widget, $allowed_tags);
	}

}

function wundermag_register_widget_facebook_like_box() {
	register_widget( 'wundermag_widget_facebook_like_box' );
}
add_action( 'widgets_init', 'wundermag_register_widget_facebook_like_box' );

?>
