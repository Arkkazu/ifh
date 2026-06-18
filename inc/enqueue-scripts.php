<?php
add_action('wp_enqueue_scripts', function () {
  if (is_admin()) {
    return;
  }

  $theme_dir = get_template_directory();
  $theme_uri = get_template_directory_uri();

  $handle        = '';
  $dev_rel_path  = '';
  $dist_rel_path = '';

  /*
   * front-*.js
   * 例: front-page.js
   */
  if (is_front_page()) {
    $handle        = 'front-page';
    $dev_rel_path  = '/src/js/front-page.js';
    $dist_rel_path = '/dist/assets/front-page.js';
  }

  /*
   * page-*.js
   * 例: page-company.js
   */ elseif (is_page()) {
    $page = get_queried_object();

    if ($page && !empty($page->post_name)) {
      $slug          = $page->post_name;
      $handle        = 'page-' . $slug;
      $dev_rel_path  = '/src/js/page-' . $slug . '.js';
      $dist_rel_path = '/dist/assets/page-' . $slug . '.js';
    }
  }

  /*
   * single-*.js
   * 例: single-news.js
   */ elseif (is_singular()) {
    $post_type = get_post_type();

    if (!empty($post_type) && $post_type !== 'page' && $post_type !== 'post') {
      $handle        = 'single-' . $post_type;
      $dev_rel_path  = '/src/js/single-' . $post_type . '.js';
      $dist_rel_path = '/dist/assets/single-' . $post_type . '.js';
    }
  }

  /*
   * archive-*.js
   * 例: archive-news.js
   */ elseif (is_post_type_archive()) {
    $post_type = get_query_var('post_type');

    if (is_array($post_type)) {
      $post_type = reset($post_type);
    }

    if (!empty($post_type)) {
      $handle        = 'archive-' . $post_type;
      $dev_rel_path  = '/src/js/archive-' . $post_type . '.js';
      $dist_rel_path = '/dist/assets/archive-' . $post_type . '.js';
    }
  }

  if ($handle === '' || $dev_rel_path === '' || $dist_rel_path === '') {
    return;
  }

  /*
   * 開発環境: src/js を Vite 開発サーバーから読む
   * ファイルが存在する場合のみ enqueue
   */
  if (wp_get_environment_type() === 'development') {
    $dev_abs_path = $theme_dir . $dev_rel_path;

    if (file_exists($dev_abs_path)) {
      wp_enqueue_script(
        $handle,
        'http://localhost:5173' . $dev_rel_path,
        [],
        null,
        true
      );
    }

    return;
  }

  /*
   * 本番環境: dist/assets を読む
   * ビルド済みファイルが存在する場合のみ enqueue
   */
  $dist_abs_path = $theme_dir . $dist_rel_path;

  if (file_exists($dist_abs_path)) {
    wp_enqueue_script(
      $handle,
      $theme_uri . $dist_rel_path,
      [],
      filemtime($dist_abs_path),
      true
    );
  }
});
