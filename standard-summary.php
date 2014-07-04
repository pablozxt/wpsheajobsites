<?php $thumb_id = get_post_thumbnail_id(); ?>
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
	<div class="col-xs-6 pull-right post-summary-text">
		<?php the_excerpt();?>
	</div>	
	<div class="col-xs-6 pull-left post-summary-image">
		<img src="<?php echo(wp_get_attachment_url( $thumb_id)); ?>" alt="<?php echo(get_post_meta($thumb_id, '_wp_attachment_image_alt', true)); ?>" class="img-responsive img-thumbnail"/>
	</div>
</div>