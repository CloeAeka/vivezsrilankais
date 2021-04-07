<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<li <?php post_class(); ?>>
    <style>.button.loading {-webkit-animation:none!important;animation:none!important;}</style>

    <div class="vossen-main-shop-item-link"><?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

        <div class="vossen-main-shop-image"><?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?></div>

        <?php if(!get_theme_mod( 'wundermag_shop_hide_add_cart_btn_main_page' )) : ?>
            <div class="vossen-ajax-add-cart-btn"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
        <?php endif; ?>

    </div>


    <div class="vossen-main-shop-product-content">

        <div class="vossen-main-shop-category">
            <?php $size = sizeof( get_the_terms( $post->ID, 'product_cat' ) ); ?>
            <?php echo wc_get_product_category_list( $product->get_id(), ', ', '</span>' ); ?>
        </div>

        <div class="vossen-main-shop-title"><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a></div>

        <div class="vossen-main-shop-price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></div>

    </div>



    <?php




    ?>
</li>
