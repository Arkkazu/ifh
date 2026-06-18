<?php
get_header();
?>

<body id="staff" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <main id="main_area">

      <div id="staff" class="lower">

        <div class="main_cont fade">

          <?php get_template_part('inc', 'collection'); ?>
          <?php get_template_part('inc', 'other-collection'); ?>

        </div>

      </div>

      <?php get_template_part('inc', 'page-top'); ?>
    </main><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>

  <!--  <script src="/wp-content/themes/ifh_theme/assets/js/swiper-bundle.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="/wp-content/themes/ifh_theme/assets/js/collection.js"></script>
  <script src="/wp-content/themes/ifh_theme/assets/js/other-collection.js"></script>


  <?php wp_footer(); ?>
</body>

</html>