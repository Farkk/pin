<?php
/**
 * Template Name: Контакты
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main contacts-page">
  <?php get_template_part( 'blocks/contacts/intro' ); ?>
  <?php get_template_part( 'blocks/contacts/connect' ); ?>
</main>

<?php
get_footer();
