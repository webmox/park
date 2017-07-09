<?php
function print_array($arr){
        echo "<pre>";
                print_r($arr);
        echo "</pre>";
}


require_once('include/custom-types.php');
require_once('include/options_theme.php');


function my_load_scripts(){
  wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.css');
  wp_enqueue_style('bootstrap.min', get_template_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style('magnific-popup', get_template_directory_uri().'/css/magnific-popup.css');
  wp_enqueue_style('owl.carousel', get_template_directory_uri().'/css/owl.carousel.css');
  wp_enqueue_style('owl.theme', get_template_directory_uri().'/css/owl.theme.css');
  wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.css');
  wp_enqueue_style('fancybox', get_template_directory_uri().'/css/jquery.fancybox.css');
  wp_enqueue_style('main', get_template_directory_uri().'/css/main.css');
  wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive.css');

  wp_enqueue_script('jquery-1.11', get_template_directory_uri().'/js/jquery-1.11.3.js');
  wp_enqueue_script('owl.carousel', get_template_directory_uri().'/js/owl.carousel.min.js');
  wp_enqueue_script('SmoothScroll', get_template_directory_uri().'/js/SmoothScroll.js');
  wp_enqueue_script('nicescroll', get_template_directory_uri().'/js/jquery.nicescroll.min.js');
  wp_enqueue_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js');
  wp_enqueue_script('mousewheel', get_template_directory_uri().'/js/jquery.mousewheel-3.0.6.pack.js');
  wp_enqueue_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox.js');
  wp_enqueue_script('wow-js', get_template_directory_uri().'/js/wow.min.js');
  wp_enqueue_script('myfunctions', get_template_directory_uri().'/js/functions.js');
}


add_action('wp_enqueue_scripts', 'my_load_scripts');

/*-----------добавляем поддержку миниатюр------------*/
add_theme_support('post-thumbnails');

/*----add thumbanil for categoryes---------*/
add_theme_support('category-thumbnails');

/*----регистрация меню в самом верху сайта---------*/
register_nav_menu('header-top-menu', 'top-menu');

/*----регистрация для футаре---------*/
register_nav_menu('menu-footer', 'footer-menu');


function add_custom_sizes() {
    add_image_size('img-slide', 1920, 580, true);
    add_image_size('excursion', 380, 340, true);
    add_image_size('icon-cat', 40, 40, true);
    add_image_size('news', 280, 180, true);
    add_image_size('gallery', 295, 295, true);
}

add_action('after_setup_theme','add_custom_sizes');

/*----------------------добавляем цитату для страниц---------------*/
function add_excerpt_page(){
    add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'add_excerpt_page');



/*-------------------------sidebar-------------------------------*/
register_sidebar(array(
        'name' => "Подписка",
        'id' => 'subscribe',
        'description' => 'Этот виджет создан для формы подписки',
        'class'=>'list-page',
        'before_title' => '<h2 class="title">',
        'after_title' => "</h2>\n",
        'before_widget' => '<div class="widget-block">',
        'after_widget' => "</div>")
);

/*-------------------------sidebar-------------------------------*/
register_sidebar(array(
        'name' => "Футер виджет 1",
        'id' => 'footer1',
        'description' => 'Этот виджет создан для формы подписки',
        'class'=>'list-page',
        'before_title' => '',
        'after_title' => "",
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => "</div>")
);


/*-------------------------sidebar-------------------------------*/
register_sidebar(array(
        'name' => "Футер виджет 2",
        'id' => 'footer2',
        'description' => 'Этот виджет создан для формы подписки',
        'class'=>'list-page',
        'before_title' => '',
        'after_title' => "",
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => "</div>")
);


/*-------------------------sidebar-------------------------------*/
register_sidebar(array(
        'name' => "Футер виджет 3",
        'id' => 'footer3',
        'description' => 'Этот виджет создан для формы подписки',
        'class'=>'list-page',
        'before_title' => '',
        'after_title' => "",
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => "</div>")
);



/*///////////обрезаем заголовки в верхнем слайдере//////////*/
function title_chars($count, $t) {
  $title = get_the_title();
  if (mb_strlen($title) > $count)
  $title = mb_substr($title,0,$count);
  else $t = ''; echo $title . $t;
}

/*//////////////////////////////////////////////*/
function limit_words($str, $limit)
{
  $words = explode(' ', $str, ($limit + 1));
  if(count($words) > $limit) {
  array_pop($words);
  return implode(' ', $words)."..."; } else {
  return implode(' ', $words); }
}



function remove_menus(){
  //remove_menu_page( 'index.php' );                  //Консоль
  //remove_menu_page( 'edit.php' );                   //Записи
  //remove_menu_page( 'upload.php' );                 //Медиафайлы
  //remove_menu_page( 'edit.php?post_type=page' );    //Страницы
  remove_menu_page( 'edit-comments.php' );          //Комментарии
  //remove_menu_page( 'themes.php' );                 //Внешний вид
  //remove_menu_page( 'plugins.php' );                //Плагины
  //remove_menu_page( 'users.php' );                  //Пользователи
  //remove_menu_page( 'tools.php' );                  //Инструменты
  //remove_menu_page( 'options-general.php' );        //Настройки
}
add_action( 'admin_menu', 'remove_menus' );


/*//////////////////////paginations////////////////////////*/

function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '«'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '»'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}


/*---------------------------size page-----------------*/
function pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if (is_tax('taxanimal')) {
        $query->set( 'posts_per_page', 4);
        return;
    }
}
add_action( 'pre_get_posts', 'pagesize', 4);



function pagesizeanimal( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if (is_tax('typeexcursion')) {
        $query->set( 'posts_per_page', 9);
        return;
    }
}
add_action( 'pre_get_posts', 'pagesizeanimal', 9); 

/*
function pagesizegallery( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if (is_page_template('gallery')) {
        $query->set( 'posts_per_page', 12);
        return;
    }
}
add_action( 'pre_get_posts', 'pagesizegallery', 12); 
*/

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2016.11.17
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '›'; // разделитель между "крошками"
  $sep_before = '<span class="sep">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = $post->post_parent;
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()




?>