<!-- 
CFSを使ってスタッフ情報を取得、スライダーで表示するテンプレート
https://swiperjs.com/get-started
https://www.itti.jp/web-design/how-to-display-custom-field-suite/
 -->

<div class="p-staff">
  <!-- Slider main container -->
  <div class="swiper js-staff-swiper p-staff__swiper">
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php
            $args = [
              'post_type' => 'staff',
              'orderby' => 'post_date',
              'showposts' => 10, 
              'posts_per_page' => 10,
            ]; 
            $the_query = new WP_Query($args);
          
              if ( $the_query->have_posts() ):
              while($the_query->have_posts()): $the_query->the_post(); 
              
              ?>

      <div class="swiper-slide"><a class="p-staff__img-wrap" href="<?php the_permalink(); ?>">
          <?php
              //スタッフの名前を取得
              $staff_name = get_post_meta($post->ID, 'staff_name', true);
              // 画像IDを取得
             $staff_img = get_post_meta($post->ID, 'staff_img', true);
             // 画像URLを取得
             $staff_img = wp_get_attachment_image_src($staff_img, 'large');
             // 代替テキストを取得※表示したい場合メディアで記載必須
             $alt_text = get_post_meta(get_post_meta($post->ID, 'staff_img', true), '_wp_attachment_image_alt', true);
            ?>

          <?php
          // 画像があれば表示なかればNoimageを表示
          if($staff_img):
          ?>
          <img src="<?php echo esc_url($staff_img[0]); ?>" alt="<?php echo esc_attr($alt_text); ?>">
          <?php else: ?>
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/Noimage.jpg')); ?>" alt="Noimage">
          <?php endif; ?>
        </a>
        <h3 class="p-staff_name"><?php echo esc_html($staff_name); ?></h3>
      </div>
      <?php endwhile;?>
      <?php else: ?>
      <p>現在記事は準備中でございます。</p>
      <?php endif;?>
      <?php wp_reset_postdata(); ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev p-staff__prev-btn"></div>
    <div class="swiper-button-next p-staff__next-btn"></div>
  </div>
</div>