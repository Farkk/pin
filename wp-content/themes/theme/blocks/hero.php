<?php
/**
 * Hero block.
 *
 * @package theme
 */

$hero = theme_get_acf_group(
  'front_page_hero',
  array(
    'kicker'                 => 'Собственное производство · монтаж · доставка',
    'title'                  => 'Наружная реклама и печать под ключ',
    'text'                   => 'Запускаем вывески, баннеры, УФ-печать и полиграфию без длинной цепочки подрядчиков: расчет в день обращения, производство от 1 дня, контроль качества на каждом этапе.',
    'primary_button_text'    => 'Рассчитать стоимость',
    'primary_button_url'     => '#request',
    'secondary_button_text'  => 'Написать в WhatsApp',
    'secondary_button_url'   => '#contacts',
    'benefit_1'              => 'Собственное производство',
    'benefit_2'              => 'Сроки от 1 дня',
    'benefit_3'              => 'Гарантия качества',
    'main_case_title'        => 'Вывески и фасады',
    'main_case_image'        => '',
    'side_case_top_title'    => 'УФ-печать',
    'side_case_top_image'    => '',
    'side_case_bottom_title' => 'Баннеры и тиражи',
    'side_case_bottom_image' => '',
  )
);

$benefits = array(
  $hero['benefit_1'],
  $hero['benefit_2'],
  $hero['benefit_3'],
);

$primary_button_url   = $hero['primary_button_url'] ?: '#request';
$secondary_button_url = $hero['secondary_button_url'] ?: '#contacts';
if ( theme_get_whatsapp_url() && ( '#contacts' === $secondary_button_url || false !== stripos( $hero['secondary_button_text'], 'WhatsApp' ) ) ) {
  $secondary_button_url = theme_get_whatsapp_url();
}

$main_case_title = $hero['main_case_title'];

$side_cases = array(
  array(
    'title' => $hero['side_case_top_title'],
    'image' => theme_get_image_url( $hero['side_case_top_image'] ),
    'size'  => '620×400',
  ),
  array(
    'title' => $hero['side_case_bottom_title'],
    'image' => theme_get_image_url( $hero['side_case_bottom_image'] ),
    'size'  => '620×400',
  ),
);

$main_case_image_url = theme_get_image_url( $hero['main_case_image'] );
?>

<section class="hero-section" id="company">
  <div class="section-shell">
    <div class="hero-grid">
      <div class="hero-panel hero-panel--copy">
        <div class="hero-copy">
          <span class="section-kicker"><?php echo esc_html( $hero['kicker'] ); ?></span>
          <h1 class="hero-title"><?php echo esc_html( $hero['title'] ); ?></h1>
          <p class="hero-text"><?php echo esc_html( $hero['text'] ); ?></p>

          <div class="hero-actions">
            <a class="button button--accent" href="<?php echo esc_url( $primary_button_url ); ?>" data-request-modal data-request-modal-context="<?php echo esc_attr( $hero['primary_button_text'] ); ?>">
              <?php echo esc_html( $hero['primary_button_text'] ); ?>
            </a>
            <a class="button button--ghost" href="<?php echo esc_url( $secondary_button_url ); ?>">
              <?php echo esc_html( $hero['secondary_button_text'] ); ?>
            </a>
          </div>
        </div>

        <div class="hero-benefits">
          <?php foreach ( $benefits as $benefit ) : ?>
            <div class="hero-benefit">
              <span><?php echo esc_html( $benefit ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="hero-panel hero-panel--cases">
        <div class="hero-cases">
          <article class="hero-case hero-case--main<?php echo esc_attr( theme_get_image_placeholder_class( $main_case_image_url ) ); ?>"<?php echo theme_get_background_style( $main_case_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $main_case_image_url, '760×1640' ); ?>>
            <span class="hero-case__tag"><?php echo esc_html( $main_case_title ); ?></span>
          </article>

          <div class="hero-cases__stack">
            <?php foreach ( $side_cases as $index => $case_item ) : ?>
              <article class="hero-case <?php echo 0 === $index ? 'hero-case--top' : 'hero-case--bottom'; ?><?php echo esc_attr( theme_get_image_placeholder_class( $case_item['image'] ) ); ?>"<?php echo theme_get_background_style( $case_item['image'] ); ?><?php echo theme_get_image_placeholder_attrs( $case_item['image'], $case_item['size'] ); ?>>
                <span class="hero-case__tag"><?php echo esc_html( $case_item['title'] ); ?></span>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
