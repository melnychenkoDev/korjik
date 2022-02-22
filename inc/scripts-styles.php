<?php

/**
 * Enqueue scripts and styles.
 */
function korjik_scripts() {
    wp_style_add_data( 'korjik-style', 'rtl', 'replace' );

    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true );

    wp_enqueue_script( 'checkout', get_template_directory_uri() . '/assets/js/checkout.js', array('jquery'), _S_VERSION, true );

    if (is_front_page()) {
        wp_enqueue_style( 'front-page', get_template_directory_uri() . '/assets/css/front-page.css', array(), _S_VERSION );
        wp_enqueue_script( 'front-page', get_template_directory_uri() . '/assets/js/front-page.js', array(), _S_VERSION, true );
    }

    if (is_404()) {
        wp_enqueue_style( '404', get_template_directory_uri() . '/assets/css/404.css', array(), _S_VERSION );
        wp_enqueue_script( '404', get_template_directory_uri() . '/assets/js/404.js', array(), _S_VERSION, true );
    }
    

}
add_action( 'wp_enqueue_scripts', 'korjik_scripts' );

function sp_woocommerce_script_cleaner() {
    if (! is_cart() && ! is_checkout() ) {
        wp_dequeue_style('woocommerce_frontend_styles');
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_dequeue_style('woocommerce_fancybox_styles');
        wp_dequeue_style('woocommerce_chosen_styles');
        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_dequeue_script('selectWoo');
        wp_deregister_script('selectWoo');
        wp_dequeue_script('wc-add-payment-method');
        wp_dequeue_script('wc-lost-password');
        wp_dequeue_script('wc_price_slider');
        wp_dequeue_script('wc-single-product');
        wp_dequeue_script('wc-add-to-cart');
        wp_dequeue_script('wc-cart-fragments');
        wp_dequeue_script('wc-credit-card-form');
        wp_dequeue_script('wc-checkout');
        wp_dequeue_script('wc-add-to-cart-variation');
        wp_dequeue_script('wc-single-product');
        wp_dequeue_script('wc-cart');
        wp_dequeue_script('wc-chosen');
        wp_dequeue_script('woocommerce');
        wp_dequeue_script('prettyPhoto');
        wp_dequeue_script('prettyPhoto-init');
        wp_dequeue_script('jquery-blockui');
        wp_dequeue_script('jquery-placeholder');
        wp_dequeue_script('jquery-payment');
    }
}
add_action('wp_enqueue_scripts', 'sp_woocommerce_script_cleaner', 99);