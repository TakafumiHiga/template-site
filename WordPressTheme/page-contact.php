<?php get_header(); ?>


<div class="l-inner">
  <?php the_content(); ?>
  <section class="l-contact p-contact">
    <table>
      <tr>
        <th>下記項目にご記入いただき、「確認画面へ」をクリックしてください。</th>
      </tr>
      <tr>
        <th>お問い合わせ内容（複数選択可）<span class="must">必須</span></th>
        <td></td>
      </tr>
    </table>
    <div class="p-contact__item">
      <div class="p-contact__item">下記項目にご記入いただき、「確認画面へ」をクリックしてください。</div>
    </div>
    <div class="form-group rows jcc mt30">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">お問い合わせ内容（複数選択可）<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_checkbox name="問い合わせ内容" children="温浴施設の清掃,病院・介護施設の清掃,飲食店舗の清掃,一般家庭の清掃" separator=","]
      </div>
    </div>
    <div class="form-group rows jcc mt30">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">資料のご請求（マニュアル小冊子とE-book）<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_radio name="資料請求" children="資料請求する,資料請求しない"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">会社名</p>

      </div>
      <div class="col-12">[mwform_text name="会社名" class="form-control" placeholder="例：株式会社環境システム社"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">部署名</p>

      </div>
      <div class="col-12">[mwform_text name="部署名" class="form-control" placeholder="例：○○○○部"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">お名前<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_text name="お名前" class="form-control" placeholder="例：環境太郎"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">ふりがな<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_text name="ふりがな" class="form-control" placeholder="例：かんきょうたろう"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">電話番号<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_text name="電話番号" class="form-control" placeholder="例：000-000-0000"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">メールアドレス<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_email name="メールアドレス" class="form-control" placeholder="例：info@example.com"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">住所<span class="must">必須</span></p>

      </div>
      <div class="col-12">[mwform_text name="住所" class="form-control" placeholder="例：○○県○○○○市○○○○町○○○○"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="col-12 col-form-label">
        <p class="form-ttl_s">ご相談の内容</p>

      </div>
      <div class="col-12">[mwform_textarea name="相談内容" class="form-control"]</div>
    </div>
    <div class="form-group rows jcc">
      <div class="">[mwform_submitButton name="mwform_submitButton-47" class="submit_btn" confirm_value="確認画面へ"
        submit_value="送信する"][mwform_backButton class="submit_btn2" value="戻る"]</div>
    </div>

  </section>










</div>


<?php get_footer(); ?>