<?php
//// 各ページのcss設定
add_action('wp_enqueue_scripts', function () {
  if (is_admin()) {
    return;
  }

  // CDN
  $swiper_css = 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css';

  // テーマ内 CSS の安全なバージョン取得
  $ver = function (string $rel_path): ?int {
    $abs = get_template_directory() . $rel_path;
    return file_exists($abs) ? filemtime($abs) : null;
  };

  // ここで「ページごとの必要 CSS」を enqueue します
  // ※ lower.css 等を Vite に統合済みの場合は、該当 enqueue を削除して運用します

  // TOP
  if (is_home() || is_front_page()) {
    return;
  }

  // /nail/
  if (is_page('nail')) {
    return;
  }

  // ネイルアーカイブ
  if (is_post_type_archive('nail_light') || is_post_type_archive('nail_standard')) {

    wp_enqueue_style(
      'ifh-common',
      get_template_directory_uri() . '/assets/css/common.css',
      [],
      $ver('/assets/css/common.css')
    );

    // 既存仕様に合わせて nail_light.css を読込み（standard を分ける場合はここを分岐）
    wp_enqueue_style(
      'ifh-nail',
      get_template_directory_uri() . '/src/nail_light.css',
      [],
      $ver('/src/nail_light.css')
    );
    return;
  }

  // YouTube アーカイブ
  if (is_post_type_archive('youtube')) {
    // wp_enqueue_style(
    //   'ifh-common',
    //   get_template_directory_uri() . '/assets/css/common.css',
    //   [],
    //   $ver('/assets/css/common.css')
    // );
    // wp_enqueue_style(
    //   'ifh-lower',
    //   get_template_directory_uri() . '/assets/css/lower.css',
    //   [],
    //   $ver('/assets/css/lower.css')
    // );
    wp_enqueue_style(
      'ifh-youtube',
      get_template_directory_uri() . '/src/youtube.css',
      [],
      $ver('/src/youtube.css')
    );
    return;
  }

  // 既定（lower）
  wp_enqueue_style('swiper', $swiper_css, [], null);
  wp_enqueue_style(
    'ifh-lower',
    get_template_directory_uri() . '/assets/css/lower.css',
    [],
    $ver('/assets/css/lower.css')
  );
}, 20);
//// end 各ページのcss設定