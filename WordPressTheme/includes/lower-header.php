<?php 
    $lower_mv_title = get_field('lower_mv_title'); 
    $lower_sub_title = get_field('lower_mv_sub_title');
    $pc_mv_img = get_field('pc-lower_mv_img');
    $sp_mv_img = get_field('sp-lower_mv_img');
?>
<!-- PCサイズ -->
<figure class="p-lower-header u-desktop" style="background-image: url( '<?php echo $pc_mv_img; ?>' );">
  <div class="p-lower-header__body">
    <div class="p-lower-header__title-wrap u-lower-mv-pc-on">
      <h1 class="p-lower-header__title"><?php echo $lower_mv_title; ?></h1>
      <p class="p-lower-header__sub-title"><?php echo $lower_sub_title; ?></p>
    </div>
  </div>
</figure>
<!-- spサイズ -->
<figure class="p-lower-header u-mobile" style="background-image: url( '<?php echo $sp_mv_img; ?>' );">
  <div class="lower-mv-sp-on">
    <div class="p-lower-header__title-wrap">
      <p class="p-lower-header__sub-title"><?php echo $lower_sub_title; ?></p>
      <h1 class="p-lower-header__title"><?php echo $lower_mv_title; ?></h1>
    </div>
  </div>
</figure>