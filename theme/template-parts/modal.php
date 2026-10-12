<div class="modal" id="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title" hidden>
  <div class="modal__overlay" data-modal-close></div>

  <div class="modal__window win-window">
    <div class="win-window__titlebar">
      <span class="win-window__title" id="modal-title">NEW_REQUEST.EXE</span>
      <div class="win-window__controls">
        <button class="win-window__close" data-modal-close aria-label="Закрыть">×</button>
      </div>
    </div>

    <div class="win-window__body">
      <form class="form" id="itlant-form" action="<?php echo esc_url(home_url('/send.php')); ?>" method="post">
        <label class="form__field">
          <span>Ваше имя</span>
          <input type="text" name="name" required autocomplete="name">
        </label>

        <label class="form__field">
          <span>Email или телефон</span>
          <input type="text" name="contact" required autocomplete="email">
        </label>

        <label class="form__field">
          <span>Услуга</span>
          <select name="service">
            <option value="">— Выберите услугу —</option>
            <?php
            $services = get_posts(['post_type' => 'service', 'posts_per_page' => -1]);
            foreach ($services as $s) :
            ?>
              <option value="<?php echo esc_attr($s->post_name); ?>"><?php echo esc_html($s->post_title); ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <label class="form__field">
          <span>Сообщение</span>
          <textarea name="message" rows="4"></textarea>
        </label>

        <label class="form__checkbox">
          <input type="checkbox" name="agree" required>
          <span>Согласен с <a href="<?php echo esc_url(home_url('/privacy/')); ?>">политикой конфиденциальности</a></span>
        </label>

        <button type="submit" class="btn btn--primary">Отправить</button>
      </form>
    </div>
  </div>
</div>