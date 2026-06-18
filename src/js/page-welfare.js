// scrollbar-size-getter.jsを読み込ませる

// 共通要素（bodyとheader）の取得
let html = document.querySelector("html");
let header = document.querySelector("header");

// スクロールバーの幅を取得
let scrollbarWidth = getScrollbarWidth();

// リサイズ前の画面幅を保持
let oldWidth = window.innerWidth;

// 画面幅がリサイズされた場合の処理を定義
window.onresize = function () {
  // 画面幅が変更されたかをチェック
  if (window.innerWidth !== oldWidth) {
    oldWidth = window.innerWidth;
    // 新しいスクロールバーの幅を取得
    scrollbarWidth = getScrollbarWidth();
  }
};

// モーダルの表示・非表示を切り替える共通関数
function toggleModal(modalElement, isVisible) {
  // モーダルを表示する場合
  if (isVisible) {
    // モーダル要素にクラスを追加して表示
    // modalElement.classList.add('is-visible');
    modalElement.classList.remove("opacity-0", "invisible");
    modalElement.classList.add("opacity-100", "visible");
    // bodyにクラスを追加
    document.body.classList.add("is-modal-opened");
    // スクロールバーの幅を取得
    const scrollbarWidth = getScrollbarWidth();

    // スクロールバーの幅が0ではない場合（スクロールバーが存在する場合）
    if (scrollbarWidth !== 0) {
      // htmlとheaderにマージンとパディングを設定してスクロールバーの幅を補償
      html.style.marginRight = scrollbarWidth + "px";
      header.style.paddingRight = scrollbarWidth + "px";
      html.style.overflow = "hidden"; // 本文のスクロールを無効化
    }
  } else {
    // モーダルを非表示にする場合
    // モーダル要素からクラスを削除
    // modalElement.classList.remove('is-visible');
    modalElement.classList.remove("opacity-100", "visible");
    modalElement.classList.add("opacity-0");
    setTimeout(() => {
      modalElement.classList.add("invisible");
    }, 300); // 300msの遅延は、opacityトランジションの持続時間と一致させる

    // bodyからクラスを削除
    document.body.classList.remove("is-modal-opened");
    // bodyとheaderのスタイルをリセット
    html.style.marginRight = "";
    header.style.paddingRight = "";
    // bodyのスクロールを有効化
    html.style.overflow = ""; // 本文のスクロールを元に戻す

    // モーダル内のdiv要素のスタイルをリセット
    if (scrollbarWidth !== 0) {
      modalElement.querySelector("div").style.left = "calc(50% + " + scrollbarWidth / 2 + "px)";
    }
    setTimeout(function () {
      modalElement.querySelector("div").style.top = "";
      modalElement.querySelector("div").style.paddingBottom = "";
      modalElement.querySelector("div").style.left = "";
      modalElement.querySelector("div").style.transform = "";
    }, 500);
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

  // モーダル内の要素の高さに応じてスタイルを調整
  let modalContent = modal.querySelector("div");
  // モーダルのコンテンツの高さがモーダルの高さより小さい場合
  if (modalContent.offsetHeight < modal.offsetHeight) {
    // モーダルのコンテンツを中央に配置
    modalContent.style.top = "50%";
    modalContent.style.transform = "translate(-50%,-50%)";
  } else {
    // モーダルのコンテンツを上部に配置
    modalContent.style.top = "30px";
    modalContent.style.paddingBottom = "30px";
    // modalContent.style.transform = "translateX(-50%)";
  }
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

let modal = document.querySelector(".js-modal");

modal.addEventListener("click", (event) => {
  if (event.target.closest(".js-modal-cont") === null) {
    // alert('外側をクリックされました。');
    toggleModal(modal, false);
  }
});

///////////////////////////////////////////////
// JavaScriptでの動的コンテンツの挿入
const salonCard = (number, title, description, sns) => `
<div class="bg-[#EDE8E1] mix-blend-multiply py-40 px-30">
  <span class="font-playfair-display font-medium italic text-38 leading-none -tracking-5">${number}.</span>
  <h3 class="mt-8 text-16 leading-26 font-medium">${title}</h3>
  <p class="mt-16 text-13 leading-23">${description}</p>
  ${
    sns
      ? `<div class="mt-24 flex justify-center gap-x-40">
     <div>
       <a class="border border-black w-100 aspect-square flex justify-center items-center" href="https://line.me/R/ti/p/@602zauhc" target='_blank'>
         <img class="w-52" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg-line.svg" alt="line" width="52" height="52">
       </a>
       <p class="text-center">公式LINE</p>
     </div>
     <div>
       <a class="border border-black w-100 aspect-square flex justify-center items-center" href="https://www.instagram.com/ifh_group/" target='_blank'>
         <img class="w-52" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg-insta.svg" alt="instagram" width="40" height="40">
       </a>
       <p class="text-center">Instagram</p>
     </div>
   </div>`
      : ""
  }
</div>
`;
const salonCardPc = (number, title, description, sns) => `
<div class="bg-[#EDE8E1] mix-blend-multiply py-40 px-30 flex gap-x-24">
  <span class="font-playfair-display font-medium italic text-38 leading-none -tracking-5">${number}.</span>
  <div class="flex-1">
    <h3 class="mt-8 text-16 leading-26 font-medium">${title}</h3>
    <p class="mt-16 text-13 leading-23">${description}</p>
  </div>
  ${
    sns
      ? `<div class="mt-24 flex justify-center gap-x-40">
     <div>
       <a class="border border-black w-100 aspect-square flex justify-center items-center" href="https://line.me/R/ti/p/@602zauhc" target='_blank'>
         <img class="w-52" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg-line.svg" alt="line" width="52" height="52">
       </a>
       <p class="text-center">公式LINE</p>
     </div>
     <div>
       <a class="border border-black w-100 aspect-square flex justify-center items-center" href="https://www.instagram.com/ifh_group/" target='_blank'>
         <img class="w-52" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg-insta.svg" alt="instagram" width="40" height="40">
       </a>
       <p class="text-center">Instagram</p>
     </div>
   </div>`
      : ""
  }
</div>
`;

const cards = [
  {
    id: "01",
    title: "まずは興味のあるサロンを見学",
    description: "サロン見学希望を公式LINEかInstagramDMのいずれかよりお送りください。お電話でのお申し込みも受け付けております。<br><span class='font-medium'>遠距離で見学が難しい方はzoomでのサロン見学も歓迎！</span>",
    sns: true,
  },
  {
    id: "02",
    title: "応募・面接日をスケジュール",
    description: "サロン見学もしくは会社説明後、応募の希望をお聞かせください。ご希望の方には面接日をあらためて採用担当よりご連絡差し上げます。",
    sns: false,
  },
  {
    id: "03",
    title: "面接",
    description: "面接は本社にて採用担当との一次面接の後、一次面接合格の場合は別日に二次面接を行います。<br>※応募多数の場合、各セクション担当との面接が追加される場合がございます。",
    sns: false,
  },
  {
    id: "04",
    title: "合否のお知らせ",
    description: "最終面接後、１週間以内に合否をお知らせいたします。<br>※応募多数の場合、選考期間が伸びる可能性もございます。",
    sns: false,
  },
];

cards.forEach((card) => {
  document.getElementById(`welfareModalCont${card.id}`).innerHTML = salonCard(card.id, card.title, card.description, card.sns);
  document.getElementById(`welfareModalContPc${card.id}`).innerHTML = salonCardPc(card.id, card.title, card.description, card.sns);
});
////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
  const sliders = document.querySelectorAll(".splide-welfare");

  sliders.forEach(function (slider) {
    let splideInstance = null;

    function updateSplide() {
      const shouldEnable = window.innerWidth <= 767;

      if (shouldEnable && !splideInstance) {
        splideInstance = new Splide(slider, {
          type: "loop",
          perPage: 1,
          gap: "1rem",
          pagination: false,
          pauseOnHover: true,
        });
        splideInstance.mount();
      } else if (!shouldEnable && splideInstance) {
        splideInstance.destroy("completely");
        splideInstance = null;
      }
    }

    updateSplide();
    window.addEventListener("resize", updateSplide);
  });
});
/////////////////////////////////////
const swiperCustom = new Swiper(".swiperCustom", {
  loop: true,
  // 前後の矢印
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
////////////////////////////
////高さを揃える
function adjustHeight() {
  // セレクタにマッチするすべての要素を取得
  const elements = document.querySelectorAll(".js-match-height");

  // 同じ行にある要素をグループ化するためのオブジェクト
  const rows = {};

  // 各要素の高さを初期化（再計算のため）
  elements.forEach((el) => {
    el.style.height = "auto";
  });

  // 各要素に対して処理
  elements.forEach((el) => {
    const offsetTop = el.offsetTop;

    // コンソールにoffsetTopを出力
    console.log(offsetTop);

    // offsetTopをキーとして、同じ行にある要素をグループ化
    if (rows[offsetTop]) {
      rows[offsetTop].push(el);
    } else {
      rows[offsetTop] = [el];
    }
  });

  // 各行の要素に対して処理
  Object.values(rows).forEach((group) => {
    // グループに複数の要素がある場合のみ処理
    if (group.length > 1) {
      // グループ内で最大の高さを見つける
      const maxHeight = Math.max(...group.map((el) => el.offsetHeight));

      // 同じグループ内のすべての要素に最大高さを適用
      group.forEach((el) => {
        el.style.height = `${maxHeight}px`;
      });
    } else {
      // グループに要素が1つしかない場合は、heightを設定しない
      group[0].style.height = ""; // heightスタイルを削除
    }
  });
}
////高さを揃えるend

////////////////////////////////////////////////////////

// 初期ウィンドウ幅の取得
let lastWidth = window.innerWidth;

// ページ読み込み時およびウィンドウ幅変更時に動作させる関数
function onWidthChange() {
  // ここにページ読み込み時およびウィンドウ幅変更時に実行したいコードを書く
  console.log("ウィンドウ幅が変わりました");
  adjustHeight();
}

// DOMが読み込まれたらonWidthChange関数を実行
document.addEventListener("DOMContentLoaded", onWidthChange);

// 画面幅がリサイズされたらonWidthChange関数を実行
window.addEventListener("resize", function () {
  // 幅が変わったときだけ関数を実行する
  if (window.innerWidth !== lastWidth) {
    onWidthChange();
    // 最新の幅を保存する
    lastWidth = window.innerWidth;
  }
});
