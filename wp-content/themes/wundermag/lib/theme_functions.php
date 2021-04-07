<?php

//////////////////////////////////////////
// Editor Stylesheet
/////////////////////////////////////////
function wundermag_editor_style() {
	add_editor_style(get_template_directory_uri() . '/dist/css/editor-style.css');
}
add_action( 'admin_init', 'wundermag_editor_style' );

//////////////////////////////////////////
// Elementor Disable Globals
/////////////////////////////////////////
function wundermag_elementor_cpt() {
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'elementor_cpt_support', array( 'page' ) );
	update_option( 'elementor_tracker_notice', '1' );
}
add_action( 'after_switch_theme', 'wundermag_elementor_cpt' );

//////////////////////////////////////////
// Posts Excerpt
/////////////////////////////////////////
function wundermag_custom_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$allowed_tags = '<p>,<a>,<em>,<strong>';
		$text = strip_tags($text, $allowed_tags);
		$excerpt_word_count = get_theme_mod( 'wundermag_post_excerpt_length', '60' );
		$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
		$excerpt_end = '&hellip;';
		$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wundermag_custom_excerpt');

function wundermag_excerpt_limit($limit) {
	return wp_trim_words(get_the_excerpt(), $limit);
}

//////////////////////////////////////////
// Page Break
//////////////////////////////////////////
//Add Next Page/Page Break Button in WordPress Visual Editor
function wundermag_add_next_page_button( $buttons, $id ){
	if ( 'content' != $id )
		return $buttons;
	array_splice( $buttons, 13, 0, 'wp_page' );
	return $buttons;
}
add_filter( 'mce_buttons', 'wundermag_add_next_page_button', 1, 2 ); // 1st row

//////////////////////////////////////////
// Post Comments
/////////////////////////////////////////
function wundermag_post_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-body">

			<div class="comment-author-avatar">
				<?php echo get_avatar( $comment, 65 ); ?>
			</div>

			<div class="comment-text">
				<h6 class="comment-author"><?php echo get_comment_author_link(); ?></h6>
				<span class="time-ago-bullet">&bull;</span>
				<h5 class="comment-date">
					<?php printf( _x( '%s ago', '%s = human-readable time difference', 'wundermag' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
				</h5>
				<?php if ($comment->comment_approved == '0') : ?>
					<p class="comment-awaiting"><?php esc_html_e('Comment Awaiting Approval', 'wundermag'); ?></p>
				<?php else : ?>
					<?php comment_text(); ?>
				<?php endif; ?>
				<h5 class="reply-edit">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply ', 'wundermag'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
					<?php edit_comment_link(__(' <span class="time-ago-bullet">&bull;</span> Edit', 'wundermag')); ?>
				</h5>
			</div>

		</div>
	</li>
<?php
}

function wundermag_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'wundermag_comment_field_to_bottom' );

//////////////////////////////////////////
// Woocomerce
/////////////////////////////////////////
add_action( 'after_setup_theme', 'wundermag_woocommerce_support' );
function wundermag_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

// Number of products per page. -24-
function wundermag_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 8;
  return $cols;
}
add_filter( 'loop_shop_per_page', 'wundermag_loop_shop_per_page', 20 );

// Number of products per row
add_filter( 'loop_shop_columns', 'wundermag_loop_columns' );
if (!function_exists('loop_columns')) {
	function wundermag_loop_columns() { return 4; }
}

// Remove default lightbox
add_action( 'wp_enqueue_scripts', 'wundermag_remove_woo_lightbox', 99 );
function wundermag_remove_woo_lightbox() {
	wp_dequeue_script('prettyPhoto-init');
}

// Number of related products
function wundermag_woocommerce_output_related_products() {
	$atts = array(
		'posts_per_page' => '4',
		'orderby'        => 'rand',
		'columns'       => '4'
	);
	woocommerce_related_products($atts);
}

// Defining Sizes
function wundermag_woocommerce_image_dimensions() {
	global $pagenow;

	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
	$catalog = array(
		'width' 	=> '350',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '570',	// px
		'height'	=> '700',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '90',	// px
		'height'	=> '110',	// px
		'crop'		=> 0 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'wundermag_woocommerce_image_dimensions', 1 );

// Update cart when added via AJAX
function wundermag_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start(); ?>
	<?php if( WC()->cart->get_cart_contents_count() >= 0 ) : ?>
		<span class="wundermag-bag-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'wundermag' ), WC()->cart->get_cart_contents_count() ); ?></span>
	<?php endif; ?>
	<?php $fragments['span.wundermag-bag-count'] = ob_get_clean(); return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'wundermag_woocommerce_header_add_to_cart_fragment' );

// Set Catalog alt & title attributes
/* function wundermag_change_attachement_image_attributes($attr, $attachment) {
	global $post;
	if ($post->post_type == 'product') {
		$title = $post->post_title;
		$attr['alt'] = $title;
	}
	unset( $attr['title']) ;
	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'wundermag_change_attachement_image_attributes', 20, 2);*/

function wundermag_dequeue_cart_fragments() {
	if (is_front_page()) wp_dequeue_script('wc-cart-fragments');
}
add_action( 'wp_enqueue_scripts', 'wundermag_dequeue_cart_fragments', 11);

//////////////////////////////////////////
// Views Count
/////////////////////////////////////////
function wundermag_count_format( $number ) {
	$precision = 1;
	if ( $number >= 1000 && $number < 1100 || $number >= 2000 && $number < 2100 ) {
		$formatted = number_format( $number/1000, 0 ).'K';
	} elseif ( $number >= 3000 && $number < 3100 || $number >= 4000 && $number < 4100 ) {
		$formatted = number_format( $number/1000, 0 ).'K';
	} elseif ( $number >= 5000 && $number < 5100 || $number >= 4000 && $number < 6100 ) {
		$formatted = number_format( $number/1000, 0 ).'K';
	} elseif ( $number >= 1100 && $number < 1000000 ) {
		$formatted = number_format( $number/1000, $precision ).'K';
	} else if ( $number >= 1000000 && $number < 1000000000 ) {
		$formatted = number_format( $number/1000000, $precision ).'M';
	} else if ( $number >= 1000000000 ) {
		$formatted = number_format( $number/1000000000, $precision ).'B';
	} else {
		$formatted = $number; // Number is less than 1000
	}
	$formatted = str_replace( '.00', '', $formatted );
	return $formatted;
}
function wundermag_setPostViews($postID) {
	$count_key = 'post_views_count';
	$count     = get_post_meta($postID, $count_key, true);
	if($count == ''){
	  $count = 0;
	  delete_post_meta($postID, $count_key);
	  add_post_meta($postID, $count_key, '0');
	} else {
	  $count++;
	  update_post_meta($postID, $count_key, $count);
	}
}
function wundermag_getPostViews($postID) {
	$count_key = 'post_views_count';
	if( $_SERVER['SERVER_NAME'] == 'www.wundermag.vossenthemes.com' or $_SERVER['SERVER_NAME'] == 'wundermag.vossenthemes.com' ) {
		$count     = wundermag_count_format( get_post_meta($postID, $count_key, true) + 1000 );
	} else {
		$count     = wundermag_count_format( get_post_meta($postID, $count_key, true) );
	}
	if($count == '' || $count == 0 ){
	  delete_post_meta($postID, $count_key);
	  add_post_meta($postID, $count_key, '0');
	  return esc_html__('Be first to view', 'wundermag');
	}
	return $count.' '.esc_html__('Views', 'wundermag');
}

//////////////////////////////////////////
// Append Body Classes
/////////////////////////////////////////

function wundermag_body_class( $classes ) {
	$global_sidebar = get_theme_mod( 'global_sidebar', 'right' );
	$global_archive_sidebar = get_theme_mod( 'global_archive_sidebar', 'right' );

	// Sidebar Layout Body Class
	if( $global_sidebar == 'left' ) {
		$classes[] = 'global-sidebar-left';
	} elseif( $global_sidebar == 'no-sidebar' ) {
		$classes[] = 'global-no-sidebar';
	} elseif ( $global_sidebar == 'right' ) {
		$classes[] = 'global-sidebar-right';
	} else {

	}

	// Posts & Pages set layout class
	if( get_theme_mod( 'post_share_sticky', true ) == true ) {
		$classes[] = 'post-share-enabled';
	}

	// Archive Sidebar Layout Body Class
	if( is_archive() || is_category() ) {
		if( $global_archive_sidebar == 'left' ) {
			$classes[] = 'global-archive-sidebar-left';
		} elseif( $global_archive_sidebar == 'no-sidebar' ) {
			$classes[] = 'global-archive-no-sidebar';
		} elseif ( $global_archive_sidebar == 'right' ) {
			$classes[] = 'global-archive-sidebar-right';
		}

	}

	// Post Sidebar Layout Body Class
	if( get_theme_mod( 'waypoint-on', true ) == true ) {
		$classes[] = 'waypoint-on';
	}

	// Header Type
	if( get_theme_mod( 'header_type', '1' ) == '1' ) {
		$classes[] = 'header-type-primary-1';
	}
	if( get_theme_mod( 'header_type', '1' ) == '2' ) {
		$classes[] = 'header-type-primary-2';
	}
	if ( get_theme_mod('infinite_button', false) == true ) $classes[] = 'infinite-button';
  return $classes;
}
add_filter( 'body_class', 'wundermag_body_class' );

//////////////////////////////////////////
// Theme Sidebar
/////////////////////////////////////////

function wundermag_sidebar( $position ) {
	$global_sidebar = get_theme_mod( 'global_sidebar', 'right' );
	$global_archive_sidebar = get_theme_mod( 'global_archive_sidebar', 'right' );
	global $post;
	global $cat;
	$individual_post_page_layout = wundermag_get_field( 'individual_post_page_layout', $post->ID, '' );
	$individual_cat_sidebar = wundermag_get_field( 'individual_cat_sidebar', 'category_' . $cat, '' );

	if( is_single() || is_page() ) {
		if ($position == 'right' && $individual_post_page_layout == 'individual-sidebar-left' ) {
			get_sidebar();
		} elseif ($position == 'right' && $individual_post_page_layout == 'individual-sidebar-right' ) {
			get_sidebar();
		} elseif ($position == 'left' && $individual_post_page_layout == 'individual-no-sidebar' || $position == 'right' && $individual_post_page_layout == 'individual-no-sidebar' ) {

		} elseif ($position == 'right' && $global_sidebar == 'left' ) {
			get_sidebar();
		} elseif ($position == 'right' && $global_sidebar == 'right' ) {
			get_sidebar();
		}
	} elseif( is_archive() || is_category() ) {
		if ( $position == 'right' && $individual_cat_sidebar == 'individual-cat-sidebar-left' ) {
			get_sidebar();
		} elseif ( $position == 'right' && $individual_cat_sidebar == 'individual-cat-sidebar-right' ) {
			get_sidebar();
		} elseif ( $position == 'left' && $individual_cat_sidebar == 'individual-cat-no-sidebar' || $position == 'right' && $individual_cat_sidebar == 'individual-cat-no-sidebar' ) {

		} elseif ( $position == 'right' && $global_archive_sidebar == 'left' ) {
			get_sidebar();
		} elseif( $global_archive_sidebar == 'archive-no-sidebar' ) {

		} elseif ( $position == 'right' && $global_archive_sidebar == 'right' ) {
			get_sidebar();
		}
	} else {
		if ( $position == 'right' && $global_sidebar == 'left' ) {
			get_sidebar();
		} elseif ( $position == 'right' && $global_sidebar == 'right' ) {
			get_sidebar();
		}
	}
}

//////////////////////////////////////////
// Post & Page Headers
/////////////////////////////////////////

function wundermag_post_header_format( $position ) {
	$individual_post_header = wundermag_get_field( 'individual_post_header' );
	$global_single_post_header = get_theme_mod( 'global_single_post_header', 'standard' );
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	?>

	<?php if( is_single() ) : ?>

		<?php // Single Fullwidth Header Layout ?>
		<?php if( $position == 'top' && $individual_post_header == 'fullwidth' ) : ?>

			<?php if( has_post_format( 'gallery' ) ) : ?>

				<div class="single-fullwidth-gallery">
					<?php get_template_part( 'templates/post', 'format' ); ?>
				</div>

			<?php elseif( has_post_format( 'video' ) ) : ?>
				<?php if( wundermag_get_field( 'post_format_video' ) ) : ?>
					<?php
						$video_url = wundermag_get_field( 'post_format_video', false, false, false );
						$video_thumb_url = wundermag_get_video_thumbnail_uri($video_url);
					?>
					<div class="single-fullwidth-header single-full-video thumb-bg" data-img="<?php echo esc_url($video_thumb_url); ?>">
						<div class="container text-center">
							<?php get_template_part( 'templates/post', 'header' ); ?>
							<a href="<?php echo esc_url( $video_url ); ?>" class="popup-video"><div class="video-play-icon play-lg mt40"></div></a>
						</div>
					</div>
				<?php endif; ?>

			<?php elseif( has_post_format( 'audio' ) ) : ?>
				<div class="single-full-audio">
					<?php echo wundermag_get_field('post_format_audio'); ?>
				</div>
			<?php elseif( has_post_thumbnail() ) : ?>

				<div class="single-fullwidth-header thumb-bg" data-img="<?php echo esc_url( $thumb[0] ); ?>">
					<div class="container">
						<?php get_template_part( 'templates/post', 'header' ); ?>
					</div>
				</div>

			<?php endif; ?>

		<?php // Single Large Header Layout ?>
		<?php elseif( $position == 'top' && $individual_post_header == 'large' ) : ?>
			<div class="container">
				<div class="single-large-header">
					<?php get_template_part( 'templates/post', 'header' ); ?>
					<?php get_template_part( 'templates/post', 'format' ); ?>
				</div>
			</div>

		<?php // Single Standard Header Layout ?>
		<?php elseif( $position == 'standard' && $individual_post_header == 'standard' ) : ?>
			<?php get_template_part( 'templates/post', 'header' ); ?>
			<?php get_template_part( 'templates/post', 'format' ); ?>
		<?php elseif( $position == 'top' && $global_single_post_header == 'fullwidth' && $individual_post_header !== 'standard' ) : ?>
			<div class="single-fullwidth-header">
				<?php get_template_part( 'templates/post', 'header' ); ?>
				<?php get_template_part( 'templates/post', 'format' ); ?>
			</div>
		<?php elseif( $position == 'top' && $global_single_post_header == 'large' && $individual_post_header !== 'standard' ) : ?>
			<div class="container">
				<div class="single-large-header">
					<?php get_template_part( 'templates/post', 'header' ); ?>
					<?php get_template_part( 'templates/post', 'format' ); ?>
				</div>
			</div>
		<?php elseif( $position == 'standard' && $global_single_post_header == 'standard' && $individual_post_header == 'standard' ) : ?>
			<?php get_template_part( 'templates/post', 'header' ); ?>
			<?php get_template_part( 'templates/post', 'format' ); ?>
		<?php elseif( $position == 'standard' && $global_single_post_header == 'standard' && $individual_post_header == '' ) : ?>
			<?php get_template_part( 'templates/post', 'header' ); ?>
			<?php get_template_part( 'templates/post', 'format' ); ?>
		<?php endif; ?>
	<?php endif; ?>

<?php
}

function wundermag_post_header( $position ) {
	$individual_post_header = wundermag_get_field( 'individual_post_header' );
	$global_single_post_header = get_theme_mod( 'global_single_post_header', 'standard' );
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	?>

	<?php if( is_single() ) : ?>
		<?php if( $position == 'standard' && $individual_post_header == 'fullwidth' ) : ?>

			<?php if( has_post_format( 'audio' ) || has_post_format( 'gallery' ) ) : ?>
				<?php get_template_part( 'templates/post', 'header' ); ?>
			<?php endif; ?>

		<?php endif; ?>
	<?php endif; ?>

<?php
}

function wundermag_page_header( $position ) {
	$individual_page_header = wundermag_get_field( 'individual_page_header' );
	$global_page_header = get_theme_mod( 'global_page_header', 'large' );

	$individual_page_hide_title = wundermag_get_field( 'individual_page_hide_title', false );
	$global_page_show_title = get_theme_mod( 'page_show_title', true );
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	?>

	<?php if( $position == 'top' && $individual_page_header == 'fullwidth' ) : ?>
		<div class="page-header-fullwidth text-center <?php if( has_post_thumbnail() ) : ?>thumb-bg<?php endif; ?>" data-img="<?php echo esc_url( $thumb[0] ); ?>">
			<?php if( $global_page_show_title == true && $individual_page_hide_title == false ) : ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
		</div>

	<?php elseif( $position == 'top' && $individual_page_header == 'large' ) : ?>
		<div class="page-large-header">
			<div class="container">
				<?php if( $global_page_show_title == true && $individual_page_hide_title == false ) : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
				<?php the_post_thumbnail( 'wundermag_1140x700' ); ?>
			</div>
		</div>

	<?php elseif( $position == 'standard' && $individual_page_header == 'standard' ) : ?>
		<div class="page-standard-header">
			<?php if( $global_page_show_title == true && $individual_page_hide_title == false ) : ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
			<?php the_post_thumbnail( 'wundermag_1140x700' ); ?>
		</div>

	<?php endif; ?>

	<?php if( $individual_page_header == '' ) : ?>

		<?php if( $position == 'top' && $global_page_header == 'fullwidth' ) : ?>
			<div class="page-header-fullwidth text-center <?php if( has_post_thumbnail() ) : ?>thumb-bg<?php endif; ?>" data-img="<?php echo esc_url( $thumb[0] ); ?>">
				<?php if( $global_page_show_title == true && $individual_page_hide_title == false ) : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
			</div>

		<?php elseif( $position == 'top' && $global_page_header == 'large' ) : ?>
			<div class="page-large-header">
				<div class="container">
					<?php if( $global_page_show_title == true && $individual_page_hide_title == false ) : ?>
						<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php the_post_thumbnail( 'wundermag_1140x700' ); ?>
				</div>
			</div>

		<?php elseif( $position == 'standard' && $global_page_header == 'standard' ) : ?>
			<div class="page-standard-header">
				<?php if( $global_page_show_title == true && $individual_page_hide_title == false ) : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
				<?php the_post_thumbnail( 'wundermag_1140x700' ); ?>
			</div>

		<?php endif; ?>

	<?php endif; ?>

<?php
}

//////////////////////////////////////////
//
/////////////////////////////////////////
function wundermag_attachment_display_settings() {
	update_option( 'image_default_link_type', 'file' );
	update_option( 'image_default_size', 'medium' );
}
add_action( 'after_setup_theme', 'wundermag_attachment_display_settings' );

//////////////////////////////////////////
// User Profile Links
/////////////////////////////////////////
function wundermag_user_profile_contacts( $contactmethods ) {
	$contactmethods['facebook']    = 'Facebook URL';
	$contactmethods['twitter']     = 'Twitter URL';
	$contactmethods['youtube']     = 'Youtube URL';
	$contactmethods['vimeo']       = 'Vimeo URL';
	$contactmethods['tumblr']      = 'Tumblr URL';
	$contactmethods['bloglovin']   = 'Bloglovin URL';
	$contactmethods['linkedin']    = 'Linkedin URL';
	$contactmethods['pinterest']   = 'Pinterest URL';
	$contactmethods['instagram']   = 'Instagram URL';
	$contactmethods['snapchat']    = 'Snapchat URL';
	$contactmethods['googleplus']  = 'Google Plus URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'wundermag_user_profile_contacts', 10, 1 );

//////////////////////////////////////////
// WP Instagram Parts
/////////////////////////////////////////
function wundermag_instagram_parts() {
	return 'templates/wp-instagram-widget.php';
}
add_filter( 'wpiw_template_part', 'wundermag_instagram_parts' );

//////////////////////////////////////////
// Paginations
/////////////////////////////////////////
function wundermag_pagination_type() {
	$infinite_scroll = get_theme_mod( 'infinite_scroll', false );
	$pagination_type = get_theme_mod( 'pagination_type', 'numeric' );

	if( $infinite_scroll == true ) {
		?>
			<a href="<?php esc_url( next_posts() ); ?>" class="infinite-older-posts <?php if (get_theme_mod('infinite_button', false) == true) :?>view-more-button btn"><?php esc_html_e('Load More', 'wundermag'); ?><?php else : ?>"><?php endif; ?></a>
			<div class="page-load-status">
				<div class="infinite-scroll-request"><div class="loading"></div></div>
				<p class="infinite-scroll-last"></p>
				<p class="infinite-scroll-error"></p>
			</div>
		<?php
	} elseif( $pagination_type == 'links' ) {

		if( get_next_posts_link() ) : ?>
			<div class="older-posts-link">
				<a href="<?php esc_url( next_posts() ); ?>"><i class="fa fa-angle-double-left"></i> <?php echo esc_html_e( 'Older Posts', 'wundermag' ); ?></a>
			</div>
		<?php endif; ?>

		<?php if( get_previous_posts_link() ) : ?>
			<div class="newer-posts-link">
				<a href="<?php esc_url( previous_posts() ); ?>"><?php echo esc_html_e( 'Newer Posts', 'wundermag' ); ?> <i class="fa fa-angle-double-right"></i></a>
			</div>
		<?php endif;

	} else {

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => esc_html__( 'Previous', 'wundermag' ),
			'next_text' => esc_html__( 'Next', 'wundermag' ),
		) );

	}
}

function wundermag_pagination_num() {
	the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => esc_html__( 'Previous', 'wundermag' ),
		'next_text' => esc_html__( 'Next', 'wundermag' ),
	) );
}
function wundermag_pagination_links() {
	if( get_next_posts_link() ) : ?>
		<div class="older-posts-link">
			<a href="<?php esc_url( next_posts() ); ?>"><i class="fa fa-angle-double-left"></i> <?php echo esc_html_e( 'Older Posts', 'wundermag' ); ?></a>
		</div>
	<?php endif; ?>

	<?php if( get_previous_posts_link() ) : ?>
		<div class="newer-posts-link">
			<a href="<?php esc_url( previous_posts() ); ?>"><?php echo esc_html_e( 'Newer Posts', 'wundermag' ); ?> <i class="fa fa-angle-double-right"></i></a>
		</div>
	<?php endif;
}
function wundermag_pagination( $numpages = '', $pagerange = '', $paged='' ) {

if (empty($pagerange)) {
	$pagerange = 2;
}

/**
 * This first part of our function is a fallback
 * for custom pagination inside a regular loop that
 * uses the global $paged and global $wp_query variables.
 *
 * It's good because we can now override default pagination
 * in our theme, and use this function in default queries
 * and custom queries.
 */
global $paged;
if (empty($paged)) {
	$paged = 1;
}
if ($numpages == '') {
	global $wp_query;
	$numpages = $wp_query->max_num_pages;
	if(!$numpages) {
		$numpages = 1;
	}
}

/**
 * We construct the pagination arguments to enter into our paginate_links
 * function.
 */
$pagination_args = array(
	'base'            => get_pagenum_link(1) . '%_%',
	'format'          => 'page/%#%',
	'total'           => $numpages,
	'current'         => $paged,
	'show_all'        => false,
	'end_size'        => 1,
	'mid_size'        => 1,
	'prev_next'       => true,
	'prev_text' 	  => esc_html__( 'Previous', 'wundermag' ),
	'next_text' 	  => esc_html__( 'Next', 'wundermag' ),
	'type'            => 'plain',
	'add_args'        => false,
	'add_fragment'    => ''
);

$paginate_links = paginate_links($pagination_args);

	if ( paginate_links($pagination_args) ) {
		echo "<nav class='custom-pagination'>";
		echo "<div class='nav-links'>";
		echo paginate_links($pagination_args);
		echo "</div>";
		echo "</nav>";
	}
}
function wundermag_sanitize_pagination( $content ) {
	// Remove role attribute
	$content = str_replace('role="navigation"', '', $content);
	return $content;
}
add_action('navigation_markup_template', 'wundermag_sanitize_pagination');

//////////////////////////////////////////
// Video Thumbs
/////////////////////////////////////////
function wundermag_get_video_thumbnail_uri( $video_uri ) {

		$thumbnail_uri = '';

		// determine the type of video and the video id
		$video = wundermag_parse_video_uri( $video_uri );

		// get youtube thumbnail

		if( $video['type'] == 'youtube' )
			$thumbnail_uri = 'http://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg';
		// get vimeo thumbnail
		if( $video['type'] == 'vimeo' )
			$thumbnail_uri = wundermag_get_vimeo_thumbnail_uri( $video['id'] );
		// get wistia thumbnail
		if( $video['type'] == 'wistia' )
			$thumbnail_uri = wundermag_get_wistia_thumbnail_uri( $video_uri );
		// get default/placeholder thumbnail
		if( empty( $thumbnail_uri ) || is_wp_error( $thumbnail_uri ) )
			$thumbnail_uri = '';

		//return thumbnail uri
		return $thumbnail_uri;

	}
function wundermag_parse_video_uri( $url ) {

	// Parse the url
	$parse = parse_url( $url );

	// Set blank variables
	$video_type = '';
	$video_id = '';

	// Url is http://youtu.be/xxxx
	if ( $parse['host'] == 'youtu.be' ) {

		$video_type = 'youtube';

		$video_id = ltrim( $parse['path'],'/' );

	}

	// Url is http://www.youtube.com/watch?v=xxxx
	// or http://www.youtube.com/watch?feature=player_embedded&v=xxx
	// or http://www.youtube.com/embed/xxxx
	if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {

		$video_type = 'youtube';

		parse_str( $parse['query'] );

		$video_id = $v;

		if ( !empty( $feature ) )
			$video_id = end( explode( 'v=', $parse['query'] ) );

		if ( strpos( $parse['path'], 'embed' ) == 1 )
			$video_id = end( explode( '/', $parse['path'] ) );

	}

	// Url is http://www.vimeo.com
	if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {

		$video_type = 'vimeo';

		$video_id = ltrim( $parse['path'],'/' );

	}
	$host_names = explode(".", $parse['host'] );
	$rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
	// Url is an oembed url wistia.com
	if ( ( $rebuild == 'wistia.com' ) || ( $rebuild == 'wi.st.com' ) ) {

		$video_type = 'wistia';

		if ( strpos( $parse['path'], 'medias' ) == 1 )
				$video_id = end( explode( '/', $parse['path'] ) );

	}

	// If recognised type return video array
	if ( !empty( $video_type ) ) {

		$video_array = array(
			'type' => $video_type,
			'id' => $video_id
		);

		return $video_array;

	} else {

		return false;

	}

}
function wundermag_get_vimeo_thumbnail_uri( $clip_id ) {
	$vimeo_api_uri = 'https://vimeo.com/api/v2/video/' . $clip_id . '.php';
	$vimeo_response = wp_remote_get( $vimeo_api_uri );
	if( is_wp_error( $vimeo_response ) ) {
		return $vimeo_response;
	} else {
		$vimeo_response = unserialize( $vimeo_response['body'] );
		return $vimeo_response[0]['thumbnail_large'];
	}

}
function wundermag_get_wistia_thumbnail_uri( $video_uri ) {
	if ( empty($video_uri) )
		return false;
	$wistia_api_uri = 'https://fast.wistia.com/oembed?url=' . $video_uri;
	$wistia_response = wp_remote_get( $wistia_api_uri );
	if( is_wp_error( $wistia_response ) ) {
		return $wistia_response;
	} else {
		$wistia_response = json_decode( $wistia_response['body'], true );
		return $wistia_response['thumbnail_url'];
	}

}

//////////////////////////////////////////
// Thumbs
/////////////////////////////////////////

function wundermag_post_thumb( $thumbSize ) {

	if( has_post_thumbnail() ) {
		the_post_thumbnail( $thumbSize );
	} elseif( has_post_format( 'gallery' ) ) {
		$images = wundermag_get_field( 'post_format_gallery' );
		if( $images ) {
			foreach( $images as $index => $image ) {
				if ($index == 0) {
				?>
					<img src="<?php echo wp_get_attachment_image_url( $image['id'], $thumbSize ); ?>">
				<?php
				}
			}
		}

	} elseif( has_post_format( 'video' ) ) { ?>
		<?php if( wundermag_get_field( 'post_format_video' ) ) : ?>
			<?php
				$video_url = wundermag_get_field( 'post_format_video', false, false, false );
				$video_thumb_url = wundermag_get_video_thumbnail_uri($video_url);
			?>

			<div class="thumb-bg" data-img="<?php echo esc_url( $video_thumb_url ); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/<?php echo esc_html( $thumbSize ); ?>.jpg">
			</div>
		<?php endif;

	 } elseif( has_post_format( 'audio' ) ) { ?>

		<div class="thumb-bg">
			<?php echo wundermag_get_field('post_format_audio'); ?>
			<img src="<?php echo get_template_directory_uri(); ?>/dist/img/<?php echo esc_html( $thumbSize ); ?>.jpg">
		</div>
	<?php
	}
}

function wundermag_post_thumb_bg( $thumbSize ) {
	if( has_post_thumbnail() ) {
		$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumbSize, true );
		echo esc_url( $thumb_url[0] );
	} elseif( has_post_format( 'gallery' ) ) {
		$images = wundermag_get_field( 'post_format_gallery' );
		if( $images ) {
			foreach( $images as $index => $image ) {
				if ($index == 0) {
					echo wp_get_attachment_image_url( $image['id'], $thumbSize );
				}
			}
		}
	} elseif( has_post_format( 'video' ) ) {
		$video_url = wundermag_get_field( 'post_format_video', false, false, false );
		$video_thumb_url = wundermag_get_video_thumbnail_uri( $video_url );
		echo esc_url( $video_thumb_url );
	}
}

function wundermag_post_pag_thumb_bg( $prev_or_next, $thumbSize ) {
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	$get_format = get_post_format( $prev_or_next->ID );

	if( has_post_thumbnail() ) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $prev_or_next->ID ), $thumbSize, true );
		?>
			<img src="<?php echo esc_url( $image_url[0] ); ?>">
		<?php
	} elseif( $get_format == 'gallery' ) {
		$images = wundermag_get_field( 'post_format_gallery', $prev_or_next->ID );
		if( $images ) {
			foreach( $images as $index => $image ) {
				if ($index == 0) {
				?>
					<img src="<?php echo wp_get_attachment_image_url( $image['id'], $thumbSize ); ?>">
				<?php
				}
			}
		}
	} elseif( $get_format == 'video' ) {
		$video_url = wundermag_get_field( 'post_format_video', $prev_or_next->ID, false, false );
		$video_thumb_url = wundermag_get_video_thumbnail_uri( $video_url );
		?>
		<div class="thumb-bg" data-img="<?php echo esc_url( $video_thumb_url ); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/dist/img/<?php echo esc_html( $thumbSize ); ?>.jpg">
		</div>
		<?php
	} else {
	?>
		<img src="<?php echo get_template_directory_uri(); ?>/dist/img/<?php echo esc_html( $thumbSize ); ?>.jpg">
	<?php
	}
}

//////////////////////////////////////////
// Cat Posts Limit
/////////////////////////////////////////
function limit_category_posts( $query ){
	$cat_posts_number = get_theme_mod( 'cat_posts_number', 6 );
	if ($query->is_category) {
		$query->set( 'posts_per_page', $cat_posts_number );
	}
	return $query;
}
add_filter('pre_get_posts', 'limit_category_posts');

//////////////////////////////////////////
// Demo Set-Mods
/////////////////////////////////////////

 if( $_SERVER['SERVER_NAME'] == 'www.wundermag.thememeister.com' or $_SERVER['SERVER_NAME'] == 'wundermag.thememeister.com' ) {

	$url = $_SERVER['QUERY_STRING'];

	if( $url == '' ) {

		set_theme_mod( 'layout_homepage', 'list' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '1' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-2' ) {

		set_theme_mod( 'layout_homepage', 'grid' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'no-sidebar' );
		set_theme_mod( 'featured_slider_type', '2' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-3' ) {

		set_theme_mod( 'layout_homepage', 'grid' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '3' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-4' ) {

		set_theme_mod( 'layout_homepage', 'list' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '4' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-5' ) {

		set_theme_mod( 'layout_homepage', 'full' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '5' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-6' ) {

		set_theme_mod( 'layout_homepage', 'grid' );
		set_theme_mod( 'layout_homepage_first_full_post', true );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '6' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-7' ) {

		set_theme_mod( 'layout_homepage', 'list' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '7' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-8' ) {

		set_theme_mod( 'layout_homepage', 'grid' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'no-sidebar' );
		set_theme_mod( 'featured_slider_type', 'none' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-9' ) {

		set_theme_mod( 'layout_homepage', 'grid' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'left' );
		set_theme_mod( 'featured_slider_type', '8' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-10' ) {

		set_theme_mod( 'layout_homepage', 'grid' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'left' );
		set_theme_mod( 'featured_slider_type', '9' );
		set_theme_mod( 'header_type', '2' );
		set_theme_mod( 'infinite_scroll', '0' );

	} elseif( $url == 'home-11' ) {

		set_theme_mod( 'layout_homepage', 'list' );
		set_theme_mod( 'layout_homepage_first_full_post', false );
		set_theme_mod( 'global_sidebar', 'right' );
		set_theme_mod( 'featured_slider_type', '4' );
		set_theme_mod( 'header_type', '1' );
		set_theme_mod( 'infinite_scroll', '1' );

	}

	 //Update popular post views
	 //update_post_meta('113', 'post_views_count', '1100');
	 //update_post_meta('121', 'post_views_count', '1000');

 }
