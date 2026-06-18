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
                  <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/gumigumi.jpg" alt="" width="1500" height="998">
                </div>
                <div class="shop_area">
                  <div class="shop_name">
                    GumiGumi by Ifh <span>グミグミ バイ イフ</span>
                  </div>
                  <div class="shop_cate">
                    HAIR
                  </div>
                </div>
                <div class="shop_area">
                  <div class="shop_address">群馬県高崎市棟高町971-3<a href="https://www.google.co.jp/maps/search/群馬県高崎市棟高町９７１%E2%88%92３+ｃｏｓｍｏｓｈａｉｒｐｒｏｊｅｃｔ/@36.3968954,138.9993474,17z/data=!3m1!4b1?hl=ja" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/mapicon.gif" width="73" height="35"></a></div>
                  <div class="shop_tel">TEL : 027-372-0304</div>
                </div>
                <div class="shop_area">
                  <div class="shop_reception">受付時間</div>
                  <div class="shop_time"><span>9:00～(カット18:00 / パーマ⋅カラ―17:00 / まつ毛パーマ17:00)</span></div>
                  <div class="shop_closed">定休日：毎週月曜日、第1・第3日曜日</div>
                </div>
                <div class="shop_area">
                  <div class="shop_text">美容室Gumi Gumi by Ifh(グミグミ バイ イフ) は高崎イオン近くにあり、ヘアメニューだけでなく、<br>エステメニューなども行うことのできるトータルビューティーサロン(美容室)です。</div>
                </div>
              </div>

              <div class="content_section">
                <div class="yoyaku_btn">
                  <a href="https://beauty.hotpepper.jp/slnH000368870/" target="_blank"><img src="/wp-content/themes/ifh_theme/assets/media/images/lower/webyoyaku.gif" width="307" height="103"></a>
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