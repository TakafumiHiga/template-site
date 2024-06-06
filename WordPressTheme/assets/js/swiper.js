var topSwiper = new Swiper(".topSwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  speed: 6000,
  loop: true,
  autoplay: {
    delay: 250,
  },
  pagination: {
    // el: ".swiper-pagination",
    clickable: true,
  },
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
});

//staff-swiper
var staffSwiper = new Swiper(".js-staff-swiper", {
  loop: true,
  spaceBetween: 5,
  slidesPerView: 2.1,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  //effect: "fade",
  speed: 2000,
  pagination: {
    el: ".swiper-pagination", // ページネーション要素のクラス
    clickable: true, // クリックによるスライド切り替えを有効にする
    //type: "bullets", // 'bullets'（デフォルト） | 'fraction' | 'progressbar'
  },

  navigation: {
    nextEl: ".swiper-button-next", // 「次へ」ボタン要素のクラス
    prevEl: ".swiper-button-prev", // 「前へ」ボタン要素のクラス
  },

  scrollbar: {
    el: ".swiper-scrollbar", // スクロールバー要素のクラス
  },
});
