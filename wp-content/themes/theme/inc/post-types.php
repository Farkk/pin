<?php
/**
 * Custom post types.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_register_content_post_types' ) ) {
  /**
   * Register services and portfolio content types.
   *
   * @return void
   */
  function theme_register_content_post_types(): void {
    register_post_type(
      'theme_service',
      array(
        'labels' => array(
          'name'               => 'Услуги',
          'singular_name'      => 'Услуга',
          'add_new_item'       => 'Добавить услугу',
          'edit_item'          => 'Редактировать услугу',
          'new_item'           => 'Новая услуга',
          'view_item'          => 'Смотреть услугу',
          'search_items'       => 'Искать услуги',
          'not_found'          => 'Услуги не найдены',
          'menu_name'          => 'Услуги',
        ),
        'public'        => true,
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-megaphone',
        'has_archive'   => 'uslugi',
        'rewrite'       => array(
          'slug'       => 'uslugi',
          'with_front' => false,
        ),
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'show_in_rest'  => true,
      )
    );

    register_post_type(
      'theme_portfolio',
      array(
        'labels' => array(
          'name'               => 'Портфолио',
          'singular_name'      => 'Работа',
          'add_new_item'       => 'Добавить работу',
          'edit_item'          => 'Редактировать работу',
          'new_item'           => 'Новая работа',
          'view_item'          => 'Смотреть работу',
          'search_items'       => 'Искать работы',
          'not_found'          => 'Работы не найдены',
          'menu_name'          => 'Портфолио',
        ),
        'public'        => true,
        'menu_position' => 21,
        'menu_icon'     => 'dashicons-format-gallery',
        'has_archive'   => 'portfolio',
        'rewrite'       => array(
          'slug'       => 'portfolio',
          'with_front' => false,
        ),
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'show_in_rest'  => true,
      )
    );

    register_post_type(
      'theme_news',
      array(
        'labels' => array(
          'name'               => 'Новости',
          'singular_name'      => 'Новость',
          'add_new_item'       => 'Добавить новость',
          'edit_item'          => 'Редактировать новость',
          'new_item'           => 'Новая новость',
          'view_item'          => 'Смотреть новость',
          'search_items'       => 'Искать новости',
          'not_found'          => 'Новости не найдены',
          'menu_name'          => 'Новости',
        ),
        'public'        => true,
        'menu_position' => 22,
        'menu_icon'     => 'dashicons-admin-post',
        'has_archive'   => 'novosti',
        'rewrite'       => array(
          'slug'       => 'novosti',
          'with_front' => false,
        ),
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'show_in_rest'  => true,
      )
    );
  }

  add_action( 'init', 'theme_register_content_post_types', 0 );
}

if ( ! function_exists( 'theme_flush_content_rewrites_once' ) ) {
  /**
   * Flush rewrite rules once after CPTs are introduced.
   *
   * @return void
   */
  function theme_flush_content_rewrites_once(): void {
    $version = '20260512_services_portfolio_news';

    if ( get_option( 'theme_content_rewrite_version' ) === $version ) {
      return;
    }

    flush_rewrite_rules( false );
    update_option( 'theme_content_rewrite_version', $version );
  }

  add_action( 'init', 'theme_flush_content_rewrites_once', 99 );
}
