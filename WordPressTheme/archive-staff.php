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

    <?php get_template_part('/template-parts/archive-staff_contant'); ?>

    <?php endwhile;?>
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

  <?php else: ?>
  <p class="p-archive-post__title">只今準備中でございます。</p>
  <?php endif;?>
  <?php wp_reset_postdata(); ?>



  <div class="p-top-blog__link">
    <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>">Topへ戻る</a>
  </div>
</div>

<?php get_footer(); ?>