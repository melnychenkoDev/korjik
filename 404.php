<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Korjik
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="not-found-content">
<!--                <img class="not-found-img" src="--><?//= get_template_directory_uri() ?><!--/images/static/404.png" alt="404 not found image" loading="lazy">-->
                <h2 class="tit-not-found">404</h2>
                <a href="<?= home_url() ?>" class="btn btn-outline btn-lg"><?=__('Вломить люлей и уйти на главную', 'korjik')?></a>
            </div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
