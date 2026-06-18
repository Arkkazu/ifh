import { html, body, header } from "./domRefs.js";
import { getScrollbarWidth, onWidthChange } from "./domShared.js";
// const html = document.documentElement;
// const body = document.body;
// const header = document.querySelector("header");
// const footer = document.querySelector("footer");
// const spMenu = document.querySelector(".js-sp-menu");

//// ページのロードが完了した時にis-loadedを付与
window.addEventListener("load", function () {
  document.documentElement.classList.add("is-loaded");
});
//// ページのロードが完了した時にis-loadedを付与 end

//// 幅だけの変化
/**
 * 幅だけの変化時にコールバックを実行するユーティリティ関数
 * @param {Element} target - 監視対象要素
 * @param {Function} callback - 幅変化時に呼ばれる関数
 */
// function onWidthChange(target, callback) {
//   let previousWidth = target.clientWidth;

//   const observer = new ResizeObserver(() => {
//     const currentWidth = target.clientWidth;
//     if (currentWidth !== previousWidth) {
//       previousWidth = currentWidth;
//       callback(currentWidth);
//     }
//   });

//   observer.observe(target);
// }
//// 幅だけの変化 end

////スクロールバーの幅を取得 scrollbarWidth
// function getScrollbarWidth() {
//   return window.innerWidth - html.clientWidth;
// }
// let scrollbarWidth = getScrollbarWidth();

// 幅が変化したときに更新
// onWidthChange(html, function () {
//   scrollbarWidth = getScrollbarWidth();
//   console.log(scrollbarWidth);
// });
//// end スクロールバーの幅を取得

////#js-burgerをクリックで#sp_menuを開閉
const burger = document.querySelector("#js-burger");
if (burger) {
  burger.addEventListener("click", function () {
    // クリック前の状態でスクロールバーの有無を取得
    const hasVerticalScrollbar = window.innerWidth - document.documentElement.clientWidth;
    if (!body.classList.contains("is-sp-menu-opened")) {
      body.classList.add("is-sp-menu-opened");
      if (hasVerticalScrollbar != 0) {
        header.style.right = `${getScrollbarWidth()}px`;
      }
    } else {
      body.classList.remove("is-sp-menu-opened");
      header.style.right = "";
    }
  });
} else {
  console.error("#js-burger が見つかりません");
}
////end #js-burgerをクリックで#sp_menuを開閉
