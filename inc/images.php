<?php
//// テーマ内の相対パスから width/height 属性文字列を生成
// テーマ内の相対パスから src と width/height を返す
function theme_img_wh(string $rel_path): string
{
  $rel_path  = ltrim($rel_path, '/');
  $file_path = get_theme_file_path($rel_path);

  if (!is_readable($file_path)) {
    return '';
  }

  $size = @getimagesize($file_path);
  if (!is_array($size) || empty($size[0]) || empty($size[1])) {
    return '';
  }

  $w = (int) $size[0];
  $h = (int) $size[1];

  // 「@2x」がパス（ファイル名）に含まれる場合は 0.5 倍（切り捨て）
  if (strpos($rel_path, '@2x') !== false) {
    $w = intdiv($w, 2);
    $h = intdiv($h, 2);
  }

  return ' width="' . esc_attr((string) $w) . '" height="' . esc_attr((string) $h) . '"';
}

/**
 * テーマ内の相対パスから src と width/height を返します。
 * src は get_theme_file_uri() を使用し、子テーマ利用時も整合します。
 */
function theme_img_src_wh(string $rel_path): array
{
  $rel_path = ltrim($rel_path, '/');

  $src = esc_url(get_theme_file_uri($rel_path));
  $wh  = theme_img_wh($rel_path);

  return array($src, $wh);
}
//// end テーマ内の相対パスから width/height 属性文字列を生成