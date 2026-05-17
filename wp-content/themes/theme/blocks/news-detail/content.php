<?php
/**
 * News detail content block.
 *
 * @package theme
 */

$is_post_news = is_singular( 'theme_news' );
?>

<section class="news-detail-content-section">
  <div class="section-shell">
    <?php if ( $is_post_news ) : ?>
      <article class="news-detail-article news-detail-article--content">
        <div class="news-detail-article__content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php else : ?>
      <div class="news-detail-content">
        <article class="news-detail-article">
          <h2 class="news-detail-article__title">С чего начинается нормальный расчет</h2>
          <p class="news-detail-article__text">
            Почти всегда стартуем не с макета, а с исходных вводных: фото объекта, примерных размеров,
            понимания формата конструкции и адреса монтажа. Без этого цена либо будет слишком грубой,
            либо менеджеру придется возвращаться к заказчику с длинной цепочкой уточнений.
          </p>
          <p class="news-detail-article__text">
            Если объект простой, достаточно фото и размеров. Если фасад сложный, есть ограничения по креплению,
            подсветке или высоте, тогда уже на раннем этапе нужен замер и техническая проверка.
          </p>
        </article>

        <aside class="news-detail-note">
          <h3 class="news-detail-note__title">Что обычно присылают для старта</h3>
          <ul class="news-detail-note__list">
            <li>Фото фасада или точки монтажа</li>
            <li>Примерные размеры и формат вывески</li>
            <li>Референс по стилю или брендбук</li>
            <li>Срок, к которому нужен запуск</li>
          </ul>
        </aside>

        <article class="news-detail-article news-detail-article--wide">
          <h2 class="news-detail-article__title">Где чаще всего теряется срок</h2>
          <p class="news-detail-article__text">
            Сроки ломаются не на печати, а на разрывах между этапами: не согласовали макет, не подтвердили материалы,
            не учли электрику или особенности фасада. Поэтому мы стараемся собирать технические вводные до запуска
            в производство, а не после того, как материалы уже ушли в работу.
          </p>
          <p class="news-detail-article__text">
            Для сетевых клиентов это особенно важно: одна ошибка в схеме крепления или подсветке потом
            множится на несколько точек. На этом этапе нужен не “красивый рендер”, а нормальная рабочая логика.
          </p>
        </article>
      </div>
    <?php endif; ?>
  </div>
</section>
