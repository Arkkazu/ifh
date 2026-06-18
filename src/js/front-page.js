import Splide from "@splidejs/splide";

document.addEventListener("DOMContentLoaded", () => {
  const mountSplideOnNextFrame = (element, options) => {
    requestAnimationFrame(() => {
      new Splide(element, options).mount();
    });
  };

  const mountSplideWhenVisible = (element, options) => {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          requestAnimationFrame(() => {
            new Splide(element, options).mount();
          });

          obs.disconnect();
        });
      },
      {
        root: null,
        rootMargin: "200px 0px",
        threshold: 0,
      },
    );

    observer.observe(element);
  };

  // FV
  const kvEl = document.querySelector(".splide-home-kv");
  if (kvEl) {
    mountSplideOnNextFrame(kvEl, {
      type: "fade",
      rewind: true,
      speed: 2000,
      autoplay: true,
      interval: 6000,
      pauseOnHover: false,
      arrows: false,
      pagination: false,
    });
  }

  // コレクション
  const collectionEl = document.querySelector(".home-collection-splide");
  if (collectionEl) {
    mountSplideWhenVisible(collectionEl, {
      type: "loop",
      perPage: 1,
      perMove: 1,
      gap: "10rem",
      autoplay: true,
      interval: 4000,
      pauseOnHover: false,
      pauseOnFocus: false,
      speed: 1000,
      arrows: true,
      pagination: true,
      mediaQuery: "min",
      breakpoints: {
        768: {
          perPage: 3,
          gap: "20rem",
        },
      },
    });
  }
});
