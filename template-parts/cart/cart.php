<?php

$count = WC()->cart->get_cart_contents_count();
$total_price = WC()->cart->get_cart_subtotal();
$price = WC()->cart->get_cart_shipping_total();
$items = WC()->cart->cart_contents;
$coupons = WC()->cart->get_applied_coupons(); // ZQ67M5AF
$cart = WC()->cart->get_cart();

//WC()->cart->empty_cart();

//echo '<pre>';
//var_dump($coupons);
//echo '</pre>';


$obj = json_encode(array(
	array('count' => $count)
));

//$order = new WC_Order();
//
//// wc-pending, wc-processing, wc-completed
//
//$order->set_shipping_address_1('Дерибасовская');
//$order->set_billing_email('test@gmail.com');
//$order->set_shipping_address_1('+3806399999999');
//$order->set_billing_first_name('Test name');
//$order->set_billing_last_name('Test last name');
//$order->set_payment_method('cod');
//$order->set_status('wc-processing');
//$order->set_customer_note('нас будет 5 чел');
//$order->set_total($total_price);
//
//
//$order_id = $order->get_id();
//$order_calculate_totals = $order->calculate_totals();
//$order_get_user = $order->get_user();
//$order_get_items = $order->get_items();
//
//$obj2 = json_encode(array(
//    array(
//        'order' => $order,
//        'order_id' => $order_id,
//        'calculate_totals' => $order_calculate_totals,
//        'get_user' => $order_get_user,
//        'get_items' => $order_get_items
//    )
//));


?>

<script>
	window.cartData = <?=$obj?>;
</script>

<div class="cart_overlay">
	<div id="cart" class="cart">

		<div class="cart__info">
			<div class="cart__info_top">
				<div class="cart__info_title"><i class="icon icon-cart main-color"></i>Ваш заказ на сумму:
					<div class="total_cart_price"><?= $total_price ?></div>
				</div>
			</div>
			<div class="cart__info_top mob">
				<div class="cart_close">
					<i class="icon icon-plus close grey"></i>
				</div>
				<div class="cart__info_title"><i class="icon icon-cart main-color"></i>Ваша корзина</div>
			</div>
			<div class="cart__list">
				<?php get_template_part('template-parts/cart/cart', 'items', ['cart_items' => $items]) ?>
			</div>
		</div>

		<div class="checkout__section">
			<?= do_shortcode('[woocommerce_checkout]') ?>
		</div>

	</div>
</div>
