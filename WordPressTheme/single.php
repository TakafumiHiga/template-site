<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">

      <!-- ループの開始 -->
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <article class="p-single-post">
        <!-- カテゴリーを全部表示(リンクなし) -->
        <span
          class="c-cat <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span><time
          class="c-time" datetime="<?php the_time('Y-m-d'); ?>"><?php echo get_the_time('Y.m.j'); ?></time>
        <h3 class="p-single-post__title"><?php the_title(); ?></h3>
        <div class="p-single-post__desc"><?php the_content(); ?></div>
      </article>
      <?php endwhile; endif; ?>
      <!-- ページネーション -->
      <div class="prev-next">
        <div class="previous"><?php previous_post_link('%link', '< 前へ'); ?></div>
        <a class="top-link" href="<?php echo esc_url(home_url('/all-post')); ?>">一覧へ戻る</a>
        <div class="next"><?php next_post_link('%link', '次へ >'); ?></div>
      </div>
    </div>
    <!-- サイドバー -->
    <aside class="l-flex__side-menu">
      <?php get_sidebar();?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>