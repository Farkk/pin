<?php
/**
 * Theme settings page.
 *
 * @package theme
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! function_exists( 'theme_get_logo_url' ) ) {
  /**
   * Resolve configured theme logo URL.
   *
   * @return string
   */
  function theme_get_logo_url(): string {
    $logo_id = (int) get_option( 'theme_logo_id', 0 );

    if ( ! $logo_id ) {
      return '';
    }

    $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );

    if ( ! $logo_url ) {
      $logo_url = wp_get_attachment_url( $logo_id );
    }

    return $logo_url ? (string) $logo_url : '';
  }
}

if ( ! function_exists( 'theme_get_contact_defaults' ) ) {
  /**
   * Get default contact settings.
   *
   * @return array<string, string>
   */
  function theme_get_contact_defaults(): array {
    return array(
      'phone'        => '+7 (495) 120-30-40',
      'address'      => 'Домодедово · Москва · МО',
      'whatsapp_url' => '',
      'telegram_url' => '',
      'max_url'      => '',
      'request_email' => get_option( 'admin_email' ),
    );
  }
}

if ( ! function_exists( 'theme_get_contact_option' ) ) {
  /**
   * Resolve contact option with a default fallback.
   *
   * @param string $name Option short name.
   * @return string
   */
  function theme_get_contact_option( string $name ): string {
    $defaults = theme_get_contact_defaults();
    $default  = $defaults[ $name ] ?? '';
    $value    = get_option( 'theme_contact_' . $name, $default );

    if ( ! is_string( $value ) ) {
      return $default;
    }

    $value = trim( $value );

    return '' !== $value ? $value : $default;
  }
}

if ( ! function_exists( 'theme_get_contact_phone' ) ) {
  /**
   * Get public contact phone.
   *
   * @return string
   */
  function theme_get_contact_phone(): string {
    return theme_get_contact_option( 'phone' );
  }
}

if ( ! function_exists( 'theme_get_contact_phone_href' ) ) {
  /**
   * Build tel: URL from public phone.
   *
   * @return string
   */
  function theme_get_contact_phone_href(): string {
    $phone = theme_get_contact_phone();
    $href  = preg_replace( '/(?!^\+)[^\d]/', '', $phone );

    return $href ? 'tel:' . $href : '#contacts';
  }
}

if ( ! function_exists( 'theme_get_contact_address' ) ) {
  /**
   * Get public contact address.
   *
   * @return string
   */
  function theme_get_contact_address(): string {
    return theme_get_contact_option( 'address' );
  }
}

if ( ! function_exists( 'theme_get_whatsapp_url' ) ) {
  /**
   * Get WhatsApp contact URL.
   *
   * @return string
   */
  function theme_get_whatsapp_url(): string {
    return theme_get_contact_option( 'whatsapp_url' );
  }
}

if ( ! function_exists( 'theme_get_telegram_url' ) ) {
  /**
   * Get Telegram contact URL.
   *
   * @return string
   */
  function theme_get_telegram_url(): string {
    return theme_get_contact_option( 'telegram_url' );
  }
}

if ( ! function_exists( 'theme_get_max_url' ) ) {
  /**
   * Get Max contact URL.
   *
   * @return string
   */
  function theme_get_max_url(): string {
    return theme_get_contact_option( 'max_url' );
  }
}

if ( ! function_exists( 'theme_get_request_email' ) ) {
  /**
   * Get email address for site request forms.
   *
   * @return string
   */
  function theme_get_request_email(): string {
    $email = theme_get_contact_option( 'request_email' );

    return is_email( $email ) ? $email : get_option( 'admin_email' );
  }
}

if ( ! function_exists( 'theme_register_settings_page' ) ) {
  /**
   * Register theme settings admin page.
   *
   * @return void
   */
  function theme_register_settings_page(): void {
    add_theme_page(
      'Настройки темы',
      'Настройки темы',
      'manage_options',
      'theme-settings',
      'theme_render_settings_page'
    );
  }

  add_action( 'admin_menu', 'theme_register_settings_page' );
}

if ( ! function_exists( 'theme_enqueue_settings_assets' ) ) {
  /**
   * Enqueue media uploader on theme settings page.
   *
   * @param string $hook_suffix Admin page hook.
   * @return void
   */
  function theme_enqueue_settings_assets( string $hook_suffix ): void {
    if ( 'appearance_page_theme-settings' !== $hook_suffix ) {
      return;
    }

    $script_path = get_theme_file_path( 'assets/js/admin-theme-settings.js' );

    wp_enqueue_media();
    wp_enqueue_script(
      'theme-admin-settings',
      get_theme_file_uri( 'assets/js/admin-theme-settings.js' ),
      array( 'jquery' ),
      file_exists( $script_path ) ? (string) filemtime( $script_path ) : null,
      true
    );
    wp_localize_script(
      'theme-admin-settings',
      'themeSettingsMedia',
      array(
        'frameTitle'  => 'Выберите логотип',
        'buttonText'  => 'Использовать логотип',
        'placeholder' => 'Логотип не выбран',
      )
    );
  }

  add_action( 'admin_enqueue_scripts', 'theme_enqueue_settings_assets' );
}

if ( ! function_exists( 'theme_render_settings_page' ) ) {
  /**
   * Render theme settings page.
   *
   * @return void
   */
  function theme_render_settings_page(): void {
    if ( ! current_user_can( 'manage_options' ) ) {
      return;
    }

    if ( isset( $_POST['theme_settings_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['theme_settings_nonce'] ) ), 'theme_save_settings' ) ) {
      update_option( 'theme_logo_id', absint( $_POST['theme_logo_id'] ?? 0 ) );
      update_option( 'theme_contact_phone', sanitize_text_field( wp_unslash( $_POST['theme_contact_phone'] ?? '' ) ) );
      update_option( 'theme_contact_address', sanitize_textarea_field( wp_unslash( $_POST['theme_contact_address'] ?? '' ) ) );
      update_option( 'theme_contact_whatsapp_url', esc_url_raw( wp_unslash( $_POST['theme_contact_whatsapp_url'] ?? '' ) ) );
      update_option( 'theme_contact_telegram_url', esc_url_raw( wp_unslash( $_POST['theme_contact_telegram_url'] ?? '' ) ) );
      update_option( 'theme_contact_max_url', esc_url_raw( wp_unslash( $_POST['theme_contact_max_url'] ?? '' ) ) );
      update_option( 'theme_contact_request_email', sanitize_email( wp_unslash( $_POST['theme_contact_request_email'] ?? '' ) ) );

      echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Настройки сохранены.', 'theme' ) . '</p></div>';
    }

    $logo_id      = (int) get_option( 'theme_logo_id', 0 );
    $logo_url     = $logo_id ? wp_get_attachment_image_url( $logo_id, 'medium' ) : '';
    $contact_data = array(
      'phone'        => theme_get_contact_phone(),
      'address'      => theme_get_contact_address(),
      'whatsapp_url' => theme_get_whatsapp_url(),
      'telegram_url' => theme_get_telegram_url(),
      'max_url'      => theme_get_max_url(),
      'request_email' => theme_get_request_email(),
    );
    ?>
    <div class="wrap">
      <h1><?php esc_html_e( 'Настройки темы', 'theme' ); ?></h1>

      <form method="post" action="">
        <?php wp_nonce_field( 'theme_save_settings', 'theme_settings_nonce' ); ?>

        <table class="form-table" role="presentation">
          <tr>
            <th scope="row">
              <label for="theme-logo-id"><?php esc_html_e( 'Логотип', 'theme' ); ?></label>
            </th>
            <td>
              <input id="theme-logo-id" class="js-theme-logo-id" type="hidden" name="theme_logo_id" value="<?php echo esc_attr( (string) $logo_id ); ?>">

              <div class="js-theme-logo-preview" style="margin: 0 0 12px;">
                <?php if ( $logo_url ) : ?>
                  <img src="<?php echo esc_url( $logo_url ); ?>" alt="" style="display:block;max-width:240px;height:auto;padding:12px;background:#fff;border:1px solid #c3c4c7;">
                <?php else : ?>
                  <span><?php esc_html_e( 'Логотип не выбран', 'theme' ); ?></span>
                <?php endif; ?>
              </div>

              <button class="button js-theme-logo-select" type="button"><?php esc_html_e( 'Выбрать логотип', 'theme' ); ?></button>
              <button class="button js-theme-logo-remove" type="button"<?php echo $logo_url ? '' : ' style="display:none;"'; ?>><?php esc_html_e( 'Удалить', 'theme' ); ?></button>

              <p class="description"><?php esc_html_e( 'Изображение будет использоваться в шапке и футере сайта.', 'theme' ); ?></p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="theme-contact-phone"><?php esc_html_e( 'Телефон', 'theme' ); ?></label>
            </th>
            <td>
              <input id="theme-contact-phone" class="regular-text" type="text" name="theme_contact_phone" value="<?php echo esc_attr( $contact_data['phone'] ); ?>" placeholder="+7 (___) ___-__-__">
              <p class="description"><?php esc_html_e( 'Показывается в шапке, футере и блоке контактов.', 'theme' ); ?></p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="theme-contact-address"><?php esc_html_e( 'Адрес', 'theme' ); ?></label>
            </th>
            <td>
              <textarea id="theme-contact-address" class="large-text" name="theme_contact_address" rows="3"><?php echo esc_textarea( $contact_data['address'] ); ?></textarea>
              <p class="description"><?php esc_html_e( 'Используется в футере и на странице контактов.', 'theme' ); ?></p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="theme-contact-whatsapp-url"><?php esc_html_e( 'WhatsApp', 'theme' ); ?></label>
            </th>
            <td>
              <input id="theme-contact-whatsapp-url" class="regular-text code" type="url" name="theme_contact_whatsapp_url" value="<?php echo esc_attr( $contact_data['whatsapp_url'] ); ?>" placeholder="https://wa.me/79999999999">
              <p class="description"><?php esc_html_e( 'Ссылка для кнопок WhatsApp.', 'theme' ); ?></p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="theme-contact-telegram-url"><?php esc_html_e( 'Telegram', 'theme' ); ?></label>
            </th>
            <td>
              <input id="theme-contact-telegram-url" class="regular-text code" type="url" name="theme_contact_telegram_url" value="<?php echo esc_attr( $contact_data['telegram_url'] ); ?>" placeholder="https://t.me/username">
              <p class="description"><?php esc_html_e( 'Ссылка для кнопок Telegram.', 'theme' ); ?></p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="theme-contact-max-url"><?php esc_html_e( 'Max', 'theme' ); ?></label>
            </th>
            <td>
              <input id="theme-contact-max-url" class="regular-text code" type="url" name="theme_contact_max_url" value="<?php echo esc_attr( $contact_data['max_url'] ); ?>" placeholder="https://max.ru/username">
              <p class="description"><?php esc_html_e( 'Ссылка для кнопок Max.', 'theme' ); ?></p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="theme-contact-request-email"><?php esc_html_e( 'Email для заявок', 'theme' ); ?></label>
            </th>
            <td>
              <input id="theme-contact-request-email" class="regular-text code" type="email" name="theme_contact_request_email" value="<?php echo esc_attr( $contact_data['request_email'] ); ?>" placeholder="mail@example.ru">
              <p class="description"><?php esc_html_e( 'На этот адрес будут приходить заявки со всех форм сайта.', 'theme' ); ?></p>
            </td>
          </tr>
        </table>

        <?php submit_button( 'Сохранить настройки' ); ?>
      </form>
    </div>
    <?php
  }
}
