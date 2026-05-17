<?php
/**
 * Template Name: Услуги
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main services-archive-page">
  <?php get_template_part( 'blocks/services-archive/intro' ); ?>
  <?php get_template_part( 'blocks/services-archive/grid' ); ?>
</main>

<?php
get_footer();
