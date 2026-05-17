<?php
/**
 * Contacts connect block.
 *
 * @package theme
 */

$connect = theme_get_acf_group(
  'contacts_connect',
  array(
    'schedule_title'     => 'Режим и формат работы',
    'schedule_text'      => "Пн-Пт: 09:00-18:00\nСб: по согласованию\nВыезды на замер и встречи по предварительной записи.\nФото, схемы и ТЗ можно отправить в мессенджеры в любое время.",
    'name_label'         => 'Имя',
    'name_placeholder'   => 'Ваше имя',
    'phone_label'        => 'Телефон',
    'phone_placeholder'  => '+7 (___) ___-__-__',
    'comment_label'      => 'Комментарий',
    'comment_placeholder'=> 'Опишите задачу, размеры, тираж, монтаж',
    'submit_text'        => 'Отправить запрос',
    'note'               => 'Можно оставить телефон, мессенджер и короткое описание задачи. Этого достаточно для первого контакта.',
  )
);
?>

<section class="contacts-connect-section">
  <div class="section-shell">
    <div class="contacts-connect-grid">
      <div class="contacts-schedule">
        <h2 class="contacts-schedule__title"><?php echo esc_html( $connect['schedule_title'] ); ?></h2>
        <p class="contacts-schedule__text"><?php echo nl2br( esc_html( $connect['schedule_text'] ) ); ?></p>
      </div>

      <form class="contacts-form" data-request-form enctype="multipart/form-data">
        <?php theme_render_request_form_meta( 'Контакты: запрос' ); ?>

        <label class="form-field form-field--compact">
          <span class="form-field__label"><?php echo esc_html( $connect['name_label'] ); ?></span>
          <input class="form-field__input" type="text" name="name" placeholder="<?php echo esc_attr( $connect['name_placeholder'] ); ?>">
        </label>

        <label class="form-field form-field--compact">
          <span class="form-field__label"><?php echo esc_html( $connect['phone_label'] ); ?></span>
          <input class="form-field__input" type="tel" name="phone" required placeholder="<?php echo esc_attr( $connect['phone_placeholder'] ); ?>">
        </label>

        <label class="form-field form-field--compact">
          <span class="form-field__label"><?php echo esc_html( $connect['comment_label'] ); ?></span>
          <input class="form-field__input" type="text" name="comment" placeholder="<?php echo esc_attr( $connect['comment_placeholder'] ); ?>">
        </label>

        <?php theme_render_request_file_field(); ?>

        <?php theme_render_request_form_consent(); ?>

        <button class="button button--submit" type="submit"><?php echo esc_html( $connect['submit_text'] ); ?></button>

        <p class="contacts-form__note" data-request-form-status aria-live="polite"><?php echo esc_html( $connect['note'] ); ?></p>
      </form>
    </div>
  </div>
</section>
