"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  var topBtn = $(".pagetop");
  topBtn.hide(); // ボタンの表示設定

  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  }); // ボタンをクリックしたらスクロールして上に戻る

  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing"
    );
    return false;
  });

  // ハンバーガーメニュー
  $("#js-hamburger").click(function () {
    $("#js-drower").toggleClass("open");
    $("body").toggleClass("is-fixed");
    $("#js-hamburger").toggleClass("active"); // この行を再度追加
  });

  $(document).on("click", 'a[href*="#"]', function () {
    var time = 100;
    var header = $(".p-header").innerHeight();
    var target = $(this.hash);
    if (!target.length) return;

    // .p-headerの高さを取得
    var pHeaderHeight = $(".p-header").outerHeight() || 0;
    // スクロール位置を計算する際に、.p-headerの高さを考慮に入れる
    var targetY = target.offset().top - header - pHeaderHeight;

    $("body").removeClass("is-fixed");

    $("html,body").animate(
      {
        scrollTop: targetY,
      },
      time,
      "swing",
      function () {
        $(".c-drower").removeClass("open");
        $(".c-hamburger").removeClass("active");
      }
    );
    return false;
  });

  $(function () {
    $(".submenu-toggle").on("click", function (event) {
      event.preventDefault();
      event.stopPropagation();

      // クリックしたsubmenu-toggleの親のli要素の中で.sub-menuを探してslideToggleとtoggleClassを適用
      var submenu = $(this).closest("li").find(".sub-menu");
      submenu.slideToggle(300);
      submenu.toggleClass("open");
    });
  });
});

$(document).ready(function () {
  var shadowTimeout;
  var headerHeight = $(".p-header__menu").height(); // ヘッダー要素の高さを取得

  $(window).on("scroll", function () {
    // スクロール位置がヘッダーの高さ以上か、ページのトップに戻ったかを判断
    var windowPosition = $(this).scrollTop() > headerHeight;

    // スクロール位置に応じて、ヘッダーメニューに影をつけるクラスを切り替え
    $(".p-header__menu").toggleClass("shadow", windowPosition);

    // スクロール位置に応じて、CTAの表示を切り替え
    $(".p-header__cta").toggleClass("scrolling-active", windowPosition);

    // スクロール位置に応じて、グローバルメニューの固定を切り替え
    $(".p-global-menu").toggleClass("sticky", windowPosition);

    // タイマーが設定されていればクリアする
    if (shadowTimeout) {
      clearTimeout(shadowTimeout);
    }

    // スクロールが止まった際に影を消す
    shadowTimeout = setTimeout(function () {
      $(".p-header__menu").removeClass("shadow");
    }, 2000);
  });
});
