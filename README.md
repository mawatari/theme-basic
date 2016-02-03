/themify/themify-utils.php
```
-		$output = '<span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" itemprop="url"><span itemprop="name">' . get_the_author() . '</span></a></span>';
+		$output = '<span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" itemprop="url"><span itemprop="name">' . get_the_author() . '</span></a></span>';
```

index.php
```
 					<?php if(is_search()): ?>
  						<?php get_template_part( 'includes/loop' , 'search'); ?>
+					<?php elseif(is_category() || is_tag() || is_date()): ?>
+						<?php get_template_part( 'includes/loop-title' , 'index'); ?>
  					<?php else: ?>
  						<?php get_template_part( 'includes/loop' , 'index'); ?>
  					<?php endif; ?>
```
