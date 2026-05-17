<?php
/**
 * Single portfolio template.
 *
 * @package theme
 */

get_header();

$post_id = get_the_ID();
$content = theme_get_acf_group(
  'portfolio_content',
  array(
    'kicker'       => 'Кейс',
    'description'  => get_the_excerpt( $post_id ),
    'client'       => '',
    'duration'     => '',
    'composition'  => '',
    'cover'        => '',
    'cover_url'    => '',
    'gallery'      => array(),
    'gallery_urls' => '',
    'result_title' => 'Результат проекта',
    'result_text'  => '',
    'scope_title'  => 'Что было сделано',
    'scope_list'   => '',
  ),
  $post_id
);

$cover_url = theme_get_group_image_url( $content, 'cover', 'cover_url' );
$gallery   = array();

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

$gallery_cover_url = $gallery[0] ?? '';

if ( $gallery_cover_url ) {
  $cover_url = $gallery_cover_url;
}

if ( empty( $gallery ) && $cover_url ) {
  $gallery = array( $cover_url );
}

$visuals = array_values(
  array_filter(
    array_merge(
      $cover_url ? array( $cover_url ) : array(),
      $gallery
    )
  )
);
$visuals = array_values( array_unique( $visuals ) );

if ( empty( $visuals ) && $cover_url ) {
  $visuals[] = $cover_url;
}

$meta_items = array(
  array(
    'label' => 'Клиент',
    'value' => $content['client'] ?: get_the_title( $post_id ),
    'style' => 'light',
  ),
  array(
    'label' => 'Срок',
    'value' => $content['duration'] ?: '12 дней',
    'style' => 'dark',
  ),
  array(
    'label' => 'Состав',
    'value' => $content['composition'] ?: 'Производство + монтаж',
    'style' => 'muted',
  ),
);

$scope_items = theme_parse_multiline_choices(
  (string) $content['scope_list'],
  array(
    'Замер объекта',
    'Подбор конструкции',
    'Производство элементов',
    'Монтаж и сдача',
  )
);
$detail_kicker = ! empty( $content['kicker'] ) && 'Портфолио' !== $content['kicker'] ? $content['kicker'] : 'Кейс';
?>

<main class="site-main portfolio-single-page">
  <section class="portfolio-detail-section">
    <div class="section-shell">
      <div class="portfolio-detail">
        <div class="portfolio-detail__intro">
          <span class="section-kicker"><?php echo esc_html( $detail_kicker ); ?></span>
          <h1 class="portfolio-detail__title"><?php the_title(); ?></h1>
          <p class="portfolio-detail__lead"><?php echo esc_html( $content['description'] ?: get_the_excerpt( $post_id ) ); ?></p>
        </div>

        <div class="portfolio-detail__meta">
          <?php foreach ( $meta_items as $meta_item ) : ?>
            <div class="portfolio-meta portfolio-meta--<?php echo esc_attr( $meta_item['style'] ); ?>">
              <span class="portfolio-meta__label"><?php echo esc_html( $meta_item['label'] ); ?></span>
              <span class="portfolio-meta__value"><?php echo esc_html( $meta_item['value'] ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="portfolio-detail__visual">
          <?php $main_visual_url = $visuals[0] ?? ''; ?>
          <?php if ( $main_visual_url ) : ?>
            <a class="portfolio-detail__photo portfolio-detail__photo--main" href="<?php echo esc_url( $main_visual_url ); ?>"<?php echo theme_get_background_style( $main_visual_url ); ?> target="_blank" rel="noopener">
              <span class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></span>
            </a>
          <?php else : ?>
            <div class="portfolio-detail__photo portfolio-detail__photo--main image-placeholder" data-placeholder-size="900×700"></div>
          <?php endif; ?>

          <div class="portfolio-detail__side">
            <?php for ( $index = 1; $index <= 2; $index++ ) : ?>
              <?php $image_url = $visuals[ $index ] ?? ( $visuals[0] ?? '' ); ?>
              <?php if ( $image_url ) : ?>
                <a class="portfolio-detail__photo" href="<?php echo esc_url( $image_url ); ?>"<?php echo theme_get_background_style( $image_url ); ?> target="_blank" rel="noopener">
                  <span class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></span>
                </a>
              <?php else : ?>
                <div class="portfolio-detail__photo image-placeholder" data-placeholder-size="720×330"></div>
              <?php endif; ?>
            <?php endfor; ?>
          </div>
        </div>

        <div class="portfolio-detail__result">
          <article class="portfolio-detail__panel portfolio-detail__panel--light">
            <h2><?php echo esc_html( $content['result_title'] ?: 'Результат проекта' ); ?></h2>
            <p><?php echo esc_html( $content['result_text'] ?: ( $content['description'] ?: get_the_excerpt( $post_id ) ) ); ?></p>
          </article>

          <article class="portfolio-detail__panel portfolio-detail__panel--muted">
            <h2><?php echo esc_html( $content['scope_title'] ?: 'Что было сделано' ); ?></h2>
            <ul>
              <?php foreach ( $scope_items as $scope_item ) : ?>
                <li><?php echo esc_html( $scope_item ); ?></li>
              <?php endforeach; ?>
            </ul>
          </article>
        </div>
      </div>
    </div>
  </section>

  <?php if ( count( $visuals ) > 3 ) : ?>
    <section class="portfolio-gallery-section">
      <div class="section-shell">
        <div class="portfolio-gallery">
          <?php foreach ( array_slice( $visuals, 3 ) as $image_url ) : ?>
            <a class="portfolio-gallery__item" href="<?php echo esc_url( $image_url ); ?>"<?php echo theme_get_background_style( $image_url ); ?> target="_blank" rel="noopener">
              <span class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>

<?php
get_footer();
