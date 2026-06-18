<?php
get_header();
?>

<body id="single-staff" class="home">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="information" class="content_wrapper lower">
        <div class="main_width">
          <div class="main_cont">
            <div class="content_inner">


              <div class="content_section">

                <div class="img">
                  <?php the_post_thumbnail('thumbnail'); ?>
                </div>
                <div class="name__en">
                  <?php the_field('staff_name'); ?>
                </div>
                <div class="name">
                  <h1><?php the_title(); ?></h1>
                </div>
                <div class="rank">
                  <?php the_field('staff_rank'); ?>
                </div>
                <div class="insta-icon">
                  <img src="/wp-content/themes/ifh_theme/assets/media/images/common/Insta_logo.svg" alt="インスタグラム" width="100" height="100">
                </div>
                <div class="c-btn__outer">
                  <a href="" class="c-btn">指名して予約</a>
                </div>



                <div class="single_date-cat">
                  <p class="single_date"><?php echo get_the_date('Y.m.d'); ?></p>
                  <!--<p class="single_cat">Hair</p>-->
                </div>
                <h1 class="single_ttl"><?php echo get_the_title(); ?></h1>
                <div class="single_txt"><?php the_content(); ?></div>
              </div>



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