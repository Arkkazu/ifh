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
    // wp_enqueue_style('theme-main-style', $vite . '/main.css', [], null);
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

    if (is_array($pt)) {
      $pt = reset($pt);
    }

    if (is_string($pt) && $pt !== '') {
      $candidates[] = "src/js/archive-{$pt}.js";
    }
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
}, 10);

/**
 * Vite 生成 JS を ES Modules として読み込む
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {
  $module_handles = ['theme-main', 'page-script'];

  if (in_array($handle, $module_handles, true)) {
    return sprintf('<script type="module" src="%s"></script>', esc_url($src));
  }
  return $tag;
}, 10, 3);

/**
 * Vite 生成 CSS のうち theme-style は preload + onload で読み込む
 */
add_filter('style_loader_tag', function ($html, $handle, $href, $media) {
  if ($handle !== 'theme-style') {
    return $html;
  }

  $media_attr = $media && $media !== 'all'
    ? ' media="' . esc_attr($media) . '"'
    : '';

  return sprintf(
    '<link rel="preload" href="%1$s" as="style"%2$s onload="this.onload=null;this.rel=\'stylesheet\'">' .
      '<noscript><link rel="stylesheet" href="%1$s"%2$s></noscript>',
    esc_url($href),
    $media_attr
  );
}, 10, 4);
//// vite用設定 end