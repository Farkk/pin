<?php
/**
 * Yandex reviews widget block.
 *
 * @package theme
 */

$reviews_url = 'https://yandex.com/maps/org/pingvin/6247578391/reviews/?ll=37.735701%2C55.452166&utm_campaign=v1&utm_medium=rating&utm_source=badge&z=14';
?>

<section class="reviews-widget-section" aria-label="<?php esc_attr_e( 'Отзывы', 'theme' ); ?>">
  <div class="section-shell">
    <div class="reviews-widget">
      <iframe
        class="reviews-widget__frame"
        src="https://yandex.ru/maps-reviews-widget/6247578391?comments"
        title="<?php esc_attr_e( 'Отзывы о Пингвин на Яндекс Картах', 'theme' ); ?>"
        loading="lazy"></iframe>
      <a class="reviews-widget__link" href="<?php echo esc_url( $reviews_url ); ?>" target="_blank" rel="noopener">
        <?php esc_html_e( 'Пингвин на карте - Яндекс.Карты', 'theme' ); ?>
      </a>
    </div>
  </div>
</section>
