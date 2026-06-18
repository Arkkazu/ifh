import { html, body, header } from "./domRefs.js";
import { getScrollbarWidth } from "./domShared.js";

document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector(".js-salon-list-btn");
  const salonList = document.querySelector(".js-salon-list");

  if (!toggleBtn || !salonList) return;

  // トグルボタンのクリック処理
  toggleBtn.addEventListener("click", function () {
    const isVisible = salonList.style.opacity === "1" && salonList.style.pointerEvents === "auto";

    if (isVisible) {
      salonList.style.opacity = "";
      salonList.style.pointerEvents = "";
    } else {
      salonList.style.opacity = "1";
      salonList.style.pointerEvents = "auto";
    }
  });

  // .js-salon-list 内の a タグに対するクリック処理
  salonList.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", function () {
      salonList.style.opacity = "";
      salonList.style.pointerEvents = "";
    });
  });
});

////
//モーダル/オープン・クローズ
document.addEventListener("DOMContentLoaded", function () {
  const salonListPosi = document.querySelector(".js-salon-list-posi");
  // モーダルをフェードインさせる関数
  function fadeIn(element) {
    element.style.opacity = 0;
    element.style.display = "block";
    let opacity = 0;
    const timer = setInterval(function () {
      if (opacity >= 1) {
        clearInterval(timer);
      }
      element.style.opacity = opacity;
      opacity += 0.1;
    }, 20);
  }

  // モーダルをフェードアウトさせる関数
  function fadeOut(element) {
    let opacity = 1;
    const timer = setInterval(function () {
      if (opacity <= 0) {
        clearInterval(timer);
        element.style.display = "none";
      }
      element.style.opacity = opacity;
      opacity -= 0.1;
    }, 20);
  }

  // モーダルを開く処理
  document.querySelectorAll(".js-modal-open").forEach(function (trigger) {
    trigger.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = trigger.getAttribute("data-target");
      const modal = document.getElementById(targetId);

      body.classList.add("is-modal-opened");
      html.style.paddingRight = `${getScrollbarWidth()}px`;

      if (getScrollbarWidth() > 0) {
        const isWide = window.innerWidth >= 1272;
        const basePadding = isWide ? 32 : 0;

        header.style.paddingRight = `${getScrollbarWidth() + basePadding}px`;

        if (isWide) {
          salonListPosi.style.right = `calc(${getScrollbarWidth()}px + 50rem)`;
        } else {
          salonListPosi.style.right = "auto";
        }
      }

      fadeIn(modal);
    });
  });

  // モーダルを閉じる処理
  document.querySelectorAll(".js-modal-close").forEach(function (closeBtn) {
    closeBtn.addEventListener("click", function (e) {
      e.preventDefault();
      body.classList.remove("is-modal-opened");
      html.style.paddingRight = "";
      header.style.paddingRight = "";
      salonListPosi.style.right = "";

      document.querySelectorAll(".modal").forEach(function (modal) {
        fadeOut(modal);
      });
    });
  });
});
////

////英語の名前の半角スペースを改行に変換
document.addEventListener("DOMContentLoaded", function () {
  // '.js-staff-name-en' クラスを持つすべての要素を取得
  const elements = document.querySelectorAll(".js-staff-name-en");

  // 各要素に対して処理を実行
  elements.forEach(function (element) {
    // 元のテキストを取得
    const originalText = element.textContent;
    // 半角スペースを <br> タグに置換
    const modifiedText = originalText.replace(/ /g, "<br>");
    // HTMLとして設定（テキストではなく）
    element.innerHTML = modifiedText;
  });
});
////

////ランクが複数ある場合/の後を改行
document.addEventListener("DOMContentLoaded", function () {
  // '.js-rank' クラスを持つすべての要素を取得
  const elements = document.querySelectorAll(".js-rank");

  // 各要素に対して処理を実行
  elements.forEach((element) => {
    // 要素のテキスト内容を取得
    let text = element.innerHTML;

    // /の後に改行を挿入
    let newText = text.replace(/\//g, "/<br>");

    // 新しいテキスト内容を要素に設定
    element.innerHTML = newText;
  });
});
////
