<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <div class="p-case__upper">
        <!-- タームの絞り込み -->
        <?php get_template_part('includes/case-tax-btn'); ?>
      </div>

      <!-- カード型archive -->
      <div class="p-archive-posts l-col-3">
        <?php
          // ページ番号とタクソノミーのスラッグを取得
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $type = get_query_var('case_cat');

          // クエリの引数設定
          $args = [
            'post_type' => 'case',
            'orderby' => 'post_date',
            'posts_per_page' => 3,
            'paged' => $paged,
            'order' => 'DESC',
            'tax_query' => [
              [
                'taxonomy' => 'case_cat',
                'field' => 'slug',
                'terms' => $type,
              ],
            ],
          ]; 
          $the_query = new WP_Query($args); 
        ?>

        <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="p-archive-post">
          <figure class="p-archive-post__img">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium_thumbnail'); ?>
            <?php else : ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/')); ?>" alt="" />
            <?php endif; ?>
          </figure>

          <div class="p-archive-post__body">
            <div class="p-archive-post__meta">
              <?php
                  // タームの取得と表示
                  $terms = get_the_terms(get_the_ID(), 'case_cat');
                  if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                      $term_link = get_term_link($term);
                  ?>
              <span class="c-cat" href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term->name); ?></span>
              <?php endforeach; endif; ?>
            </div>
            <h3 class="p-archive-post__title"><?php the_title(); ?></h3>
          </div>
        </a>
        <?php endwhile; ?>
      </div>

      <!-- ページネーション -->
      <div class="l-pager">
        <?php
         $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
        $pagination_args = [
          'mid_size' => 2,
          'prev_text' => '<',
          'next_text' => '>',
        ];
        the_posts_pagination($pagination_args);
        ?>
      </div>

      <?php else : ?>
      <p>投稿が見つかりませんでした。</p>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
    </div>

    <!-- サイドバー -->
    <div class="l-flex__aside p-aside">
      <?php get_template_part('includes/sidebar-case'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>