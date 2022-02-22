<?php

get_header();
?>

    <section class="page">
        <div class="container container-lg">
<!--			<h2 class="title-sm" style="margin-bottom: 30px"><span style="color: #FE7718;">Сейчас проходит акция!</span> Доставляем везде по Одессе кроме (<span style="text-decoration: underline;">Поселка</span>)</h2>-->
            <div class="page__content">

                <div class="page__content_left">
                    <div class="media">
                        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=14F0QLR3COk8t87e6n_qvm_vA_SrsJ9Ai&usp=sharing"
                                width="640" height="480"></iframe>
                    </div>
                </div>
                <div class="page__content_right">
                    <div class="description__block">
                        <?php if (function_exists('rank_math_the_breadcrumbs')) : ?>
                            <div class="breadcrumbs__wrapper">
                                <?php rank_math_the_breadcrumbs(); ?>
                            </div>
                        <? endif; ?>

                        <div class="title title-page"><?= get_the_title() ?></div>

                        <div class="content">
                            <?= the_content() ?>


                            <?php if (have_rows('delivery_zone')) : ?>
                                <div class="info__list">
                                    <?php while (have_rows('delivery_zone')) : the_row(); ?>
                                        <div class="info__list_item">
                                            <?php if (get_sub_field('delivery_zone_icon')) : ?>
                                                <img src="<?php the_sub_field('delivery_zone_icon'); ?>"/>
                                            <?php endif ?>
                                            <div class="info__list_item-main">
                                                <h3 class="tit"><?php the_sub_field('delivery_zone_tit'); ?></h3>
                                                <p class="text"><?php the_sub_field('delivery_zone_desc'); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <?php if (get_field('pay_text')) : ?>
                            <div class="pay_text">
                                <?php the_field('pay_text'); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer();
?>