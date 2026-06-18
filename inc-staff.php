<div class="z-2 absolute inset-0 bg-[rgba(0,0,0,0.4)] mix-blend-multiply opacity-0 group-hover:opacity-100 duration-500"></div>
<div class="aspect-square overflow-hidden">
  <?php if (has_post_thumbnail()) { ?>
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'w-full h-full object-cover']); ?>
  <?php } else { ?>
    <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/nowprinting.jpg" alt="" width="1971" height="1972">
  <?php } ?>
</div>
<div class="z-3 absolute top-10 left-10">
  <div>
    <span class="js-staff-name-en text-white font-inter-tight font-black text-20 lg:text-26 leading-22 lg:leading-30"><?php the_field('staff_name'); ?></span>
  </div>
  <div class="mt-4 lg:mt-8">
    <span class="js-rank text-white font-playfair-display font-medium italic text-12 lg:text-15 leading-none"><?php the_field('staff_rank'); ?></span>
  </div>
</div>
<div class="z-3 absolute bottom-10 right-10 flex gap-x-8">
  <span class="text-white font-inter-tight font-light text-12 leading-none">more</span>
  <svg class="w-10" id="" data-name="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.16 10.17">
    <g id="" data-name="">
      <g>
        <polygon class="fill-white" points="5.07 10.17 4.72 9.82 9.45 5.09 4.72 .35 5.07 0 10.16 5.09 5.07 10.17" />
        <polygon class="fill-white" points=".35 10.17 0 9.82 4.73 5.09 0 .35 .35 0 5.44 5.09 .35 10.17" />
      </g>
    </g>
  </svg>
</div>