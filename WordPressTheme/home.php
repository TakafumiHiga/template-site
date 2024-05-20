<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <!-- リストタイプ -->
      <?php get_template_part('template-parts/content'); ?>
      <div class="p-top-blog__link">
        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>/">Topへ戻る</a>
      </div>
    </div>
    <aside class="l-flex__aside">
      <?php get_sidebar();?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>