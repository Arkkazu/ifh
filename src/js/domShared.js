import { html } from "./domRefs.js";

//// 幅だけの変化
export function onWidthChange(target, callback) {
  let prevWidth = Math.round(target.getBoundingClientRect().width);

  const observer = new ResizeObserver((entries) => {
    const entry = entries[0];
    if (!entry) return;

    const curr = Math.round(entry.contentRect.width);

    if (curr !== prevWidth) {
      prevWidth = curr;
      callback(curr);
    }
  });

  observer.observe(target);
}
//// 幅だけの変化 end

//// スクロールバー幅の値を保持する変数（モジュール内部）
let currentScrollbarWidth = window.innerWidth - Math.round(html.getBoundingClientRect().width);

/**
 * スクロールバー幅の取得関数
 * @returns {number}
 */
export function getScrollbarWidth() {
  return currentScrollbarWidth;
}

// 監視して値を更新
onWidthChange(html, () => {
  requestAnimationFrame(() => {
    currentScrollbarWidth = window.innerWidth - Math.round(html.getBoundingClientRect().width);
  });
});
