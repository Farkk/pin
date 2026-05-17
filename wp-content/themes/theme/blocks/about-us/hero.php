<?php
/**
 * About us hero block.
 *
 * @package theme
 */

$hero = theme_get_acf_group(
  'about_us_hero',
  array(
    'kicker'  => 'О компании',
    'title'   => 'Производство рекламы, которое держит сроки и качество на своих мощностях',
    'text'    => 'Мы работаем как одна производственная команда: проектируем, печатаем, собираем и монтируем без разрыва между подрядчиками. Поэтому клиент получает понятный процесс, стабильный результат и быстрый ответ на любой этап работ.',
    'point_1' => '12+ лет на рынке',
    'point_2' => "Собственный парк\nоборудования",
    'point_3' => "Монтаж и логистика\nпод ключ",
    'main_image'   => '',
    'top_image'    => '',
    'bottom_image' => '',
  )
);

$about_points = array(
  $hero['point_1'],
  $hero['point_2'],
  $hero['point_3'],
);

$main_image_url   = theme_get_image_url( $hero['main_image'] );
$top_image_url    = theme_get_image_url( $hero['top_image'] );
$bottom_image_url = theme_get_image_url( $hero['bottom_image'] );
?>

<section class="about-us-hero-section">
  <div class="section-shell">
    <div class="about-us-hero-grid">
      <div class="about-us-hero-card">
        <div class="about-us-hero-copy">
          <span class="section-kicker"><?php echo esc_html( $hero['kicker'] ); ?></span>
          <h1 class="about-us-hero-title"><?php echo esc_html( $hero['title'] ); ?></h1>
          <p class="section-text about-us-hero-text"><?php echo esc_html( $hero['text'] ); ?></p>
        </div>

        <div class="about-us-hero-points">
          <?php foreach ( $about_points as $about_point ) : ?>
            <div class="about-us-hero-point">
              <?php echo nl2br( esc_html( $about_point ) ); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="about-us-photo-mosaic">
        <div class="about-us-photo about-us-photo--main<?php echo esc_attr( theme_get_image_placeholder_class( $main_image_url ) ); ?>"<?php echo theme_get_background_style( $main_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $main_image_url, '720×1240' ); ?>></div>
        <div class="about-us-photo-stack">
          <div class="about-us-photo about-us-photo--top<?php echo esc_attr( theme_get_image_placeholder_class( $top_image_url ) ); ?>"<?php echo theme_get_background_style( $top_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $top_image_url, '720×600' ); ?>></div>
          <div class="about-us-photo about-us-photo--bottom<?php echo esc_attr( theme_get_image_placeholder_class( $bottom_image_url ) ); ?>"<?php echo theme_get_background_style( $bottom_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $bottom_image_url, '720×600' ); ?>></div>
        </div>
      </div>
    </div>
  </div>
</section>
