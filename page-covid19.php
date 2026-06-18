<?php
get_header();
?>

<body id="recruit" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div class="lower_headimg covid19"></div>
      <div id="covid19" class="content_wrapper lower">

        <div class="main_cont fade">
          <div class="main_width">

            <div class="main_cont_title">
              <h2><span>COVID-19</span></h2>
            </div>
            <div class="main_cont_title_text">
              <h1><span>コロナ対策</span></h1>
            </div>

          </div>
        </div>


        <div class="main_cont fade">
          <div class="main_width">

            <div class="initiatives">
              <div class="title">
                <h2><span>イフの取り組み</span></h2>
              </div>
              <!--<div class="text">
                <p><span>発熱や咳などの症状がある方、体調の優れない方は当店のご予約を延期しただいております。</span></p>
              </div>-->
            </div>

          </div>
        </div>

        <div class="main_cont fade">
          <div class="main_width">

            <div class="staff">
              <div class="title">
                <h3><span>サロンスタッフの感染予防策</span></h3>
              </div>
              <div class="text">
                <ul>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/mask.png" alt="" width="400" height="400">
                    </div>
                    <p>◎マスクの着用</p>
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/thermometer.png" alt="" width="400" height="400">
                    </div>
                    <p>◎毎朝の検温</p>
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/condition.png" alt="" width="400" height="400">
                    </div>
                    <p>◎体調不良スタッフの出勤停止</p>
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/wash.png" alt="" width="400" height="400">
                    </div>
                    <p>◎手洗い、うがい、消毒の徹底</p>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>

        <div class="main_cont fade">
          <div class="main_width">

            <div class="staff">
              <div class="title">
                <h3><span>店内の感染予防策</span></h3>
              </div>
              <div class="text">
                <ul>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/ventilation.png" alt="" width="400" height="400">
                    </div>
                    <p>◎換気を行っております</p>
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/disinfection.png" alt="" width="400" height="400">
                    </div>
                    <p>◎アルコール消毒を完備しております</p>
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/partition.png" alt="" width="400" height="400">
                    </div>
                    <p>◎席の間にカーテンを設置しております</p>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>

        <!--<div class="main_cont fade">
          <div class="main_width">

            <div class="staff">
              <div class="title">
                <h3><span>お客様へのお願い</span></h3>
              </div>
              <div class="text">
                <ul>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/mask.png" alt="" width="400" height="400">
                    </div>◎マスクの着用をお願い致します
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/thermometer.png" alt="" width="400" height="400">
                    </div>◎検温にご協力お願い致します。
                  </li>
                  <li>
                    <div class="img">
                      <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/disinfection.png" alt="" width="400" height="400">
                    </div>
                    ◎手指消毒にご協力お願い致します
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>-->



      </div>







      <?php get_template_part('inc', 'page-top'); ?>
    </div><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script src="/wp-content/themes/ifh_theme/assets/js/jquery.matchHeight.js"></script>
  <script>
    $(function() {
      $('.box_area_title_bar').matchHeight();
      $('.box_area_subtitle').matchHeight();
    });
  </script>
  <?php wp_footer(); ?>
</body>

</html>