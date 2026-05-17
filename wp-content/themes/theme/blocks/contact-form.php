<?php
/**
 * Contact form block.
 *
 * @package theme
 */

$request = theme_get_acf_group(
  'front_page_request',
  array(
    'kicker'              => 'Заявка',
    'title'               => 'Рассчитаем стоимость за 10 минут',
    'text'                => 'Оставьте имя и телефон. Менеджер сразу уточнит тираж, размеры, адрес монтажа или требования к печати.',
    'reply'               => 'Ответим в течение 10 минут',
    'name_label'          => 'Имя',
    'name_placeholder'    => 'Ваше имя',
    'phone_label'         => 'Телефон',
    'phone_placeholder'   => '+7 (___) ___-__-__',
    'asset_label'         => 'Файл или фото объекта',
    'asset_placeholder'   => 'Макет, фото фасада или места монтажа',
    'submit_text'         => 'Получить расчет',
    'note'                => 'Для точного расчёта укажите задачу, размеры, тираж, нужен ли монтаж и приложите фото или файл.',
  ),
  5
);
?>

<section class="request-section" id="request">
  <div class="section-shell">
    <div class="request-grid">
      <div class="request-info">
        <span class="section-kicker"><?php echo esc_html( $request['kicker'] ); ?></span>
        <h2 class="section-title section-title--compact"><?php echo esc_html( $request['title'] ); ?></h2>
        <p class="section-text"><?php echo esc_html( $request['text'] ); ?></p>
        <span class="request-info__reply"><?php echo esc_html( $request['reply'] ); ?></span>
      </div>

      <form class="request-form" data-request-form enctype="multipart/form-data">
        <?php theme_render_request_form_meta( 'Блок заявки' ); ?>

        <label class="form-field">
          <span class="form-field__label"><?php echo esc_html( $request['name_label'] ); ?></span>
          <input class="form-field__input" type="text" name="name" placeholder="<?php echo esc_attr( $request['name_placeholder'] ); ?>">
        </label>

        <label class="form-field">
          <span class="form-field__label"><?php echo esc_html( $request['phone_label'] ); ?></span>
          <input class="form-field__input" type="tel" name="phone" required placeholder="<?php echo esc_attr( $request['phone_placeholder'] ); ?>">
        </label>

        <label class="form-field">
          <span class="form-field__label"><?php esc_html_e( 'Комментарий', 'theme' ); ?></span>
          <textarea class="form-field__input form-field__input--textarea" name="comment" rows="4" placeholder="<?php esc_attr_e( 'Опишите задачу, размеры, тираж, монтаж или сроки', 'theme' ); ?>"></textarea>
        </label>

        <?php theme_render_request_file_field( $request['asset_label'], $request['asset_placeholder'] ); ?>

        <?php theme_render_request_form_consent(); ?>

        <button class="button button--submit" type="submit"><?php echo esc_html( $request['submit_text'] ); ?></button>

        <p class="request-form__note" data-request-form-status aria-live="polite"><?php echo esc_html( $request['note'] ); ?></p>
      </form>
    </div>
  </div>
</section>
