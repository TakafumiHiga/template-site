<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <article class="p-single-post p-single-post__inner">

        <!-- ループの開始 -->
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
        <div class="p-single-post__body">
          <!-- カテゴリーを全部表示(リンク無し) -->
          <ul class="p-single-post__tag-wrap">
            <?php
      $terms = get_the_terms($post->ID, 'case_cat');
      if (!empty($terms) && !is_wp_error($terms)) {
          foreach ($terms as $term) {
              $term_slug = $term->slug;
              $term_name = $term->name;
              ?>
            <li class="p-single-post__tag c-card-category c-tag <?php echo esc_html($term_slug); ?>">
              <?php echo esc_html($term_name); ?>
            </li>
            <?php
         }
      }
      ?>
          </ul>
          <time class="p-archive-post__time"><?php echo get_the_time('Y.m.j'); ?></time>
          <h3 class="p-single-post__title"><?php the_title(); ?></h3>
          <div class="p-single-post__desc"><?php the_content();?></div>
        </div>
      </article>
      <?php endwhile;?>
      <?php else: ?>
      <h3 class="p-single-post__title">現在記事は準備中でございます。</h3>
      <?php endif;?>
      <!-- ページネーション -->
      <div class="prev-next">
        <div class="previous"><?php previous_post_link('%link', '< 前へ'); ?></div>
        <a class="top-link" href="<?php bloginfo('url'); ?>/case">一覧へ戻る</a>
        <div class="next"><?php next_post_link('%link', '次へ >'); ?></div>
      </div>
    </div>
    <!-- サイドバー -->
    <aside class="l-flex__aside">
      <?php get_sidebar();?>
    </aside>
  </div>
  <?php get_footer(); ?>