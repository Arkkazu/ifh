import { html, body, header } from "./domRefs.js";
import { getScrollbarWidth } from "./domShared.js";

import Splide from "@splidejs/splide";
import "@splidejs/splide/dist/css/splide.min.css";

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".splide-furisode").forEach((el) => {
    new Splide(el, {
      type: "loop",
      arrows: true,
      pagination: false,
      perMove: 1,
      perPage: 3, // 1272px以上のとき3枚
      gap: 90,
      breakpoints: {
        1271: {
          perPage: 2, // 1271px以下のとき2枚
          gap: 16,
        },
        767: {
          perPage: 1, // 767px以下のとき1枚
        },
      },
    }).mount();
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const setEqualHeight = () => {
    const elements = document.querySelectorAll(".js-furisode-card-desc");
    if (!elements.length) return;

    // いったん高さをリセット
    elements.forEach((el) => (el.style.minHeight = ""));

    // 最大の高さを取得
    const maxHeight = Math.max(...Array.from(elements).map((el) => el.offsetHeight));

    // すべての要素に同じ高さを設定
    elements.forEach((el) => (el.style.minHeight = `${maxHeight}px`));
  };

  // 初回実行
  setEqualHeight();

  // 画面リサイズ時にも再計算（遅延実行でパフォーマンス対策）
  let resizeTimer;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(setEqualHeight, 150);
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const fadeElements = document.querySelectorAll(".js-fade");
  if (!fadeElements.length) return;

  // 画面下から20%の位置を閾値として設定
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("opacity-100");
          entry.target.classList.remove("opacity-0");
        }
      });
    },
    {
      threshold: 0, // 交差した瞬間に判定
      rootMargin: "0px 0px -20% 0px", // 画面下から20%で発火
    }
  );

  fadeElements.forEach((el) => {
    el.classList.add("opacity-0", "transition-opacity", "duration-700");
    observer.observe(el);
  });
});
