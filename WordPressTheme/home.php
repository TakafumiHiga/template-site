<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <!-- リストタイプ -->
      <ul class="p-post-lists">
        <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = [
      'post_type' => 'post',
      'orderby' => 'post_date',
      'posts_per_page' => 4,
      'paged' => $paged,
    ]; 
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post(); 
        $cat = get_the_category();
        if ($cat) {
          $cat = $cat[0];
        }
  ?>
        <!-- ループの開始 -->
        <li class="p-post-list">
          <a class="p-post-list__link" href="<?php the_permalink(); ?>">
            <time class="c-time" datetime="<?php the_time('Y.m.j'); ?>"><?php echo get_the_time('Y.m.d'); ?></time>
            <span class="c-cat <?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->cat_name); ?></span>
            <h3 class="p-post-list__title"><?php echo esc_html(mb_substr(get_the_title(), 0, 16)) . '…'; ?></h3>
          </a>
        </li>
        <!-- ループここまで -->
        <?php endwhile; ?>
      </ul>
      <?php if (!is_front_page()) : ?>
      <!-- ページナビ -->
      <div class="l-pager">
        <?php
    $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
    $pagination_args = [
      'mid_size' => 1, 
      'prev_text' => '<', 
      'next_text' => '>'
    ]; 
    the_posts_pagination($pagination_args);
  ?>
      </div>
      <?php endif; ?>
      <?php else : ?>
      <h3 class="p-post-list__title">只今準備中でございます。</h3>
      <?php endif; ?>



      <?php wp_reset_postdata(); ?>
      <div class="p-top-blog__link">
        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>/">Topへ戻る</a>
      </div>
    </div>
    <aside class="l-flex__aside">
      <?php get_sidebar();?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>