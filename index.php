<?php
/*
Plugin Name: Мои фильмы
Plugin URI: http://#
Description: Каталог моих любимых фильмов.
Version: 1.0
Author: Артем Аношин
Author URI: http://wpdev.webtm.ru/
*/

#-------------------------------------------------
# Добавим константы
#-------------------------------------------------
if ( ! defined( 'MYFILMS_BASE_FILE' ) )
    define( 'MYFILMS_BASE_FILE', __FILE__ );
if ( ! defined( 'MYFILMS_BASE_DIR' ) )
    define( 'MYFILMS_BASE_DIR', dirname( MYFILMS_BASE_FILE ) );
if ( ! defined( 'MYFILMS_PLUGIN_URL' ) )
    define( 'MYFILMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

#-------------------------------------------------
# Регистрируем тип поста и сразу к нему таксономии
#-------------------------------------------------
require_once 'post-types.php';

#----------------------------------------
# Подключаем метаполя для наших таксономий
#----------------------------------------
require_once 'meta-boxes.php';

#----------------------------------------
# Подключаем наши шаблоны
#----------------------------------------
require_once 'templates.php';

#----------------------------------------
# Подключаем демоданные
#----------------------------------------
require_once 'demo.php';

#----------------------------------------
# Создаем хуки для рекламы
#----------------------------------------
function myfilms_banner_top_default () {
   echo "<img src='" . MYFILMS_PLUGIN_URL . "/templates/img/banner.jpg' class='img-responsive'>";
}
add_action('myfilms_banner_top', 'myfilms_banner_top_default', 10);

function myfilms_banner_bottom_default () {
   echo "<img src='" . MYFILMS_PLUGIN_URL . "/templates/img/banner.jpg' class='img-responsive'>";
}
add_action('myfilms_banner_bottom', 'myfilms_banner_bottom_default', 10);

#--------------------------------------
# Установка плагина
#--------------------------------------
function myfilms_install () {

  myfilms_setup_post_type();

  myfilms_add_custom_box();

  myfilms_demo_install();

  # Обновляем ЧПУ
  flush_rewrite_rules();
}

#--------------------------------------
# Активация плагина
#--------------------------------------
register_activation_hook( __FILE__, 'myfilms_install' );
