<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Korjik
 */


global $woocommerce;
$count = $woocommerce->cart->get_cart_contents_count();


?>
	<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="facebook-domain-verification" content="q394jsfduckrvpsh3e0oli95lud0hw">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<!-- Google Tag Manager -->
		<script>(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({
					'gtm.start':
					 new Date().getTime(), event: 'gtm.js'
				});
				var f = d.getElementsByTagName(s)[0],
				 j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
				j.async = true;
				j.src =
				 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, 'script', 'dataLayer', 'GTM-P8LTNLG');</script>
		<!-- End Google Tag Manager -->

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<!-- Meta Pixel Code -->
	<script>
		!function (f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function () {
				n.callMethod ?
				 n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
		 'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '634249067846626');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
				   src="https://www.facebook.com/tr?id=634249067846626&ev=PageView&noscript=1"/></noscript>
	<!-- End Meta Pixel Code -->

	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8LTNLG" height="0" width="0"
				style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="site__header">
		<div class="container container-lg">
			<div class="site__header_top">
				<div class="logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="info">
					<div class="info_item call">
						<?php $i = 0;
						if (have_rows('header_number', 'option')) : ?>
							<?php while (have_rows('header_number', 'option')) : the_row(); ?>
								<div class="top top-<?= $i ?> icon icon-tel">
									<a class="title"
									   href="tel:<?php clear_phone(the_sub_field('header_number_link')); ?>">
										<?php the_sub_field('header_number_text'); ?>
									</a>
								</div>
								<?php $i++; ?>
							<?php endwhile; ?>
						<?php endif; ?>
						<div class="text"><?= __('Звони браток, это бесплатно', 'korjik') ?></div>
					</div>
					<div class="info_item delivery">
						<div class="top icon icon-delivery-zone"><a class="title" href="
					<?= get_page_link(150) ?>"><?= __('Зоны доставки', 'korjik') ?></a></div>
						<div class="text">
							<?= __('Часик в радость, коржик в сладость', 'korjik') ?></div>
					</div>
				</div>
				<div class="social__networks">
					<?php if (have_rows('social_networks', 'option')) : ?>
						<?php while (have_rows('social_networks', 'option')) : the_row(); ?>
							<div class="social__networks_item">
								<a href="<?= the_sub_field('social_network_link') ? the_sub_field('social_network_link') : '#'; ?>"
								   target="_blank">
									<?php if (get_sub_field('social_network_icon')) : ?>
										<img src="<?php the_sub_field('social_network_icon'); ?>"
											 alt="<?php the_sub_field('social_network_text'); ?>"/>
									<?php endif ?>
									<span class="text">
                                <?php the_sub_field('social_network_text'); ?>
                            </span>
								</a>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="languages_selector">
					<?= my_site_custom_languages_selector_template() ?>
				</div>

				<div class="static__pages">
					<nav class="static__pages_menu">
						<?php if (have_rows('menu', 'option')) : ?>
							<?php while (have_rows('menu', 'option')) : the_row(); ?>
								<?php
								$menu_link = get_sub_field('menu_link');
								$menu_link = !empty($menu_link) ? $menu_link : '#';
								?>
								<div class="static__pages_menu_item">
									<a href="<?php echo esc_url($menu_link); ?>"><?php the_sub_field('menu_text'); ?></a>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</nav>
				</div>
				<div class="mob__menu_trigger">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
			</div>
		</div>
	</header>

	<div class="site__header_mob_menu">
		<div class="icon icon-plus close"></div>
		<div class="static__pages">
			<nav class="static__pages_menu">
				<?php if (have_rows('menu', 'option')) : ?>
					<?php while (have_rows('menu', 'option')) : the_row(); ?>
						<?php
						$menu_link = get_sub_field('menu_link');
						$menu_link = !empty($menu_link) ? $menu_link : '#';
						?>
						<div class="static__pages_menu_item">
							<a href="<?php echo esc_url($menu_link); ?>"><?php the_sub_field('menu_text'); ?></a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</nav>
		</div>
		<div class="info">
			<div class="info_item call">
				<?php if (have_rows('header_number', 'option')) : ?>
					<?php while (have_rows('header_number', 'option')) : the_row(); ?>
						<div class="top icon icon-tel-main-color">
							<a class="title" href="tel:<?php clear_phone(the_sub_field('header_number_link')); ?>">
								<?php the_sub_field('header_number_text'); ?>
							</a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<div class="text"><?= __('Звони браток, это бесплатно', 'korjik') ?></div>
			</div>
			<div class="info_item delivery">
				<div class="top icon icon-delivery-zone-main-color"><a class="title" href="<?= get_page_link(150) ?>">
						<?= __('Зоны доставки', 'korjik') ?></a></div>
				<div class="text">
					<?= __('Часик в радость, коржик в сладость', 'korjik') ?></div>
			</div>
		</div>
		<div class="social__networks">
			<?php if (have_rows('social_networks', 'option')) : ?>
				<?php while (have_rows('social_networks', 'option')) : the_row(); ?>
					<div class="social__networks_item">
						<a href="<?= the_sub_field('social_network_link') ? the_sub_field('social_network_link') : '#'; ?>"
						   target="_blank">
							<?php if (get_sub_field('social_network_icon')) : ?>
								<img src="<?php the_sub_field('social_network_icon'); ?>"
									 alt="<?php the_sub_field('social_network_text'); ?>"/>
							<?php endif ?>
							<span class="text">
                                <?php the_sub_field('social_network_text'); ?>
                            </span>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="languages_selector mob">
			<?= my_site_custom_languages_selector_template() ?>
		</div>
	</div>


<?php

$news_args = array(
	'post_type' => 'news',
	'posts_per_page' => -1
);
$news_query = new WP_Query($news_args);

?>


	<div class="header__content section">

		<div class="site__header_sticky">
			<div class="container container-lg">
				<div class="nav__product__menu">
					<?php if (have_rows('nav_product_menu', 'option')) : ?>
						<?php while (have_rows('nav_product_menu', 'option')) : the_row(); ?>
							<?php if (get_sub_field('nav_product_is_view') == 1) : ?>
								<div class="nav__product__menu_item">
									<a href="<?php the_sub_field('nav_product_menu_id'); ?>">
										<?php if (get_sub_field('nav_product_menu_icon')) : ?>
											<div class="nav__product__menu_item-icon">
												<img src="<?php the_sub_field('nav_product_menu_icon'); ?>"/>
											</div>
										<?php endif ?>
									</a>
									<a class="nav__product__menu_item-text"
									   href="<?php the_sub_field('nav_product_menu_id'); ?>"><?php the_sub_field('nav_product_menu_text'); ?></a>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="actions">
					<!--                    <div class="actions_item">-->
					<!--                        <div class="favorite open_favorite_btn"><i class="icon icon-favorite"></i></div>-->
					<!--                    </div>-->
					<div class="actions_item">
						<div class="open_cart_btn btn btn-lg"><i
								class="icon icon-cart"></i><?= __('Корзина', 'korjik') ?> <span
								class="count"><?= $count ?></span>
							<div class="open_cart_btn-message">
								<div class="title"><?= __('Браток, ну ты че?', 'korjik') ?></div>
								<div class="sub-tit"><?= __('У тебя в корзине пусто, добавь ченить', 'korjik') ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if (is_front_page() && get_field('news_on', 'option') == 1): ?>
			<?php if ($news_query->have_posts()): ?>
				<section class="news__line">
					<div class="container container-lg">
						<div id="newsCarousel" class="news__line_wrapper carousel">
							<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
								<?php
								$news_data_img = '';
								$news_data_title = '';
								$data_attrs = '';


								if (get_field('news_data_img', get_the_ID())) {
									$news_data_img = get_field('news_data_img', get_the_ID());

									$data_attrs .= 'data-news-open data-news-img="' . $news_data_img . '"';
								}

								if (get_field('news_data_title', get_the_ID()) || get_the_title()) {
									$news_data_title = get_field('news_data_title', get_the_ID()) ? get_field('news_data_title', get_the_ID()) : get_the_title();
									$data_attrs .= ' data-news-title="' . $news_data_title . '"';
								}


								$data_attrs .= " data-news-content='" . get_field('news_data_content', get_the_ID()) . "'";


								?>
								<div class="news_card carousel__slide" <?= $data_attrs ?>>
									<img class="news_card_img" src="<?= get_the_post_thumbnail_url(); ?>"
										 alt="<?= get_the_title(); ?>">
									<div class="news_card_title"><?= get_the_title(); ?></div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>
			<!--        --><?php //else: ?>
			<!--            <div style="width: 100%; height: 1px;opacity: 0;pointer-events: none;"></div>-->
		<?php endif; ?>
	</div>

	<div class="open_cart_btn mob"><?= __('В корзине', 'korjik') ?> <span style="margin: 0 3px;"
																		  class="count"><?= $count ?></span> <?= __('товаров', 'korjik') ?>
		<div class="open_cart_btn-message">
			<div class="title"><?= __('Браток, ну ты че?', 'korjik') ?></div>
			<div class="sub-tit"><?= __('У тебя в корзине пусто, добавь ченить', 'korjik') ?></div>
		</div>
	</div>
<?php get_template_part('template-parts/cart/cart'); ?>


<?php
