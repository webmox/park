<?php 

add_action('init', 'register_post_slider');

function register_post_slider(){
    register_post_type('slider', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Слайдер', // основное название для типа записи
            'singular_name'      => 'Слайдер', // название для одной записи этого типа 
            'add_new'            => 'Добавить слайд', // для добавления новой записи
            'add_new_item'       => 'Добавление слада', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
            'new_item'           => 'Новый слайда', // текст новой записи
            'view_item'          => 'Смотреть слайда', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайд', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Слайды', // название меню 
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true, 
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-image', 
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail','excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}


/*//////////////////////////////////////////////////////
//////////////////////////////////////////////////////*/


add_action('init', 'register_post_excursion');

function register_post_excursion(){
    register_post_type('excursion', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Экскурсии', // основное название для типа записи
            'singular_name'      => 'Экскурсии', // название для одной записи этого типа 
            'add_new'            => 'Добавить экскурсию', // для добавления новой записи
            'add_new_item'       => 'Добавление экскурсии', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование экскурсии', // для редактирования типа записи
            'new_item'           => 'Новый экскурсия', // текст новой записи
            'view_item'          => 'Смотреть экскурсию', // для просмотра записи этого типа.
            'search_items'       => 'Искать экскурсию', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Экскурсии', // название меню 
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true, 
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-palmtree', 
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title', 'editor',  'thumbnail','excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array('typeexcursion'),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}




// хук для регистрации
add_action('init', 'create_taxonomy_excursion');

function create_taxonomy_excursion(){
    // заголовки
    $labels = array(
        'name'              => 'Виды экскурсий',
        'singular_name'     => 'Виды экскурсий',
        'search_items'      => 'Искать вид',
        'all_items'         => 'Все виды',
        'parent_item'       => 'Родительский вид',
        'parent_item_colon' => 'Родительский вид:',
        'edit_item'         => 'Редактировать вид',
        'update_item'       => 'Обновить вид',
        'add_new_item'      => 'Добавить вид',
        'new_item_name'     => 'Новое имя вида',
        'menu_name'         => 'Виды экскурсий',
    ); 
    // параметры
    $args = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => $labels,
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => pulic, // равен аргументу public
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

    register_taxonomy('typeexcursion', array('excursion'), $args );
}



/*//////////////////////////////////////////////////////
//////////////////////////////////////////////////////*/

add_action('init', 'register_post_animal');

function register_post_animal(){
    register_post_type('animal', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Питомцы', // основное название для типа записи
            'singular_name'      => 'Питомцы', // название для одной записи этого типа 
            'add_new'            => 'Добавить питомца', // для добавления новой записи
            'add_new_item'       => 'Добавление питомца', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование питомца', // для редактирования типа записи
            'new_item'           => 'Новый питомцец', // текст новой записи
            'view_item'          => 'Смотреть питомца', // для просмотра записи этого типа.
            'search_items'       => 'Искать питомца', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Питомцы', // название меню 
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true, 
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-feedback', 
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title', 'editor',  'thumbnail','excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array('taxanimal'),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}


// хук для регистрации
add_action('init', 'create_taxonomy_animal');

function create_taxonomy_animal(){
    // заголовки
    $labels = array(
        'name'              => 'Категории',
        'singular_name'     => 'Категори',
        'search_items'      => 'Искать категорию',
        'all_items'         => 'Все категории',
        'parent_item'       => 'Родительская категория',
        'parent_item_colon' => 'Родительская категория:',
        'edit_item'         => 'Редактировать категорию',
        'update_item'       => 'Обновить категорию',
        'add_new_item'      => 'Добавить категорию',
        'new_item_name'     => 'Новое имя категории',
        'menu_name'         => 'Категории',
    ); 
    // параметры
    $args = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => $labels,
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => pulic, // равен аргументу public
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

    register_taxonomy('taxanimal', array('animal'), $args );
}

add_action('init', 'register_post_gallery');

function register_post_gallery(){
    register_post_type('gallery', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Галерея', // основное название для типа записи
            'singular_name'      => 'Галерея', // название для одной записи этого типа 
            'add_new'            => 'Добавить изображение', // для добавления новой записи
            'add_new_item'       => 'Добавление изображения', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование изображения', // для редактирования типа записи
            'new_item'           => 'Новое изображение', // текст новой записи
            'view_item'          => 'Смотреть изображение', // для просмотра записи этого типа.
            'search_items'       => 'Искать изображение', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Галерея', // название меню 
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true, 
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-images-alt2', 
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}


?>