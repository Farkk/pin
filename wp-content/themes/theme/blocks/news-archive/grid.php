<?php
/**
 * News archive grid block.
 *
 * @package theme
 */

global $wp_query;

$paged      = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$news_query = null;

if ( is_post_type_archive( 'theme_news' ) ) {
  $news_query = $wp_query;
} else {
  $news_query = new WP_Query(
    array(
      'post_type'      => 'theme_news',
      'post_status'    => 'publish',
      'posts_per_page' => 6,
      'paged'          => $paged,
    )
  );
}
?>

<section class="news-archive-grid-section">
  <div class="section-shell">
    <?php if ( $news_query && $news_query->have_posts() ) : ?>
      <div class="news-archive-grid">
        <?php while ( $news_query->have_posts() ) : ?>
          <?php
          $news_query->the_post();

          $card_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
          $card_excerpt   = get_the_excerpt();
          ?>
          <article class="news-card">
            <a class="news-card__image<?php echo esc_attr( theme_get_image_placeholder_class( $card_image_url ) ); ?>" href="<?php the_permalink(); ?>"<?php echo theme_get_background_style( $card_image_url ); ?><?php echo theme_get_image_placeholder_attrs( $card_image_url, '720×460' ); ?>>
              <span class="screen-reader-text"><?php the_title(); ?></span>
            </a>

            <div class="news-card__body">
              <span class="news-card__date"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></span>
              <h2 class="news-card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <?php if ( $card_excerpt ) : ?>
                <p class="news-card__text"><?php echo esc_html( wp_trim_words( $card_excerpt, 24, '...' ) ); ?></p>
              <?php endif; ?>
              <a class="news-card__link" href="<?php the_permalink(); ?>">Читать материал</a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <?php
      $pagination = paginate_links(
        array(
          'total'     => (int) $news_query->max_num_pages,
          'current'   => $paged,
          'mid_size'  => 1,
          'prev_text' => 'Назад',
          'next_text' => 'Далее',
        )
      );
      ?>

      <?php if ( $pagination ) : ?>
        <nav class="news-pagination" aria-label="Навигация по новостям">
          <?php echo wp_kses_post( $pagination ); ?>
        </nav>
      <?php endif; ?>
    <?php else : ?>
      <p class="news-empty">Новости пока не добавлены.</p>
    <?php endif; ?>
  </div>
</section>

<?php
if ( $news_query && ! is_post_type_archive( 'theme_news' ) ) {
  wp_reset_postdata();
}
