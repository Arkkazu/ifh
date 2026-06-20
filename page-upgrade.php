<?php

/**
 * Template Name: アップグレードチケットLP
 * 固定ページ「アップグレードチケットLP」(slug: upgrade) 用テンプレート
 */
get_header();
?>

<body>
  <main class="pb-40 pc:pb-80">
    <div class="mx-auto max-w-768">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
      <?php endwhile;
      endif; ?>

      <!-- ここに LP のセクション（画像）を追加してください。 -->
      <?php [$src, $wh] = theme_img_src_wh("media/images/upgrade/upgrade_1@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>
      <?php [$src, $wh] = theme_img_src_wh("media/images/upgrade/upgrade_2@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

    </div>

    <div class="mt-80 pc:mt-160 fade">
      <div class="px-20 mx-auto max-w-1240">

        <div class="flex justify-center">
          <h2 class="c-section-title">
            Salon List
          </h2>
        </div>

        <div class="mt-40 pc:mt-80">
          <div class="grid grid-cols-2 md:grid-cols-3 gap-16 md:gap-24 pc:gap-80">
            <div class="logo">
              <a class="block" href="/honten/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-honten.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Ifh honten</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市棟高町1802-306</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-381-5133</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/iizuka/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-iizuka.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Ifh iizuka</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市飯塚町222-3</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-388-9675</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/bianca/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-bianca.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>BIANCA maebashi</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県前橋市元総社町1983</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-289-9332</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/bianca_isesaki/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-bianca_isesaki.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>BIANCA isesaki</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県伊勢崎市安堀町207-1</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>0270-27-4572</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/gumigumi/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-gumigumi.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>GumiGumi by Ifh</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市棟高町971-3</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-372-0304</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_n_honten/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-angh.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Nail honten</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市棟高町1802-306</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-381-5133</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_n_iizuka/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-angI.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Nail iizuka</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市飯塚町222-3</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-388-9675</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_n_maebashi/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-angB.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Nail maebashi</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県前橋市元総社町1983</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-289-9332</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_n_isesaki/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-angB_i.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Nail isesaki</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県伊勢崎市安堀町207-1</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>0270-27-4572</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_e_honten/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-eyeH.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Eye honten</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市棟高町1802-306</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-381-5133</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_e_iizuka/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-eyeI.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Eye iizuka</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県高崎市飯塚町222-3</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-388-9675</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_e_maebashi/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-eyeB.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Eye maebashi</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県前橋市元総社町1983</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>027-289-9332</span></p>
                </div>
              </a>
            </div>
            <div class="logo">
              <a class="block" href="/ang_e_isesaki/">
                <div class="aspect-[680/300]">
                  <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-eyeB_i.webp" alt="" width="680" height="300">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>Angelique Eye isesaki</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県伊勢崎市安堀町207-1</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>0270-27-4572</span></p>
                </div>
              </a>
            </div>
            <!-- <div class="logo">
              <a class="block" href="https://millefufu.com/" target='_blank'>
                <div class="aspect-[680/300]">
                  <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/shop-millefufu.webp" alt="" width="336" height="161">
                </div>
                <div class="mt-5 text-14 pc:text-16 font-normal font-josefin">
                  <p><span>millefufu</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>群馬県伊勢崎市安堀町207-1</span></p>
                </div>
                <div class="text-12 pc:text-14 leading-[1.6]">
                  <p><span>0270-27-4572</span></p>
                </div>
              </a>
            </div> -->
          </div>
        </div>

      </div>
    </div>

  </main>

  <?php wp_footer(); ?>
</body>

</html>