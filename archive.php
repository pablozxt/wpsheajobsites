<?php get_header(); ?>
<div class="container">
	<section class="post-summary-group-standard search-result">
		<p class="entry-title"><?php 
		if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
		elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
		elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
		else { _e( 'Archives', 'blankslate' ); }
		?></p>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="post-summary">
			<?php get_template_part( 'get', 'summary');?>
		</article>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>

