<?php
get_header();
?>


<body id="nail" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="nail" class="content_wrapper lower">



        <div class="main_cont fade">
          <div class="main_width">

            <div id="lottie"></div>



          </div>
        </div>

      </div>


      <?php get_template_part('inc', 'page-top'); ?>
    </div><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.6.6/lottie.min.js"></script>
  <!--<script src="/wp-content/themes/ifh_theme/assets/js/lottie.js"></script>-->
  <script>
    var animation = bodymovin.loadAnimation({
      container: document.getElementById('lottie'),
      renderer: 'svg', // 描画形式
      loop: true, // trueにしたらループ。1回再生の場合はfalse
      autoplay: true, // 自動再生
      path: '/asset/json/loki.json', // jsonのパスを指定
      name: "Hello World", // 今後のリファレンスとして名前を指定（オプション）
    });
  </script>
  <?php wp_footer(); ?>
</body>

</html>