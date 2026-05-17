<?php
/**
 * Company letters archive block.
 *
 * @package theme
 */

$archive = theme_get_acf_group(
  'company_letters_archive',
  array(
    'title'   => 'Архив благодарственных писем',
    'letters' => array(),
  )
);

$letter_cards = array();
$letters      = is_array( $archive['letters'] ?? null ) ? $archive['letters'] : array();

foreach ( $letters as $index => $letter ) {
  $image = is_array( $letter ) ? ( $letter['image'] ?? '' ) : $letter;
  $image = theme_get_image_url( $image );

  if ( ! $image ) {
    continue;
  }

  $letter_cards[] = array(
    'class' => 'company-letters-card--' . ( $index + 1 ),
    'image' => $image,
    'title' => 'Благодарственное письмо ' . ( $index + 1 ),
  );
}

if ( empty( $letter_cards ) ) {
  for ( $index = 1; $index <= 6; $index++ ) {
    $legacy_image = theme_get_image_url( $archive[ 'letter_' . $index . '_image' ] ?? '' );

    $letter_cards[] = array(
      'class' => 'company-letters-card--' . $index,
      'image' => $legacy_image,
      'title' => 'Благодарственное письмо ' . $index,
    );
  }
}
?>

<section class="company-letters-archive-section">
  <div class="section-shell">
    <div class="company-letters-archive">
      <h2 class="company-letters-archive__title"><?php echo esc_html( $archive['title'] ); ?></h2>

      <div class="company-letters-grid">
        <?php foreach ( $letter_cards as $letter_card ) : ?>
          <?php if ( $letter_card['image'] ) : ?>
            <a
              class="company-letters-card <?php echo esc_attr( $letter_card['class'] ); ?>"
              href="<?php echo esc_url( $letter_card['image'] ); ?>"
              <?php echo theme_get_fancybox_attrs( array( 'caption' => $letter_card['title'] ) ); ?>
              aria-label="<?php echo esc_attr( 'Открыть: ' . $letter_card['title'] ); ?>"
              <?php echo theme_get_background_style( $letter_card['image'] ); ?>
            ></a>
          <?php else : ?>
            <div
              class="company-letters-card <?php echo esc_attr( $letter_card['class'] ); ?> image-placeholder"
              data-placeholder-size="900×1200"
              aria-label="<?php echo esc_attr( $letter_card['title'] ); ?>"
            ></div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
