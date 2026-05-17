<?php
/**
 * Breadcrumb helpers.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_should_show_breadcrumbs' ) ) {
  /**
   * Whether breadcrumbs should render on the current request.
   *
   * @return bool
   */
  function theme_should_show_breadcrumbs(): bool {
    if ( is_front_page() ) {
      return false;
    }

    return count( theme_get_breadcrumbs() ) > 1;
  }
}

if ( ! function_exists( 'theme_get_breadcrumb_home_item' ) ) {
  /**
   * Home breadcrumb item.
   *
   * @return array{label: string, url: string}
   */
  function theme_get_breadcrumb_home_item(): array {
    return array(
      'label' => 'Главная',
      'url'   => home_url( '/' ),
    );
  }
}

if ( ! function_exists( 'theme_get_breadcrumb_current_title' ) ) {
  /**
   * Resolve the current page title for breadcrumbs.
   *
   * @return string
   */
  function theme_get_breadcrumb_current_title(): string {
    if ( is_404() ) {
      return 'Страница не найдена';
    }

    if ( is_search() ) {
      return 'Поиск';
    }

    if ( is_post_type_archive() ) {
      return post_type_archive_title( '', false );
    }

    if ( is_singular() ) {
      return get_the_title();
    }

    if ( is_home() ) {
      return 'Новости';
    }

    return wp_get_document_title();
  }
}

if ( ! function_exists( 'theme_get_breadcrumbs' ) ) {
  /**
   * Build breadcrumb trail for the current request.
   *
   * @return array<int, array{label: string, url: string}>
   */
  function theme_get_breadcrumbs(): array {
    static $cache = null;

    if ( null !== $cache ) {
      return $cache;
    }

    $items = array( theme_get_breadcrumb_home_item() );

    if ( is_404() ) {
      $items[] = array(
        'label' => 'Страница не найдена',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_search() ) {
      $items[] = array(
        'label' => 'Поиск',
        'url'   => '',
      );

      return $cache = $items;
    }

    $services_url  = theme_get_page_url_by_template( 'templates/services-archive.php', '/uslugi/' );
    $news_url      = get_post_type_archive_link( 'theme_news' ) ?: theme_get_page_url_by_template( 'templates/news-archive.php', '/novosti/' );
    $portfolio_url = get_post_type_archive_link( 'theme_portfolio' ) ?: home_url( '/portfolio/' );
    $about_url     = theme_get_page_url_by_template( 'templates/about-us.php', '/about/' );

    if ( is_singular( 'theme_service' ) ) {
      $items[] = array(
        'label' => 'Услуги',
        'url'   => $services_url,
      );
      $items[] = array(
        'label' => get_the_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_post_type_archive( 'theme_service' ) || is_page_template( 'templates/services-archive.php' ) ) {
      $items[] = array(
        'label' => 'Услуги',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_singular( 'theme_news' ) || is_page_template( 'templates/news-detail.php' ) ) {
      $items[] = array(
        'label' => 'Новости',
        'url'   => $news_url,
      );
      $items[] = array(
        'label' => get_the_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_post_type_archive( 'theme_news' ) || is_home() || is_page_template( 'templates/news-archive.php' ) ) {
      $items[] = array(
        'label' => 'Новости',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_singular( 'theme_portfolio' ) ) {
      $items[] = array(
        'label' => 'Портфолио',
        'url'   => $portfolio_url,
      );
      $items[] = array(
        'label' => get_the_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_post_type_archive( 'theme_portfolio' ) ) {
      $items[] = array(
        'label' => 'Портфолио',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_page_template( 'templates/about-us.php' ) ) {
      $items[] = array(
        'label' => 'О нас',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_page_template( 'templates/company-letters.php' ) ) {
      $items[] = array(
        'label' => 'О нас',
        'url'   => $about_url,
      );
      $items[] = array(
        'label' => get_the_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_page_template( 'templates/prices.php' ) ) {
      $items[] = array(
        'label' => 'Цены',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_page_template( 'templates/contacts.php' ) ) {
      $items[] = array(
        'label' => 'Контакты',
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_page_template( 'templates/service-outdoor-advertising.php' ) ) {
      $items[] = array(
        'label' => 'Услуги',
        'url'   => $services_url,
      );
      $items[] = array(
        'label' => get_the_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_page() ) {
      $ancestors = array_reverse( array_map( 'intval', get_post_ancestors( get_queried_object_id() ) ) );

      foreach ( $ancestors as $ancestor_id ) {
        $items[] = array(
          'label' => get_the_title( $ancestor_id ),
          'url'   => get_permalink( $ancestor_id ),
        );
      }

      $items[] = array(
        'label' => get_the_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_singular() ) {
      $items[] = array(
        'label' => theme_get_breadcrumb_current_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    if ( is_archive() ) {
      $items[] = array(
        'label' => theme_get_breadcrumb_current_title(),
        'url'   => '',
      );

      return $cache = $items;
    }

    $items[] = array(
      'label' => theme_get_breadcrumb_current_title(),
      'url'   => '',
    );

    return $cache = $items;
  }
}
