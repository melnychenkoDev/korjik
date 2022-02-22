<?php

get_header();
?>

    <section class="page">
        <div class="container container-lg">
            <div class="page__content">
                <div class="page__content_left">
                    <div class="media">
                        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1LWNXFitGtRQlPYYPF7ZT4EX7nQxA_kF8"  width="100%" height="700""></iframe>
                    </div>
                </div>
                <div class="page__content_right">
                    <div class="description__block">
                        <?php if (function_exists('rank_math_the_breadcrumbs')) : ?>
                            <div class="breadcrumbs__wrapper">
                                <?php rank_math_the_breadcrumbs(); ?>
                            </div>
                        <? endif; ?>

                        <div class="title title-page"><?=get_the_title()?></div>

                        <div class="content">
                            <?=the_content()?>

                            <ul class="info__list">
                                <?php if ( have_rows( 'contact' ) ) : ?>
                                    <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
                                        <li class="info__list_item">
                                            <?php if ( get_sub_field( 'contact_icon' ) ) : ?>
                                                <img src="<?php the_sub_field( 'contact_icon' ); ?>" />
                                            <?php endif ?>
                                            <?php if ( get_sub_field( 'contact_link' ) ) : ?>
                                                <a href="<?php the_sub_field( 'contact_link' ); ?>" ><?php the_sub_field( 'contact_text' ); ?></a>
                                            <?php else: ?>
                                                <?php the_sub_field( 'contact_text' ); ?>
                                            <?php endif ?>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer();
?>