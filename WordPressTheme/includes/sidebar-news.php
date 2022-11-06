<section class="p-sidebar-menu">
  <h3>最近の投稿</h3>
  <ul>
    <?php
          $cat_posts = get_posts(array(
              'post_type' => 'post', // 投稿タイプ
              'posts_per_page' => 5, // 表示件数
              'orderby' => 'date', // 表示順の基準
              'order' => 'DESC' // 昇順・降順
          ));
          global $post;
          if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>
    <!-- ループはじめ -->
    <li>
      <a href="<?php the_permalink() ?>">
        <?php echo mb_substr($post-> post_title, 0, 20).'...'; ?>
      </a>
    </li>
    <!-- ループおわり -->
    <?php endforeach; endif; wp_reset_postdata(); ?>
  </ul>
</section>
<section class="p-sidebar-menu">
  <h3>月別アーカイブ</h3>
  <ul>
    <?php wp_get_archives( 'post_type=post&type=monthly&show_post_count=5' ); ?>
  </ul>
</section>
<section class="p-sidebar-menu">
  <h3>カテゴリー</h3>
  <ul>
    <?php
$categories = get_categories();
foreach($categories as $category) {
echo '<li><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
}
?>
  </ul>
</section>