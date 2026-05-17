<?php
/**
 * Template Name: О нас
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main about-us-page">
  <?php get_template_part( 'blocks/about-us/hero' ); ?>
  <?php get_template_part( 'blocks/about-us/overview' ); ?>
  <?php get_template_part( 'blocks/about-us/request' ); ?>
</main>

<?php
get_footer();
