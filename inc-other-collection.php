<section class="c-sec model-sec">
  <div class="c-width --sub">
    <div class="main_cont_title">
      <h2><span>Other Style</span></h2>
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
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div><!-- /.c-model-slider__control -->
      </div>

    <?php
    }
    wp_reset_postdata();
    ?>
  </div><!-- /.c-width -->
</section>