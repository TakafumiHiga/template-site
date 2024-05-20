<!-- トップページにパンくずを表示しない -->
<?php if(!( is_front_page() ) ){ ?>
<div class="inner">
  <div class="c-breadcrumbs">
    <!-- パンくずのプラグインがオフになっているときなどに表示しない -->
    <div id="breadcrumbs" class="" vocab="http://schime.org/" typeof="BreadcrumbsList"></div>
    <?php if(function_exists('bcn_display')) {?>
    <!-- プラグインの関数 -->
    <?php bcn_display(); ?>
  </div>
</div>
<?php } ?>
<?php } ?>