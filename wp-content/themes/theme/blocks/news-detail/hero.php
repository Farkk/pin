<?php
/**
 * News detail hero block.
 *
 * @package theme
 */

if ( is_singular( 'theme_news' ) ) {
  $post_id        = get_the_ID();
  $hero_title     = get_the_title( $post_id );
  $hero_lead      = get_the_excerpt( $post_id );
  $hero_image_url = get_the_post_thumbnail_url( $post_id, 'full' );

  if ( ! $hero_lead ) {
    $hero_lead = wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 34, '...' );
  }

  $hero = array(
    'kicker' => 'Новость',
    'meta'   => get_the_date( 'd.m.Y', $post_id ),
    'title'  => $hero_title,
    'lead'   => $hero_lead,
  );
} else {
  $hero = theme_get_acf_group(
    'news_detail_hero',
    array(
      'kicker' => 'Материал',
      'meta'   => '12 мая 2026 · Производство · Монтаж',
      'title'  => 'Как мы запускаем наружную рекламу от замера до монтажа',
      'lead'   => 'Разбираем рабочий процесс без декоративной витрины: что нужно получить от клиента, где начинается реальный расчет, как не потерять сроки и в какой момент производство подключает монтажную часть.',
      'image'  => '',
    )
  );

  $hero_image_url = theme_get_image_url( $hero['image'] );
}
?>

<section class="news-detail-hero-section">
  <div class="section-shell">
    <div class="news-detail-hero">
      <div class="news-detail-hero__copy">
        <span class="section-kicker"><?php echo esc_html( $hero['kicker'] ); ?></span>
        <span class="news-detail-hero__meta"><?php echo esc_html( $hero['meta'] ); ?></span>
        <h1 class="news-detail-hero__title"><?php echo esc_html( $hero['title'] ); ?></h1>
        <p class="news-detail-hero__lead"><?php echo esc_html( $hero['lead'] ); ?></p>
      </div>

      <div class="news-detail-hero__visual<?php echo esc_attr( theme_get_image_placeholder_class( $hero_image_url ) ); ?>"<?php echo theme_get_background_style( $hero_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $hero_image_url, '720×520' ); ?>></div>
    </div>
  </div>
</section>
