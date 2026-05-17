<?php
/**
 * Main fallback template.
 *
 * @package theme
 */

get_header();
?>

<main class="site-main">
  <section class="fallback-page">
    <div class="section-shell">
      <div class="fallback-page__card">
        <h1 class="fallback-page__title"><?php bloginfo( 'name' ); ?></h1>
        <p class="fallback-page__text"><?php bloginfo( 'description' ); ?></p>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
