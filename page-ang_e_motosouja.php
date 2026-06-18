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
                  <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/ang_eye_motosoujya.jpg" alt="" width="1800" height="1198">
                </div>
                <div class="shop_area">
                  <div class="shop_name">
                    Angelique Eye motosouja <span>アンジェリーク・アイ 元総社町店</span>
                  </div>
                  <div class="shop_cate">
                    EYE
                  </div>
                </div>
                <div class="shop_area">
                  <div class="shop_address">群馬県前橋市元総社町1983<a href="https://www.google.co.jp/maps/place/BIANCA/@36.3928957,139.0316347,17z/data=!3m1!4b1!4m5!3m4!1s0x601e8d1bd04f1547:0xd89b22c751d17f64!8m2!3d36.3928957!4d139.0338234?hl=ja" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/mapicon.gif" width="73" height="35"></a></div>
                  <div class="shop_tel">TEL : 027-289-9332</div>
                </div>
                <div class="shop_area">
                  <div class="shop_reception">受付時間</div>
                  <div class="shop_time"><span>＜平日＞ 10:00～19:00</span></div>
                  <div class="shop_time"><span>＜土・日＞9:00～19:00</span></div>
                  <div class="shop_closed">定休日：第2月曜日</div>
                </div>
                <div class="shop_area">
                  <div class="shop_text">《Angelique Eye》が前橋元総社町にOPEN★<br>近代的な極上空間であなただけの「こだわり」を再現してみませんか？<br>技術力に自信アリのスタッフが在籍！Nailと同時施術OK◎<br>働く女性もお子様連れも通いやすいヘアサロン併設のトータルビューティーサロンです♪<br>質とケアにこだわったメニューを多数ご用意してお待ちしております！</div>
                </div>
              </div>

              <div class="content_section">
                <div class="yoyaku_btn">
                  <a href="https://beauty.hotpepper.jp/kr/slnH000434254/" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/webyoyaku.gif" width="307" height="103"></a>
                </div>
              </div>

              <div class="content_section">
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