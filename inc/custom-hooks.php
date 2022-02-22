<?php

/* PRODUCTS LOOP */

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/* PRODUCT */

/* REMOVE PRODUCT BEFORE LOOP ITEM */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

/* REMOVE PRODUCT THUMBNAIL */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/* REMOVE PRODUCT TITLE */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

/* REMOVE PRODUCT PRICE & RATING */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

/* REMOVE PRODUCT AFTER LOOP ITEM */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/* CUSTOM PRODUCT LOOP ITEM */

add_action('woocommerce_before_shop_loop_item', 'woocust_loop_item_start', 5);

add_action('woocommerce_before_shop_loop_item_title', 'woocust_loop_item_top', 5);

add_action('woocommerce_after_shop_loop_item_title', 'woocust_loop_item_body', 5);

/* /CUSTOM PRODUCT LOOP ITEM */

/* /PRODUCT */

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

/* /PRODUCTS LOOP */


function woocust_loop_item_start() {
    global $product;


}

function woocust_loop_item_top() {
    global $product;

    $id = $product->get_id();
    $tag_ids = $product->get_tag_ids();
    $tag_html = '';
    $link = get_permalink($id);
    $url = wp_get_attachment_url($product->image_id, 'full');
    $title = $product->get_title();

    foreach ($tag_ids as $tag_id) {
        $tag = get_term($tag_id);
        $tag_name = $tag->name;
        $tag_slug = $tag->slug;

        $tag_html .= '<div class="tag tag_'.$tag_slug.'">'.$tag_name.'</div>';
    }

    ?>
        <div class='products_item_top'>
            <?php if($tag_html && strlen($tag_html) > 0): ?>
                <div class="tags"><?=$tag_html?></div>
            <?php endif; ?>
            <a href='<?=$link?>'>
                <img src='<?=$url?>' alt='Пицца - <?=$title?>' />
            </a>
        </div>
    <?php
}

function woocust_loop_item_body() {
    global $product;

    $id = $product->get_id();
    $weight = $product->get_weight();
    $title = $product->get_title();
    $short_desc = $product->get_short_description();
    $price = $product->get_price_html();
    $add_to_cart_url = $product->add_to_cart_url();
    $add_to_cart_classes = ['btn', 'btn-outline', 'add_to_cart'];
    $add_to_cart_quantity = 1;


    ?>

    <div class="products_item_body">
        <div class="weight"><p><?=$weight?> г</p></div>
        <h3 class="name"><?=$title?></h3>
        <div class="composition"><p><?=$short_desc?></p></div>
        <div class="bottom">
            <div class="price"><?=$price?></div>
            <a href="<?=$add_to_cart_url?>" data-quantity="<?=$add_to_cart_quantity?>" data-product_id="<?=$id?>" class="<?=implode(' ', $add_to_cart_classes)?>">За пазуху</a>
        </div>
    </div>

    <?php

}