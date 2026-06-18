<?php
if (!defined('ABSPATH')) {
	exit;
}

/**
 * CSP (Report-Only) + nonce
 * - 許可ドメインを明示（https: の包括許可を避ける）
 * - report-uri（互換） + report-to（推奨）を併用
 * - WordPressの script / inline script へ nonce を付与（可能な範囲）
 */
add_action('send_headers', function () {

	// 既に送信済みの場合は何もしません
	if (headers_sent()) {
		return;
	}

	// レスポンス単位の nonce
	$nonce = rtrim(strtr(base64_encode(random_bytes(16)), '+/', '-_'), '=');
	$GLOBALS['csp_nonce'] = $nonce;

	// -----------------------------
	// 許可先ドメイン（必要に応じて調整）
	// GA4/gtag単体の場合でも、GTM統一の場合でも、いずれか一方に整理する前提です
	// -----------------------------
	$google_script = [
		'https://www.googletagmanager.com',
		'https://www.google-analytics.com',
	];

	$google_connect = [
		'https://www.google-analytics.com',
		'https://region1.google-analytics.com',
		'https://stats.g.doubleclick.net',
	];

	$google_img = [
		'https://www.google-analytics.com',
		'https://stats.g.doubleclick.net',
	];

	$fonts = [
		'https://fonts.googleapis.com',
		'https://fonts.gstatic.com',
	];

	// 文字列化ヘルパ
	$join = static function (array $list): string {
		$list = array_values(array_unique(array_filter($list)));
		return $list ? (' ' . implode(' ', $list)) : '';
	};

	// -----------------------------
	// CSPポリシー（Report-Only）
	// -----------------------------
	$policy  = "default-src 'self'; ";
	$policy .= "base-uri 'self'; ";
	$policy .= "object-src 'none'; ";
	$policy .= "frame-ancestors 'self'; ";
	$policy .= "form-action 'self'; ";
	$policy .= "upgrade-insecure-requests; ";
	$policy .= "block-all-mixed-content; ";

	// 画像
	$policy .= "img-src 'self' data:" . $join($google_img) . " https:; ";

	// フォント
	$policy .= "font-src 'self' data:" . $join($fonts) . "; ";

	// CSS（nonce を付ける場合は inline style にも対応可能ですが、原則は外部化が安定です）
	$policy .= "style-src 'self' 'nonce-{$nonce}'" . $join($fonts) . "; ";
	$policy .= "style-src-elem 'self' 'nonce-{$nonce}'" . $join($fonts) . "; ";

	// JS（nonce を許可し、必要な外部ドメインを列挙）
	// 'unsafe-inline' は付与しません
	$policy .= "script-src 'self' 'nonce-{$nonce}'" . $join($google_script) . "; ";
	$policy .= "script-src-elem 'self' 'nonce-{$nonce}'" . $join($google_script) . "; ";

	// XHR/fetch/websocket 等
	$policy .= "connect-src 'self'" . $join($google_connect) . "; ";

	// レポート送信先
	// report-uri は互換のため残し、report-to を併用します
	$policy .= "report-uri /csp-report-endpoint; ";
	$policy .= "report-to csp-endpoint; ";

	// Report-To ヘッダー（report-to が参照するグループ）
	$reportTo = [
		'group' => 'csp-endpoint',
		'max_age' => 10886400,
		'endpoints' => [
			['url' => home_url('/csp-report-endpoint')],
		],
		'include_subdomains' => false,
	];

	header('Content-Security-Policy-Report-Only: ' . $policy);
	header('Report-To: ' . wp_json_encode($reportTo, JSON_UNESCAPED_SLASHES));
}, 0);


/**
 * WordPressが出力する <script> タグへ nonce を付与します（外部JSでも付与可）。
 * これにより、enqueueされたスクリプトの実装側で nonce 管理がしやすくなります。
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {
	if (empty($GLOBALS['csp_nonce'])) {
		return $tag;
	}
	if (stripos($tag, ' nonce=') !== false) {
		return $tag;
	}
	$nonce = esc_attr($GLOBALS['csp_nonce']);
	return preg_replace('/^<script\b/', '<script nonce="' . $nonce . '"', $tag, 1);
}, 10, 3);


/**
 * wp_add_inline_script 等で出力されるインライン script へ nonce を付与します（WPが対応している場合）。
 * 環境によりフィルターが存在しない場合があるため、存在確認の上で適用します。
 */
if (has_filter('wp_inline_script_attributes') || function_exists('add_filter')) {
	add_filter('wp_inline_script_attributes', function ($attrs) {
		if (empty($GLOBALS['csp_nonce'])) {
			return $attrs;
		}
		$attrs['nonce'] = $GLOBALS['csp_nonce'];
		return $attrs;
	});
}

/**
 * インライン style へも nonce を付与する場合（WPが対応している場合）。
 * ただし、運用上は「インライン style の外部化」が安定します。
 */
if (has_filter('wp_inline_style_attributes') || function_exists('add_filter')) {
	add_filter('wp_inline_style_attributes', function ($attrs) {
		if (empty($GLOBALS['csp_nonce'])) {
			return $attrs;
		}
		$attrs['nonce'] = $GLOBALS['csp_nonce'];
		return $attrs;
	});
}
