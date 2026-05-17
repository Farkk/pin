<?php
/**
 * Portfolio archive template.
 *
 * @package theme
 */

get_header();

$query = new WP_Query(
  array(
    'post_type'      => 'theme_portfolio',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => array(
      'menu_order' => 'ASC',
      'date'       => 'DESC',
    ),
  )
);

$portfolio_items = array();

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();

    $content = theme_get_acf_group(
      'portfolio_content',
      array(
        'description' => get_the_excerpt(),
        'cover'       => '',
        'cover_url'   => '',
        'gallery'     => array(),
        'gallery_urls' => '',
      ),
      get_the_ID()
    );

    $gallery = array();

    if ( is_array( $content['gallery'] ) ) {
      foreach ( $content['gallery'] as $gallery_image ) {
        $gallery_url = theme_get_image_url( $gallery_image );

        if ( $gallery_url ) {
          $gallery[] = $gallery_url;
        }
      }
    } elseif ( is_string( $content['gallery'] ) ) {
      $gallery = theme_parse_url_lines( $content['gallery'] );
    }

    if ( empty( $gallery ) && ! empty( $content['gallery_urls'] ) ) {
      $gallery = theme_parse_url_lines( (string) $content['gallery_urls'] );
    }

    $cover = $gallery[0] ?? theme_get_group_image_url( $content, 'cover', 'cover_url' );

    $portfolio_items[] = array(
      'title'       => get_the_title(),
      'url'         => get_permalink(),
      'description' => $content['description'] ?: get_the_excerpt(),
      'cover'       => $cover,
    );
  }

  wp_reset_postdata();
}
?>

<main class="site-main portfolio-archive-page">
  <section class="portfolio-intro-section">
    <div class="section-shell">
      <div class="portfolio-intro">
        <span class="section-kicker">Портфолио</span>
        <h1 class="portfolio-intro__title">Подборка реализованных кейсов</h1>
        <p class="portfolio-intro__text">Смотрим на реальные объекты: вывески, фасады, баннеры, печать и комплексные запуски для бизнеса. Карточка кейса ведет в детальную страницу проекта.</p>
      </div>
    </div>
  </section>

  <section class="portfolio-grid-section">
    <div class="section-shell">
      <div class="portfolio-grid">
        <?php if ( ! empty( $portfolio_items ) ) : ?>
          <?php foreach ( array_chunk( $portfolio_items, (int) ceil( count( $portfolio_items ) / 2 ) ) as $column_index => $portfolio_column ) : ?>
            <div class="portfolio-grid__column portfolio-grid__column--<?php echo esc_attr( $column_index + 1 ); ?>">
              <?php foreach ( $portfolio_column as $item_index => $portfolio_item ) : ?>
                <?php $overlay_variant = 0 === $item_index % 2 ? 'dark' : 'light'; ?>
                <article class="portfolio-card">
                  <a class="portfolio-card__link<?php echo esc_attr( theme_get_image_placeholder_class( $portfolio_item['cover'] ) ); ?>" href="<?php echo esc_url( $portfolio_item['url'] ); ?>"<?php echo theme_get_background_style( $portfolio_item['cover'] ); ?><?php echo theme_get_image_placeholder_attrs( $portfolio_item['cover'], '720×520' ); ?>>
                    <span class="screen-reader-text"><?php echo esc_html( $portfolio_item['title'] ); ?></span>
                    <span class="portfolio-card__overlay portfolio-card__overlay--<?php echo esc_attr( $overlay_variant ); ?>">
                      <span class="portfolio-card__title"><?php echo esc_html( $portfolio_item['title'] ); ?></span>
                      <span class="portfolio-card__text"><?php echo esc_html( $portfolio_item['description'] ); ?></span>
                      <?php if ( 0 === $column_index && 0 === $item_index ) : ?>
                        <span class="portfolio-card__button">Смотреть кейс</span>
                      <?php endif; ?>
                    </span>
                  </a>
                </article>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p class="portfolio-empty">Работы пока не добавлены.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
