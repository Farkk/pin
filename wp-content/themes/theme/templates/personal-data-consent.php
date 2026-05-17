<?php
/**
 * Template Name: Согласие на обработку персональных данных
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main legal-page">
  <?php while ( have_posts() ) : the_post(); ?>
    <section class="legal-page__section">
      <div class="section-shell">
        <article class="legal-page__content">
          <h1 class="legal-page__title"><?php the_title(); ?></h1>
          <div class="legal-page__body">
            <?php the_content(); ?>
          </div>
        </article>
      </div>
    </section>
  <?php endwhile; ?>
</main>

<?php
get_footer();
