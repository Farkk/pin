<?php
/**
 * Template Name: Новости
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main news-archive-page">
  <?php get_template_part( 'blocks/news-archive/intro' ); ?>
  <?php get_template_part( 'blocks/news-archive/grid' ); ?>
</main>

<?php
get_footer();
