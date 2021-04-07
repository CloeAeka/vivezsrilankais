<?php

class wundermag_widget_posts_popular extends WP_Widget {

	function __construct() {

		parent::__construct( 'wundermag_posts_popular_wg', esc_html__( '*Wundermag: Popular Posts', 'wundermag' ), array (
			'description' => esc_html__( 'Widget for showing popular Posts.', 'wundermag' )
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

		$widget_id          				= $args[ 'widget_id' ];
		$title              				= apply_filters( 'widget_title', isset($instance['title'] ) ? $instance['title'] : null );
		$widget_posts_time_range            = wundermag_get_field( 'widget_posts_time_range', 'widget_' . $widget_id, '6 month ago' );
		$widget_posts_popular_display_as    = wundermag_get_field( 'widget_posts_popular_display_as', 'widget_' . $widget_id, 'slider' );

		$widget_posts_popular_num           = wundermag_get_field( 'widget_posts_popular_num', 'widget_' . $widget_id );
		if ( !$widget_posts_popular_num ) {
			$widget_posts_popular_num = 4;
		}

		$query = array(
			'posts_per_page' 	=> $widget_posts_popular_num,
			'post_type'   		=> 'post',
			'orderby'      		=> 'meta_value_num',
			'meta_key'     		=> 'post_views_count',
			'order' 			=> 'DESC',
			'date_query' 	=> array(
				array(
				  'column' => 'post_date_gmt',
				  'after'  => $widget_posts_time_range,
				)
			),
		);

		$loop = new WP_Query( $query );

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

			<?php if( $loop->have_posts() ) : ?>

				<?php if ( $title ) echo wp_kses($before_title, $allowed_tags) . esc_html($title) . wp_kses($after_title, $allowed_tags); ?>

				<?php if( $widget_posts_popular_display_as == 'list' ) : ?>

					<!-- List Posts -->
					<div class="widget-posts widget-list-posts">

						<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

							<?php if( has_post_thumbnail() || has_post_format( 'gallery' ) || has_post_format( 'video' ) || has_post_format( 'audio' ) ) : ?>

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

							<?php endif; ?>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div>

				<?php else : ?>

					<!-- Slider Posts -->
					<div class="widget-posts widget-slider-posts">

						<div class="swiper-wrapper">

							<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

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

				<?php endif; ?>

			<?php endif;

		echo wp_kses($after_widget, $allowed_tags);
	}

}

function wundermag_register_widget_posts_popular() {
	register_widget( 'wundermag_widget_posts_popular' );
}
add_action( 'widgets_init', 'wundermag_register_widget_posts_popular' );

if( function_exists('acf_add_local_field_group') ) {

	acf_add_local_field_group( array (
		'key' => 'group_widget_posts_popular',
		'title' => esc_html__( 'Popular Widget', 'wundermag' ),
		'fields' => array (

			array (
				'key' => 'field_widget_posts_popular_display_as',
				'name' => 'widget_posts_popular_display_as',
				'type' => 'radio',
				'label' => esc_html__( 'Display As:', 'wundermag' ),
				'required' => 0,
				'conditional_logic' => 0,
				'choices'     => array(
					'list'        => esc_html__( 'List', 'wundermag' ),
					'slider'      => esc_html__( 'Slider', 'wundermag' ),
				),
				'default_value' => array (
					'slider',
				),
				'layout' => 'vertical',
				'toggle' => 0,
			),
			array (
				'key' => 'field_widget_posts_time_range',
				'name' => 'widget_posts_time_range',
				'type' => 'select',
				'label' => esc_html__( 'Time Range:', 'wundermag' ),
				'instructions' => esc_html__( 'List those posts that have been the most popular within a specific time range:', 'wundermag' ),
				'required' => 0,
				'conditional_logic' => 0,
				'choices'     => array(
					'24 hour ago'        => esc_html__( 'Last 24 Hours', 'wundermag' ),
					'7 day ago'       => esc_html__( 'Last 7 Days', 'wundermag' ),
					'1 month ago'      => esc_html__( 'Last 30 Days', 'wundermag' ),
					'2 month ago'     => esc_html__( 'Last 2 Months', 'wundermag' ),
					'3 month ago'     => esc_html__( 'Last 3 Months', 'wundermag' ),
					'6 month ago'     => esc_html__( 'Last 6 Months', 'wundermag' ),
					'12 month ago'     => esc_html__( 'Last Year', 'wundermag' ),
				),
				'default_value' => array (
					'6 month ago',
				),
				'layout' => 'vertical',
				'toggle' => 0,
			),
			array (
				'key' => 'field_widget_posts_popular_num',
				'label' => esc_html__( 'Number of Posts:', 'wundermag' ),
				'name' => 'widget_posts_popular_num',
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
					'value' => 'wundermag_posts_popular_wg',
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
