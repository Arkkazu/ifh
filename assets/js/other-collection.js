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

if (swiper.slides.length <= 9) {
  document.querySelector(".swiper-button-next").style.display = "none";
  document.querySelector(".swiper-button-prev").style.display = "none";
}
