<?php
/**
 * Default content for CPT-based sections.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_default_services' ) ) {
  /**
   * Get starter service content imported from the reference site.
   *
   * @return array<int,array<string,mixed>>
   */
  function theme_default_services(): array {
    $source_url = trailingslashit( get_template_directory_uri() ) . 'assets/images/source-content/';

    return array(
      array(
        'title'   => 'Широкоформатная печать',
        'slug'    => 'shirokoformatnaya-pechat',
        'excerpt' => 'Качественные решения для бизнеса: постеры, баннеры, пленка, витрины и интерьерная печать.',
        'image'   => $source_url . 'shirokoformatnaya-pechat.jpg',
      ),
      array(
        'title'   => 'Полиграфия',
        'slug'    => 'poligrafiya',
        'excerpt' => 'Качественная печать и дизайн для вашего бизнеса: визитки, листовки, каталоги, меню и фирменные материалы.',
        'image'   => $source_url . 'poligrafiya.jpg',
      ),
      array(
        'title'   => 'Реклама в лифтах',
        'slug'    => 'reklama-v-liftah',
        'excerpt' => 'Размещение рекламных материалов в жилых комплексах и бизнес-центрах, где аудитория видит сообщение каждый день.',
        'image'   => $source_url . 'reklama-v-liftah.jpg',
      ),
      array(
        'title'   => 'Вывески и наружная реклама',
        'slug'    => 'naruzhnaya-reklama',
        'excerpt' => 'Изготовление и монтаж вывесок, объемных букв, световых коробов, фасадных конструкций и рекламных носителей.',
        'image'   => $source_url . 'naruzhnaya-reklama.jpg',
      ),
      array(
        'title'   => 'Лазерная гравировка',
        'slug'    => 'lazernaya-gravirovka',
        'excerpt' => 'Точная обработка материалов для сувенирной продукции, табличек, печатей, маркировки и брендирования.',
        'image'   => $source_url . 'lazernaya-gravirovka.jpg',
      ),
      array(
        'title'   => 'Изготовление печатей',
        'slug'    => 'izgotovlenie-pechatey',
        'excerpt' => 'Изготовление печатей и штампов для организаций, ИП и специалистов с подготовкой макета.',
        'image'   => $source_url . 'izgotovlenie-pechatey.jpg',
      ),
    );
  }
}

if ( ! function_exists( 'theme_default_portfolio_items' ) ) {
  /**
   * Get starter portfolio content imported from the reference site.
   *
   * @return array<int,array<string,mixed>>
   */
  function theme_default_portfolio_items(): array {
    $source_url = trailingslashit( get_template_directory_uri() ) . 'assets/images/source-content/';

    return array(
      array(
        'title'       => 'УФ печать',
        'slug'        => 'uf-pechat',
        'excerpt'     => 'Портфолио работ по ультрафиолетовой печати на стенах и интерьерных панелях.',
        'description' => 'Профессиональная УФ печать на стенах и панелях любой сложности. Стойкие экологичные краски, высокая детализация и подбор изображения под интерьер.',
        'source_url'  => 'https://ra-pingvin.ru/ultrafioletovaya-pechat/',
        'client'      => 'Интерьерные проекты',
        'duration'    => 'от 1 дня',
        'composition' => 'УФ-печать',
        'result_text' => 'Подобрали изображения, подготовили поверхность и выполнили стойкую интерьерную печать с хорошей детализацией.',
        'scope_list'  => "Подбор изображения\nПодготовка макета\nПечать на поверхности\nКонтроль качества",
        'images'      => array(
          $source_url . 'uf-pechat-1.jpeg',
          $source_url . 'uf-pechat-2.jpeg',
          $source_url . 'uf-pechat-3.jpeg',
          $source_url . 'uf-pechat-4.jpeg',
          $source_url . 'uf-pechat-5.jpeg',
        ),
      ),
      array(
        'title'       => 'Широкоформатная печать',
        'slug'        => 'shirokoformatnaya-pechat',
        'excerpt'     => 'Портфолио работ по широкоформатной печати: баннеры, плакаты, пленки и наружные носители.',
        'description' => 'Качественная широкоформатная печать любых форматов для наружной рекламы, витрин, плакатов и бизнес-задач.',
        'source_url'  => 'https://ra-pingvin.ru/shirokoformatnaya-pechat/',
        'client'      => 'Бизнес и наружная реклама',
        'duration'    => 'от 1 дня',
        'composition' => 'Баннеры + печать',
        'result_text' => 'Подготовили макеты к печати, подобрали материалы и выполнили широкоформатную печать для рекламных носителей.',
        'scope_list'  => "Проверка макета\nПодбор материала\nШирокоформатная печать\nПостпечатная обработка",
        'images'      => array(
          $source_url . 'shirokoformatnaya-pechat.jpg',
        ),
      ),
      array(
        'title'       => 'Полиграфические услуги',
        'slug'        => 'poligraficheskie-uslugi',
        'excerpt'     => 'Портфолио печатной продукции: визитки, листовки, буклеты, каталоги и фирменные материалы.',
        'description' => 'Профессиональная полиграфия для бизнеса: подготовка макетов, печать тиражей и изготовление рекламных материалов.',
        'source_url'  => 'https://ra-pingvin.ru/poligraficheskie-uslugi/',
        'client'      => 'Компании и предприниматели',
        'duration'    => 'от 1 дня',
        'composition' => 'Полиграфия',
        'result_text' => 'Изготовили печатные материалы с учетом тиража, назначения и требований к качеству изображения.',
        'scope_list'  => "Подготовка макета\nПечать тиража\nРезка и сборка\nПередача готовой продукции",
        'images'      => array(
          $source_url . 'poligrafiya.jpg',
        ),
      ),
      array(
        'title'       => 'Лазерная гравировка',
        'slug'        => 'lazernaya-gravirovka',
        'excerpt'     => 'Портфолио работ по лазерной гравировке на металле и других материалах.',
        'description' => 'Точная лазерная гравировка на разных материалах для брендирования, маркировки, сувенирной продукции и табличек.',
        'source_url'  => 'https://ra-pingvin.ru/reklama-polnogo-czikla/',
        'client'      => 'Брендирование и сувениры',
        'duration'    => 'от 1 дня',
        'composition' => 'Гравировка',
        'result_text' => 'Выполнили точную гравировку по подготовленному макету с чистыми контурами и стойким результатом.',
        'scope_list'  => "Подготовка файла\nНастройка оборудования\nЛазерная гравировка\nПроверка готового изделия",
        'images'      => array(
          $source_url . 'lazernaya-gravirovka.jpg',
        ),
      ),
      array(
        'title'       => 'Реклама в лифтах',
        'slug'        => 'reklama-v-liftah',
        'excerpt'     => 'Портфолио размещения рекламы в лифтах жилых домов и бизнес-центров.',
        'description' => 'Размещение рекламных материалов в лифтах с регулярным контактом аудитории и понятной географией показа.',
        'source_url'  => 'https://ra-pingvin.ru/reklama-v-liftah/',
        'client'      => 'Локальный бизнес',
        'duration'    => 'от 3 дней',
        'composition' => 'Печать + размещение',
        'result_text' => 'Подготовили рекламные материалы и разместили их в лифтовых носителях для стабильного локального охвата.',
        'scope_list'  => "Подготовка макета\nПечать материалов\nРазмещение в лифтах\nКонтроль носителей",
        'images'      => array(
          $source_url . 'reklama-v-liftah.jpg',
        ),
      ),
      array(
        'title'       => 'Вывески и наружная реклама',
        'slug'        => 'naruzhnaya-reklama',
        'excerpt'     => 'Портфолио наружной рекламы: вывески, объемные буквы, световые короба и фасадные конструкции.',
        'description' => 'Производство наружной рекламы любой сложности: разработка макета, изготовление конструкций, монтаж и согласование.',
        'source_url'  => 'https://ra-pingvin.ru/naruzhnaya-reklama/',
        'client'      => 'Магазины и офисы',
        'duration'    => 'от 7 дней',
        'composition' => 'Вывеска + монтаж',
        'result_text' => 'Изготовили наружную рекламную конструкцию с учетом фасада, читаемости и требований к монтажу.',
        'scope_list'  => "Замер объекта\nРазработка макета\nПроизводство конструкции\nМонтаж и сдача",
        'images'      => array(
          $source_url . 'naruzhnaya-reklama.jpg',
        ),
      ),
    );
  }
}

if ( ! function_exists( 'theme_get_default_service_variants' ) ) {
  /**
   * Styling metadata for service cards.
   *
   * @return array<int,array<string,string>>
   */
  function theme_get_default_service_variants(): array {
    return array(
      array( 'home' => 'service-card--large', 'archive' => 'services-archive-card--light services-archive-card--large', 'button' => 'accent' ),
      array( 'home' => 'service-card--small', 'archive' => 'services-archive-card--soft services-archive-card--medium', 'button' => 'light' ),
      array( 'home' => 'service-card--medium', 'archive' => 'services-archive-card--muted services-archive-card--small', 'button' => 'accent' ),
      array( 'home' => 'service-card--medium-alt', 'archive' => 'services-archive-card--dark services-archive-card--small', 'button' => 'light' ),
      array( 'home' => 'service-card--large-alt', 'archive' => 'services-archive-card--light services-archive-card--large', 'button' => 'accent' ),
      array( 'home' => 'service-card--small-alt', 'archive' => 'services-archive-card--soft services-archive-card--medium', 'button' => 'light' ),
    );
  }
}

if ( ! function_exists( 'theme_default_image_urls' ) ) {
  /**
   * Default visual assets used as ACF image fallbacks.
   *
   * @return array<string,string>
   */
  function theme_default_image_urls(): array {
    $base_url = trailingslashit( get_template_directory_uri() ) . 'assets/images/default-content/';

    return array(
      'front_hero_main'              => $base_url . 'front-hero-main.jpg',
      'front_hero_top'               => $base_url . 'front-hero-top.jpg',
      'front_hero_bottom'            => $base_url . 'front-hero-bottom.jpg',
      'about_hero_main'              => $base_url . 'about-hero-main.jpg',
      'about_hero_top'               => $base_url . 'about-hero-top.jpg',
      'about_hero_bottom'            => $base_url . 'about-hero-bottom.jpg',
      'about_story'                  => $base_url . 'about-story.jpg',
      'service_outdoor_main'         => $base_url . 'service-outdoor-main.jpg',
      'service_outdoor_second'       => $base_url . 'service-outdoor-second.jpg',
      'service_outdoor_third'        => $base_url . 'service-outdoor-third.jpg',
      'service_outdoor_process'      => $base_url . 'service-outdoor-process.jpg',
      'company_letters_preview'      => $base_url . 'company-letters-preview.jpg',
      'company_letters_archive_1'    => $base_url . 'company-letters-archive-1.jpg',
      'company_letters_archive_2'    => $base_url . 'company-letters-archive-2.jpg',
      'company_letters_archive_3'    => $base_url . 'company-letters-archive-3.jpg',
      'company_letters_archive_4'    => $base_url . 'company-letters-archive-4.jpg',
      'company_letters_archive_5'    => $base_url . 'company-letters-archive-5.jpg',
      'company_letters_archive_6'    => $base_url . 'company-letters-archive-6.jpg',
      'news_detail_hero'             => $base_url . 'news-detail-hero.jpg',
    );
  }
}

if ( ! function_exists( 'theme_default_image_url' ) ) {
  /**
   * Get a default visual asset URL by key.
   *
   * @param string $key Default image key.
   * @return string
   */
  function theme_default_image_url( string $key ): string {
    $images = theme_default_image_urls();

    return $images[ $key ] ?? '';
  }
}

if ( ! function_exists( 'theme_remote_image_url_replacements' ) ) {
  /**
   * Map previously seeded remote image URLs to local theme assets.
   *
   * @return array<string,string>
   */
  function theme_remote_image_url_replacements(): array {
    $source_url = trailingslashit( get_template_directory_uri() ) . 'assets/images/source-content/';

    return array(
      'https://images.unsplash.com/photo-1603967788945-b2215de1d7b7?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'front_hero_main' ),
      'https://images.unsplash.com/photo-1545665187-3df554344cb9?auto=format&fit=crop&w=900&q=80' => theme_default_image_url( 'front_hero_top' ),
      'https://images.unsplash.com/photo-1742822050731-dc9da52dad2e?auto=format&fit=crop&w=900&q=80' => theme_default_image_url( 'front_hero_bottom' ),
      'https://images.unsplash.com/photo-1637729099669-3881fe3e4de0?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'about_hero_main' ),
      'https://images.unsplash.com/photo-1642957323739-5632d8a2ff3d?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'about_hero_top' ),
      'https://images.unsplash.com/photo-1768141715449-a639464962c6?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'about_hero_bottom' ),
      'https://images.unsplash.com/photo-1737300932211-c448aa4983b8?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'about_story' ),
      'https://images.unsplash.com/photo-1776771839796-3174655e5b03?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'service_outdoor_main' ),
      'https://images.unsplash.com/photo-1767553821949-97cf017eb24d?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'service_outdoor_second' ),
      'https://images.unsplash.com/photo-1645911449646-c0fcb364b268?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'service_outdoor_third' ),
      'https://images.unsplash.com/photo-1630410701856-224eac65cf33?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'service_outdoor_process' ),
      'https://images.unsplash.com/photo-1585119192382-71236d43b689?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_preview' ),
      'https://images.unsplash.com/photo-1627618996171-53fafd0067af?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_archive_1' ),
      'https://images.unsplash.com/photo-1735201114376-571b44cad9dc?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_archive_2' ),
      'https://images.unsplash.com/photo-1698142477387-20a2e02008ec?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_archive_3' ),
      'https://images.unsplash.com/photo-1694432313593-6961a8000884?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_archive_4' ),
      'https://images.unsplash.com/photo-1727195077380-1c0f7e7a3456?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_archive_5' ),
      'https://images.unsplash.com/photo-1659671028320-8556646bcc95?auto=format&fit=crop&w=1080&q=80' => theme_default_image_url( 'company_letters_archive_6' ),
      'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80' => theme_default_image_url( 'news_detail_hero' ),
      'https://ra-pingvin.ru/wp-content/uploads/2022/09/bezymyannyj-1sh-06_6-scaled.jpg' => $source_url . 'shirokoformatnaya-pechat.jpg',
      'https://ra-pingvin.ru/wp-content/uploads/2022/09/bezymyannyj-1-05_1-scaled.jpg' => $source_url . 'poligrafiya.jpg',
      'https://ra-pingvin.ru/wp-content/uploads/2022/09/bezymyannyj-1-04_5-scaled.jpg' => $source_url . 'reklama-v-liftah.jpg',
      'https://ra-pingvin.ru/wp-content/uploads/2022/09/bezymyannyj-1_montazhnaya-oblast-1_2-scaled.jpg' => $source_url . 'naruzhnaya-reklama.jpg',
      'https://ra-pingvin.ru/wp-content/uploads/2022/09/bezymyannyj-1-03_4-scaled.jpg' => $source_url . 'lazernaya-gravirovka.jpg',
      'https://ra-pingvin.ru/wp-content/uploads/2025/01/i.jpg' => $source_url . 'izgotovlenie-pechatey.jpg',
      'https://ra-pingvin.ru/wp-content/uploads/2024/06/whatsapp-image-2024-06-19-at-14.16.44-1.jpeg' => $source_url . 'uf-pechat-1.jpeg',
      'https://ra-pingvin.ru/wp-content/uploads/2024/06/whatsapp-image-2024-06-19-at-14.16.43.jpeg' => $source_url . 'uf-pechat-2.jpeg',
      'https://ra-pingvin.ru/wp-content/uploads/2024/06/whatsapp-image-2024-06-19-at-14.16.44-2.jpeg' => $source_url . 'uf-pechat-3.jpeg',
      'https://ra-pingvin.ru/wp-content/uploads/2024/06/whatsapp-image-2024-06-19-at-14.16.44-3.jpeg' => $source_url . 'uf-pechat-4.jpeg',
      'https://ra-pingvin.ru/wp-content/uploads/2024/06/whatsapp-image-2024-06-19-at-14.16.44.jpeg' => $source_url . 'uf-pechat-5.jpeg',
    );
  }
}

if ( ! function_exists( 'theme_replace_remote_image_urls_in_value' ) ) {
  /**
   * Replace old remote image URLs inside scalar or array meta values.
   *
   * @param mixed                $value Value to inspect.
   * @param array<string,string> $replacements URL replacement map.
   * @param bool                 $changed Whether the value changed.
   * @return mixed
   */
  function theme_replace_remote_image_urls_in_value( $value, array $replacements, bool &$changed ) {
    if ( is_string( $value ) ) {
      $updated = str_replace( array_keys( $replacements ), array_values( $replacements ), $value );

      if ( $updated !== $value ) {
        $changed = true;
      }

      return $updated;
    }

    if ( is_array( $value ) ) {
      foreach ( $value as $key => $item ) {
        $value[ $key ] = theme_replace_remote_image_urls_in_value( $item, $replacements, $changed );
      }
    }

    return $value;
  }
}

if ( ! function_exists( 'theme_migrate_remote_image_urls' ) ) {
  /**
   * Replace previously saved remote image URLs with local theme asset URLs.
   *
   * @return void
   */
  function theme_migrate_remote_image_urls(): void {
    $version = '20260512_local_image_assets_1';

    if ( get_option( 'theme_remote_image_url_migration_version' ) === $version ) {
      return;
    }

    $replacements = theme_remote_image_url_replacements();
    $post_ids     = get_posts(
      array(
        'post_type'      => array( 'page', 'post', 'theme_service', 'theme_portfolio', 'theme_news' ),
        'post_status'    => 'any',
        'posts_per_page' => -1,
        'fields'         => 'ids',
      )
    );

    foreach ( $post_ids as $post_id ) {
      $post_meta = get_post_meta( (int) $post_id );

      foreach ( $post_meta as $meta_key => $meta_values ) {
        foreach ( $meta_values as $raw_value ) {
          $changed = false;
          $value   = maybe_unserialize( $raw_value );
          $updated = theme_replace_remote_image_urls_in_value( $value, $replacements, $changed );

          if ( $changed ) {
            update_post_meta( (int) $post_id, $meta_key, $updated, $value );
          }
        }
      }
    }

    update_option( 'theme_remote_image_url_migration_version', $version );
  }

  add_action( 'init', 'theme_migrate_remote_image_urls', 52 );
}

if ( ! function_exists( 'theme_update_group_field' ) ) {
  /**
   * Update ACF group by name with post meta fallback.
   *
   * @param int    $post_id Post ID.
   * @param string $name    Field name.
   * @param array  $value   Field value.
   * @return void
   */
  function theme_update_group_field( int $post_id, string $name, array $value ): void {
    if ( function_exists( 'update_field' ) ) {
      update_field( $name, $value, $post_id );
      return;
    }

    update_post_meta( $post_id, $name, $value );
  }
}

if ( ! function_exists( 'theme_seed_content_posts' ) ) {
  /**
   * Seed initial CPT posts once.
   *
   * @return void
   */
  function theme_seed_content_posts(): void {
    $version = '20260511_services_portfolio';

    if ( get_option( 'theme_content_seed_version' ) === $version ) {
      return;
    }

    $variants = theme_get_default_service_variants();

    foreach ( theme_default_services() as $index => $service ) {
      $existing = get_page_by_path( $service['slug'], OBJECT, 'theme_service' );
      $post_id  = $existing instanceof WP_Post ? (int) $existing->ID : 0;

      if ( ! $post_id ) {
        $post_id = wp_insert_post(
          array(
            'post_type'    => 'theme_service',
            'post_status'  => 'publish',
            'post_title'   => $service['title'],
            'post_name'    => $service['slug'],
            'post_excerpt' => $service['excerpt'],
            'menu_order'   => $index + 1,
            'post_content' => $service['excerpt'],
          )
        );
      }

      if ( is_wp_error( $post_id ) || ! $post_id ) {
        continue;
      }

      $variant = $variants[ $index % count( $variants ) ];
      theme_update_group_field(
        (int) $post_id,
        'service_card',
        array(
          'card_text'        => $service['excerpt'],
          'button_text'      => 'Подробнее',
          'image'            => $service['image'],
          'image_url'        => $service['image'],
          'home_modifier'    => $variant['home'],
          'archive_modifier' => $variant['archive'],
          'button_variant'   => $variant['button'],
        )
      );
      theme_update_group_field(
        (int) $post_id,
        'service_hero',
        array(
          'kicker'                => 'Услуга',
          'title'                 => $service['title'],
          'text'                  => $service['excerpt'],
          'primary_button_text'   => 'Рассчитать стоимость',
          'primary_button_url'    => '#request',
          'secondary_button_text' => 'Смотреть цены',
          'secondary_button_url'  => home_url( '/prajs/' ),
          'bullet_1'              => 'Подготовим макет',
          'bullet_2'              => 'Подберем материалы',
          'bullet_3'              => 'Изготовим и смонтируем',
          'image'                 => $service['image'],
          'image_url'             => $service['image'],
        )
      );
      theme_update_group_field(
        (int) $post_id,
        'service_highlights',
        array(
          'item_1_title' => 'Задача',
          'item_1_text'  => 'Уточняем формат, сроки, место размещения и требования к результату.',
          'item_2_title' => 'Производство',
          'item_2_text'  => 'Готовим макет, материалы и запускаем работу в производство.',
          'item_3_title' => 'Результат',
          'item_3_text'  => 'Передаем готовую продукцию или выполняем монтаж на объекте.',
        )
      );
      theme_update_group_field(
        (int) $post_id,
        'service_process',
        array(
          'title'     => 'Что входит в услугу',
          'list'      => "Консультация и расчет\nПодготовка или проверка макета\nПодбор технологии и материалов\nПроизводство\nДоставка или монтаж",
          'text'      => 'Точная стоимость зависит от размеров, тиража, материалов, сроков и необходимости монтажа.',
          'image'     => $service['image'],
          'image_url' => $service['image'],
        )
      );
    }

    foreach ( theme_default_portfolio_items() as $index => $item ) {
      $existing = get_page_by_path( $item['slug'], OBJECT, 'theme_portfolio' );
      $post_id  = $existing instanceof WP_Post ? (int) $existing->ID : 0;

      if ( ! $post_id ) {
        $post_id = wp_insert_post(
          array(
            'post_type'    => 'theme_portfolio',
            'post_status'  => 'publish',
            'post_title'   => $item['title'],
            'post_name'    => $item['slug'],
            'post_excerpt' => $item['excerpt'],
            'menu_order'   => $index + 1,
            'post_content' => $item['description'],
          )
        );
      }

      if ( is_wp_error( $post_id ) || ! $post_id ) {
        continue;
      }

      theme_update_group_field(
        (int) $post_id,
          'portfolio_content',
          array(
          'kicker'       => 'Кейс',
          'description'  => $item['description'],
          'client'       => $item['client'] ?? '',
          'duration'     => $item['duration'] ?? '',
          'composition'  => $item['composition'] ?? '',
          'cover'        => $item['images'][0],
          'cover_url'    => $item['images'][0],
          'gallery'      => $item['images'],
          'gallery_urls' => implode( "\n", $item['images'] ),
          'result_title' => 'Результат проекта',
          'result_text'  => $item['result_text'] ?? $item['description'],
          'scope_title'  => 'Что было сделано',
          'scope_list'   => $item['scope_list'] ?? '',
        )
      );
    }

    update_option( 'theme_content_seed_version', $version );
  }

  add_action( 'init', 'theme_seed_content_posts', 40 );
}

if ( ! function_exists( 'theme_get_service_cards' ) ) {
  /**
   * Get service cards from CPT with fallback to imported defaults.
   *
   * @param int $limit Posts limit.
   * @return array<int,array<string,string>>
   */
  function theme_get_service_cards( int $limit = -1 ): array {
    $query = new WP_Query(
      array(
        'post_type'      => 'theme_service',
        'post_status'    => 'publish',
        'posts_per_page' => $limit,
        'orderby'        => array(
          'menu_order' => 'ASC',
          'date'       => 'DESC',
        ),
        'no_found_rows'  => true,
      )
    );

    $cards    = array();
    $variants = theme_get_default_service_variants();

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();
        $index    = count( $cards );
        $variant  = $variants[ $index % count( $variants ) ];
        $defaults = array(
          'card_text'        => get_the_excerpt(),
          'button_text'      => 'Подробнее',
          'image'            => '',
          'image_url'        => '',
          'home_modifier'    => $variant['home'],
          'archive_modifier' => $variant['archive'],
          'button_variant'   => $variant['button'],
        );
        $card     = theme_get_acf_group( 'service_card', $defaults, get_the_ID() );

        $cards[] = array(
          'index'            => sprintf( '%02d', $index + 1 ),
          'title'            => get_the_title(),
          'text'             => $card['card_text'] ?: get_the_excerpt(),
          'button_text'      => $card['button_text'] ?: 'Подробнее',
          'url'              => get_permalink(),
          'image_url'        => theme_get_group_image_url( $card ),
          'home_modifier'    => $card['home_modifier'] ?: $variant['home'],
          'archive_modifier' => $card['archive_modifier'] ?: $variant['archive'],
          'button_variant'   => $card['button_variant'] ?: $variant['button'],
        );
      }

      wp_reset_postdata();
    }

    if ( ! empty( $cards ) ) {
      return $cards;
    }

    foreach ( theme_default_services() as $index => $service ) {
      if ( -1 !== $limit && $index >= $limit ) {
        break;
      }

      $variant = $variants[ $index % count( $variants ) ];
      $cards[] = array(
        'index'            => sprintf( '%02d', $index + 1 ),
        'title'            => $service['title'],
        'text'             => $service['excerpt'],
        'button_text'      => 'Подробнее',
        'url'              => home_url( '/uslugi/' . $service['slug'] . '/' ),
        'image_url'        => $service['image'],
        'home_modifier'    => $variant['home'],
        'archive_modifier' => $variant['archive'],
        'button_variant'   => $variant['button'],
      );
    }

    return $cards;
  }
}

if ( ! function_exists( 'theme_import_acf_image' ) ) {
  /**
   * Import an external image into Media Library and return its attachment ID.
   *
   * @param string $image_url Source image URL.
   * @param int    $post_id   Parent post ID.
   * @return int
   */
  function theme_import_acf_image( string $image_url, int $post_id = 0 ): int {
    $image_url = esc_url_raw( $image_url );

    if ( ! $image_url ) {
      return 0;
    }

    $local_attachment_id = attachment_url_to_postid( $image_url );

    if ( $local_attachment_id ) {
      return (int) $local_attachment_id;
    }

    $existing = get_posts(
      array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_key'       => '_theme_source_image_url',
        'meta_value'     => $image_url,
      )
    );

    if ( ! empty( $existing ) ) {
      return (int) $existing[0];
    }

    if ( ! function_exists( 'media_sideload_image' ) ) {
      require_once ABSPATH . 'wp-admin/includes/media.php';
      require_once ABSPATH . 'wp-admin/includes/file.php';
      require_once ABSPATH . 'wp-admin/includes/image.php';
    }

    $attachment_id = media_sideload_image( $image_url, $post_id, null, 'id' );

    if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
      return 0;
    }

    update_post_meta( (int) $attachment_id, '_theme_source_image_url', $image_url );

    return (int) $attachment_id;
  }
}

if ( ! function_exists( 'theme_normalize_source_portfolio_image_url' ) ) {
  /**
   * Normalize source portfolio image URL from src/srcset markup.
   *
   * @param string $image_url Source image URL.
   * @return string
   */
  function theme_normalize_source_portfolio_image_url( string $image_url ): string {
    $image_url = html_entity_decode( trim( $image_url ), ENT_QUOTES, 'UTF-8' );
    $image_url = preg_replace( '/\?.*$/', '', $image_url );
    $image_url = preg_replace( '/-\d+x\d+(?=\.(?:jpe?g|png|webp)$)/i', '', (string) $image_url );

    if ( 0 === strpos( $image_url, '//' ) ) {
      $image_url = 'https:' . $image_url;
    }

    if ( 0 === strpos( $image_url, '/wp-content/uploads/' ) ) {
      $image_url = 'https://ra-pingvin.ru' . $image_url;
    }

    return esc_url_raw( $image_url );
  }
}

if ( ! function_exists( 'theme_is_source_portfolio_image_url' ) ) {
  /**
   * Check if an image URL looks like useful portfolio content.
   *
   * @param string $image_url Image URL.
   * @return bool
   */
  function theme_is_source_portfolio_image_url( string $image_url ): bool {
    $path = (string) wp_parse_url( $image_url, PHP_URL_PATH );

    if ( ! $path || ! preg_match( '~^/wp-content/uploads/.+\.(?:jpe?g|png|webp)$~i', $path ) ) {
      return false;
    }

    $filename = strtolower( basename( $path ) );

    foreach ( array( 'logo', 'favicon', '42_montazhnaya', 'politika', 'soglasie', 'prajs', 'price' ) as $ignored ) {
      if ( false !== strpos( $filename, $ignored ) ) {
        return false;
      }
    }

    return true;
  }
}

if ( ! function_exists( 'theme_fetch_source_portfolio_image_urls' ) ) {
  /**
   * Extract all usable image URLs from a source portfolio/service page.
   *
   * @param string $source_url Source page URL.
   * @return array<int,string>
   */
  function theme_fetch_source_portfolio_image_urls( string $source_url ): array {
    $response = wp_remote_get(
      $source_url,
      array(
        'timeout'     => 20,
        'redirection' => 5,
        'user-agent'  => 'RPK Pingvin portfolio importer',
      )
    );

    if ( is_wp_error( $response ) || 400 <= (int) wp_remote_retrieve_response_code( $response ) ) {
      return array();
    }

    $body = (string) wp_remote_retrieve_body( $response );

    if ( '' === $body ) {
      return array();
    }

    $body = html_entity_decode( $body, ENT_QUOTES, 'UTF-8' );
    preg_match_all( '~(?:https?:)?//ra-pingvin\.ru/wp-content/uploads/[^"\'<>\s),]+\.(?:jpe?g|png|webp)(?:\?[^"\'<>\s),]+)?|/wp-content/uploads/[^"\'<>\s),]+\.(?:jpe?g|png|webp)(?:\?[^"\'<>\s),]+)?~i', $body, $matches );

    $image_urls = array();

    foreach ( $matches[0] ?? array() as $image_url ) {
      $image_url = theme_normalize_source_portfolio_image_url( $image_url );

      if ( $image_url && theme_is_source_portfolio_image_url( $image_url ) ) {
        $image_urls[] = $image_url;
      }
    }

    return array_values( array_unique( $image_urls ) );
  }
}

if ( ! function_exists( 'theme_import_source_portfolio_items' ) ) {
  /**
   * Create portfolio posts from reference pages and import their images.
   *
   * @return void
   */
  function theme_import_source_portfolio_items(): void {
    $version = '20260512_source_portfolio_items_1';

    if ( get_option( 'theme_source_portfolio_import_version' ) === $version ) {
      return;
    }

    $had_remote_error = false;

    foreach ( theme_default_portfolio_items() as $index => $item ) {
      if ( empty( $item['source_url'] ) ) {
        continue;
      }

      $post = get_page_by_path( $item['slug'], OBJECT, 'theme_portfolio' );
      $post_id = $post instanceof WP_Post ? (int) $post->ID : 0;

      $post_data = array(
        'post_type'    => 'theme_portfolio',
        'post_status'  => 'publish',
        'post_title'   => $item['title'],
        'post_name'    => $item['slug'],
        'post_excerpt' => $item['excerpt'],
        'post_content' => $item['description'],
        'menu_order'   => $index + 1,
      );

      if ( $post_id ) {
        $post_data['ID'] = $post_id;
        wp_update_post( $post_data );
      } else {
        $post_id = wp_insert_post( $post_data );
      }

      if ( is_wp_error( $post_id ) || ! $post_id ) {
        $had_remote_error = true;
        continue;
      }

      $source_images = theme_fetch_source_portfolio_image_urls( (string) $item['source_url'] );

      if ( empty( $source_images ) ) {
        $had_remote_error = true;
        $source_images    = $item['images'];
      }

      $gallery_ids = array();

      foreach ( $source_images as $source_image_url ) {
        $gallery_ids[] = theme_import_acf_image( $source_image_url, (int) $post_id ) ?: $source_image_url;
      }

      $gallery_ids = array_values( array_filter( $gallery_ids ) );
      $cover       = $gallery_ids[0] ?? ( $item['images'][0] ?? '' );
      $cover_url   = $source_images[0] ?? ( $item['images'][0] ?? '' );

      theme_update_group_field(
        (int) $post_id,
        'portfolio_content',
        array(
          'kicker'       => 'Кейс',
          'description'  => $item['description'],
          'client'       => $item['client'] ?? '',
          'duration'     => $item['duration'] ?? '',
          'composition'  => $item['composition'] ?? '',
          'cover'        => $cover,
          'cover_url'    => $cover_url,
          'gallery'      => $gallery_ids,
          'gallery_urls' => implode( "\n", $source_images ),
          'result_title' => 'Результат проекта',
          'result_text'  => $item['result_text'] ?? $item['description'],
          'scope_title'  => 'Что было сделано',
          'scope_list'   => $item['scope_list'] ?? '',
        )
      );

      update_post_meta( (int) $post_id, '_theme_source_portfolio_url', esc_url_raw( (string) $item['source_url'] ) );
    }

    if ( ! $had_remote_error ) {
      update_option( 'theme_source_portfolio_import_version', $version );
    }
  }

  add_action( 'init', 'theme_import_source_portfolio_items', 47 );
}

if ( ! function_exists( 'theme_fetch_source_news_items' ) ) {
  /**
   * Fetch news posts from the reference site REST API.
   *
   * @return array<int,array<string,mixed>>
   */
  function theme_fetch_source_news_items(): array {
    $items = array();

    for ( $page = 1; $page <= 2; $page++ ) {
      $source_url = add_query_arg(
        array(
          'per_page' => 6,
          'page'     => $page,
          '_embed'   => 1,
        ),
        'https://ra-pingvin.ru/wp-json/wp/v2/posts'
      );
      $response   = wp_remote_get(
        $source_url,
        array(
          'timeout'     => 20,
          'redirection' => 5,
          'user-agent'  => 'RPK Pingvin news importer',
        )
      );

      if ( is_wp_error( $response ) || 400 <= (int) wp_remote_retrieve_response_code( $response ) ) {
        continue;
      }

      $data = json_decode( (string) wp_remote_retrieve_body( $response ), true );

      if ( ! is_array( $data ) ) {
        continue;
      }

      foreach ( $data as $post_item ) {
        if ( is_array( $post_item ) ) {
          $items[] = $post_item;
        }
      }
    }

    return $items;
  }
}

if ( ! function_exists( 'theme_get_source_news_rendered_value' ) ) {
  /**
   * Read and decode rendered REST value.
   *
   * @param array  $item Source item.
   * @param string $key  Field key.
   * @return string
   */
  function theme_get_source_news_rendered_value( array $item, string $key ): string {
    $value = $item[ $key ]['rendered'] ?? '';

    return is_string( $value ) ? html_entity_decode( $value, ENT_QUOTES, 'UTF-8' ) : '';
  }
}

if ( ! function_exists( 'theme_get_source_news_featured_image_url' ) ) {
  /**
   * Get full featured image URL from embedded REST data.
   *
   * @param array $item Source item.
   * @return string
   */
  function theme_get_source_news_featured_image_url( array $item ): string {
    $media = $item['_embedded']['wp:featuredmedia'][0] ?? array();

    if ( ! is_array( $media ) ) {
      return '';
    }

    $image_url = $media['media_details']['sizes']['full']['source_url'] ?? ( $media['source_url'] ?? '' );

    return is_string( $image_url ) ? esc_url_raw( $image_url ) : '';
  }
}

if ( ! function_exists( 'theme_import_post_content_images' ) ) {
  /**
   * Import images used inside post content and replace source URLs with local URLs.
   *
   * @param string $content Source post content.
   * @param int    $post_id Post ID.
   * @return string
   */
  function theme_import_post_content_images( string $content, int $post_id ): string {
    if ( '' === $content ) {
      return $content;
    }

    preg_match_all( '~https?://ra-pingvin\.ru/wp-content/uploads/[^"\'<>\s)]+\.(?:jpe?g|png|webp)(?:\?[^"\'<>\s)]+)?~i', $content, $matches );

    foreach ( array_unique( $matches[0] ?? array() ) as $source_image_url ) {
      $source_image_url = theme_normalize_source_portfolio_image_url( $source_image_url );
      $attachment_id    = theme_import_acf_image( $source_image_url, $post_id );

      if ( ! $attachment_id ) {
        continue;
      }

      $local_url = wp_get_attachment_image_url( $attachment_id, 'full' );

      if ( $local_url ) {
        $content = str_replace( $source_image_url, $local_url, $content );
      }
    }

    $content = preg_replace( '/\s(?:srcset|sizes)="[^"]*"/i', '', $content );

    return is_string( $content ) ? $content : '';
  }
}

if ( ! function_exists( 'theme_import_source_news_posts' ) ) {
  /**
   * Create news posts from the first two reference news pages.
   *
   * @return void
   */
  function theme_import_source_news_posts(): void {
    $version = '20260512_source_news_posts_2';

    if ( get_option( 'theme_source_news_import_version' ) === $version ) {
      return;
    }

    $items = theme_fetch_source_news_items();

    if ( count( $items ) < 12 ) {
      return;
    }

    foreach ( $items as $item ) {
      $source_id = isset( $item['id'] ) ? (int) $item['id'] : 0;
      $slug      = sanitize_title( (string) ( $item['slug'] ?? '' ) );
      $content   = theme_get_source_news_rendered_value( $item, 'content' );
      $excerpt   = wp_trim_words( wp_strip_all_tags( theme_get_source_news_rendered_value( $item, 'excerpt' ) ), 32, '' );
      $title     = trim( wp_strip_all_tags( theme_get_source_news_rendered_value( $item, 'title' ) ) );

      if ( '' === $title ) {
        $title = wp_trim_words( wp_strip_all_tags( $excerpt ?: $content ), 10, '' );
      }

      if ( '' === $title ) {
        $title = 'Новость РПК ПинГвин';
      }

      if ( '' === $excerpt ) {
        $excerpt = wp_trim_words( wp_strip_all_tags( $content ), 32, '' );
      }

      $existing_ids = $source_id ? get_posts(
        array(
          'post_type'      => 'theme_news',
          'post_status'    => 'any',
          'posts_per_page' => 1,
          'fields'         => 'ids',
          'meta_key'       => '_theme_source_news_id',
          'meta_value'     => (string) $source_id,
        )
      ) : array();
      $post_id      = ! empty( $existing_ids ) ? (int) $existing_ids[0] : 0;

      if ( ! $post_id && $slug ) {
        $existing = get_page_by_path( $slug, OBJECT, 'theme_news' );
        $post_id  = $existing instanceof WP_Post ? (int) $existing->ID : 0;
      }

      $post_date = is_string( $item['date'] ?? null ) ? str_replace( 'T', ' ', (string) $item['date'] ) : current_time( 'mysql' );
      $post_data = array(
        'post_type'    => 'theme_news',
        'post_status'  => 'publish',
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_excerpt' => $excerpt,
        'post_content' => wp_kses_post( $content ),
        'post_date'    => $post_date,
        'post_date_gmt' => get_gmt_from_date( $post_date ),
      );

      if ( $post_id ) {
        $post_data['ID'] = $post_id;
        wp_update_post( $post_data );
      } else {
        $post_id = wp_insert_post( $post_data );
      }

      if ( is_wp_error( $post_id ) || ! $post_id ) {
        continue;
      }

      $post_id            = (int) $post_id;
      $featured_image_url = theme_get_source_news_featured_image_url( $item );
      $featured_image_id  = $featured_image_url ? theme_import_acf_image( $featured_image_url, $post_id ) : 0;
      $content            = theme_import_post_content_images( $content, $post_id );

      if ( $content ) {
        wp_update_post(
          array(
            'ID'           => $post_id,
            'post_content' => wp_kses_post( $content ),
          )
        );
      }

      if ( $featured_image_id ) {
        set_post_thumbnail( $post_id, $featured_image_id );
      }

      if ( $source_id ) {
        update_post_meta( $post_id, '_theme_source_news_id', (string) $source_id );
      }

      if ( ! empty( $item['link'] ) && is_string( $item['link'] ) ) {
        update_post_meta( $post_id, '_theme_source_news_url', esc_url_raw( $item['link'] ) );
      }
    }

    update_option( 'theme_source_news_import_version', $version );
  }

  add_action( 'init', 'theme_import_source_news_posts', 48 );
}

if ( ! function_exists( 'theme_get_page_ids_by_template' ) ) {
  /**
   * Get page IDs assigned to a page template.
   *
   * @param string $template Template path.
   * @return array<int,int>
   */
  function theme_get_page_ids_by_template( string $template ): array {
    $pages = get_pages(
      array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $template,
        'number'     => 0,
      )
    );

    return array_map( 'intval', wp_list_pluck( $pages, 'ID' ) );
  }
}

if ( ! function_exists( 'theme_migrate_content_image_fields' ) ) {
  /**
   * Move legacy URL image fields to ACF image/gallery fields.
   *
   * @return void
   */
  function theme_migrate_content_image_fields(): void {
    $version = '20260511_acf_image_fields_4';

    if ( get_option( 'theme_content_image_fields_version' ) === $version ) {
      return;
    }

    foreach ( theme_default_services() as $service ) {
      $post = get_page_by_path( $service['slug'], OBJECT, 'theme_service' );

      if ( ! $post instanceof WP_Post ) {
        continue;
      }

      foreach ( array( 'service_card', 'service_hero', 'service_process' ) as $field_name ) {
        $group     = theme_get_acf_group( $field_name, array(), $post->ID );
        $source    = theme_get_group_image_url( $group, 'image', 'image_url', $service['image'] );
        $image_id  = theme_import_acf_image( $source, (int) $post->ID );
        $group['image'] = $image_id ?: $source;

        theme_update_group_field( (int) $post->ID, $field_name, $group );
      }
    }

    foreach ( theme_default_portfolio_items() as $item ) {
      $post = get_page_by_path( $item['slug'], OBJECT, 'theme_portfolio' );

      if ( ! $post instanceof WP_Post ) {
        continue;
      }

      $content      = theme_get_acf_group( 'portfolio_content', array(), $post->ID );
      $cover_source = theme_get_group_image_url( $content, 'cover', 'cover_url', $item['images'][0] );
      $cover_id     = theme_import_acf_image( $cover_source, (int) $post->ID );
      $gallery      = array();
      $gallery_raw  = $content['gallery'] ?? array();

      if ( is_array( $gallery_raw ) ) {
        foreach ( $gallery_raw as $gallery_item ) {
          $gallery_url = theme_get_image_url( $gallery_item );

          if ( $gallery_url ) {
            $gallery[] = $gallery_url;
          }
        }
      } elseif ( is_string( $gallery_raw ) ) {
        $gallery = theme_parse_url_lines( $gallery_raw );
      }

      if ( empty( $gallery ) && ! empty( $content['gallery_urls'] ) ) {
        $gallery = theme_parse_url_lines( (string) $content['gallery_urls'] );
      }

      if ( empty( $gallery ) ) {
        $gallery = $item['images'];
      }

      $gallery_ids = array();

      foreach ( $gallery as $gallery_url ) {
        $gallery_ids[] = theme_import_acf_image( $gallery_url, (int) $post->ID ) ?: $gallery_url;
      }

      $content['cover']   = $gallery_ids[0] ?? ( $cover_id ?: $cover_source );
      $content['cover_url'] = $gallery[0] ?? $cover_source;
      $content['gallery'] = $gallery_ids;

      theme_update_group_field( (int) $post->ID, 'portfolio_content', $content );
    }

    $front_page_ids = array(
      (int) get_option( 'page_on_front' ),
      (int) url_to_postid( home_url( '/' ) ),
    );
    $front_page_meta_ids = get_posts(
      array(
        'post_type'      => 'page',
        'post_status'    => 'any',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_key'       => 'front_page_hero',
      )
    );
    $front_page_ids = array_filter(
      array_unique(
        array_map( 'intval', array_merge( $front_page_ids, is_array( $front_page_meta_ids ) ? $front_page_meta_ids : array() ) )
      )
    );

    foreach ( $front_page_ids as $front_page_id ) {
      $hero = theme_get_acf_group( 'front_page_hero', array(), $front_page_id );

      foreach (
        array(
          'main_case_image'        => 'front_hero_main',
          'side_case_top_image'    => 'front_hero_top',
          'side_case_bottom_image' => 'front_hero_bottom',
        ) as $field_name => $image_key
      ) {
        if ( empty( $hero[ $field_name ] ) && ! empty( $hero[ $field_name . '_url' ] ) ) {
          $source             = theme_get_image_url( $hero[ $field_name . '_url' ] ?? '' );
          $hero[ $field_name ] = theme_import_acf_image( $source, $front_page_id ) ?: $source;
        }
      }

      theme_update_group_field( $front_page_id, 'front_page_hero', $hero );
    }

    foreach ( theme_get_page_ids_by_template( 'templates/about-us.php' ) as $page_id ) {
      $hero = theme_get_acf_group( 'about_us_hero', array(), $page_id );

      foreach (
        array(
          'main_image'   => 'about_hero_main',
          'top_image'    => 'about_hero_top',
          'bottom_image' => 'about_hero_bottom',
        ) as $field_name => $image_key
      ) {
        if ( empty( $hero[ $field_name ] ) && ! empty( $hero[ $field_name . '_url' ] ) ) {
          $source              = theme_get_image_url( $hero[ $field_name . '_url' ] ?? '' );
          $hero[ $field_name ] = theme_import_acf_image( $source, $page_id ) ?: $source;
        }
      }

      theme_update_group_field( $page_id, 'about_us_hero', $hero );

      $overview = theme_get_acf_group( 'about_us_overview', array(), $page_id );

      if ( empty( $overview['story_image'] ) && ! empty( $overview['story_image_url'] ) ) {
        $source                  = theme_get_image_url( $overview['story_image_url'] ?? '' );
        $overview['story_image'] = theme_import_acf_image( $source, $page_id ) ?: $source;
      }

      theme_update_group_field( $page_id, 'about_us_overview', $overview );
    }

    foreach ( theme_get_page_ids_by_template( 'templates/service-outdoor-advertising.php' ) as $page_id ) {
      $hero = theme_get_acf_group( 'service_outdoor_hero', array(), $page_id );

      foreach (
        array(
          'main_image'   => 'service_outdoor_main',
          'second_image' => 'service_outdoor_second',
          'third_image'  => 'service_outdoor_third',
        ) as $field_name => $image_key
      ) {
        if ( empty( $hero[ $field_name ] ) && ! empty( $hero[ $field_name . '_url' ] ) ) {
          $source              = theme_get_image_url( $hero[ $field_name . '_url' ] ?? '' );
          $hero[ $field_name ] = theme_import_acf_image( $source, $page_id ) ?: $source;
        }
      }

      theme_update_group_field( $page_id, 'service_outdoor_hero', $hero );

      $process = theme_get_acf_group( 'service_outdoor_process', array(), $page_id );

      if ( empty( $process['image'] ) && ! empty( $process['image_url'] ) ) {
        $source           = theme_get_image_url( $process['image_url'] ?? '' );
        $process['image'] = theme_import_acf_image( $source, $page_id ) ?: $source;
      }

      theme_update_group_field( $page_id, 'service_outdoor_process', $process );
    }

    foreach ( theme_get_page_ids_by_template( 'templates/company-letters.php' ) as $page_id ) {
      $hero = theme_get_acf_group( 'company_letters_hero', array(), $page_id );

      if ( empty( $hero['preview_image'] ) && ! empty( $hero['preview_image_url'] ) ) {
        $source                = theme_get_image_url( $hero['preview_image_url'] ?? '' );
        $hero['preview_image'] = theme_import_acf_image( $source, $page_id ) ?: $source;
      }

      theme_update_group_field( $page_id, 'company_letters_hero', $hero );

      $archive = theme_get_acf_group( 'company_letters_archive', array(), $page_id );

      for ( $index = 1; $index <= 6; $index++ ) {
        $field_name = 'letter_' . $index . '_image';

        if ( empty( $archive[ $field_name ] ) && ! empty( $archive[ $field_name . '_url' ] ) ) {
          $source                 = theme_get_image_url( $archive[ $field_name . '_url' ] ?? '' );
          $archive[ $field_name ] = theme_import_acf_image( $source, $page_id ) ?: $source;
        }
      }

      theme_update_group_field( $page_id, 'company_letters_archive', $archive );
    }

    foreach ( theme_get_page_ids_by_template( 'templates/news-detail.php' ) as $page_id ) {
      $hero = theme_get_acf_group( 'news_detail_hero', array(), $page_id );

      if ( empty( $hero['image'] ) && ! empty( $hero['image_url'] ) ) {
        $source        = theme_get_image_url( $hero['image_url'] ?? '' );
        $hero['image'] = theme_import_acf_image( $source, $page_id ) ?: $source;
      }

      theme_update_group_field( $page_id, 'news_detail_hero', $hero );
    }

    update_option( 'theme_content_image_fields_version', $version );
  }

  add_action( 'init', 'theme_migrate_content_image_fields', 45 );
}

if ( ! function_exists( 'theme_migrate_company_letters_repeater' ) ) {
  /**
   * Move company letter images from fixed archive fields to repeater rows.
   *
   * @return void
   */
  function theme_migrate_company_letters_repeater(): void {
    $version = '20260512_company_letters_repeater';

    if ( get_option( 'theme_company_letters_repeater_version' ) === $version ) {
      return;
    }

    foreach ( theme_get_page_ids_by_template( 'templates/company-letters.php' ) as $page_id ) {
      $archive = theme_get_acf_group( 'company_letters_archive', array(), $page_id );
      $letters = array();

      if ( is_array( $archive['letters'] ?? null ) ) {
        foreach ( $archive['letters'] as $letter ) {
          $image_value = is_array( $letter ) ? ( $letter['image'] ?? '' ) : $letter;
          $image_url   = theme_get_image_url( $image_value );

          if ( $image_url ) {
            $letters[] = array(
              'image' => theme_import_acf_image( $image_url, $page_id ) ?: $image_value,
            );
          }
        }
      }

      if ( empty( $letters ) ) {
        for ( $index = 1; $index <= 6; $index++ ) {
          $field_name  = 'letter_' . $index . '_image';
          $image_value = $archive[ $field_name ] ?? get_post_meta( $page_id, 'company_letters_archive_' . $field_name, true );
          $image_url   = theme_get_image_url( $image_value );

          if ( $image_url ) {
            $letters[] = array(
              'image' => theme_import_acf_image( $image_url, $page_id ) ?: $image_url,
            );
          }
        }
      }

      $archive['letters'] = $letters;

      theme_update_group_field( $page_id, 'company_letters_archive', $archive );
    }

    update_option( 'theme_company_letters_repeater_version', $version );
  }

  add_action( 'init', 'theme_migrate_company_letters_repeater', 46 );
}

if ( ! function_exists( 'theme_parse_url_lines' ) ) {
  /**
   * Parse URL list from textarea.
   *
   * @param string $value Raw textarea value.
   * @return array<int,string>
   */
  function theme_parse_url_lines( string $value ): array {
    $lines = preg_split( '/\r\n|\r|\n/', $value );
    $lines = array_filter(
      array_map(
        static function ( string $line ): string {
          return esc_url_raw( trim( $line ) );
        },
        is_array( $lines ) ? $lines : array()
      )
    );

    return array_values( $lines );
  }
}
