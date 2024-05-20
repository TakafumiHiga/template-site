<ul class="p-post-lists">
  <!-- ループの開始 -->
  <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $args = [
        'post_type' => 'post',
        'orderby' => 'post_date',
        'posts_per_page' => 4,
        'paged' => $paged, //ページ送り
      ]; 
      $the_query = new WP_Query($args);
      if ( $the_query->have_posts() ):
      while($the_query->have_posts()):$the_query->the_post(); 
  ?>

  <li class="p-post-list"><a class="p-post-list__link" href="<?php the_permalink(); ?>"><time class="c-time"
        datetime="<?php the_time('Y.m.j'); ?>">
        <?php echo get_the_time('Y.m.d'); ?>
      </time><span
        class="c-cat <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span>
      <h3 class="p-post-list__title"><?php echo mb_substr($post-> post_title, 0, 16).'…'; ?></h3>
    </a></li>
  <?php endwhile;
  else: ?>
  <h3 class="p-post-list__title">只今準備中でございます。</h3>
  <?php endif;?>
  <?php wp_reset_postdata(); ?>
  <!-- ループここまで -->
</ul>

<?php if ( !is_front_page() ) : ?>
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

<?php endif; ?>