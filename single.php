<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="single-post">
	<header class="container single-post-inner">
		<h5 class="categories">
			<?php the_category( ', '); ?>
		</h5>
		<h2 class="post-title"><?php the_title(); ?></h2>
		<div class="post-meta single-post-inner">
			<span><?php echo(get_the_date( 'F j, Y ')); ?></span>
			<span>by <?php the_author(); ?></span>
		</div>
	</header>
	<div class="container single-post-inner single-post-body">
		<?php the_content( ); ?>
		<p class="tags">
			 <?php the_tags( '','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',''); ?>
		</p>
	</div>
	<section class="container single-post-inner read-more">
		<hr>
		<?php 
		$next_post=get_adjacent_post( false,'', false ); 
		$previous_post=get_adjacent_post( false,'', true ); 
		if (!empty($next_post)){
		?>
		<div class="read-next row">
			<div class="col-xs-10">
				<p>Read Next</p>
		<?php 	echo'<h5 class="categories">';
				the_category( ', ','',$next_post->ID);
				echo'</h5>';
				echo'<a href="'.get_permalink( $next_post->ID ).'"><h3 class="post-title">'.$next_post->post_title.'</h3></a>';?>
			</div>
			<div class="read-more-icon col-xs-2">
				<?php 
				echo'<a href="'.get_permalink( $next_post->ID ).'" class="center-block"><span class="glyphicon glyphicon glyphicon-chevron-right"></span></a>';
				?>
			</div>
		</div>
		<?php
		}
		?>
		<?php
		if (!empty($previous_post)){
		?>
		<div class="read-previous row">
			<div class="read-more-icon col-xs-2 pull-left">
				<?php 
				echo'<a href="'.get_permalink( $previous_post->ID ).'" class="center-block"><span class="glyphicon glyphicon glyphicon-chevron-left"></span></a>';
				?>
			</div>
			<div class="col-xs-10">
				<p>Read Previous</p>
				<?php
				echo'<h5 class="categories">';
					the_category( ', ','',$previous_post->ID);
				echo'</h5>';
				echo'<a href="'.get_permalink( $previous_post->ID ).'"><h3 class="post-title">'.$previous_post->post_title.'</h3></a>';
				?>
			</div>
		</div>
		<?php
		}
		?>
	</section>
</section>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
