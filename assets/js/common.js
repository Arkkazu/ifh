// 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
let vh = window.innerHeight * 0.01;
// カスタム変数--vhの値をドキュメントのルートに設定
document.documentElement.style.setProperty("--vh", `${vh}px`);

$(window).on("load resize", function () {
  ww = $(window).width();

  if (ww > 768) {
    let wh = window.innerHeight - 75 - 56;
    $("#main_area").css("min-height", wh);
  } else if (ww > 480) {
    let wh = window.innerHeight - 60 - 40;
    $("#main_area").css("min-height", wh);
  } else {
    let wh = window.innerHeight - 60 - 34;
    $("#main_area").css("min-height", wh);
  }
});
$(window).scroll(function () {
  //120px下にスクロールすると、#headerにclass="scroll"を付ける／戻ると外す
  //120px下にスクロールすると、.page_topにclass="on"を付ける／戻ると外す
  if ($(this).scrollTop() > 120) {
    $("body").addClass("scroll");
    $("#header").addClass("scroll");
    $("#sp_menu").addClass("scroll");
    $("#main_area").addClass("scroll");
    $(".page_top").addClass("on");
  }
  if ($(this).scrollTop() < 121) {
    $("body").removeClass("scroll");
    $("#header").removeClass("scroll");
    $("#sp_menu").removeClass("scroll");
    $("#main_area").removeClass("scroll");
    $(".page_top").removeClass("on");
  }
  //#footerまでスクロールしたら、.page_topにclass="bottom"を付ける／戻ると外す
  scrollHeight = $(document).height();
  scrollPosition = $(window).height() + $(window).scrollTop();
  footHeight = $("#footer").innerHeight();
  if (scrollHeight - scrollPosition <= footHeight) {
    $(".page_top").addClass("bottom");
  } else {
    $(".page_top").removeClass("bottom");
  }
});

function megaMenu() {
  $("#gnavi > ul > li.hover_menu").hover(
    function () {
      $(this).addClass("hover");
      Panel = $(this).children(".mega_menu_outer");
      Panel.each(function () {
        Panel.stop().slideDown("slow");
      });
    },
    function () {
      $(this).removeClass("hover");
      Panel.stop().slideUp("slow");
    },
  );
}
$(function () {
  megaMenu();
  //ページ内アンカーリンク header固定の位置調整
  //スムーズに（class=".non-scroll"は対象外）
  // function pagelink(heightnum) {
  //   var headerHight = heightnum;
  //   $("a[href^='#']" + "a:not(.non-scroll)").on("click", function () {
  //     var href = $(this).attr("href");
  //     var target = $(href == "#" || href == "" ? "html" : href);
  //     var position = target.offset().top - headerHight; //ヘッダの高さ分位置をずらす
  //     $("html, body").animate(
  //       {
  //         scrollTop: position,
  //       },
  //       550,
  //       "swing"
  //     );
  //     return false;
  //   });
  //   /* outpagelink */
  //   var url = $(location).attr("href");
  //   if (url.indexOf("?id=") == -1) {
  //   } else {
  //     var url_sp = url.split("?id=");
  //     var hash = "#" + url_sp[url_sp.length - 1];
  //     var target2 = $(hash);
  //     var position2 = target2.offset().top - headerHight;
  //     $("html, body").animate(
  //       {
  //         scrollTop: position2,
  //       },
  //       500,
  //       "swing"
  //     );
  //   }
  // }
  // pagelink(80); //ヘッダの高さ pxの数値を指定

  //.page_top a をクリックでスムーズにスクロール
  // $(".page_top a").on("click", function () {
  //   $("html,body").animate(
  //     {
  //       scrollTop: $($(this).attr("href")).offset().top,
  //     },
  //     500,
  //     "swing"
  //   );
  //   return false;
  // });

  //#sp_menu_btnをクリックで#sp_menuを開閉
  $("#sp_menu_btn").on("click", function () {
    console.log("aaa");
    $("#sp_menu_btn").toggleClass("active");
    $("#sp_menu").toggleClass("sp_menu_open");
    $("body").toggleClass("sp_menu_open");
  });
  //sp_menu プルダウンメニュー
  $(".acc_menu").on("click", function () {
    $(this).toggleClass("open");
    $(this).children(".menu_panel").slideToggle();
  });
});
$(window).on("load", function () {
  //jquery.inview.js
  /*$(".fade").on("inview", function (e, onInview) {
    if (onInview) {
      $(this).addClass("in");
    }
  });*/

  //telリンク <span class="tel-link">000-0000-0000</span>をSP･TB表示時のみ<a href="tel:00000000000">に置換。
  //画像や電話番号以外の文字列が入っていると使えない
  var ua = navigator.userAgent;
  if ((ua.indexOf("iPhone") > 0 && ua.indexOf("iPod") == -1) || (ua.indexOf("Android") > 0 && ua.indexOf("Mobile") > 0 && ua.indexOf("SC-01C") == -1 && ua.indexOf("A1_07") == -1)) {
    $(".tel-link").each(function () {
      var str = $(this).text();
      $(this).html(
        $("<a>")
          .attr("href", "tel:" + str.replace(/-/g, ""))
          .append(str + "</a>"),
      );
    });
  }
});

//ページトップボタン
$(document).ready(function () {
  $("#pagetop").hide();
  // ↑ページトップボタンを非表示にする

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      // ↑ スクロール位置が100よりも小さい場合に以下の処理をする
      $("#pagetop").fadeIn();
      //      $("#pagetop").slideDown("fast");
      // ↑ (100より小さい時は)ページトップボタンをスライドダウン
    } else {
      $("#pagetop").fadeOut();
      //      $("#pagetop").slideUp("fast");
      // ↑ それ以外の場合の場合はスライドアップする。
    }

    // フッター固定する

    scrollHeight = $(document).height();
    // ドキュメントの高さ
    scrollPosition = $(window).height() + $(window).scrollTop();
    //　ウィンドウの高さ+スクロールした高さ→　現在のトップからの位置
    footHeight = $("footer").innerHeight();
    // フッターの高さ

    if (scrollHeight - scrollPosition <= footHeight - 40) {
      // 現在の下から位置が、フッターの高さの位置にはいったら
      //  "#pagetop"のpositionをabsoluteに変更し、フッターの高さの位置にする

      var w = $(window).width();
      var x = 320;
      if (w >= x) {
        $("#pagetop").css({
          position: "absolute",
          //bottom: footHeight
          right: "0px",
          bottom: "20px",
          // top: "-30px"
        });
      }
    } else {
      // それ以外の場合は元のcssスタイルを指定
      $("#pagetop").css({
        position: "fixed",
        //        top: "0px",
        right: "0px",
        bottom: "60px",
      });
    }

    // フェードインする処理
    const fadeinHeight = 200;
    let wHeight = $(window).height(); //表示エリアの高さ
    let scrollTop = $(window).scrollTop(); //スクロール位置
    $(".fade").each(function () {
      let targetPosition = $(this).offset().top; //フェードインさせたい要素の上位置
      let fadeinPosition = targetPosition - wHeight + fadeinHeight; //フェードインさせたい要素が画面下からfadeinHeight分スクロールした値
      if (scrollTop > fadeinPosition) {
        $(this).addClass("in");
      }
    });
  });

  // トップへスムーススクロール
  // $("#pagetop a").on("click", function () {
  //   $("body,html").animate(
  //     {
  //       scrollTop: 0,
  //     },
  //     500
  //   );
  //   // ページのトップへ 500 のスピードでスクロールする
  //   return false;
  // });
});

//// ページトップへスクロール
document.querySelector("#pagetop a").addEventListener("click", function (e) {
  e.preventDefault();

  const scrollContainer = document.querySelector(".js-scroll-container");
  if (!scrollContainer) return;

  scrollContainer.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
//// end ページトップへスクロール

//375px以下、viewportを変更
window.addEventListener("DOMContentLoaded", () => {
  const e = document.querySelector('meta[name="viewport"]');

  function t() {
    const t = window.outerWidth > 375 ? "width=device-width,minimum-scale=1,initial-scale=0" : "width=375";
    e.getAttribute("content") !== t && e.setAttribute("content", t);
  }
  (addEventListener("resize", t, !1), t());
});

//ページのロードが完了した時にis-loadedを付与
window.addEventListener("load", function () {
  document.documentElement.classList.add("is-loaded");
});
