<?php
$product = $args['product'];

$id = $product->get_id();
$tag_ids = $product->get_tag_ids();
$tag_html = '';
$link = get_permalink($id);
//$img = wp_get_attachment_image($product->image_id, array(600, 600));
$imgBg = wp_get_attachment_image($product->image_id, array(1500, 1500));
$title = $product->get_title();

$weight = $product->get_weight();
$title = $product->get_title();
$short_desc = $product->get_short_description();
$price = $product->get_regular_price();
$price_sale = $product->get_sale_price();
$add_to_cart_url = $product->add_to_cart_url();
$add_to_cart_classes = ['btn', 'btn-outline', 'add_to_cart'];
$add_to_cart_quantity = 1;

foreach ($tag_ids as $tag_id) {
    $tag = get_term($tag_id);
    $tag_name = $tag->name;
    $tag_slug = $tag->slug;

    $tag_html .= '<div class="tag tag_'.$tag_slug.'">'.$tag_name.'</div>';
}

?>

<div class="products_item">
    <div class='products_item_top'>
        <?php if($tag_html && strlen($tag_html) > 0): ?>
            <div class="tags"><?=$tag_html?></div>
        <?php endif; ?>
        <div class="card_thumb zoom zoom-img">
            <?=$imgBg?>
        </div>
    </div>
    <div class="products_item_body">
        <?php if (!empty($weight)): ?><div class="weight"><p><?=$weight?> г</p></div><?php endif; ?>
        <h3 class="name title title-sm"><?=$title?></h3>
        <div class="composition"><p><?=$short_desc?></p></div>
        <div class="bottom">
            <div class="price">
                <?php if($product->is_on_sale()): ?>
                    <span class="sale"><?=$price?></span>
                    <span class="regular"><?=$price_sale?></span>
                <?php else: ?>
                <?php if (!empty($price)): ?><span class="regular black"><?=$price?> грн</span><?php endif; ?>
                <?php endif; ?>
            </div>
            <button data-quantity="<?=$add_to_cart_quantity?>" data-id="<?=$id?>" data-action="add_to_cart" class="<?=implode(' ', $add_to_cart_classes)?>">За пазуху</button>
        </div>
    </div>
</div>
