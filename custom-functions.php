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
