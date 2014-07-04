<?php get_header(); ?>
<div class="container">
	<section class="post-summary-group-standard search-result">
		<?php if ( have_posts() ) : ?>
		<p class="entry-title"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></p>
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="post-summary">
				<?php get_template_part( 'get', 'summary');?>
			</article>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="min-height">
				<p class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></p>
				<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
			</div>
		<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>