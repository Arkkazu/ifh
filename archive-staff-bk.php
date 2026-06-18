<?php
get_header();
?>

<body id="staff" class="lower">
  <div class="pt-60 lg:pt-90 overflow-hidden">

    <?php get_template_part('inc', 'header'); ?>

    <main class="pb-80 md:pb-150">
      <div class="px-20">
        <div class="mx-auto max-w-1100">


          <h1 class="mt-80 lg:mt-150 font-inter-tight font-black text-center text-26 md:text-30 leading-none">STAFF</h1>


          <?php
          function check_staff_posts_exist($term_slug)
          {
            $args = array(
              'post_type' => 'staff',
              'posts_per_page' => 1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'staff_cat',
                  'field'    => 'slug',
                  'terms'    => $term_slug,
                ),
              ),
            );

            $query = new WP_Query($args);

            // クエリのリセットを忘れずに
            wp_reset_postdata();

            return $query->have_posts();
          }
          ?>



          <div class="js-salon-list-posi fixed z-200 bottom-40 lg:bottom-auto lg:top-110 left-15 lg:left-auto lg:right-50">
            <div class="js-salon-list-btn ml-auto border border-black bg-white w-160 h-46 flex justify-center items-center duration-500 hoverable:hover:cursor-pointer hoverable:hover:bg-[rgba(0,0,0,0.5)] hoverable:hover:text-white">
              <span class="text-18 font-black font-inter-tight leading-none">Salon List</span>
            </div>
            <div class="js-salon-list opacity-0 pointer-events-none duration-500 border border-black bg-white p-24 lg:p-40 absolute max-lg:bottom-46 max-lg:left-0 lg:top-46 lg:right-0 w-[calc(100vw-30rem)] pc:w-800 grid lg:grid-cols-3 gap-y-24">
              <div class="">
                <div class="text-center"><span class="font-inter-tight font-bold underline">HAIR</span></div>
                <div class="mt-16 lg:mt-28 flex justify-center items-center flex-col gap-y-16">
                  <a href="#ifh-honten" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Ifh honten</a>
                  <a href="#ifh-iizuka" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Ifh iizuka</a>
                  <a href="#bianca-maebashi" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">BIANCA maebashi</a>
                  <a href="#bianca-isesaki" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">BIANCA isesaki</a>
                </div>
              </div>
              <div class="">
                <div class="text-center"><span class="font-inter-tight font-bold underline">NAIL</span></div>
                <div class="mt-16 lg:mt-28 flex justify-center items-center flex-col gap-y-16">
                  <?php
                  if (check_staff_posts_exist('staff_n_honten')) :
                  ?>
                    <a href="#nail-honten" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Nail honten</a>
                  <?php
                  endif;
                  ?>
                  <?php
                  if (check_staff_posts_exist('staff_n_iizuka')) :
                  ?>
                    <a href="#nail-iizuka" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Nail iizuka</a>
                  <?php
                  endif;
                  ?>
                  <?php
                  if (check_staff_posts_exist('staff_n_maebashi')) :
                  ?>
                    <a href="#nail-maebashi" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Nail maebashi</a>
                  <?php
                  endif;
                  ?>
                  <?php
                  if (check_staff_posts_exist('staff_n_isesaki')) :
                  ?>
                    <a href="#nail-isesaki" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Nail isesaki</a>
                  <?php
                  endif;
                  ?>
                </div>
              </div>
              <div class="">
                <div class="text-center"><span class="font-inter-tight font-bold underline">EYE</span></div>
                <div class="mt-16 lg:mt-28 flex justify-center items-center flex-col gap-y-16">
                  <?php
                  if (check_staff_posts_exist('staff_e_honten')) :
                  ?>
                    <a href="#eye-honten" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Eye honten</a>
                  <?php
                  endif;
                  ?>
                  <?php
                  if (check_staff_posts_exist('staff_e_iizuka')) :
                  ?>
                    <a href="#eye-iizuka" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Eye iizuka</a>
                  <?php
                  endif;
                  ?>
                  <?php
                  if (check_staff_posts_exist('staff_e_maebashi')) :
                  ?>
                    <a href="#eye-maebashi" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Eye maebashi</a>
                  <?php
                  endif;
                  ?>
                  <?php
                  if (check_staff_posts_exist('staff_e_isesaki')) :
                  ?>
                    <a href="#eye-isesaki" class="salon-list__cont-name inline-block font-playfair-display whitespace-nowrap relative">Angelique Eye isesaki</a>
                  <?php
                  endif;
                  ?>
                </div>
              </div>
            </div>
          </div>



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
                'terms' => 'staff_honten',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="salon-name__outer fade">
                <h2 id="ifh-honten" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Ifh honten</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__honten" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(91,165,91)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata();
          ?>





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
                'terms' => 'staff_n_honten',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="nail-honten" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Nail honten</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__n_honten" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(91,165,91)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>




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
                'terms' => 'staff_e_honten',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="eye-honten" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Eye honten</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__e_honten" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(91,165,91)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>




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
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="ifh-iizuka" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Ifh iizuka</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__iizuka" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[#bf6955] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>





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
                'terms' => 'staff_n_iizuka',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="nail-iizuka" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Nail iizuka</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__n_iizuka" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[#bf6955] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>



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
                'terms' => 'staff_e_iizuka',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="eye-iizuka" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Eye iizuka</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__e_iizuka" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[#bf6955] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>



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
                'terms' => 'staff_maebashi',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="bianca-maebashi" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">BIANCA maebashi</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__maebashi" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(91,163,159)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>




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
                'terms' => 'staff_n_maebashi',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="nail-maebashi" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Nail maebashi</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__n_maebashi" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(91,163,159)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>



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
                'terms' => 'staff_e_maebashi',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="eye-maebashi" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Eye maebashi</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__e_maebashi" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(91,163,159)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>



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
                'terms' => 'staff_isesaki',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="bianca-isesaki" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">BIANCA isesaki</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__isesaki" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(170,79,125)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>



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
                'terms' => 'staff_n_isesaki',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="nail-isesaki" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Nail isesaki</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__n_isesaki" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(170,79,125)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>



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
                'terms' => 'staff_e_isesaki',
              ),
            ),
          );
          $wp_query->query($param);
          if ($wp_query->have_posts()) {
          ?>
            <div class="mt-80 lg:mt-150">
              <div class="">
                <h2 id="eye-isesaki" class="scroll-mt-92 pc:scroll-mt-122 font-playfair-display font-normal text-18 leading-none text-center">Angelique Eye isesaki</h2>
              </div>
              <ul class="mt-40 lg:mt-80 flex flex-wrap justify-center lg:grid-cols-4 gap-x-16 gap-y-40 lg:gap-40">
                <?php
                $count = 1; //初期化
                while ($wp_query->have_posts()) {
                  $wp_query->the_post();
                  $id = "modal__e_isesaki" . $count;
                ?>
                  <li class="relative w-[calc((100%_-_16rem_*_1)_/_2)] md:w-[calc((100%_-_16rem_*_2)_/_3)] lg:w-[calc((100%_-_40rem_*_3)_/_4)]  flex flex-col gap-y-8">
                    <div class="relative lg:hover:cursor-pointer group js-modal-open" data-target="<?php echo $id; ?>">
                      <div class="z-1 absolute inset-0 bg-[rgba(170,79,125)] mix-blend-multiply"></div>
                      <?php get_template_part('inc', 'staff'); ?>
                    </div>

                    <?php if (get_field('staff_youtube')) : ?>
                      <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="mx-auto relative block w-160 lg:hover:opacity-70 duration-500">
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
          <?php
          }
          wp_reset_postdata(); ?>


        </div>
      </div>
    </main>

    <?php get_template_part('inc', 'page-top'); ?>
    <?php get_template_part('inc', 'footer'); ?>
    <?php get_template_part('inc', 'sp-menu'); ?>
  </div><!-- wrapper -->

  <!--　モーダル　-->
  <!-- honten -->
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
        'terms' => 'staff_honten',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__honten" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- iizuka -->
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
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__iizuka" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- maebashi -->
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
        'terms' => 'staff_maebashi',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__maebashi" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- isesaki -->
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
        'terms' => 'staff_isesaki',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__isesaki" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- n_honten -->
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
        'terms' => 'staff_n_honten',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__n_honten" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- n_iizuka -->
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
        'terms' => 'staff_n_iizuka',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__n_iizuka" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- n_maebashi -->
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
        'terms' => 'staff_n_maebashi',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__n_maebashi" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- n_isesaki -->
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
        'terms' => 'staff_n_isesaki',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__n_isesaki" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- e_honten -->
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
        'terms' => 'staff_e_honten',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__e_honten" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- e_iizuka -->
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
        'terms' => 'staff_e_iizuka',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__e_iizuka" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- e_maebashi -->
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
        'terms' => 'staff_e_maebashi',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__e_maebashi" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <!-- e_isesaki -->
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
        'terms' => 'staff_e_isesaki',
      ),
    ),
  );
  $wp_query->query($param);
  if ($wp_query->have_posts()) {
    $count = 1; //初期化
    while ($wp_query->have_posts()) {
      $wp_query->the_post();
      $id = "modal__e_isesaki" . $count;
      get_template_part('inc', 'staffModal');
      $count++;
    }
  } ?>

  <?php wp_reset_postdata(); ?>



  <?php wp_footer(); ?>
</body>

</html>