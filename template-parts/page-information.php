 <main class="relative pb-80 pc:pb-160">

   <div id="information" class="lower">
     <div class="main_width">

       <div class="main_cont">
         <section class="c-sec">

           <!-- <div class="content_section">
                  <div class="content_title">
                    <h2><span>INFORMATION</span></h2>
                  </div>
                </div> -->
           <div class="main_cont_title">
             <h2><span>Information</span></h2>
           </div>

           <div class="content_section u-mt150">

             <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              $wp_query = new WP_Query();
              $param = array(
                'posts_per_page' => 9, //1ページで表示する件数
                'post_status' => 'publish', //公開したページのみ
                'order' => 'DESC', //順序（投稿日の新しい順）
                'show_in_rest' => true,
                'show_ui' => true,
                'paged' => $paged,
              );
              $wp_query->query($param);
              if ($wp_query->have_posts()) :
              ?>
               <div class="news_list">
                 <ul>
                   <?php
                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                     <li>
                       <a href="<?php the_permalink(); ?>">
                         <div class="cat">
                           <?php
                            $cat = get_the_category();
                            $cat = $cat[0];
                            ?>
                           <p>
                             <span>
                               <?php echo get_cat_name($cat->term_id); ?>
                             </span>
                           </p>
                         </div>
                         <div class="img">
                           <?php if (has_post_thumbnail()) : ?>
                             <?php the_post_thumbnail(); ?>
                             <!--投稿にアイキャッチがある場合-->
                           <?php else : ?>
                             <!--投稿にアイキャッチ画像がないときの代替画像を読み込む-->
                             <img src="/wp-content/themes/ifh_theme/assets/media/images/lower/nowprinting.jpg" alt="no image" width="1971" height="1972">
                           <?php endif; ?>
                           <!--<span class="img_catname"><?php //echo get_cat_name($cat->term_id); 
                                                          ?></span>-->
                         </div>

                         <div class="news_list_bottom">
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
               </div>
             <?php endif;
              wp_reset_postdata(); ?>
           </div>

           <?php
            if (function_exists('pagination')) { // 関数が定義されていたらtrueになる
              pagination();
            } ?>

         </section>
       </div>

     </div>
   </div>

 </main>
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>