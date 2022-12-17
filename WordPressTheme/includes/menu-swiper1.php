    <!-- Slider main container -->


    <h2><?php the_field('menu_title'); ?></h2>

    <div class="p-menu-wrap">
      <div class="swiper js-menu-swiper1 p-menu-swiper">
        <div class="swiper-wrapper p-menu-swiper__wrap">
          <?php
            $args = array(
              'post_type' => 'menu-a',
              'orderby' => 'post_date',
              'showposts' => 10, 
              'posts_per_page' => 12,
            ); 
            $the_query = new WP_Query($args); ?>

          <?php if ( $the_query->have_posts() ): ?>
          <?php while($the_query->have_posts()):$the_query->the_post(); ?>
          <a href="<?php bloginfo('url'); ?>/all-menu#blue"
            class="swiper-slide p-menu-swiper__slide1 p-menu-slide"><span
              class="p-menu-slide__name"><?php the_field('menu-a_title'); ?></span><span
              class="p-menu-slide__desc"><?php the_field('menu-a_desc'); ?></span>
            <?php $menu_a_img = get_field('menu-a_img');?>
            <figure class="p-menu-slide__img"><img src="<?php echo esc_url($menu_a_img['url']); ?>"
                alt="<?php echo esc_attr($menu_a_img['alt']); ?>">
            </figure>
          </a>
          <?php endwhile;?>

          <?php else: ?>
          <?php endif;?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="swiper-button-next js-menu-swiper-button-next1 p-menu-swiper__button-next"><img
          class="c-menu-arrow-next"
          src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/menu-arrow.svg')); ?>" alt=""></div>
      <div class="swiper-button-prev js-menu-swiper-button-prev1 p-menu-swiper__button-prev"><img
          src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/menu-arrow.svg')); ?>" alt=""></div>
    </div>