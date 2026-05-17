<?php
/**
 * Prices calc block.
 *
 * @package theme
 */

$calc = theme_get_acf_group(
  'prices_calc',
  array(
    'note_title'       => 'Что нужно для расчёта',
    'note_items'       => "Короткое описание задачи.\nРазмеры и количество: ширина, высота, тираж.\nМатериал или пример, который нравится.\nНужен ли монтаж и адрес объекта.\nФото фасада, витрины, места установки или файл макета.",
    'cta_title'        => 'Быстрый расчёт по фото',
    'cta_text'         => 'Для объектов в Домодедово, Москве и МО можно начать с фото места, примерных размеров и желаемого срока. Если нужно, договоримся о выезде на замер.',
    'cta_button_text'  => 'Отправить фото на расчёт',
    'cta_button_url'   => '#contacts',
  )
);

$calc_items = theme_parse_multiline_choices( $calc['note_items'] );
?>

<section class="prices-calc-section" id="prices">
  <div class="section-shell">
    <div class="prices-calc-grid">
      <article class="prices-note">
        <h2 class="prices-note__title"><?php echo esc_html( $calc['note_title'] ); ?></h2>
        <ol class="prices-note__list">
          <?php foreach ( $calc_items as $calc_item ) : ?>
            <li><?php echo esc_html( $calc_item ); ?></li>
          <?php endforeach; ?>
        </ol>
      </article>

      <article class="prices-cta">
        <h2 class="prices-cta__title"><?php echo esc_html( $calc['cta_title'] ); ?></h2>
        <p class="prices-cta__text"><?php echo esc_html( $calc['cta_text'] ); ?></p>
        <a class="button button--accent prices-cta__button" href="<?php echo esc_url( $calc['cta_button_url'] ?: '#request' ); ?>" data-request-modal data-request-modal-context="<?php echo esc_attr( $calc['cta_button_text'] ); ?>"><?php echo esc_html( $calc['cta_button_text'] ); ?></a>
      </article>
    </div>
  </div>
</section>
