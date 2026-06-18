<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Critical CSS インライン挿入
 * - ページ種別ごとに dist/critical/<name>.css があれば、<head> の先頭でインライン化
 * - CSP 対応: inc/csp.php が発行する nonce ($GLOBALS['csp_nonce']) を付与
 * - 命名規約は JS と同様: front-page / page-<slug> / single-<post_type> / archive-<post_type> / <template-basename>
 */
add_action('wp_head', function () {
  // 管理画面は対象外
  if (is_admin()) {
    return;
  }

  $theme_dir = get_template_directory();
  $nonce     = $GLOBALS['csp_nonce'] ?? '';

  // 候補名を優先順で組み立て
  $candidates = [];

  // 1) フロントページ
  if (is_front_page()) {
    $candidates[] = 'front-page';
  }

  // 2) 現在適用中のテンプレートファイル名（例: archive-staff.php → archive-staff）
  if (isset($GLOBALS['template'])) {
    $base = basename((string) $GLOBALS['template'], '.php');
    if ($base !== '') {
      $candidates[] = $base;
    }
  }

  // 3) 固定ページ slug
  if (is_page()) {
    $page_id = get_queried_object_id();
    $slug    = $page_id ? get_post_field('post_name', $page_id) : '';
    if (is_string($slug) && $slug !== '') {
      $candidates[] = 'page-' . $slug;
    }
  }

  // 4) 投稿タイプ別（single / archive）
  if (is_singular()) {
    $pt = get_post_type();
    if (is_string($pt) && $pt !== '') {
      $candidates[] = 'single-' . $pt;
    }
  }
  if (is_post_type_archive()) {
    $pt = get_query_var('post_type');
    if (is_array($pt)) {
      $pt = reset($pt);
    }
    if (is_string($pt) && $pt !== '') {
      $candidates[] = 'archive-' . $pt;
    }
  }

  // 重複を排除して順序を維持
  $candidates = array_values(array_unique(array_filter($candidates, 'strlen')));

  // まず共通クリティカルがあれば出力（例: common-header.css）
  $common_rel  = '/dist/critical/common-header.css';
  $common_path = $theme_dir . $common_rel;
  if (file_exists($common_path) && is_readable($common_path)) {
    $css = file_get_contents($common_path);
    if ($css !== false && $css !== '') {
      printf(
        "\n<style%s>%s</style>\n",
        $nonce !== '' ? ' nonce="' . esc_attr($nonce) . '"' : '',
        $css
      );
    }
  }

  // 最初に見つかったページ別 critical を適用
  foreach ($candidates as $name) {
    $rel  = '/dist/critical/' . $name . '.css';
    $path = $theme_dir . $rel;

    if (file_exists($path) && is_readable($path)) {
      $css = file_get_contents($path);
      if ($css !== false && $css !== '') {
        printf(
          "\n<style%s>%s</style>\n",
          $nonce !== '' ? ' nonce="' . esc_attr($nonce) . '"' : '',
          $css
        );
        break; // 最初に見つかったもののみ出力
      }
    }
  }
}, 0);
