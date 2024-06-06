<?php get_header(); ?>
<div class="l-inner">
  <section class="l-404">
    <h2 class="p-404__title">お探しのページが見つかりませんでした</h2>

    <div class="p-404__wrap">
      <div class="p-404__desc">
        <p>お探しのページは移動または削除された可能性があります。下記の検索バーからキーワードで検索、もしくはTOPページへとお戻りください。</p>
      </div>
      <div class="p-404seach c-seach">
        <?php get_template_part('includes/searchform'); ?>
      </div>
    </div>
    <div class="p-404__btn-wrap">
      <a class="c-btn" href="/">TOPページに戻りたい</a>
      <a class="c-btn" href="/">お問い合わせをしたい</a>
      <a class="c-btn" href="/">お問い合わせをしたい</a>
    </div>
  </section>
</div>
<?php get_footer(); ?>