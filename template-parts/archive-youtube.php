  <main class="py-40 pc:py-80">


    <section class="px-20">
      <div class="mx-auto max-w-1200">

        <div class="flex justify-center">
          <h1 class="c-section-title">
            YouTube
          </h1>
        </div>


        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $wp_query = new WP_Query();
        $args = array(/* 配列に複数の引数を追加 */
          'posts_per_page' => -1,
          'post_type' => 'youtube',
          'post_status' => 'publish',
          'order' => 'DESC',
          'paged' => $paged,
        );
        $wp_query->query($args);

        if ($wp_query->have_posts()) :
        ?>
          <div class="c-mt-80">
            <ul class="grid md:grid-cols-2 pc:grid-cols-4 gap-y-24 gap-x-16 pc:gap-x-24">
              <?php
              while ($wp_query->have_posts()) : $wp_query->the_post();
              ?>

                <li>
                  <?php
                  if ($iframe = get_field('youtube')) {
                    // iframeからYouTubeの動画IDを抽出
                    preg_match('/embed\/([^\?"]+)/', $iframe, $matches);
                    $video_id = $matches[1];
                  ?>
                    <div class="relative aspect-[9/16] overflow-hidden">
                      <div class="relative h-full bg-center bg-cover bg-no-repeat pc:hover:cursor-pointer" data-video-id="<?php echo esc_attr($video_id); ?>" style="background-image: url('https://img.youtube.com/vi/<?php echo esc_attr($video_id); ?>/hqdefault.jpg');" onclick="loadVideo(this);">
                        <button class="absolute top-1/2 left-1/2 -translate-1/2">
                          <img class="w-80 h-auto" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg_youtube-play-btn.svg" alt="youtube再生ボタン" width="158" height="110">
                        </button>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="mt-8">
                    <h2><?php the_title(); ?></h2>
                  </div>
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

      </div>
    </section>


  </main>