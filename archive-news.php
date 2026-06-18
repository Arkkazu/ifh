<?php
if(is_date()){
  include(TEMPLATEPATH.'/date.php');
}else{
get_header();
$categoryList = get_the_category();
$my_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$term_name = $my_term->name;
$tarm_slug = $my_term->slug;
?>
<body id="news" class="news lower">
  <div id="wrapper">
    <?php get_template_part('inc','header'); ?>
    <div id="main_area" role="main">
      <div id="main_title">
        <div class="main_width">
          <div class="main_title_inner">
            <h1><span>NEWS</span></h1>
            <div class="content_title_jp"><span>お知らせ</span></div>
          </div>
        </div>
      </div>
      <div class="content_wrapper">
        <div class="main_width">
          <div class="main_cont">
            <div class="detail_list">
              <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
              $wp_query = new WP_Query();
              $param = array(
                'posts_per_page' => 10,//1ページで表示する件数
                'post_type' => 'news',//投稿タイプを指定
                'post_status' => 'publish', //公開したページのみ
                'order' => 'DESC',//順序（投稿日の新しい順）
                'show_in_rest' => true,
                'show_ui' => true,
                'paged'=>$paged,
              );
              $wp_query->query($param);
              if($wp_query->have_posts()):
              ?>
              <ul>
                <?php
                while($wp_query->have_posts()) : $wp_query->the_post();?>
                <li>
                  <a href="<?php echo get_permalink();?>">
                    <div class="cate"><span><?php
                        if ($terms = get_the_terms($post->ID, 'newscat')) {
                          foreach ( $terms as $term ) {
                            echo esc_html($term->name)  ;
                          }
                        }else{
                          echo "すべて";
                        }
                      ?></span></div>
                    <div class="date"><?php echo get_the_time('Y/m/d');?></div>
                    <div class="title"><?php echo get_the_title();?></div>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; wp_reset_postdata(); ?>
              <?php the_posts_pagination(array(
                  'screen_reader_text'=>'',
                )); ?>
            </div><!-- news_list -->
            <?php get_template_part('inc','news_sidebar'); ?>
          </div>
        </div>
      </div>
      <div id="pagetop" class="main_btn_top">
        <a class="btn_top" href="#"><span class="arrow_top"></span><span class="arrow_right"></span></a>
      </div>
    </div><!-- main_area -->
    <?php get_template_part('inc','footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc','sp_menu'); ?>
  <?php get_template_part('inc','js'); ?>
  <?php wp_footer(); ?>
</body>
<?php }?>
