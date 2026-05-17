<?php
/**
 * Template Name: Наружная реклама
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main service-detail-page service-detail-page--outdoor">
  <?php get_template_part( 'blocks/service-outdoor/hero' ); ?>
  <?php get_template_part( 'blocks/service-outdoor/highlights' ); ?>
  <?php get_template_part( 'blocks/service-outdoor/process' ); ?>
  <?php get_template_part( 'blocks/service-outdoor/request' ); ?>
</main>

<?php
get_footer();
