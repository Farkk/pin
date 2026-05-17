<?php
/**
 * Single post template.
 *
 * @package theme
 */

get_header();
?>

<main class="site-main news-detail-page">
  <?php get_template_part( 'blocks/news-detail/hero' ); ?>
  <?php get_template_part( 'blocks/news-detail/content' ); ?>
  <?php get_template_part( 'blocks/news-detail/cta' ); ?>
</main>

<?php
get_footer();
