<?php

add_action('wp_ajax_cart_data', 'cartOpen');
add_action('wp_ajax_nopriv_cart_data', 'cartOpen');

add_action('wp_ajax_add_to_cart', 'addToCart');
add_action('wp_ajax_nopriv_add_to_cart', 'addToCart');

add_action('wp_ajax_update_to_cart', 'updateToCart');
add_action('wp_ajax_nopriv_update_to_cart', 'updateToCart');

add_action('wp_ajax_remove_to_cart', 'removeToCart');
add_action('wp_ajax_nopriv_remove_to_cart', 'removeToCart');

function getCartItemsData()
{
    global $woocommerce;


    $count = $woocommerce->cart->get_cart_contents_count();
    $total_price = $woocommerce->cart->get_cart_subtotal();
    $items = $woocommerce->cart->get_cart();

    $checkout_html = do_shortcode('[woocommerce_checkout]');

    $items_html = '';

    foreach (WC()->cart->cart_contents as $value) {
        $product = wc_get_product($value['product_id']);
        $id = $product->get_id();
        $img = wp_get_attachment_image($product->image_id, array(300));
        $title = $product->get_title();
        $price = $product->get_regular_price();
        $price = $product->get_sale_price() ? $product->get_sale_price() : $price;
        $quantity = $value['quantity'];


        $items_html .= "
            <div class='cart__list_item'>
                <div class='remove remove_cart_item' data-id='$id' data-action='remove_to_cart'><div class='icon icon-plus close'></div></div>
                
                <div class='left'>
                    <div class='title'>$title</div>
                    <div class='change_quantity'>
                        <div class='change_quantity_block'>
                            <div class='update_cart_item minus icon icon-minus' data-id='$id' data-current-qauntity='$quantity' data-qauntity='-1' data-action='update_to_cart'></div>
                            <div class='quantity'>$quantity</div>
                            <div class='update_cart_item plus icon icon-plus' data-id='$id' data-current-qauntity='$quantity' data-qauntity='1' data-action='update_to_cart'></div>
                        </div>
                        <div class='price'>$price</div>
                    </div>
                </div>
                
                <div class='right'>
                    $img
                </div>
            </div>
        ";

    }

    $html = "$items_html";

    echo json_encode(array('count' => $count, 'total_price' => $total_price, 'items' => $items, 'items_html' => "$html", 'checkout_html' => $checkout_html));
}

function cartOpen()
{
    getCartItemsData();

    die();
}

function addToCart()
{
    global $woocommerce;

    $cart_item_id = $_POST['id'];
    $cart_item_quantity = $_POST['quantity'];

    if (!empty($cart_item_id) && !empty($cart_item_quantity)) {
		WC()->cart->add_to_cart($cart_item_id, $cart_item_quantity);

//		if (get_current_user_id() == '1') {
//			if (count(WC()->cart->get_cart()) > 1) {
//				foreach (WC()->cart->get_cart() as $key => $cart_item) {
//					if ($cart_item->quantity > 1) {
//						echo $cart_item->line_total;
//					}
//				}
//			}
//
//			echo json_encode(WC()->cart->get_cart());
//			die();
//		}

        getCartItemsData();
    }

    die();
}


function updateToCart()
{
    global $woocommerce;

    $cart_item_id = $_POST['id'];
    $cart_item_quantity = $_POST['quantity'];

    foreach (WC()->cart->cart_contents as $value) {
        if ($value['product_id'] == $cart_item_id && $cart_item_quantity) {
            WC()->cart->set_quantity($value['key'], $cart_item_quantity);
        }
    }

    getCartItemsData();

    die();
}

function removeToCart()
{
    global $woocommerce;

    $cart_item_id = $_POST['id'];

    foreach (WC()->cart->cart_contents as $value) {
        if ($value['product_id'] == $cart_item_id) {
            WC()->cart->remove_cart_item($value['key']);
        }
    }

    getCartItemsData();

    die();
}


add_action('wp_enqueue_scripts', 'myajax_data', 99);
function myajax_data()
{

    // Первый параметр 'twentyfifteen-script' означает, что код будет прикреплен к скрипту с ID 'twentyfifteen-script'
    // 'twentyfifteen-script' должен быть добавлен в очередь на вывод, иначе WP не поймет куда вставлять код локализации
    // Заметка: обычно этот код нужно добавлять в functions.php в том месте где подключаются скрипты, после указанного скрипта
    wp_localize_script('main', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php'),
            'homeUrl' => home_url(),
        )
    );

}