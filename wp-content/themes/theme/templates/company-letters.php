<?php
/**
 * Template Name: Благодарственные письма
 * Template Post Type: page
 *
 * @package theme
 */

get_header();
?>

<main class="site-main company-letters-page">
  <?php get_template_part( 'blocks/company-letters/hero' ); ?>
  <?php get_template_part( 'blocks/company-letters/archive' ); ?>
</main>

<?php
get_footer();
