//サムネイル
var sliderThumbnail = new Swiper(".swiper-test-thumbnail", {
  slidesPerView: 3,
  spaceBetween: 10,
  /*freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,*/
});
const livingSwiper = new Swiper(".swiper-test", {
  loop: true,
  effect: "fade", //slide,fade,cube,coverflow,flip
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 1000,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: sliderThumbnail,
  },
});

var swiper = new Swiper(".c-model-slider", {
  slidesPerView: 2,
  grid: {
    rows: 3,
  },
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      //追加
      return `<span class="${className}">${index + 1}</span>`; //追加
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});
