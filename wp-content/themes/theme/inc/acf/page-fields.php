<?php
/**
 * ACF fields for internal pages.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_register_page_acf_fields' ) ) {
  /**
   * Register ACF groups for internal pages.
   *
   * @return void
   */
  function theme_register_page_acf_fields(): void {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
      return;
    }

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_about_us_page',
        'title'  => 'О нас',
        'fields' => array(
          array(
            'key'   => 'field_theme_about_us_tab_hero',
            'label' => 'Hero',
            'type'  => 'tab',
          ),
          array(
            'key'   => 'field_theme_about_us_group_hero',
            'label' => 'Блок Hero',
            'name'  => 'about_us_hero',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_about_us_hero_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text' ),
              array( 'key' => 'field_theme_about_us_hero_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_about_us_hero_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_about_us_hero_point_1', 'label' => 'Преимущество 1', 'name' => 'point_1', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_about_us_hero_point_2', 'label' => 'Преимущество 2', 'name' => 'point_2', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_about_us_hero_point_3', 'label' => 'Преимущество 3', 'name' => 'point_3', 'type' => 'text', 'wrapper' => array( 'width' => '34' ) ),
              array( 'key' => 'field_theme_about_us_hero_main_image', 'label' => 'Главное изображение', 'name' => 'main_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
              array( 'key' => 'field_theme_about_us_hero_top_image', 'label' => 'Верхнее изображение', 'name' => 'top_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_about_us_hero_bottom_image', 'label' => 'Нижнее изображение', 'name' => 'bottom_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
            ),
          ),
          array(
            'key'   => 'field_theme_about_us_tab_overview',
            'label' => 'Обзор',
            'type'  => 'tab',
          ),
          array(
            'key'   => 'field_theme_about_us_group_overview',
            'label' => 'Блок Обзор',
            'name'  => 'about_us_overview',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_about_us_stat_1_value', 'label' => 'Статистика 1: значение', 'name' => 'stat_1_value', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_about_us_stat_1_text', 'label' => 'Статистика 1: текст', 'name' => 'stat_1_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_about_us_stat_2_value', 'label' => 'Статистика 2: значение', 'name' => 'stat_2_value', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_about_us_stat_2_text', 'label' => 'Статистика 2: текст', 'name' => 'stat_2_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_about_us_stat_3_value', 'label' => 'Статистика 3: значение', 'name' => 'stat_3_value', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_about_us_stat_3_text', 'label' => 'Статистика 3: текст', 'name' => 'stat_3_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_about_us_story_title', 'label' => 'Заголовок блока', 'name' => 'story_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_about_us_story_text_1', 'label' => 'Текст 1', 'name' => 'story_text_1', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_about_us_story_text_2', 'label' => 'Текст 2', 'name' => 'story_text_2', 'type' => 'textarea', 'rows' => 3 ),
              array( 'key' => 'field_theme_about_us_story_image', 'label' => 'Изображение блока', 'name' => 'story_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/about-us.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    $contacts_intro_fields = array(
      array( 'key' => 'field_theme_contacts_intro_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text' ),
      array( 'key' => 'field_theme_contacts_intro_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
      array( 'key' => 'field_theme_contacts_intro_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4 ),
    );
    for ( $index = 1; $index <= 3; $index++ ) {
      $contacts_intro_fields[] = array( 'key' => 'field_theme_contacts_card_' . $index . '_label', 'label' => 'Карточка ' . $index . ': label', 'name' => 'card_' . $index . '_label', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) );

      if ( 2 === $index ) {
        $contacts_intro_fields[] = array( 'key' => 'field_theme_contacts_card_' . $index . '_value', 'label' => 'Карточка ' . $index . ': value', 'name' => 'card_' . $index . '_value', 'type' => 'text' );
      }

      $contacts_intro_fields[] = array( 'key' => 'field_theme_contacts_card_' . $index . '_text', 'label' => 'Карточка ' . $index . ': текст', 'name' => 'card_' . $index . '_text', 'type' => 'textarea', 'rows' => 3 );
    }

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_contacts_page',
        'title'  => 'Контакты',
        'fields' => array(
          array( 'key' => 'field_theme_contacts_tab_intro', 'label' => 'Intro', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_contacts_group_intro',
            'label' => 'Блок Intro',
            'name'  => 'contacts_intro',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => $contacts_intro_fields,
          ),
          array( 'key' => 'field_theme_contacts_tab_connect', 'label' => 'Связь', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_contacts_group_connect',
            'label' => 'Блок Связь',
            'name'  => 'contacts_connect',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_contacts_schedule_title', 'label' => 'Заголовок графика', 'name' => 'schedule_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_contacts_schedule_text', 'label' => 'Текст графика', 'name' => 'schedule_text', 'type' => 'textarea', 'rows' => 6 ),
              array( 'key' => 'field_theme_contacts_name_label', 'label' => 'Поле "Имя": label', 'name' => 'name_label', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_contacts_name_placeholder', 'label' => 'Поле "Имя": placeholder', 'name' => 'name_placeholder', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_contacts_phone_label', 'label' => 'Поле "Телефон": label', 'name' => 'phone_label', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_contacts_phone_placeholder', 'label' => 'Поле "Телефон": placeholder', 'name' => 'phone_placeholder', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_contacts_comment_label', 'label' => 'Поле "Комментарий": label', 'name' => 'comment_label', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_contacts_comment_placeholder', 'label' => 'Поле "Комментарий": placeholder', 'name' => 'comment_placeholder', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_contacts_submit_text', 'label' => 'Текст кнопки', 'name' => 'submit_text', 'type' => 'text' ),
              array( 'key' => 'field_theme_contacts_note', 'label' => 'Текст под формой', 'name' => 'note', 'type' => 'textarea', 'rows' => 3 ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/contacts.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    $prices_default_design_rows = <<<'ROWS'
# Визитки
Визитка односторонняя (90х50 мм, 4+0)|900|1 200|1 500
Визитка двусторонняя (90х50 мм, 4+4)|1 000|1 300|1 600
Правка макета визитки (адрес, телефон, имя фамилия)|500||
# Элементы фирменного стиля
Логотип. Разработка|10 000|15 000|25 000
Логотип. Отрисовка, восстановление (со скана, с фото) в векторный формат eps, ai, cdr|1 300|1 500|1 700
Фирменный бланк|900|1 200|1 500
Конверт стандартный (С4, С5, С65, Е65)|600|800|1 000
Пакет, часы, ручка, флешка, значок, магнит, кружка|900|1 200|1 500
Эскиз печати организации|600|800|900
Дисконтная карточка (86х54 мм), 4+4|1 200|1 500|1 900
Наклейка, бирка, ярлык, этикетка|600|800|900
Фирменный стиль (рассчитывается по выбранным стилеобразующим позициям)|рассчитывается индивидуально||
# Листовки
Листовка А5 одностороняя, 4+0|1 000|1 200|1 400
Листовка А5 двустороняя, 4+4|1 300|1 500|1 800
Листовка А4 одностороняя, 4+0|1 500|1 800|2 000
Листовка А4 двустороняя, 4+4|2 200|2 500|2 800
Плакат А3/А2 односторонний, 4+0|2 000|2 500|3 000
# Буклеты
Евробуклет А3-А4, 4+4, 2 фальца|2 500|3 500|4 500
Буклет А5/А4, 4+4, 1 фальц|1 500|2 000|2 500
# Каталоги/меню
Каталоги/меню. Обложка и шаблоны страниц (концепция)|2 000|3 500|5 000
Каталоги/меню. Верстка одной страницы|800|900|1 200
# Наружная реклама
Вывеска «режим работы»|800|900|1 100
Правка макета таблички, вывески «режим работы»|300||
Световые буквы|800|1 600|2 400
Штендер|900|1 200|1 900
Брендирование транспорта|2 000|3 000|4 000
Роллап|1 500|2 000|2 500
Уголок покупателя|1 000|1 500|2 000
Кабинетная табличка|800|1 000|1 100
# Дополнительные услуги
Внесение небольших изменений в готовые макеты|100||
Отрисовка схем (схемы проезда)|800|900|1 200
Обработка фотографии (для каталога, меню) / шт.|300||
Дизайн и вёрстка макета в присутствии заказчика / час|2 500||
Набор текста (1 000 знаков, без таблиц)|500||
Ретушь, цветокоррекция, замена фона|800|900|1 200
Коллажирование и фотомонтаж|1 500|2 200|3 000
Привязать макет к объекту, фасаду (визуализация)|300|500|800
Изменение макета под формат|300|500|800
# Дополнительно к стоимости
Срочность (в течение рабочего дня)|+ 25%||
При заказе разработки дизайна мы предоставляем клиенту 1 вариант макета. Каждый новый вариант макета стоит 25% от его первоначальной стоимости.|+ 25%||
Первая корректировка макета (она может содержать множество исправлений макета за один раз) — БЕСПЛАТНАЯ, каждая последующая правка, влияющая на композицию макета стоит по 500 р. Незначительные изменения текста или цвета делаются бесплатно, если они не меняют расположение элементов в макете.|500||
ROWS;

    $prices_default_outdoor_rows = <<<'ROWS'
Объемные световые буквы|от 90 руб/см высоты
Объемные несветовые буквы|от 60 руб/см высоты
Плоские буквы (ПВХ, акрил, АКП)|от 25 руб/см высоты
Световой короб|от 13 000 руб кв. м.
Панель кронштейн с внутренним подсветом|от 8 500 руб
Панель-кронштейн без подсвета|от 5 000 руб
Баннер|от 650 руб кв. м.
Табличка (ПВХ, АКП, акрил)|от 200 руб
Широкоформатная печать (бумага, самоклеящаяся пленка, холст, винил)|от 450 руб кв.м.
ROWS;

    $prices_default_polygraphy_rows = <<<'ROWS'
# Визитки
Визитка односторонняя (90х50 мм, 4+0), тираж 100 шт|1 500
Визитка двусторонняя (90х50 мм, 4+4), тираж 100 шт|2 100
# Флаеры
Флаер односторонний А6, 4+0, бумага меловка, тираж 100 шт|2 200
Флаер двухсторонний А6, 4+4, бумага меловка, тираж 100 шт|2 500
Флаер односторонний А5, 4+0, бумага меловка, тираж 100 шт|4 100
Флаер двухсторонний А5, 4+4, бумага меловка, тираж 100 шт|4 800
# Буклеты
Буклет-книжка односторонний А4 4+0, бумага меловка, тираж 100 шт|8 400
Буклет-книжка двухсторонний А4 4+4, бумага меловка, тираж 100 шт|9 400
Евробуклет с двумя фальцами односторонний 4+0, бумага меловка, тираж 100 шт|8 400
Евробуклет с двумя фальцами двухсторонний 4+4, бумага меловка, тираж 100 шт|9 800
ROWS;

    $prices_default_terms = <<<'TERMS'
Внимательно проверить макет на наличие орфографических, пунктуационных и иных ошибок;
Внимательно сверить номера телефонов, название фирмы, адреса, e-mail, адреса сайта, ссылок на соц. сети и т.д.;
Внимательно проверить размеры макета в названии файла;
Перед печатью тиража или на материале большого формата необходимо сделать цветопробу и удостовериться в том, что цвета и качество печати удовлетворяют ваши пожелания;
Согласование макета возможно по e-mail, для этого требуется переслать отправленное письмо с прикреплённым итоговым макетом и написать, что макет согласован или утверждён в печать.
TERMS;

    $prices_table_fields = array(
      array( 'key' => 'field_theme_prices_pdf_button_text', 'label' => 'Кнопка PDF: текст', 'name' => 'pdf_button_text', 'type' => 'text', 'default_value' => 'Скачать прайс-лист в формате PDF', 'wrapper' => array( 'width' => '50' ) ),
      array( 'key' => 'field_theme_prices_pdf_url', 'label' => 'Кнопка PDF: ссылка', 'name' => 'pdf_url', 'type' => 'url', 'default_value' => 'https://ra-pingvin.ru/wp-content/uploads/2024/12/aktualnyj-prajs.pdf', 'wrapper' => array( 'width' => '50' ) ),
      array( 'key' => 'field_theme_prices_design_title', 'label' => 'Дизайн: заголовок', 'name' => 'design_title', 'type' => 'text', 'default_value' => 'Дизайн' ),
      array( 'key' => 'field_theme_prices_design_head_name', 'label' => 'Дизайн: колонка 1', 'name' => 'design_head_name', 'type' => 'text', 'default_value' => 'Наименование', 'wrapper' => array( 'width' => '25' ) ),
      array( 'key' => 'field_theme_prices_design_head_simple', 'label' => 'Дизайн: колонка 2', 'name' => 'design_head_simple', 'type' => 'text', 'default_value' => 'Простой', 'wrapper' => array( 'width' => '25' ) ),
      array( 'key' => 'field_theme_prices_design_head_medium', 'label' => 'Дизайн: колонка 3', 'name' => 'design_head_medium', 'type' => 'text', 'default_value' => 'Средний', 'wrapper' => array( 'width' => '25' ) ),
      array( 'key' => 'field_theme_prices_design_head_complex', 'label' => 'Дизайн: колонка 4', 'name' => 'design_head_complex', 'type' => 'text', 'default_value' => 'Сложный', 'wrapper' => array( 'width' => '25' ) ),
      array( 'key' => 'field_theme_prices_design_rows', 'label' => 'Дизайн: строки', 'name' => 'design_rows', 'type' => 'textarea', 'rows' => 18, 'new_lines' => '', 'default_value' => $prices_default_design_rows, 'instructions' => 'Раздел начинайте с #. Строка цены: Наименование|Простой|Средний|Сложный.' ),
      array( 'key' => 'field_theme_prices_terms_title', 'label' => 'Условия: заголовок', 'name' => 'terms_title', 'type' => 'text', 'default_value' => 'Условия согласования дизайн-макета перед печатью' ),
      array( 'key' => 'field_theme_prices_terms_items', 'label' => 'Условия: пункты', 'name' => 'terms_items', 'type' => 'textarea', 'rows' => 6, 'default_value' => $prices_default_terms, 'instructions' => 'По одному пункту в строке.' ),
      array( 'key' => 'field_theme_prices_terms_note', 'label' => 'Условия: примечание', 'name' => 'terms_note', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'При согласовании макетов заказчик сам выступает в роли корректора и несет ответственность за допущенные в макете орфографические, грамматические и иные ошибки. После утверждения претензии по макету не принимаются!' ),
      array( 'key' => 'field_theme_prices_price_notice', 'label' => 'Общее примечание', 'name' => 'price_notice', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'В указанном прайс-листе даны ориентировочные цены. Точная стоимость работ определяется только после получения точного технического задания и всех материалов (текст, изображения и т.д.).' ),
      array( 'key' => 'field_theme_prices_outdoor_title', 'label' => 'Наружная реклама: заголовок', 'name' => 'outdoor_title', 'type' => 'text', 'default_value' => 'Наружная реклама' ),
      array( 'key' => 'field_theme_prices_outdoor_head_name', 'label' => 'Наружная реклама: колонка 1', 'name' => 'outdoor_head_name', 'type' => 'text', 'default_value' => 'Наименование', 'wrapper' => array( 'width' => '50' ) ),
      array( 'key' => 'field_theme_prices_outdoor_head_price', 'label' => 'Наружная реклама: колонка 2', 'name' => 'outdoor_head_price', 'type' => 'text', 'default_value' => 'Стоимость', 'wrapper' => array( 'width' => '50' ) ),
      array( 'key' => 'field_theme_prices_outdoor_rows', 'label' => 'Наружная реклама: строки', 'name' => 'outdoor_rows', 'type' => 'textarea', 'rows' => 10, 'new_lines' => '', 'default_value' => $prices_default_outdoor_rows, 'instructions' => 'Строка цены: Наименование|Стоимость.' ),
      array( 'key' => 'field_theme_prices_polygraphy_title', 'label' => 'Полиграфия: заголовок', 'name' => 'polygraphy_title', 'type' => 'text', 'default_value' => 'Полиграфия' ),
      array( 'key' => 'field_theme_prices_polygraphy_head_name', 'label' => 'Полиграфия: колонка 1', 'name' => 'polygraphy_head_name', 'type' => 'text', 'default_value' => 'Наименование', 'wrapper' => array( 'width' => '50' ) ),
      array( 'key' => 'field_theme_prices_polygraphy_head_price', 'label' => 'Полиграфия: колонка 2', 'name' => 'polygraphy_head_price', 'type' => 'text', 'default_value' => 'Стоимость', 'wrapper' => array( 'width' => '50' ) ),
      array( 'key' => 'field_theme_prices_polygraphy_rows', 'label' => 'Полиграфия: строки', 'name' => 'polygraphy_rows', 'type' => 'textarea', 'rows' => 12, 'new_lines' => '', 'default_value' => $prices_default_polygraphy_rows, 'instructions' => 'Раздел начинайте с #. Строка цены: Наименование|Стоимость.' ),
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_prices_page',
        'title'  => 'Цены',
        'fields' => array(
          array( 'key' => 'field_theme_prices_tab_intro', 'label' => 'Intro', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_prices_group_intro',
            'label' => 'Блок Intro',
            'name'  => 'prices_intro',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_prices_intro_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Цены' ),
              array( 'key' => 'field_theme_prices_intro_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text', 'default_value' => 'Цены' ),
              array( 'key' => 'field_theme_prices_intro_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4, 'default_value' => 'Актуальные цены на вывески, широкоформатную печать, полиграфию, брендирование, лазерную гравировку и дизайн-макеты. В прайсе указаны ориентировочные цены, точная стоимость зависит от технического задания и материалов.' ),
            ),
          ),
          array( 'key' => 'field_theme_prices_tab_table', 'label' => 'Таблица', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_prices_group_table',
            'label' => 'Блок Таблица',
            'name'  => 'prices_table',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => $prices_table_fields,
          ),
          array( 'key' => 'field_theme_prices_tab_calc', 'label' => 'Расчет', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_prices_group_calc',
            'label' => 'Блок Расчет',
            'name'  => 'prices_calc',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_prices_calc_note_title', 'label' => 'Заголовок слева', 'name' => 'note_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_prices_calc_note_items', 'label' => 'Пункты слева', 'name' => 'note_items', 'type' => 'textarea', 'rows' => 6, 'instructions' => 'По одному пункту в строке.' ),
              array( 'key' => 'field_theme_prices_calc_cta_title', 'label' => 'Заголовок справа', 'name' => 'cta_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_prices_calc_cta_text', 'label' => 'Текст справа', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_prices_calc_cta_button_text', 'label' => 'Текст кнопки', 'name' => 'cta_button_text', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_prices_calc_cta_button_url', 'label' => 'Ссылка кнопки', 'name' => 'cta_button_url', 'type' => 'url', 'wrapper' => array( 'width' => '50' ) ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/prices.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_services_archive_page',
        'title'  => 'Услуги',
        'fields' => array(
          array( 'key' => 'field_theme_services_archive_tab_intro', 'label' => 'Intro', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_services_archive_group_intro',
            'label' => 'Блок Intro',
            'name'  => 'services_archive_intro',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_services_archive_intro_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text' ),
              array( 'key' => 'field_theme_services_archive_intro_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_services_archive_intro_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4 ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/services-archive.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_service_outdoor_page',
        'title'  => 'Наружная реклама',
        'fields' => array(
          array( 'key' => 'field_theme_service_outdoor_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_service_outdoor_group_hero',
            'label' => 'Блок Hero',
            'name'  => 'service_outdoor_hero',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_outdoor_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_outdoor_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_outdoor_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_service_outdoor_primary_text', 'label' => 'Текст основной кнопки', 'name' => 'primary_button_text', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_outdoor_primary_url', 'label' => 'Ссылка основной кнопки', 'name' => 'primary_button_url', 'type' => 'url', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_outdoor_secondary_text', 'label' => 'Текст второй кнопки', 'name' => 'secondary_button_text', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_outdoor_secondary_url', 'label' => 'Ссылка второй кнопки', 'name' => 'secondary_button_url', 'type' => 'url', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_outdoor_bullet_1', 'label' => 'Преимущество 1', 'name' => 'bullet_1', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_service_outdoor_bullet_2', 'label' => 'Преимущество 2', 'name' => 'bullet_2', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_service_outdoor_bullet_3', 'label' => 'Преимущество 3', 'name' => 'bullet_3', 'type' => 'text', 'wrapper' => array( 'width' => '34' ) ),
              array( 'key' => 'field_theme_service_outdoor_main_image', 'label' => 'Главное изображение', 'name' => 'main_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
              array( 'key' => 'field_theme_service_outdoor_second_image', 'label' => 'Нижнее левое изображение', 'name' => 'second_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_outdoor_third_image', 'label' => 'Нижнее правое изображение', 'name' => 'third_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
            ),
          ),
          array( 'key' => 'field_theme_service_outdoor_tab_highlights', 'label' => 'Акценты', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_service_outdoor_group_highlights',
            'label' => 'Блок Акценты',
            'name'  => 'service_outdoor_highlights',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_outdoor_h1_title', 'label' => 'Акцент 1: заголовок', 'name' => 'item_1_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_outdoor_h1_text', 'label' => 'Акцент 1: текст', 'name' => 'item_1_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_service_outdoor_h2_title', 'label' => 'Акцент 2: заголовок', 'name' => 'item_2_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_outdoor_h2_text', 'label' => 'Акцент 2: текст', 'name' => 'item_2_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_service_outdoor_h3_title', 'label' => 'Акцент 3: заголовок', 'name' => 'item_3_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_outdoor_h3_text', 'label' => 'Акцент 3: текст', 'name' => 'item_3_text', 'type' => 'textarea', 'rows' => 2 ),
            ),
          ),
          array( 'key' => 'field_theme_service_outdoor_tab_process', 'label' => 'Процесс', 'type' => 'tab' ),
          array(
            'key'   => 'field_theme_service_outdoor_group_process',
            'label' => 'Блок Процесс',
            'name'  => 'service_outdoor_process',
            'type'  => 'group',
            'layout' => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_outdoor_process_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_outdoor_process_list', 'label' => 'Список шагов', 'name' => 'list', 'type' => 'textarea', 'rows' => 6, 'instructions' => 'По одному шагу в строке.' ),
              array( 'key' => 'field_theme_service_outdoor_process_text', 'label' => 'Нижний текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 3 ),
              array( 'key' => 'field_theme_service_outdoor_process_image', 'label' => 'Изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/service-outdoor-advertising.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_news_detail_page',
        'title'  => 'Новость',
        'fields' => array(
          array(
            'key'        => 'field_theme_news_detail_group_hero',
            'label'      => 'Hero',
            'name'       => 'news_detail_hero',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_news_detail_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text' ),
              array( 'key' => 'field_theme_news_detail_meta', 'label' => 'Мета', 'name' => 'meta', 'type' => 'text' ),
              array( 'key' => 'field_theme_news_detail_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_news_detail_lead', 'label' => 'Лид', 'name' => 'lead', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_news_detail_image', 'label' => 'Изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/news-detail.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_company_letters_page',
        'title'  => 'Благодарственные письма',
        'fields' => array(
          array( 'key' => 'field_theme_company_letters_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_company_letters_group_hero',
            'label'      => 'Блок Hero',
            'name'       => 'company_letters_hero',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_company_letters_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text' ),
              array( 'key' => 'field_theme_company_letters_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_company_letters_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_company_letters_tag_1', 'label' => 'Тег 1', 'name' => 'tag_1', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_company_letters_tag_2', 'label' => 'Тег 2', 'name' => 'tag_2', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_company_letters_preview_image', 'label' => 'Изображение превью', 'name' => 'preview_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
              array( 'key' => 'field_theme_company_letters_stat_value', 'label' => 'Карточка статистики: значение', 'name' => 'stat_value', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_company_letters_stat_text', 'label' => 'Карточка статистики: текст', 'name' => 'stat_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_company_letters_note_title', 'label' => 'Правая карточка: заголовок', 'name' => 'note_title', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_company_letters_note_text', 'label' => 'Правая карточка: текст', 'name' => 'note_text', 'type' => 'textarea', 'rows' => 2 ),
            ),
          ),
          array( 'key' => 'field_theme_company_letters_tab_archive', 'label' => 'Архив', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_company_letters_group_archive',
            'label'      => 'Архив писем',
            'name'       => 'company_letters_archive',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_company_letters_archive_title', 'label' => 'Заголовок архива', 'name' => 'title', 'type' => 'text' ),
              array(
                'key'          => 'field_theme_company_letters_archive_letters',
                'label'        => 'Письма',
                'name'         => 'letters',
                'type'         => 'repeater',
                'layout'       => 'row',
                'button_label' => 'Добавить письмо',
                'sub_fields'   => array(
                  array(
                    'key'           => 'field_theme_company_letters_archive_letters_image',
                    'label'         => 'Фото письма',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'id',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                  ),
                ),
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_template',
              'operator' => '==',
              'value'    => 'templates/company-letters.php',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );
  }

  add_action( 'acf/init', 'theme_register_page_acf_fields' );
}
