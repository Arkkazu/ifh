<?php

require_once get_theme_file_path('inc/vite.php');
require_once get_theme_file_path('inc/csp.php');
require_once get_theme_file_path('inc/images.php');
require_once get_theme_file_path('inc/custom-post.php');
require_once get_theme_file_path('inc/html5-type-attr-strip.php');
require_once get_theme_file_path('inc/wp-head-cleanup.php');
require_once get_theme_file_path('inc/enqueue-page-styles.php');
require_once get_theme_file_path('inc/enqueue-scripts.php');
require_once get_theme_file_path('inc/critical-css.php');
require_once get_theme_file_path('inc/breadcrumbs.php');

require_once get_theme_file_path('inc/monthly-archive-posts-per-page.php');


require_once get_theme_file_path('inc/admin.php');
// require_once get_theme_file_path('inc/admin/menu-visibility.php');
// require_once get_theme_file_path('inc/admin/adminbar-visibility.php');

//Gutenbergを無効化
//add_filter( 'use_block_editor_for_post', '__return_false' ); //全てのコンテンツで無効化
//個別に無効化する場合いかに
add_filter('use_block_editor_for_post_type', 'disable_block_editor', 10, 2);
function disable_block_editor($use_block_editor, $post_type)
{
  if ($post_type === 'page') return false; //固定ページ
  //if ( $post_type === 'post' ) return false;//投稿
  //if ( $post_type === '投稿タイプ名' ) return false;//投稿タイプ
  return $use_block_editor;
}



/**
 * ACF 関連初期化（翻訳読み込みを含め、init 以降で実行）
 */
add_action('acf/init', function () {

  // Google API キー設定
  acf_update_setting('google_api_key', 'AIzaSyDMnE5YgF1PjrnrzBjKn6Qmk_ki6VbSp1E');

  // オプションページ登録
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
      'page_title'  => '共通META',
      'menu_title'  => '共通META',
      'menu_slug'   => 'meta-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false,
    ]);
  }
});

// 投稿画面のカテゴリー選択を制限
add_action('admin_print_footer_scripts', 'limit_category_select');
function limit_category_select()
{
?>
  <script type="text/javascript">
    jQuery(function($) {
      // 投稿画面のカテゴリー選択を制限
      var cat_checklist = $('#taxonomy-coursetag00 .categorychecklist input[type=checkbox],#taxonomy-coursetag02 .categorychecklist input[type=checkbox],#taxonomy-coursetag03 .categorychecklist input[type=checkbox]');
      cat_checklist.click(function() {
        $(this).parents('#taxonomy-coursetag00 .categorychecklist input[type=checkbox],#taxonomy-coursetag02 .categorychecklist input[type=checkbox],#taxonomy-coursetag03 .categorychecklist input[type=checkbox]').find('input[type=checkbox]').attr('checked', false);
        $(this).attr('checked', true);
      });

      // クイック編集のカテゴリー選択を制限
      var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
      quickedit_cat_checklist.click(function() {
        $(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
        $(this).attr('checked', true);
      });
    });
  </script>
<?php
}
function change_category_to_radio()
{
?>
  <script>
    jQuery(function($) {
      // カテゴリーをラジオボタンに変更
      $('.categorychecklist input[type=checkbox],#taxonomy-coursetag02 .categorychecklist input[type=checkbox],#taxonomy-coursetag03 .categorychecklist input[type=checkbox]').each(function() {
        $(this).replaceWith($(this).clone().attr('type', 'radio'));
      });
      // 「新規カテゴリーを追加」を非表示
      $('#category-adder,#cuisinecat-adder').hide();
      // 「よく使うもの」を非表示
      $('#category-tabs,#cuisinecat-tabs').hide();
    });
  </script>

<?php
}
add_action('admin_head-post-new.php', 'change_category_to_radio');
add_action('admin_head-post.php', 'change_category_to_radio');


//// ページナビ
function pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2) + 1;
  global $paged;
  if (empty($paged)) $paged = 1;

  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    echo "<div class=\"pagination\"><ul>";

    // 最初のページへのリンク
    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li class='head'><a href='" . get_pagenum_link(1) . "'>Top</a></li>";

    // 前のページへのリンク
    if ($paged > 1 && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged - 1) . "\" class=\"prev\"'>＜</a></li>";

    // 前後2ページを考慮しつつ、常に5ページ表示するためのロジック
    $start = max(1, $paged - $range);
    $end = min($pages, $paged + $range);

    if ($start > 1) {
      $offset = $start - 1;
      $start -= min($offset, 5 - ($end - $start + 1));
    }

    if ($end < $pages) {
      $offset = $pages - $end;
      $end += min($offset, 5 - ($end - $start + 1));
    }

    for ($i = $start; $i <= $end; $i++) {
      if ($i >= 1 && $i <= $pages) {
        echo ($paged == $i) ? "<li class=\"active\"><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
      }
    }

    // 次のページへのリンク
    if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"" . get_pagenum_link($paged + 1) . "\" class=\"next\">＞</a></li>";

    // 最後のページへのリンク
    if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<li class='last'><a href='" . get_pagenum_link($pages) . "'>Last</a></li>";

    echo "</ul></div>\n";
  }
}
////end ページナビ

// contact form 7 のファイルを必要な場合のみ読み込む
function wpcf7_file_control()
{
  add_filter("wpcf7_load_js", "__return_false");
  add_filter("wpcf7_load_css", "__return_false");

  if ((is_page("contact") || is_page("entry-01") || is_page("entry-02"))) {
    if (function_exists("wpcf7_enqueue_scripts")) wpcf7_enqueue_scripts();
    if (function_exists("wpcf7_enqueue_styles")) wpcf7_enqueue_styles();
  }
}
add_action("template_redirect", "wpcf7_file_control");
/*最上位ページスラッグ取得用 */
function ps_get_root_page($cur_post, $cnt = 0)
{
  if ($cnt > 100) {
    return false;
  }
  $cnt++;
  if ($cur_post->post_parent == 0) {
    $root_page = $cur_post;
  } else {
    $root_page = ps_get_root_page(get_post($cur_post->post_parent), $cnt);
  }
  return $root_page;
}





//// 目的：Open Sans の読み込みを抑制する
function disable_load_opensans(&$styles)
{
  $styles->remove('open-sans');
  $styles->add('open-sans', null);
}
add_action('wp_default_styles', 'disable_load_opensans');
//// end 目的：Open Sans の読み込みを抑制する




//// 構造化データ（共通）
function ifh_build_store_node(array $s, string $org_id): array
{
  $node = [
    '@type' => $s['type'] ?? 'HairSalon',
    '@id' => $s['id'],
    'name' => $s['name'],
    'url' => $s['url'],
    'telephone' => $s['tel'] ?? null,
    'parentOrganization' => ['@id' => $org_id],
    'address' => [
      '@type' => 'PostalAddress',
      'addressCountry' => 'JP',
      'addressRegion' => $s['region'] ?? '群馬県',
      'addressLocality' => $s['locality'] ?? null,
      'streetAddress' => $s['street'] ?? null,
    ],
  ];

  // null を削除
  $node = array_filter($node, fn($v) => $v !== null);
  $node['address'] = array_filter($node['address'], fn($v) => $v !== null);

  // 任意追加（ページ側で付与したい項目）
  if (!empty($s['openingHours'])) {
    $node['openingHours'] = $s['openingHours'];
  }
  if (!empty($s['openingHoursSpecification'])) {
    $node['openingHoursSpecification'] = $s['openingHoursSpecification'];
  }
  if (!empty($s['amenityFeature'])) {
    $node['amenityFeature'] = $s['amenityFeature'];
  }
  if (!empty($s['description'])) {
    $node['description'] = $s['description'];
  }
  if (!empty($s['areaServed'])) {
    $node['areaServed'] = $s['areaServed'];
  }
  if (!empty($s['image'])) {
    $node['image'] = $s['image'];
  }
  if (!empty($s['priceRange'])) {
    $node['priceRange'] = $s['priceRange'];
  }
  if (!empty($s['currenciesAccepted'])) {
    $node['currenciesAccepted'] = $s['currenciesAccepted'];
  }
  if (!empty($s['hasMap'])) {
    $node['hasMap'] = $s['hasMap'];
  }

  return $node;
}

function ifh_output_structured_data_by_config(array $cfg): void
{
  $home = home_url('/');

  // ページ判定
  $is_target = false;
  if (!empty($cfg['when']) && is_callable($cfg['when'])) {
    $is_target = (bool) $cfg['when']();
  }
  if (!$is_target) {
    return;
  }

  $page_url = $cfg['page_url'] ?? $home;

  $org_id  = $home . '#organization';
  $site_id = $home . '#website';
  $page_id = $page_url . '#webpage';

  $logo = get_template_directory_uri() . '/assets/media/images/common/ifhgroup_logo.svg';

  $local_business_graph = [];
  $item_list_elements = [];

  $pos = 1;
  $stores = $cfg['stores'] ?? [];
  foreach ($stores as $s) {
    $local_business_graph[] = ifh_build_store_node($s, $org_id);

    // ItemList を出したいページのみ
    if (!empty($cfg['use_item_list'])) {
      $item_list_elements[] = [
        '@type' => 'ListItem',
        'position' => $pos,
        'item' => ['@id' => $s['id']],
      ];
      $pos++;
    }
  }

  $graph = [];

  // Organization
  $graph[] = [
    '@type' => 'Organization',
    '@id' => $org_id,
    'name' => 'Ifh（イフ）グループ',
    'url' => $home,
    'logo' => $logo,
    'sameAs' => [
      'https://www.instagram.com/ifh_group/',
    ],
    'inLanguage' => 'ja',
  ];

  // WebSite
  $graph[] = [
    '@type' => 'WebSite',
    '@id' => $site_id,
    'url' => $home,
    'name' => get_bloginfo('name'),
    'publisher' => ['@id' => $org_id],
    'inLanguage' => 'ja',
  ];

  // WebPage
  $webpage = [
    '@type' => 'WebPage',
    '@id' => $page_id,
    'url' => $page_url,
    'name' => wp_get_document_title(),
    'isPartOf' => ['@id' => $site_id],
    'about' => ['@id' => $org_id],
    'inLanguage' => 'ja',
  ];

  if (!empty($cfg['page_description'])) {
    $webpage['description'] = $cfg['page_description'];
  }

  if (!empty($cfg['use_item_list'])) {
    $webpage['mainEntity'] = [
      '@type' => 'ItemList',
      'name' => $cfg['item_list_name'] ?? 'Salon List',
      'itemListElement' => $item_list_elements,
    ];
  }

  if (!empty($cfg['speakable'])) {
    $webpage['speakable'] = $cfg['speakable'];
  }

  $webpage['primaryImageOfPage'] = [
    '@type' => 'ImageObject',
    'url' => $logo,
  ];

  $graph[] = $webpage;

  // Breadcrumb（必要なページのみ）
  if (!empty($cfg['breadcrumb'])) {
    $graph[] = [
      '@type' => 'BreadcrumbList',
      '@id' => $page_url . '#breadcrumb',
      'itemListElement' => $cfg['breadcrumb'],
    ];
  }

  // LocalBusiness 群
  $graph = array_merge($graph, $local_business_graph);

  $schema = [
    '@context' => 'https://schema.org',
    '@graph' => $graph,
  ];

  echo "\n" . '<script type="application/ld+json">' .
    wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
    "</script>\n";
}

add_action('wp_head', function () {

  $home = home_url('/');

  // 共通店舗マスター（トップで使用する全店）
  $stores_all = [
    [
      'id' => home_url('/honten/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'Ifh honten（イフ本店）',
      'url' => home_url('/honten/'),
      'tel' => '+81-27-381-5133',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町1802-306',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-honten.jpg'),
      'hasMap' => 'https://maps.app.goo.gl/kFu2X6FuUZo834Cm7',
    ],
    [
      'id' => home_url('/iizuka/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'Ifh iizuka（イフ飯塚）',
      'url' => home_url('/iizuka/'),
      'tel' => '+81-27-388-9675',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '飯塚町222-3',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-iizuka.jpg'),
    ],
    [
      'id' => home_url('/bianca/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'BIANCA maebashi',
      'url' => home_url('/bianca/'),
      'tel' => '+81-27-289-9332',
      'region' => '群馬県',
      'locality' => '前橋市',
      'street' => '元総社町1983',
    ],
    [
      'id' => home_url('/bianca_isesaki/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'BIANCA isesaki',
      'url' => home_url('/bianca_isesaki/'),
      'tel' => '+81-270-27-4572',
      'region' => '群馬県',
      'locality' => '伊勢崎市',
      'street' => '安堀町207-1',
    ],
    [
      'id' => home_url('/gumigumi/') . '#localbusiness',
      'type' => 'HairSalon',
      'name' => 'GumiGumi by Ifh（グミグミ バイ イフ）',
      'url' => home_url('/gumigumi/'),
      'tel' => '+81-27-372-0304',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町971-3',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-gumigumi.jpg'),
    ],
    [
      'id' => home_url('/ang_n_honten/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail honten（アンジェリーク ネイル本店）',
      'url' => home_url('/ang_n_honten/'),
      'tel' => '+81-27-381-5133',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町1802-306',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-angh.jpg'),
    ],
    [
      'id' => home_url('/ang_n_iizuka/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail iizuka（アンジェリーク ネイル飯塚）',
      'url' => home_url('/ang_n_iizuka/'),
      'tel' => '+81-27-388-9675',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '飯塚町222-3',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-angI.jpg'),
    ],
    [
      'id' => home_url('/ang_n_maebashi/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail maebashi',
      'url' => home_url('/ang_n_maebashi/'),
      'tel' => '+81-27-289-9332',
      'region' => '群馬県',
      'locality' => '前橋市',
      'street' => '元総社町1983',
    ],
    [
      'id' => home_url('/ang_n_isesaki/') . '#localbusiness',
      'type' => 'NailSalon',
      'name' => 'Angelique Nail isesaki',
      'url' => home_url('/ang_n_isesaki/'),
      'tel' => '+81-270-27-4572',
      'region' => '群馬県',
      'locality' => '伊勢崎市',
      'street' => '安堀町207-1',
    ],
    [
      'id' => home_url('/ang_e_honten/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye honten（アンジェリーク アイ本店）',
      'url' => home_url('/ang_e_honten/'),
      'tel' => '+81-27-381-5133',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '棟高町1802-306',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-eyeH.jpg'),
    ],
    [
      'id' => home_url('/ang_e_iizuka/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye iizuka（アンジェリーク アイ飯塚）',
      'url' => home_url('/ang_e_iizuka/'),
      'tel' => '+81-27-388-9675',
      'region' => '群馬県',
      'locality' => '高崎市',
      'street' => '飯塚町222-3',
      'image' => home_url('/wp-content/themes/ifh_theme/assets/media/images/lower/shop-eyeI.jpg'),
    ],
    [
      'id' => home_url('/ang_e_maebashi/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye maebashi',
      'url' => home_url('/ang_e_maebashi/'),
      'tel' => '+81-27-289-9332',
      'region' => '群馬県',
      'locality' => '前橋市',
      'street' => '元総社町1983',
    ],
    [
      'id' => home_url('/ang_e_isesaki/') . '#localbusiness',
      'type' => 'BeautySalon',
      'name' => 'Angelique Eye isesaki',
      'url' => home_url('/ang_e_isesaki/'),
      'tel' => '+81-270-27-4572',
      'region' => '群馬県',
      'locality' => '伊勢崎市',
      'street' => '安堀町207-1',
    ],
  ];

  // 高崎ページ用（高崎市内の全店を対象）
  $stores_takasaki = array_values(array_filter($stores_all, function ($s) {
    return ($s['locality'] ?? '') === '高崎市';
  }));

  foreach ($stores_takasaki as &$s) {
    // 共通プロパティ
    $s['priceRange']          = '¥¥';
    $s['currenciesAccepted']  = 'JPY';
    $s['areaServed'] = [
      '@type' => 'City',
      'name'  => '高崎市',
    ];

    // 美容室（ヘアサロン）固有
    if ($s['type'] === 'HairSalon') {
      if ($s['url'] === home_url('/gumigumi/')) {
        // GumiGumi: 9:00〜18:00、毎週月曜・第1第3日曜定休
        $s['openingHours'] = 'Tu-Fr 09:00-18:00 Sa 09:00-18:00';
        $s['openingHoursSpecification'] = [
          [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens'     => '09:00',
            'closes'    => '18:00',
          ],
          [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Saturday'],
            'opens'     => '09:00',
            'closes'    => '18:00',
          ],
        ];
        $s['amenityFeature'] = [
          ['@type' => 'LocationFeatureSpecification', 'name' => '駐車場', 'value' => true],
        ];
        $s['description'] = '高崎市棟高町の美容室。9:00〜18:00営業（毎週月曜・第1第3日曜定休）。駐車場あり。カット・カラー・パーマに対応。';
      } else {
        // honten / iizuka: 平日10:00〜19:00、土日9:00〜19:00、第2月曜定休
        $s['openingHours'] = 'Mo-Fr 10:00-19:00 Sa-Su 09:00-19:00';
        $s['openingHoursSpecification'] = [
          [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens'     => '10:00',
            'closes'    => '19:00',
          ],
          [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Saturday', 'Sunday'],
            'opens'     => '09:00',
            'closes'    => '19:00',
          ],
        ];
        $s['amenityFeature'] = [
          ['@type' => 'LocationFeatureSpecification', 'name' => '駐車場', 'value' => true],
          ['@type' => 'LocationFeatureSpecification', 'name' => 'ネット予約', 'value' => true],
        ];
        $s['description'] = '高崎市の美容室Ifh。縮毛矯正・髪質改善・ヘアカラー・白髪染め・カット・パーマに対応。平日10:00〜19:00・土日9:00〜19:00営業。第2月曜定休。駐車場完備。ネット予約可能。';
      }
    }

    // ネイルサロン固有
    if ($s['type'] === 'NailSalon') {
      $s['description'] = '高崎市のネイルサロン Angelique Nail（アンジェリーク）。ジェルネイル・ネイルアート・ケアなど幅広いメニューに対応。';
    }

    // アイラッシュサロン固有
    if ($s['type'] === 'BeautySalon') {
      $s['description'] = '高崎市のアイラッシュサロン Angelique Eye（アンジェリーク）。まつ毛エクステ・まつ毛パーマ・アイブロウなどに対応。';
    }
  }
  unset($s);

  // ページ別設定
  $configs = [
    // トップ
    [
      'when' => fn() => (is_front_page() || is_home()),
      'page_url' => $home,
      'use_item_list' => true,
      'item_list_name' => 'Salon List',
      'stores' => $stores_all,
    ],

    // 高崎
    [
      'when'             => fn() => is_page('takasaki'),
      'page_url'         => home_url('/takasaki/'),
      'page_description' => '高崎市の美容室・ネイルサロン・アイラッシュサロンを展開するIfh（イフ）グループ。縮毛矯正・髪質改善・ヘアカラー・白髪染め・パーマ・カットに対応。高崎市内3美容室・全店駐車場完備・ネット予約可能。',
      'use_item_list'    => true,
      'item_list_name'   => '高崎市のIfhグループ店舗一覧',
      'speakable'        => [
        '@type'       => 'SpeakableSpecification',
        'cssSelector' => ['h1', '#js-page-summary'],
      ],
      'breadcrumb' => [
        [
          '@type'    => 'ListItem',
          'position' => 1,
          'name'     => 'ホーム',
          'item'     => $home,
        ],
        [
          '@type'    => 'ListItem',
          'position' => 2,
          'name'     => '高崎市の美容室｜Ifh（イフ）グループ',
          'item'     => home_url('/takasaki/'),
        ],
      ],
      'stores' => $stores_takasaki,
    ],
  ];

  foreach ($configs as $cfg) {
    ifh_output_structured_data_by_config($cfg);
  }
}, 20);
//// end 構造化データ（共通）

// 高崎ページ専用 FAQPage 構造化データ
add_action('wp_head', function () {
  if (!is_page('takasaki')) {
    return;
  }

  $faq_schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => [
      [
        '@type'          => 'Question',
        'name'           => '高崎市でおすすめの美容室はどこですか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => '高崎市内に美容室3店舗・ネイルサロン2店舗・アイラッシュサロン2店舗を展開するIfh（イフ）グループがおすすめです。丁寧なカウンセリング・高い技術力・全店舗駐車場完備・ネット予約対応で、多くの地域の方にご利用いただいています。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '高崎市で縮毛矯正・髪質改善が得意な美容室はありますか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'はい。Ifhグループでは縮毛矯正・髪質改善に力を入れており、クセ毛・うねり・広がりにお悩みの方から多くのご支持をいただいています。ダメージを最小限に抑えながら自然なまとまりある仕上がりを実現します。高崎市で縮毛矯正をお探しの方はぜひご相談ください。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '高崎市でヘアカラー・白髪染めが上手な美容室はどこですか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'Ifhグループでは、トレンドのインナーカラー・グラデーションカラーから白髪を自然にカバーする白髪染めまで幅広く対応しています。高崎市でカラーが得意な美容室をお探しの方に、お客様の肌色・ライフスタイルに合わせたカラープランをご提案します。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => 'ネット予約はできますか？当日予約は可能ですか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'はい、ホットペッパービューティーからのネット予約に対応しており、24時間いつでもご予約いただけます。当日のご予約はお電話にてご確認ください。お急ぎの場合は各店舗へ直接お電話いただくとスムーズです。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '駐車場はありますか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'はい、全店舗に駐車場を完備しています。Ifh本店は40台、Ifh飯塚は16台、GumiGumi by Ifhは店舗前に駐車スペースがあります。高崎市の美容室をお車でお探しの方も安心してご来店いただけます。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '定休日と営業時間を教えてください。',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'Ifh本店・Ifh飯塚は平日10:00〜19:00・土日9:00〜19:00営業、第2月曜日が定休日です（カット受付18:00まで、パーマ・カラー受付17:00まで）。GumiGumi by Ifhは9:00〜18:00営業、毎週月曜・第1・第3日曜が定休日です。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => 'ネイルやアイラッシュも一緒に受けられますか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'はい。Ifhグループでは「Angelique Nail（ネイルサロン）」と「Angelique Eye（アイラッシュサロン）」も高崎市内2店舗で展開しています。ヘア・ネイル・アイをトータルにご予約いただくことが可能です。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '初めてでも利用できますか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'もちろんです。高崎市のIfhは初めてのお客様を大歓迎しています。ご来店後に丁寧なカウンセリングを行い、ご希望のスタイルや髪のお悩みをヒアリングした上で施術を進めますので、お気軽にご来店ください。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '高崎市のどのエリアから通えますか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => 'Ifhグループは高崎市の棟高・飯塚エリアを中心に、問屋町・倉賀野・北高崎・井野・箕郷・群馬町・吉井・新町方面はもちろん、藤岡市・渋川市・安中市・吉岡町・榛東村・玉村町など周辺市町村からも多くのお客様にご来店いただいています。全店舗に駐車場を完備していますので、お車でのご来店も安心です。',
        ],
      ],
      [
        '@type'          => 'Question',
        'name'           => '子連れでも利用できますか？',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text'  => '詳細はご来店予定の店舗へ直接お問い合わせください。駐車場が完備されており、お車でのご来店が可能です。ご予約の際に事前にご相談いただくとスムーズです。',
        ],
      ],
    ],
  ];

  echo "\n" . '<script type="application/ld+json">' .
    wp_json_encode($faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
    "</script>\n";
}, 20);
//// end 高崎ページ FAQPage 構造化データ
