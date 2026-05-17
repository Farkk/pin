<?php
/**
 * Prices table block.
 *
 * @package theme
 */

$default_design_rows = <<<'ROWS'
# Визитки
Визитка односторонняя (90х50 мм, 4+0)|900|1 200|1 500
Визитка двусторонняя (90х50 мм, 4+4)|1 000|1 300|1 600
Правка макета визитки (адрес, телефон, имя фамилия)|500||
# Элементы фирменного стиля
Логотип. Разработка|10 000|15 000|25 000
Логотип. Отрисовка, восстановление (со скана, с фото) в векторный формат eps, ai, cdr|1 300|1 500|1 700
Фирменный бланк|900|1 200|1 500
Конверт стандартный (С4, С5, С65, Е65)|600|800|1 000
Пакет, часы, ручка, флешка, значок, магнит, кружка|900|1 200|1 500
Эскиз печати организации|600|800|900
Дисконтная карточка (86х54 мм), 4+4|1 200|1 500|1 900
Наклейка, бирка, ярлык, этикетка|600|800|900
Фирменный стиль (рассчитывается по выбранным стилеобразующим позициям)|рассчитывается индивидуально||
# Листовки
Листовка А5 одностороняя, 4+0|1 000|1 200|1 400
Листовка А5 двустороняя, 4+4|1 300|1 500|1 800
Листовка А4 одностороняя, 4+0|1 500|1 800|2 000
Листовка А4 двустороняя, 4+4|2 200|2 500|2 800
Плакат А3/А2 односторонний, 4+0|2 000|2 500|3 000
# Буклеты
Евробуклет А3-А4, 4+4, 2 фальца|2 500|3 500|4 500
Буклет А5/А4, 4+4, 1 фальц|1 500|2 000|2 500
# Каталоги/меню
Каталоги/меню. Обложка и шаблоны страниц (концепция)|2 000|3 500|5 000
Каталоги/меню. Верстка одной страницы|800|900|1 200
# Наружная реклама
Вывеска «режим работы»|800|900|1 100
Правка макета таблички, вывески «режим работы»|300||
Световые буквы|800|1 600|2 400
Штендер|900|1 200|1 900
Брендирование транспорта|2 000|3 000|4 000
Роллап|1 500|2 000|2 500
Уголок покупателя|1 000|1 500|2 000
Кабинетная табличка|800|1 000|1 100
# Дополнительные услуги
Внесение небольших изменений в готовые макеты|100||
Отрисовка схем (схемы проезда)|800|900|1 200
Обработка фотографии (для каталога, меню) / шт.|300||
Дизайн и вёрстка макета в присутствии заказчика / час|2 500||
Набор текста (1 000 знаков, без таблиц)|500||
Ретушь, цветокоррекция, замена фона|800|900|1 200
Коллажирование и фотомонтаж|1 500|2 200|3 000
Привязать макет к объекту, фасаду (визуализация)|300|500|800
Изменение макета под формат|300|500|800
# Дополнительно к стоимости
Срочность (в течение рабочего дня)|+ 25%||
При заказе разработки дизайна мы предоставляем клиенту 1 вариант макета. Каждый новый вариант макета стоит 25% от его первоначальной стоимости.|+ 25%||
Первая корректировка макета (она может содержать множество исправлений макета за один раз) — БЕСПЛАТНАЯ, каждая последующая правка, влияющая на композицию макета стоит по 500 р. Незначительные изменения текста или цвета делаются бесплатно, если они не меняют расположение элементов в макете.|500||
ROWS;

$default_outdoor_rows = <<<'ROWS'
Объемные световые буквы|от 90 руб/см высоты
Объемные несветовые буквы|от 60 руб/см высоты
Плоские буквы (ПВХ, акрил, АКП)|от 25 руб/см высоты
Световой короб|от 13 000 руб кв. м.
Панель кронштейн с внутренним подсветом|от 8 500 руб
Панель-кронштейн без подсвета|от 5 000 руб
Баннер|от 650 руб кв. м.
Табличка (ПВХ, АКП, акрил)|от 200 руб
Широкоформатная печать (бумага, самоклеящаяся пленка, холст, винил)|от 450 руб кв.м.
ROWS;

$default_polygraphy_rows = <<<'ROWS'
# Визитки
Визитка односторонняя (90х50 мм, 4+0), тираж 100 шт|1 500
Визитка двусторонняя (90х50 мм, 4+4), тираж 100 шт|2 100
# Флаеры
Флаер односторонний А6, 4+0, бумага меловка, тираж 100 шт|2 200
Флаер двухсторонний А6, 4+4, бумага меловка, тираж 100 шт|2 500
Флаер односторонний А5, 4+0, бумага меловка, тираж 100 шт|4 100
Флаер двухсторонний А5, 4+4, бумага меловка, тираж 100 шт|4 800
# Буклеты
Буклет-книжка односторонний А4 4+0, бумага меловка, тираж 100 шт|8 400
Буклет-книжка двухсторонний А4 4+4, бумага меловка, тираж 100 шт|9 400
Евробуклет с двумя фальцами односторонний 4+0, бумага меловка, тираж 100 шт|8 400
Евробуклет с двумя фальцами двухсторонний 4+4, бумага меловка, тираж 100 шт|9 800
ROWS;

$default_terms = <<<'TERMS'
Внимательно проверить макет на наличие орфографических, пунктуационных и иных ошибок;
Внимательно сверить номера телефонов, название фирмы, адреса, e-mail, адреса сайта, ссылок на соц. сети и т.д.;
Внимательно проверить размеры макета в названии файла;
Перед печатью тиража или на материале большого формата необходимо сделать цветопробу и удостовериться в том, что цвета и качество печати удовлетворяют ваши пожелания;
Согласование макета возможно по e-mail, для этого требуется переслать отправленное письмо с прикреплённым итоговым макетом и написать, что макет согласован или утверждён в печать.
TERMS;

$table = theme_get_acf_group(
  'prices_table',
  array(
    'pdf_button_text'       => 'Скачать прайс-лист в формате PDF',
    'pdf_url'               => 'https://ra-pingvin.ru/wp-content/uploads/2024/12/aktualnyj-prajs.pdf',
    'design_title'          => 'Дизайн',
    'design_head_name'      => 'Наименование',
    'design_head_simple'    => 'Простой',
    'design_head_medium'    => 'Средний',
    'design_head_complex'   => 'Сложный',
    'design_rows'           => $default_design_rows,
    'terms_title'           => 'Условия согласования дизайн-макета перед печатью',
    'terms_items'           => $default_terms,
    'terms_note'            => 'При согласовании макетов заказчик сам выступает в роли корректора и несет ответственность за допущенные в макете орфографические, грамматические и иные ошибки. После утверждения претензии по макету не принимаются!',
    'price_notice'          => 'В указанном прайс-листе даны ориентировочные цены. Точная стоимость работ определяется только после получения точного технического задания и всех материалов (текст, изображения и т.д.).',
    'outdoor_title'         => 'Наружная реклама',
    'outdoor_head_name'     => 'Наименование',
    'outdoor_head_price'    => 'Стоимость',
    'outdoor_rows'          => $default_outdoor_rows,
    'polygraphy_title'      => 'Полиграфия',
    'polygraphy_head_name'  => 'Наименование',
    'polygraphy_head_price' => 'Стоимость',
    'polygraphy_rows'       => $default_polygraphy_rows,
  )
);

if ( ! function_exists( 'theme_parse_price_rows' ) ) {
  /**
   * Parse editable rows from ACF textarea.
   *
   * @param string $value Raw textarea value.
   * @param int    $columns Number of value columns after the item name.
   * @return array
   */
  function theme_parse_price_rows( string $value, int $columns ): array {
    $lines = preg_split( '/\r\n|\r|\n/', $value );
    $rows  = array();

    foreach ( is_array( $lines ) ? $lines : array() as $line ) {
      $line = trim( $line );

      if ( '' === $line ) {
        continue;
      }

      if ( 0 === strpos( $line, '#' ) ) {
        $rows[] = array(
          'type'  => 'section',
          'label' => trim( substr( $line, 1 ) ),
        );
        continue;
      }

      $parts  = array_map( 'trim', explode( '|', $line ) );
      $name   = array_shift( $parts );
      $values = array_pad( array_slice( $parts, 0, $columns ), $columns, '' );

      if ( '' === $name ) {
        continue;
      }

      $rows[] = array(
        'type'   => 'item',
        'name'   => $name,
        'values' => $values,
      );
    }

    return $rows;
  }
}

if ( ! function_exists( 'theme_render_prices_table_group' ) ) {
  /**
   * Render a single prices table.
   *
   * @param string              $modifier   Table modifier: design|short.
   * @param array<int,string>   $head_cells Header cells.
   * @param array<int,array>    $rows       Parsed table rows.
   * @return void
   */
  function theme_render_prices_table_group( string $modifier, array $head_cells, array $rows ): void {
    if ( empty( $rows ) ) {
      return;
    }

    $modifier = 'design' === $modifier ? 'design' : 'short';
    ?>
    <div class="prices-table-wrap">
      <div class="prices-table prices-table--<?php echo esc_attr( $modifier ); ?> prices-table__head">
        <?php foreach ( $head_cells as $head_cell ) : ?>
          <div class="prices-table__cell"><?php echo esc_html( $head_cell ); ?></div>
        <?php endforeach; ?>
      </div>

      <?php foreach ( $rows as $price_row ) : ?>
        <?php if ( 'section' === $price_row['type'] ) : ?>
          <div class="prices-table__section"><?php echo esc_html( $price_row['label'] ); ?></div>
        <?php else : ?>
          <div class="prices-table prices-table--<?php echo esc_attr( $modifier ); ?> prices-table__row">
            <div class="prices-table__cell prices-table__cell--service"><?php echo esc_html( $price_row['name'] ); ?></div>
            <?php foreach ( $price_row['values'] as $price_value ) : ?>
              <div class="prices-table__cell prices-table__cell--price"><?php echo esc_html( $price_value ); ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <?php
  }
}

$design_rows     = theme_parse_price_rows( $table['design_rows'], 3 );
$outdoor_rows    = theme_parse_price_rows( $table['outdoor_rows'], 1 );
$polygraphy_rows = theme_parse_price_rows( $table['polygraphy_rows'], 1 );
$terms_items     = theme_parse_multiline_choices( $table['terms_items'] );

$price_categories = array(
  array(
    'title'      => $table['design_title'],
    'modifier'   => 'design',
    'open'       => true,
    'head_cells' => array(
      $table['design_head_name'],
      $table['design_head_simple'],
      $table['design_head_medium'],
      $table['design_head_complex'],
    ),
    'rows'       => $design_rows,
  ),
  array(
    'title'      => $table['outdoor_title'],
    'modifier'   => 'short',
    'open'       => false,
    'head_cells' => array(
      $table['outdoor_head_name'],
      $table['outdoor_head_price'],
    ),
    'rows'       => $outdoor_rows,
  ),
  array(
    'title'      => $table['polygraphy_title'],
    'modifier'   => 'short',
    'open'       => false,
    'head_cells' => array(
      $table['polygraphy_head_name'],
      $table['polygraphy_head_price'],
    ),
    'rows'       => $polygraphy_rows,
  ),
);
?>

<section class="prices-table-section">
  <div class="section-shell">
    <?php if ( ! empty( $table['pdf_url'] ) ) : ?>
      <a class="button button--accent prices-pdf-link" href="<?php echo esc_url( $table['pdf_url'] ); ?>" download>
        <span><?php echo esc_html( $table['pdf_button_text'] ); ?></span>
      </a>
    <?php endif; ?>

    <div class="prices-list">
      <?php foreach ( $price_categories as $price_category ) : ?>
        <?php if ( empty( $price_category['rows'] ) ) : ?>
          <?php continue; ?>
        <?php endif; ?>

        <details class="prices-group<?php echo 'design' === $price_category['modifier'] ? ' prices-group--wide' : ''; ?>"<?php echo ! empty( $price_category['open'] ) ? ' open' : ''; ?>>
          <summary>
            <h2 class="prices-group__title"><?php echo esc_html( $price_category['title'] ); ?></h2>
          </summary>

          <?php
          theme_render_prices_table_group(
            $price_category['modifier'],
            $price_category['head_cells'],
            $price_category['rows']
          );
          ?>
        </details>
      <?php endforeach; ?>
    </div>

    <?php if ( ! empty( $terms_items ) || ! empty( $table['terms_note'] ) ) : ?>
      <article class="prices-terms">
        <h2 class="prices-terms__title"><?php echo esc_html( $table['terms_title'] ); ?></h2>
        <?php if ( ! empty( $terms_items ) ) : ?>
          <ul class="prices-terms__list">
            <?php foreach ( $terms_items as $terms_item ) : ?>
              <li><?php echo esc_html( $terms_item ); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <?php if ( ! empty( $table['terms_note'] ) ) : ?>
          <p class="prices-terms__note"><?php echo esc_html( $table['terms_note'] ); ?></p>
        <?php endif; ?>
      </article>
    <?php endif; ?>

    <?php if ( ! empty( $table['price_notice'] ) ) : ?>
      <p class="prices-disclaimer"><?php echo esc_html( $table['price_notice'] ); ?></p>
    <?php endif; ?>

  </div>
</section>
