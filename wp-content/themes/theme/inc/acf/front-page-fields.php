<?php
/**
 * ACF fields for front page.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_register_front_page_acf_fields' ) ) {
  /**
   * Register front page ACF field groups.
   *
   * @return void
   */
  function theme_register_front_page_acf_fields(): void {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
      return;
    }

    $hero_group_fields = array(
      array(
        'key'   => 'field_theme_front_page_hero_kicker',
        'label' => 'Надзаголовок',
        'name'  => 'kicker',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_hero_title',
        'label' => 'Заголовок',
        'name'  => 'title',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_hero_text',
        'label' => 'Текст',
        'name'  => 'text',
        'type'  => 'textarea',
        'rows'  => 4,
      ),
      array(
        'key'   => 'field_theme_front_page_hero_primary_text',
        'label' => 'Текст основной кнопки',
        'name'  => 'primary_button_text',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_primary_url',
        'label' => 'Ссылка основной кнопки',
        'name'  => 'primary_button_url',
        'type'  => 'url',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_secondary_text',
        'label' => 'Текст второй кнопки',
        'name'  => 'secondary_button_text',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_secondary_url',
        'label' => 'Ссылка второй кнопки',
        'name'  => 'secondary_button_url',
        'type'  => 'url',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_benefit_1',
        'label' => 'Преимущество 1',
        'name'  => 'benefit_1',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '33',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_benefit_2',
        'label' => 'Преимущество 2',
        'name'  => 'benefit_2',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '33',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_benefit_3',
        'label' => 'Преимущество 3',
        'name'  => 'benefit_3',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '34',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_main_case_title',
        'label' => 'Подпись большой карточки',
        'name'  => 'main_case_title',
        'type'  => 'text',
      ),
      array(
        'key'           => 'field_theme_front_page_hero_main_case_image',
        'label'         => 'Изображение большой карточки',
        'name'          => 'main_case_image',
        'type'          => 'image',
        'return_format' => 'id',
        'preview_size'  => 'medium',
        'library'       => 'all',
      ),
      array(
        'key'   => 'field_theme_front_page_hero_side_case_top_title',
        'label' => 'Подпись правой верхней карточки',
        'name'  => 'side_case_top_title',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'           => 'field_theme_front_page_hero_side_case_top_image',
        'label'         => 'Изображение правой верхней карточки',
        'name'          => 'side_case_top_image',
        'type'          => 'image',
        'return_format' => 'id',
        'preview_size'  => 'medium',
        'library'       => 'all',
        'wrapper'       => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_hero_side_case_bottom_title',
        'label' => 'Подпись правой нижней карточки',
        'name'  => 'side_case_bottom_title',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'           => 'field_theme_front_page_hero_side_case_bottom_image',
        'label'         => 'Изображение правой нижней карточки',
        'name'          => 'side_case_bottom_image',
        'type'          => 'image',
        'return_format' => 'id',
        'preview_size'  => 'medium',
        'library'       => 'all',
        'wrapper'       => array(
          'width' => '50',
        ),
      ),
    );

    $services_group_fields = array(
      array(
        'key'   => 'field_theme_front_page_services_kicker',
        'label' => 'Надзаголовок',
        'name'  => 'kicker',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_services_title',
        'label' => 'Заголовок',
        'name'  => 'title',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_services_text',
        'label' => 'Текст',
        'name'  => 'text',
        'type'  => 'textarea',
        'rows'  => 4,
      ),
    );

    $telegram_group_fields = array(
      array(
        'key'   => 'field_theme_front_page_telegram_kicker',
        'label' => 'Надзаголовок',
        'name'  => 'kicker',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_telegram_title',
        'label' => 'Заголовок',
        'name'  => 'title',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_telegram_text',
        'label' => 'Текст',
        'name'  => 'text',
        'type'  => 'textarea',
        'rows'  => 3,
      ),
      array(
        'key'   => 'field_theme_front_page_telegram_button_text',
        'label' => 'Текст кнопки',
        'name'  => 'button_text',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_telegram_button_url',
        'label' => 'Ссылка кнопки',
        'name'  => 'button_url',
        'type'  => 'url',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
    );

    $request_group_fields = array(
      array(
        'key'   => 'field_theme_front_page_request_kicker',
        'label' => 'Надзаголовок',
        'name'  => 'kicker',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_request_title',
        'label' => 'Заголовок',
        'name'  => 'title',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_request_text',
        'label' => 'Текст',
        'name'  => 'text',
        'type'  => 'textarea',
        'rows'  => 4,
      ),
      array(
        'key'   => 'field_theme_front_page_request_reply',
        'label' => 'Подпись под текстом',
        'name'  => 'reply',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_request_name_label',
        'label' => 'Поле "Имя": label',
        'name'  => 'name_label',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_request_name_placeholder',
        'label' => 'Поле "Имя": placeholder',
        'name'  => 'name_placeholder',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_request_phone_label',
        'label' => 'Поле "Телефон": label',
        'name'  => 'phone_label',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_request_phone_placeholder',
        'label' => 'Поле "Телефон": placeholder',
        'name'  => 'phone_placeholder',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_request_asset_label',
        'label' => 'Поле "Файл или фото": label',
        'name'  => 'asset_label',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_request_asset_placeholder',
        'label' => 'Поле "Файл или фото": подсказка',
        'name'  => 'asset_placeholder',
        'type'  => 'text',
        'wrapper' => array(
          'width' => '50',
        ),
      ),
      array(
        'key'   => 'field_theme_front_page_request_submit_text',
        'label' => 'Текст кнопки',
        'name'  => 'submit_text',
        'type'  => 'text',
      ),
      array(
        'key'   => 'field_theme_front_page_request_note',
        'label' => 'Текст под формой',
        'name'  => 'note',
        'type'  => 'textarea',
        'rows'  => 4,
      ),
    );

    acf_add_local_field_group(
      array(
        'key'    => 'group_theme_front_page_content',
        'title'  => 'Главная страница',
        'fields' => array(
          array(
            'key'   => 'field_theme_front_page_tab_hero',
            'label' => 'Hero',
            'type'  => 'tab',
            'placement' => 'top',
          ),
          array(
            'key'        => 'field_theme_front_page_group_hero',
            'label'      => 'Блок Hero',
            'name'       => 'front_page_hero',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => $hero_group_fields,
          ),
          array(
            'key'   => 'field_theme_front_page_tab_services',
            'label' => 'Услуги',
            'type'  => 'tab',
            'placement' => 'top',
          ),
          array(
            'key'        => 'field_theme_front_page_group_services',
            'label'      => 'Блок Услуги',
            'name'       => 'front_page_services',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => $services_group_fields,
          ),
          array(
            'key'   => 'field_theme_front_page_tab_telegram',
            'label' => 'Telegram',
            'type'  => 'tab',
            'placement' => 'top',
          ),
          array(
            'key'        => 'field_theme_front_page_group_telegram',
            'label'      => 'Блок Telegram',
            'name'       => 'front_page_telegram',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => $telegram_group_fields,
          ),
          array(
            'key'   => 'field_theme_front_page_tab_request',
            'label' => 'Форма',
            'type'  => 'tab',
            'placement' => 'top',
          ),
          array(
            'key'        => 'field_theme_front_page_group_request',
            'label'      => 'Блок Форма',
            'name'       => 'front_page_request',
            'type'       => 'group',
            'layout'     => 'block',
            'sub_fields' => $request_group_fields,
          ),
        ),
        'location' => array(
          array(
            array(
              'param'    => 'page_type',
              'operator' => '==',
              'value'    => 'front_page',
            ),
          ),
        ),
        'position' => 'acf_after_title',
        'style'    => 'seamless',
        'active'   => true,
      )
    );
  }

  add_action( 'acf/init', 'theme_register_front_page_acf_fields' );
}
