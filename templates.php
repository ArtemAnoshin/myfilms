<?php
//Фильтруем шаблон

function myfilms_template_chooser( $template ) {

    //get post ID
    $post_id = get_the_ID();

    if ( get_post_type( $post_id ) != 'films' ) {
        return $template;
    }

    //Если страница single нашего плагина, то подключаем шаблон
    if ( is_single() ) {
        return myfilms_template_hierarchy( 'single-films' );
    }

    //Если страница archive нашего плагина, то подключаем шаблон
    if ( is_archive() ) {
        return myfilms_template_hierarchy( 'archive-films' );
    }

}

//--------------------------------------
// Проверяем, есть ли такой файл в дочерней
// или основной теме, если нет, то добавляем
// наш файл из папки плагина
//--------------------------------------

function myfilms_template_hierarchy( $template ) {

    $template_slug = rtrim( $template, '.php' );
    $template = $template_slug . '.php';

    // Check if a custom template exists in the theme folder, if not, load the plugin template file
    if ( $theme_file = locate_template( array( $template ) ) ) {
        $file = $theme_file;
    }
    else {
        $file = MYFILMS_BASE_DIR . '/templates/' . $template;
    }

    return $file;
}

add_filter( 'template_include', 'myfilms_template_chooser' );

#------------------------------------------------
# Подключаем свой файл стилей
#------------------------------------------------

if ( ! function_exists( 'myfilms_styles' ) ) :
/**
 * Enqueue scripts and styles.
 */
function myfilms_styles() {

	wp_enqueue_style( 'myfilms-styles', plugins_url() . '/myfilms/templates/css/style.css' );

}
endif;

add_action( 'wp_enqueue_scripts', 'myfilms_styles' );
