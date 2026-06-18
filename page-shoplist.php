<?php
get_header();
?>

<body id="shoplist" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="shoplist" class="content_wrapper lower">
        <div class="main_width">
          <div class="main_cont">
            <div class="content_inner">

              <div class="content_section fade">
                <div class="content_title">
                  <h2><span>SHOP LIST</span></h2>
                </div>
              </div>

              <div class="content_section fade">
                <?php get_template_part('inc', 'hairsalon_list'); ?>
              </div>

              <div class="content_section fade">
                <?php get_template_part('inc', 'nailsalon_list'); ?>
              </div>

              <div class="content_section fade">
                <?php get_template_part('inc', 'eyesalon_list'); ?>
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