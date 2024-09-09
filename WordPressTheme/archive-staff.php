<?php 
/**
 * Template Name: page-nosidebar
 */
get_header(); 
?>

<div class="inner l-wrap">
  <div class="p-archive-posts l-col-3">
    <!-- ループの開始 -->
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = [
      'post_type' => 'staff',
      'orderby' => 'post_date',
      'posts_per_page' => 3,
      'paged' => $paged,

    ];

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
        get_template_part('template-parts/archive-staff_contant'); // テンプレートの呼び出し
      endwhile;
    ?>
  </div>

  <!-- ページナビ -->
  <div class="l-pager">
    <?php
    $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
    $pagination_args = [
      'mid_size' => 1,
      'prev_text' => '<',
      'next_text' => '>',
    ];
    the_posts_pagination($pagination_args);
    ?>
  </div>

  <?php else : ?>
  <p class="p-archive-post__title">只今準備中でございます。</p>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>

  <div class="p-top-blog__link">
    <a href="<?php echo esc_url(home_url('/')); ?>">Topへ戻る</a>
  </div>
</div>

<?php get_footer(); ?>