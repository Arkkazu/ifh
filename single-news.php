<?php
$post_select = get_field('page_type');
if(($post_select == '詳細ページ無し')){
  wp_redirect( home_url() ); exit;
}else{
get_header();
if ($terms = get_the_terms($post->ID, 'newscat')) {
  foreach ( $terms as $term ) {
    $term_name = $term->name;
    $now_term = esc_html($term->slug);
  }
}
?>
<body id="news" class="news lower single">
  <div id="wrapper">
    <?php get_template_part('inc','header'); ?>
    <div id="main_area" role="main">
      <div id="main_title">
        <div class="main_width">
          <div class="main_title_inner">
            <p><span>NEWS</span></p>
            <div class="content_title_jp"><span>お知らせ</span></div>
          </div>
        </div>
      </div>
      <div class="content_wrapper">
        <div class="main_width">
          <div class="main_cont">
            <div class="detail_area">
              <div class="brand_title">
                <div class="brand_inner">
                  <p>quakerstate</p>
                </div><!-- brand_title -->
              </div><!-- brand_title -->
              <div class="title_area">
                <div class="cate"><span><?php
                        if ($terms = get_the_terms($post->ID, 'newscat')) {
                          foreach ( $terms as $term ) {
                            echo esc_html($term->name)  ;
                          }
                        }
                      ?></span></div>
                <div class="date"><?php echo get_the_time('Y/m/d');?></div>
                <div class="title">
                  <h1><?php echo get_the_title();?></h1>
                </div>
              </div>
              <div class="detail_cont_area"><?php the_content(); ?></div>
              <div class="all_btn">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>/news/">
                  <span>一覧に戻る</span>
                </a>
              </div><!-- detail_area -->
            </div><!-- detail_area -->
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
