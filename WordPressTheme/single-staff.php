<?php 
/**
 * Template Name: page-nosidebar
 * 
 */
 get_header(); ?>

<div class="inner l-wrap">


  <!-- ループの開始 -->
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
  <article class="p-single-post">
    <!-- カテゴリーを全部表示(リンクなし) -->
    <span class="c-cat"><?php
                  $term = get_the_terms($post->ID,'staff_cat');
                  echo $term[0]->name;
                  ?>
    </span><time class="c-time" datetime="<?php the_time('Y-m-d'); ?>"><?php echo get_the_time('Y.m.j'); ?></time>
    <h3 class="p-single-post__title"><?php the_title(); ?></h3>
    <div class="p-single-post__desc"><?php the_content(); ?></div>
    <!-- リピーターフィールド -->
    <?php
          $fields = CFS()->get('q&a'); // CFS()を使用してカスタムフィールドを取得
          if (!empty($fields) && is_array($fields)): // フィールドが空でなく、配列であることを確認
            foreach ($fields as $field):
        ?>
    <p><?php echo esc_html($field['question']); ?></p>
    <p><?php echo esc_html($field['answer']); ?></p>
    <?php endforeach; endif; ?>
    <!-- リピーターフィールド -->
    <!-- ループと条件文の終了 -->
  </article>
  <div class="p-staff__related-staff">
    <p>関連ポスト</p>
    <div class="p-staff__related-staff">
      <p>関連ポスト</p>
      <?php
          $values = CFS()->get('related_staff');
          if (!empty($values) && is_array($values)): // 配列が空でないか、配列であることを確認
          foreach ($values as $post_id):
            setup_postdata($post_id);
            $rslink = get_permalink($post_id);
            $rstitle = get_the_title($post_id);
            $rsimg = get_the_post_thumbnail($post_id, 'large');
          ?>
      <p>
        <a class="staff" href="<?php echo esc_url($rslink); ?>">
          <?php echo esc_html($rstitle); ?>
          <figure><?php echo $rsimg; ?></figure>
        </a>

      </p>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); // グローバル変数 $post をリセット ?>
      <?php else: ?>
      <p>No related staff found.</p>
      <?php endif; ?>
    </div>










    <?php endwhile; endif; ?>
    <!-- ページネーション -->
    <div class="prev-next">
      <div class="previous"><?php previous_post_link('%link', '< 前へ'); ?></div>
      <a class="top-link" href="<?php echo esc_url(home_url('/staff')); ?>">一覧へ戻る</a>
      <div class="next"><?php next_post_link('%link', '次へ >'); ?></div>
    </div>
  </div>
  <?php get_footer(); ?>