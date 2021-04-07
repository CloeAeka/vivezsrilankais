<?php

class wundermag_widget_latest extends WP_Widget {

	function __construct() {

		parent::__construct( 'wundermag_latest_wg', esc_html__( '*Wundermag: Latest Posts', 'wundermag' ), array (
			'description' => esc_html__( 'Widget for showing Latest Posts.', 'wundermag' )
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

	<?php
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

		$widget_id                          = $args[ 'widget_id' ];
		$title                              = apply_filters( 'widget_title', isset($instance['title'] ) ? $instance['title'] : null );
		$category                           = wundermag_get_field( 'widget_latest_posts_category', 'widget_' . $widget_id );
		$widget_posts_latest_num            = wundermag_get_field( 'latest_number_of_posts', 'widget_' . $widget_id );

		if ( !$widget_posts_latest_num ) {
			$widget_posts_latest_num = 4;
		}

		$widget_posts_display_as            = wundermag_get_field( 'widget_latest_posts_display_as', 'widget_' . $widget_id, 'list' );

		$latest_widget_query = array(
			'category__in' 				=> $category,
			'posts_per_page' 			=> $widget_posts_latest_num,
			'posts_per_archive_page' 	=> $widget_posts_latest_num,
			'post_type'   				=> 'post',
			'orderby'      				=> 'date',
			'order' 					=> 'DESC',
			'post_status' 				=> 'publish',
			'ignore_sticky_posts' 		=> 1,

		);
		$loop_latest = new WP_Query( $latest_widget_query );

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

			<?php if( $loop_latest->have_posts() ) : ?>

				<?php if ( $title ) echo wp_kses($before_title, $allowed_tags) . esc_html($title) . wp_kses($after_title, $allowed_tags); ?>

				<?php if( $widget_posts_display_as == 'slider' ) : ?>

					<!-- Slider Posts -->
					<div class="widget-posts widget-slider-posts">

						<div class="swiper-wrapper">

							<?php while( $loop_latest->have_posts() ) : $loop_latest->the_post(); ?>

								<?php if( has_post_thumbnail() || has_post_format( 'gallery' ) || has_post_format( 'video' ) || has_post_format( 'audio' ) ) : ?>

									<div class="swiper-slide">
										<div class="widget-post">

											<div class="widget-post-img">
												<a href="<?php echo esc_url(get_permalink()); ?>">
													<?php wundermag_post_thumb( 'wundermag_268x402' ); ?>
												</a>
											</div>

											<div class="widget-post-info" data-swiper-parallax="-150">
												<p class="post-cat"><span class="in-cat"><?php esc_html_e( 'In', 'wundermag' ); ?></span>

													<?php $category = get_the_category(); ?>
													<?php if ( $category[0] ) : ?>
														<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_textarea( $category[0]->cat_name ); ?></a>
													<?php endif; ?>

												</p>
												<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
												<h4 class="upper link">
													<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'View Post', 'wundermag' ); ?> <i class="fa fa-angle-right"></i></a>
												</h4>
											</div>

										</div>
									</div>

								<?php endif; ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						</div>

					</div>

					<div class="swiper-pagination swiper-pag-outside widget-slider-posts-pag"></div>

				<?php else : ?>

					<!-- List Posts -->
					<div class="widget-posts widget-list-posts">

						<?php while( $loop_latest->have_posts() ) : $loop_latest->the_post(); ?>

								<div class="widget-post">

									<div class="widget-post-img thumb-scale">
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php wundermag_post_thumb( 'wundermag_128x128' ); ?>
											<div class="thumb-scale-overlay">
												<div class="thumb-scale-meta">
													<div>
														<?php if( has_post_format( 'video' ) ) : ?>
															<div class="video-play-icon"></div>
														<?php else : ?>
															<h4 class="upper link">
																<?php esc_html_e( 'View', 'wundermag' ); ?> <i class="fa fa-angle-right"></i>
															</h4>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</a>
									</div>

									<div class="widget-post-info">
										<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
										<p><?php the_time( get_option('date_format') ); ?></p>
									</div>

								</div>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div>

				<?php endif; ?>

			<?php endif;

		echo wp_kses($after_widget, $allowed_tags);
	}

}

function wundermag_register_widget_latest() {
	register_widget( 'wundermag_widget_latest' );
}
add_action( 'widgets_init', 'wundermag_register_widget_latest' );

if( function_exists('acf_add_local_field_group') ) {

	acf_add_local_field_group( array (
		'key' => 'group_widget_latest_posts',
		'title' => esc_html__( 'Latest Widget', 'wundermag' ),
		'fields' => array (

			array (
				'key' => 'field_widget_latest_posts_display_as',
				'name' => 'widget_latest_posts_display_as',
				'type' => 'radio',
				'label' => esc_html__( 'Display As:', 'wundermag' ),
				'choices'     => array(
					'list'        => esc_html__( 'List', 'wundermag' ),
					'slider'      => esc_html__( 'Slider', 'wundermag' ),
				),
				'default_value' => array (
					'list'
				),
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_latest_category',
				'label' => esc_html__( 'Category:', 'wundermag' ),
				'name' => 'widget_latest_posts_category',
				'type' => 'taxonomy',
				'instructions' => 'If none is selected, widget will display latest posts from all categories.',
				'taxonomy' => 'category',
				'field_type' => 'select',
				'allow_null' => 1,
				'return_format' => 'id',
			),
			array (
				'key' => 'field_latest_number_of_posts',
				'label' => esc_html__( 'Number of Posts:', 'wundermag' ),
				'name' => 'latest_number_of_posts',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'default_value' => 4,
				'readonly' => 0,
				'disabled' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'widget',
					'operator' => '==',
					'value' => 'wundermag_latest_wg',
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
