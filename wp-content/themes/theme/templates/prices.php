<?php
/**
 * Template Name: Цены
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main prices-page">
  <?php get_template_part( 'blocks/prices/intro' ); ?>
  <?php get_template_part( 'blocks/prices/table' ); ?>
  <?php get_template_part( 'blocks/prices/calc' ); ?>
</main>

<?php
get_footer();
