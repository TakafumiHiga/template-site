<?php get_header(); ?>
<div class="inner l-wrap">
  <div class="l-flex">
    <div class="l-flex__main">
      <div class="p-case__upper">

        <!-- ▼▼▼タームの絞り込みここから▼▼▼ -->
        <?php get_template_part('includes/case-tax-btn'); ?>
        <!-- ▲▲▲カテゴリソートタグここまで▲▲▲ -->
      </div>


      <div class="p-archive-posts l-col-3">
        <!-- https://www.sanzen-design.jp/works -->
        <?php
                      $paged = get_query_var('paged')? get_query_var('paged') : 1;
                      $args = [
                        'post_type' => 'case', //複数のカスタム投稿を表示する
                        'orderby' => 'post_date',
                        // 'showposts' => 10, 
                        'posts_per_page' => 3,  //1ページに表示する数の指定
                        'paged' => $paged,  //ページ送り
                        'order'   => 'DESC', //最新から並び順
                      ]; 
                      $the_query = new WP_Query($args); ?>

        <?php if ( $the_query->have_posts() ): ?>
        <?php while($the_query->have_posts()):$the_query->the_post(); ?>
        <article class="p-archive-post">
          <div class="">
            <h3 class=""><?php the_excerpt(); // 投稿の抜粋を表示 ?></h3>

            <!-- ▼▼▼タームの取得・表示▼▼▼ -->
            <div class="">
              <?php
                          $taxonomies = 'case_cat';
                          $args = array(
                            'hide_empty'    => true, //投稿に紐づいていないタームは出力しない
                            'order' => 'ASC', //昇順
                            'orderby' => 'menu_order' //管理画面の並び順通りにする
                          );
                          $tax_news_terms = get_terms($taxonomies, $args);
                          foreach ($tax_news_terms as $term) :
                            $term_name = $term->name;
                            $term_slug = $term->slug;
                            $term_link = get_term_link($term_slug, $taxonomies)
                          ?>
              <a class="c-cat" href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a>
              <?php endforeach; ?>
            </div>
            <!-- ▲▲▲カテゴリソートタグここまで▲▲▲ -->
          </div>
          <div class="">
            <?php 
                    $pc_img_id = get_post_meta($post->ID , 'case_img_pc' ,true);
                    $sp_img_id = get_post_meta($post->ID , 'case_img_sp' ,true);

                  if ($pc_img_id) {
                    $pc_img = wp_get_attachment_image_src($pc_img_id, 'full');
                    ?>

            <figure class="p-top-works__pc-img">
              <div class="p-top-works__pc-img-wrap">
                <img src="<?php echo esc_url($pc_img[0]); ?>" alt="PCの画像">
              </div>
            </figure>

            <?php } ?>

            <?php if ($sp_img_id) {
                        $sp_img = wp_get_attachment_image_src($sp_img_id, 'full');
                        ?>
            <figure class="p-top-works__sp-img">
              <div class="p-top-works__sp-img-wrap">
                <img src="<?php echo esc_url($sp_img[0]); ?>" alt="SPの画像">
              </div>
            </figure>
            <?php } ?>
          </div>
          <div class="p-top-works_btn-wrap">
            <a class="c-btn-slide" href="<?php the_permalink(); ?>">詳しく見る</a>
          </div>
        </article>
        <?php endwhile;?>
      </div>
      <!-- ページネーション -->
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


        <?php else: ?>
        <p>投稿が見つかりませんでした。</p>
        <?php endif;?>

        <?php wp_reset_postdata(); ?>

      </div>
    </div>


    <div class="l-flex__aside p-aside">
      <?php get_template_part('includes/sidebar-case'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>