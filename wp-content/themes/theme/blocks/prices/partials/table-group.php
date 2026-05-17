<?php
/**
 * Single prices table group markup.
 *
 * @package theme
 */

$rows       = isset( $rows ) && is_array( $rows ) ? $rows : array();
$head_cells = isset( $head_cells ) && is_array( $head_cells ) ? $head_cells : array();
$modifier   = ! empty( $modifier ) && 'design' === $modifier ? 'design' : 'short';

if ( empty( $rows ) ) {
  return;
}
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
