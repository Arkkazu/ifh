<?php
get_header();
?>

<body id="nail_premium" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div class="content_wrapper lower">

        <div class="main_cont">
          <div class="main_width">

            <div class="main_cont_title">
              <h2><span>PREMIUM COURSE DESIGN</span></h2>
            </div>
            <div class="main_cont_title_text">
              <h1><span>プレミアムコース　ネイルギャラリー</span></h1>
            </div>



            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $wp_query = new WP_Query();
            $args = array(/* 配列に複数の引数を追加 */
              'posts_per_page' => -1,
              'post_type' => 'nail_premium',
              'post_status' => 'publish',
              'order' => 'DESC',
              'paged' => $paged,
            );
            $wp_query->query($args);

            if ($wp_query->have_posts()) :
            ?>
              <div class="nail-gallery-list c-mt40">
                <ul>
                  <?php
                  while ($wp_query->have_posts()) : $wp_query->the_post();
                  ?>

                    <li class="autopager">
                      <div class="img"><?php the_post_thumbnail(); ?></div>
                    </li>

                  <?php
                  endwhile;
                  ?>
                </ul>
              </div>
            <?php
            endif;
            ?>
            <?php
            if (function_exists('pagination')) { // 関数が定義されていたらtrueになる
              pagination();
            } ?>

            <div class="more_btn_area c-mt40">
              <a href="/nail/">
                <p><span>Back</span></p>
                <div class="more-arrow-cont">
                  <span class="more-arrow"></span>
                  <span class="more-circle"></span>
                </div>
              </a>
            </div>


          </div>
        </div>

      </div>

      <?php get_template_part('inc', 'page-top'); ?>
    </div><!-- main_area -->
    <?php get_template_part('inc', 'footer'); ?>
  </div><!-- wrapper -->
  <div id="modal"></div>
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script>
    // コース画像モーダル表示イベント
    $(".nail-gallery-list img").click(function() {
      // まず、クリックした画像の HTML(<img>タグ全体)を#frayDisplay内にコピー
      $("#modal").html($(this).prop("outerHTML"));
      //そして、fadeInで表示する。
      $("#modal").fadeIn(200);
      $("html").css("overflow", "hidden");
      return false;
    });

    // コース画像モーダル非表示イベント
    // モーダル画像背景 または 拡大画像そのものをクリックで発火
    $("#modal").click(function() {
      // 非表示にする
      $("#modal").fadeOut(200);
      $("html").css("overflow", "");
      return false;
    });
  </script>
  <?php wp_footer(); ?>
</body>

</html>