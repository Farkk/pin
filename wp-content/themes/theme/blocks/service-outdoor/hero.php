<?php
/**
 * Outdoor advertising hero block.
 *
 * @package theme
 */

$hero = theme_get_acf_group(
  'service_outdoor_hero',
  array(
    'kicker'                => 'Услуга',
    'title'                 => 'Наружная реклама под задачу бизнеса',
    'text'                  => 'Проектируем и производим вывески, световые короба, объемные буквы и фасадные конструкции. Работаем от идеи и замера до монтажа и сервисного сопровождения.',
    'primary_button_text'   => 'Получить расчет',
    'primary_button_url'    => '#request',
    'secondary_button_text' => 'Написать в WhatsApp',
    'secondary_button_url'  => '#contacts',
    'bullet_1'              => 'Замер и проект',
    'bullet_2'              => "Собственное\nпроизводство",
    'bullet_3'              => 'Монтаж под ключ',
    'main_image'            => '',
    'second_image'          => '',
    'third_image'           => '',
  )
);

$outdoor_bullets = array(
  $hero['bullet_1'],
  $hero['bullet_2'],
  $hero['bullet_3'],
);

$primary_button_url   = $hero['primary_button_url'] ?: '#request';
$secondary_button_url = $hero['secondary_button_url'] ?: '#contacts';
if ( theme_get_whatsapp_url() && ( '#contacts' === $secondary_button_url || false !== stripos( $hero['secondary_button_text'], 'WhatsApp' ) ) ) {
  $secondary_button_url = theme_get_whatsapp_url();
}

$main_image_url   = theme_get_image_url( $hero['main_image'] );
$second_image_url = theme_get_image_url( $hero['second_image'] );
$third_image_url  = theme_get_image_url( $hero['third_image'] );
?>

<section class="service-outdoor-hero-section">
  <div class="section-shell">
    <div class="service-outdoor-hero-grid">
      <div class="service-outdoor-hero-card">
        <div class="service-outdoor-hero-copy">
          <span class="section-kicker"><?php echo esc_html( $hero['kicker'] ); ?></span>
          <h1 class="service-outdoor-hero-title"><?php echo esc_html( $hero['title'] ); ?></h1>
          <p class="service-outdoor-hero-text"><?php echo esc_html( $hero['text'] ); ?></p>

          <div class="service-outdoor-hero-actions">
            <a class="button button--accent" href="<?php echo esc_url( $primary_button_url ); ?>" data-request-modal data-request-modal-context="<?php echo esc_attr( $hero['primary_button_text'] ); ?>"><?php echo esc_html( $hero['primary_button_text'] ); ?></a>
            <a class="button button--ghost" href="<?php echo esc_url( $secondary_button_url ); ?>"><?php echo esc_html( $hero['secondary_button_text'] ); ?></a>
          </div>
        </div>

        <div class="service-outdoor-hero-bullets">
          <?php foreach ( $outdoor_bullets as $outdoor_bullet ) : ?>
            <div class="service-outdoor-hero-bullet"><?php echo nl2br( esc_html( $outdoor_bullet ) ); ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="service-outdoor-visuals">
        <div class="service-outdoor-visual service-outdoor-visual--main<?php echo esc_attr( theme_get_image_placeholder_class( $main_image_url ) ); ?>"<?php echo theme_get_background_style( $main_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $main_image_url, '720×980' ); ?>></div>

        <div class="service-outdoor-visual-row">
          <div class="service-outdoor-visual service-outdoor-visual--second<?php echo esc_attr( theme_get_image_placeholder_class( $second_image_url ) ); ?>"<?php echo theme_get_background_style( $second_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $second_image_url, '720×260' ); ?>></div>
          <div class="service-outdoor-visual service-outdoor-visual--third<?php echo esc_attr( theme_get_image_placeholder_class( $third_image_url ) ); ?>"<?php echo theme_get_background_style( $third_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $third_image_url, '720×260' ); ?>></div>
        </div>
      </div>
    </div>
  </div>
</section>
