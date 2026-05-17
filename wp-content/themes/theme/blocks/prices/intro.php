<?php
/**
 * Prices intro block.
 *
 * @package theme
 */

$intro = theme_get_acf_group(
  'prices_intro',
  array(
    'kicker' => 'Цены',
    'title'  => 'Цены',
    'text'   => 'Актуальные цены на вывески, широкоформатную печать, полиграфию, брендирование, лазерную гравировку и дизайн-макеты. В прайсе указаны ориентировочные цены, точная стоимость зависит от технического задания и материалов.',
  )
);
?>

<section class="prices-intro-section">
  <div class="section-shell">
    <div class="prices-intro">
      <span class="section-kicker"><?php echo esc_html( $intro['kicker'] ); ?></span>
      <h1 class="prices-intro__title"><?php echo esc_html( $intro['title'] ); ?></h1>
      <p class="prices-intro__lead"><?php echo esc_html( $intro['text'] ); ?></p>
    </div>
  </div>
</section>
