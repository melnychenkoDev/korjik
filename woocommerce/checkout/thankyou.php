<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order">

    <?php
    if ($order) :

//		do_action( 'woocommerce_before_thankyou', $order->get_id() );
        ?>

        <?php if ($order->has_status('failed')) : ?>

        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
            <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
               class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                   class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
            <?php endif; ?>
        </p>

    <?php else : ?>


        <?php $order_details = $order->get_order_item_totals(); ?>


        <div class="woocommerce-order_top">
            <img class="image" src="<?= get_template_directory_uri() ?>/images/static/blatnaya-zvezda.png" alt="blatnaya-zvezda" width="150" height="150">
            <div class="tit title-sm">
                <?= __('Ваш заказ ', 'korjik').'<b>№'.$order->get_order_number().'</b>'.__(' от ', 'korjik').$order->get_date_created()->date('d.m.Y h:i').__(' успешно создан. Мы уже бежим к вам!', 'korjik') ?>
            </div>
            <img class="image" src="<?= get_template_directory_uri() ?>/images/static/blatnaya-zvezda.png" alt="blatnaya-zvezda" width="150" height="150">
        </div>
    
        <div class="woocommerce-order_content">
            <div class="order_data">
                <div class="top">
                    <div class="item total"><?=__('Итого', 'korjik')?> <?=$order_details['order_total']['value']?></div>
                    <div class="item subtotal"><?=__('Товаров на: ', 'korjik')?> <?=$order_details['cart_subtotal']['value']?></div>
                    <div class="item delivery"><?=__('Цена доставки:', 'korjik')?> <?=$order->get_shipping_total()?> <?=get_woocommerce_currency_symbol(get_woocommerce_currency())?></div>
                </div>
                <div class="body">
                    <div class="left">
                        <div class="tit"><?=__('Способ оплаты и доставка', 'korjik')?></div>
                        <div class="info">
                            <?=__('Обратите внимание: если вы откажетесь от заказа, для возврата денег вам придется обратиться в магазин, позвонив нам.', 'korjik')?>
                        </div>
                    </div>
                    <div class="right">
                        <div class="item delivery"><?=wp_kses_post($order->get_payment_method_title())?></div>
                    </div>
                </div>
            </div>
        </div>


    <?php endif; ?>
       <a href="<?= home_url() ?>" class="btn btn-outline btn-lg"><?=__('Вернуться на главную', 'korjik')?></a>

    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); ?></p>

    <?php endif; ?>

</div>
