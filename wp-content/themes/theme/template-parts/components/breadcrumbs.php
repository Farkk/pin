<?php
/**
 * Breadcrumbs component.
 *
 * @package theme
 */

if ( ! theme_should_show_breadcrumbs() ) {
  return;
}

$items = theme_get_breadcrumbs();

if ( count( $items ) < 2 ) {
  return;
}
?>

<nav class="site-breadcrumbs" aria-label="<?php esc_attr_e( 'Хлебные крошки', 'theme' ); ?>">
  <div class="section-shell">
    <ol class="site-breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
      <?php foreach ( $items as $index => $item ) : ?>
        <?php
        $is_last   = $index === count( $items ) - 1;
        $item_url  = ! empty( $item['url'] ) ? $item['url'] : '';
        $item_label = $item['label'] ?? '';
        ?>
        <li
          class="site-breadcrumbs__item<?php echo $is_last ? ' site-breadcrumbs__item--current' : ''; ?>"
          itemprop="itemListElement"
          itemscope
          itemtype="https://schema.org/ListItem">
          <?php if ( ! $is_last && $item_url ) : ?>
            <a class="site-breadcrumbs__link" href="<?php echo esc_url( $item_url ); ?>" itemprop="item">
              <span itemprop="name"><?php echo esc_html( $item_label ); ?></span>
            </a>
          <?php else : ?>
            <?php
            $current_item_url = $item_url;

            if ( ! $current_item_url && $is_last ) {
              if ( is_singular() ) {
                $current_item_url = get_permalink();
              } else {
                $current_item_url = home_url( add_query_arg( array() ) );
              }
            }
            ?>
            <span class="site-breadcrumbs__current" itemprop="name"<?php echo $is_last ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $item_label ); ?></span>
            <?php if ( $current_item_url ) : ?>
              <meta itemprop="item" content="<?php echo esc_url( $current_item_url ); ?>">
            <?php endif; ?>
          <?php endif; ?>
          <meta itemprop="position" content="<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
          <?php if ( ! $is_last ) : ?>
            <span class="site-breadcrumbs__separator" aria-hidden="true">/</span>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</nav>
