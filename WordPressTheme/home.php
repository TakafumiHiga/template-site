<?php get_header(); ?>
<div class="l-inner l-post-container">
  <div class="l-flex">
    <div class="l-flex__main-contents">
      <div class="p-archive-posts">

        <!-- ループの開始 -->
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
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
          <div class="p-archive-post__body">
            <div class="p-archive-post__meta">
              <time class="p-archive-post__time"><?php the_time('Y.m.j'); ?></time>

              <span
                class="c-tag p-archive-post__tag <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; }?></span>
            </div>
            <h3 class="p-archive-post__title"><?php the_title(); ?></h3>
          </div>
        </a>
        <?php endwhile;?>
        <?php else: ?>
        <h3 class="p-archive-post__title">只今準備中でございます。</h3>
        <?php endif;?>
        <?php //wp_reset_postdata(); ?>
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
        <a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>/">Topへ戻る</a>
      </div>
    </div>
    <?php get_template_part('includes/pagenavi'); ?>
    <aside class="l-flex__side-menu">
      <?php get_sidebar();?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>