<?php
get_header();
?>

<body class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div class="lower_headimg staff"></div>
      <div class="content_wrapper lower">

        <div class="main_cont fade">
          <div class="main_width">

            <div class="main_title">
              <h1>お探しの記事・ページはございません。</h1>
            </div><!-- main_title -->
            <div class="content_inner">
              <div class="entry_detail" style="padding: 2em 0 20em; text-align: center;">
                <p>お探しの記事・ページはございません。</p>
                <a href="/" title="TOPに戻る">TOPに戻る</a>
              </div>
            </div><!-- content_inner -->

          </div>
        </div>

        <div class="main_cont">
          <div class="main_width">



          </div>
        </div>

      </div>

      <?php get_template_part('inc', 'page-top'); ?>
    </div><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>


  <?php wp_footer(); ?>
</body>

</html>