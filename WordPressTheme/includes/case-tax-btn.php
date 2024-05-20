<!-- 不完全なコード これだとタクソノミーの場合にcurrentがcaseにもついてしまう-->
<div class="c-tax-btns">
  <div class="c-tax-btns-wrap">
    <a class="c-is-current
    
    <?php if (is_post_type_archive('case') && !is_tax('case_cat')) echo 'c-is-current '; ?>c-tax-btn"
      href="<?php echo esc_url( home_url( '/case' ) ); ?>">全カテゴリー</a>

    <?php
          //get_termsでtermを呼び出す
          // https://developer.wordpress.org/reference/functions/get_terms/
          
          $allterms = get_terms('case_cat'); 
          foreach($allterms as $allterm):
          ?><a href="<?php echo get_term_link($allterm); ?>"
      class="<?php if($allterm->slug == $term){ echo 'c-is-current'; } ?>"><?php echo $allterm->name; ?></a>
    <?php
          endforeach;
          ?>
  </div>
</div>
<!-- 改善されたコード get_queried_object を使う-->
<div class="c-tax-btns">
  <div class="c-tax-btns-wrap">
    <a class="<?php if (is_post_type_archive('case') && !is_tax('case_cat')) echo 'c-is-current '; ?>c-tax-btn"
      href="<?php echo esc_url(home_url('/case')); ?>">全カテゴリー</a>

    <?php
    //get_termsでtermを呼び出す
    //get_queried_objectで現在のページの情報を取得する
    // https://developer.wordpress.org/reference/functions/get_terms/
    $allterms = get_terms('case_cat'); 
    $current_term = get_queried_object();
    var_dump($current_term); 
    foreach($allterms as $allterm):
      ?><a href="<?php echo get_term_link($allterm); ?>"
      class="<?php if(isset($current_term) && $current_term->term_id == $allterm->term_id) echo 'c-is-current '; ?>c-tax-btn"><?php echo $allterm->name; ?></a>
    <?php
    endforeach;
    ?>
  </div>
</div>