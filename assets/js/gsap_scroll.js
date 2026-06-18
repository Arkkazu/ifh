// アニメーションを実行する関数
let forteAnimation;

function runAnimation() {
  const forte = document.querySelector(".forte-cont");

  // すでにアニメーションが設定されている場合、それを削除
  if (forteAnimation) {
    forteAnimation.scrollTrigger.kill();
    forteAnimation.kill();
    forteAnimation = null;
    gsap.set(forte, { clearProps: "all" });
  }

  // ブレークポイント以上ならアニメーションを設定、それ以外なら何もしない
  if (window.innerWidth >= 768) {
    forteAnimation = gsap.to(forte, {
      x: -400 - (1920 - document.body.clientWidth),
      scrollTrigger: {
        trigger: ".forte-scroll",
        start: "top top",
        end: `+=${forte.clientWidth}`,
        scrub: true,
        pin: true,
        markers: false,
      },
    });
  }
}

// 初回ロード時のアニメーション
runAnimation();

// ウィンドウのリサイズ時にもチェック
window.addEventListener("resize", function () {
  ScrollTrigger.refresh();
  runAnimation();
});
