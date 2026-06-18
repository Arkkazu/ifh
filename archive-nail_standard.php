<?php
get_header();
?>

<body id="nail_standard" class="lower">
  <div id="wrapper">

    <?php get_template_part('inc', 'header'); ?>


    <div id="main_area" role="main">

      <div class="content_wrapper lower">

        <div class="main_cont">
          <div class="main_width">

            <div class="main_cont_title">
              <h2><span>STANDARD COURSE DESIGN</span></h2>
            </div>
            <div class="main_cont_title_text">
              <h1><span>スタンダードコース　ネイルギャラリー</span></h1>
            </div>



            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $wp_query = new WP_Query();
            $args = array(/* 配列に複数の引数を追加 */
              'posts_per_page' => isset($_COOKIE['posts_per_page']) ? intval($_COOKIE['posts_per_page']) : 9,
              'post_type' => 'nail_standard',
              'post_status' => 'publish',
              'order' => 'ASC',
              'paged' => $paged,
            );
            $wp_query->query($args);

            if ($wp_query->have_posts()) :
            ?>
              <div class="mt-40">
                <ul class="grid grid-cols-3 gap-20">
                  <?php
                  $count = 1; //初期化
                  while ($wp_query->have_posts()) : $wp_query->the_post();
                    $modalId = "modal_" . $count;
                  ?>
                    <li class="">
                      <button class="js-modal-trigger relative block w-full h-full group" data-modal-target="<?php echo $modalId; ?>">
                        <img class="w-full h-full object-cover" src="<?php the_post_thumbnail_url('full'); ?>">
                        <?php if ($nail_light_img = get_field('nail_light_img')) : ?>
                          <img class="absolute inset-0 w-full h-full object-cover opacity-0 group-hover:opacity-100 duration-500" src="<?= esc_url($nail_light_img['url']); ?>" alt="<?= esc_attr($nail_light_img['alt']); ?>" width="<?= esc_attr($nail_light_img['width']); ?>" height="<?= esc_attr($nail_light_img['height']); ?>">
                        <?php else : ?>
                          <img class="absolute inset-0 w-full h-full object-cover opacity-0 group-hover:opacity-100 duration-500" src="/wp-content/themes/ifh_theme/assets/media/images/common/now-printing.jpg" alt="画像未設定" width="1000" height="800">
                        <?php endif; ?>

                      </button>
                    </li>

                  <?php
                    $count++;
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

            <?php
            $count = 1; //初期化
            while ($wp_query->have_posts()) :
              $wp_query->the_post();
              $modalId = "modal_" . $count;
            ?>
              <div id="<?php echo $modalId; ?>" class="js-modal opacity-0 invisible fixed -z-10 left-0 top-0 w-full h-full overflow-auto bg-black bg-opacity-40 transition-opacity duration-300">
                <!-- <div id="modal_01" class="fixed z-200 left-0 top-0 w-full h-full overflow-auto bg-black bg-opacity-40 transition-opacity duration-300 js-modal"> -->
                <div class="js-modal-cont-wrap absolute top-1/2 left-[calc(50%+(100vw-100%)/2)] transform -translate-x-1/2 -translate-y-1/2 max-w-[90%] pc:max-w-600 w-full pc:w-calc-30">

                  <div class="js-modal-cont relative border border-black bg-beige py-80 pc:py-120 px-24 pc:px-80 max-h-800">
                    <div class="absolute top-16 right-16 text-40 leading-none hover:cursor-pointer js-modal-close">×</div>
                    <div class="absolute top-80">
                      <p class="text-18 leading-none font-josefin">Light course design</p>
                    </div>
                    <!-- ここにモーダルの内容が入ります -->
                    <!-- <img class="w-full h-full object-cover" src="<?php the_post_thumbnail_url('full'); ?>"> -->
                    <div class="splide splide-modal">
                      <div class="splide__track">
                        <ul class="splide__list">
                          <li class="splide__slide">
                            <img class="" src="<?php the_post_thumbnail_url('full'); ?>">
                          </li>
                          <li class="splide__slide">
                            <?php if ($nail_light_img = get_field('nail_light_img')) : ?>
                              <img class="w-full h-full object-cover" src="<?= esc_url($nail_light_img['url']); ?>" alt="<?= esc_attr($nail_light_img['alt']); ?>" width="<?= esc_attr($nail_light_img['width']); ?>" height="<?= esc_attr($nail_light_img['height']); ?>">
                            <?php else : ?>
                              <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/common/now-printing.jpg" alt="" width="1000" height="800">
                            <?php endif; ?>
                          </li>
                        </ul>
                      </div>
                      <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev">
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                        </button>
                      </div>
                    </div>

                  </div>

                </div>

              </div>
            <?php
              $count++;
            endwhile;
            ?>

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

  <?php wp_footer(); ?>
</body>

</html>