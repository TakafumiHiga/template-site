<div class="p-header">
  <!-- マスク -->
  <div class="p-global-menu__mask c-mask" id="js-mask"></div>
  <!--グローバルメニュー -->
  <nav class="p-header__menu l-global-menu p-global-menu">

    <!-- トップページのロゴ -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p-global-menu__logo">
      <img class="c-logo" src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/logo.svg')); ?>"
        alt="ロゴ" /></a>


    <div class="p-global-menu__pc">
      <?php 
        wp_nav_menu(array(
        'theme_location' => 'global',
        'container' => 'div',
        'container_id'    => 'js-global-menu-fixed',
        'depth' => 2,
        // 'container_class' => '', 
        'menu_id'         => '', // ulのid名
        'menu_class' => 'p-global-menu-items', // ulのclass名
        'add_li_class' => 'p-global-menu-item', // liタグへclass追加
        'add_a_class' => 'p-global-menu-item__link' // aタグへclass追加
        ));
        ?>
    </div>

    <!-- ハンバーガーメニュー -->
    <a class="p-global-menu__hamburger c-hamburger" id="js-hamburger">
      <div></div>
      <div></div>
      <div></div>
      <span>MENU</span>
    </a>
    <!-- ハンバーガーメニューの中身 -->
    <div id="js-drower" class="l-drower p-drower-menu p-global-menu__mb p-drower">
      <?php 
          wp_nav_menu(array(
          'theme_location' => 'global',
          'container' => 'div',
          'container_id'    => 'js-global-menu-fixed',
          'depth' => 2,
          // 'container_class' => '', 
          'menu_id'         => '', // ulのid名
          'menu_class' => 'p-global-menu-items', // ulのclass名
          'add_li_class' => 'p-global-menu-item', // liタグへclass追加
          'add_a_class' => 'p-global-menu-item__link' // aタグへclass追加
          ));
          ?>
    </div>
  </nav>
</div>