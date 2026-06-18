<?php
/* Template Name: トップページ */
get_header();
?>

<body <?php body_class('relative h-full flex flex-col overflow-hidden'); ?>>
  <?php get_template_part('inc', 'header'); ?>

  <div class="js-scroll-container mt-60 pc:mt-90 flex-1 overflow-x-hidden flex flex-col justify-between">
    <main class="pb-80 pc:pb-160">

      <div class="splide splide-home-kv h-[calc(100dvh-60rem)] pc:h-[calc(100dvh-90rem)] overflow-hidden">
        <div class="splide__track h-full">
          <ul class="splide__list">

            <li class="splide__slide w-full">
              <picture>
                <source media="(min-width: 1272px)" srcset="/wp-content/themes/ifh_theme/media/images/home/top_Ifh_pc.webp">
                <img class="w-full h-full object-contain" src="/wp-content/themes/ifh_theme/media/images/home/top_Ifh_sp.webp" alt="" width="1080" height="1920" fetchpriority="high" loading="eager" decoding="async">
              </picture>
              <!-- <p class="absolute top-1/2 left-[10%] -translate-y-1/2 text-26 pc:text-46 text-white font-josefin [text-shadow:0rem_0rem_10rem_rgba(0,0,0,0.3)]">
              Angelique Eye
            </p> -->
            </li>

            <li class="splide__slide w-full">
              <picture>
                <source media="(min-width: 1272px)" srcset="/wp-content/themes/ifh_theme/media/images/home/top_BIANCA_pc.webp">
                <img class="w-full h-full object-contain" src="/wp-content/themes/ifh_theme/media/images/home/top_BIANCA_sp.webp" alt="" width="1080" height="1920" loading="lazy" decoding="async">
              </picture>
              <!-- <p class="absolute top-1/2 left-[10%] -translate-y-1/2 text-26 pc:text-46 text-white font-josefin [text-shadow:0rem_0rem_10rem_rgba(0,0,0,0.3)]">
              Ifh × BIANCA
            </p> -->
            </li>

            <li class="splide__slide w-full">
              <picture>
                <source media="(min-width: 1272px)" srcset="/wp-content/themes/ifh_theme/media/images/home/top_nail&eye_pc.webp">
                <img class="w-full h-full object-contain" src="/wp-content/themes/ifh_theme/media/images/home/top_nail&eye_sp.webp" alt="" width="1080" height="1920" loading="lazy" decoding="async">
              </picture>
              <!-- <p class="absolute top-1/2 right-[10%] -translate-y-1/2 text-26 pc:text-46 text-white font-josefin [text-shadow:0rem_0rem_10rem_rgba(0,0,0,0.3)]">
              Angelique Nail
            </p> -->
            </li>
          </ul>
        </div>
      </div>

      <div class="main_cont c-mt-160 px-20">
        <div class="px-20 mx-auto max-w-1240">
          <div class="flex justify-center">
            <img class="w-48" src="/wp-content/themes/ifh_theme/media/images/common/svg-ifh-logo-black.svg" alt="" width="62" height="53">
          </div>
        </div>

        <div class="mt-40 pc:mt-80">
          <p class="text-32 pc:text-48 font-noto-serif font-normal leading-none text-center">I feel happiness</p>
          <p class="mt-80 leading-[2] md:text-center">
            私たち Ifh groupは、<br class="max-md:hidden">
            高崎・前橋・伊勢崎を中心とした<br class="max-md:hidden">
            地域の皆様に支えられ<br class="max-md:hidden">
            2026年に 20周年を迎えます。<br>
            <br>
            幅広い世代のお客様に安心して通っていただけるよう<br class="max-md:hidden">
            確かな技術力と心を込めたおもてなしを大切にしながら<br class="max-md:hidden">
            新しい技術やトレンドを取り入れてきました。<br>
            <br>
            これからも地域に根ざした<br class="max-md:hidden">
            トータルビューティーサロンとして<br class="max-md:hidden">
            お客様、スタッフ共に<br class="max-md:hidden">
            「幸せを感じることができる場所」であり続けながら<br class="max-md:hidden">
            訪れるたびに新しい魅力を感じていただける<br class="max-md:hidden">
            サロンを目指していきます。
            <!-- Ifh groupは、高崎市を中心に前橋市・伊勢崎市エリアで<br class="max-md:hidden">
          トータルビューティーサロンを展開する美容室グループです。<br>
          カット・カラー・パーマ・縮毛矯正・トリートメントヘアケアをはじめ、<br class="max-md:hidden">
          ネイルやアイラッシュ（まつげエクステ）をご提案いたします。<br>
          高崎・前橋・伊勢崎で美容室を比較検討されている方へ、<br class="max-md:hidden">
          メニュー・料金・予約方法を分かりやすくご案内いたします。<br>
          <br>
          お客様、スタッフ共に幸せを感じることができる。<br>
          そんな会社を目指しています! -->
            <!-- Ifh groupはお客様の望む<br>
          「キレイ・カワイイ・カッコイイ」を叶える<br>
          トータルビューティーサロンです。<br>
          お客様、スタッフ共に<br>
          幸せを感じることができる。<br>
          そんな会社を目指しています! -->
          </p>
          <h1 class="text-white leading-[1.3] md:text-center">
            高崎市・前橋市・伊勢崎市の美容室・美容院・ヘアサロン
          </h1>
        </div>
      </div>

      <div class="mt-80 pc:mt-160">
        <div class="grid grid-cols-3 gap-2 max-w-796 px-20 mx-auto">
          <!-- <a href="/hair/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(255,0,255,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Hair'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/hair/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Hair'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/assets/media/images/home/9link_hair_02.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/nail/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,255,255,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Nail'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/nail/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Nail'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/link_nail.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/eye/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(252,238,33,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Eye'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/eye/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Eye'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/link_eye.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/inkmake-lp/" target="_blank" rel="noopener noreferrer" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,255,255,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['INK_MAKE'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/inkmake-lp/" target="_blank" rel="noopener noreferrer" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['INK_MAKE'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/top_inkmake.webp" alt="" width="500" height="500">
          </a>
          <!-- <a href="/recruit/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,255,0,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Recruit'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/recruit/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Recruit'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/link_recruit.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/staff/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(255,0,255,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Staff'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/staff/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Staff'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/link_staff.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/salonlist/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(252,238,33,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Salon'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/salonlist/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Salon'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/assets/media/images/home/9link_salonlist_02.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/youtube/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(255,0,255,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['YouTube'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/youtube/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['YouTube'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/link_youtube.webp" alt="" width="509" height="509">
          </a>
          <!-- <a href="/products/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,255,255,0.3)] before:z-1 before:transition-colors before:duration-500 after:content-['Products'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0"> -->
          <a href="/products/" class="relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] before:z-1 before:transition-colors before:duration-500 after:content-['Products'] after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:font-josefin after:text-13 after:pc:text-28 after:font-normal after:text-white after:whitespace-nowrap after:z-2 after:duration-500 hover:before:bg-transparent hover:after:opacity-0">
            <img src="/wp-content/themes/ifh_theme/media/images/home/link_products.webp" alt="" width="509" height="509">
          </a>
        </div><!-- /.p-home-anchor-link -->
      </div>

      <div class="mt-80 pc:mt-160 fade">
        <div class="px-20 mx-auto max-w-1240">

          <div class="flex justify-center">
            <h2 class="c-section-title">
              Recommend
            </h2>
          </div>


          <a href="/inkmake-lp/" target='_blank' class="mt-40 md:mt-80 mx-auto max-w-796 flex hoverable:hover:opacity-70 duration-500">
            <!-- <picture>
            <source media='(min-width: 768px)' srcset='/wp-content/themes/ifh_theme/assets/media/images/home/toiifa_pc.webp'>
            <img class='w-full' src='/wp-content/themes/ifh_theme/assets/media/images/home/toiifa.webp' alt='toiifa' loading='lazy' width='840' height='640'>
          </picture> -->
            <img class='w-full' src='/wp-content/themes/ifh_theme/media/images/home/inkmakebanner.webp' alt='INK MAKE' loading='lazy' width='1200' height='350'>
          </a>

        </div>
      </div>

      <div class="mt-80 pc:mt-160 fade">
        <div class="px-20 mx-auto max-w-1240">

          <div class="flex justify-center">
            <h2 class="c-section-title">
              Information
            </h2>
          </div>

          <div class="mt-30 pc:mt-60">
            <?php if (have_posts()) : ?>
              <ul class="grid md:grid-cols-2 pc:grid-cols-3 gap-y-40 pc:gap-y-80 gap-x-15 pc:gap-x-30">
                <?php query_posts('posts_per_page=3'); ?>
                <?php while (have_posts()) : the_post(); ?>
                  <li>
                    <a class="block group" href="<?php the_permalink(); ?>">
                      <div class="flex">
                        <?php
                        $cat = get_the_category();
                        $cat = $cat[0];
                        ?>
                        <div class="flex justify-center items-center text-12 min-w-[8em] bg-black pt-4 px-5 pb-4">
                          <span class="text-white font-light leading-none">
                            <?php echo get_cat_name($cat->term_id); ?>
                          </span>
                        </div>
                      </div>
                      <div class="mt-10 aspect-[16/9] overflow-hidden relative">
                        <?php if (has_post_thumbnail()) : ?>
                          <!--投稿にアイキャッチがある場合-->
                          <?php
                          the_post_thumbnail('full', [
                            'class' => 'w-full h-full object-cover',
                            'alt'   => get_the_title(),
                            'loading' => 'lazy',
                            'decoding' => 'async',
                          ]);
                          ?>
                        <?php else : ?>
                          <!--投稿にアイキャッチ画像がないときの代替画像を読み込む-->
                          <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/nowprinting.webp" alt="no image" width="1971" height="1972">
                        <?php endif; ?>
                        <div class="absolute inset-0 duration-500 z-1 group-hover:bg-[#3333334d]"></div>
                      </div>

                      <div class="mt-10 flex flex-wrap gap-x-24 gap-y-8">
                        <div class="date">
                          <p><span><?php echo get_the_date(); ?></span></p>
                        </div>
                        <div class="title">
                          <p><span><?php the_title(); ?></span></p>
                        </div>
                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php else : ?>
              <!--記事が1件も見つからなかったときの処理-->
            <?php endif; ?>
          </div>

          <div class="mt-40 more_btn_area">
            <a href="/information/">
              <p><span>View More</span></p>
              <div class="more-arrow-cont">
                <span class="more-arrow"></span>
                <span class="more-circle"></span>
              </div>
            </a>
          </div>

        </div>
      </div>

      <div class="mt-80 pc:mt-160 fade">
        <div class="px-20 mx-auto max-w-1240">

          <div class="flex justify-center">
            <h2 class="c-section-title">
              Collection
            </h2>
          </div>

          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $wp_query = new WP_Query();
          $param = array(
            'posts_per_page' => -1, //投稿数を指定
            'post_type' => 'collection', //投稿タイプを指定
            'post_status' => 'publish',
            'order' => 'DESC',
            'show_in_rest' => true,
            'show_ui' => true,
            'paged' => $paged,
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>

            <div class="mt-40 pc:mt-80">
              <div class="splide home-collection-splide" aria-label="コレクションスライダー">
                <div class="splide__track">
                  <ul class="splide__list">
                    <?php while ($wp_query->have_posts()) :
                      $wp_query->the_post();
                      if (have_rows('collection__repeat')) :
                        while (have_rows('collection__repeat')) : the_row();
                          $collection__img = get_sub_field('collection__img'); ?><li class="splide__slide">
                            <a class="block aspect-[3/4]" href="<?php the_permalink(); ?>">
                              <img
                                class="w-full h-full object-cover"
                                src="<?php echo esc_url($collection__img['url']); ?>"
                                alt="<?php echo esc_attr($collection__img['alt']); ?>"
                                width="<?php echo esc_attr($collection__img['width']); ?>"
                                height="<?php echo esc_attr($collection__img['height']); ?>"
                                loading="lazy"
                                decoding="async">
                            </a>
                          </li>
                          <?php break; ?>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php wp_reset_postdata(); ?>

        </div>
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

          <p class="mt-40 pc:mt-80 text-center text-13 pc:text-15 leading-[1.8]">
            <a href="/takasaki/" class="underline hoverable:hover:opacity-70 transition-opacity duration-300">高崎市の美容室</a>をお探しの方は、Ifhの高崎市内店舗一覧をご覧ください。
          </p>

        </div>
      </div>

      <?php get_template_part('inc', 'page-top'); ?>
    </main>
    <?php get_template_part('inc', 'footer'); ?>
  </div>

  <?php get_template_part('inc', 'fixed-right'); ?>
  <?php //get_template_part('inc', 'furisodeBanner');   
  ?>
  <?php get_template_part('inc', 'sp-menu'); ?>

  <?php wp_footer(); ?>
</body>

</html>