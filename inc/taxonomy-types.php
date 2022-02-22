<?php
// Добавляем свойи типы постов


function register_custom_taxonomy_types(){

/*
	register_taxonomy('banners_place', 'banners' ,array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'                        => _x( 'Расположение', 'taxonomy general name' ),
			'singular_name'               => _x( 'place', 'taxonomy singular name' ),
			'search_items'                =>  __( 'Search Place' ),
			'popular_items'               => __( 'Popular Place' ),
			'all_items'                   => __( 'Все позиции' ),
			'parent_item'                 => null,
			'parent_item_colon'           => null,
			'edit_item'                   => __( 'Редактировать расположение' ),
			'update_item'                 => __( 'Обновить расположение' ),
			'add_new_item'                => __( 'Добавить новое расположение' ),
			'new_item_name'               => __( 'Новое название расположения' ),
			'separate_items_with_commas'  => __( 'Separate Place with commas' ),
			'add_or_remove_items'         => __( 'Add or remove Place' ),
			'choose_from_most_used'       => __( 'Choose from the most used Place' ),
			'menu_name'                   => __( 'Расположение' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
	));
*/

//	register_taxonomy('review_type', 'reviews' ,array(
//		'hierarchical'  => true,
//		'public'        => true,
//		'labels'        => array(
//			'name'                        => __( 'Виды отзывов', 'taxonomy singular name'),
//			'singular_name'               => _x( 'Review', 'taxonomy singular name' ),
//			'search_items'                => __( 'Отзыв', 'legrand'),
//			'popular_items'               => __( 'Popular Tags' ),
//			'all_items'                   => __( 'All Categories' ),
//			'parent_item'                 => null,
//			'parent_item_colon'           => null,
//			'edit_item'                   => __( 'Редактировать вид отзыва' ),
//			'update_item'                 => __( 'Обновить вид отзыва' ),
//			'add_new_item'                => __( 'Добавить новый вид отзыва' ),
//			'new_item_name'               => __( 'Новое название вида отзыва' ),
//			'separate_items_with_commas'  => __( 'Separate Place with commas' ),
//			'add_or_remove_items'         => __( 'Добавить или удалить вид отзыва' ),
//			'choose_from_most_used'       => __( 'Choose from the most used Place' ),
//			'menu_name'                   => __( 'Виды отзывов' ),
//		),
//		'show_ui'       => true,
//		'query_var'     => true,
////		'rewrite'       => array( 'slug' => 'categories' ), // свой слаг в URL
//	));

//	register_taxonomy('production_exclusive', 'production' ,array(
//		'hierarchical'  => true,
//		'public'        => true,
//		'labels'        => array(
//			'name'                        => __( 'Линейки', 'taxonomy singular name'),
//			'singular_name'               => _x( 'Линейка', 'taxonomy singular name' ),
//			'search_items'                => __( 'Линейка', 'gmz'),
//			'popular_items'               => __( 'Popular Tags' ),
//			'all_items'                   => __( 'Все линейки' ),
//			'parent_item'                 => null,
//			'parent_item_colon'           => null,
//			'edit_item'                   => __( 'Редактировать линейку' ),
//			'update_item'                 => __( 'Обновить линейку' ),
//			'add_new_item'                => __( 'Добавить новую линейку' ),
//			'new_item_name'               => __( 'Новое название линейки' ),
//			'separate_items_with_commas'  => __( 'Separate Place with commas' ),
//			'add_or_remove_items'         => __( 'Добавить или удалить линейку' ),
//			'choose_from_most_used'       => __( 'Choose from the most used Place' ),
//			'menu_name'                   => __( 'Линейки' ),
//		),
//		'show_ui'       => true,
//		'query_var'     => true,
//		'rewrite'       => array( 'slug' => 'exclusive' ), // свой слаг в URL
//	));

}

add_action( 'init', 'register_custom_taxonomy_types' );

