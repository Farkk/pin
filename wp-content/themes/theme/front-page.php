<?php
/**
 * Static front page template.
 *
 * @package theme
 */

get_header();
?>

<main class="site-main front-page">
  <?php get_template_part( 'blocks/hero' ); ?>
  <?php get_template_part( 'blocks/services' ); ?>
  <?php get_template_part( 'blocks/reviews-widget' ); ?>
  <?php get_template_part( 'blocks/telegram-subscribe' ); ?>
  <?php get_template_part( 'blocks/contact-form' ); ?>
</main>

<?php
get_footer();
