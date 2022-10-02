<?php get_header(); ?>
<div class="l-inner">
  <div class="p-archive-cards">

    <!-- ループの開始 -->

    <?php
      $paged = get_query_var('paged')? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'post',
        'orderby' => 'post_date',
        'posts_per_page' => 3,
        'paged' => $paged           //ページ送り
      ); 
      $the_query = new WP_Query($args); ?>
    <?php if ( $the_query->have_posts() ): ?>
    <?php while($the_query->have_posts()):$the_query->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="">
      <figure class="">

        <?php
                if(has_post_thumbnail()):
                  the_post_thumbnail('medium_thumbnail');
                else:?>

        <!-- 画像がなかった時の表示 -->
        <img src="<?php echo esc_url(get_theme_file_uri('/')); ?>" alt="">
        <?php endif;?>
      </figure>
      <p class=""><?php echo mb_substr($post-> post_title, 0, 38).''; ?>
      </p>
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
</div>
<?php get_footer(); ?>