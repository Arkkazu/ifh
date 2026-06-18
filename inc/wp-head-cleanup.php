<?php

/**
 * 目的：フロント側の不要出力を削減する（REST / oEmbed / Emoji）
 * 内容：
 * - REST API のリンク出力を削除
 * - oEmbed の discovery link を削除
 * - oEmbed のホスト用 JS を削除
 * - 絵文字用 script / CSS を削除
 */

// REST
remove_action('wp_head', 'rest_output_link_wp_head');

// oEmbed
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);

// WordPress バージョン情報
remove_action('wp_head', 'wp_generator');

// 短縮URL
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Windows Live Writer 用
remove_action('wp_head', 'wlwmanifest_link');

// RSD（外部投稿ツール用）
remove_action('wp_head', 'rsd_link');
