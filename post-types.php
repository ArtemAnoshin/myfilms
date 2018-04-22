<?php

function myfilms_setup_post_type () {

  register_post_type('films', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Фильмы', // основное название для типа записи
      'singular_name'      => 'Фильм', // название для одной записи этого типа
      'add_new'            => 'Добавить фильм', // для добавления новой записи
      'add_new_item'       => 'Добавление фильма', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование фильма', // для редактирования типа записи
      'new_item'           => 'Новый фильм', // текст новой записи
      'view_item'          => 'Смотреть фильм', // для просмотра записи этого типа.
      'search_items'       => 'Искать фильм', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Фильмы', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_ui'             => true,
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'menu_position'       => 8,
    'menu_icon'           => 'dashicons-format-video',
    'hierarchical'        => false,
    'supports'            => array('title','editor', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array('genres', 'countries', 'years', 'artists'),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_taxonomy('genres', array('films'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Жанры',
			'singular_name'     => 'Жанр',
			'search_items'      => 'Поиск жанра',
			'all_items'         => 'Все жанры',
			'view_item '        => 'Смотреть жанр',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать жанр',
			'update_item'       => 'Обновить жанр',
			'add_new_item'      => 'Добавить жанр',
			'new_item_name'     => 'Новый жанр',
			'menu_name'         => 'Жанры',
		),
    'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => true, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );

  register_taxonomy('countries', array('films'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Страны',
			'singular_name'     => 'Страна',
			'search_items'      => 'Поиск страны',
			'all_items'         => 'Все страны',
			'view_item '        => 'Смотреть страну',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать страну',
			'update_item'       => 'Обновить страну',
			'add_new_item'      => 'Добавить страну',
			'new_item_name'     => 'Новая страна',
			'menu_name'         => 'Страны',
		),
    'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => true, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );

  register_taxonomy('years', array('films'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Года',
			'singular_name'     => 'Год',
			'search_items'      => 'Поиск года',
			'all_items'         => 'Все года',
			'view_item '        => 'Смотреть год',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать год',
			'update_item'       => 'Обновить год',
			'add_new_item'      => 'Добавить год',
			'new_item_name'     => 'Новый год',
			'menu_name'         => 'Года',
		),
    'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => true, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );

  register_taxonomy('artists', array('films'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Артисты',
			'singular_name'     => 'Артист',
			'search_items'      => 'Поиск артиста',
			'all_items'         => 'Все артисты',
			'view_item '        => 'Смотреть артиста',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать артиста',
			'update_item'       => 'Обновить артиста',
			'add_new_item'      => 'Добавить артиста',
			'new_item_name'     => 'Новый артист',
			'menu_name'         => 'Артисты',
		),
    'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => true, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}

add_action('init', 'myfilms_setup_post_type');
