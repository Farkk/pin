<?php

/**
 * Header layout.
 *
 * @package theme
 */
$about_us_page_url     = theme_get_page_url_by_template('templates/about-us.php', '/about/');
$letters_page_url      = theme_get_page_url_by_template('templates/company-letters.php', '/archive-mails/');
$services_page_url     = theme_get_page_url_by_template('templates/services-archive.php', '/uslugi/');
$prices_page_url       = theme_get_page_url_by_template('templates/prices.php', '/prices/');
$news_page_url         = get_post_type_archive_link('theme_news') ?: theme_get_page_url_by_template('templates/news-archive.php', '/novosti/');
$contacts_page_url     = theme_get_page_url_by_template('templates/contacts.php', '/contacts/');
$portfolio_archive_url = get_post_type_archive_link('theme_portfolio') ?: home_url('/portfolio/');
$is_about_us_page      = is_page_template('templates/about-us.php');
$is_letters_page       = is_page_template('templates/company-letters.php');
$is_services_page      = is_page_template('templates/services-archive.php') || is_post_type_archive('theme_service') || is_singular('theme_service');
$is_prices_page        = is_page_template('templates/prices.php');
$is_news_archive_page  = is_home() || is_post_type_archive('theme_news') || is_page_template('templates/news-archive.php');
$is_news_detail_page   = is_singular('theme_news') || is_page_template('templates/news-detail.php');
$is_contacts_page      = is_page_template('templates/contacts.php');
$is_portfolio_page     = is_post_type_archive('theme_portfolio') || is_singular('theme_portfolio');
$is_company_subpage    = $is_about_us_page || $is_letters_page;
$is_news_page          = $is_news_archive_page || $is_news_detail_page;
$contact_phone         = theme_get_contact_phone();
$contact_phone_href    = theme_get_contact_phone_href();
$whatsapp_url          = theme_get_whatsapp_url() ?: '#contacts';
$telegram_url          = theme_get_telegram_url() ?: '#contacts';
$max_url               = theme_get_max_url() ?: '#contacts';

$menu_items = array(
  array(
    'label'   => 'Компания',
    'url'     => '',
    'current' => $is_company_subpage,
    'children' => array(
      array(
        'label'   => 'О нас',
        'url'     => $about_us_page_url,
        'current' => $is_about_us_page,
      ),
      array(
        'label'   => 'Благодарственные письма',
        'url'     => $letters_page_url,
        'current' => $is_letters_page,
      ),
    ),
  ),
  array(
    'label'   => 'Услуги',
    'url'     => $services_page_url,
    'current' => $is_services_page,
  ),
  array(
    'label'   => 'Цены',
    'url'     => $prices_page_url,
    'current' => $is_prices_page,
  ),
  array(
    'label'   => 'Новости',
    'url'     => $news_page_url,
    'current' => $is_news_page,
  ),
  array(
    'label'   => 'Портфолио',
    'url'     => $portfolio_archive_url,
    'current' => $is_portfolio_page,
  ),
  array(
    'label'   => 'Контакты',
    'url'     => $contacts_page_url,
    'current' => $is_contacts_page,
  ),
);
?>

<header class="site-header">
  <div class="section-shell site-header__inner">
    <div class="site-header__top">
      <?php get_template_part('template-parts/components/brand', null, array('compact' => true)); ?>

      <div class="site-header__messengers" aria-label="<?php esc_attr_e('Мессенджеры', 'theme'); ?>">
        <a class="chip" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener">WhatsApp</a>
        <a class="chip" href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener">Telegram</a>
        <a class="chip" href="<?php echo esc_url( $max_url ); ?>" target="_blank" rel="noopener">Max</a>
      </div>

      <div class="site-header__contact-row">
        <div class="site-header__phone">
          <span class="site-header__phone-label">Телефон</span>
          <a class="site-header__phone-value" href="<?php echo esc_url( $contact_phone_href ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
        </div>

        <a class="button button--accent" href="#request" data-request-modal data-request-modal-context="Шапка: Рассчитать">Рассчитать</a>

        <button
          class="site-header__menu-toggle"
          type="button"
          aria-controls="site-header-menu"
          aria-expanded="false">
          <span class="site-header__menu-toggle-text">Меню</span>
          <span class="site-header__menu-toggle-icon" aria-hidden="true">
            <span></span>
            <span></span>
          </span>
        </button>
      </div>
    </div>

    <div class="site-header__nav-wrap" id="site-header-menu" aria-label="<?php esc_attr_e('Меню сайта', 'theme'); ?>">
      <div class="site-header__menu-head">
        <span class="site-header__menu-title">Меню</span>
        <button class="site-header__menu-close" type="button" aria-label="<?php esc_attr_e('Закрыть меню', 'theme'); ?>">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="site-header__mobile-actions">
        <a class="chip" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener">WhatsApp</a>
        <a class="chip" href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener">Telegram</a>
        <a class="chip" href="<?php echo esc_url( $max_url ); ?>" target="_blank" rel="noopener">Max</a>
        <a class="button button--accent" href="#request" data-request-modal data-request-modal-context="Мобильное меню: Рассчитать">Рассчитать</a>
      </div>

      <span class="site-header__nav-accent" aria-hidden="true"></span>

      <nav class="site-nav" aria-label="<?php esc_attr_e('Основная навигация', 'theme'); ?>">
        <?php foreach ($menu_items as $menu_item) : ?>
          <div class="site-nav__item<?php echo ! empty($menu_item['children']) ? ' has-children' : ''; ?>">
            <?php if (! empty($menu_item['children'])) : ?>
              <button
                class="site-nav__link site-nav__link--button<?php echo ! empty($menu_item['current']) ? ' is-current' : ''; ?>"
                type="button"
                aria-expanded="false">
                <?php echo esc_html($menu_item['label']); ?>
              </button>
            <?php else : ?>
              <a
                class="site-nav__link<?php echo ! empty($menu_item['current']) ? ' is-current' : ''; ?>"
                href="<?php echo esc_url($menu_item['url']); ?>">
                <?php echo esc_html($menu_item['label']); ?>
              </a>
            <?php endif; ?>

            <?php if (! empty($menu_item['children'])) : ?>
              <div class="site-nav__submenu">
                <?php foreach ($menu_item['children'] as $child_item) : ?>
                  <a
                    class="site-nav__submenu-link<?php echo ! empty($child_item['current']) ? ' is-current' : ''; ?>"
                    href="<?php echo esc_url($child_item['url']); ?>">
                    <?php echo esc_html($child_item['label']); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>
</header>
