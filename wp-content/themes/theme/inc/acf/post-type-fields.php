<?php
/**
 * ACF fields for custom post types.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_register_post_type_acf_fields' ) ) {
  /**
   * Register ACF groups for services and portfolio posts.
   *
   * @return void
   */
  function theme_register_post_type_acf_fields(): void {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
      return;
    }

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_service_post',
        'title'  => 'Контент услуги',
        'fields' => array(
          array( 'key' => 'field_theme_service_post_tab_card', 'label' => 'Карточка', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_service_post_group_card',
            'label'      => 'Карточка в списках',
            'name'       => 'service_card',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_post_card_text', 'label' => 'Текст карточки', 'name' => 'card_text', 'type' => 'textarea', 'rows' => 3 ),
              array( 'key' => 'field_theme_service_post_card_button', 'label' => 'Текст кнопки', 'name' => 'button_text', 'type' => 'text', 'default_value' => 'Подробнее', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_card_image', 'label' => 'Изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_card_home_modifier', 'label' => 'Класс карточки на главной', 'name' => 'home_modifier', 'type' => 'text', 'instructions' => 'Например: service-card--large' ),
              array( 'key' => 'field_theme_service_post_card_archive_modifier', 'label' => 'Классы карточки в архиве', 'name' => 'archive_modifier', 'type' => 'text', 'instructions' => 'Например: services-archive-card--light services-archive-card--large' ),
              array(
                'key'           => 'field_theme_service_post_card_button_variant',
                'label'         => 'Вариант кнопки',
                'name'          => 'button_variant',
                'type'          => 'select',
                'choices'       => array(
                  'accent' => 'Акцентная',
                  'light'  => 'Светлая',
                  'dark'   => 'Темная',
                ),
                'default_value' => 'accent',
                'ui'            => 1,
              ),
            ),
          ),
          array( 'key' => 'field_theme_service_post_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_service_post_group_hero',
            'label'      => 'Первый экран',
            'name'       => 'service_hero',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_post_hero_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Услуга' ),
              array( 'key' => 'field_theme_service_post_hero_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_post_hero_text', 'label' => 'Текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_service_post_hero_primary_text', 'label' => 'Основная кнопка: текст', 'name' => 'primary_button_text', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_hero_primary_url', 'label' => 'Основная кнопка: ссылка', 'name' => 'primary_button_url', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_hero_secondary_text', 'label' => 'Вторая кнопка: текст', 'name' => 'secondary_button_text', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_hero_secondary_url', 'label' => 'Вторая кнопка: ссылка', 'name' => 'secondary_button_url', 'type' => 'text', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_hero_bullet_1', 'label' => 'Преимущество 1', 'name' => 'bullet_1', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_service_post_hero_bullet_2', 'label' => 'Преимущество 2', 'name' => 'bullet_2', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_service_post_hero_bullet_3', 'label' => 'Преимущество 3', 'name' => 'bullet_3', 'type' => 'text', 'wrapper' => array( 'width' => '34' ) ),
              array( 'key' => 'field_theme_service_post_hero_image', 'label' => 'Главное изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
              array( 'key' => 'field_theme_service_post_hero_second_image', 'label' => 'Нижнее левое изображение', 'name' => 'second_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_hero_third_image', 'label' => 'Нижнее правое изображение', 'name' => 'third_image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'wrapper' => array( 'width' => '50' ) ),
            ),
          ),
          array( 'key' => 'field_theme_service_post_tab_highlights', 'label' => 'Акценты', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_service_post_group_highlights',
            'label'      => 'Акцентные карточки',
            'name'       => 'service_highlights',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_post_h1_title', 'label' => 'Акцент 1: заголовок', 'name' => 'item_1_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_post_h1_text', 'label' => 'Акцент 1: текст', 'name' => 'item_1_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_service_post_h2_title', 'label' => 'Акцент 2: заголовок', 'name' => 'item_2_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_post_h2_text', 'label' => 'Акцент 2: текст', 'name' => 'item_2_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_service_post_h3_title', 'label' => 'Акцент 3: заголовок', 'name' => 'item_3_title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_post_h3_text', 'label' => 'Акцент 3: текст', 'name' => 'item_3_text', 'type' => 'textarea', 'rows' => 2 ),
            ),
          ),
          array( 'key' => 'field_theme_service_post_tab_process', 'label' => 'Процесс', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_service_post_group_process',
            'label'      => 'Процесс',
            'name'       => 'service_process',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_service_post_process_title', 'label' => 'Заголовок', 'name' => 'title', 'type' => 'text' ),
              array( 'key' => 'field_theme_service_post_process_list', 'label' => 'Список', 'name' => 'list', 'type' => 'textarea', 'rows' => 6, 'instructions' => 'По одному пункту в строке.' ),
              array( 'key' => 'field_theme_service_post_process_text', 'label' => 'Нижний текст', 'name' => 'text', 'type' => 'textarea', 'rows' => 3 ),
              array( 'key' => 'field_theme_service_post_process_image', 'label' => 'Изображение', 'name' => 'image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
            ),
          ),
          array( 'key' => 'field_theme_service_post_tab_resources', 'label' => 'Карта и файлы', 'type' => 'tab' ),
          array(
            'key'        => 'field_theme_service_post_group_resources',
            'label'      => 'Карта, АП и КП',
            'name'       => 'service_resources',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array(
                'key'           => 'field_theme_service_post_resources_enabled',
                'label'         => 'Показывать блок на странице',
                'name'          => 'enabled',
                'type'          => 'true_false',
                'default_value' => 0,
                'ui'            => 1,
              ),
              array(
                'key'           => 'field_theme_service_post_resources_section_title',
                'label'         => 'Заголовок секции',
                'name'          => 'section_title',
                'type'          => 'text',
                'default_value' => 'Материалы и карта размещения',
              ),
              array( 'key' => 'field_theme_service_post_resources_ap_title', 'label' => 'АП: заголовок', 'name' => 'ap_title', 'type' => 'text', 'default_value' => 'Актуальная адресная программа', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_resources_ap_file', 'label' => 'АП: PDF-файл', 'name' => 'ap_file', 'type' => 'file', 'return_format' => 'id', 'library' => 'all', 'mime_types' => 'pdf', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_resources_ap_text', 'label' => 'АП: описание', 'name' => 'ap_text', 'type' => 'textarea', 'rows' => 2 ),
              array( 'key' => 'field_theme_service_post_resources_kp_title', 'label' => 'КП: заголовок', 'name' => 'kp_title', 'type' => 'text', 'default_value' => 'Стоимость размещения', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_resources_kp_file', 'label' => 'КП: PDF-файл', 'name' => 'kp_file', 'type' => 'file', 'return_format' => 'id', 'library' => 'all', 'mime_types' => 'pdf', 'wrapper' => array( 'width' => '50' ) ),
              array( 'key' => 'field_theme_service_post_resources_kp_text', 'label' => 'КП: описание', 'name' => 'kp_text', 'type' => 'textarea', 'rows' => 2 ),
              array(
                'key'           => 'field_theme_service_post_resources_map_enabled',
                'label'         => 'Показывать карту',
                'name'          => 'map_enabled',
                'type'          => 'true_false',
                'default_value' => 0,
                'ui'            => 1,
              ),
              array( 'key' => 'field_theme_service_post_resources_map_title', 'label' => 'Карта: заголовок', 'name' => 'map_title', 'type' => 'text', 'default_value' => 'Интерактивная карта размещения рекламных стендов' ),
              array( 'key' => 'field_theme_service_post_resources_map_text', 'label' => 'Карта: описание', 'name' => 'map_text', 'type' => 'textarea', 'rows' => 2 ),
              array(
                'key'          => 'field_theme_service_post_resources_map_points',
                'label'        => 'Точки на карте',
                'name'         => 'map_points',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Добавить точку',
                'sub_fields'   => array(
                  array( 'key' => 'field_theme_service_post_resources_point_title', 'label' => 'Название', 'name' => 'title', 'type' => 'text', 'wrapper' => array( 'width' => '30' ) ),
                  array( 'key' => 'field_theme_service_post_resources_point_lat', 'label' => 'Широта', 'name' => 'lat', 'type' => 'number', 'step' => 'any', 'wrapper' => array( 'width' => '20' ) ),
                  array( 'key' => 'field_theme_service_post_resources_point_lng', 'label' => 'Долгота', 'name' => 'lng', 'type' => 'number', 'step' => 'any', 'wrapper' => array( 'width' => '20' ) ),
                  array(
                    'key'        => 'field_theme_service_post_resources_point_district',
                    'label'      => 'Район',
                    'name'       => 'district',
                    'type'       => 'select',
                    'choices'    => theme_get_service_district_choices(),
                    'allow_null' => 1,
                    'ui'         => 1,
                    'wrapper'    => array( 'width' => '30' ),
                  ),
                ),
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'post_type',
              'operator' => '==',
              'value'    => 'theme_service',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_portfolio_post',
        'title'  => 'Контент портфолио',
        'fields' => array(
          array(
            'key'        => 'field_theme_portfolio_post_group_content',
            'label'      => 'Контент',
            'name'       => 'portfolio_content',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => array(
              array( 'key' => 'field_theme_portfolio_post_kicker', 'label' => 'Надзаголовок', 'name' => 'kicker', 'type' => 'text', 'default_value' => 'Кейс' ),
              array( 'key' => 'field_theme_portfolio_post_description', 'label' => 'Описание', 'name' => 'description', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_portfolio_post_client', 'label' => 'Клиент', 'name' => 'client', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_portfolio_post_duration', 'label' => 'Срок', 'name' => 'duration', 'type' => 'text', 'wrapper' => array( 'width' => '33' ) ),
              array( 'key' => 'field_theme_portfolio_post_composition', 'label' => 'Состав', 'name' => 'composition', 'type' => 'text', 'wrapper' => array( 'width' => '34' ) ),
              array( 'key' => 'field_theme_portfolio_post_cover', 'label' => 'Обложка', 'name' => 'cover', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all' ),
              array( 'key' => 'field_theme_portfolio_post_gallery', 'label' => 'Галерея', 'name' => 'gallery', 'type' => 'gallery', 'return_format' => 'id', 'preview_size' => 'medium', 'library' => 'all', 'insert' => 'append' ),
              array( 'key' => 'field_theme_portfolio_post_result_title', 'label' => 'Заголовок результата', 'name' => 'result_title', 'type' => 'text', 'default_value' => 'Результат проекта' ),
              array( 'key' => 'field_theme_portfolio_post_result_text', 'label' => 'Текст результата', 'name' => 'result_text', 'type' => 'textarea', 'rows' => 4 ),
              array( 'key' => 'field_theme_portfolio_post_scope_title', 'label' => 'Заголовок состава работ', 'name' => 'scope_title', 'type' => 'text', 'default_value' => 'Что было сделано' ),
              array( 'key' => 'field_theme_portfolio_post_scope_list', 'label' => 'Список работ', 'name' => 'scope_list', 'type' => 'textarea', 'rows' => 5, 'instructions' => 'По одному пункту в строке.' ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'post_type',
              'operator' => '==',
              'value'    => 'theme_portfolio',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
      )
    );
  }

  add_action( 'acf/init', 'theme_register_post_type_acf_fields' );
}
