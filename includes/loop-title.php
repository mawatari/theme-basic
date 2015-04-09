<?php if(!is_single()){ global $more; $more = 0; } //enable more link ?>

<?php 
/** Themify Default Variables
 *  @var object */
global $themify;
?>

<?php themify_post_before(); // hook ?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class("post clearfix post-title-list " . $themify->get_categories_as_classes(get_the_ID())); ?>>
	
	<?php themify_post_start(); // hook ?>

	<div class="post-content">

		<?php if($themify->hide_title != 'yes'): ?>
			<?php themify_before_post_title(); // Hook ?>
			<?php if($themify->unlink_title == 'yes'): ?>
				<h1 class="post-title entry-title" itemprop="name"><?php the_title(); ?></h1>
			<?php else: ?>
				<h1 class="post-title entry-title" itemprop="name"><a href="<?php echo themify_get_featured_image_link(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php endif; //unlink post title ?>
			<?php themify_after_post_title(); // Hook ?> 
		<?php endif; //post title ?>    

		<?php if($themify->hide_meta != 'yes'): ?>
			<p class="post-meta entry-meta">	
				<?php if($themify->hide_date != 'yes'): ?>
					<time datetime="<?php the_time('o-m-d') ?>" class="post-date entry-date updated" itemprop="datePublished"><?php echo get_the_date( apply_filters( 'themify_loop_date', '' ) ) ?></time>
				<?php endif; //post date ?>

				<span class="post-category"><?php the_category(', ') ?></span>
				<?php the_tags(' <span class="post-tag">', ', ', '</span>'); ?>
				<?php  if( !themify_get('setting-comments_posts') && comments_open() ) : ?>
					<span class="post-comment"><?php comments_popup_link( __( '0 Comments', 'themify' ), __( '1 Comment', 'themify' ), __( '% Comments', 'themify' ) ); ?></span>
				<?php endif; //post comment ?>
			</p>
		<?php endif; //post meta ?>    
		
		<?php edit_post_link(__('Edit', 'themify'), '<span class="edit-button">[', ']</span>'); ?>
		
	</div>
	<!-- /.post-content -->
	<?php themify_post_end(); // hook ?>
	
</article>
<?php themify_post_after(); // hook ?>

<!-- /.post -->
