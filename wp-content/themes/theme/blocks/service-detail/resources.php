<?php
/**
 * Service resources: AP/KP downloads and Yandex map.
 *
 * @package theme
 */

$post_id   = get_the_ID();
$resources = theme_get_service_resources( $post_id );

if ( empty( $resources['enabled'] ) ) {
  return;
}

$has_downloads = ! empty( $resources['downloads'] );
$has_map       = ! empty( $resources['map']['enabled'] );
$map_districts = $resources['map']['districts'];
$api_key       = theme_get_yandex_maps_api_key();
?>

<section class="service-resources-section">
  <div class="section-shell">
    <?php if ( ! empty( $resources['section_title'] ) ) : ?>
      <div class="service-resources-section__head">
        <h2 class="section-title section-title--compact"><?php echo esc_html( $resources['section_title'] ); ?></h2>
      </div>
    <?php endif; ?>

    <?php if ( $has_downloads ) : ?>
      <div class="service-resources-downloads">
        <?php foreach ( $resources['downloads'] as $download ) : ?>
          <a class="service-resources-download" href="<?php echo esc_url( $download['url'] ); ?>" download>
            <span class="service-resources-download__badge">PDF</span>
            <span class="service-resources-download__body">
              <span class="service-resources-download__title"><?php echo esc_html( $download['title'] ); ?></span>
              <?php if ( ! empty( $download['text'] ) ) : ?>
                <span class="service-resources-download__text"><?php echo esc_html( $download['text'] ); ?></span>
              <?php endif; ?>
            </span>
            <span class="service-resources-download__action" aria-hidden="true">Скачать</span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ( $has_map ) : ?>
      <div class="service-resources-map">
        <div class="service-resources-map__head">
          <h3 class="service-resources-map__title"><?php echo esc_html( $resources['map']['title'] ); ?></h3>
          <?php if ( ! empty( $resources['map']['text'] ) ) : ?>
            <p class="service-resources-map__text"><?php echo esc_html( $resources['map']['text'] ); ?></p>
          <?php endif; ?>
        </div>

        <?php if ( count( $map_districts ) > 1 ) : ?>
          <div class="service-resources-map__filters" data-service-map-filters>
            <button class="chip is-active" type="button" data-service-map-district="all"><?php esc_html_e( 'Все районы', 'theme' ); ?></button>
            <?php foreach ( $map_districts as $district_slug => $district_label ) : ?>
              <button class="chip" type="button" data-service-map-district="<?php echo esc_attr( $district_slug ); ?>"><?php echo esc_html( $district_label ); ?></button>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ( $api_key ) : ?>
          <div class="service-resources-map__canvas" id="service-yandex-map" data-service-map-canvas></div>
        <?php else : ?>
          <p class="service-resources-map__notice"><?php esc_html_e( 'Карта временно недоступна: укажите API-ключ Яндекс.Карт в настройках темы.', 'theme' ); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
