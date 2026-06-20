import { html, body, header } from "./domRefs.js";
import { getScrollbarWidth } from "./domShared.js";

//// ページのロードが完了した時にis-loadedを付与
window.addEventListener("load", function () {
  html.classList.add("is-loaded");
});
//// ページのロードが完了した時にis-loadedを付与 end

////.js-burgerをクリックで#sp_menuを開閉

const burger = document.querySelector(".js-burger");
if (burger) {
  burger.addEventListener("click", function () {
    // クリック前の状態でスクロールバーの有無を取得
    // const hasVerticalScrollbar = window.innerWidth - html.clientWidth;

    if (!body.classList.contains("is-sp-menu-opened")) {
      body.classList.add("is-sp-menu-opened");

      // if (hasVerticalScrollbar != 0) {
      //   html.style.marginRight = `${getScrollbarWidth()}px`;
      //   header.style.right = `${getScrollbarWidth()}px`;
      // }
    } else {
      body.classList.remove("is-sp-menu-opened");
      // html.style.marginRight = "";
      // header.style.right = "";
    }
  });
} else {
  console.error(".js-burger が見つかりません");
}
////end .js-burgerをクリックで#sp_menuを開閉

//// ページトップへスクロール
const pagetopLink = document.querySelector("#pagetop a");
if (pagetopLink) {
  pagetopLink.addEventListener("click", function (e) {
    e.preventDefault();

    document.querySelector(".js-scroll-container")?.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}
//// end ページトップへスクロール
