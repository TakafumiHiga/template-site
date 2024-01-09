<div class="p-header inner">
  <!-- マスク -->
  <div class="p-global-menu__mask c-mask" id="js-mask"></div>

  <!--グローバルメニュー -->
  <div class="p-header__cta"><a class="c-btn c-cta-tel-btn p-header__cta-tel-btn"
      href="tel:090-4628-4768"><span>090-4628-4768</span></a><a class="c-cta-btn c-btn"
      href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><span>お問い合わせ</span></a></div>

  <nav class="p-header__menu l-global-menu p-global-menu">
    <!-- トップページのロゴ -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p-global-menu__logo">
      <img class="c-logo" src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/logo.svg')); ?>"
        alt="つむぎコードロゴ" /></a>
    <div class="p-global-menu__pc">
      <?php 
        wp_nav_menu(array(
        'theme_location' => 'global',
        'container' => 'div',
        'container_id'    => 'js-global-menu-fixed',
        'depth' => 2,
        'container_class' => 'p-global-menu-fixed', 
        'menu_id'         => 'p-global-menu-items', // ulのid名
        'menu_class' => 'p-global-menu-items', // ulのclass名
        'add_li_class' => 'p-global-menu-item', // liタグへclass追加
        'add_a_class' => 'p-global-menu-item__link' // aタグへclass追加
        ));
        ?>
    </div>

    <!-- ハンバーガーメニュー -->
    <div class="p-global-menu__hamburger">
      <a class="c-hamburger" id="js-hamburger">
        <div class="c-hamburger__bars">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <p class="c-hamburger__menu" id="js-hamburger__menu">MENU</p>
      </a>
    </div>
    <!-- ハンバーガーメニューの中身 -->
    <div id="js-drower" class="l-drower c-drower inner">
      <?php 
          wp_nav_menu(array(
          'theme_location' => 'global',
          'container' => 'div',
          'container_id'    => 'c-drower__container',
          'depth' => 2,
          'container_class' => 'c-drower__container',
          'menu_id'         => 'p-global-menu-items',
          'menu_class' => 'p-global-menu-items', // ulのclass名
          'add_li_class' => 'p-global-menu-item', // liタグへclass追加
          'add_a_class' => 'p-global-menu-item__link' // aタグへclass追加
          ));
          ?>
    </div>
  </nav>
</div>