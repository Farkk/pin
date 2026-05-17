<?php
/**
 * Shared request modal and submit handler.
 *
 * @package theme
 */

if ( ! function_exists( 'theme_get_request_modal_fields' ) ) {
  /**
   * Get request form labels and copy.
   *
   * @return array
   */
  function theme_get_request_modal_fields(): array {
    $defaults = array(
      'kicker'              => 'Заявка',
      'title'               => 'Рассчитаем стоимость за 10 минут',
      'text'                => 'Оставьте контакты и коротко опишите задачу. Менеджер уточнит детали и вернется с расчетом.',
      'reply'               => 'Ответим в течение 10 минут',
      'name_label'          => 'Имя',
      'name_placeholder'    => 'Ваше имя',
      'phone_label'         => 'Телефон',
      'phone_placeholder'   => '+7 (___) ___-__-__',
      'asset_label'         => 'Файл или фото',
      'asset_placeholder'   => 'Макет, фото фасада или места монтажа до 15 МБ',
      'submit_text'         => 'Отправить заявку',
      'note'                => 'Нажимая кнопку, вы соглашаетесь на обработку данных для связи по заявке.',
    );

    if ( function_exists( 'theme_get_acf_group' ) ) {
      return theme_get_acf_group( 'front_page_request', $defaults, 5 );
    }

    return $defaults;
  }
}

if ( ! function_exists( 'theme_render_request_form_meta' ) ) {
  /**
   * Render hidden AJAX request form fields.
   *
   * @param string $context Form context label.
   * @return void
   */
  function theme_render_request_form_meta( string $context = '' ): void {
    ?>
    <input type="hidden" name="action" value="theme_request_form">
    <input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce( 'theme_request_form' ) ); ?>">
    <input type="hidden" name="page" value="">
    <input type="hidden" name="context" value="<?php echo esc_attr( $context ); ?>">
    <?php
  }
}

if ( ! function_exists( 'theme_render_request_form_consent' ) ) {
  /**
   * Render personal data consent checkbox.
   *
   * @return void
   */
  function theme_render_request_form_consent(): void {
    $consent_url = function_exists( 'theme_get_page_url_by_template' )
      ? theme_get_page_url_by_template( 'templates/personal-data-consent.php', '/soglasie-na-obrabotku-personalnyh-dannyh/' )
      : home_url( '/soglasie-na-obrabotku-personalnyh-dannyh/' );
    ?>
    <label class="form-consent">
      <input class="form-consent__input" type="checkbox" name="consent" value="1" required>
      <span class="form-consent__text">
        <?php esc_html_e( 'Я даю', 'theme' ); ?>
        <a class="form-consent__link" href="<?php echo esc_url( $consent_url ); ?>" target="_blank" rel="noopener">
          <?php esc_html_e( 'согласие на обработку персональных данных', 'theme' ); ?>
        </a>
      </span>
    </label>
    <?php
  }
}

if ( ! function_exists( 'theme_render_request_file_field' ) ) {
  /**
   * Render shared request file upload field.
   *
   * @param string $label Field label.
   * @param string $hint  Field hint text.
   * @return void
   */
  function theme_render_request_file_field( string $label = 'Файл или фото', string $hint = 'Макет, фото фасада или места монтажа до 15 МБ' ): void {
    ?>
    <label class="form-field form-field--file">
      <span class="form-field__label"><?php echo esc_html( $label ?: 'Файл или фото' ); ?></span>
      <input class="form-field__input form-field__input--file" type="file" name="request_file" accept=".jpg,.jpeg,.png,.webp,.pdf,.ai,.eps,.cdr,.psd,.zip,.rar,.7z">
      <span class="form-field__hint"><?php echo esc_html( $hint ?: 'Макет, фото фасада или места монтажа до 15 МБ' ); ?></span>
    </label>
    <?php
  }
}

if ( ! function_exists( 'theme_render_request_modal' ) ) {
  /**
   * Render global request modal once per page.
   *
   * @return void
   */
  function theme_render_request_modal(): void {
    $request = theme_get_request_modal_fields();
    ?>
    <div class="request-modal" id="request-modal" data-request-modal-root hidden aria-hidden="true">
      <div class="request-modal__backdrop" data-request-modal-close></div>

      <div class="request-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="request-modal-title">
        <button class="request-modal__close" type="button" data-request-modal-close aria-label="<?php esc_attr_e( 'Закрыть форму', 'theme' ); ?>">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </button>

        <form class="request-modal__form" data-request-form data-request-modal-form enctype="multipart/form-data">
          <div class="request-modal__head">
            <span class="section-kicker"><?php echo esc_html( $request['kicker'] ); ?></span>
            <h2 class="request-modal__title" id="request-modal-title"><?php echo esc_html( $request['title'] ); ?></h2>
          </div>

          <?php theme_render_request_form_meta( 'Модальная форма' ); ?>

          <div class="request-modal__fields-row">
            <label class="form-field form-field--compact">
              <span class="form-field__label"><?php echo esc_html( $request['name_label'] ); ?></span>
              <input class="form-field__input" type="text" name="name" autocomplete="name" placeholder="<?php echo esc_attr( $request['name_placeholder'] ); ?>">
            </label>

            <label class="form-field form-field--compact">
              <span class="form-field__label"><?php echo esc_html( $request['phone_label'] ); ?></span>
              <input class="form-field__input" type="tel" name="phone" autocomplete="tel" required placeholder="<?php echo esc_attr( $request['phone_placeholder'] ); ?>">
            </label>
          </div>

          <details class="request-modal__details">
            <summary class="request-modal__details-summary"><?php esc_html_e( 'Добавить комментарий и файл', 'theme' ); ?></summary>
            <div class="request-modal__details-body">
              <label class="form-field form-field--compact">
                <span class="form-field__label"><?php esc_html_e( 'Комментарий', 'theme' ); ?></span>
                <textarea class="form-field__input form-field__input--textarea" name="comment" rows="2" placeholder="<?php esc_attr_e( 'Опишите задачу, размеры, тираж, монтаж или сроки', 'theme' ); ?>"></textarea>
              </label>

              <?php theme_render_request_file_field( $request['asset_label'], $request['asset_placeholder'] ); ?>
            </div>
          </details>

          <?php theme_render_request_form_consent(); ?>

          <button class="button button--submit request-modal__submit" type="submit"><?php echo esc_html( $request['submit_text'] ); ?></button>
          <p class="request-modal__status" data-request-form-status data-request-modal-status aria-live="polite"><?php echo esc_html( $request['note'] ); ?></p>
        </form>
      </div>
    </div>
    <?php
  }
}
add_action( 'wp_footer', 'theme_render_request_modal', 6 );

if ( ! function_exists( 'theme_handle_request_form' ) ) {
  /**
   * Send AJAX request form to configured email.
   *
   * @return void
   */
  function theme_handle_request_form(): void {
    if ( ! check_ajax_referer( 'theme_request_form', 'nonce', false ) ) {
      wp_send_json_error( array( 'message' => 'Сессия формы истекла. Обновите страницу и попробуйте снова.' ), 403 );
    }

    $name              = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $phone             = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
    $asset             = sanitize_text_field( wp_unslash( $_POST['asset'] ?? '' ) );
    $comment           = sanitize_textarea_field( wp_unslash( $_POST['comment'] ?? '' ) );
    $page              = esc_url_raw( wp_unslash( $_POST['page'] ?? '' ) );
    $context           = sanitize_text_field( wp_unslash( $_POST['context'] ?? '' ) );
    $consent           = sanitize_text_field( wp_unslash( $_POST['consent'] ?? '' ) );
    $attachments       = array();
    $uploaded_file     = '';

    if ( '' === $phone ) {
      wp_send_json_error( array( 'message' => 'Укажите телефон, чтобы мы могли связаться.' ), 400 );
    }

    if ( '1' !== $consent ) {
      wp_send_json_error( array( 'message' => 'Подтвердите согласие на обработку персональных данных.' ), 400 );
    }

    if ( ! empty( $_FILES['request_file'] ) && is_array( $_FILES['request_file'] ) ) {
      $file = $_FILES['request_file'];

      if ( UPLOAD_ERR_NO_FILE !== (int) ( $file['error'] ?? UPLOAD_ERR_NO_FILE ) ) {
        $upload_error = (int) ( $file['error'] ?? UPLOAD_ERR_OK );

        if ( UPLOAD_ERR_OK !== $upload_error ) {
          wp_send_json_error( array( 'message' => 'Не удалось загрузить файл. Проверьте размер файла и попробуйте снова.' ), 400 );
        }

        $max_size = 15 * 1024 * 1024;

        if ( (int) ( $file['size'] ?? 0 ) > $max_size ) {
          wp_send_json_error( array( 'message' => 'Файл слишком большой. Максимальный размер - 15 МБ.' ), 400 );
        }

        $filename      = sanitize_file_name( (string) ( $file['name'] ?? '' ) );
        $filetype      = wp_check_filetype( $filename );
        $allowed_types = array(
          'jpg',
          'jpeg',
          'png',
          'webp',
          'pdf',
          'ai',
          'eps',
          'cdr',
          'psd',
          'zip',
          'rar',
          '7z',
        );

        if ( ! $filename || empty( $filetype['ext'] ) || ! in_array( strtolower( $filetype['ext'] ), $allowed_types, true ) ) {
          wp_send_json_error( array( 'message' => 'Этот тип файла нельзя отправить через форму.' ), 400 );
        }

        $upload_dir = wp_upload_dir();
        $temp_dir   = trailingslashit( $upload_dir['basedir'] ) . 'theme-request-temp';

        if ( ! wp_mkdir_p( $temp_dir ) ) {
          wp_send_json_error( array( 'message' => 'Не удалось подготовить загрузку файла. Напишите нам в мессенджер.' ), 500 );
        }

        $target_path = trailingslashit( $temp_dir ) . wp_unique_filename( $temp_dir, $filename );

        if ( ! move_uploaded_file( (string) ( $file['tmp_name'] ?? '' ), $target_path ) ) {
          wp_send_json_error( array( 'message' => 'Не удалось сохранить файл для отправки. Попробуйте снова.' ), 500 );
        }

        $attachments[] = $target_path;
        $uploaded_file = basename( $target_path );
      }
    }

    $site_name = wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
    $to        = function_exists( 'theme_get_request_email' ) ? theme_get_request_email() : get_option( 'admin_email' );
    $subject   = sprintf( 'Заявка с сайта %s', $site_name );
    $message   = implode(
      "\n",
      array_filter(
        array(
          'Новая заявка с сайта.',
          '',
          'Имя: ' . ( $name ?: 'не указано' ),
          'Телефон: ' . $phone,
          'Файл: ' . ( $uploaded_file ?: 'не приложен' ),
          'Файл/объект: ' . ( $asset ?: 'не указан' ),
          'Комментарий: ' . ( $comment ?: 'не указан' ),
          'Согласие: да',
          'CTA: ' . ( $context ?: 'не указан' ),
          'Страница: ' . ( $page ?: home_url( '/' ) ),
        )
      )
    );

    $sent = wp_mail(
      $to,
      $subject,
      $message,
      array( 'Content-Type: text/plain; charset=UTF-8' ),
      $attachments
    );

    foreach ( $attachments as $attachment ) {
      if ( is_string( $attachment ) && file_exists( $attachment ) ) {
        wp_delete_file( $attachment );
      }
    }

    if ( ! $sent ) {
      wp_send_json_error( array( 'message' => 'Не удалось отправить заявку. Напишите нам в WhatsApp или позвоните.' ), 500 );
    }

    wp_send_json_success( array( 'message' => 'Заявка отправлена. Скоро свяжемся с вами.' ) );
  }
}
add_action( 'wp_ajax_theme_request_form', 'theme_handle_request_form' );
add_action( 'wp_ajax_nopriv_theme_request_form', 'theme_handle_request_form' );
