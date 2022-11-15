<?php get_header(); ?>

<div class="l-inner">
  <?php
  $args = array(
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;//ページ送り　記事ページはpage
    'post_type' => 'works', //複数のカスタム投稿を表示する
    // 'orderby' => 'post_date',
    // 'showposts' => 10, 
    'posts_per_page' => 20,  //1ページに表示する数の指定
    'order'   => 'DESC', //最新から並び順
    'paged' => $paged,//ページ送り
  ); 
  $the_query = new WP_Query($args); ?>

  <?php if ( $the_query->have_posts() ): ?>
  <?php while($the_query->have_posts()):$the_query->the_post(); ?>

  <a href="<?php the_permalink(); ?>">
    <figure class="img">
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
    <div class="">
      <span
        class="c-card-category <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span>
      <h3 class=""><?php echo mb_substr($post-> post_title, 0, 30).'...'; ?></h3>
      <div class="">
        <time class=""><?php the_time('Y.m.j'); ?></time>
      </div>
    </div>
  </a>
  </article>
</div>
<?php endwhile;?>

<?php else: ?>
<?php endif;?>
<?php wp_reset_postdata(); ?>
<!-- ページナビ -->
<?php get_template_part('includes/pagenavi'); ?>
</div>

<?php get_footer(); ?>