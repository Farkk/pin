<?php
/**
 * Services block.
 *
 * @package theme
 */

$services = theme_get_acf_group(
  'front_page_services',
  array(
    'kicker'             => 'Услуги',
    'title'              => 'Весь цикл рекламного производства в одной команде',
    'text'               => 'Собрали ключевые направления в асимметричную витрину: быстро видно, что мы делаем, и куда кликать дальше за расчетом.',
  )
);

$service_cards = theme_get_service_cards();
?>

<section class="services-section" id="services">
  <div class="section-shell">
    <div class="services-panel">
      <div class="services-intro">
        <span class="section-kicker"><?php echo esc_html( $services['kicker'] ); ?></span>
        <h2 class="section-title"><?php echo esc_html( $services['title'] ); ?></h2>
        <p class="section-text"><?php echo esc_html( $services['text'] ); ?></p>
      </div>

      <div class="services-grid">
        <?php foreach ( $service_cards as $service_card ) : ?>
          <article class="service-card <?php echo esc_attr( $service_card['home_modifier'] ); ?><?php echo esc_attr( theme_get_image_placeholder_class( $service_card['image_url'] ) ); ?>"<?php echo theme_get_background_style( $service_card['image_url'], '--service-card-image' ); ?><?php echo theme_get_image_placeholder_attrs( $service_card['image_url'], '720×420' ); ?>>
            <div class="service-card__overlay">
              <h3 class="service-card__title"><?php echo esc_html( $service_card['title'] ); ?></h3>
              <p class="service-card__text"><?php echo esc_html( $service_card['text'] ); ?></p>
              <a class="service-card__button service-card__button--<?php echo esc_attr( $service_card['button_variant'] ); ?>" href="<?php echo esc_url( $service_card['url'] ); ?>">
                <?php echo esc_html( $service_card['button_text'] ); ?>
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
