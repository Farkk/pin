<?php
/**
 * Single service template.
 *
 * @package theme
 */

get_header();

$post_id = get_the_ID();
$excerpt = get_the_excerpt( $post_id );

$hero = theme_get_acf_group(
  'service_hero',
  array(
    'kicker'                => 'Услуга',
    'title'                 => get_the_title( $post_id ),
    'text'                  => $excerpt,
    'primary_button_text'   => 'Рассчитать стоимость',
    'primary_button_url'    => '#request',
    'secondary_button_text' => 'Смотреть цены',
    'secondary_button_url'  => home_url( '/prajs/' ),
    'bullet_1'              => 'Подготовим макет',
    'bullet_2'              => 'Подберем материалы',
    'bullet_3'              => 'Изготовим и смонтируем',
    'image'                 => '',
    'image_url'             => '',
  ),
  $post_id
);

$hero_image_url = theme_get_group_image_url( $hero );

$highlights = theme_get_acf_group(
  'service_highlights',
  array(
    'item_1_title' => 'Задача',
    'item_1_text'  => 'Уточняем формат, сроки, место размещения и требования к результату.',
    'item_2_title' => 'Производство',
    'item_2_text'  => 'Готовим макет, материалы и запускаем работу в производство.',
    'item_3_title' => 'Результат',
    'item_3_text'  => 'Передаем готовую продукцию или выполняем монтаж на объекте.',
  ),
  $post_id
);

$process = theme_get_acf_group(
  'service_process',
  array(
    'title'     => 'Что входит в услугу',
    'list'      => "Консультация и расчет\nПодготовка или проверка макета\nПодбор технологии и материалов\nПроизводство\nДоставка или монтаж",
    'text'      => 'Точная стоимость зависит от размеров, тиража, материалов, сроков и необходимости монтажа.',
    'image'     => '',
    'image_url' => '',
  ),
  $post_id
);

$process_image_url = theme_get_group_image_url( $process );

$bullets = array_filter( array( $hero['bullet_1'], $hero['bullet_2'], $hero['bullet_3'] ) );
$items   = array(
  array( 'title' => $highlights['item_1_title'], 'text' => $highlights['item_1_text'], 'modifier' => '' ),
  array( 'title' => $highlights['item_2_title'], 'text' => $highlights['item_2_text'], 'modifier' => 'service-outdoor-highlight--dark' ),
  array( 'title' => $highlights['item_3_title'], 'text' => $highlights['item_3_text'], 'modifier' => 'service-outdoor-highlight--muted' ),
);
$steps = theme_parse_multiline_choices( $process['list'] );
?>

<main class="site-main service-detail-page service-detail-page--outdoor">
  <section class="service-outdoor-hero-section">
    <div class="section-shell">
      <div class="service-outdoor-hero-grid">
        <div class="service-outdoor-hero-card">
          <div class="service-outdoor-hero-copy">
            <span class="section-kicker"><?php echo esc_html( $hero['kicker'] ); ?></span>
            <h1 class="service-outdoor-hero-title"><?php echo esc_html( $hero['title'] ?: get_the_title( $post_id ) ); ?></h1>
            <p class="service-outdoor-hero-text"><?php echo esc_html( $hero['text'] ?: $excerpt ); ?></p>
            <div class="service-outdoor-hero-actions">
              <?php if ( ! empty( $hero['primary_button_text'] ) ) : ?>
                <a class="button button--accent" href="<?php echo esc_url( $hero['primary_button_url'] ?: '#request' ); ?>" data-request-modal data-request-modal-context="<?php echo esc_attr( $hero['primary_button_text'] ); ?>"><?php echo esc_html( $hero['primary_button_text'] ); ?></a>
              <?php endif; ?>
              <?php if ( ! empty( $hero['secondary_button_text'] ) ) : ?>
                <a class="button button--ghost" href="<?php echo esc_url( $hero['secondary_button_url'] ?: home_url( '/prajs/' ) ); ?>"><?php echo esc_html( $hero['secondary_button_text'] ); ?></a>
              <?php endif; ?>
            </div>
          </div>

          <?php if ( ! empty( $bullets ) ) : ?>
            <div class="service-outdoor-hero-bullets">
              <?php foreach ( $bullets as $bullet ) : ?>
                <div class="service-outdoor-hero-bullet"><?php echo nl2br( esc_html( $bullet ) ); ?></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="service-outdoor-visuals">
          <div class="service-outdoor-visual service-outdoor-visual--main<?php echo esc_attr( theme_get_image_placeholder_class( $hero_image_url ) ); ?>"<?php echo theme_get_background_style( $hero_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $hero_image_url, '720×980' ); ?>></div>
          <div class="service-outdoor-visual-row">
            <div class="service-outdoor-visual service-outdoor-visual--second<?php echo esc_attr( theme_get_image_placeholder_class( $hero_image_url ) ); ?>"<?php echo theme_get_background_style( $hero_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $hero_image_url, '720×260' ); ?>></div>
            <div class="service-outdoor-visual service-outdoor-visual--third<?php echo esc_attr( theme_get_image_placeholder_class( $hero_image_url ) ); ?>"<?php echo theme_get_background_style( $hero_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $hero_image_url, '720×260' ); ?>></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-outdoor-highlights-section">
    <div class="section-shell">
      <div class="service-outdoor-highlights">
        <?php foreach ( $items as $item ) : ?>
          <article class="service-outdoor-highlight<?php echo ! empty( $item['modifier'] ) ? ' ' . esc_attr( $item['modifier'] ) : ''; ?>">
            <h2 class="service-outdoor-highlight__title"><?php echo esc_html( $item['title'] ); ?></h2>
            <p class="service-outdoor-highlight__text"><?php echo esc_html( $item['text'] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="service-outdoor-process-section">
    <div class="section-shell">
      <div class="service-outdoor-process-grid">
        <article class="service-outdoor-process-card">
          <h2 class="service-outdoor-process-card__title"><?php echo esc_html( $process['title'] ); ?></h2>
          <?php if ( ! empty( $steps ) ) : ?>
            <p class="service-outdoor-process-card__list"><?php echo nl2br( esc_html( implode( "\n", $steps ) ) ); ?></p>
          <?php endif; ?>
          <p class="service-outdoor-process-card__text"><?php echo esc_html( $process['text'] ); ?></p>
        </article>

        <div class="service-outdoor-process-photo<?php echo esc_attr( theme_get_image_placeholder_class( $process_image_url ) ); ?>"<?php echo theme_get_background_style( $process_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $process_image_url, '720×420' ); ?>></div>
      </div>
    </div>
  </section>

  <?php get_template_part( 'blocks/service-detail/resources' ); ?>

  <?php get_template_part( 'blocks/service-outdoor/request' ); ?>
</main>

<?php
get_footer();
