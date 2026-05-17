<?php
/**
 * Theme bootstrap.
 *
 * @package theme
 */

$theme_acf_files = glob( get_theme_file_path( 'inc/acf/*.php' ) );

require_once get_theme_file_path( 'inc/post-types.php' );
require_once get_theme_file_path( 'inc/default-content.php' );
require_once get_theme_file_path( 'inc/theme-settings.php' );
require_once get_theme_file_path( 'inc/request-modal.php' );
require_once get_theme_file_path( 'inc/social-float.php' );

if ( is_array( $theme_acf_files ) ) {
  foreach ( $theme_acf_files as $theme_acf_file ) {
    if ( file_exists( $theme_acf_file ) ) {
      require_once $theme_acf_file;
    }
  }
}

add_action(
  'after_setup_theme',
  static function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
  }
);

add_action(
  'wp_enqueue_scripts',
  static function () {
    $style_path = get_theme_file_path( 'assets/css/main.css' );

    wp_enqueue_style(
      'theme-main',
      get_theme_file_uri( 'assets/css/main.css' ),
      array(),
      file_exists( $style_path ) ? (string) filemtime( $style_path ) : null
    );

    $header_script_path = get_theme_file_path( 'assets/js/header.js' );

    wp_enqueue_script(
      'theme-header',
      get_theme_file_uri( 'assets/js/header.js' ),
      array(),
      file_exists( $header_script_path ) ? (string) filemtime( $header_script_path ) : null,
      true
    );

    $request_modal_script_path = get_theme_file_path( 'assets/js/request-modal.js' );

    wp_enqueue_script(
      'theme-request-modal',
      get_theme_file_uri( 'assets/js/request-modal.js' ),
      array(),
      file_exists( $request_modal_script_path ) ? (string) filemtime( $request_modal_script_path ) : null,
      true
    );

    wp_localize_script(
      'theme-request-modal',
      'themeRequestModal',
      array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'theme_request_form' ),
      )
    );

    $social_float_script_path = get_theme_file_path( 'assets/js/social-float.js' );

    wp_enqueue_script(
      'theme-social-float',
      get_theme_file_uri( 'assets/js/social-float.js' ),
      array(),
      file_exists( $social_float_script_path ) ? (string) filemtime( $social_float_script_path ) : null,
      true
    );

    if ( is_page_template( 'templates/company-letters.php' ) ) {
      wp_enqueue_style(
        'theme-fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.36/dist/fancybox/fancybox.css',
        array(),
        '5.0.36'
      );

      wp_enqueue_script(
        'theme-fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.36/dist/fancybox/fancybox.umd.js',
        array(),
        '5.0.36',
        true
      );

      wp_add_inline_script(
        'theme-fancybox',
        'Fancybox.bind("[data-fancybox=\"company-letters\"]", { Images: { zoom: true }, Thumbs: false, Toolbar: { display: { left: [], middle: [], right: ["close"] } } });'
      );
    }
  }
);

add_action(
  'pre_get_posts',
  static function ( WP_Query $query ): void {
    if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'theme_news' ) ) {
      return;
    }

    $query->set( 'posts_per_page', 6 );
  }
);

if ( ! function_exists( 'theme_get_page_url_by_template' ) ) {
  /**
   * Resolve page URL by assigned page template.
   *
   * @param string $template Template file path.
   * @param string $fallback Fallback relative path.
   * @return string
   */
  function theme_get_page_url_by_template( string $template, string $fallback = '/' ): string {
    static $cache = array();

    if ( isset( $cache[ $template ] ) ) {
      return $cache[ $template ];
    }

    $pages = get_pages(
      array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $template,
        'number'     => 1,
      )
    );

    if ( ! empty( $pages ) ) {
      $cache[ $template ] = get_permalink( $pages[0] );
      return $cache[ $template ];
    }

    $cache[ $template ] = home_url( $fallback );
    return $cache[ $template ];
  }
}

if ( ! function_exists( 'theme_get_acf_group' ) ) {
  /**
   * Get ACF group values merged with defaults.
   *
   * @param string $field_name Group field name.
   * @param array  $defaults   Default values.
   * @param mixed  $post_id    Optional post ID to load fields from.
   * @return array
   */
  function theme_get_acf_group( string $field_name, array $defaults = array(), $post_id = false ): array {
    if ( ! function_exists( 'get_field' ) ) {
      $resolved_post_id = false === $post_id ? get_the_ID() : $post_id;
      $meta_value       = $resolved_post_id ? get_post_meta( (int) $resolved_post_id, $field_name, true ) : array();

      return is_array( $meta_value ) ? wp_parse_args( $meta_value, $defaults ) : $defaults;
    }

    $value = get_field( $field_name, $post_id );

    if ( ! is_array( $value ) ) {
      $resolved_post_id = false === $post_id ? get_the_ID() : $post_id;
      $meta_value       = $resolved_post_id ? get_post_meta( (int) $resolved_post_id, $field_name, true ) : array();

      return is_array( $meta_value ) ? wp_parse_args( $meta_value, $defaults ) : $defaults;
    }

    return wp_parse_args( $value, $defaults );
  }
}

if ( ! function_exists( 'theme_parse_multiline_choices' ) ) {
  /**
   * Convert multiline textarea value to array of choices.
   *
   * @param string $value    Raw textarea value.
   * @param array  $fallback Default choices.
   * @return array
   */
  function theme_parse_multiline_choices( string $value, array $fallback = array() ): array {
    $lines = preg_split( '/\r\n|\r|\n/', $value );
    $lines = array_filter(
      array_map(
        'trim',
        is_array( $lines ) ? $lines : array()
      )
    );

    return ! empty( $lines ) ? array_values( $lines ) : $fallback;
  }
}

if ( ! function_exists( 'theme_get_image_url' ) ) {
  /**
   * Resolve an ACF image value to a public URL.
   *
   * @param mixed  $image ACF image value: ID, array, or legacy URL string.
   * @param string $size  Registered image size.
   * @return string
   */
  function theme_get_image_url( $image, string $size = 'full' ): string {
    if ( is_array( $image ) ) {
      if ( ! empty( $image['sizes'][ $size ] ) ) {
        return theme_get_webp_image_url( (string) $image['sizes'][ $size ] );
      }

      if ( ! empty( $image['url'] ) ) {
        return theme_get_webp_image_url( (string) $image['url'] );
      }

      if ( ! empty( $image['ID'] ) ) {
        $url = wp_get_attachment_image_url( (int) $image['ID'], $size );
        return $url ? theme_get_webp_image_url( $url ) : '';
      }
    }

    if ( is_numeric( $image ) ) {
      $url = wp_get_attachment_image_url( (int) $image, $size );
      return $url ? theme_get_webp_image_url( $url ) : '';
    }

    return is_string( $image ) ? theme_get_webp_image_url( esc_url_raw( $image ) ) : '';
  }
}

if ( ! function_exists( 'theme_get_webp_image_url' ) ) {
  /**
   * Prefer a generated WebP file when it exists next to the source image.
   *
   * @param string $image_url Source image URL.
   * @return string
   */
  function theme_get_webp_image_url( string $image_url ): string {
    if ( ! $image_url || preg_match( '/\.webp(?:\?.*)?$/i', $image_url ) ) {
      return $image_url;
    }

    $path = (string) wp_parse_url( $image_url, PHP_URL_PATH );

    if ( ! preg_match( '/\.(?:jpe?g|png)(?:$|\?)/i', $image_url ) || ! $path ) {
      return $image_url;
    }

    $site_url  = site_url();
    $site_path = (string) wp_parse_url( $site_url, PHP_URL_PATH );
    $site_path = $site_path ? untrailingslashit( $site_path ) : '';

    if ( $site_path && 0 === strpos( $path, $site_path . '/' ) ) {
      $relative_path = substr( $path, strlen( $site_path ) );
    } else {
      $relative_path = $path;
    }

    $source_file = untrailingslashit( ABSPATH ) . $relative_path;
    $candidates  = array(
      $source_file . '.webp',
      preg_replace( '/\.(jpe?g|png)$/i', '.webp', $source_file ),
    );

    foreach ( array_filter( $candidates ) as $candidate ) {
      if ( is_string( $candidate ) && file_exists( $candidate ) ) {
        $webp_path = str_replace( untrailingslashit( ABSPATH ), '', $candidate );
        return site_url( str_replace( DIRECTORY_SEPARATOR, '/', $webp_path ) );
      }
    }

    return $image_url;
  }
}

if ( ! function_exists( 'theme_get_group_image_url' ) ) {
  /**
   * Resolve an image URL from an ACF group with legacy key fallback.
   *
   * @param array  $group      ACF group value.
   * @param string $image_key  Current image field key.
   * @param string $legacy_key Legacy URL field key.
   * @param string $fallback   Fallback URL.
   * @param string $size       Registered image size.
   * @return string
   */
  function theme_get_group_image_url( array $group, string $image_key = 'image', string $legacy_key = 'image_url', string $fallback = '', string $size = 'full' ): string {
    $image_url = theme_get_image_url( $group[ $image_key ] ?? '', $size );

    if ( $image_url ) {
      return $image_url;
    }

    $legacy_url = $legacy_key ? theme_get_image_url( $group[ $legacy_key ] ?? '', $size ) : '';

    return $legacy_url ?: $fallback;
  }
}

if ( ! function_exists( 'theme_get_background_style' ) ) {
  /**
   * Build a sanitized inline background-image style.
   *
   * @param string $image_url Image URL.
   * @param string $property  CSS property or custom property name.
   * @return string
   */
  function theme_get_background_style( string $image_url, string $property = 'background-image' ): string {
    if ( ! $image_url ) {
      return '';
    }

    $image_url = theme_get_webp_image_url( $image_url );
    $property = preg_match( '/^--[a-z0-9-]+$/', $property ) ? $property : 'background-image';
    $value    = '--' === substr( $property, 0, 2 ) ? 'url(' . esc_url( $image_url ) . ')' : 'url(' . esc_url( $image_url ) . ')';

    return ' style="' . esc_attr( $property . ': ' . $value . ';' ) . '"';
  }
}

if ( ! function_exists( 'theme_get_image_placeholder_class' ) ) {
  /**
   * Return a placeholder class when an admin image field is empty.
   *
   * @param string $image_url Image URL.
   * @return string
   */
  function theme_get_image_placeholder_class( string $image_url ): string {
    return $image_url ? '' : ' image-placeholder';
  }
}

if ( ! function_exists( 'theme_get_image_placeholder_attrs' ) ) {
  /**
   * Return placeholder data attributes with the expected image size.
   *
   * @param string $image_url Image URL.
   * @param string $size      Expected image size label.
   * @return string
   */
  function theme_get_image_placeholder_attrs( string $image_url, string $size ): string {
    if ( $image_url || ! $size ) {
      return '';
    }

    return ' data-placeholder-size="' . esc_attr( $size ) . '"';
  }
}
