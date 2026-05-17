<?php
/**
 * Image lightbox (Fancybox) helpers and assets.
 *
 * @package theme
 */

if ( ! function_exists( 'theme_is_image_url' ) ) {
  /**
   * Check whether a URL points to a raster image file.
   *
   * @param string $url URL to inspect.
   * @return bool
   */
  function theme_is_image_url( string $url ): bool {
    if ( ! $url ) {
      return false;
    }

    $path = (string) wp_parse_url( $url, PHP_URL_PATH );

    if ( ! $path ) {
      return false;
    }

    return (bool) preg_match( '/\.(jpe?g|png|gif|webp|avif|bmp|svg)$/i', $path );
  }
}

if ( ! function_exists( 'theme_get_fancybox_group' ) ) {
  /**
   * Build a Fancybox gallery group id scoped to the current page.
   *
   * Links that share the same group can be browsed with prev/next inside the viewer.
   *
   * @param int|null    $post_id Optional post ID. Defaults to the queried object.
   * @param string|null $suffix  Optional suffix for multiple galleries on one page.
   * @return string
   */
  function theme_get_fancybox_group( ?int $post_id = null, ?string $suffix = null ): string {
    $post_id = $post_id ?? (int) get_queried_object_id();
    $group   = 'page-' . max( 0, $post_id );

    if ( $suffix ) {
      $group .= '-' . sanitize_title( $suffix );
    }

    return $group;
  }
}

if ( ! function_exists( 'theme_get_fancybox_attrs' ) ) {
  /**
   * Return HTML attributes for a Fancybox-enabled image link.
   *
   * @param array<string, mixed> $args {
   *   @type string|null $group   Gallery group id. Defaults to the current page group.
   *   @type string      $caption Optional caption.
   * }
   * @return string
   */
  function theme_get_fancybox_attrs( array $args = array() ): string {
    $args = wp_parse_args(
      $args,
      array(
        'group'   => null,
        'caption' => '',
      )
    );

    $attributes = array(
      'data-fancybox' => (string) ( $args['group'] ?? theme_get_fancybox_group() ),
    );

    if ( ! empty( $args['caption'] ) ) {
      $attributes['data-caption'] = (string) $args['caption'];
    }

    $html = '';

    foreach ( $attributes as $name => $value ) {
      $html .= ' ' . $name . '="' . esc_attr( $value ) . '"';
    }

    return $html;
  }
}

if ( ! function_exists( 'theme_prepare_content_image_lightbox' ) ) {
  /**
   * Add Fancybox attributes to content links that point directly to image files.
   *
   * @param string $content Post content HTML.
   * @return string
   */
  function theme_prepare_content_image_lightbox( string $content ): string {
    if ( is_admin() || ! $content || false === stripos( $content, '<a ' ) ) {
      return $content;
    }

    if ( ! class_exists( 'DOMDocument' ) ) {
      return $content;
    }

    $group = theme_get_fancybox_group();

    libxml_use_internal_errors( true );

    $document = new DOMDocument();
    $document->loadHTML(
      '<?xml encoding="utf-8" ?><div id="theme-lightbox-root">' . $content . '</div>',
      LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
    );

    libxml_clear_errors();

    $root = $document->getElementById( 'theme-lightbox-root' );

    if ( ! $root ) {
      return $content;
    }

    $links = $document->getElementsByTagName( 'a' );

    foreach ( $links as $link ) {
      if ( ! $link instanceof DOMElement ) {
        continue;
      }

      if ( $link->hasAttribute( 'data-fancybox' ) || $link->hasAttribute( 'data-request-modal' ) ) {
        continue;
      }

      $href = $link->getAttribute( 'href' );

      if ( ! theme_is_image_url( $href ) ) {
        continue;
      }

      $link->setAttribute( 'data-fancybox', $group );
      $link->removeAttribute( 'target' );
      $link->removeAttribute( 'rel' );

      if ( ! $link->hasAttribute( 'data-caption' ) ) {
        $caption = trim( $link->getAttribute( 'title' ) );

        if ( ! $caption ) {
          $caption = trim( wp_strip_all_tags( $link->textContent ) );
        }

        if ( $caption ) {
          $link->setAttribute( 'data-caption', $caption );
        }
      }
    }

    $html = '';

    foreach ( $root->childNodes as $child_node ) {
      $html .= $document->saveHTML( $child_node );
    }

    return $html;
  }
}

add_filter( 'the_content', 'theme_prepare_content_image_lightbox', 20 );

add_action(
  'wp_enqueue_scripts',
  static function (): void {
    if ( is_admin() ) {
      return;
    }

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

    $lightbox_script_path = get_theme_file_path( 'assets/js/image-lightbox.js' );

    wp_enqueue_script(
      'theme-image-lightbox',
      get_theme_file_uri( 'assets/js/image-lightbox.js' ),
      array( 'theme-fancybox' ),
      file_exists( $lightbox_script_path ) ? (string) filemtime( $lightbox_script_path ) : null,
      true
    );
  },
  20
);
