<?php

// Добавляем блоки в основную колонку на страницах постов и пост. страниц
add_action('add_meta_boxes', 'myfilms_add_custom_box');

function myfilms_add_custom_box(){
	$screens = array( 'films' );
	add_meta_box( 'myfilms_sectionid', 'Информация о фильме', 'myfilms_meta_box_callback', $screens );
}

// HTML код блока
function myfilms_meta_box_callback( $post, $meta ){
	$screens = $meta['args'];

  if(get_post_meta( $post->ID, 'cost', true )) {
    $cost = get_post_meta( $post->ID, 'cost', true );
  }else{
    $cost = "";
  }
  if(get_post_meta( $post->ID, 'release_date', true )) {
    $date = get_post_meta( $post->ID, 'release_date', true );
  }else{
    $date = "";
  }


	// Используем nonce для верификации
	wp_nonce_field( plugin_basename(__FILE__), 'myfilms_noncename' );

	// Поля формы для введения данных
	echo '<label class="label__metabox" for="myfilms_cost">' . __("Стоимость сеанса", 'myfilms_textdomain' ) . '</label> ';
	echo "<input type='text' id='myfilms_cost' name='myfilms_cost' value='" . $cost . "' size='25' />";
  echo '<br><br>';
  echo '<label class="label__metabox" for="myfilms_release_date">' . __("Дата выхода в прокат", 'myfilms_textdomain' ) . '</label> ';
	echo "<input type='text' id='myfilms_release_date' name='myfilms_release_date' value='" . $date . "' size='25' />";

  echo '
    <style>
      .label__metabox {
        display: inline-block;
        width: 150px;
      }
    </style>
  ';
}

// Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'myfilms_save_postdata' );

function myfilms_save_postdata( $post_id ) {

	// Убедимся что поле установлено.
	if ( ! isset( $_POST['myfilms_cost'] ) )
		return;

	// проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
	// if ( ! wp_verify_nonce( $_POST['myfilms_noncename'], plugin_basename(__FILE__) ) )
	// 	return;

	// если это автосохранение ничего не делаем
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	// проверяем права юзера
	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	// Все ОК. Теперь, нужно найти и сохранить данные
	// Очищаем значение поля input.
	$cost = sanitize_text_field( $_POST['myfilms_cost'] );
  $date = sanitize_text_field( $_POST['myfilms_release_date'] );

	// Обновляем данные в базе данных.
	update_post_meta( $post_id, 'cost', $cost );
  update_post_meta( $post_id, 'release_date', $date );
}
