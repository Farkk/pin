<?php

/**
 * About us overview block.
 *
 * @package theme
 */

$overview = theme_get_acf_group(
  'about_us_overview',
  array(
    'stat_1_value' => '1500+',
    'stat_1_text'  => 'реализованных проектов для бизнеса и ритейла',
    'stat_2_value' => '24/7',
    'stat_2_text'  => 'оперативная связь по статусу, макетам и производству',
    'stat_3_value' => '3 направления',
    'stat_3_text'  => 'наружная реклама, УФ-печать и полиграфия в одной структуре',
    'story_title'  => 'Как мы работаем',
    'story_text_1' => 'Берем задачу от запроса до монтажа: уточняем задачу, готовим расчет, запускаем в производство и держим клиента в курсе на каждом шаге. Для сложных объектов подключаем выезд, замер и техническое сопровождение.',
    'story_text_2' => 'Команда умеет работать и с быстрыми тиражами, и с длинными производственными циклами для сетевых клиентов.',
    'story_image'  => '',
  )
);

$stats = array(
  array(
    'value' => $overview['stat_1_value'],
    'text'  => $overview['stat_1_text'],
  ),
  array(
    'value'    => $overview['stat_2_value'],
    'text'     => $overview['stat_2_text'],
    'modifier' => 'about-us-stat--dark',
  ),
  array(
    'value'    => $overview['stat_3_value'],
    'text'     => $overview['stat_3_text'],
    'modifier' => 'about-us-stat--muted',
  ),
);

$story_image_url = theme_get_image_url($overview['story_image']);
?>

<section class="about-us-overview-section">
  <div class="section-shell">
    <div class="about-us-overview">
      <div class="about-us-stats">
        <?php foreach ($stats as $stat) : ?>
          <article class="about-us-stat<?php echo ! empty($stat['modifier']) ? ' ' . esc_attr($stat['modifier']) : ''; ?>">
            <h2 class="about-us-stat__value"><?php echo esc_html($stat['value']); ?></h2>
            <p class="about-us-stat__text"><?php echo esc_html($stat['text']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="about-us-story">
        <div class="about-us-story__text">
          <h2 class="about-us-story__title"><?php echo esc_html($overview['story_title']); ?></h2>
          <p class="about-us-story__paragraph"><?php echo esc_html($overview['story_text_1']); ?></p>
          <p class="about-us-story__paragraph"><?php echo esc_html($overview['story_text_2']); ?></p>
        </div>

        <div class="about-us-story__photo<?php echo esc_attr( theme_get_image_placeholder_class( $story_image_url ) ); ?>"<?php echo theme_get_image_placeholder_attrs( $story_image_url, '720×420' ); ?>>
          <?php if ( $story_image_url ) : ?>
            <img src="<?php echo esc_url( $story_image_url ); ?>" alt="">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
