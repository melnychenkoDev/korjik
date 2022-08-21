<?php
get_header();

$pizza_args = array(
    'post_type' => 'product',
    'product_cat' => 'pizza',
    'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$pizza_query = new WP_Query($pizza_args);

$rolls_args = array(
	'post_type' => 'product',
	'product_cat' => 'rolls',
	'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$rolls_query = new WP_Query($rolls_args);

$bullfinches_nigiri_args = array(
	'post_type' => 'product',
	'product_cat' => 'bullfinches-nigiri',
	'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$bullfinches_nigiri_query = new WP_Query($bullfinches_nigiri_args);

$bowls_args = array(
	'post_type' => 'product',
	'product_cat' => 'bowls',
	'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$bowls_query = new WP_Query($bowls_args);

$drink_args = array(
    'post_type' => 'product',
    'product_cat' => 'beverages',
    'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$drink_query = new WP_Query($drink_args);

$desserts_args = array(
    'post_type' => 'product',
    'product_cat' => 'desserts',
    'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$desserts_query = new WP_Query($desserts_args);

$snacks_args = array(
    'post_type' => 'product',
    'product_cat' => 'snacks',
    'posts_per_page' => -1,
);
$snacks_query = new WP_Query($snacks_args);

$sauces_args = array(
    'post_type' => 'product',
    'product_cat' => 'sauces',
    'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'order' => 'asc'
);
$sauces_query = new WP_Query($sauces_args);

$addition_args = array(
	'post_type' => 'product',
	'product_cat' => 'addition',
	'posts_per_page' => -1,
);
$addition_query = new WP_Query($addition_args);
?>

<?php if ($rolls_query->have_posts()): ?>
	<section class="products__wrapper" id="rolls">
		<div class="container container-lg">
			<div class="products">
				<div class="products__top">
					<h2 class="title"><?=__('Роллы', 'korjik')?></h2>
				</div>
				<div class="products__items">
					<?php while ($rolls_query->have_posts()) : $rolls_query->the_post(); ?>
						<?php $product = wc_get_product(get_the_ID()); ?>
						<?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($bullfinches_nigiri_query->have_posts()): ?>
	<section class="products__wrapper" id="bullfinches-nigiri">
		<div class="container container-lg">
			<div class="products">
				<div class="products__top">
					<h2 class="title"><?=__('Снегири нигири', 'korjik')?></h2>
				</div>
				<div class="products__items">
					<?php while ($bullfinches_nigiri_query->have_posts()) : $bullfinches_nigiri_query->the_post(); ?>
						<?php $product = wc_get_product(get_the_ID()); ?>
						<?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($pizza_query->have_posts()): ?>
    <section class="products__wrapper" id="pizza">
        <div class="container container-lg">
            <div class="products">
                <div class="products__top">
                    <h2 class="title"><?=__('Пицца', 'korjik')?></h2>
                </div>
                <div class="products__items">
                    <?php while ($pizza_query->have_posts()) : $pizza_query->the_post(); ?>
                        <?php $product = wc_get_product(get_the_ID()); ?>
                        <?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($bowls_query->have_posts()): ?>
	<section class="products__wrapper" id="bowls">
		<div class="container container-lg">
			<div class="products">
				<div class="products__top">
					<h2 class="title"><?=__('Боулы', 'korjik')?></h2>
				</div>
				<div class="products__items large">
					<?php while ($bowls_query->have_posts()) : $bowls_query->the_post(); ?>
						<?php $product = wc_get_product(get_the_ID()); ?>
						<?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($snacks_query->have_posts()): ?>
    <section class="products__wrapper" id="snacks">
        <div class="container container-lg">
            <div class="products">
                <div class="products__top">
                    <h2 class="title"><?=__('Закуски', 'korjik')?></h2>
                </div>
                <div class="products__items">
                    <?php while ($snacks_query->have_posts()) : $snacks_query->the_post(); ?>
                        <?php $product = wc_get_product(get_the_ID()); ?>
                        <?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($drink_query->have_posts()): ?>
    <section class="products__wrapper" id="drinks">
        <div class="container container-lg">
            <div class="products">
                <div class="products__top">
                    <h2 class="title"><?=__('Напитки', 'korjik')?></h2>
                </div>
                <div class="products__items">
                    <?php while ($drink_query->have_posts()) : $drink_query->the_post(); ?>
                        <?php $product = wc_get_product(get_the_ID()); ?>
                        <?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($desserts_query->have_posts()): ?>
    <section class="products__wrapper" id="desserts">
        <div class="container container-lg">
            <div class="products">
                <div class="products__top">
                    <h2 class="title"><?=__('Десерты', 'korjik')?></h2>
                </div>
                <div class="products__items">
                    <?php while ($desserts_query->have_posts()) : $desserts_query->the_post(); ?>
                        <?php $product = wc_get_product(get_the_ID()); ?>
                        <?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($sauces_query->have_posts()): ?>
	<section class="products__wrapper" id="sauces">
		<div class="container container-lg">
			<div class="products">
				<div class="products__top">
					<h2 class="title"><?=__('Соусы', 'korjik')?></h2>
				</div>
				<div class="products__items">
					<?php while ($sauces_query->have_posts()) : $sauces_query->the_post(); ?>
						<?php $product = wc_get_product(get_the_ID()); ?>
						<?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($addition_query->have_posts()): ?>
	<section class="products__wrapper" id="addition">
		<div class="container container-lg">
			<div class="products">
				<div class="products__top">
					<h2 class="title"><?=__('Добавки', 'korjik')?></h2>
				</div>
				<div class="products__items">
					<?php while ($addition_query->have_posts()) : $addition_query->the_post(); ?>
						<?php $product = wc_get_product(get_the_ID()); ?>
						<?php get_template_part('template-parts/product/content', 'product', array('product' => $product)) ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<div id="newsModal"></div>


<?php
get_footer();