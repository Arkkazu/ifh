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
                  <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/iizuka.jpg" alt="" width="1500" height="998">
                </div>
                <div class="shop_area">
                  <div class="shop_name">
                    Ifh iizuka <span>イフ飯塚店</span>
                  </div>
                  <div class="shop_cate">
                    HAIR
                  </div>
                  <div class="shop_cate">
                    NAIL
                  </div>
                  <div class="shop_cate">
                    EYE
                  </div>
                  <div class="shop_cate">
                    SPA
                  </div>
                </div>
                <div class="shop_area">
                  <div class="shop_address">群馬県高崎市飯塚町222-3<a href="https://www.google.com/maps/place/イフ（Ｉｆｈ）ｉｉｚｕｋａ/@36.3455766,138.9976374,17z/data=!3m1!4b1!4m5!3m4!1s0x601e8da76cf68659:0x18228504d4ac790!8m2!3d36.3455766!4d138.9998261?hl=ja" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/mapicon.gif" width="73" height="35"></a></div>
                  <div class="shop_tel">TEL : 027-388-9675</div>
                </div>
                <div class="shop_area">
                  <div class="shop_reception">受付時間</div>
                  <div class="shop_time"><span>＜平日＞10:00～ (カット18:00 / パーマ・カラ―17:00)</span></div>
                  <div class="shop_time"><span>＜土・日＞9:00～ (カット18:00 / パーマ・カラ―17:00)</span></div>
                  <div class="shop_closed">定休日：第2月曜日</div>
                </div>
                <div class="shop_area">
                  <div class="shop_text">美容室Ifh(イフ)飯塚店は、“北高崎駅”近くにあり、<br>ヘアメニューだけでなく、ネイルメニューやアイメニュー(ANGELIQUE by Ifh)なども<br>充実している究極のトータルビューティーサロン(美容室)です。</div>
                </div>
              </div>

              <div class="content_section">
                <div class="yoyaku_btn">
                  <a href="https://beauty.hotpepper.jp/slnH000323208/" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/webyoyaku.gif" width="307" height="103"></a>
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