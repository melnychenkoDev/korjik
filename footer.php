<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Korjik
 */

?>

	<footer class="site__footer">
        <?php if ( get_field( 'slogan_image', 'option' ) ) : ?>
            <img class="slogan_image mob" src="<?php the_field( 'slogan_image', 'option' ); ?>" />
        <?php endif ?>

        <div class="container">

            <div class="site__footer_content">
                <?php if ( get_field( 'slogan_image', 'option' ) ) : ?>
                    <img class="slogan_image" src="<?php the_field( 'slogan_image', 'option' ); ?>" />
                <?php endif ?>

                <div class="site__data">
                    <div class="site__data_item number">
                        <?php if ( have_rows( 'footer_number', 'option' ) ) : ?>
                            <?php while ( have_rows( 'footer_number', 'option' ) ) : the_row(); ?>
                                <a href="tel:<?php the_sub_field( 'footer_number_link' ); ?>" class="title title-light"><?php the_sub_field( 'footer_number_text' ); ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <span class="call-back"><?= __('Звони браток, это бесплатно', 'korjik')?></span>
                    </div>
                </div>

                <div class="site__info">
                    <?php if ( have_rows( 'footer_info', 'option' ) ) : ?>
                        <?php while ( have_rows( 'footer_info', 'option' ) ) : the_row(); ?>
                            <div class="site__info_item">
                                <?php the_sub_field( 'footer_info' ); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="site__nav">
                    <div class="site__nav_menu">
                        <?php if (have_rows('menu', 'option')) : ?>
                            <?php while (have_rows('menu', 'option')) : the_row(); ?>
                                <?php
                                $menu_link = get_sub_field('menu_link');
                                $menu_link = !empty($menu_link) ? $menu_link : '#';
                                ?>
                                <div class="site__nav_menu_item">
                                    <a href="<?php echo esc_url($menu_link); ?>"><?php the_sub_field('menu_text'); ?></a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="site_developers">
<!--                        Дизайн сайта - <a href="https://artemshalyapin.com/" target="_blank">Artem Shalyapin</a>-->
                    </div>

                </div>

            </div>

        </div>
	</footer>
</div><!-- #page -->

<div class="we_closed">
    <div class="we_closed__content">
        <h4 class="tit"><?=__('Проголодался? Мы с удовольствием примем твой заказ в рабочее время.', 'korjik')?></h4>
        <h4 class="tit"><?=__('А пока рекомендуем оформить предзаказ, чтобы твоя пицца приехала быстрее!', 'korjik')?></h4>
        <div class="work_time"><?php the_field( 'work_time', 'option' ); ?></div>
        <div class="button we_closed_btn btn btn-outline btn-lg"><?=__('Сделать предзаказ', 'korjik')?></div>
    </div>
</div>

<!--<div class="we_closed" style="background:#000;">-->
<!--	<div class="we_closed__content">-->
<!--		<h4 class="tit" style="color: #3078d2">--><?//=__('Через ситуацію в країні ми на жаль не працюємо.', 'korjik')?><!--</h4>-->
<!--		<h4 class="tit" style="color: #ffda45">--><?//=__('Віримо у перемогу. Слава Україні!', 'korjik')?><!--</h4>-->
<!--	</div>-->
<!--</div>-->


<div class="overlay"></div>

<?php wp_footer(); ?>

</body>
</html>
