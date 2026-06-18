<?php

/**
 * 目的：月別アーカイブの表示件数を制御する
 * 対象：フロント側のメインクエリ（月別アーカイブ）
 * 内容：posts_per_page を 10 に設定する
 */

add_action('pre_get_posts', 'my_pre_get_posts');

function my_pre_get_posts($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  if ($query->is_month()) {
    $query->set('posts_per_page', 10);
  }
}
