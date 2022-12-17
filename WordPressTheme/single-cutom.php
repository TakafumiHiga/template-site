<?php get_header(); ?>
<!-- サイドバー付き、2カラム、画像があるないで条件分岐 -->
<div class="l-inner">
  <div class="l-flex">
    <main id="primary" class="site-main l-flex__main-contents">


      <article class="p-single-post p-single-post__inner">

        <?php if (have_posts()): ?>
        <?php while (have_posts()) : the_post(); ?>
        <!-- アイキャッチ画像があるとき -->
        <?php if (has_post_thumbnail()) : ?>
        <time class="p-single-post__time p-post-time"><?php echo get_the_time('Y.m.j'); ?></time>
        <figure class="p-single-post__img">
          <?php
              if(has_post_thumbnail()):?>
          <?php the_post_thumbnail('medium_thumbnail'); else:?>
          <?php 
                  endif;
                  ?>
        </figure>
        <div class="p-single-post__bottom">
          <span
            class="p-single-post__cat c-card-category <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span>
          <h3 class="p-single-post__title"><?php the_title(); ?></h3>
          <div class="p-single-post__desc"><?php the_content();?></div>
        </div>
        <?php else: ?>

        <!-- アイキャッチ画像がないとき -->
        <div class="p-single-post__bottom">
          <span
            class="p-single-post__cat c-card-category <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span>
          <h3 class="p-single-post__title"><?php the_title(); ?></h3>
          <div class="p-single-post__desc"><?php the_content();?></div>
        </div>
        <?php endif;?>
      </article>
      <?php endwhile;?>
      <?php else: ?>
      <?php endif;?>
      <div class="prev-next">
        <div class="previous"><?php previous_post_link('%link', '< 前へ'); ?></div>
        <a class="top-link" href="<?php bloginfo('url'); ?>/">トップページへ戻る</a>
        <div class="next"><?php next_post_link('%link', '次へ >'); ?></div>
      </div>
    </main><!-- #main -->



    <aside class="l-flex__side-menu">
      <?php get_sidebar();?>
    </aside>
  </div>


  <?php get_footer(); ?>