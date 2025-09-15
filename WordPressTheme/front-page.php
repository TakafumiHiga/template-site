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

  <section class="l-buttons" id="buttons">
    <div class="p-btn-round" style="margin-inline:auto; margin-bottom:40px;">
      <a href="#" class="c-btn c-btn-round --small">詳しく見る</a>
    </div>
    <div class="p-btn-round-linear-gradient" style="margin-inline:auto; margin-bottom:40px;">
      <a href="#" class="c-btn c-btn-round --linear-gradient --small">詳しく見る</a>
    </div>
    <div class="p-btn-round-linear-gradient" style="margin-inline:auto; margin-bottom:40px;">
      <a href="#" class="c-btn c-btn-round --linear-gradient --big">詳しく見る</a>
    </div>
  </section>
  <!-- cta -->
  <section class="l-cta p-cta" id="cta">
    <div class="p-cta__wrap">
      <h2 class="p-cta__title c-top-section-title">
        <span class="p-cta-title__en">CONTACT</span>
        <span class="p-cta-title__jp">お問い合わせ </span>
      </h2>
      <div class="p-cta__row">
        <div class="p-cta__text">
          <p class="p-cta__title">採用に関する質問やご相談はこちらから
          </p>
          <a href="tel:0900000000" class="p-cta__tel"><span class="p-cta__tel-tel">TEL</span><span
              class="p-cta__tel-no">090-000-0000</span></a>
          <p class="p-cta__address">平日・土曜/8:00～17:00&ensp;&ensp;&ensp;日曜・祝日/休業</p>
        </div>
        <div class="p-cta__btns">
          <p class="p-cta__btns-text">職場見学・採用エントリー<br class="u-mobile">
            ご希望の方はこちら
          </p>
          <div class="p-cta__btns-row c-cta-btns">
            <a href="<?php echo esc_url( home_url( '#' ) ); ?>"
              class="c-cta-btn__tour p-cta__tour-btn --radius-4">見学の申し込み</a>
            <a href="#" target="_blank" rel="nofollow noopener"
              class="c-cta-btn__job p-cta__cta-btn --radius-4">求人応募フォーム</a>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- cta -->
  <section id="anchor1" class="anchor anchor1">anchor anchor1</section>
  <section id="anchor2" class="anchor anchor2">anchor anchor2</section>
  <section id="anchor3" class="anchor anchor3">anchor anchor3</section>
  <section id="anchor4" class="anchor anchor4">anchor anchor4</section>
</div>



<?php get_footer(); ?>