<?php 
/**
 * Template Name: page-nosidebar
 * 
 */
 get_header(); ?>
<div class="inner l-wrap">


  <div class="p-archive-posts l-col-3">
    <!-- ループの開始 -->
    <?php
            //投稿ページの場合はpaged
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $type = get_query_var( 'staff_cat' ); // タクソノミーのスラッグ
            $args = [
                'post_type' => array('staff'),
                'orderby' => 'post_date',
                'posts_per_page' => 3,
                'paged' => $paged, //ページ送り
                'category_name' => $cat_info->slug,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'staff_cat', // タクソノミーのスラッグ
                    'field' => 'slug', // ターム名をスラッグで指定する（変更不要）
                    'terms' => $type,
                  ),
                )
                
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()): 
            while ($the_query->have_posts()): $the_query->the_post();
        ?>

    <?php get_template_part('/template-parts/archive-staff_contant'); ?>
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

<?php get_footer(); ?>