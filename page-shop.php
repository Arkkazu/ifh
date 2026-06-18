<?php
get_header();
?>

<body id="shop" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="shop" class="content_wrapper lower">
        <div class="main_width">
          <div class="main_cont">
            <div class="content_inner">

              <div class="content_section">
                <div class="img_full">
                  <img src="/media/images/" alt="">
                </div>
              </div>

              <div class="content_section">
                <?php get_template_part('inc', 'shop_list'); ?>
              </div>


            </div>
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