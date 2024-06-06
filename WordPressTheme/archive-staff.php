<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <div class="p-archive-posts l-col-3">
        <!-- ループの開始 -->
        <?php
            $cat_info = get_category(get_query_var('cat'));
            //投稿ページの場合はpaged
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
                'post_type' => array('staff'),
                'orderby' => 'post_date',
                'posts_per_page' => 3,
                'paged' => $paged, //ページ送り
                'category_name' => $cat_info->slug,
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()): 
            while ($the_query->have_posts()): $the_query->the_post();
        ?>

        <a class="p-archive-post" href="<?php the_permalink(); ?>">
          <figure class="p-archive-post__img">
            <?php
            if(has_post_thumbnail()):
              the_post_thumbnail('medium_thumbnail');
              else:
            ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/')); ?>" alt="" />
            <?php 
          endif;
          ?>
          </figure>
          <div class="p-archive-post__body">
            <div class="p-archive-post__meta">
              <time class="c-time" datetime="<?php the_time('Y.m.j'); ?>">
                <?php echo get_the_time('Y.m.d'); ?>
              </time>
              <?php
              // カテゴリーのデータを取得
              $cat = get_the_category();
              $cat = $cat[0];
              ?>
              <span
                class="c-cat <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span>
            </div>
            <h3 class="p-archive-post__title"><?php the_title(); ?></h3>
          </div>
        </a>
        <?php endwhile;
          else: ?>

        <h3 class="p-archive-post__title">只今準備中でございます。</h3>
        <?php endif;?>
        <?php wp_reset_postdata(); ?>
      </div>

      <!-- ページナビ -->
      <div class="l-pager">
        <?php 
          $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;

            $args = array(
            'mid_size' => 1, 
            'prev_text' => '<', 
            'next_text' => '>'
          ); 
          the_posts_pagination( $args );
          ?>
      </div>
      <div class="p-top-blog__link">
        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>">Topへ戻る</a>
      </div>
    </div>
    <!-- サイドバー -->
    <aside class="l-flex__side-menu">
      <?php get_sidebar();?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>