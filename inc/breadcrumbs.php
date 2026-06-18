<?php

/**
 * Breadcrumbs (HTML + JSON-LD)
 * - 表示用: <nav><ol>...</ol></nav>
 * - 構造化データ: schema.org/BreadcrumbList (JSON-LD)
 *
 * 使い方:
 *   1) functions.php で require_once
 *   2) テンプレートで if (function_exists('theme_breadcrumbs')) { theme_breadcrumbs(); }
 */

if (!function_exists('theme_breadcrumbs')) {

  /**
   * パンくずを出力します（HTML + JSON-LD）。
   *
   * @param array $args
   *  - 'home_label' (string) ホームの表示名
   *  - 'container_class' (string) nav の class
   *  - 'list_class' (string) ol の class
   *  - 'item_class' (string) li の class
   *  - 'current_class' (string) 現在地の class
   *  - 'show_on_home' (bool) トップで表示するか
   *  - 'show_json_ld' (bool) JSON-LD を出力するか
   */
  function theme_breadcrumbs(array $args = []): void
  {
    if (is_admin()) {
      return;
    }

    $defaults = [
      'home_label'      => 'HOME',
      'container_class' => 'c-breadcrumb',
      'list_class'      => 'c-breadcrumb__list',
      'item_class'      => 'c-breadcrumb__item',
      'current_class'   => 'is-current',
      'show_on_home'    => false,
      'show_json_ld'    => true,
    ];
    $args = wp_parse_args($args, $defaults);

    if ((is_front_page() || is_home()) && !$args['show_on_home']) {
      return;
    }

    $crumbs = theme_breadcrumbs_build_items($args['home_label']);

    if (empty($crumbs)) {
      return;
    }

    // 表示用 HTML
    echo '<nav class="' . esc_attr($args['container_class']) . '" aria-label="breadcrumb">';
    echo '<ol class="' . esc_attr($args['list_class']) . '">';

    $last_index = count($crumbs) - 1;

    foreach ($crumbs as $i => $c) {
      $is_last = ($i === $last_index);

      $li_class = $args['item_class'];
      if ($is_last) {
        $li_class .= ' ' . $args['current_class'];
      }

      echo '<li class="' . esc_attr($li_class) . '">';

      $label = isset($c['label']) ? (string) $c['label'] : '';
      $url   = isset($c['url']) ? (string) $c['url'] : '';

      if (!$is_last && $url !== '') {
        echo '<a href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
      } else {
        echo '<span aria-current="page">' . esc_html($label) . '</span>';
      }

      echo '</li>';
    }

    echo '</ol>';
    echo '</nav>';

    // JSON-LD（構造化データ）
    if (!empty($args['show_json_ld'])) {
      theme_breadcrumbs_output_json_ld($crumbs);
    }
  }

  /**
   * パンくず要素配列を生成します。
   * 各要素: ['label' => string, 'url' => string]
   */
  function theme_breadcrumbs_build_items(string $home_label): array
  {
    $items = [];

    // HOME
    $items[] = [
      'label' => $home_label,
      'url'   => home_url('/'),
    ];

    // 404 / 検索 / 作者 / タグ
    if (is_404()) {
      $items[] = ['label' => 'ページが見つかりません', 'url' => ''];
      return $items;
    }

    if (is_search()) {
      $items[] = ['label' => '検索結果: ' . get_search_query(), 'url' => ''];
      return $items;
    }

    if (is_author()) {
      $author = get_queried_object();
      $items[] = ['label' => '投稿者: ' . ($author->display_name ?? ''), 'url' => ''];
      return $items;
    }

    if (is_tag()) {
      $tag = get_queried_object();
      $items[] = ['label' => 'タグ: ' . ($tag->name ?? ''), 'url' => ''];
      return $items;
    }

    // 日付アーカイブ
    if (is_date()) {
      $y = (int) get_query_var('year');
      if ($y > 0) {
        $items[] = ['label' => $y . '年', 'url' => get_year_link($y)];
      }

      $m = (int) get_query_var('monthnum');
      if ($m > 0) {
        $items[] = [
          'label' => $m . '月',
          'url'   => get_month_link($y, $m),
        ];
      }

      $d = (int) get_query_var('day');
      if ($d > 0) {
        $items[] = ['label' => $d . '日', 'url' => ''];
      }

      return $items;
    }

    // カテゴリ
    if (is_category()) {
      $cat = get_queried_object();
      if ($cat && !is_wp_error($cat)) {
        $items = array_merge($items, theme_breadcrumbs_term_ancestors($cat, 'category'));
        $items[] = ['label' => (string) $cat->name, 'url' => ''];
      }
      return $items;
    }

    // タクソノミー（カテゴリ以外）
    if (is_tax()) {
      $term = get_queried_object();
      if ($term && !is_wp_error($term)) {
        $taxonomy = $term->taxonomy;
        $tax_obj = get_taxonomy($taxonomy);

        // 可能なら紐づく投稿タイプのアーカイブを1段入れる
        if ($tax_obj && !empty($tax_obj->object_type)) {
          $pt = is_array($tax_obj->object_type) ? reset($tax_obj->object_type) : $tax_obj->object_type;
          if (is_string($pt) && $pt !== 'post') {
            $pt_obj = get_post_type_object($pt);
            $pt_link = get_post_type_archive_link($pt);
            if ($pt_obj && $pt_link) {
              $items[] = ['label' => $pt_obj->labels->name, 'url' => $pt_link];
            }
          }
        }

        $items = array_merge($items, theme_breadcrumbs_term_ancestors($term, $taxonomy));
        $items[] = ['label' => (string) $term->name, 'url' => ''];
      }
      return $items;
    }

    // 投稿タイプアーカイブ
    if (is_post_type_archive()) {
      $pt = get_query_var('post_type');
      if (is_array($pt)) {
        $pt = reset($pt);
      }
      if (is_string($pt) && $pt !== '') {
        $obj = get_post_type_object($pt);
        $items[] = ['label' => $obj ? $obj->labels->name : $pt, 'url' => ''];
      }
      return $items;
    }

    // 固定ページ
    if (is_page()) {
      $post = get_queried_object();
      if ($post && !is_wp_error($post)) {
        $items = array_merge($items, theme_breadcrumbs_page_ancestors($post));
        $items[] = ['label' => get_the_title($post), 'url' => ''];
      }
      return $items;
    }

    // 添付ファイル
    if (is_attachment()) {
      $post = get_queried_object();
      if ($post && !is_wp_error($post)) {
        $parent_id = (int) $post->post_parent;
        if ($parent_id > 0) {
          $items = array_merge($items, theme_breadcrumbs_single_context($parent_id));
        }
        $items[] = ['label' => get_the_title($post), 'url' => ''];
      }
      return $items;
    }

    // 通常の単一投稿（投稿・カスタム投稿）
    if (is_singular()) {
      $post = get_queried_object();
      if ($post && !is_wp_error($post)) {
        $items = array_merge($items, theme_breadcrumbs_single_context((int) $post->ID));
        $items[] = ['label' => get_the_title($post), 'url' => ''];
      }
      return $items;
    }

    // その他（ホームやフロント以外の一般アーカイブなど）
    if (is_archive()) {
      $title = post_type_archive_title('', false);
      if ($title !== '') {
        $items[] = ['label' => $title, 'url' => ''];
        return $items;
      }
    }

    // フォールバック
    $items[] = ['label' => wp_get_document_title(), 'url' => ''];
    return $items;
  }

  /**
   * 固定ページの祖先を上位→下位で返します（現在ページは含めません）。
   */
  function theme_breadcrumbs_page_ancestors(WP_Post $post): array
  {
    $items = [];
    $ancestors = get_post_ancestors($post);
    if (empty($ancestors)) {
      return $items;
    }

    $ancestors = array_reverse($ancestors);
    foreach ($ancestors as $id) {
      $items[] = [
        'label' => get_the_title($id),
        'url'   => get_permalink($id),
      ];
    }
    return $items;
  }

  /**
   * タームの祖先を上位→下位で返します（当該タームは含めません）。
   */
  function theme_breadcrumbs_term_ancestors(WP_Term $term, string $taxonomy): array
  {
    $items = [];
    if ((int) $term->parent <= 0) {
      return $items;
    }

    $ancestors = get_ancestors($term->term_id, $taxonomy);
    if (empty($ancestors)) {
      return $items;
    }

    $ancestors = array_reverse($ancestors);
    foreach ($ancestors as $aid) {
      $t = get_term($aid, $taxonomy);
      if ($t && !is_wp_error($t)) {
        $items[] = [
          'label' => (string) $t->name,
          'url'   => get_term_link($t),
        ];
      }
    }
    return $items;
  }

  /**
   * 単一投稿（投稿・CPT）の「文脈（アーカイブ + 階層ターム等）」を返します。
   * - CPT ならアーカイブを入れる
   * - 階層タクソノミーがあれば、そのターム階層を入れる（1つ採用）
   * - なければカテゴリ階層を入れる（投稿の場合）
   */
  function theme_breadcrumbs_single_context(int $post_id): array
  {
    $items = [];

    $pt = get_post_type($post_id);
    if (!$pt) {
      return $items;
    }

    // CPT アーカイブ（post は除外）
    if ($pt !== 'post') {
      $obj = get_post_type_object($pt);
      $link = get_post_type_archive_link($pt);
      if ($obj && $link) {
        $items[] = ['label' => $obj->labels->name, 'url' => $link];
      }
    }

    // 階層タクソノミー（カテゴリ含む）から1つ選び、祖先を積む
    $taxes = get_object_taxonomies($pt, 'objects');
    $picked = theme_breadcrumbs_pick_primary_term($post_id, $taxes);

    if ($picked) {
      $items = array_merge($items, theme_breadcrumbs_term_ancestors($picked, $picked->taxonomy));
      $items[] = ['label' => (string) $picked->name, 'url' => get_term_link($picked)];
      return $items;
    }

    // 最後の手段としてカテゴリ（投稿のみ）
    if ($pt === 'post') {
      $cats = get_the_category($post_id);
      if (!empty($cats)) {
        $cat = theme_breadcrumbs_pick_deepest_term($cats, 'category');
        if ($cat) {
          $items = array_merge($items, theme_breadcrumbs_term_ancestors($cat, 'category'));
          $items[] = ['label' => (string) $cat->name, 'url' => get_term_link($cat)];
        }
      }
    }

    return $items;
  }

  /**
   * 優先ターム（階層タクソノミー）を1つ選びます。
   * - 「階層タクソノミーのみ」対象
   * - 投稿に紐づくターム群から「最も深い（祖先数が多い）ターム」を採用します
   */
  function theme_breadcrumbs_pick_primary_term(int $post_id, array $tax_objects): ?WP_Term
  {
    $candidates = [];

    foreach ($tax_objects as $tax => $obj) {
      if (!$obj instanceof WP_Taxonomy) {
        continue;
      }
      if (empty($obj->hierarchical)) {
        continue;
      }

      $terms = get_the_terms($post_id, $tax);
      if (empty($terms) || is_wp_error($terms)) {
        continue;
      }

      $picked = theme_breadcrumbs_pick_deepest_term($terms, $tax);
      if ($picked) {
        $candidates[] = $picked;
      }
    }

    if (empty($candidates)) {
      return null;
    }

    // 複数候補が出た場合は、最も深いものを採用します
    $best = null;
    $best_depth = -1;
    foreach ($candidates as $t) {
      $depth = count(get_ancestors($t->term_id, $t->taxonomy));
      if ($depth > $best_depth) {
        $best_depth = $depth;
        $best = $t;
      }
    }

    return $best;
  }

  /**
   * ターム配列から「最も深いターム」を選びます（祖先数が最大のもの）。
   *
   * @param WP_Term[] $terms
   */
  function theme_breadcrumbs_pick_deepest_term(array $terms, string $taxonomy): ?WP_Term
  {
    $best = null;
    $best_depth = -1;

    foreach ($terms as $t) {
      if (!$t instanceof WP_Term) {
        continue;
      }
      $depth = count(get_ancestors($t->term_id, $taxonomy));
      if ($depth > $best_depth) {
        $best_depth = $depth;
        $best = $t;
      }
    }

    return $best;
  }

  /**
   * JSON-LD を出力します（schema.org BreadcrumbList）。
   *
   * @param array $crumbs
   */
  function theme_breadcrumbs_output_json_ld(array $crumbs): void
  {
    // JSON-LD は URL が空のものを除外しつつ、最後は現在URLで補完します
    $list = [];
    $pos = 1;

    $current_url = theme_breadcrumbs_current_url();

    foreach ($crumbs as $i => $c) {
      $label = isset($c['label']) ? (string) $c['label'] : '';
      $url   = isset($c['url']) ? (string) $c['url'] : '';

      if ($label === '') {
        continue;
      }

      // 最後の要素は current_url を使用します（空URL対策）
      if ($i === count($crumbs) - 1) {
        $url = $current_url;
      }

      if ($url === '') {
        continue;
      }

      $list[] = [
        '@type'    => 'ListItem',
        'position' => $pos,
        'name'     => $label,
        'item'     => $url,
      ];
      $pos++;
    }

    if (empty($list)) {
      return;
    }

    $data = [
      '@context'        => 'https://schema.org',
      '@type'           => 'BreadcrumbList',
      'itemListElement' => $list,
    ];

    echo "\n" . '<script type="application/ld+json">' .
      wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
      "</script>\n";
  }

  /**
   * 現在URLを生成します（クエリを含む）。
   */
  function theme_breadcrumbs_current_url(): string
  {
    // home_url(add_query_arg(null, null)) は WordPress 的に扱いやすい形式です
    $path = add_query_arg(null, null);
    return esc_url_raw(home_url($path));
  }
}
