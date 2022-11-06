<aside id="secondary" class="widget-area">
  <section class="p-sidebar-menu">
    <h3>最近の投稿</h3>
    <ul>
      <?php
          $cat_posts = get_posts(array(
              'post_type' => 'voice', // 投稿タイプ
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
      <?php wp_get_archives( 'post_type=voice&type=monthly&show_post_count=5' ); ?>
    </ul>
  </section>
  <section class="p-sidebar-menu">
    <h3>カテゴリー</h3>
    <!-- カテゴリソートタグ -->
    <?php
                    $taxonomies = 'voice_cat';
                    $args = array(
                      'hide_empty'    => true, //投稿に紐づいていないタームは出力しない
                      'order' => 'ASC', //昇順
                      'orderby' => 'menu_order' //管理画面の並び順通りにする
                    );
                    $tax_case_terms = get_terms($taxonomies, $args);
                    foreach ($tax_case_terms as $term) :
                      $term_name = $term->name;
                      $term_slug = $term->slug;
                      $term_link = get_term_link($term_slug, $taxonomies)
                    ?>
    <ul>
      <li>
        <a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a>
      </li>

    </ul>
    <?php endforeach; ?>
  </section>
</aside><!-- #secondary -->