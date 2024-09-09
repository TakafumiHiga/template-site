<?php 
/**
 * Template Name: page-nosidebar
 */
get_header(); 
?>

<div class="inner l-wrap">
  <!-- ループの開始 -->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="p-single-post">
    <!-- カテゴリーを表示（リンクなし） -->
    <?php 
        $terms = get_the_terms(get_the_ID(), 'staff_cat');
        if ($terms && !is_wp_error($terms)) :
          $first_term = $terms[0];
      ?>
    <span class="c-cat"><?php echo esc_html($first_term->name); ?></span>
    <?php endif; ?>

    <!-- 日付表示 -->
    <time class="c-time" datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(get_the_time('Y.m.d')); ?></time>

    <!-- タイトルとコンテンツ表示 -->
    <h3 class="p-single-post__title"><?php the_title(); ?></h3>
    <div class="p-single-post__desc"><?php the_content(); ?></div>
  </article>
  <?php endwhile; endif; ?>

  <!-- ページネーション -->
  <div class="prev-next">
    <div class="previous"><?php previous_post_link('%link', '< 前へ'); ?></div>
    <a class="top-link" href="<?php echo esc_url(home_url('/staff')); ?>">一覧へ戻る</a>
    <div class="next"><?php next_post_link('%link', '次へ >'); ?></div>
  </div>
</div>

<?php get_footer(); ?>