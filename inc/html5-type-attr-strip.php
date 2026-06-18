<?php

/**
 * 目的：HTML5 として不要な type 属性を削除する
 * 対象：type="text/javascript" / type="text/css"
 * 方法：出力バッファの最終文字列に対して正規表現置換を実行する
 */

if (!function_exists('html5_validation')) {
  function html5_validation($buffer)
  {
    $buffer = preg_replace('/\s?type=(\'|")text\/(javascript|css)(\'|")/is', '', $buffer);
    return $buffer;
  }
}

if (!function_exists('buf_start')) {
  function buf_start()
  {
    ob_start('html5_validation');
  }
}

if (!function_exists('buf_end')) {
  function buf_end()
  {
    if (ob_get_level() > 0) {
      ob_end_flush();
    } else {
      error_log('バッファが存在しません。ob_end_flush() をスキップします。');
    }
  }
}

add_action('after_setup_theme', 'buf_start');
add_action('shutdown', 'buf_end');
