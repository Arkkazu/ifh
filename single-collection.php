<?php
get_header();
?>

<body id="single-staff" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="information" class="lower">
        <div class="main_width">
          <div class="main_cont">


            <?php get_template_part('inc', 'collection'); ?>
            <?php get_template_part('inc', 'other-collection'); ?>

          </div>
        </div>
      </div>





      <?php get_template_part('inc', 'page-top'); ?>
    </div><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script src="/wp-content/themes/ifh_theme/assets/js/swiper-bundle.min.js"></script>
  <script src="/wp-content/themes/ifh_theme/assets/js/collection.js"></script>
  <script src="/wp-content/themes/ifh_theme/assets/js/other-collection.js"></script>

  <?php wp_footer(); ?>
</body>

</html>