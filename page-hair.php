<?php
get_header();
?>

<body <?php body_class('relative h-full flex flex-col overflow-hidden'); ?>>
  <?php get_template_part('inc', 'header'); ?>

  <div class="js-scroll-container mt-60 pc:mt-90 flex-1 overflow-x-hidden flex flex-col justify-between">
    <main class="pb-80 pc:pb-160">

      <!-- <div class="lower-kv --hair">
        <span class="lower-kv__ttl">Ifh × BIANCA</span>
      </div> -->
      <div class="h-[calc(100dvh-60rem)] pc:h-[calc(100dvh-90rem)] overflow-hidden">
        <picture>
          <source media="(min-width: 1272px)" srcset="/wp-content/themes/ifh_theme/media/images/hair/hair_top_pc.webp">
          <img class="w-full h-full object-contain" src="/wp-content/themes/ifh_theme/media/images/hair/hair_top_sp.webp" alt="" loading="lazy" width="1080" height="1920">
        </picture>
      </div>
      <div id="hair" class="lower">


        <div class="main_cont fade">

          <section class="c-sec">
            <div class="c-width --sub">

              <div class="flex justify-center">
                <h2 class="c-section-title">
                  Hair concept
                </h2>
              </div>

              <div class="hair_concept u-mt80">
                <div class="subtitle_hair txt-c">
                  <p>美容室としてのこだわり</p>
                </div>
                <div class="text_hair txt-c u-mt80">
                  <p>朝目覚めて、鏡に写った自分が<br>
                    キラキラ輝けた日は、<br>
                    きっと色んな事が楽しめる。<br>
                    いつもより一歩先に進める。<br>
                    何よりワクワクする1日。<br><br>
                    Ifhに来店された次の日も、その次も<br>
                    日常のお客様のキラキラを大切にする事。<br><br>
                    テーマは毎日、いつだってI feel happiness</p>
                </div>
              </div>

              <div class="c-mt-160 flex justify-center">
                <h2 class="c-section-title">
                  News
                </h2>
              </div>

              <p class="c-mt-80 text-center leading-[1.8]">
                メンズサロン「zetton」<br>
                レディースプライベートサロン「flanella」<br>
                2026年 2店舗同時 OPEN予定
              </p>

              <?php
              // get_field()関数を使用してフィールドの値（ここでは動画のURL）を取得
              $video_url_pc = get_field('hair-video-pc');
              $video_url_sp = get_field('hair-video-sp');
              $video_url_thumb = get_field('hair-video-thumb');
              if ($video_url_pc && $video_url_sp && $video_url_thumb) : // 動画のURLが存在する場合
              ?>
                <!-- <div class="p-hair-video-wrap is-stopped u-mt150">

                  <video class="p-hair-video" playsinline loop poster="<?php echo esc_url($video_url_thumb['url']); ?>">
                    <source src="<?php echo esc_url($video_url_pc['url']); ?>" type="video/mp4" media="(min-width: 768px)">
                    <source src="<?php echo esc_url($video_url_sp['url']); ?>" type="video/mp4" media="(max-width: 767px)">
                  </video>


                  <button class="p-hair-video__btn"></button>
              </div> -->
              <?php
              endif;
              ?>



            </div>
          </section>

          <section class="c-sec">
            <div class="c-width">

              <div class="main_cont_title">
                <h2><span>Collection</span></h2>
              </div>
              <div class="detail__img swiper-test__wrap">

                <div class="swiper swiper-test">
                  <div class="swiper-wrapper">
                    <!--必須コード-->

                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $custom_query = new WP_Query(array(
                      'posts_per_page' => 1, //投稿数を指定
                      'post_type' => 'collection', //投稿タイプを指定
                      'post_status' => 'publish',
                      'order' => 'DESC',
                    ));
                    if ($custom_query->have_posts()) :
                      while ($custom_query->have_posts()) :
                        $custom_query->the_post();
                    ?>
                        <?php while (have_rows('collection__repeat')) :
                          the_row();
                          $collection__img_url = get_sub_field('collection__img')['url'];
                          $collection__img_width = get_sub_field('collection__img')['width'];
                          $collection__img_height = get_sub_field('collection__img')['height'];
                        ?>
                          <div class="swiper-slide">
                            <!--必須コード-->
                            <div class="swiper-test__img--outer">
                              <picture><img class="swiper-test__img" src="<?php echo $collection__img_url; ?>" alt="" width="<?php echo $collection__img_width; ?>" height="<?php echo $collection__img_height; ?>"></picture>
                            </div>
                          </div>
                    <?php endwhile;
                      endwhile;
                    endif; ?>

                  </div><!-- .swiper-wrapper -->
                  <!-- <div class="swiper-button-prev swiper-test__prev-btn"></div>
                  <div class="swiper-button-next swiper-test__next-btn"></div> -->
                </div><!-- .swiper-test -->

                <!--サムネイル-->
                <div class="swiper swiper-test-thumbnail">
                  <div class="swiper-wrapper">
                    <!--必須コード-->

                    <?php while (have_rows('collection__repeat')) {
                      the_row();
                      $collection__img_url = get_sub_field('collection__img')['url'];
                      $collection__img_width = get_sub_field('collection__img')['width'];
                      $collection__img_height = get_sub_field('collection__img')['height'];
                    ?>
                      <div class="swiper-slide">
                        <!--必須コード-->
                        <div class="swiper-test-thumbnail__img">
                          <picture><img class="swiper-test-thumbnail__img--body" src="<?php echo $collection__img_url; ?>" alt="" width="<?php echo $collection__img_width; ?>" height="<?php echo $collection__img_height; ?>"></picture>
                        </div>
                      </div>
                    <?php } ?>

                  </div>
                </div>
                <div class="livingswiper-pagination swiper_bullets"></div>

              </div>

            </div><!-- /.c-width -->
          </section><!-- /.c-sec -->

          <section class="c-sec">
            <div class="c-width --sub">

              <div class="main_cont_title">
                <h2><span>Other style</span></h2>
              </div>

              <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              $custom_query = new WP_Query(array(
                'posts_per_page' => -1, //投稿数を指定
                'post_type' => 'collection', //投稿タイプを指定
                'post_status' => 'publish',
                'order' => 'DESC',
                'paged' => $paged,
              ));
              if ($custom_query->have_posts()) {
              ?>

                <div class="c-model-slider swiper u-mt80">
                  <div class="swiper-wrapper">
                    <?php
                    while ($custom_query->have_posts()) {
                      $custom_query->the_post();

                      if (have_rows('collection__repeat')) :
                        while (have_rows('collection__repeat')) : the_row();
                          $collection__img = get_sub_field('collection__img'); ?>
                          <li class="c-model-slider__item swiper-slide">
                            <a href="<?php the_permalink(); ?>" class="c-model-slider__link"><img class="c-model-slider__img" src="<?php echo $collection__img['url'] ?>" alt="<?php echo $collection__img['alt'] ?>" width="<?php echo $collection__img['width'] ?>" height="<?php echo $collection__img['height'] ?>"></a>
                          </li>
                    <?php
                          break;
                        endwhile;
                      endif;
                    } ?>
                  </div>
                  <div class="c-model-slider__control">
                    <div class="c-model-slider__control-inr">
                      <div class="swiper-pagination"></div>
                      <div class="swiper-button-prev c-model-slider__prev-btn"></div>
                      <div class="swiper-button-next c-model-slider__next-btn"></div>
                    </div>
                  </div><!-- /.c-model-slider__control -->
                </div>

              <?php
              }
              wp_reset_postdata();
              ?>


            </div><!-- /.c-width -->
          </section><!-- /.c-sec -->

        </div>
        <div class="main_cont fade">
          <div class="main_width">
            <?php get_template_part('inc', 'hairsalon_list'); ?>
          </div>
        </div>

      </div>

      <?php get_template_part('inc', 'page-top'); ?>
    </main>
    <?php get_template_part('inc', 'footer'); ?>
  </div>
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    //サムネイル
    var sliderThumbnail = new Swiper('.swiper-test-thumbnail', {
      slidesPerView: 3,
      spaceBetween: 10,
      /*freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,*/
    });

    const livingSwiper = new Swiper('.swiper-test', {
      loop: true,
      effect: "fade", //slide,fade,cube,coverflow,flip
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      speed: 1000,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: sliderThumbnail
      }
    });
  </script>
  <script>
    var swiper = new Swiper(".c-model-slider", {
      slidesPerView: 2,
      grid: {
        rows: 3,
      },
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function(index, className) { //追加
          return `<span class="${className}">${index + 1}</span>` //追加
        },
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        }
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      // .c-model-slider__item の要素の数を取得
      const items = document.querySelectorAll('.c-model-slider__item').length;

      // 要素の数が9以下の場合
      if (items <= 9) {
        // .c-model-slider__next-btn と .c-model-slider__prev-btn を非表示にする
        document.querySelector('.c-model-slider__next-btn').style.display = 'none';
        document.querySelector('.c-model-slider__prev-btn').style.display = 'none';
      }
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const videoElement = document.querySelector(".p-hair-video");
      const videoWrapper = document.querySelector(".p-hair-video-wrap");

      videoWrapper.addEventListener("click", function() {
        if (videoElement.paused) {
          videoElement.play();
        } else {
          videoElement.pause();
        }
        videoWrapper.classList.toggle("is-stopped");
      });
    });
  </script>
  <?php wp_footer(); ?>
</body>

</html>