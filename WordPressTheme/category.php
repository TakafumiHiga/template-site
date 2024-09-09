<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <!-- カード型archive -->
      <div class="p-archive-posts l-col-3">

        <?php
        // カテゴリー情報とページ番号の取得
        $cat_info = get_category(get_query_var('cat'));
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
        // クエリの引数設定
        $args = [
          'post_type' => 'post',
          'orderby' => 'post_date',
          'posts_per_page' => 3,
          'paged' => $paged,
          'category_name' => $cat_info->slug,
        ];
        $the_query = new WP_Query($args);

        // 投稿が存在する場合
        if ($the_query->have_posts()) : 
          while ($the_query->have_posts()) : $the_query->the_post();
        ?>
        <!-- ループの開始 -->
        <a class="p-archive-post" href="<?php the_permalink(); ?>">
          <figure class="p-archive-post__img">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium_thumbnail'); ?>
            <?php else : ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/')); ?>" alt="" />
            <?php endif; ?>
          </figure>
          <div class="p-archive-post__body">
            <div class="p-archive-post__meta">
              <time class="c-time" datetime="<?php the_time('Y.m.j'); ?>"><?php echo get_the_time('Y.m.d'); ?></time>

              <?php
              // カテゴリーのデータを取得
              $cat = get_the_category();
              if ($cat) :
                $cat = $cat[0];
              ?>
              <span class="c-cat <?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->cat_name); ?></span>
              <?php endif; ?>
            </div>
            <h3 class="p-archive-post__title"><?php the_title(); ?></h3>
          </div>
        </a>
        <?php endwhile; ?>
      </div>
      <!-- ページナビ -->
      <div class="l-pager">
        <?php
        // ページネーションの設定
        $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
        $pagination_args = [
          'mid_size' => 1,
          'prev_text' => '<',
          'next_text' => '>'
        ];
        the_posts_pagination($pagination_args);
        ?>
      </div>

      <?php else : ?>
      <h3 class="p-archive-post__title">只今準備中でございます。</h3>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
      <!-- トップページへのリンク -->
      <div class="p-top-blog__link">
        <a href="<?php echo esc_url(home_url('/')); ?>">Topへ戻る</a>
      </div>
    </div>

    <!-- サイドバー -->
    <aside class="l-flex__side-menu">
      <?php get_sidebar(); ?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>