<footer class="">
  <?php 
        wp_nav_menu(array(
        'theme_location' => 'footer',
        'container' => 'div',
        'container_id'    => '',
        'depth' => 2,
        // 'container_class' => '', 
        'menu_id'         => '', // ulのid名
        'menu_class' => '', // ulのclass名
        'add_li_class' => '', // liタグへclass追加
        'add_a_class' => '' // aタグへclass追加
        ));
        ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>