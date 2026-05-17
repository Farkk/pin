<?php
/**
 * Telegram subscribe block.
 *
 * @package theme
 */

$telegram_url = function_exists( 'theme_get_telegram_url' ) ? theme_get_telegram_url() : '';
$telegram     = theme_get_acf_group(
  'front_page_telegram',
  array(
    'kicker'      => 'Telegram',
    'title'       => 'Подписывайтесь на наш Telegram-канал',
    'text'        => 'Показываем готовые работы, процесс производства, полезные заметки по макетам и свежие новости компании.',
    'button_text' => 'Перейти в Telegram',
    'button_url'  => $telegram_url,
  ),
  5
);

$button_url = $telegram['button_url'] ?: $telegram_url;

if ( ! $button_url ) {
  return;
}
?>

<section class="telegram-subscribe-section">
  <div class="section-shell">
    <div class="telegram-subscribe">
      <div class="telegram-subscribe__copy">
        <span class="section-kicker"><?php echo esc_html( $telegram['kicker'] ); ?></span>
        <h2 class="telegram-subscribe__title"><?php echo esc_html( $telegram['title'] ); ?></h2>
        <p class="telegram-subscribe__text"><?php echo esc_html( $telegram['text'] ); ?></p>
      </div>

      <a class="button button--accent telegram-subscribe__button" href="<?php echo esc_url( $button_url ); ?>" target="_blank" rel="noopener">
        <?php echo esc_html( $telegram['button_text'] ); ?>
      </a>
    </div>
  </div>
</section>
