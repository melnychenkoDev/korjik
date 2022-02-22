<?php
// Добавляем свойи типы постов

function register_custom_post_types(){
    /*function get_taxonomy_args($labels){
        return array(
            'label'                 => '', // определяется параметром $labels->name
            'labels'                => $labels,
            'description'           => '', // описание таксономии
            'public'                => true,
            'publicly_queryable'    => null, // равен аргументу public
            'show_in_nav_menus'     => true, // равен аргументу public
            'show_ui'               => true, // равен аргументу public
            'show_tagcloud'         => true, // равен аргументу show_ui
            'hierarchical'          => true,
            'update_count_callback' => '',
            'rewrite'               => true,
            //'query_var'             => $taxonomy, // название параметра запроса
            'capabilities'          => array(),
            'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
            'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
            '_builtin'              => false,
            'show_in_quick_edit'    => null, // по умолчанию значение show_ui
        );
    }*/
//	register_post_type('reviews', array(
//		'labels' => array(
//			'name' => 'Отзывы',
//			'singular_name' => 'Отзыв',
//			'add_new' => 'Добавить отзыв',
//			'add_new_item' => 'Добавить новый отзыв',
//			'edit_item' => 'Редактировать отзыв',
//			'new_item' => 'Новый отзыв',
//			'all_items' => 'Все отзывы',
//			'search_items' => 'Поиск отзыва',
//			'menu_name' => 'Отзывы'
//		),
//		'public' => true,
////		'show_ui' => true,
//		'has_archive' => true,
//		'menu_icon' => 'dashicons-format-status',
//		'menu_position' => 7,
//		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions')
//	));
//
//	register_post_type('partners',
//		array(
//			'labels' => array(
//				'name' => 'Партнеры',
//				'singular_name' => 'Партнеры',
//				'add_new' => 'Добавить партнера',
//				'add_new_item' => 'Добавить нового партнера'
//			),
//			'public' => true,
//			'supports' => array('title', 'editor', 'thumbnail'),
//			'has_archive' => true,
////			'rewrite' => array('slug' => 'production'),
////			'taxonomies' => array('production_category', 'production_exclusive'),
//			'menu_icon' => 'dashicons-groups'
//		)
//	);

//	register_post_type('workers',
//		array(
//			'labels' => array(
//				'name' => 'Сотрудники',
//				'singular_name' => 'Сотрудники',
//				'add_new' => 'Добавить сотрудника',
//				'add_new_item' => 'Добавить нового сотрудника'
//			),
//			'public' => true,
//			'supports' => array('title', 'editor', 'thumbnail'),
//			'has_archive' => true,
//			'rewrite' => array('slug' => 'services-items'),
//			'taxonomies' => array('category', 'post_tag'),
//			'menu_icon' => 'dashicons-admin-users'
//		)
//	);

	register_post_type('news',
		array(
			'labels' => array(
				'name' => __('Новости'),
				'singular_name' => __('Новости'),
				'add_new' => 'Добавить новость',
				'add_new_item' => 'Добавить новую новость'
			),
			'public' => true,
			'show_in_rest' => false,
			'supports' => array('title', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'news'),
			'taxonomies' => array('category', 'post_tag'),
			'menu_icon' => 'dashicons-feedback'
		)
	);


    /* ТАКСОНОМИИ */
    // заголовки
    /*$case_type_labels = array(
        'name'              => 'Типы проектов',
        'singular_name'     => 'Тип проекта',
        'search_items'      => 'Искать типы проектов',
        'all_items'         => 'Все типы проектов',
        'parent_item'       => 'Родительский тип проекта',
        'parent_item_colon' => 'Родительский тип проекта:',
        'edit_item'         => 'Изменить тип проекта',
        'update_item'       => 'Изменить тип проекта',
        'add_new_item'      => 'Добавить тип проекта',
        'new_item_name'     => 'Новый тип проекта',
        'menu_name'         => 'Типы проектов',
        'not_found'         => 'Типов проектов не найдено',
    );
    register_taxonomy('project-type', '', get_taxonomy_args($case_type_labels) );*/

    /*register_post_type('workers',
        array(
            'labels' => array(
                'name' => 'Сотрудники',
                'singular_name' => 'Сотрудники',
                'add_new' => 'Добавить сотрудника',
                'add_new_item' => 'Добавить нового сотрудника'
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            //'rewrite' => array('slug' => 'services-items'),
            'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-groups'
        )
    );*/

    //remove_post_type_support( 'page', 'editor' );

}

add_action( 'init', 'register_custom_post_types' );
