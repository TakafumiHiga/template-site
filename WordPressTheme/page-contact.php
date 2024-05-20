<?php
/*
Template Name: フォームスタイル
*/
?>

<?php get_header(); ?>
<div class="p-form__bg">
  <?php the_content(); ?>
</div>
<?php get_footer(); ?>

<div class="p-form__inner p-form__items-bg">
  <div class="p-form__caption p-form__item-border">
    <p><span class="required ">必須</span>マークは<span
        class="u-c-red">必要事項</span>ですので、必ずご記入お願いします。内容によってはお時間をいただくことがあります。あらかじめご了承ください。</p>
  </div>

  <dl>
    <div class="form-item p-form__item-border p-form__item">
      <dt id="your-name">
        <span class="form-item-title">お名前</span><span class="required ">必須</span>
      </dt>
      <dd>[text* fullname]<span class="p-form__item-example">例) 山田 太郎</span></dd>
    </div>

    <div class="form-item p-form__item-border p-form__item">
      <dt id="your-email">
        <span class="form-item-title">メールアドレス</span><span class="required ">必須</span>
      </dt>
      <dd>[email* email-745 id:your-email]<span class="p-form__item-example">例) aaa@bbb.com</span></dd>
    </div>

    <div class="form-item p-form__item-border p-form__item">
      <dt id="your-tel">
        <span class="form-item-title">電話番号</span><span class="required ">必須</span>
      </dt>
      <dd>[tel* your-tel]<span class="p-form__item-example">例) 00000000000</span></dd>
    </div>

    <div class="form-item p-form__item-border p-form__item">
      <dt id="menu-order">
        <span class="form-item-title">日時</span><span class="required ">必須</span>ご希望時間帯をお選びください
      </dt>
      <dd>[date* date min:today placeholder "日付を選択"]</dd>
    </div>

    <div class="form-item p-form__item-border p-form__item">
      <dt id="time">
        <span class="form-item-title">ご希望時間帯</span><span class="required ">必須</span>
      </dt>
      <dd>[select* time include_blank "選択する" "午前" "午後" "その他"]</dd>
    </div>

    <div class="form-item p-form__item-border p-form__item">
      <dt id="staff">
        <span class="form-item-title">ご希望スタッフ</span><span class="required ">必須</span>
      </dt>
      <dd>[radio staff use_label_element default:1 "Aさん" "Bさん" "Cさん"]</dd>
    </div>

    <div class="form-item p-form__item-border p-form__item">
      <dt id="menu-order">
        <span class="form-item-title">希望メニュー</span><span class="required ">必須</span>
      </dt>
      <dd>[checkbox* menu-order use_label_element "Aランチ" "Bランチ" "Cランチ" "お新香" "キムチ" "豚汁"]</dd>
    </div>
    <div class="form-item p-form__item-border p-form__item">
      <dt id="menu-order">
        <span class="form-item-title">その他</span><span class="any">任意</span>
      </dt>
      <dd>[textarea textarea-111]</dd>
    </div>
  </dl>

  <div class="p-form__item-privacy-wrap p-form__item-border u-margin-bottom40">
    <div class="u-margin-bottom10">
      個人情報の取扱いについて<span class="required  u-margin-left10">必須</span>
    </div>

    <div class="form-item p-form__item-privacy p-form__item u-margin-bottom10">
      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">プライバシーポリシー</strong></p>
        〇〇株式会社（以下、「当社」といいます）では個人情報に関する法令およびその他の規範を遵守し、適正に管理し、お客様の個人情報保護に配慮致します。
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">個人情報保護方針</strong></p>
        当社は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、全従業員に個人情報保護の重要性の認識と取組みを徹底させることにより、個人情報の保護を致します。
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">個人情報の管理</strong></p>
        当社は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">個人情報の利用目的</strong></p>
        本ウェブサイトでは、お客様からのお問い合わせ時に、お名前、e-mailアドレス、電話番号等の個人情報をご登録いただく場合がございますが、これらの個人情報はご提供いただく際の目的以外では利用いたしません。
        <p class="u-margin-bottom10">お客さまからお預かりした個人情報は、当社からのご連絡や業務のご案内やご質問に対する回答として、電子メールや資料のご送付に利用いたします。</p>
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">個人情報の第三者への開示・提供の禁止</strong></p>
        当社は、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">お客さまの同意がある場合</strong></p>
        お客さまが希望されるサービスを行なうために当社が業務を委託する業者に対して開示する場合
        法令に基づき開示することが必要である場合
        個人情報の安全対策
        当社は、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策しております。
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">ご本人の照会</strong></p>
        お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。
      </div>

      <div class="u-margin-bottom20">
        <p class="u-margin-bottom10"><strong class="p-form__item-privacy-strong">法令、規範の遵守と見直し</strong></p>
        当社は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。
      </div>
    </div>

    <div class="form-item c-checkbox p-form__item-checkbox">
      [acceptance privacy-policy] 個人情報の取扱いに同意する[/acceptance]
    </div>
  </div>

  <div class="form-item p-form__send-btn">
    [submit class:c-btn-mid class:next-btn "確認画面へ進む"]
    [multistep multistep-687 first_step skip_save "http://localhost:10198/workspace-tour/confirm/"]
  </div>
</div>