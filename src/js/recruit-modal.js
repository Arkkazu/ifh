import { html, body } from "./domRefs.js";
import { getScrollbarWidth } from "./domShared.js";

// 共通要素の取得
const modal = document.getElementById("modal_1"); // モーダル要素を取得
const modalContent = document.getElementById("modal-content"); // モーダルのコンテンツ部分を取得
const pagetop = document.getElementById("pagetop");

// モーダルの表示・非表示を切り替える関数
function toggleModal(isVisible, content = "") {
  if (isVisible) {
    // モーダルを表示する場合

    // モーダルのコンテンツを更新
    modalContent.innerHTML = content;
    // モーダルの表示クラスを追加
    modal.style.cssText = "opacity: 1; visibility: visible;";
    // ページのスクロールを無効化
    body.style.overflow = "hidden";

    html.style.paddingRight = `${getScrollbarWidth()}px`;

    pagetop.style.right = `calc(${getScrollbarWidth()}px + 16rem)`;

    if (getScrollbarWidth() > 0) {
      const isWide = window.innerWidth >= 1272;
      const basePadding = isWide ? 32 : 0;

      if (isWide) {
        salonListPosi.style.right = `calc(${getScrollbarWidth()}px + 50rem)`;
      } else {
        salonListPosi.style.right = "auto";
      }
    }
  } else {
    // モーダルを非表示にする場合

    // モーダルの表示クラスを削除
    modal.style.opacity = "0"; // 非表示
    html.style.paddingRight = "";
    body.style.cssText = "overflow: '';";
    pagetop.style.right = "";

    // モーダルを非表示にするアニメーションを適用
    setTimeout(() => {
      modal.style.visibility = "hidden"; // 非表示にする
      modalContent.innerHTML = ""; // ✅ 追加：モーダル内容を完全削除
    }, 300);

    // bodyの右マージンをリセット、bodyのスクロールを有効化
  }
}

// ボタンがクリックされたときの処理
function onButtonClick(event) {
  // クリックされたボタン要素を取得
  const clickedButton = event.currentTarget;
  // ボタンのdata属性から表示対象のテンプレートIDを取得
  const targetId = clickedButton.dataset.modalTarget;

  // 指定されたIDのテンプレート要素を取得
  const templateElement = document.getElementById(targetId);

  if (!templateElement) {
    console.warn(`モーダルテンプレートが見つかりません: ${targetId}`);
    return;
  }

  // テンプレートのHTMLを取得
  const contentHtml = templateElement.innerHTML;

  // モーダルを表示する関数を実行
  toggleModal(true, contentHtml);
}

// 閉じるボタンをクリックしたときの処理
function onCloseButtonClick() {
  // モーダルを非表示にする関数を実行
  toggleModal(false);
}

// モーダルの外側をクリックしたときの処理
function onModalOutsideClick(event) {
  if (event.target === modal) {
    // クリックした対象がモーダルそのものの場合
    // モーダルを非表示にする関数を実行
    toggleModal(false);
  }
}

// モーダルを開くボタンのイベントリスナーを設定
document.querySelectorAll(".js-modal-trigger").forEach((button) => {
  // ボタンクリック時にonButtonClick関数を実行
  button.addEventListener("click", onButtonClick);
});

// モーダルを閉じるボタンのイベントリスナーを設定
document.querySelector(".js-modal-close").addEventListener("click", onCloseButtonClick);

// モーダル外をクリックしたときのイベントリスナーを設定
window.addEventListener("click", onModalOutsideClick);
