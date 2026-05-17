<?php
/**
 * Footer layout.
 *
 * @package theme
 */

$contact_phone      = theme_get_contact_phone();
$contact_phone_href = theme_get_contact_phone_href();
$contact_address    = theme_get_contact_address();
$whatsapp_url       = theme_get_whatsapp_url() ?: '#contacts';
$telegram_url       = theme_get_telegram_url() ?: '#contacts';
$max_url            = theme_get_max_url() ?: '#contacts';
$legal_links        = array(
  array(
    'label'    => 'Согласие на обработку персональных данных',
    'template' => 'templates/personal-data-consent.php',
    'fallback' => '/soglasie-na-obrabotku-personalnyh-dannyh/',
  ),
  array(
    'label'    => 'Политика обработки персональных данных',
    'template' => 'templates/personal-data-policy.php',
    'fallback' => '/politika-obrabotki-personalnyh-dannyh/',
  ),
  array(
    'label'    => 'Политика конфиденциальности',
    'template' => 'templates/privacy-policy.php',
    'fallback' => '/politika-konfidencialnosti/',
  ),
);
?>

<footer class="site-footer" id="contacts">
  <div class="section-shell">
    <div class="site-footer__panel">
      <div class="site-footer__brand">
        <?php get_template_part( 'template-parts/components/brand', null, array( 'compact' => true, 'footer' => true ) ); ?>

        <p class="site-footer__meta">
          Наружная реклама · УФ-печать · Полиграфия
          <br>
          <?php echo esc_html( $contact_address ); ?> · выезд на замер
        </p>
      </div>

      <div class="site-footer__links">
        <a class="chip" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener">WhatsApp</a>
        <a class="chip" href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener">Telegram</a>
        <a class="chip" href="<?php echo esc_url( $max_url ); ?>" target="_blank" rel="noopener">Max</a>
      </div>

      <div class="site-footer__contact">
        <span class="site-footer__label">Связаться сейчас</span>
        <a class="site-footer__phone" href="<?php echo esc_url( $contact_phone_href ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
        <!--<span class="site-footer__copy">Ответим в течение 10 минут</span>-->
      </div>

      <nav class="site-footer__legal" aria-label="<?php esc_attr_e( 'Правовая информация', 'theme' ); ?>">
        <?php foreach ( $legal_links as $legal_link ) : ?>
          <a class="site-footer__legal-link" href="<?php echo esc_url( theme_get_page_url_by_template( $legal_link['template'], $legal_link['fallback'] ) ); ?>">
            <?php echo esc_html( $legal_link['label'] ); ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>
</footer>
