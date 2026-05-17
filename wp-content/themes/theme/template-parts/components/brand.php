<?php
/**
 * Brand component.
 *
 * @package theme
 */

$compact = ! empty( $args['compact'] );
$footer  = ! empty( $args['footer'] );

$logo_candidates = array(
  'assets/images/logo.png',
  'assets/images/logo.webp',
  'assets/images/logo.jpg',
  'assets/images/logo.jpeg',
  'assets/images/logo.svg',
);

$logo_uri = '';

if ( function_exists( 'theme_get_logo_url' ) ) {
  $logo_uri = theme_get_logo_url();
}

foreach ( $logo_candidates as $logo_candidate ) {
  if ( $logo_uri ) {
    break;
  }

  if ( file_exists( get_theme_file_path( $logo_candidate ) ) ) {
    $logo_uri = get_theme_file_uri( $logo_candidate );
    break;
  }
}

$brand_classes = 'site-brand';

if ( $compact ) {
  $brand_classes .= ' site-brand--compact';
}

if ( $footer ) {
  $brand_classes .= ' site-brand--footer';
}
?>

<a class="<?php echo esc_attr( $brand_classes ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'На главную', 'theme' ); ?>">
  <?php if ( $logo_uri ) : ?>
    <img
      class="site-brand__image"
      src="<?php echo esc_url( $logo_uri ); ?>"
      alt="<?php esc_attr_e( 'ПИН рекламное агентство', 'theme' ); ?>"
    >
  <?php else : ?>
    <span class="site-brand__fallback<?php echo $compact ? ' site-brand__fallback--compact' : ''; ?>">
      <span class="site-brand__mark">П</span>
    </span>
  <?php endif; ?>
</a>
