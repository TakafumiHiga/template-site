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

var swiper = new Swiper(".clientsSwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 5500,
    disableOnInteraction: false,
  },
  autoplay: {
    delay: 3000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
