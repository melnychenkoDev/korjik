<?php

get_header();
?>

    <section class="page">
        <div class="container container-lg">
            <div class="page__content">
                <div class="page__content_left">
                    <div class="media">
                        <img src="<?php the_field( 'media' ); ?>" width="100%" height="100%" alt="korjik gif" loading="lazy">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer();
?>