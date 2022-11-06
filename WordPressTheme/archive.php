<?php get_header(); ?>
<div class="l-inner">
  <div class="p-archive-cards">

    <!-- ループの開始 -->

    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>


    <a class="p-archive-post" href="<?php the_permalink(); ?>">
      <figure class="p-archive-post__img">
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
      <div class="p-archive-post__bottom">
        <h3 class="p-archive-post__title"><?php echo mb_substr($post-> post_title, 0, 15).'...'; ?></h3>
        <p class="p-archive-post__desc"><?php the_content();?></p>
      </div>
    </a>
    <?php endwhile;?>
    <?php else: ?>
    <?php endif;?>
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