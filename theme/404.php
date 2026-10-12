<?php get_header(); ?>

<main id="main" class="error-page">
  <div class="container error-page__inner">
    <div class="win-window error-page__window">
      <div class="win-window__titlebar">
        <span class="win-window__title">ERROR_404.EXE</span>
      </div>
      <div class="win-window__body">
        <h1 class="error-page__code">404</h1>
        <p class="error-page__text">
          Страница потерялась где-то в 90-х.<br>
          Возможно, она была удалена или вы ошиблись в адресе.
        </p>
        <div class="error-page__actions">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">На главную</a>
          <button class="btn btn--ghost" data-modal-open>Написать нам</button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>