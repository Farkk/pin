<?php
/**
 * Company letters hero block.
 *
 * @package theme
 */

$hero = theme_get_acf_group(
  'company_letters_hero',
  array(
    'kicker'        => 'Доверие клиентов',
    'title'         => 'Благодарственные письма и отзывы от компаний, с которыми мы работаем',
    'text'          => 'Здесь можно показать официальные письма, подтверждения сотрудничества и сканы благодарностей от заказчиков. Блок работает как доказательство стабильной работы с бизнесом и организациями.',
    'tag_1'         => 'B2B кейсы',
    'tag_2'         => 'Официальные письма',
    'preview_image' => '',
    'stat_value'    => '50+',
    'stat_text'     => 'писем и отзывов в архиве',
    'note_title'    => 'Можно слайдер',
    'note_text'     => 'Но для дизайна сетка дает более быстрый и понятный обзор.',
  )
);

$preview_image_url = theme_get_image_url( $hero['preview_image'] );
?>

<section class="company-letters-hero-section">
  <div class="section-shell">
    <div class="company-letters-hero-grid">
      <div class="company-letters-hero-card">
        <div class="company-letters-hero-copy">
          <span class="section-kicker"><?php echo esc_html( $hero['kicker'] ); ?></span>
          <h1 class="company-letters-hero-title"><?php echo esc_html( $hero['title'] ); ?></h1>
          <p class="company-letters-hero-text"><?php echo esc_html( $hero['text'] ); ?></p>
        </div>

        <div class="company-letters-hero-tags">
          <span class="chip"><?php echo esc_html( $hero['tag_1'] ); ?></span>
          <span class="chip"><?php echo esc_html( $hero['tag_2'] ); ?></span>
        </div>
      </div>

      <div class="company-letters-preview">
        <div class="company-letters-preview__image<?php echo esc_attr( theme_get_image_placeholder_class( $preview_image_url ) ); ?>"<?php echo theme_get_background_style( $preview_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $preview_image_url, '720×700' ); ?>></div>

        <div class="company-letters-preview__bottom">
          <article class="company-letters-preview__card company-letters-preview__card--dark">
            <h2 class="company-letters-preview__value"><?php echo esc_html( $hero['stat_value'] ); ?></h2>
            <p class="company-letters-preview__caption"><?php echo esc_html( $hero['stat_text'] ); ?></p>
          </article>

          <article class="company-letters-preview__card company-letters-preview__card--muted">
            <h2 class="company-letters-preview__value company-letters-preview__value--dark"><?php echo esc_html( $hero['note_title'] ); ?></h2>
            <p class="company-letters-preview__caption company-letters-preview__caption--dark">
              <?php echo esc_html( $hero['note_text'] ); ?>
            </p>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
