<?php
/**
 * Contacts intro block.
 *
 * @package theme
 */

$contact_phone      = theme_get_contact_phone();
$contact_phone_href = theme_get_contact_phone_href();
$contact_address    = theme_get_contact_address();
$whatsapp_url       = theme_get_whatsapp_url() ?: '#contacts';
$telegram_url       = theme_get_telegram_url() ?: '#contacts';
$max_url            = theme_get_max_url() ?: '#contacts';

$intro = theme_get_acf_group(
  'contacts_intro',
  array(
    'kicker'       => 'Контакты',
    'title'        => 'Связаться с производством',
    'text'         => 'Если нужно обсудить вывеску, печать, монтаж или расчет, лучше сразу написать или позвонить. Ниже собрали все каналы связи и форму для быстрого запроса.',
    'card_1_label' => 'Телефон',
    'card_1_text'  => 'Для быстрых запросов по срокам, монтажу и стоимости.',
    'card_2_label' => 'Мессенджеры',
    'card_2_value' => 'WhatsApp / Telegram / Max',
    'card_2_text'  => 'Удобно прислать фото объекта, размеры, пример или техническое задание.',
    'card_3_label' => 'Адрес',
    'card_3_text'  => 'Производство, офис и точка для встреч по предварительной договоренности.',
  )
);

$contact_cards = array(
  array(
    'label' => $intro['card_1_label'],
    'value' => $contact_phone,
    'text'  => $intro['card_1_text'],
    'url'   => $contact_phone_href,
  ),
  array(
    'label'    => $intro['card_2_label'],
    'value'    => $intro['card_2_value'],
    'text'     => $intro['card_2_text'],
    'modifier' => 'contacts-card--dark',
    'links'    => array(
      array(
        'label' => 'WhatsApp',
        'url'   => $whatsapp_url,
      ),
      array(
        'label' => 'Telegram',
        'url'   => $telegram_url,
      ),
      array(
        'label' => 'Max',
        'url'   => $max_url,
      ),
    ),
  ),
  array(
    'label'    => $intro['card_3_label'],
    'value'    => $contact_address,
    'text'     => $intro['card_3_text'],
    'modifier' => 'contacts-card--muted',
  ),
);
?>

<section class="contacts-intro-section">
  <div class="section-shell">
    <div class="contacts-intro">
      <div class="contacts-intro__copy">
        <span class="section-kicker"><?php echo esc_html( $intro['kicker'] ); ?></span>
        <h1 class="contacts-intro__title"><?php echo esc_html( $intro['title'] ); ?></h1>
        <p class="contacts-intro__lead"><?php echo esc_html( $intro['text'] ); ?></p>
      </div>

      <div class="contacts-cards">
        <?php foreach ( $contact_cards as $contact_card ) : ?>
          <article class="contacts-card<?php echo ! empty( $contact_card['modifier'] ) ? ' ' . esc_attr( $contact_card['modifier'] ) : ''; ?>">
            <span class="contacts-card__label"><?php echo esc_html( $contact_card['label'] ); ?></span>
            <h2 class="contacts-card__value">
              <?php if ( ! empty( $contact_card['url'] ) ) : ?>
                <a href="<?php echo esc_url( $contact_card['url'] ); ?>"><?php echo esc_html( $contact_card['value'] ); ?></a>
              <?php else : ?>
                <?php echo nl2br( esc_html( $contact_card['value'] ) ); ?>
              <?php endif; ?>
            </h2>
            <?php if ( ! empty( $contact_card['links'] ) ) : ?>
              <div class="contacts-card__links">
                <?php foreach ( $contact_card['links'] as $contact_link ) : ?>
                  <a class="contacts-card__link" href="<?php echo esc_url( $contact_link['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $contact_link['label'] ); ?></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <p class="contacts-card__text"><?php echo esc_html( $contact_card['text'] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
