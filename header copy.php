<!doctype html>
<html <?php language_attributes(); ?> class="h-full">

<head>
  <!-- GoogleAnalytics -->
  <?php
  $siteUrl = $_SERVER["HTTP_HOST"];
  if (strpos($siteUrl, 'ifh.jp') !== false) { ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G8NWSESN88"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-G8NWSESN88');
    </script>

  <?php } else { ?>
    <!--テストサイト-->
  <?php } ?>
  <!-- GoogleAnalytics -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php

  $meta_title = get_field('meta_title');
  $meta_desc = get_field('meta_desc');
  $ogp_img = get_field('ogp_img');
  $common_title = get_field('common_title', 'option');
  $common_desc = get_field('common_desc', 'option');

  $title = '';
  $desc  = '';

  $desc = $meta_desc ? $meta_desc : $common_desc;

  if (is_home() || is_front_page()) {
    $title = $meta_title ? $meta_title : get_bloginfo('name');
  } elseif (is_404()) {
    $title_404 = get_field('title_404', 'option');
    $desc_404 = get_field('desc_404', 'option');

    $title = $title_404 ? $title_404 : ('お探しのページは見つかりませんでした | ' . get_bloginfo('name'));
    $desc  = $desc_404  ? $desc_404  : $common_desc;
  } elseif (is_post_type_archive('youtube')) {
    $title = 'YouTube | ' . get_bloginfo('name');
    $desc = 'Ifhの公式YouTubeチャンネルにアップしている動画一覧です。是非、「いいね」を押してください。';
  } elseif (is_post_type_archive('staff')) {
    $title = 'staff | ' . get_bloginfo('name');
    $desc = '各店舗ごとのスタッフ一覧です。スタッフ詳細情報も掲載中です。';
  } elseif (is_post_type_archive('news')) {
    $title = 'お知らせ | ' . get_bloginfo('name');
    $desc = 'プロジェクト名に関するお知らせの一覧ページです。';
  } elseif (is_singular('news')) {
    $title = $meta_title ? $meta_title : (get_the_title() . ' | ' . get_bloginfo('name'));
    $desc  = $meta_desc  ? $meta_desc  : ('プロジェクト名に関するお知らせ「' . get_the_title() . '」の詳細ページです。');
  } elseif (is_post_type_archive('nail_light')) {
    $title = 'ライトコース ネイルギャラリー | ' . get_bloginfo('name');
    $desc  = $meta_desc ? $meta_desc : 'ライトコース ネイルギャラリーの一覧ページです。';
  } elseif (is_post_type_archive('nail_standard')) {
    $title = 'スタンダードコース ネイルギャラリー | ' . get_bloginfo('name');
    $desc  = $meta_desc ? $meta_desc : 'スタンダードコース ネイルギャラリーの一覧ページです。';
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
  // OGP設定
  $common_og_title = get_field('common_og_title', 'option');
  $common_og_img = get_field('common_og_img', 'option');
  $common_og_site_name = get_field('common_og_site_name', 'option');

  if ($common_og_site_name) {
    $og_site_name = $common_og_site_name;
  } else {
    $og_site_name =  $common_og_title;
  }
  if ($ogp_img) {
    $og_img = $ogp_img['url'];
  } else {
    //エラー　$og_img = $common_og_img['url'];
  }
  if (is_home() || is_front_page()) {
    if ($common_og_title) {
      $og_title = $common_og_title;
    } else {
      $og_title = get_bloginfo('name');
    }
    $og_type = 'website';
    $og_url = get_bloginfo('url');
  } elseif (is_404()) {
    if ($title_404) {
      $og_title = $title_404;
    } else {
      $og_title = 'お探しのページは見つかりませんでした | ' . get_bloginfo('name');
    }
    $og_type = 'article';
    $og_url = get_bloginfo('url') . '/404/';
  } elseif (is_tax('newscat')) {
    $my_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $term_name = $my_term->name;
    if ($meta_title) {
      $og_title = $meta_title;
    } else {
      $og_title = $term_name . ' | ' . get_bloginfo('name');
    }
  } elseif (is_post_type_archive('collection')) {
    $og_title = 'Collection | ' . get_bloginfo('name');
    $og_type = 'article';
    $og_url = get_post_type_archive_link('collection');
  } elseif (is_post_type_archive('news')) {
    $og_title = 'お知らせ | ' . get_bloginfo('name');
    $og_type = 'article';
    $og_url = get_post_type_archive_link('news');
  } else {
    if ($common_og_title) {
      $og_title = get_the_title() . '｜' . $common_og_title;
    } else {
      $og_title = get_the_title() . '｜' . get_bloginfo('name');
    }

    /*
    $og_type = 'article';
    if (!$is_recipe_detail) {
      $og_url = get_permalink();
    }
    $og_img = $common_og_img['url'];
    if (is_category()) {
      $cat = get_queried_object();
      $cat_id = $cat->cat_ID;
      $cat_name = $cat->name;
      $cat_link = get_category_link($cat_id);
      $og_title = $cat_name . '｜' . get_bloginfo('name');
      if (!$is_recipe_detail) {
        $og_url = $cat_link;
      }
      $og_img = $common_og_img['url'];
    }
   */

    if (is_single()) {
      if (has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $ogp_img = $large_image_url[0];
      } else {
        $ogp_img = get_field('ogp_img');
        if (is_array($ogp_img) && isset($ogp_img['url'])) {
          $ogp_img = $ogp_img['url'];
        } else {
          $ogp_img = ''; // あるいはデフォルトの画像URLをここに設定します
        }
      }
      if ($ogp_img) {
        $og_img = $ogp_img;
      } else {
        // $og_img = $common_og_img['url'];
      }
    }
  }
  ?><title><?php echo esc_html($title); ?></title>

  <meta name="description" content="<?php echo esc_html($desc) ?>">
  <meta property="og:title" content="<?php echo esc_html($og_title); ?>" />
  <meta property="og:type" content="<?php echo esc_html($og_type); ?>" />
  <meta property="og:url" content="<?php echo esc_html($og_url); ?>" />
  <meta property="og:image" content="<?php echo esc_html($og_img); ?>" />
  <meta property="og:description" content="<?php echo esc_html($desc); ?>" />
  <meta property="og:site_name" content="<?php echo esc_html($og_site_name); ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <!--<meta name="twitter:site" content="@XXXXXX">-->
  <meta name="twitter:title" content="<?php echo esc_html($og_title); ?>">
  <meta name="twitter:description" content="<?php echo esc_html($desc); ?>">

  <link rel="shortcut icon" href="/favicon.ico">

  <?php if (is_home() || is_front_page()) : ?>
    <link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>">
  <?php endif; ?>

  <?php if (is_home() || is_front_page()) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
  <?php elseif (is_page('nail')) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
  <?php elseif (is_post_type_archive('nail_light') || is_post_type_archive('nail_standard')) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/common.css?<?php echo date('Ymd-Hi'); ?>">
    <link href="/wp-content/themes/ifh_theme/src/nail_light.css" rel="stylesheet">
  <?php elseif (is_post_type_archive('staff')) : ?>

  <?php elseif (is_page('furisode')) : ?>

  <?php elseif (is_page('2024s_recommend') || is_page('2024s_styling') || is_page('2024s_camp-eleven') || is_page('2024s_camp') || is_page('tailwind')) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/common.css?<?php echo date('Ymd-Hi'); ?>">
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/lower.css?<?php echo date('Ymd-Hi'); ?>">
    <link href="/wp-content/themes/ifh_theme/src/output.css" rel="stylesheet">
  <?php elseif (is_page('toiifa')) : ?>
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/src/toiifa.css?<?php echo date('Ymd-Hi'); ?>">
  <?php elseif (is_page('welfare')) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
  <?php elseif (is_page('covid19')) : ?>
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/src/covid19.css?<?php echo date('Ymd-Hi'); ?>">
  <?php elseif (is_page('test')) : ?>
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/src/test.css?<?php echo date('Ymd-Hi'); ?>">
  <?php elseif (is_post_type_archive('youtube')) : ?>
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/common.css?ver=<?php echo @filemtime(__DIR__ . '/assets/css/common.css'); ?>">
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/lower.css?ver=<?php echo @filemtime(__DIR__ . '/assets/css/lower.css'); ?>">
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/src/youtube.css?ver=<?php echo @filemtime(__DIR__ . '/src/youtube.css'); ?>">
  <?php elseif (is_page('modal') || is_page('information') || is_page('recruit') || is_page('recruit-hair') || is_page('recruit-nail') || is_page('recruit-eye')) : ?>
  <?php elseif (is_page('inkmake-lp')) : ?>

  <?php else : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/common.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <link rel="stylesheet" href="/wp-content/themes/ifh_theme/assets/css/lower.css?<?php echo date('Ymd-Hi'); ?>">

  <?php endif; ?>

  <?php if (is_404()) : ?>
    <meta name="robots" content="noindex">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>