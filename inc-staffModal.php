<div id="<?php echo $id; ?>" class="modal hidden fixed inset-0 z-900">
  <div class="js-modal-close absolute bg-[rgba(0,0,0,0.18)] w-full h-[100vh] "></div>
  <div class="js-modal-cont filter blur-[30rem] absolute top-1/2 left-[calc(50%_+_(100vw_-_100%)_/_2)] -translate-x-1/2 -translate-y-1/2 scale-75 duration-500 max-w-480 lg:max-w-720 w-[calc(100vw_-_40px)] md:w-full max-h-[calc(100dvh_-_100px)] md:max-h-[calc(100vh_-_200px)]  border overflow-y-auto bg-beige border-black">


    <div class="absolute top-5 right-5">
      <div class="js-modal-close w-20 md:w-30 pc:w-50 h-20 md:h-30 pc:h-50 flex justify-center items-center relative">
        <div class="absolute top-1/2 left-1/2 bg-black w-24 md:w-40 h-1 -translate-x-1/2 -translate-y-1/2 rotate-45"></div>
        <div class="absolute top-1/2 left-1/2 bg-black w-24 md:w-40 h-1 -translate-x-1/2 -translate-y-1/2 -rotate-45"></div>
      </div>
    </div>

    <div class="flex flex-wrap">


      <div class="order-1 w-1/2 lg:w-200 h-280 lg:h-300">
        <?php
        $staffImg = get_field('staff_img'); // 画像フィールドからURLを取得
        if ($staffImg) {
        ?>
          <img class="w-full h-full object-cover" src="<?php echo esc_url($staffImg['url']); ?>" alt="">
        <?php } else { ?>
          <img class="w-full h-full object-cover" src="/wp-content/themes/ifh_theme/assets/media/images/lower/nowprinting.jpg" alt="" width="1971" height="1972">
        <?php } ?>
      </div>

      <div class="order-3 lg:order-2 w-full lg:w-[calc(100%_-_200px)] lg:h-300 py-30 lg:py-60 px-20 lg:px-40 border-t lg:border-t-0 lg:border-l border-black">
        <p class="text-13 leading-24"><?php the_field('staff_txt'); ?></p>
      </div>

      <div class="order-2 lg:order-3 w-1/2 lg:w-200 p-24 flex flex-col border-l lg:border-l-0 lg:border-t border-black">
        <div>
          <div class=""><span class="js-staff-name-en font-inter-tight font-black text-20 md:text-26 leading-30"><?php the_field('staff_name'); ?></span></div>
          <div class="mt-8"><span class="js-rank font-playfair-display font-medium italic text-15 leading-none"><?php the_field('staff_rank'); ?></span></div>
        </div>
        <div class="mt-auto lg:mt-40 lg:max-w-152 flex flex-col gap-y-8">
          <?php if (get_field('staff_youtube')) : ?>
            <a href="<?php the_field('staff_youtube'); ?>" target="_blank" class="relative block">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 25">
                <g>
                  <polygon class="" points="153 25 0 25 0 7.06 6.88 0 153 0 153 25" />
                </g>
              </svg>
              <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center gap-x-8">
                <span class="font-inter-tight font-bold text-11 leading-none text-white whitespace-nowrap">Interview</span>
                <svg class="w-16 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                  <path d="M7.5,0C3.36,0,0,3.36,0,7.5s3.36,7.5,7.5,7.5,7.5-3.36,7.5-7.5S11.64,0,7.5,0ZM5.2,11.5V3.5l7,4-7,4Z" />
                </svg>
              </div>
            </a>
          <?php endif; ?>
          <?php if (get_field('staff_insta')) : ?>
            <a href="<?php the_field('staff_insta'); ?>" target="_blank" class="relative block">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 25">
                <g>
                  <polygon class="" points="153 25 0 25 0 7.06 6.88 0 153 0 153 25" />
                </g>
              </svg>
              <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center gap-x-8">
                <img class="w-16" src="<?php echo get_template_directory_uri(); ?>/media/images/common/svg-instagram-white.svg" alt="インスタグラムアイコン" width="64" height="64" loading="lazy">
              </div>
            </a>

          <?php endif; ?>
          <?php if (get_field('staff_reserve')) : ?>
            <a href="<?php the_field('staff_reserve'); ?>" target="_blank" class="relative block">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 25">
                <g>
                  <polygon class="" points="153 25 0 25 0 7.06 6.88 0 153 0 153 25" />
                </g>
              </svg>
              <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center gap-x-8">
                <span class="font-inter-tight font-bold text-11 leading-none text-white">Reserve</span>
                <svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.24 9.24">
                  <g>
                    <polygon class="fill-white" points="5.58 0 5.58 .5 8.38 .5 0 8.88 .35 9.24 8.74 .85 8.74 3.66 9.24 3.66 9.24 0 5.58 0" />
                  </g>
                </svg>
              </div>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <div class="order-4 w-full  lg:w-[calc(100%_-_200px)] lg:border-l border-black">
        <?php $staffRank = get_field('staff_rank');
        if ($staffRank !== 'Assistant') : ?>
          <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
            <dt class="flex items-center w-[12em]">歴</dt>
            <dd class="flex items-center flex-1"><?php the_field('staff_career'); ?></dd>
          </dl>
        <?php endif; ?>
        <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
          <dt class="flex items-center w-[12em]">得意なイメージ</dt>
          <dd class="flex items-center flex-1"><?php the_field('staff_style'); ?></dd>
        </dl>
        <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
          <dt class="flex items-center w-[12em]">得意な技術</dt>
          <dd class="flex items-center flex-1"><?php the_field('staff_skill'); ?></dd>
        </dl>
        <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
          <dt class="flex items-center w-[12em]">趣味・マイブーム</dt>
          <dd class="flex items-center flex-1"><?php the_field('staff_hobby'); ?></dd>
        </dl>
        <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
          <dt class="flex items-center w-[12em]">自分を動物に例えると？</dt>
          <dd class="flex items-center flex-1"><?php the_field('staff_animal'); ?></dd>
        </dl>
        <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
          <dt class="flex items-center w-[12em]">子供の頃の夢</dt>
          <dd class="flex items-center flex-1"><?php the_field('staff_dream'); ?></dd>
        </dl>
        <dl class="flex px-20 lg:px-40 py-16 border-t border-black border-solid">
          <dt class="flex items-center w-[12em]">将来の野望</dt>
          <dd class="flex items-center flex-1"><?php the_field('staff_ambition'); ?></dd>
        </dl>
      </div>





    </div>



  </div>
</div>