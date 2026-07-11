<?php
get_header();
?>

<body>
  <main>
    <div class="mx-auto max-w-768">

      <div class="relative">
        <?php [$src, $wh] = theme_img_src_wh('media/images/flanella-lp/flanella_1@2x.webp'); ?>
        <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>
        <a class="block absolute bottom-16 md:bottom-32 left-1/2 -translate-x-1/2 w-[89.3%] hoverable:hover:opacity-70 transition-opacity duration-500" href="https://lin.ee/X8zEiV1" target="_blank" rel="noopener noreferrer">
          <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_1_2@2x.webp"); ?>
          <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>
        </a>
      </div>

      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_2@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

      <div class="relative">
        <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_3@2x.webp"); ?>
        <a href="https://lin.ee/X8zEiV1" target="_blank" rel="noopener noreferrer">
          <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>
        </a>
      </div>

      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_4@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_5@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

      <div class="aspect-[16/9] w-full overflow-hidden">
        <video class="block -mt-px -ml-px h-[calc(100%+2px)] w-[calc(100%+2px)] max-w-none object-cover [filter:contrast(1.0001)]" autoplay muted loop playsinline>
          <source src="<?php echo esc_url(get_theme_file_uri('media/videos/movie_ONE.mp4')); ?>" type="video/mp4">
        </video>
      </div>


      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_6@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>


      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_7@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

      <div class="aspect-[16/9] w-full overflow-hidden">
        <video class="block -mt-px -ml-px h-[calc(100%+2px)] w-[calc(100%+2px)] max-w-none object-cover [filter:contrast(1.0001)]" autoplay muted loop playsinline>
          <source src="<?php echo esc_url(get_theme_file_uri('media/videos/toshinyoku.mp4')); ?>" type="video/mp4">
        </video>
      </div>

      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_8@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

      <div class="relative">
        <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_3@2x.webp"); ?>
        <a href="https://lin.ee/X8zEiV1" target="_blank" rel="noopener noreferrer">
          <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>
        </a>
      </div>

      <?php [$src, $wh] = theme_img_src_wh("media/images/flanella-lp/flanella_9@2x.webp"); ?>
      <img class="w-full" src="<?php echo $src; ?>" alt="" loading="lazy" <?php echo $wh; ?>>

    </div>
  </main>

  <?php wp_footer(); ?>
</body>

</html>