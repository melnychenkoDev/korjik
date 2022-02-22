<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Korjik
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function korjik_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'korjik_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function korjik_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'korjik_pingback_header' );

/*
 * Убираем лишние символы в номере
 */
function clear_phone($phone){
    return str_replace(array('-', ' ', '(', ')'), '', $phone);
}


function my_site_custom_languages_selector_template()
{
    if (function_exists('wpm_get_languages')) {
        $languages = wpm_get_languages();
        $current = wpm_get_language();

        $out = '<ul class="lang-switcher">';

        foreach ($languages as $code => $language) {
            $toggle_url = esc_url(wpm_translate_current_url($code));
            $css_classes = '';

            $css_style = 'text-transform: uppercase; font-size: 14px; font-weight: 600;';

            if ($code === $current) {
                $css_classes .= 'active';
                $css_style .= 'color: #FF6900;';
            } else {
                $css_style .= 'color: #4F4F4F;';
            }

            $out .= '<li><a href="' . $toggle_url . '" style="' . $css_style . '" class="' . $css_classes . '" data-lang="' . esc_attr($code) . '">';
            $out .= $code;
            $out .= '</a></li>';
//      $out .= '&nbsp;';
        }

        $out .= '</ul><div class="arrow-after-box pointer"></div>';

        return $out;
    }
}