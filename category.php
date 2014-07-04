<?php get_header(); ?>
<div class="container">
	<section class="post-summary-group-standard search-result">
		<p class="entry-title"><?php _e( 'Category Archives: ', 'blankslate' ); ?><?php single_cat_title(); ?></p>
		<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="post-summary">
			<?php get_template_part( 'get', 'summary');?>
		</article>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>