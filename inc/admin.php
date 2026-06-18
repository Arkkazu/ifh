<?php

/**
 * 管理画面設定（集約）
 * - サイドメニュー表示制御
 * - 管理バー（上部バー）表示制御
 * - 管理画面フッター文言の非表示
 * - 更新通知（update nag）の非表示
 * - 管理画面フッター右のバージョン表示を非表示
 * - 管理バーにログアウトを追加
 * - 管理バーの WordPress ロゴを非表示
 */

/**
 * 管理画面サイドメニューの表示制御
 * - ユーザーID 1 以外で、指定メニューを非表示にします
 */
add_action('admin_menu', function () {
  $user_id = get_current_user_id();
  if ($user_id === 0) {
    return;
  }

  if ((int) $user_id !== 1) {
    remove_menu_page('tools.php');      // ツール
    remove_menu_page('profile.php');    // プロフィール
    remove_menu_page('meta-settings');  // 例：ACFオプションページ等のメニューslug
  }
}, 999);

/**
 * 管理バー（上部バー）の表示制御
 * - マイアカウント配下の一部メニューを非表示にします
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
  if (!is_object($wp_admin_bar)) {
    return;
  }

  $wp_admin_bar->remove_menu('user-info');     // マイアカウント -> ユーザー情報
  $wp_admin_bar->remove_menu('edit-profile');  // マイアカウント -> プロフィール編集
}, 201);

/**
 * 管理画面フッター左の文言「WordPress のご利用ありがとうございます。」を非表示にする
 */
add_filter('admin_footer_text', 'custom_admin_footer');
function custom_admin_footer() {}

/**
 * 管理画面の更新通知（update nag）を非表示にする
 */
add_action('admin_menu', 'wphidenag');
function wphidenag()
{
  remove_action('admin_notices', 'update_nag');
}

/**
 * 管理画面フッター右の WordPress バージョン表示を非表示にする
 */
add_action('admin_menu', 'remove_footer_version');
function remove_footer_version()
{
  remove_filter('update_footer', 'core_update_footer');
}

/**
 * 管理バーにログアウトリンクを追加する
 */
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');
function add_new_item_in_admin_bar()
{
  global $wp_admin_bar;
  $wp_admin_bar->add_menu(array(
    'id'    => 'new_item_in_admin_bar',
    'title' => __('ログアウト'),
    'href'  => wp_logout_url(),
  ));
}

/**
 * 管理バーの WordPress ロゴメニューを非表示にする
 */
add_action('admin_head', 'disable_help_link');
function disable_help_link()
{
  echo '<style type="text/css">#wp-admin-bar-wp-logo{display:none !important;}</style>';
}


/**
 * 目的：アイキャッチ（post-thumbnails）を有効化する
 */
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}


//// 管理画面での本文編集が公開ページと同様になる editor-style.css
function add_editor_style_cb()
{
  add_editor_style();
}
add_action('admin_init', 'add_editor_style_cb');
//// end 管理画面での本文編集が公開ページと同様になる