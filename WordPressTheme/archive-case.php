<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <div class="p-case__upper">

        <!-- ▼▼▼タームの絞り込みここから▼▼▼ -->
        <?php get_template_part('includes/case-tax-btn'); ?>
        <!-- ▲▲▲カテゴリソートタグここまで▲▲▲ -->
      </div>

      <?php get_template_part('template-parts/post-type-case-items'); ?>
      <!-- ページナビ -->
      <div class="c-pager">
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
    </div>

    <div class="l-flex__aside p-aside">
      <?php get_template_part('includes/sidebar-case'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>

<?php the_field('seminar_date'); ?>