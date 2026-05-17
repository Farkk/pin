<?php
/**
 * Outdoor advertising process block.
 *
 * @package theme
 */

$process = theme_get_acf_group(
  'service_outdoor_process',
  array(
    'title' => 'Что входит в услугу',
    'list'  => "Бриф и замер.\nПодбор конструкции и материалов.\nПодготовка расчета и макета.\nПроизводство и контроль качества.\nДоставка, монтаж и сдача объекта.",
    'text'  => 'Подходим и для быстрых локальных задач, и для регулярных запусков в сетевом формате.',
    'image' => '',
  )
);

$process_items = theme_parse_multiline_choices( $process['list'] );
$process_image_url = theme_get_image_url( $process['image'] );
?>

<section class="service-outdoor-process-section">
  <div class="section-shell">
    <div class="service-outdoor-process-grid">
      <article class="service-outdoor-process-card">
        <h2 class="service-outdoor-process-card__title"><?php echo esc_html( $process['title'] ); ?></h2>
        <p class="service-outdoor-process-card__list">
          <?php foreach ( $process_items as $index => $process_item ) : ?>
            <?php echo esc_html( (string) ( $index + 1 ) . '. ' . $process_item ); ?><br>
          <?php endforeach; ?>
        </p>
        <p class="service-outdoor-process-card__text"><?php echo esc_html( $process['text'] ); ?></p>
      </article>

      <div class="service-outdoor-process-photo<?php echo esc_attr( theme_get_image_placeholder_class( $process_image_url ) ); ?>"<?php echo theme_get_background_style( $process_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $process_image_url, '720×420' ); ?>></div>
    </div>
  </div>
</section>
