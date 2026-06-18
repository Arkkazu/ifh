<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth h-full">

<head>
  <!-- GoogleAnalytics -->
  <?php
  $nonce = $GLOBALS['csp_nonce'] ?? '';

  $home_host = wp_parse_url(home_url('/'), PHP_URL_HOST);
  $home_host = is_string($home_host) ? strtolower($home_host) : '';

  $req_host  = $_SERVER['HTTP_HOST'] ?? '';
  $req_host  = is_string($req_host) ? strtolower($req_host) : '';
  $req_host  = preg_replace('/:\d+$/', '', $req_host); // ポート除去

  $is_prod = ($req_host === 'ifh.jp' || str_ends_with($req_host, '.ifh.jp'));

  if ($is_prod && !empty($nonce)) :
  ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script nonce="<?php echo esc_attr($nonce); ?>">
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }

      window.addEventListener('load', function() {
        const script = document.createElement('script');
        script.src = 'https://www.googletagmanager.com/gtag/js?id=G-G8NWSESN88';
        script.async = true;
        document.head.appendChild(script);

        gtag('js', new Date());
        gtag('config', 'G-G8NWSESN88');
      });
    </script>
  <?php else : ?>
    <!-- テストサイト -->
  <?php endif; ?>
  <!-- GoogleAnalytics -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- DNS プリフェッチ・preconnect（パフォーマンス向上） -->
  <link rel="preconnect" href="https://www.googletagmanager.com">
  <link rel="dns-prefetch" href="//www.googletagmanager.com">
  <link rel="dns-prefetch" href="//www.google-analytics.com">
  <link rel="dns-prefetch" href="//beauty.hotpepper.jp">
  <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
  <link rel="dns-prefetch" href="//maps.app.goo.gl">

  <?php
  // ===== SEO設定（title / description） =====
  $meta_title    = get_field('meta_title');
  $meta_desc     = get_field('meta_desc');
  $ogp_img       = get_field('ogp_img'); // ACF画像（返り値は「配列/URL/ID」いずれもあり得る）
  $common_title  = get_field('common_title', 'option');
  $common_desc   = get_field('common_desc', 'option');

  $title = '';
  $desc  = '';

  $desc = $meta_desc ? $meta_desc : $common_desc;

  if (is_home() || is_front_page()) {
    $title = $meta_title ? $meta_title : get_bloginfo('name');
  } elseif (is_404()) {
    $title_404 = get_field('title_404', 'option');
    $desc_404  = get_field('desc_404', 'option');

    $title = $title_404 ? $title_404 : ('お探しのページは見つかりませんでした | ' . get_bloginfo('name'));
    $desc  = $desc_404  ? $desc_404  : $common_desc;
  } elseif (is_page('thanks')) {
    $title = $meta_title ? $meta_title : ('お問い合わせ完了 | ' . get_bloginfo('name'));
    $desc  = $meta_desc  ? $meta_desc  : 'プロジェクト名に関するお問合せ完了ページです。';
  } elseif (is_tax('newscat')) {
    $my_term   = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $term_name = $my_term ? $my_term->name : '';

    $title = $meta_title ? $meta_title : ($term_name . ' | ' . get_bloginfo('name'));
    $desc  = $meta_desc  ? $meta_desc  : ('プロジェクト名に関するお知らせ「カテゴリー : ' . $term_name . '」の一覧ページです。');
  } elseif (is_post_type_archive('youtube')) {
    $title = 'YouTube | ' . get_bloginfo('name');
    $desc  = 'Ifhの公式YouTubeチャンネルにアップしている動画一覧です。是非、「いいね」を押してください。';
  } elseif (is_post_type_archive('staff')) {
    $title = 'staff | ' . get_bloginfo('name');
    $desc  = '各店舗ごとのスタッフ一覧です。スタッフ詳細情報も掲載中です。';
  } elseif (is_post_type_archive('news')) {
    $title = 'お知らせ | ' . get_bloginfo('name');
    $desc  = 'プロジェクト名に関するお知らせの一覧ページです。';

    if (is_date()) {
      $meta_date = get_the_date('Y');
      $title     = $meta_title ? $meta_title : ('お知らせ | ' . get_bloginfo('name'));
      $desc      = $meta_desc  ? $meta_desc  : ('プロジェクト名に関するお知らせ「年別アーカイブ : ' . $meta_date . '年」の一覧ページです。');
    }
  } elseif (is_singular('news')) {
    $title = $meta_title ? $meta_title : (get_the_title() . ' | ' . get_bloginfo('name'));
    $desc  = $meta_desc  ? $meta_desc  : ('プロジェクト名に関するお知らせ「' . get_the_title() . '」の詳細ページです。');
  } elseif (is_post_type_archive('collection')) {
    $title = 'Collection | ' . get_bloginfo('name');
    $desc  = $meta_desc ? $meta_desc : ('プロジェクト名に関するお知らせ「' . get_the_title() . '」の詳細ページです。');
  } elseif (is_post_type_archive('nail_light')) {
    $title = 'ライトコース ネイルギャラリー | ' . get_bloginfo('name');
    $desc  = $meta_desc ? $meta_desc : 'ライトコース ネイルギャラリーの一覧ページです。';
  } elseif (is_post_type_archive('nail_standard')) {
    $title = 'スタンダードコース ネイルギャラリー | ' . get_bloginfo('name');
    $desc  = $meta_desc ? $meta_desc : 'スタンダードコース ネイルギャラリーの一覧ページです。';
  } elseif (is_page('takasaki')) {
    $title = $meta_title ? $meta_title : '高崎市の美容室｜Ifh（イフ）グループ【市内3店舗・駐車場完備】';
    $desc  = $meta_desc  ? $meta_desc  : '高崎市の美容室「Ifh（イフ）」グループ。市内3店舗展開の地域密着型美容室。縮毛矯正・髪質改善・ヘアカラー・白髪染めなど豊富なメニュー対応。全店舗駐車場完備・ネット予約可能。高崎市で美容室をお探しならIfhへ。';
  } else {
    $title = $meta_title ? $meta_title : (get_the_title() . ' | ' . get_bloginfo('name'));

    if (is_category()) {
      wp_reset_query();
      $cat = get_the_category();
      $cat = $cat[0] ?? null;

      if ($cat) {
        $cat_id   = $cat->cat_ID;
        $catKey   = 'category_' . $cat_id;
        $title    = get_cat_name($cat->term_id) . ' | ' . get_bloginfo('name');

        $meta_desc_cat   = get_field('meta_desc', $catKey);
        $common_desc_cat = get_field('common_desc', $catKey);

        if ($meta_desc_cat) {
          $desc = $meta_desc_cat;
        } elseif ($common_desc_cat) {
          $desc = $common_desc_cat;
        } else {
          $desc = get_cat_name($cat->term_id) . 'の一覧ページです。';
        }
      }
    }

    if (is_single()) {
      $newsCnt = 1;
      $single_txt = '';

      if (get_the_content()) {
        $single_txt = get_the_content();
      } else {
        if (function_exists('has_sub_field') && has_sub_field('modulle')) :
          while (has_sub_field('modulle')) :
            $tmp01_txt = '';
            $tmp08_txt = '';

            if (get_row_layout() === 'mod_tmp02') :
              $tmp01_txt = (string) get_sub_field('mod_editer');
            endif;

            if (get_row_layout() === 'mod_tmp03') :
              $tmp08_txt = (string) get_sub_field('mod_imgset_txt');
            endif;

            $single_txt .= $tmp01_txt . $tmp08_txt;
            if ($single_txt) {
              $newsCnt++;
            }
            if ($newsCnt >= 2) {
              continue;
            }
          endwhile;
        endif;
      }

      if ($meta_desc) {
        $desc = $meta_desc;
      } elseif ($common_desc) {
        $desc = $common_desc;
      } else {
        $desc = get_the_title() . 'のページです。';
      }
    }
  }

  // ===== OGP設定（必ず初期化し、未定義を発生させない） =====
  $common_og_title     = get_field('common_og_title', 'option');
  $common_og_img       = get_field('common_og_img', 'option');
  $common_og_site_name = get_field('common_og_site_name', 'option');

  $og_site_name = $common_og_site_name ? $common_og_site_name : ($common_og_title ?: get_bloginfo('name'));

  // 初期値（必須）
  $og_title = $common_og_title ? $common_og_title : get_bloginfo('name');
  $og_type  = 'website';
  $og_url   = home_url('/');
  $og_img   = '';

  // 共通OGP画像（配列/URLを吸収）
  if (is_array($common_og_img) && !empty($common_og_img['url'])) {
    $og_img = $common_og_img['url'];
  } elseif (is_string($common_og_img) && $common_og_img !== '') {
    $og_img = $common_og_img;
  }

  // ページ固有のACF ogp_img（配列/URL/IDを吸収）
  if (is_array($ogp_img) && !empty($ogp_img['url'])) {
    $og_img = $ogp_img['url'];
  } elseif (is_string($ogp_img) && $ogp_img !== '') {
    $og_img = $ogp_img;
  } elseif (is_numeric($ogp_img) && (int)$ogp_img > 0) {
    $tmp = wp_get_attachment_image_url((int)$ogp_img, 'full');
    if ($tmp) {
      $og_img = $tmp;
    }
  }

  // 条件ごとの title/type/url
  if (is_home() || is_front_page()) {
    $og_title = $common_og_title ? $common_og_title : get_bloginfo('name');
    $og_type  = 'website';
    $og_url   = home_url('/');
  } elseif (is_404()) {
    $og_title = isset($title_404) && $title_404 ? $title_404 : ('お探しのページは見つかりませんでした | ' . get_bloginfo('name'));
    $og_type  = 'website';
    $og_url   = home_url('/404/');
  } elseif (is_tax('newscat')) {
    $my_term   = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $term_name = $my_term ? $my_term->name : '';
    $og_title  = $meta_title ? $meta_title : ($term_name . ' | ' . get_bloginfo('name'));
    $og_type   = 'article';
    $og_url    = (function_exists('get_term_link') && $my_term) ? get_term_link($my_term) : home_url('/');
  } elseif (is_post_type_archive('collection')) {
    $og_title = 'Collection | ' . get_bloginfo('name');
    $og_type  = 'article';
    $og_url   = get_post_type_archive_link('collection');
  } elseif (is_post_type_archive('news')) {
    $og_title = 'お知らせ | ' . get_bloginfo('name');
    $og_type  = 'article';
    $og_url   = get_post_type_archive_link('news');
  } else {
    $og_title = get_the_title() . '｜' . ($common_og_title ? $common_og_title : get_bloginfo('name'));
    $og_type  = 'article';
    $og_url   = get_permalink();

    // 投稿詳細はアイキャッチ優先
    if (is_single()) {
      if (has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
        if (!empty($large_image_url[0])) {
          $og_img = $large_image_url[0];
        }
      } else {
        // ACF ogp_img を再取得（配列/URL/ID吸収）
        $tmp_ogp = get_field('ogp_img');
        if (is_array($tmp_ogp) && !empty($tmp_ogp['url'])) {
          $og_img = $tmp_ogp['url'];
        } elseif (is_string($tmp_ogp) && $tmp_ogp !== '') {
          $og_img = $tmp_ogp;
        } elseif (is_numeric($tmp_ogp) && (int)$tmp_ogp > 0) {
          $tmp = wp_get_attachment_image_url((int)$tmp_ogp, 'full');
          if ($tmp) {
            $og_img = $tmp;
          }
        }
      }
    }
  }

  // 最終防波堤（空のまま出力されないようにする）
  if (!$og_img) {
    $og_img = home_url('/wp-content/uploads/default-ogp.jpg');
  }

  // canonical（全ページで出力）
  // $canonical_url = is_singular() ? get_permalink() : home_url(add_query_arg([], $wp->request ?? '') . '/');
  // if (is_front_page()) {
  //   $canonical_url = home_url('/');
  // }
  ?>

  <title><?php echo esc_html($title); ?></title>
  <meta name="description" content="<?php echo esc_attr($desc); ?>">

  <?php
  // $canonical_url = set_url_scheme(get_permalink(), 'https');
  // echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">';
  ?>

  <?php if (is_page('takasaki')) : ?>
  <link rel="canonical" href="<?php echo esc_url(home_url('/takasaki/')); ?>">
  <?php endif; ?>

  <meta property="og:title" content="<?php echo esc_html($title); ?>">
  <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
  <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
  <meta property="og:image" content="<?php echo esc_url($og_img); ?>">
  <meta property="og:description" content="<?php echo esc_attr($desc); ?>">
  <meta property="og:site_name" content="<?php echo esc_attr($og_site_name); ?>">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_html($title); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr($desc); ?>">
  <meta name="twitter:image" content="<?php echo esc_url($og_img); ?>">

  <link rel="shortcut icon" href="/favicon.ico">

  <meta name="robots" content="max-image-preview:large">

  <?php if (is_404()) : ?>
    <meta name="robots" content="noindex">
  <?php endif; ?>

  <?php wp_head(); ?>
</head>