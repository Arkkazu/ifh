<?php
get_header();
?>

<body <?php body_class('relative h-full flex flex-col overflow-hidden'); ?>>
  <?php get_template_part('inc', 'header'); ?>

  <div class="js-scroll-container mt-60 pc:mt-90 flex-1 overflow-x-hidden flex flex-col justify-between">
    <main class="relative pb-80 pc:pb-160">

      <!-- <div class="mx-auto max-w-560 pc:max-w-1300 md:px-40 pc:px-50">
        <div class="overflow-hidden aspect-[2/3] pc:aspect-[2/1]">
          <picture>
            <source media='(min-width: 1272px)' srcset='/wp-content/themes/ifh_theme/assets/media/images/nail/nail_top_PC.webp'>
            <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/nail/nail_top_SP.webp" alt="ネイルKV" width="1000" height="1500">
          </picture>
        </div>
      </div> -->
      <div class="h-[calc(100dvh-60rem)] pc:h-[calc(100dvh-90rem)] overflow-hidden">
        <picture>
          <source media="(min-width: 1272px)" srcset="/wp-content/themes/ifh_theme/media/images/nail/nail_top_pc.webp">
          <img class="w-full h-full object-contain" src="/wp-content/themes/ifh_theme/media/images/nail/nail_top_sp.webp" alt="" loading="lazy" width="1080" height="1920">
        </picture>
      </div>


      <section class="mt-80 pc:mt-150">
        <div class="mx-auto max-w-560 pc:max-w-1300 px-40 pc:px-50">

          <div class="flex justify-center items-center gap-x-16">
            <div class="bg-border w-20 h-1 -translate-y-1/2 rotate-[-60deg]"></div>
            <h1 class="text-20 font-josefin font-normal leading-none">Nail concept</h1>
            <div class="bg-border w-20 h-1 -translate-y-1/2 rotate-[-60deg]"></div>
          </div>

          <div class="mt-40 pc:mt-80">
            <p class="text-14 text-center">Angelique Nailは指先から感動を届けるネイルを目指します</p>
          </div>

          <div class="mt-40 pc:mt-80">
            <div class="flex flex-col pc:flex-row justify-between gap-y-40">

              <div class="w-full pc:w-350">
                <div class="box_area_img">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/media/images/nail/nail_imag_1.webp" alt="" width="1000" height="1000">
                </div>
                <div class="mt-20 pc:mt-40 pb-20 pc:pb-40 border-b border-solid border-border">
                  <h3 class="text-16 font-normal text-center">Hair×Nail、Eye×Nail 同時施術可能</h3>
                </div>
                <div class="mt-20 pc:mt-40">
                  <p class="box_area_text">トータルビューティーサロンならではの最大のメリット♪<br>
                    同時施術も可能なので、ヘアサロン、ネイルサロン、アイラッシュサロンを個別に予約し来店するといった煩わしさを減らし、忙しい方も時短で施術を受けることができます。</p>
                </div>
              </div>

              <div class="w-full pc:w-350">
                <div class="box_area_img">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/media/images/nail/nail_imag_2.webp" alt="" width="1000" height="1000">
                </div>
                <div class="mt-20 pc:mt-40 pb-20 pc:pb-40 border-b border-solid border-border">
                  <h3 class="text-16 font-normal text-center">お客様に合わせてご提案</h3>
                </div>
                <div class="mt-20 pc:mt-40">
                  <p class="box_area_text">Angelique Nailのオーダージェルネイルはどんなデザインもご対応いたします。<br>
                    ご希望の色味やデザインに応えるだけではなくお客様のライフスタイル、肌の色、指先の形に合わせて、カラーや施術内容をご提案します。</p>
                </div>
              </div>

              <div class="w-full pc:w-350">
                <div class="box_area_img">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/media/images/nail/nail_imag_3.webp" alt="" width="1000" height="1000">
                </div>
                <div class="mt-20 pc:mt-40 pb-20 pc:pb-40 border-b border-solid border-border">
                  <h3 class="text-16 font-normal text-center">確かな技術力</h3>
                </div>
                <div class="mt-20 pc:mt-40">
                  <p class="box_area_text">日々感性と技術を磨き、実務経験をふんだスタッフがご対応します。ネイルの持ちにも繋がる下処理から丁寧に施術いたしますが、万が一浮きや剥がれが出てしまった場合も10日間お直し保証があるのでご安心ください。</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>


      <section class="mt-80 pc:mt-150">
        <div class="mx-auto max-w-560 pc:max-w-1300 px-40 pc:px-50">
          <div class="flex justify-center items-center gap-x-16">
            <div class="bg-border w-20 h-1 -translate-y-1/2 rotate-[-60deg]"></div>
            <h2 class="text-20 font-josefin font-normal leading-none">Design Gallary</h2>
            <div class="bg-border w-20 h-1 -translate-y-1/2 rotate-[-60deg]"></div>
          </div>
          <div class="mt-16">
            <p class="text-14 text-center">デザインギャラリー</p>
          </div>

          <div class="mt-40 pc:mt-80">
            <p class="text-14 text-center leading-[2]">お客様にカウンセリングさせていただきデザインを形にしていきます。<br>
              お客様のライフスタイルやワークスタイル<br>
              好みやスキンカラーから見るパーソナルカラーなど<br>
              様々な角度から考え提案させていただいております。<br>
              気になるデザインがあればイメージ画像としてぜひお持ち下さい。</p>
          </div>

        </div>
      </section>


      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $wp_query = new WP_Query();
      $args = array(/* 配列に複数の引数を追加 */
        'posts_per_page' => -1,
        'post_type' => 'nail_light',
        'post_status' => 'publish',
        'order' => 'DESC',
        'paged' => $paged,
      );
      $wp_query->query($args);

      if ($wp_query->have_posts()) :
      ?>

        <section class="mt-40 pc:mt-80">
          <div class="mx-auto max-w-560 pc:max-w-1300 px-40 pc:px-50">

            <div class="mt-60 pc:mt-80">
              <div class="splide splide-nail max-w-480 pc:max-w-full mx-auto">
                <div class=" splide__track">
                  <ul class="splide__list">
                    <?php
                    $count = 1; //初期化
                    while ($wp_query->have_posts()) :
                      $wp_query->the_post();
                      $modalId = "modal_" . $count;
                    ?>
                      <li class="splide__slide">
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
                <div class="splide__arrows">
                  <button class="splide__arrow splide__arrow--prev">
                    <img src="/wp-content/themes/ifh_theme/media/images/common/svg-chevron.svg" alt="矢印" loading="lazy" width="18" height="20">
                  </button>
                  <button class="splide__arrow splide__arrow--next">
                    <img src="/wp-content/themes/ifh_theme/media/images/common/svg-chevron.svg" alt="矢印" loading="lazy" width="18" height="20">
                  </button>
                </div>
              </div>
            </div>

            <?php
            $count = 1; //初期化
            while ($wp_query->have_posts()) :
              $wp_query->the_post();
              $modalId = "modal_" . $count;
            ?>
              <div id="<?php echo $modalId; ?>" class="js-modal opacity-0 invisible fixed -z-10 left-0 top-0 w-full h-full overflow-auto bg-[rgba(0,0,0,0.2)] bg-opacity-40 transition-opacity duration-300">
                <!-- <div id="modal_01" class="fixed z-200 left-0 top-0 w-full h-full overflow-auto bg-black bg-opacity-40 transition-opacity duration-300 js-modal"> -->
                <div class="js-modal-cont-wrap absolute top-1/2 left-[calc(50%+(100vw-100%)/2)] transform -translate-x-1/2 -translate-y-1/2 max-w-[90%] pc:max-w-600 w-full pc:w-calc-30">

                  <div class="js-modal-cont relative border border-black bg-beige py-80 pc:py-120 px-24 pc:px-80 max-h-800">
                    <div class="absolute top-16 right-16 text-40 leading-none hover:cursor-pointer js-modal-close">×</div>
                    <!-- <div class="absolute top-80">
                      <p class="text-18 leading-none font-josefin">Light course design</p>
                    </div> -->
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
                          <img class="w-18 scale-x-[-1]" src="/wp-content/themes/ifh_theme/media/images/common/svg-chevron.svg" alt="矢印" loading="lazy" width="18" height="20">
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                          <img class="w-18" src="/wp-content/themes/ifh_theme/media/images/common/svg-chevron.svg" alt="矢印" loading="lazy" width="18" height="20">
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

            <div class="mt-40 pc:mt-80">
              <div class="flex justify-center">
                <a class="relative w-124 h-40 block group" href="/nail-gallary/">
                  <div class="absolute top-2 left-0 flex flex-col gap-y-4 duration-500 group-hover:left-5">
                    <p class="font-josefin text-14 leading-none font-normal">View More</p>
                    <div class="relative w-104 h-1 bg-border">
                      <div class="absolute top-1/2 right-0 w-12 h-1 -translate-y-1/2 rotate-45 bg-border transform origin-bottom-right"></div>
                    </div>
                  </div>
                  <div class="absolute bottom-0 right-0 w-40 h-40 rounded-full border border-solid border-border"></div>
                </a>
              </div>
            </div>

          </div>
        </section>



      <?php
      endif;
      ?>



      <section class="mt-80 pc:mt-150">
        <div class="mx-auto max-w-560 pc:max-w-1300 px-40 pc:px-50">
          <div class="flex justify-center items-center gap-x-16">
            <div class="bg-border w-20 h-1 -translate-y-1/2 rotate-[-60deg]"></div>
            <h2 class="text-20 font-josefin font-normal leading-none">Nail menu</h2>
            <div class="bg-border w-20 h-1 -translate-y-1/2 rotate-[-60deg]"></div>
          </div>
          <div class="mt-16">
            <h2 class="text-14 text-center">おすすめケアメニュー</h2>
          </div>

          <div class="mt-40 pc:mt-80">
            <div class="flex flex-col pc:flex-row gap-32">
              <div class="flex-1">
                <h3 class="text-16 pc:text-18 pb-12 pc:pb-16 border-b border-solid border-border">ハンドスパ＋足裏角質除去</h3>
                <div class="mt-20 pc:mt-40">
                  <p class="">ハンドスパ</p>
                  <p class="mt-4 pc:mt-10">マシーンを使用して指先の角質を削りシリコンで仕上げます。目指せ17才！ふっくらモチモチ肌へ！</p>
                </div>
                <div class="mt-20 pc:mt-40">
                  <p class="">足裏角質除去</p>
                  <p class="mt-4 pc:mt-10">専用軟化剤で古くなった角質を柔らかくしてから、パドルで削ります！ 匂いの軽減にもつながります。</p>
                </div>
              </div>
              <div class="mx-auto max-w-480 w-full pc:max-x-full pc:w-[30%]">
                <div>
                  <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/lower/nailcare01.jpg" alt="" width="681" height="903">
                </div>
              </div>
            </div>
          </div>

          <div class="mt-40">
            <div class="flex flex-col pc:flex-row gap-32">
              <div class="flex-1">
                <h3 class="text-16 pc:text-18 pb-12 pc:pb-16 border-b border-solid border-border">パラフィンパック</h3>
                <div class="mt-20 pc:mt-40">
                  <p class="">パラフィンパックとは？</p>
                  <p class="mt-4 pc:mt-10">保湿成分を溶かしこんだパラフィンとよばれるロウを使用した美容パック。 手だけではなく爪も潤います。乾燥や手のシワが気になる方へオススメです！</p>
                </div>
              </div>
              <div class="mx-auto max-w-480 w-full pc:max-x-full pc:w-[30%]">
                <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/nailcare02.jpg" alt="" width="681" height="500">
              </div>
            </div>
          </div>

        </div>
      </section>

      <div class="mt-80 pc:mt-150">
        <div class="mx-auto max-w-560 pc:max-w-1300 px-40 pc:px-50">
          <?php get_template_part('inc', 'nailsalon_list_tailwind'); ?>
        </div>
      </div>

      <?php get_template_part('inc', 'page-top'); ?>
    </main>
    <?php get_template_part('inc', 'footer'); ?>
  </div>
  <?php get_template_part('inc', 'sp-menu'); ?>

  <?php wp_footer(); ?>
</body>

</html>