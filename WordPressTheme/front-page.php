<?php get_header(); ?>

<div class="inner">
  <section class="l-top-news" id="news">
    <div class="p-top-news__title-wrap">
      <h2 class="c-top-section-title"><span class="c-top-section-title__en">NEWS</span><span
          class="c-top-section-title__ja">ニュース
        </span></h2>
    </div>
    <?php get_template_part('template-parts/content'); ?>
  </section>

  <!-- ブロークングリッド -->
  <section class="l-about" id="about">
  </section>
  <section class="l-staff" id="staff">
    <?php get_template_part('includes/staff-swiper'); ?>

  </section>

</div>



<?php get_footer(); ?>