<?php
/* Template Name: トップページ */
get_header();
?>

<body id="home" class="home">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>

    <main>

      <section>
        <div id="box"><span>innerHeight</span></div>
      </section>


      <?php get_template_part('inc', 'page-top'); ?>
    </main><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script src="/wp-content/themes/ifh_theme/assets/js/slick.min.js"></script>
  <script>
    $(window).on('load resize', function() {
      var w_width;
      w_width = $(window).width();
      if (w_width > 768) {
        w_height = $(window).height() - 54;
      } else {
        w_height = $(window).height() - 36;
      }
      $('main').css('min-height', w_height + 'px');
      $('#box').html(w_height);
    });



    //ファーストビューSP時の画面FIXjs(アドレスバーを考慮)
    /*var w_width;
    var w_height;
    var old_width;

    $(window).on('load resize', function() {
      w_width = $(window).width();
      if (w_width < 769) {
        if (old_width != w_width) {
          w_height = $(window).height();
          $('#first_view').height(w_height);
          old_width = w_width;
        }
      } else {
        $('#first_view').css({
          'height': "100vh"
        });
      }
    });*/
  </script>


  <?php wp_footer(); ?>
</body>

</html>