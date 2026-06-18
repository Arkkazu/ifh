<?php
get_header();
?>

<body>
  <div id="wrapper">

    <header class="bg-red-500">ヘッダー</header>
    <button class="bg-black text-white js-modal-trigger" data-modal-html="<strong>モーダル1</strong>の詳細コンテンツ">モーダル1オープン</button>
    <button class="bg-black text-white js-modal-trigger" data-modal-html="<em>モーダル2</em>の詳細コンテンツ">モーダル2オープン</button>

    <div id="modal" class="opacity-0 invisible fixed z-200 left-0 top-0 w-full h-full overflow-auto bg-black bg-opacity-40 transition-opacity duration-300 js-modal">
      <div class="absolute top-1/2 left-[calc(50%_+_(100vw_-_100%)_/_2)] transform -translate-x-1/2 -translate-y-1/2 max-w-500 w-1/2">
        <div class="relative border border-black bg-white p-70">
          <div class="absolute top-16 right-16 text-40 leading-none hover:cursor-pointer js-modal-close">×</div>
          <div id="modal-content"><!-- モーダルの内容がここに動的に挿入されます --></div>
        </div>
      </div>
    </div>


    <div class="h-1000"></div>





  </div><!-- wrapper -->
  <script>
    function getScrollbarWidth() {
      // ページにスクロールバーがあるかを確認
      const hasScrollbar = document.body.scrollHeight > window.innerHeight;

      // 一時的なdiv要素を作成
      const div = document.createElement("div");
      // スクロールバーを強制的に表示する
      div.style.overflow = "scroll";
      // divをbodyに追加
      document.body.appendChild(div);

      // スクロールバーの幅を計算
      const scrollbarWidth = div.offsetWidth - div.clientWidth;

      // 計算用のdivを削除
      div.remove();

      // スクロールバーがない場合の処理
      if (!hasScrollbar) {
        console.log("ページにスクロールバーはありません。");
        return 0; // スクロールバーの幅として0を返す
      } else {
        // スクロールバーの幅をコンソールに出力
        console.log("スクロール幅：", scrollbarWidth);
      }

      // スクロールバーの幅を返す
      return scrollbarWidth;
    }

    // 共通要素の取得
    const body = document.querySelector("body"); // bodyタグを取得
    const header = document.querySelector("header"); // header要素を取得
    const modal = document.getElementById("modal"); // モーダル要素を取得
    const modalContent = document.getElementById("modal-content"); // モーダルのコンテンツ部分を取得

    // モーダルの表示・非表示を切り替える関数
    function toggleModal(isVisible, content = "") {
      // スクロールバーの幅を取得
      const scrollbarWidth = getScrollbarWidth();

      if (isVisible) { // モーダルを表示する場合
        // モーダルのコンテンツを更新
        modalContent.innerHTML = content;
        // モーダルの表示クラスを追加
        modal.style.cssText = "opacity: 1; visibility: visible;";
        // ページのスクロールを無効化
        document.body.style.overflow = "hidden";

        if (scrollbarWidth !== 0) { // スクロールバーが存在する場合
          // bodyの右マージンをスクロールバー幅分追加
          body.style.marginRight = `${scrollbarWidth}px`;
          // headerの右パディングをスクロールバー幅分追加
          header.style.paddingRight = `${scrollbarWidth}px`;
        }
      } else { // モーダルを非表示にする場合

        // モーダルの表示クラスを削除
        modal.style.opacity = "0"; // 非表示
        // モーダルを非表示にするアニメーションを適用
        setTimeout(() => {
          modal.style.visibility = "hidden"; // 非表示にする
        }, 300);


        // bodyの右マージンをリセット、bodyのスクロールを有効化
        body.style.cssText = "margin-right: ''; overflow: '';";
        // headerの右パディングをリセット
        header.style.paddingRight = "";
      }
    }

    // ボタンがクリックされたときの処理
    function onButtonClick(event) {
      // クリックされたボタン要素を取得
      const clickedButton = event.currentTarget;
      // ボタンのdata属性からモーダルに表示するHTMLを取得
      const contentHtml = clickedButton.dataset.modalHtml || "";
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
      if (event.target === modal) { // クリックした対象がモーダルそのものの場合
        // モーダルを非表示にする関数を実行
        toggleModal(false);
      }
    }

    // モーダルを開くボタンのイベントリスナーを設定
    document.querySelectorAll(".js-modal-trigger").forEach(button => {
      // ボタンクリック時にonButtonClick関数を実行
      button.addEventListener("click", onButtonClick);
    });

    // モーダルを閉じるボタンのイベントリスナーを設定
    document.querySelector(".js-modal-close").addEventListener("click", onCloseButtonClick);

    // モーダル外をクリックしたときのイベントリスナーを設定
    window.addEventListener("click", onModalOutsideClick);
  </script>

  <?php wp_footer(); ?>
</body>

</html>