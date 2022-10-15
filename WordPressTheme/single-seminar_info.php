<?php get_header(); ?>
<div class="l-inner">
  <?php if (have_posts()): ?>
  <?php while (have_posts()) : the_post(); ?>
  <article class="single_seminar_content">
    <h2><?php the_field('seminar_name'); ?></h2>
    <div class="single_seminar_content__tag c-square_tag"><?php
                  $term = get_the_terms($post->ID,'seminar_genru');
                  echo $term[0]->name;
                  ?>
    </div>
    <figure class="single_seminer_img">
      <img src="<?php the_field('seminar_image'); ?>" alt="">
    </figure>
    <div class="single_seminer_desc"><?php the_field('seminar_desc'); ?></div>
    <div class="single_seminer_date">
      <div class="single_seminer_date_item"><span>セミナー名：</span><?php the_field('seminar_name'); ?></div>
      <div class="single_seminer_date_item"><span>講師名：</span><?php the_field('seminar_lecturer'); ?></div>
      <div class="single_seminer_date_item"><span>開催日：</span><?php the_field('seminar_date'); ?></div>
      <div class="single_seminer_date_item">
        <span>時間：</span><?php the_field('seminar_start_time'); ?>~<?php the_field('seminar_end_time'); ?>
      </div>
      <div class="single_seminer_date_item"><span>開催場所：</span><?php the_field('seminar_location'); ?></div>
    </div>
    <figure class="single_seminar_map">
      <?php //the_field('googlemap'); ?><?php the_content();?>
    </figure>
    <div class="single_seminer_link">
      <a href="<?php echo esc_url( home_url('/event_seminar_entry') ); ?>/?post_id=<?php echo $post->ID; ?>"
        class="seminar_link_btn">
        <div>このイベントに参加する</div>
        <div class="arrow-circle"><img
            src="<?php echo esc_url(get_theme_file_uri('/image/layout/arrow-circle.svg')); ?>" alt=""></div>
      </a>
      <a href="<?php bloginfo('url'); ?>/seminar_info" class="seminar_link_btn">
        <div>一覧に戻る</div>
        <div class="arrow-circle"><img
            src="<?php echo esc_url(get_theme_file_uri('/image/layout/arrow-circle.svg')); ?>" alt=""></div>
      </a>
    </div>
  </article>
  <?php endwhile; ?>
  <?php else: ?>
  <?php endif;?>
</div>


<?php get_footer(); ?>