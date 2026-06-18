// function getScrollbarWidth() {
//   // 垂直方向のスクロールバーが表示されているかをチェック
//   const isVerticalScrollbarVisible = document.documentElement.scrollHeight > document.documentElement.clientHeight;

//   // スクロールバーが表示されていない場合、幅は0とする
//   if (!isVerticalScrollbarVisible) {
//     return 0;
//   }

//   // スクロールバーの幅を計算する関数を定義
//   const outer = document.createElement("div"); // 新しいdiv要素（外側のコンテナ）を作成
//   const inner = document.createElement("div"); // 新しいdiv要素（内側のコンテナ）を作成

//   outer.style.visibility = "hidden"; // 外側のコンテナを画面上に表示しないように設定
//   outer.style.overflow = "scroll"; // 外側のコンテナにスクロールバーを強制的に表示させる
//   outer.appendChild(inner); // 内側のコンテナを外側のコンテナに追加

//   document.body.appendChild(outer); // 外側のコンテナをドキュメントのbodyに追加
//   const scrollbarWidth = outer.offsetWidth - inner.offsetWidth; // 外側のコンテナと内側のコンテナの幅の差を計算してスクロールバーの幅を得る
//   console.log(scrollbarWidth);
//   document.body.removeChild(outer); // 外側のコンテナをドキュメントのbodyから削除

//   return scrollbarWidth; // 計算されたスクロールバーの幅を返す
// }
function getScrollbarWidth() {
  const div = document.createElement("div");
  div.style.overflow = "scroll";
  document.body.appendChild(div);
  const scrollbarWidth = div.offsetWidth - div.clientWidth;
  div.remove();
  return scrollbarWidth;
}

// 使用例
console.log("スクロールバー幅：" + getScrollbarWidth()); // ドキュメント全体のスクロールバー幅を計算
