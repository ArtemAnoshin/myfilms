<?php

function myfilms_demo_install () {

  //Добавили постов при активации плагина
  $post_data_1  = array(
  	'post_content'   => 'От лица главного героя Форреста Гампа, слабоумного безобидного человека
                          с благородным и открытым сердцем, рассказывается история его необыкновенной жизни.
                          Фантастическим образом превращается он в известного футболиста, героя войны, преуспевающего
                          бизнесмена. Он становится миллиардером, но остается таким же бесхитростным, глупым и добрым.
                          Форреста ждет постоянный успех во всем, а он любит девочку, с которой дружил в детстве, но
                          взаимность приходит слишком поздно. ',
  	'post_title'     => 'Форест Гамп',
    'post_status'    => 'publish',
  	'post_type'      => 'films',
  	'tax_input'      => array( 'genres', 'countries', 'years', 'artists' ),
  	'meta_input'     => array( 'cost'=>'10 руб.', 'release_date' => '01.01.2015' ),
  );

  $post_data_2  = array(
  	'post_content'   => 'Василий Кузякин, работник леспромхоза, увлекающийся разведением голубей, живёт с женой Надеждой
                          и тремя детьми: Людой, вернувшейся обратно из города после расставания с мужем, весёлым парнем
                          Лёнькой, любителем техники, и Олей, любимицей отца. Надежда считает мужа шалопаем и баламутом.
                          По соседству с Кузякиными живут баба Шура и дядя Митя, в чьей семье тоже постоянный конфликт.
                          Дед любит выпить, но жена пытается держать его в ежовых рукавицах. Дядя Митя использует все,
                          иногда самые невероятные, возможности, чтобы выпить тайком от строгой жены (например, пытаясь
                          устроить по ней импровизированные поминки, хотя она не умерла).',
  	'post_title'     => 'Любовь и голуби',
    'post_status'    => 'publish',
  	'post_type'      => 'films',
  	'tax_input'      => array( 'genres', 'countries', 'years', 'artists' ),
  	'meta_input'     => array( 'cost'=>'20 руб.', 'release_date' => '02.02.2016' ),
  );

  $post_data_3  = array(
  	'post_content'   => 'Сара — пожилая вдова, живущая в одиночестве в квартире на Брайтон-Бич (Бруклин). Она проводит
                          много времени перед телевизором. Особенно ей нравится рекламное шоу, посвящённое «победам»
                          людей над своим аппетитом (диета, отказ от мяса, сахара). Сама Сара потребляет много шоколада и
                          другой калорийной пищи.
                          Гари, её сын, иногда появляется в её доме, чтобы унести и продать старьёвщику телевизор, а на
                          вырученные деньги купить наркотики. Всякий раз Сара выкупает телевизор обратно.',
  	'post_title'     => 'Реквием по мечте',
    'post_status'    => 'publish',
  	'post_type'      => 'films',
  	'tax_input'      => array( 'genres', 'countries', 'years', 'artists' ),
  	'meta_input'     => array( 'cost'=>'30 руб.', 'release_date' => '03.03.2017' ),
  );

  $post_data_4  = array(
  	'post_content'   => 'Во время своего первого задания наёмный убийца Рэй (Колин Фаррелл) случайно убивает мальчика.
                          Из-за этого нервный и постоянно сквернословящий босс Гарри (Рэйф Файнс) срочно отсылает
                          Рэя вместе с его старшим коллегой Кеном (Брендан Глисон) в Брюгге и велит там дожидаться
                          дальнейших инструкций. Кен с интересом знакомится со средневековым городом, Рэя же гложет
                          чувство вины из-за ребёнка. Вечером, Рэй забрёл на съёмки фильма с актёром-коротышкой Джимми
                          (Джордан Прентис) и у него начинается знакомство с Хлоей (Клеманс Поэзи), местной распространительницей
                          наркотиков. На следующий вечер, в момент любовного свидания его пытается ограбить Эйрик,
                          прежний приятель Хлои, промышляющий ограблениями туристов. Рэй разоружает и ранит его в глаз.',
  	'post_title'     => 'Залечь на дно в Брюгге',
    'post_status'    => 'publish',
  	'post_type'      => 'films',
  	'tax_input'      => array( 'genres', 'countries', 'years', 'artists' ),
  	'meta_input'     => array( 'cost'=>'40 руб.', 'release_date' => '04.04.2018' ),
  );

  $post_data_5  = array(
  	'post_content'   => 'Когда главная героиня находит таинственное письмо, запрятанное с пятидесятых годов в ее купленном
                        гоночном родстере, у нее возникает куча вопросов. Она отправляется на поиски ответов в страшное и опасное путешествие…',
  	'post_title'     => 'Двойка пик',
    'post_status'    => 'publish',
  	'post_type'      => 'films',
  	'tax_input'      => array( 'genres', 'countries', 'years', 'artists' ),
  	'meta_input'     => array( 'cost'=>'50 руб.', 'release_date' => '05.05.2014' ),
  );



  $post_1 = wp_insert_post( $post_data_1 );
  $post_2 = wp_insert_post( $post_data_2 );
  $post_3 = wp_insert_post( $post_data_3 );
  $post_4 = wp_insert_post( $post_data_4 );
  $post_5 = wp_insert_post( $post_data_5 );

  //Добавим терминов в таксономии
  wp_set_object_terms( $post_1, 'Комедия', 'genres', false );
  wp_set_object_terms( $post_2, 'Боевик', 'genres', false );
  wp_set_object_terms( $post_3, 'Ужасы', 'genres', false );
  wp_set_object_terms( $post_4, 'Мелодрама', 'genres', false );
  wp_set_object_terms( $post_5, 'Исторический', 'genres', false );

  wp_set_object_terms( $post_1, 'Россия', 'countries', false );
  wp_set_object_terms( $post_2, 'Китай', 'countries', false );
  wp_set_object_terms( $post_3, 'США', 'countries', false );
  wp_set_object_terms( $post_4, 'Великобритания', 'countries', false );
  wp_set_object_terms( $post_5, 'Франция', 'countries', false );

  wp_set_object_terms( $post_1, '1980', 'years', false );
  wp_set_object_terms( $post_2, '1981', 'years', false );
  wp_set_object_terms( $post_3, '1982', 'years', false );
  wp_set_object_terms( $post_4, '1983', 'years', false );
  wp_set_object_terms( $post_5, '1984', 'years', false );

  wp_set_object_terms( $post_1, 'Брэд Питт', 'artists', false );
  wp_set_object_terms( $post_2, 'Майкл Дудикоф', 'artists', false );
  wp_set_object_terms( $post_3, 'Джеймс Белуши', 'artists', false );
  wp_set_object_terms( $post_4, 'Вуди Аллен', 'artists', false );
  wp_set_object_terms( $post_5, 'Андрей Кончаловский', 'artists', false );

}
