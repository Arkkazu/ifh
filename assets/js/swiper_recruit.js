const swiper = new Swiper(".forte-cont-sp", {
  slidesPerView: 1,
  //slidesPerGroup: 1,
  spaceBetween: 16,
  speed: 1000,
  loop: true,
  lazy: true,
  // centeredSlides: false,
  /*
  autoplay: {
    delay: 3000,
    disableOnInteraction: false, // true,
  },
*/
  navigation: {
    prevEl: ".swiper-button-prev",
    nextEl: ".swiper-button-next",
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
    1280: {
      slidesPerView: 4,
    },
    1601: {
      slidesPerView: 5,
    },
  },
});
