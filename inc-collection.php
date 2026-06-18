<section class="c-sec">
  <div class="c-width">
    <div class="main_cont_title">
      <h2><span>Collection</span></h2>
    </div>

    <div class="detail__img swiper-test__wrap u-mt80">

      <div class="swiper swiper-test">
        <div class="swiper-wrapper">
          <!--必須コード-->

          <?php while (have_rows('collection__repeat')) {
            the_row();
            $collection__img_url = get_sub_field('collection__img')['url'];
            $collection__img_width = get_sub_field('collection__img')['width'];
            $collection__img_height = get_sub_field('collection__img')['height'];
          ?>
            <div class="swiper-slide">
              <!--必須コード-->
              <div class="swiper-test__img--outer">
                <picture><img class="swiper-test__img" src="<?php echo $collection__img_url; ?>" alt="" width="<?php echo $collection__img_width; ?>" height="<?php echo $collection__img_height; ?>"></picture>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>

      <!--サムネイル-->
      <div class="swiper swiper-test-thumbnail">
        <div class="swiper-wrapper">
          <!--必須コード-->

          <?php while (have_rows('collection__repeat')) {
            the_row();
            $collection__img_url = get_sub_field('collection__img')['url'];
            $collection__img_width = get_sub_field('collection__img')['width'];
            $collection__img_height = get_sub_field('collection__img')['height'];
          ?>
            <div class="swiper-slide">
              <!--必須コード-->
              <div class="swiper-test-thumbnail__img">
                <picture><img class="swiper-test-thumbnail__img--body" src="<?php echo $collection__img_url; ?>" alt="" width="<?php echo $collection__img_width; ?>" height="<?php echo $collection__img_height; ?>"></picture>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>


      <div class="livingswiper-pagination swiper_bullets"></div>

    </div>
  </div>
</section>