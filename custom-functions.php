<?php
// フロントページと検索結果の表示件数を5件に制限する
add_filter('pre_get_posts', function($query) {
	if (is_admin())
		return;

	if (is_home() || is_front_page() || is_search()) {
		if (!$query->query_vars['posts_per_page'])
			$query->set('posts_per_page', 5);
	}
});
?>

<?php
// タイトルの後に関心度数を表示する
add_filter('the_title', function($title) {
	// 管理画面である場合はreturn
	if (is_admin())
		return $title;

	// メニュー等である場合はreturn
	global $post;
	if ($title != $post->post_title)
		return $title;

	// プラグインが有効でない場合はreturn
	if (!function_exists('scc_get_share_total'))
		return $title;

	// カウントが0である場合はreturn
	$count = intval(scc_get_share_total());
	if (!$count)
		return $title;

	// タイトルに関心度数を表示する
	$interestCount = $count == 1 ? '1 interest' : $count . ' interests';
	if ($count <= 3) {
		$interestClass = 'interest interest-low';
	} elseif ($count <= 10) {
		$interestClass = 'interest interest-middle';
	} else {
		$interestClass = 'interest interest-high';
	}

	return  $title . '<span class="' . $interestClass . '">' . $interestCount . '</span>';
});
?>