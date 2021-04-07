<?php 
/*
* Plugin Name: Logo or Image Replace By Alex
* Plugin URI: https://quantumcloud.com
* Description: Choose a new company logo per page
* Version: 1.0.1
* Author: QuantumCloud
* Author URI: https://www.quantumcloud.com/
* Requires at least: 4.6
* Tested up to: 5.5
* Text Domain: image-replace-by-mycore
* License: GPL2
*/

define('qcld_lpp_asset_url', plugin_dir_url(__FILE__) . "/assets");

/**
 *
 * Enqueue Admin Scripts and Styles
 *
 */
function qc_lpp_admin_style_script(){
	wp_enqueue_media();

	wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('qc-lpp-upload', qcld_lpp_asset_url.'/js/admin-script.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('qc-lpp-upload');

    wp_localize_script( 'qc-lpp-upload', 'meta_image',
		array(
			'title' => __( 'Choose or Upload Media', 'image-replace-by-mycore' ),
			'button' => __( 'Use this media', 'image-replace-by-mycore' ),
		)
	);
	wp_enqueue_script( 'qc-lpp-upload' );

}
add_action( 'admin_enqueue_scripts', 'qc_lpp_admin_style_script' );



/**
 *
 * Enqueue Front End Scripts and Styles
 *
 */
function qc_lpp_front_style_script(){
	global $post;
	$original_image = get_post_meta( $post->ID, 'qc_lpp_original_url', true );
	$replaced_image = get_post_meta( $post->ID, 'qc_lpp_replacing_image_url', true );
	$image_width = get_post_meta( $post->ID, 'qc_lpp_image_width', true );
	$image_height = get_post_meta( $post->ID, 'qc_lpp_image_height', true );

    wp_register_script('qc-lpp-front-script', qcld_lpp_asset_url.'/js/front-script.js', array('jquery'));
    wp_enqueue_script('qc-lpp-front-script');

    wp_localize_script('qc-lpp-front-script', 'qc_lpp_js_vars', array(
            'postID' => $post->ID,
            'original_img_url' => $original_image,
            'replacing_image_url' => $replaced_image,
            'qc_lpp_image_width' => $image_width,
            'qc_lpp_image_height' => $image_height,
        )
    );

}
add_action( 'wp_enqueue_scripts', 'qc_lpp_front_style_script' );


/**
 *
 * Add Metabox
 *
 */
function qc_lpp_metabox(){
	add_meta_box('qc_lpp_meta_box', 'Upload Logo or Image', 'qc_lpp_meta_box_func', 'page', 'advanced', 'high');
}
add_action( 'add_meta_boxes', 'qc_lpp_metabox', 10 );

/**
 *
 * Metabox render Function
 *
 */
function qc_lpp_meta_box_func( $post ){
	$original_image = get_post_meta( $post->ID, 'qc_lpp_original_url', true );
	$replaced_image = get_post_meta( $post->ID, 'qc_lpp_replacing_image_url', true );
	$image_width = get_post_meta( $post->ID, 'qc_lpp_image_width', true );
	$image_height = get_post_meta( $post->ID, 'qc_lpp_image_height', true );
?>
	<p>
		<label for="qc_lpp_original_url">Original Image Source (please enter full URL beginning with http or https)</label> <br />
		<input type="text" class="large-text" id="qc_lpp_original_url" name="qc_lpp_original_url" value="<?php echo esc_attr( $original_image ); ?>">
	</p>

	<p>
		<label for="qc_lpp_replacing_image_url"><?php _e( 'Upload or Select Image to be Replaced with', 'image-replace-by-mycore' )?></label><br>

		<!-- The actual field that will hold the URL for our file -->
		<input type="url" class="large-text" name="qc_lpp_replacing_image_url" id="qc_lpp_replacing_image_url" value="<?php echo esc_attr( $replaced_image ); ?>"><br>

		<!-- 
		 The button that opens our media uploader
		 The `data-media-uploader-target` value should match the ID/unique selector of your field.
		 We'll use this value to dynamically inject the file URL of our uploaded media asset into your field once successful (in the myplugin-media.js file)
		-->

		<button style="margin-top: 10px;" type="button" class="button" id="image-replace-by-mycore_video_upload_btn" data-media-uploader-target="#qc_lpp_replacing_image_url"><?php _e( 'Upload Media', 'myplugin' )?></button>
	</p>

	<p>
		<label for="qc_lpp_image_width">Width : </label>
		<input type="text"  id="qc_lpp_image_width" name="qc_lpp_image_width" value="<?php echo esc_attr( $image_width ); ?>"> &nbsp;  ex. 300
	</p>

	<p>
		<label for="qc_lpp_image_height">Height : </label>
		<input type="text"  id="qc_lpp_image_height" name="qc_lpp_image_height" value="<?php echo esc_attr( $image_height ); ?>"> &nbsp;  ex. 300
	</p>

	<?php wp_nonce_field( 'qc_lpp_form_metabox_nonce', 'qc_lpp_form_metabox_process' ); ?>
<?php
}


/**
 *
 * Metabox saved Function
 *
 */
function qc_lpp_meta_save($post_id) {
	if ( !isset($_POST['qc_lpp_form_metabox_process']) || !wp_verify_nonce( $_POST['qc_lpp_form_metabox_process'], 'qc_lpp_form_metabox_nonce' ) ){
		return;
	}

	if ( !current_user_can('edit_post', $post_id) ){
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if( isset($_POST['qc_lpp_replacing_image_url']) ) {
	  update_post_meta( $post_id, 'qc_lpp_replacing_image_url', sanitize_text_field($_POST['qc_lpp_replacing_image_url']) );
	}

	if( isset($_POST['qc_lpp_original_url']) ) {
	  update_post_meta( $post_id, 'qc_lpp_original_url', sanitize_text_field($_POST['qc_lpp_original_url']) );
	}

	if( isset($_POST['qc_lpp_image_width']) ) {
	  update_post_meta( $post_id, 'qc_lpp_image_width', sanitize_text_field($_POST['qc_lpp_image_width']) );
	}

	if( isset($_POST['qc_lpp_image_height']) ) {
	  update_post_meta( $post_id, 'qc_lpp_image_height', sanitize_text_field($_POST['qc_lpp_image_height']) );
	}
}
  
add_action('save_post', 'qc_lpp_meta_save');