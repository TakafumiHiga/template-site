<a class="p-archive-post" href="<?php the_permalink(); ?>">
  <figure class="p-archive-post__img">
    <?php
            if(has_post_thumbnail()):
              the_post_thumbnail('medium_thumbnail');
              else:
            ?>
    <img src="<?php echo esc_url(get_theme_file_uri('/')); ?>" alt="Noimage" />
    <?php 
          endif;
          ?>
  </figure>
  <div class="p-archive-post__body">
    <div class="p-archive-post__meta">
      <time class="c-time" datetime="<?php the_time('Y.m.j'); ?>">
        <?php echo get_the_time('Y.m.d'); ?>
      </time>
      <?php
                  // タクソノミー名を定義
                  $tax_name = 'staff_cat';

                  // カテゴリーのデータを取得
                  $terms = get_the_terms($post->ID, $tax_name);

                  // タームが取得できたかどうかをチェック
                  if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                      // タームリンクを取得
                      $term_link = get_term_link($term->slug, $tax_name);
                      if (!is_wp_error($term_link)) {
                        ?>
      <span class="c-cat"><?php echo esc_html($term->name); ?></span>
      <?php
                      }
                    }
                  } else {
                    // タームが見つからない場合のフォールバックメッセージ
                    echo '<span class="c-cat">No categories found.</span>';
                  }
                ?>

    </div>
    <h3 class="p-archive-post__title"><?php the_title(); ?></h3>
  </div>
</a>