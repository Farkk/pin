<?php
/**
 * Services archive grid block.
 *
 * @package theme
 */

$service_cards = theme_get_service_cards();
$split_at      = (int) ceil( count( $service_cards ) / 2 );
$columns       = array(
  array_slice( $service_cards, 0, $split_at ),
  array_slice( $service_cards, $split_at ),
);
?>

<section class="services-archive-grid-section">
  <div class="section-shell">
    <div class="services-archive-grid">
      <?php foreach ( $columns as $column_cards ) : ?>
        <?php if ( empty( $column_cards ) ) : ?>
          <?php continue; ?>
        <?php endif; ?>

        <div class="services-archive-grid__column">
          <?php foreach ( $column_cards as $service_card ) : ?>
            <article class="services-archive-card <?php echo esc_attr( $service_card['archive_modifier'] ); ?><?php echo esc_attr( theme_get_image_placeholder_class( $service_card['image_url'] ) ); ?>"<?php echo theme_get_background_style( $service_card['image_url'], '--services-archive-image' ); ?><?php echo theme_get_image_placeholder_attrs( $service_card['image_url'], '720×360' ); ?>>
              <div class="services-archive-card__body">
                <span class="services-archive-card__index"><?php echo esc_html( $service_card['index'] ); ?></span>
                <h2 class="services-archive-card__title"><?php echo esc_html( $service_card['title'] ); ?></h2>
                <p class="services-archive-card__text"><?php echo esc_html( $service_card['text'] ); ?></p>
              </div>

              <a class="services-archive-card__button services-archive-card__button--<?php echo esc_attr( 'light' === $service_card['button_variant'] ? 'light' : ( 'dark' === $service_card['button_variant'] ? 'dark' : 'accent' ) ); ?>" href="<?php echo esc_url( $service_card['url'] ); ?>">
                <?php echo esc_html( $service_card['button_text'] ); ?>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
