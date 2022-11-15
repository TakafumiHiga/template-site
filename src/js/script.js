jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  var topBtn = $(".pagetop");
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
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

  //ドロワーメニュー
  $("#MenuButton").click(function () {
    // $(".l-drawer-menu").toggleClass("is-show");
    // $(".p-drawer-menu").toggleClass("is-show");
    $(".js-drawer-open").toggleClass("open");
    $(".drawer-menu").toggleClass("open");
    $("html").toggleClass("is-fixed");
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate({ scrollTop: targetY }, time, "swing");
    return false;
  });
  // アコーディオン
  $(".acd").on("click", function () {
    if (window.matchMedia("(max-width: 1239px)").matches) {
      $(this).next(".acd__item").slideToggle();
      $(this).toggleClass("open");
    }
  });
  $(window).on("resize", function () {
    if (window.matchMedia("(min-width: 1240px)").matches) {
      $(".children-nav").css("display", "flex");
    } else if (window.matchMedia("(max-width: 1239px)").matches) {
      $(".children-nav").css("display", "none");
    }
  });
  // スムーズリンク

  $(document).on("click", 'a[href*="#"]', function () {
    var time = 400;
    var header = $("header").innerHeight();
    var target = $(this.hash);
    if (!target.length) return;
    var targetY = target.offset().top - header;
    $("html,body").animate(
      {
        scrollTop: targetY,
      },
      time,
      "swing"
    );
    return false;
  });

  //ヘッダー固定(SP)
  //fvを超えたらスクロールでheaderに色を付ける
  //下層ページヘッダーを超えたらスクロールでheaderに色を付ける

  var mainPos = $(".fv").height();
  var lowerPos = $(".p-lower-header").height();
  var headerHight = $(".header").height();

  $(window).scroll(function () {
    if ($(window).scrollTop() > mainPos - headerHight) {
      $(".header").addClass("js-headerColor");
    } else if ($(window).scrollTop() > lowerPos - headerHight) {
      $(".header").addClass("js-headerColor");
    } else {
      $(".header").removeClass("js-headerColor");
    }
  });
});
/* -------ハンバーガーメニュー----------------- */

/* -------------------------------- */

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("js-hamburger")
    .addEventListener("click", function () {
      this.classList.toggle("active");
      document.getElementById("js-drower").classList.toggle("active");
      document.getElementById("js-mask").classList.toggle("active");
      document.getElementById("js-navi__menu").classList.toggle("active");
      document.getElementById("js-body").classList.toggle("active");
    });
  document.getElementById("js-drower").addEventListener("click", function () {
    this.classList.toggle("active");
    document.getElementById("js-hamburger").classList.toggle("active");
    document.getElementById("js-navi__menu").classList.toggle("active");
    document.getElementById("js-body").classList.toggle("active");
    document.getElementById("js-mask").classList.toggle("active");
  });
});
