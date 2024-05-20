</main>
<footer class="l-footer">
  <div class="p-footer">
    <div class="inner">
      <!-- ▼フッタートップーの呼び出し▼ -->
      <?php 
          wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => 'div',
          'container_id'    => 'p-footer__items-wrap',
          'depth' => 2,
          'container_class' => 'p-footer__items-wrap', 
          'menu_id'         => 'p-footer__items', // ulのid名
          'menu_class' => 'p-footer__items', // ulのclass名
          'add_li_class' => 'p-footer__item', // liタグへclass追加
          'add_a_class' => 'p-footer__item-link' // aタグへclass追加
          ));
        ?>
      <!-- ▲フッタートップの呼び出し▲ -->
    </div>
</footer>
<div class="p-copyright">
  <small class="c-copyright">©2020 - <?php echo date('Y'); ?>つむぎCODE</small>
</div>
<div class="c-footer-floating-btns">
  <a class="c-cta-tel-bt p-header__cta-tel-bt c-footer-floating-btn__tel c-footer-floating-btn"
    href="tel:090-4628-4768"><span>090-4628-4768</span></a>
  <a class="c-footer-floating-btn__contact c-footer-floating-btn"
    href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><span>問い合わせる</span></a>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>