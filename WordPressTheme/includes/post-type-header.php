<div class="c-lower-header">
  <div class="c-lower-header__flex">
    <?php 
      // デフォルト設定
      $header_en = '';
      $header_jp = '';
      $image_path = '';

      // 条件による設定
      if (is_post_type_archive('case') || is_singular('case') || is_tax('case_cat')) {
        $header_en = 'Case';
        $header_jp = '制作事例';
        $image_path = '/assets/images/common/post_mv.jpg';
      }
      elseif (is_post_type_archive('staff') || is_singular('staff') || is_tax('staff_cat')) {
        $header_en = 'Staff';
        $header_jp = '社員';
        $image_path = '/assets/images/common/post_mv.jpg';
      }
      elseif (is_home()) {
        $header_en = 'News';
        $header_jp = '新着情報';
        $image_path = '/assets/images/common/post_mv.jpg';
      }
      elseif (is_archive() || is_single()) {
        $header_en = 'NEWS';
        $header_jp = '新着情報';
        $image_path = '/assets/images/common/post_mv.jpg';
      }

      // タイトルと画像の表示
      if (!empty($header_en) && !empty($header_jp) && !empty($image_path)) : ?>
    <h1 class="c-lower-header-title">
      <span class="c-lower-header-title__en"><?php echo $header_en; ?></span>
      <span class="c-lower-header-title__jp"><?php echo $header_jp; ?></span>
    </h1>
    <div class="c-lower-header__img">
      <img src="<?php echo esc_url(get_theme_file_uri($image_path)); ?>" alt="ページイメージ画像">
    </div>
    <?php endif; ?>
  </div>
</div>