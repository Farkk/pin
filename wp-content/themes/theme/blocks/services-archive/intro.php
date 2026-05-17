<?php
/**
 * Services archive intro block.
 *
 * @package theme
 */

$intro = theme_get_acf_group(
  'services_archive_intro',
  array(
    'kicker' => 'Услуги',
    'title'  => 'Услуги производства и рекламы',
    'text'   => 'Выберите услугу для подробностей и расчета. Для каждой услуги подготовлены отдельные посадочные блоки под SEO: наружная реклама, вывески, УФ-печать, баннеры, полиграфия и широкоформатная печать.',
  )
);
?>

<section class="services-archive-intro-section">
  <div class="section-shell">
    <div class="services-archive-intro">
      <span class="section-kicker"><?php echo esc_html( $intro['kicker'] ); ?></span>
      <h1 class="services-archive-intro__title"><?php echo esc_html( $intro['title'] ); ?></h1>
      <p class="services-archive-intro__lead"><?php echo esc_html( $intro['text'] ); ?></p>
    </div>
  </div>
</section>
