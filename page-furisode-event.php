<?php
get_header();
?>

<body id="furisode-event" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="covid19" class="content_wrapper lower">

        <div class="main_cont fade">
          <div class="main_width">
            <div class="img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/media/images/furisode-event/furisode-event01.jpg" alt="">
            </div>
            <div class="img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/media/images/furisode-event/furisode-event02.jpg" alt="">
            </div>
            <div class="img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/media/images/furisode-event/furisode-event03.jpg" alt="">
            </div>
            <div class="img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/media/images/furisode-event/furisode-event04.jpg" alt="">
            </div>

          </div>
        </div>

      </div>
      <?php get_template_part('inc', 'page-top'); ?>
    </div><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.matchHeight.js"></script>
  <script>
    $(function() {
      $('.box_area_title_bar').matchHeight();
      $('.box_area_subtitle').matchHeight();
    });
  </script>
  <?php wp_footer(); ?>
</body>

</html>