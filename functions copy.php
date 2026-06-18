<?php
//// vite用設定
add_action('wp_enqueue_scripts', function () {

  /* ───── 環境判定 ───── */
  $host   = $_SERVER['HTTP_HOST'];
  $is_dev = str_contains($host, 'localhost') || str_contains($host, '127.0.0.1');
  $vite   = $is_dev
    ? 'http://localhost:5173'
    : get_template_directory_uri() . '/dist/assets';

  /* ───── 共通アセット ───── */
  if ($is_dev) {
    add_action('wp_footer', fn() => print(
      '<script type="module" src="' . $vite . '/@vite/client"></script>'
      . '<script type="module" src="' . $vite . '/src/main.js"></script>'
    ));
  } else {
    wp_enqueue_style('theme-style',  $vite . '/style.css', [], null);
    wp_enqueue_style('theme-main-style', $vite . '/main.css', [], null);
    wp_enqueue_script('theme-main',  $vite . '/main.js',  [], null, true);
  }

  /* ───── ページ専用バンドル ───── */
  $candidates = [];

  /* 1) テンプレートファイル名（例: archive-staff.php → archive-staff.js） */
  if (isset($GLOBALS['template'])) {
    $base = basename($GLOBALS['template'], '.php');
    $candidates[] = "src/js/{$base}.js";
  }

  /* 2) 投稿タイプ別汎用 (例: archive-{post_type}.js / single-{post_type}.js) */
  if (is_post_type_archive()) {
    $pt = get_query_var('post_type');
    $candidates[] = "src/js/archive-{$pt}.js";
  }
  if (is_singular()) {
    $pt = get_post_type();
    $candidates[] = "src/js/single-{$pt}.js";
  }

  /* 3) 固定ページ slug (例: page-{slug}.js) */
  if (is_page()) {
    $slug = get_post_field('post_name');
    $candidates[] = "src/js/page-{$slug}.js";
  }

  /* 重複除去 */
  $candidates = array_unique($candidates);

  /* ファイルが存在する最初の候補を採用 */
  foreach ($candidates as $rel_path) {

    $prod_path = get_template_directory() . '/dist/assets/' . basename($rel_path, '.js') . '.js';

    if ($is_dev) {
      /* dev は存在確認せず登録（404 はコンソール警告のみ）*/
      add_action(
        'wp_footer',
        fn() =>
        print('<script type="module" src="' . $vite . '/' . $rel_path . '"></script>')
      );
      break;
    } elseif (file_exists($prod_path)) {
      wp_enqueue_script(
        'page-script',
        $vite . '/' . basename($rel_path, '.js') . '.js',
        [],
        null,
        true
      );
      break;
    }
  }
});

/**
 * Vite 生成 JS を ES Modules として読み込む
 */
add_filter(
  'script_loader_tag',
  function ($tag, $handle, $src) {
    // モジュール扱いにしたいハンドル名を列挙
    $module_handles = ['theme-main', 'page-script'];

    if (in_array($handle, $module_handles, true)) {
      // 属性を上書きして返却
      $tag = sprintf(
        '<script type="module" src="%s" defer></script>',
        esc_url($src)
      );
    }
    return $tag;
  },
  10,
  3
);
//// vite用設定 end



////vite用設定
// function enqueue_theme_scripts()
// {
//   $host = $_SERVER['HTTP_HOST'];
//   $is_dev = (
//     strpos($host, 'localhost') !== false ||
//     strpos($host, '127.0.0.1') !== false
//   );

//   if ($is_dev) {
//     add_action('wp_footer', function () {
//       echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
//       echo '<script type="module" src="http://localhost:5173/src/main.js"></script>';
//     });

//     echo '<!-- Vite Development Mode Active: ' . esc_html($host) . ' -->';
//   } else {
//     // 本番は enqueue_script でOK（モジュールでなくても動く構成）
//     wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/src/main.css', [], null);
//     wp_enqueue_script('theme-script', get_template_directory_uri() . '/dist/src/main.js', [], null, true);

//     echo '<!-- Production Mode Active: ' . esc_html($host) . ' -->';
//   }
// }
// add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');
////vite用設定 end

//// カスタム投稿を管理画面で最新の記事順
add_action('pre_get_posts', function ($q) {
  if (!is_admin() || !$q->is_main_query()) {
    return;
  }

  global $pagenow;
  if ($pagenow !== 'edit.php') {
    return;
  }

  // 一覧画面の対象投稿タイプ（未指定は post）
  $pt = $_GET['post_type'] ?? 'post';

  // 通常投稿（post）は除外し、カスタム投稿タイプのみ対象
  if ($pt === 'post') {
    return;
  }

  // ユーザー操作（列クリック等）による orderby 指定がある場合は尊重する
  if (!empty($_GET['orderby'])) {
    return;
  }

  // 初期表示のみ最新順にする
  $q->set('orderby', 'date');
  $q->set('order', 'DESC');
});
//// end カスタム投稿を管理画面で最新の記事順

//// imgタグのカスタム関数を定義
function get_custom_image_tag($relative_path, $alt_text = '')
{
  $image_url = get_template_directory_uri() . '/assets/media/images/' . $relative_path;
  $image_path = get_template_directory() . '/assets/media/images/' . $relative_path;

  if (file_exists($image_path)) {
    list($width, $height) = getimagesize($image_path);
    return "<img src='$image_url' width='$width' height='$height' alt='$alt_text'>";
  } else {
    return "<img src='$image_url' alt='$alt_text'>"; // ファイルが存在しない場合は幅と高さなし
  }
}
//// end imgタグのカスタム関数を定義


function remove_menus()
{
  global $current_user;
  if ($current_user->ID != "1") {
    remove_menu_page('tools.php'); // ツール.
    remove_menu_page('profile.php'); // プロフィール
    remove_menu_page('meta-settings'); // 設定.
  }
}
add_action('admin_menu', 'remove_menus', 999);
function my_remove_adminbar_menu($wp_admin_bar)
{
  $wp_admin_bar->remove_menu('user-info');    // マイアカウント -> プロフィール
  $wp_admin_bar->remove_menu('edit-profile'); // マイアカウント -> プロフィール編集
}
add_action('admin_bar_menu', 'my_remove_adminbar_menu', 201);

//20191211 tane Add //type='text/javascript'を削除
function html5_validation($buffer)
{
  $buffer = preg_replace('/\s?type=(\'|")text\/(javascript|css)(\'|")/is', '', $buffer);
  return $buffer;
}
function buf_start()
{
  ob_start('html5_validation');
}
function buf_end()
{
  if (ob_get_level() > 0) {
    ob_end_flush();
  } else {
    error_log('バッファが存在しません。ob_end_flush() をスキップします。');
  }
}
add_action('after_setup_theme', 'buf_start');
add_action('shutdown', 'buf_end');
//カスタム投稿パーマリンク「/taxonomy/」削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy)
{
  return str_replace('/' . $taxonomy . '/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set', 11, 3);
// カスタム分類アーカイブ用のリライトルールを追加する
add_rewrite_rule('quakerstate/news/([^/]+)/page/([0-9]+)/?$', 'index.php?newscat=$matches[1]&paged=$matches[2]', 'top'); //2ページ目以降用

//表示件数制御
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query)
{
  if (is_admin() || !$query->is_main_query()) return;
  if ($query->is_month()) { // 月別アーカイブ
    $query->set('posts_per_page', 10); //　-1ですべて表示
  }
}

//Gutenbergを無効化
//add_filter( 'use_block_editor_for_post', '__return_false' ); //全てのコンテンツで無効化
//個別に無効化する場合いかに
add_filter('use_block_editor_for_post_type', 'disable_block_editor', 10, 2);
function disable_block_editor($use_block_editor, $post_type)
{
  if ($post_type === 'page') return false; //固定ページ
  //if ( $post_type === 'post' ) return false;//投稿
  //if ( $post_type === '投稿タイプ名' ) return false;//投稿タイプ
  return $use_block_editor;
}
//不要なwp_headタグを除去
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//type属性削除
function remove_script_type($tag)
{
  return str_replace("type='text/javascript' ", "", $tag);
}
add_filter('script_loader_tag', 'remove_script_type');
//絵文字表示用の script と css を無効化
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);
$map_key = 'AIzaSyDMnE5YgF1PjrnrzBjKn6Qmk_ki6VbSp1E';

/**
 * ACF 関連初期化（翻訳読み込みを含め、init 以降で実行）
 */
add_action('acf/init', function () {

  // Google API キー設定
  acf_update_setting('google_api_key', 'AIzaSyDMnE5YgF1PjrnrzBjKn6Qmk_ki6VbSp1E');

  // オプションページ登録
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
      'page_title'  => '共通META',
      'menu_title'  => '共通META',
      'menu_slug'   => 'meta-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false,
    ]);
  }
});

// 投稿画面のカテゴリー選択を制限
add_action('admin_print_footer_scripts', 'limit_category_select');
function limit_category_select()
{
?>
  <script type="text/javascript">
    jQuery(function($) {
      // 投稿画面のカテゴリー選択を制限
      var cat_checklist = $('#taxonomy-coursetag00 .categorychecklist input[type=checkbox],#taxonomy-coursetag02 .categorychecklist input[type=checkbox],#taxonomy-coursetag03 .categorychecklist input[type=checkbox]');
      cat_checklist.click(function() {
        $(this).parents('#taxonomy-coursetag00 .categorychecklist input[type=checkbox],#taxonomy-coursetag02 .categorychecklist input[type=checkbox],#taxonomy-coursetag03 .categorychecklist input[type=checkbox]').find('input[type=checkbox]').attr('checked', false);
        $(this).attr('checked', true);
      });

      // クイック編集のカテゴリー選択を制限
      var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
      quickedit_cat_checklist.click(function() {
        $(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
        $(this).attr('checked', true);
      });
    });
  </script>
<?php
}
function change_category_to_radio()
{
?>
  <script>
    jQuery(function($) {
      // カテゴリーをラジオボタンに変更
      $('.categorychecklist input[type=checkbox],#taxonomy-coursetag02 .categorychecklist input[type=checkbox],#taxonomy-coursetag03 .categorychecklist input[type=checkbox]').each(function() {
        $(this).replaceWith($(this).clone().attr('type', 'radio'));
      });
      // 「新規カテゴリーを追加」を非表示
      $('#category-adder,#cuisinecat-adder').hide();
      // 「よく使うもの」を非表示
      $('#category-tabs,#cuisinecat-tabs').hide();
    });
  </script>

<?php
}
add_action('admin_head-post-new.php', 'change_category_to_radio');
add_action('admin_head-post.php', 'change_category_to_radio');
//パンくず//
function the_pankuzu($args = array())
{
  global $post;
  $str = '';
  $defaults = array(
    'id' => "breadcrumbs",
    'class' => "clearfix",
    'home' => "HOME",
    'search' => "で検索した結果",
    'tag' => "タグ",
    'author' => "投稿者",
    'notfound' => "ページが存在しません",
    'separator' => ''
  );
  $args = wp_parse_args($args, $defaults);
  extract($args, EXTR_SKIP);
  if (is_home()) {
    echo  '<ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb">HOME<li></li></ol>';
  }
  if (!is_home() && !is_admin()) {
    $str .= '<ol itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
    $str .= '<li class="breadcrumb_top" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . home_url() . '/" itemprop="url"><span itemprop="title">HOME</span></a></li>';
    $my_taxonomy = get_query_var('taxonomy');
    $cpt = get_query_var('post_type');
    if ($my_taxonomy && is_tax($my_taxonomy)) {
      $my_tax = get_queried_object();
      $post_types = get_taxonomy($my_taxonomy)->object_type;
      $cpt = $post_types[0];
      $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_post_type_archive_link($cpt) . '" itemprop="url"><span itemprop="title">' . get_post_type_object($cpt)->label . '</span></a></li>';

      if ($my_tax->parent != 0) {
        $ancestors = array_reverse(get_ancestors($my_tax->term_id, $my_tax->taxonomy));
        foreach ($ancestors as $ancestor) {
          $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_term_link($ancestor, $my_tax->taxonomy) . '" itemprop="url"><span itemprop="title">' . get_term($ancestor, $my_tax->taxonomy)->name . '<a/span></a></li>';
        }
      }
      $str .= '<li>' . $my_tax->name . '</li>';
    } elseif (is_category()) {
      $cat = get_queried_object();
      if ($cat->parent != 0) {
        $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
        foreach ($ancestors as $ancestor) {
          $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . get_cat_name($ancestor) . '</span></a></li>';
        }
      }
      $str .= '<li class="last" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . $cat->name . '</span></a></li>';
    } elseif (is_post_type_archive()) {
      $cpt = get_query_var('post_type');
      $str .= '<li>' . get_post_type_object($cpt)->label . '</li>';
    } elseif ($cpt && is_singular($cpt)) {
      $taxes = get_object_taxonomies($cpt);
      $mytax = $taxes[0];
      $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/' . get_post_type_object($cpt)->name . '/" itemprop="url"><span itemprop="title">' . get_post_type_object($cpt)->label . '</span></a></li>';
      $taxes = get_the_terms($post->ID, $mytax);
      $tax = get_youngest_tax($taxes, $mytax);
      if ($tax->parent != 0) {
        $ancestors = array_reverse(get_ancestors($tax->term_id, $mytax));
        foreach ($ancestors as $ancestor) {
          $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_term_link($ancestor, $mytax) . '" itemprop="url"><span itemprop="title">' . get_term($ancestor, $mytax)->name . '</span></a></li>';
        }
      }
      $str .= '<li class="last"><a href="' . get_the_permalink() . '" itemprop="url">' . $post->post_title . '</a></li>';
    } elseif (is_single()) {
      $categories = get_the_category($post->ID);
      $cat = get_youngest_cat($categories);
      if ($cat->parent != 0) {
        $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
        foreach ($ancestors as $ancestor) {
          $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($ancestor) . '" itemprop="url"><span itemprop="title">' . get_cat_name($ancestor) . '</span></a></li>';
        }
      }
      $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_category_link($cat->term_id) . '" itemprop="url"><span itemprop="title">' . $cat->cat_name . '</span></a></li>';
      $str .= '<li class="last"><a href="' . get_the_permalink() . '" itemprop="url"><span itemprop="title">' . $post->post_title . '</span></a></li>';
    } elseif (is_page()) {
      if ($post->post_parent != 0) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        foreach ($ancestors as $ancestor) {
          $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_permalink($ancestor) . '" itemprop="url"><span itemprop="title">' . get_the_title($ancestor) . '</span></a></li>';
        }
      }
      $str .= '<li class="last"><a href="' . get_the_permalink() . '" itemprop="url">' . $post->post_title . '</a></li>';
    } elseif (is_date()) {
      if (get_query_var('day') != 0) {
        $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_year_link(get_query_var('year')) . '" itemprop="url"><span itemprop="title">' . get_query_var('year') . '年</span></a></li>';
        $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_month_link(get_query_var('year'), get_query_var('monthnum')) . '" itemprop="url"><span itemprop="title">' . get_query_var('monthnum') . '月</span></a></li>';
        $str .= '<li>' . get_query_var('day') . '日</li>';
      } elseif (get_query_var('monthnum') != 0) {
        $str .= '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_year_link(get_query_var('year')) . '" itemprop="url"><span itemprop="title">' . get_query_var('year') . '年</span></a></li>';
        $str .= '<li>' . get_query_var('monthnum') . '月</li>';
      } else {
        $str .= '<li class="last" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . get_year_link(get_query_var('year')) . '" itemprop="url"><span itemprop="title">' . get_query_var('year') . '年</span></a></li>';
      }
    } elseif (is_search()) {
      $str .= '<li>「' . get_search_query() . '」' . $search . '</li>';
    } elseif (is_author()) {
      $str .= '<li>' . $author . ' : ' . get_the_author_meta('display_name', get_query_var('author')) . '</li>';
    } elseif (is_tag()) {
      $str .= '<li>' . $tag . ' : ' . single_tag_title('', false) . '</li>';
    } elseif (is_attachment()) {
      $str .= '<li>' . $post->post_title . '</li>';
    } elseif (is_404()) {
      $str .= '<li>' . $notfound . '</li>';
    } else {
      $str .= '<li>' . wp_title('', true) . '</li>';
    }
    $str .= '</ol>';
  }
  echo $str;
}
function get_youngest_cat($categories)
{
  global $post;
  if (count($categories) == 1) {
    $youngest = $categories[0];
  } else {
    $count = 0;
    foreach ($categories as $category) {
      $children = get_term_children($category->term_id, 'category');
      if ($children) {
        if ($count < count($children)) {
          $count = count($children);
          $lot_children = $children;
          foreach ($lot_children as $child) {
            if (in_category($child, $post->ID)) {
              $youngest = get_category($child);
            }
          }
        }
      } else {
        $youngest = $category;
      }
    }
  }
  return $youngest;
}
function get_youngest_tax($taxes, $mytaxonomy)
{
  global $post;
  if (count($taxes) == 1) {
    /*$youngest = $taxes[ key( $taxes )];*/
  } else {
    $count = 0;
    foreach ($taxes as $tax) {
      $children = get_term_children($tax->term_id, $mytaxonomy);
      if ($children) {
        if ($count < count($children)) {
          $count = count($children);
          $lot_children = $children;
          foreach ($lot_children as $child) {
            if (is_object_in_term($post->ID, $mytaxonomy)) {
              $youngest = get_term($child, $mytaxonomy);
            }
          }
        }
      } else {
        $youngest = $tax;
      }
    }
  }
  return $youngest;
}

//// ページナビ
function pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2) + 1;
  global $paged;
  if (empty($paged)) $paged = 1;

  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    echo "<div class=\"pagination\"><ul>";

    // 最初のページへのリンク
    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li class='head'><a href='" . get_pagenum_link(1) . "'>Top</a></li>";

    // 前のページへのリンク
    if ($paged > 1 && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged - 1) . "\" class=\"prev\"'>＜</a></li>";

    // 前後2ページを考慮しつつ、常に5ページ表示するためのロジック
    $start = max(1, $paged - $range);
    $end = min($pages, $paged + $range);

    if ($start > 1) {
      $offset = $start - 1;
      $start -= min($offset, 5 - ($end - $start + 1));
    }

    if ($end < $pages) {
      $offset = $pages - $end;
      $end += min($offset, 5 - ($end - $start + 1));
    }

    for ($i = $start; $i <= $end; $i++) {
      if ($i >= 1 && $i <= $pages) {
        echo ($paged == $i) ? "<li class=\"active\"><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
      }
    }

    // 次のページへのリンク
    if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"" . get_pagenum_link($paged + 1) . "\" class=\"next\">＞</a></li>";

    // 最後のページへのリンク
    if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<li class='last'><a href='" . get_pagenum_link($pages) . "'>Last</a></li>";

    echo "</ul></div>\n";
  }
}
////end ページナビ

// contact form 7 のファイルを必要な場合のみ読み込む
function wpcf7_file_control()
{
  add_filter("wpcf7_load_js", "__return_false");
  add_filter("wpcf7_load_css", "__return_false");

  if ((is_page("contact") || is_page("entry-01") || is_page("entry-02"))) {
    if (function_exists("wpcf7_enqueue_scripts")) wpcf7_enqueue_scripts();
    if (function_exists("wpcf7_enqueue_styles")) wpcf7_enqueue_styles();
  }
}
add_action("template_redirect", "wpcf7_file_control");
/*最上位ページスラッグ取得用 */
function ps_get_root_page($cur_post, $cnt = 0)
{
  if ($cnt > 100) {
    return false;
  }
  $cnt++;
  if ($cur_post->post_parent == 0) {
    $root_page = $cur_post;
  } else {
    $root_page = ps_get_root_page(get_post($cur_post->post_parent), $cnt);
  }
  return $root_page;
}


//「WordPress のご利用ありがとうございます。」を非表示
add_filter('admin_footer_text', 'custom_admin_footer');
function custom_admin_footer() {}
//更新のお知らせを非表示
function wphidenag()
{
  remove_action('admin_notices', 'update_nag');
}
//プラグイン更新のお知らせを非表示
add_action('admin_menu', 'remove_counts');
function remove_counts()
{
  global $menu, $submenu;
  if (isset($menu[65]) && isset($menu[65][0])) {
    $menu[65][0] = 'プラグイン';
  }

  if (isset($submenu['index.php'][10]) && isset($submenu['index.php'][10][0])) {
    $submenu['index.php'][10][0] = '更新';
  }
}
add_action('admin_menu', 'wphidenag');
//管理画面バージョン非表示
function remove_footer_version()
{
  remove_filter('update_footer', 'core_update_footer');
}
add_action('admin_menu', 'remove_footer_version');
// 管理バーにログアウトを追加
function add_new_item_in_admin_bar()
{
  global $wp_admin_bar;
  $wp_admin_bar->add_menu(array(
    'id' => 'new_item_in_admin_bar',
    'title' => __('ログアウト'),
    'href' => wp_logout_url()
  ));
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');
//ヘルプを消す
function disable_help_link()
{
  echo '<style type="text/css">
        #wp-admin-bar-wp-logo {display: none !important;}
        </style>';
}
add_action('admin_head', 'disable_help_link');
// head整理
// generator
remove_action('wp_head', 'wp_generator');
// rel="shortlink"
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// WLW(Windows Live Writer) wlwmanifest.xml
remove_action('wp_head', 'wlwmanifest_link');
// RSD xmlrpc.php?rsd
remove_action('wp_head', 'rsd_link');
function disable_load_opensans(&$styles)
{
  $styles->remove('open-sans');
  $styles->add('open-sans', null);
}
add_action('wp_default_styles', 'disable_load_opensans');

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}
// カスタム投稿タイプでカテゴリ未選択時にデフォルトのタームを設定
function add_defaultcategory_automatically($post_ID)
{
  global $wpdb;
  // 設定されているカスタム分類のタームを取得
  $curTerm = wp_get_object_terms($post_ID, 'newscat');
  if (0 == count($curTerm)) {
    $defaultTerm = array(4);
    wp_set_object_terms($post_ID, $defaultTerm, 'newscat');
  }
}
add_action('publish_news', 'add_defaultcategory_automatically');

//editor-style.css
function add_editor_style_cb()
{
  add_editor_style();
}
add_action('admin_init', 'add_editor_style_cb');

//Custom post type permlinks アップデート停止
add_filter('site_option__site_transient_update_plugins', 'MyPlugin_hide_update_notice');
function MyPlugin_hide_update_notice($data)
{
  $plugin_name = 'custom-post-type-permalinks/custom-post-type-permalinks.php';
  if (isset($data->response[$plugin_name])) {
    unset($data->response[$plugin_name]);
  }
  return $data;
}

//// 構造化データ（共通）
function ifh_build_store_node(array $s, string $org_id): array
{
  $node = [
    '@type' => $s['type'] ?? 'HairSalon',
    '@id' => $s['id'],
    'name' => $s['name'],
    'url' => $s['url'],
    'telephone' => $s['tel'] ?? null,
    'parentOrganization' => ['@id' => $org_id],
    'address' => [
      '@type' => 'PostalAddress',
      'addressCountry' => 'JP',
      'addressRegion' => $s['region'] ?? '群馬県',
      'addressLocality' => $s['locality'] ?? null,
      'streetAddress' => $s['street'] ?? null,
    ],
  ];

  // null を削除
  $node = array_filter($node, fn($v) => $v !== null);
  $node['address'] = array_filter($node['address'], fn($v) => $v !== null);

  // 任意追加（ページ側で付与したい項目）
  if (!empty($s['openingHours'])) {
    $node['openingHours'] = $s['openingHours'];
  }
  if (!empty($s['openingHoursSpecification'])) {
    $node['openingHoursSpecification'] = $s['openingHoursSpecification'];
  }
  if (!empty($s['amenityFeature'])) {
    $node['amenityFeature'] = $s['amenityFeature'];
  }
  if (!empty($s['description'])) {
    $node['description'] = $s['description'];
  }
  if (!empty($s['areaServed'])) {
    $node['areaServed'] = $s['areaServed'];
  }

  return $node;
}

function ifh_output_structured_data_by_config(array $cfg): void
{
  $home = home_url('/');

  // ページ判定
  $is_target = false;
  if (!empty($cfg['when']) && is_callable($cfg['when'])) {
    $is_target = (bool) $cfg['when']();
  }
  if (!$is_target) {
    return;
  }

  $page_url = $cfg['page_url'] ?? $home;

  $org_id  = $home . '#organization';
  $site_id = $home . '#website';
  $page_id = $page_url . '#webpage';

  $logo = get_template_directory_uri() . '/assets/media/images/common/ifhgroup_logo.svg';

  $local_business_graph = [];
  $item_list_elements = [];

  $pos = 1;
  $stores = $cfg['stores'] ?? [];
  foreach ($stores as $s) {
    $local_business_graph[] = ifh_build_store_node($s, $org_id);

    // ItemList を出したいページのみ
    if (!empty($cfg['use_item_list'])) {
      $item_list_elements[] = [
        '@type' => 'ListItem',
        'position' => $pos,
        'item' => ['@id' => $s['id']],
      ];
      $pos++;
    }
  }

  $graph = [];

  // Organization
  $graph[] = [
    '@type' => 'Organization',
    '@id' => $org_id,
    'name' => 'Ifh（イフ）グループ',
    'url' => $home,
    'logo' => $logo,
    'sameAs' => [
      'https://www.instagram.com/ifh_group/',
    ],
    'inLanguage' => 'ja',
  ];

  // WebSite
  $graph[] = [
    '@type' => 'WebSite',
    '@id' => $site_id,
    'url' => $home,
    'name' => get_bloginfo('name'),
    'publisher' => ['@id' => $org_id],
    'inLanguage' => 'ja',
  ];

  // WebPage
  $webpage = [
    '@type' => 'WebPage',
    '@id' => $page_id,
    'url' => $page_url,
    'name' => wp_get_document_title(),
    'isPartOf' => ['@id' => $site_id],
    'about' => ['@id' => $org_id],
    'inLanguage' => 'ja',
  ];

  if (!empty($cfg['page_description'])) {
    $webpage['description'] = $cfg['page_description'];
  }

  if (!empty($cfg['use_item_list'])) {
    $webpage['mainEntity'] = [
      '@type' => 'ItemList',
      'name' => $cfg['item_list_name'] ?? 'Salon List',
      'itemListElement' => $item_list_elements,
    ];
  }

  $webpage['primaryImageOfPage'] = [
    '@type' => 'ImageObject',
    'url' => $logo,
  ];

  $graph[] = $webpage;

  // Breadcrumb（必要なページのみ）
  if (!empty($cfg['breadcrumb'])) {
    $graph[] = [
      '@type' => 'BreadcrumbList',
      '@id' => $page_url . '#breadcrumb',
      'itemListElement' => $cfg['breadcrumb'],
    ];
  }

  // LocalBusiness 群
  $graph = array_merge($graph, $local_business_graph);

  $schema = [
    '@context' => 'https://schema.org',
    '@graph' => $graph,
  ];

  echo "\n" . '<script type="application/ld+json">' .
    wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
    "</script>\n";
}

add_action('wp_head', function () {

  $home = home_url('/');

  // 共通店舗マスター（トップで使用する全店）
  $stores_all = [
    [
      'id' => home_url('/honten/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'Ifh honten',
      'url' => home_url('/honten/'),
      'tel' => '+81-27-381-5133',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町1802-306',
    ],
    [
      'id' => home_url('/iizuka/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'Ifh iizuka',
      'url' => home_url('/iizuka/'),
      'tel' => '+81-27-388-9675',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '飯塚町222-3',
    ],
    [
      'id' => home_url('/bianca/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'BIANCA maebashi',
      'url' => home_url('/bianca/'),
      'tel' => '+81-27-289-9332',
      'region' => '群馬県',
      'locality' => '前橋市',
      'street' => '元総社町1983',
    ],
    [
      'id' => home_url('/bianca_isesaki/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'BIANCA isesaki',
      'url' => home_url('/bianca_isesaki/'),
      'tel' => '+81-270-27-4572',
      'region' => '群馬県',
      'locality' => '伊勢崎市',
      'street' => '安堀町207-1',
    ],
    [
      'id' => home_url('/gumigumi/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'GumiGumi by Ifh',
      'url' => home_url('/gumigumi/'),
      'tel' => '+81-27-372-0304',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町971-3',
    ],
    [
      'id' => home_url('/ang_n_honten/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail honten',
      'url' => home_url('/ang_n_honten/'),
      'tel' => '+81-27-381-5133',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町1802-306',
    ],
    [
      'id' => home_url('/ang_n_iizuka/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail iizuka',
      'url' => home_url('/ang_n_iizuka/'),
      'tel' => '+81-27-388-9675',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '飯塚町222-3',
    ],
    [
      'id' => home_url('/ang_n_maebashi/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail maebashi',
      'url' => home_url('/ang_n_maebashi/'),
      'tel' => '+81-27-289-9332',
      'region' => '群馬県',
      'locality' => '前橋市',
      'street' => '元総社町1983',
    ],
    [
      'id' => home_url('/ang_n_isesaki/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail isesaki',
      'url' => home_url('/ang_n_isesaki/'),
      'tel' => '+81-270-27-4572',
      'region' => '群馬県',
      'locality' => '伊勢崎市',
      'street' => '安堀町207-1',
    ],
    [
      'id' => home_url('/ang_e_honten/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye honten',
      'url' => home_url('/ang_e_honten/'),
      'tel' => '+81-27-381-5133',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町1802-306',
    ],
    [
      'id' => home_url('/ang_e_iizuka/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye iizuka',
      'url' => home_url('/ang_e_iizuka/'),
      'tel' => '+81-27-388-9675',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '飯塚町222-3',
    ],
    [
      'id' => home_url('/ang_e_maebashi/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye maebashi',
      'url' => home_url('/ang_e_maebashi/'),
      'tel' => '+81-27-289-9332',
      'region' => '群馬県',
      'locality' => '前橋市',
      'street' => '元総社町1983',
    ],
    [
      'id' => home_url('/ang_e_isesaki/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye isesaki',
      'url' => home_url('/ang_e_isesaki/'),
      'tel' => '+81-270-27-4572',
      'region' => '群馬県',
      'locality' => '伊勢崎市',
      'street' => '安堀町207-1',
    ],
  ];

  // 高崎ページ用（全店から抽出し、必要項目のみ上書き）
  $stores_takasaki = array_values(array_filter($stores_all, function ($s) {
    return ($s['locality'] ?? '') === '高崎市'
      && in_array($s['url'], [home_url('/honten/'), home_url('/iizuka/'), home_url('/gumigumi/')], true);
  }));

  foreach ($stores_takasaki as &$s) {
    $s['openingHours'] = 'Mo-Fr 10:00-19:00 Sa-Su 09:00-19:00';
    $s['openingHoursSpecification'] = [
      [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        'opens' => '10:00',
        'closes' => '19:00',
      ],
      [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Saturday', 'Sunday'],
        'opens' => '09:00',
        'closes' => '19:00',
      ],
    ];
    $s['amenityFeature'] = [
      [
        '@type' => 'LocationFeatureSpecification',
        'name' => '駐車場',
        'value' => true,
      ],
    ];
    $s['description'] = '受付目安：カット18:00まで、パーマ・カラー17:00まで。定休日：第2月曜日。駐車場あり。';
    $s['areaServed'] = [
      '@type' => 'City',
      'name' => '高崎市',
    ];
  }
  unset($s);

  // ページ別設定
  $configs = [
    // トップ
    [
      'when' => fn() => (is_front_page() || is_home()),
      'page_url' => $home,
      'use_item_list' => true,
      'item_list_name' => 'Salon List',
      'stores' => $stores_all,
    ],

    // 高崎
    [
      'when' => fn() => is_page('takasaki'),
      'page_url' => home_url('/takasaki/'),
      'page_description' => '高崎市の美容室Ifh（イフ）グループの店舗一覧。',
      'use_item_list' => false,
      'breadcrumb' => [
        [
          '@type' => 'ListItem',
          'position' => 1,
          'name' => 'ホーム',
          'item' => $home,
        ],
        [
          '@type' => 'ListItem',
          'position' => 2,
          'name' => '高崎市の美容室「Ifh（イフ）」',
          'item' => home_url('/takasaki/'),
        ],
      ],
      'stores' => $stores_takasaki,
    ],
  ];

  foreach ($configs as $cfg) {
    ifh_output_structured_data_by_config($cfg);
  }
}, 20);
//// end 構造化データ（共通）
