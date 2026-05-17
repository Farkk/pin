<?php
/**
 * Outdoor advertising highlights block.
 *
 * @package theme
 */

$highlights = theme_get_acf_group(
  'service_outdoor_highlights',
  array(
    'item_1_title' => 'Вывески и фасады',
    'item_1_text'  => 'От единичных объектов до сетевых запусков.',
    'item_2_title' => 'Световые решения',
    'item_2_text'  => 'Короба, буквы и подсветка под условия объекта.',
    'item_3_title' => 'Монтаж',
    'item_3_text'  => 'С выездом, согласованием и техническим сопровождением.',
  )
);

$outdoor_highlights = array(
  array(
    'title' => $highlights['item_1_title'],
    'text'  => $highlights['item_1_text'],
  ),
  array(
    'title'    => $highlights['item_2_title'],
    'text'     => $highlights['item_2_text'],
    'modifier' => 'service-outdoor-highlight--dark',
  ),
  array(
    'title'    => $highlights['item_3_title'],
    'text'     => $highlights['item_3_text'],
    'modifier' => 'service-outdoor-highlight--muted',
  ),
);
?>

<section class="service-outdoor-highlights-section">
  <div class="section-shell">
    <div class="service-outdoor-highlights">
      <?php foreach ( $outdoor_highlights as $outdoor_highlight ) : ?>
        <article class="service-outdoor-highlight<?php echo ! empty( $outdoor_highlight['modifier'] ) ? ' ' . esc_attr( $outdoor_highlight['modifier'] ) : ''; ?>">
          <h2 class="service-outdoor-highlight__title"><?php echo esc_html( $outdoor_highlight['title'] ); ?></h2>
          <p class="service-outdoor-highlight__text"><?php echo esc_html( $outdoor_highlight['text'] ); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
