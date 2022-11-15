<!-- PCサイズ -->
<?php if (is_tax('case_cat')|| is_singular('case') || is_post_type_archive('case')) : ?>
<figure class="p-lower-header u-pc-bg-img c-case-mv">
  <div class="sect__inner p-lower-header__body">
    <div class="p-lower-header__title-wrap u-lower-mv-pc-on">
      <p class="p-lower-header__sub-title">CASE</p>
      <h2 class="p-lower-header__title">事例</h2>
    </div>
  </div>
</figure>
<!-- spサイズ -->
<figure class="p-lower-header u-sp-bg-img c-case-sp">
</figure>
<div class="sect__inner lower-mv-sp-on">
  <div class="p-lower-header__title-wrap">
    <p class="p-lower-header__sub-title">CASE</p>
    <h2 class="p-lower-header__title">事例</h2>
  </div>
</div>
<!-- PCサイズ -->
<?php elseif (is_tax('column_cat')|| is_singular('column') || is_post_type_archive('column')) : ?>
<figure class="p-lower-header u-pc-bg-img c-column-mv">
  <div class="sect__inner p-lower-header__body">
    <div class="p-lower-header__title-wrap u-lower-mv-pc-on">
      <p class="p-lower-header__sub-title">Column</p>
      <h2 class="p-lower-header__title">コラム</h2>
    </div>
  </div>
</figure>
<!-- spサイズ -->
<figure class="p-lower-header u-sp-bg-img c-column-sp">
</figure>
<div class="sect__inner lower-mv-sp-on">
  <div class="p-lower-header__title-wrap">
    <p class="p-lower-header__sub-title">Column</p>
    <h2 class="p-lower-header__title">コラム</h2>
  </div>
</div>

<!-- PCサイズ -->
<?php elseif (is_tax('voice_cat')|| is_singular('voice') || is_post_type_archive('voice')) : ?>
<figure class="p-lower-header u-pc-bg-img c-voice-mv">
  <div class="sect__inner p-lower-header__body">
    <div class="p-lower-header__title-wrap u-lower-mv-pc-on">
      <p class="p-lower-header__sub-title">Voice</p>
      <h2 class="p-lower-header__title">お客様の声</h2>
    </div>
  </div>
</figure>
<!-- spサイズ -->
<figure class="p-lower-header u-sp-bg-img c-voice-sp">
</figure>
<div class="sect__inner lower-mv-sp-on">
  <div class="p-lower-header__title-wrap">
    <p class="p-lower-header__sub-title">Voice</p>
    <h2 class="p-lower-header__title">お客様の声</h2>
  </div>
</div>

<!-- PCサイズ -->
<?php elseif (is_category('news_cat')|| is_single() || is_archive('news')) : ?>
<figure class="p-lower-header u-pc-bg-img c-case-mv">
  <div class="sect__inner p-lower-header__body">
    <div class="p-lower-header__title-wrap u-lower-mv-pc-on">
      <p class="p-lower-header__sub-title">News</p>
      <h2 class="p-lower-header__title">ニュース</h2>
    </div>
  </div>
</figure>
<!-- spサイズ -->
<figure class="p-lower-header u-sp-bg-img c-case-sp">
</figure>
<div class="sect__inner lower-mv-sp-on">
  <div class="p-lower-header__title-wrap">
    <p class="p-lower-header__sub-title">News</p>
    <h2 class="p-lower-header__title">ニュース</h2>
  </div>
</div>



<?php endif; ?>