<?php get_header();
$categoryList = get_the_category();
$my_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$term_name = $my_term->name;
$tarm_slug = $my_term->slug;
$tarm_ID = $my_term->term_id;
?><body id="case" class="lower">
  <div id="wrapper">
    <?php get_template_part('inc','header'); ?>
    <?php get_template_part('inc','sp_menu'); ?>
    <div id="main_area" role="main">
      <div class="main_content">
        <div class="main_width">
          <div class="main_content_inner">
            <div class="main_title">
              <h1><?php echo $term_name;?></h1>
            </div><!-- main_title -->
            <div class="content_inner">
              <div class="content_inner_left">
                <div class="topics_list">
                  <?php
                  $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
                  $wp_query = new WP_Query();
                  $taxonomy_name = 'topicscat';
                  global $max_num_page;
                  $post_type = 'topics';
                  $param = array(
                    'posts_per_page' => 1,//1ページで表示する件数
                    'post_type' => $post_type,//投稿タイプを指定
                    'tax_query' => array(
                      array(
                        'taxonomy' => $taxonomy_name,
                        'terms' => array($tarm_slug),
                        'field' => 'slug',
                      ),
                    ),
                    'paged'=>$paged
                  );
                  $wp_query->query($param);
                  $max_num_page = $wp_query->max_num_pages;
                  if($wp_query->have_posts()):
                  ?>
                  <ul id="topics_json"></ul><!-- row -->
                  <!-- もっと見るボタン -->
                  <?php
                  if(1<$max_num_page){ ?>
                  <div class="view_more_btn btn"><div id="loading"><img src="/media/images/common/loading.gif" width="29" height="29" alt=""></div><a href="javascript:void(0)" class="non-scroll">もっと読む</a></div>
                  <?php };?>
                </div><!-- row -->
                <?php endif; wp_reset_postdata(); ?>
              </div><!-- content_inner_left -->
              <div id="content_side">
                <div class="side_title">
                  <h2>カテゴリー</h2>
                </div>
                <div class="side_cat">
                  <ul>
                    <li class="current-cat"><a href="/topics/"><span>すべて</span></a></li>
                    <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'topicscat')); ?>
                  </ul>
                </div>
                <div class="side_title">
                  <h2>年間アーカイブ</h2>
                </div>
                <div class="side_cat">
                  <ul>
                    <?php
                    $year_prev = null;
                    $postType = get_post_type( );
                    $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
                                    YEAR( post_date ) AS year,
                                    COUNT( id ) as post_count FROM $wpdb->posts
                                    WHERE post_status = 'publish' and post_date <= now( )
                                    and post_type = '$postType'
                                    GROUP BY month , year
                                    ORDER BY post_date DESC");
                    foreach($months as $month):
                    $year_current = $month->year;
                    if ($year_current != $year_prev) { ?>
                    <li class="cat_date"><a href="/topics/date/<?php echo $month->year; ?>/<?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>/">
                      <?php echo $month->year; ?>年<?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月</a></li>
                    <?php } 
                    endforeach; ?>
                  </ul>
                </div>
              </div><!-- content_side -->
            </div><!-- content_inner -->
          </div><!-- main_content_inner -->
        </div>
      </div><!-- main_content -->
      <?php get_template_part('inc','ft_contact'); ?>
    </div><!-- .main_area -->
    <div id="bread">
      <div class="main_width">
        <?php the_pankuzu();?>
        <div class="pagetop"><a href="#wrapper">トップへ戻る</a></div>
      </div><!-- .main_width -->
    </div><!-- .bread -->
    <?php get_template_part('inc','footer'); ?>
  </div><!-- wrapper -->
  <?php get_template_part('inc','js'); ?>
  <script>
    $('#loading').hide();
    var pageCnt,
        maxPage;
    <?php
    if($max_num_page):
    ?>
    maxPage = <?php echo $max_num_page;?>;
      <?php else:?>
    maxPage = 1;
    <?php endif;?>
    pageCnt = 1;
    $(function(){
      caseList();
    });
    $('.view_more_btn').on('click', function(){
      $('#loading').fadeIn();
      pageCnt++;
      caseList();
      console.log(pageCnt);
      return false;
    });
    function caseList(){
      //今日の日付
      var hiduke=new Date(); 
      var nyear = hiduke.getFullYear();
      var nmonth = hiduke.getMonth()+1;
      var nday = hiduke.getDate();
      var today = nyear + '.' + nmonth + '.' + nday;
      var html = '';
      $.ajax({
        type: 'GET',
        url: '/wp-json/wp/v2/topics?topicscat=<?php echo $tarm_ID;?>&per_page=1&status=publish&page='+pageCnt+'&order=desc',
        dataType: 'json'
      }).done(function(json){
        var len = json.length;
        for(var i=0; i < len; i++){
          var link = json[i].link;
          var title = json[i].title.rendered;
          var date_data = new Date(json[i].date);
          var year = date_data.getFullYear();
          var month = date_data.getMonth() + 1;
          var day = date_data.getDate();
          var dates = year + '' + month + '' + day;
          var date = year + '.' + month + '.' + day + '.';
          var newicon = today - dates
          //var img_w = json[i].acf.thumb_image.width;
          //var img_h= json[i].acf.thumb_image.height;
          html += '<li>';
          html += '<a href="' +link+ '">';
          html += '<span class="date">' +today+ '</span>';
          html +='<span class="icon new"><span>NEW</span></span>';
          //html += '<img src="' +img_url+ '" width="' +img_w+ '" height="' +img_h+ '" alt="">';
          html += '<p>' +title+ '</p>';
          html += '</a>';
          html += '</li><!-- li -->';
          if(pageCnt == maxPage){
            $('.view_more_btn a').hide();
          }
        }
        $('#loading').hide();
        $('#topics_json').append(html);
        //$(".thumb_col").matchHeight();
      }).fail(function(json){

      });
    }


  </script>
  <?php get_footer(); ?>
</body>
