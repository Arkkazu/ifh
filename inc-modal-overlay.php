<div class="js-modal-overlay hidden opacity-0 transition-opacity duration-300 fixed inset-0 bg-[rgba(0,0,0,0.5)] z-900">
</div>
<button class="js-modal-close fixed top-16 right-16 duration-500 hoverable:hover:opacity-70 cursor-pointer z-1000" type="button">
  <span class="block mt-[-0.1em] text-white text-80 leading-none">
    ×
  </span>
</button>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const trigger = document.querySelector(".js-modal-trigger");
    const overlay = document.querySelector(".js-modal-overlay");
    const modal = document.querySelector(".js-modal");
    const close = document.querySelector(".js-modal-close");

    if (!trigger || !overlay || !modal) return;

    // フェードイン
    trigger.addEventListener("click", function() {
      [overlay, modal].forEach(function(el) {
        el.classList.remove("hidden");
      });

      requestAnimationFrame(function() {
        [overlay, modal].forEach(function(el) {
          el.classList.remove("opacity-0");
          el.classList.add("opacity-100");
        });
      });
    });

    // フェードアウト
    function handleClose() {
      [overlay, modal].forEach(function(el) {
        el.classList.remove("opacity-100");
        el.classList.add("opacity-0");
      });

      setTimeout(function() {
        [overlay, modal].forEach(function(el) {
          el.classList.add("hidden");
        });
      }, 300);
    }

    // overlay クリックで閉じる
    overlay.addEventListener("click", function(event) {
      // 背景（overlay）そのものをクリックしたときのみ閉じる
      if (event.target === overlay) {
        handleClose();
      }
    });

    // close ボタンでも閉じる
    if (close) {
      close.addEventListener("click", handleClose);
    }

  });
</script>