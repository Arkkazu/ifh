import Splide from "@splidejs/splide";
import { html, body, header } from "./domRefs.js";
import { getScrollbarWidth } from "./domShared.js";

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".splide-nail").forEach(function (element) {
    new Splide(element, {
      // type: "loop", // ループさせる
      type: "slide", // ループさせる
      perPage: 4, // スライド枚数
      perMove: 4, // 移動枚数
      gap: 48,
      pagination: false, // ページネーションを無効にする
      breakpoints: {
        1271: {
          perPage: 2, // 画面幅1271px以下の場合
          perMove: 2, // 移動枚数
          gap: 24,
        },
      },
    }).mount();
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".splide-modal").forEach(function (element) {
    new Splide(element, {
      type: "loop", // ループさせる
      breakpoints: {
        1271: {
          arrows: false, // 矢印を無効にする
        },
      },
    }).mount();
  });
});

// モーダルの表示・非表示を切り替える共通関数
function toggleModal(modalElement, isVisible) {
  // モーダルを表示する場合
  if (isVisible) {
    // モーダルを表示する場合

    // modalElement.classList.add('is-visible');
    modalElement.classList.remove("opacity-0", "invisible", "-z-10");
    modalElement.classList.add("opacity-100", "visible", "z-200");
    // bodyにクラスを追加
    body.classList.add("is-modal-opened");

    html.style.paddingRight = `${getScrollbarWidth()}px`;

    pagetop.style.right = `calc(${getScrollbarWidth()}px + 16rem)`;

    // スクロールバーの幅が0ではない場合（スクロールバーが存在する場合）
    if (getScrollbarWidth() !== 0) {
      const isWide = window.innerWidth >= 1272;
      const basePadding = isWide ? 32 : 0;

      header.style.paddingRight = `${getScrollbarWidth() + basePadding}px`;
    }
  } else {
    // モーダルを非表示にする場合

    // モーダル要素からクラスを削除
    // modalElement.classList.remove('is-visible');
    modalElement.classList.remove("opacity-100", "visible", "z-200");
    modalElement.classList.add("opacity-0");

    html.style.paddingRight = "";
    html.style.overflow = ""; // 本文のスクロールを元に戻す
    body.classList.remove("is-modal-opened");
    header.style.paddingRight = "";
    pagetop.style.right = "";

    setTimeout(() => {
      modalElement.classList.add("invisible", "-z-10");
    }, 300); // 300msの遅延は、opacityトランジションの持続時間と一致させる
  }
}

// ボタンがクリックされたときの処理
function onButtonClick(event) {
  // クリックされた要素（ボタン）を取得
  let clickedButton = event.currentTarget;
  // クリックされたボタンのdata-modal-target属性からモーダルIDを取得
  let modalId = clickedButton.getAttribute("data-modal-target");
  // 対応するモーダル要素をIDを使用して取得
  let modal = document.getElementById(modalId);

  // モーダルを表示する関数を呼び出し
  toggleModal(modal, true);
}

// 閉じるボタンをクリックしたときの処理
function onCloseButtonClick(event) {
  // クリックされた要素（閉じるボタン）を取得
  let closeButton = event.currentTarget;
  // クリックされたボタンが属するモーダル要素を取得
  let modal = closeButton.closest(".js-modal");

  // モーダルを非表示にする関数を呼び出し
  toggleModal(modal, false);
}

// すべてのモーダルを開くボタンにイベントリスナーを設定
document.querySelectorAll(".js-modal-trigger").forEach((button) => {
  button.addEventListener("click", onButtonClick);
});

// すべてのモーダルを閉じるボタンにイベントリスナーを設定
document.querySelectorAll(".js-modal-close").forEach((button) => {
  button.addEventListener("click", onCloseButtonClick);
});

// モーダルをクリックしたときの処理
document.querySelectorAll(".js-modal").forEach((modal) => {
  modal.addEventListener("click", (event) => {
    if (event.target === modal) {
      toggleModal(modal, false);
    }
  });
});
