<?php
get_header();
?>

<body id="" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div id="shop" class="content_wrapper lower">
        <div class="main_width">
          <div class="main_cont">
            <div class="content_inner">

              <div class="content_section">
                <div class="img_full content_mb">
                  <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/toorimachi.jpg" alt="" width="1500" height="998">
                </div>
                <div class="shop_area">
                  <div class="shop_name">
                    Ifh toorimachi <span>イフ通町店</span>
                  </div>
                  <div class="shop_cate">
                    HAIR
                  </div>
                </div>
                <div class="shop_area">
                  <div class="shop_address">群馬県高崎市通町44 HAJIMEビル2F<a href="https://www.google.com/maps/place/イフ・トオリマチ（Ｉｆｈ・ｔｏｏｒｉｍａｃｈｉ）/@36.323817,139.0073603,17z/data=!3m1!4b1!4m5!3m4!1s0x601e9282e892143f:0x836aa9b224d94f3c!8m2!3d36.323817!4d139.009549?hl=ja" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/mapicon.gif" width="73" height="35"></a></div>
                  <div class="shop_tel">TEL : 027-321-9955</div>
                </div>
                <div class="shop_area">
                  <div class="shop_reception">受付時間</div>
                  <div class="shop_time"><span>＜平日＞10:00～ (カット18:00 / パーマ・カラ―17:00)</span></div>
                  <div class="shop_time"><span>＜土・日＞9:00～ (カット18:00 / パーマ・カラ―17:00)</span></div>
                  <div class="shop_closed">定休日：月曜日</div>
                </div>
                <div class="shop_area">
                  <div class="shop_text">美容室Ifh(イフ)通町店は、高崎駅西口より徒歩3分の場所にある美容室です。</div>
                </div>
              </div>

              <div class="content_section">
                <div class="yoyaku_btn">
                  <a href="https://beauty.hotpepper.jp/slnH000203844/" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/webyoyaku.gif" width="307" height="103"></a>
                </div>
              </div>

              <div class="content_section">
                <?php get_template_part('inc', 'hairsalon_list'); ?>
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