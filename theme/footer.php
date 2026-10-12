<footer class="footer">
  <div class="container footer__inner">
    <p class="footer__copy">© 2020-<?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>

    <?php
    wp_nav_menu([
      'theme_location' => 'footer',
      'container'      => 'nav',
      'container_class' => 'footer__nav-wrap',
      'menu_class'     => 'footer__nav',
      'depth'          => 1,
      'fallback_cb'    => false,
    ]);
    ?>

    <?php
    $email = get_theme_mod('contact_email', 'hello@itlant.ru');
    ?>
    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
  </div>

  <div class="mobile-cta-bar">
    <a href="tel:+79000000000" class="btn btn--ghost">Позвонить</a>
    <button class="btn btn--primary" data-modal-open>Обсудить</button>
  </div>
</footer>

<?php itlant_render_modal(); ?>

<?php wp_footer(); ?>
</body>

</html>