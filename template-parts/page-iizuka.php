 <main class="relative pb-80 pc:pb-160">
   <section class="c-sec">
     <div class="c-width --sub">
       <!-- スライダーのコンテナ -->
       <div class="c-salon-swiper swiper">
         <!-- 必要に応じたwrapper -->
         <div class="swiper-wrapper">
           <!-- スライド -->
           <div class="c-salon-swiper__slide swiper-slide">
             <img class="c-salon-swiper__img" src="/wp-content/themes/ifh_theme/assets/media/images/hair/i-slide-01.webp" alt="Ifh飯塚" width="756" height="506">
           </div>
           <div class="c-salon-swiper__slide swiper-slide">
             <img class="c-salon-swiper__img" src="/wp-content/themes/ifh_theme/assets/media/images/hair/i-slide-02.webp" alt="Ifh飯塚" width="756" height="506">
           </div>
           <div class="c-salon-swiper__slide swiper-slide">
             <img class="c-salon-swiper__img" src="/wp-content/themes/ifh_theme/assets/media/images/hair/i-slide-03.webp" alt="Ifh飯塚" width="756" height="506">
           </div>
           <div class="c-salon-swiper__slide swiper-slide">
             <img class="c-salon-swiper__img" src="/wp-content/themes/ifh_theme/assets/media/images/hair/i-slide-04.webp" alt="Ifh飯塚" width="756" height="506">
           </div>
           <div class="c-salon-swiper__slide swiper-slide">
             <img class="c-salon-swiper__img" src="/wp-content/themes/ifh_theme/assets/media/images/hair/i-slide-05.webp" alt="Ifh飯塚" width="756" height="506">
           </div>
         </div>
       </div>

       <div class="mt-80 pc:mt-150">
         <h1 class="text-center">高崎市の美容室・美容院・ヘアサロン</h1>
       </div>

       <div class="mt-40 flex justify-center">
         <h2 class="underbar-ttl u-block-center">Ifh iizuka</h2>
       </div><!-- /.underbar-ttl-wrap -->

       <div class="c-salon-cat u-mt80">
         <div class="bg-black w-60 pc:w-90 h-20 pc:h-24 flex justify-center items-center text-white font-josefin font-light">HAIR</div>
         <div class="bg-black w-60 pc:w-90 h-20 pc:h-24 flex justify-center items-center text-white font-josefin font-light">NAIL</div>
         <div class="bg-black w-60 pc:w-90 h-20 pc:h-24 flex justify-center items-center text-white font-josefin font-light">EYE</div>
         <div class="bg-black w-60 pc:w-90 h-20 pc:h-24 flex justify-center items-center text-white font-josefin font-light">SPA</div>
       </div>

       <p class="c-txt u-txt-center u-mt80">Ifh iizukaはヘアメニューだけでなくネイルメニューやアイメニューなども
         <span class="u-ib">充実しているトータルビューティーサロンです。</span>
         <span class="u-ib">シンボルのアンティークドアとシックな内装。</span>
         <span class="u-ib">接客・技術共にご満足頂ける空間をご提供いたします。</span>
       </p>

       <dl class="c-salon-info u-mt150">
         <dt class="c-salon-info__term">住　　所</dt>
         <dd class="c-salon-info__desc">〒370-0069　群馬県高崎市飯塚町222-3</dd>
         <dt class="c-salon-info__term">電　　話</dt>
         <dd class="c-salon-info__desc">027-388-9675</dd>
         <dt class="c-salon-info__term">営業時間</dt>
         <dd class="c-salon-info__desc">平　日 …&nbsp;10:00～19:00 <br class="u-tb-none"><span class="u-sp-none">（</span><span class="c-salon-info__desc-ib-sp">カット受付 18:00</span><br class="u-tb-none"><span class="u-sp-none"> / </span><span class="c-salon-info__desc-ib-sp">パーマ・カラ―受付 17:00</span><span class="u-sp-none">）</span><br>土・日 …&emsp;9:00～19:00<br class="u-tb-none"><span class="u-sp-none">（</span><span class="c-salon-info__desc-ib-sp">カット受付 18:00</span><br class="u-tb-none"><span class="u-sp-none"> / </span><span class="c-salon-info__desc-ib-sp">パーマ・カラ―受付 17:00</span><span class="u-sp-none">）</span></dd>
         <dt class="c-salon-info__term">定 休 日</dt>
         <dd class="c-salon-info__desc">第2月曜日</dd>
       </dl><!-- /.c-salon-info -->

       <div class="c-salon-link-btn-cntr u-mt150">
         <a href="https://maps.app.goo.gl/bfh9rYZxBgXFZBFJA" target='_blank' class="c-salon-link-btn">MAP</a>
         <a href="https://beauty.hotpepper.jp/slnH000323208/" target='_blank' class="c-salon-link-btn">WEB 予約／クーポン</a>
       </div><!-- /.c-salon-link-btn-cntr -->

     </div><!-- /.c-width -->
   </section><!-- /.c-sec -->


   <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $wp_query = new WP_Query();
    $param = array(
      'posts_per_page' => -1, //投稿数を指定
      'post_type' => 'staff', //投稿タイプを指定
      'post_status' => 'publish',
      'order' => 'ASC',
      'show_in_rest' => true,
      'show_ui' => true,
      'paged' => $paged,
      'tax_query' => array(
        array(
          'taxonomy' => 'staff_cat',
          'field' => 'slug',
          'terms' => 'staff_iizuka',
        ),
      ),
    );
    $wp_query->query($param);
    if ($wp_query->have_posts()) {
    ?>
     <div class="mt-80 pc:mt-150 px-20">
       <div class="mx-auto max-w-1100">

         <div class="flex justify-center">
           <h2 class="c-section-title">
             Staff
           </h2>
         </div>

         <ul class="mt-40 pc:mt-80 flex flex-wrap justify-center pc:grid-cols-4 gap-x-16 gap-y-40 pc:gap-40">
           <?php
            $count = 1; //初期化
            while ($wp_query->have_posts()) {
              $wp_query->the_post();
              $id = "modal__iizuka" . $count;
            ?>
             <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] pc:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
               <div class="relative pc:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                 <div class="z-1 absolute inset-0 bg-[#bf6955] mix-blend-multiply"></div>
                 <?php get_template_part('inc', 'staff'); ?>
               </div>

               <?php if (get_field('staff_youtube')) : ?>
                 <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 pc:hover:opacity-70 duration-500">
                   <svg class="fill-[#FFFF00]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 25">
                     <g>
                       <polygon class="" points="153 25 0 25 0 7.06 6.88 0 153 0 153 25" />
                     </g>
                   </svg>
                   <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center gap-x-8">
                     <span class="font-inter-tight font-bold text-13 leading-none text-black whitespace-nowrap">Interview</span>
                     <div class="w-15">
                       <img class="w-full" src="/wp-content/themes/ifh_theme/media/images/common/svg-017.svg" alt="" loading="lazy" width="15" height="15">
                     </div>
                   </div>
                 </a>
               <?php endif; ?>
             </li>
           <?php
              $count++;
            }
            ?>
         </ul>
       </div>
     </div>
   <?php
    }
    wp_reset_postdata(); ?>


   <section class="c-sec">
     <div class="c-width">
       <?php get_template_part('inc', 'hairsalon_list'); ?>
     </div>
   </section><!-- /.c-sec -->

 </main>
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>