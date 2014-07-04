<?php get_header(); ?>
<div class="container">
	<section class="post-summary-group-standard search-result">
		<p class="entry-title"><?php _e( 'Tag Archives: ', 'blankslate' ); ?><?php single_tag_title(); ?></p>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="post-summary">
			<?php get_template_part( 'get', 'summary');?>
		</article>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>

