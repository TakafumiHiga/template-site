<?php get_header(); ?>
<div class="l-inner l-post-container">
  <div class="l-flex">
    <div class="l-flex__main-contents">
      <article class="p-single-post p-single-post__inner">
        <!-- ループの開始 -->
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
        <div class="p-single-post__body">
          <figure class="p-single-post__img">
            <?php
                if(has_post_thumbnail()):
                  the_post_thumbnail('medium_thumbnail');
                else:
            ?>
            <!-- アイキャッチがないときの表示 -->
            <img src="<?php echo esc_url(get_theme_file_uri('/')); ?>" alt="" />
            <?php 
              endif;
            ?>
          </figure>
          <!-- カテゴリーを全部表示(リンクなし) -->
          <?php
              $categories = get_the_category();
              echo '<ul class="">';
              foreach( $categories as $category ){
                echo '<li class="p-single-post__tag c-card-category c-tag">'.$category->name.'</li>';
              }
              echo '</ul>';
          ?><time class="p-archive-post__time"><?php echo get_the_time('Y.m.j'); ?></time>
          <h3 class="p-single-post__title"><?php the_title(); ?></h3>
          <div class="p-single-post__desc"><?php the_content();?></div>
        </div>
      </article>
      <?php endwhile;?>
      <?php else: ?>
      <h3 class="p-single-post__title">現在記事は準備中でございます。</h3>
      <?php endif;?>
      <!-- ページネーション -->
      <div class="prev-next">
        <div class="previous"><?php previous_post_link('%link', '< 前へ'); ?></div>
        <a class="top-link" href="<?php bloginfo('url'); ?>/column">一覧へ戻る</a>
        <div class="next"><?php next_post_link('%link', '次へ >'); ?></div>
      </div>
    </div>
    <!-- サイドバー -->
    <aside class="l-flex__side-menu">
      <?php get_sidebar();?>
    </aside>
  </div>
  <?php get_footer(); ?>