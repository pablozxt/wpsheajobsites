<?php $videoID = get_post_meta( get_the_ID(),'video_url', $single );?>
<hr>
<h5 class="categories">
	<?php the_category( ', '); ?>
</h5>
<a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
<div class="post-meta">
	<span><?php echo(get_the_date( 'F j, Y ')); ?></span>
	<span>by <?php the_author(); ?></span>
</div>
<div class="row">
	<div class="col-xs-12 post-summary-text">
		<?php the_excerpt();?>
	</div>	
</div>	