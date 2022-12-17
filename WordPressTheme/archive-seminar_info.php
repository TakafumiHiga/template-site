<?php get_header(); ?>
<div class="l-inner">
  <div class="p-archive-cards">

    <!-- ループの開始 -->
    <?php
     $today = date('Ymd'); // dateで現在の日時を取得
      $paged = get_query_var('paged')? get_query_var('page') : 1;
      $args = [
        'post_type' => 'seminar_info',
        'orderby' => 'post_date',
        'posts_per_page' => 2,
        'paged' => $paged,           //ページ送り
        'meta_query' => [
          [
            'key'     => 'seminar_period', // ACFで所得する公開日
            'value'   => $today,
            'compare' => '>=', // value(今日)とkey(公開日）を比較して未来の場合のみ表示
          ],
        ],
        ]; 
      $the_query = new WP_Query($args); ?>

    <?php if ( $the_query->have_posts() ): ?>
    <?php while($the_query->have_posts()):$the_query->the_post(); ?>

    <span class="tag"><?php echo $cat;?></span>
    <a href="<?php the_permalink(); ?>" class="p-post-item">
      <div class="p-post-item__body">
        <figure class="p-post-item__img">
          <img src="<?php the_field('seminar_image'); ?>" alt="画像がない時の処理" />
        </figure>
        <div class="p-post-item__meta">
          <div class="d-flex">
            <div class="date"><?php echo get_the_time('Y.m.j'); ?></div>
            <label><?php
                  $term = get_the_terms($post->ID,'seminar_genru');
                  echo $term[0]->name;
                  ?>
            </label>
          </div>
          <h3 class="p-post-item__h3"><?php the_field('seminar_name'); ?></h3>
          <div class="sub_data pc mt-auto">開催日：<?php the_field('seminar_date'); ?></div>
        </div>
      </div>
      <div class="sub_data sp mt10">開催日：<?php the_field('seminar_date'); ?></div>
      <div class="line mt35"></div>
    </a>
    <?php endwhile; ?>
    <?php else: ?>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>
  </div>

  <!-- ページナビ -->
  <div class="l-pager">
    <?php 
          $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;

            $args = array(
            'mid_size' => 2, 
            'prev_text' => '<', 
            'next_text' => '>'
          ); 
          the_posts_pagination( $args );
          ?>
  </div>
  <div class="p-top-blog__link">
    <a class="" href="<?php bloginfo('url'); ?>/">Topへ戻る</a>
  </div>
  <?php get_template_part('includes/pagenavi'); ?>
</div>
<?php get_footer(); ?>