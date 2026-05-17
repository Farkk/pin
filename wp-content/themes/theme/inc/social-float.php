<?php
/**
 * Floating social links widget.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_render_social_float' ) ) {
  /**
   * Render a fixed social links tooltip.
   *
   * @return void
   */
  function theme_render_social_float(): void {
    $social_links = array(
      array(
        'label' => 'WhatsApp',
        'url'   => theme_get_whatsapp_url() ?: '#contacts',
      ),
      array(
        'label' => 'Telegram',
        'url'   => theme_get_telegram_url() ?: '#contacts',
      ),
      array(
        'label' => 'Max',
        'url'   => theme_get_max_url() ?: '#contacts',
      ),
    );
    ?>
    <div class="social-float" data-social-float>
      <div class="social-float__panel" id="social-float-panel" data-social-float-panel hidden>
        <?php foreach ( $social_links as $social_link ) : ?>
          <a class="social-float__link" href="<?php echo esc_url( $social_link['url'] ); ?>" target="_blank" rel="noopener">
            <?php echo esc_html( $social_link['label'] ); ?>
          </a>
        <?php endforeach; ?>
      </div>

      <button
        class="social-float__button"
        type="button"
        aria-controls="social-float-panel"
        aria-expanded="false"
        data-social-float-toggle>
        <span class="social-float__button-text">Связь</span>
        <span class="social-float__button-icon" aria-hidden="true"></span>
      </button>
    </div>
    <?php
  }

  add_action( 'wp_footer', 'theme_render_social_float', 8 );
}
