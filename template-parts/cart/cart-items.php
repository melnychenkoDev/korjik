<?php


$items_html = '';
$html = '';

if ($args['cart_items']) {
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
}

?>

<?php echo $html; ?>