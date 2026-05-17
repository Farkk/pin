<?php
/**
 * Service resources block: downloads and Yandex map.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_get_service_district_choices' ) ) {
  /**
   * District slug => label map for lift advertising map filters.
   *
   * @return array<string, string>
   */
  function theme_get_service_district_choices(): array {
    return array(
      'sever' => 'Северный',
      'centr' => 'Центральный',
      'zapad' => 'Западный',
      'yug'   => 'Южный',
      'avia'  => 'Авиационный',
    );
  }
}

if ( ! function_exists( 'theme_get_acf_file_url' ) ) {
  /**
   * Resolve an ACF file field to a public URL.
   *
   * @param mixed $file ACF file value.
   * @return string
   */
  function theme_get_acf_file_url( $file ): string {
    if ( is_numeric( $file ) ) {
      $url = wp_get_attachment_url( (int) $file );

      return $url ? (string) $url : '';
    }

    if ( is_array( $file ) && ! empty( $file['url'] ) ) {
      return esc_url_raw( (string) $file['url'] );
    }

    return is_string( $file ) ? esc_url_raw( $file ) : '';
  }
}

if ( ! function_exists( 'theme_get_yandex_maps_api_key' ) ) {
  /**
   * Get Yandex Maps API key from theme settings.
   *
   * @return string
   */
  function theme_get_yandex_maps_api_key(): string {
    $value = get_option( 'theme_yandex_maps_api_key', '' );

    return is_string( $value ) ? trim( $value ) : '';
  }
}

if ( ! function_exists( 'theme_get_service_resources' ) ) {
  /**
   * Normalize service resources ACF group for templates and scripts.
   *
   * @param int $post_id Service post ID.
   * @return array<string, mixed>
   */
  function theme_get_service_resources( int $post_id ): array {
    $districts = theme_get_service_district_choices();
    $defaults  = array(
      'enabled'      => false,
      'section_title' => 'Материалы и карта размещения',
      'ap_title'     => 'Актуальная адресная программа',
      'ap_text'      => 'Ознакомьтесь с актуальной адресной программой расположения рекламных модулей.',
      'ap_file'      => '',
      'kp_title'     => 'Стоимость размещения',
      'kp_text'      => 'Скачайте актуальное коммерческое предложение по размещению рекламы.',
      'kp_file'      => '',
      'map_enabled'  => false,
      'map_title'    => 'Интерактивная карта размещения рекламных стендов',
      'map_text'     => '',
      'map_points'   => array(),
    );

    $raw = function_exists( 'theme_get_acf_group' )
      ? theme_get_acf_group( 'service_resources', $defaults, $post_id )
      : $defaults;

    $downloads = array();
    $ap_url    = theme_get_acf_file_url( $raw['ap_file'] ?? '' );

    if ( $ap_url ) {
      $downloads[] = array(
        'id'    => 'ap',
        'title' => (string) ( $raw['ap_title'] ?? $defaults['ap_title'] ),
        'text'  => (string) ( $raw['ap_text'] ?? '' ),
        'url'   => $ap_url,
      );
    }

    $kp_url = theme_get_acf_file_url( $raw['kp_file'] ?? '' );

    if ( $kp_url ) {
      $downloads[] = array(
        'id'    => 'kp',
        'title' => (string) ( $raw['kp_title'] ?? $defaults['kp_title'] ),
        'text'  => (string) ( $raw['kp_text'] ?? '' ),
        'url'   => $kp_url,
      );
    }

    $points = array();

    if ( ! empty( $raw['map_points'] ) && is_array( $raw['map_points'] ) ) {
      foreach ( $raw['map_points'] as $row ) {
        if ( ! is_array( $row ) ) {
          continue;
        }

        $lat = isset( $row['lat'] ) ? (float) $row['lat'] : 0.0;
        $lng = isset( $row['lng'] ) ? (float) $row['lng'] : 0.0;

        if ( ! $lat || ! $lng ) {
          continue;
        }

        $district = isset( $row['district'] ) ? (string) $row['district'] : '';

        if ( $district && ! isset( $districts[ $district ] ) ) {
          $district = '';
        }

        $points[] = array(
          'title'    => (string) ( $row['title'] ?? '' ),
          'lat'      => $lat,
          'lng'      => $lng,
          'district' => $district,
        );
      }
    }

    $map_enabled = ! empty( $raw['map_enabled'] ) && ! empty( $points );
    $enabled     = ! empty( $raw['enabled'] ) && ( ! empty( $downloads ) || $map_enabled );

    $used_districts = array();

    foreach ( $points as $point ) {
      if ( ! empty( $point['district'] ) ) {
        $used_districts[ $point['district'] ] = $districts[ $point['district'] ];
      }
    }

    $center = array( 55.441, 37.753 );
    $zoom   = 12;

    if ( ! empty( $points ) ) {
      $lat_sum = 0.0;
      $lng_sum = 0.0;

      foreach ( $points as $point ) {
        $lat_sum += $point['lat'];
        $lng_sum += $point['lng'];
      }

      $count  = count( $points );
      $center = array( $lat_sum / $count, $lng_sum / $count );
    }

    return array(
      'enabled'       => $enabled,
      'section_title' => (string) ( $raw['section_title'] ?? $defaults['section_title'] ),
      'downloads'     => $downloads,
      'map'           => array(
        'enabled'   => $map_enabled,
        'title'     => (string) ( $raw['map_title'] ?? $defaults['map_title'] ),
        'text'      => (string) ( $raw['map_text'] ?? '' ),
        'points'    => $points,
        'districts' => $used_districts,
        'center'    => $center,
        'zoom'      => $zoom,
      ),
    );
  }
}

if ( ! function_exists( 'theme_enqueue_service_resources_assets' ) ) {
  /**
   * Enqueue map assets for service detail pages when needed.
   *
   * @return void
   */
  function theme_enqueue_service_resources_assets(): void {
    if ( ! is_singular( 'theme_service' ) ) {
      return;
    }

    $post_id   = get_queried_object_id();
    $resources = theme_get_service_resources( $post_id );

    if ( empty( $resources['enabled'] ) || empty( $resources['map']['enabled'] ) ) {
      return;
    }

    $api_key = theme_get_yandex_maps_api_key();

    if ( ! $api_key ) {
      return;
    }

    wp_enqueue_script(
      'yandex-maps',
      'https://api-maps.yandex.ru/2.1/?apikey=' . rawurlencode( $api_key ) . '&lang=ru_RU',
      array(),
      null,
      true
    );

    $script_path = get_theme_file_path( 'assets/js/service-map.js' );

    wp_enqueue_script(
      'theme-service-map',
      get_theme_file_uri( 'assets/js/service-map.js' ),
      array( 'yandex-maps' ),
      file_exists( $script_path ) ? (string) filemtime( $script_path ) : null,
      true
    );

    wp_localize_script(
      'theme-service-map',
      'themeServiceMap',
      array(
        'center'    => $resources['map']['center'],
        'zoom'      => $resources['map']['zoom'],
        'points'    => $resources['map']['points'],
        'districts' => $resources['map']['districts'],
        'allLabel'  => 'Все районы',
      )
    );
  }

  add_action( 'wp_enqueue_scripts', 'theme_enqueue_service_resources_assets', 20 );
}
