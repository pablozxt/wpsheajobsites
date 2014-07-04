<?php get_header(); ?>

	<?php 
	$args = array(
		'post_type' => 'post',
		'meta_key' => 'display_on_home_slider',
		'meta_value' => 'Yes',
		'posts_per_page' => 3	
		);
	$the_query = new WP_Query($args);
	?>
	<header class="container main">
		<?php if ( $the_query->have_posts() ) : ?>
		<div id="header-carousel" class="carousel slide">
			<ol class="carousel-indicators">
				<li data-target="#header-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#header-carousel" data-slide-to="1"></li>
				<li data-target="#header-carousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<?php $i=1;
				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="item <?php if ($i==1) echo "active"; ?> featured featured-<?php echo $i; ?>" style="<?php if('' != get_the_post_thumbnail()){echo 'background:url('.wp_get_attachment_url( get_post_thumbnail_id()).') no-repeat center center;background-size:cover;';}?>">
					<div class="featured-title">
						<div class="featured-title-inner">
							<a href="<?php the_permalink(); ?>" class="center-title"><h1 class="main-title center-block"><?php the_title(); ?></h1></a>
						</div>
					</div>
				</div>
				<?php 
				$i+=1;
				endwhile;
				wp_reset_postdata(); ?>
			</div>
			<a class="left carousel-control hidden-xs" href="#header-carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control hidden-xs" href="#header-carousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
		<?php endif; ?>
	</header>	
	
	<?php 
		$args = array(
		'post_type' => 'post',
		'meta_key' => 'display_on_home_slider',
		'meta_value' => 'No',
		'posts_per_page' => 10	
		);
		$the_query = new WP_Query($args);
	?>
	<?php 	if ( $the_query->have_posts() ) : 
				$i=1; 
				while ( $the_query->have_posts() ) : 
				$the_query->the_post(); 
					if($i & 1){
						echo '<section class="post-summary-group-standard">';
						echo '	<div class="container">';
						echo '		<div class="row">';
					}
	?>		
							<article class="col-lg-6 post-summary">
								<?php get_template_part( 'get', 'summary');?>
							</article>
						
				<?php
					if(!($i & 1)){
						echo '	</div>';
						echo '</div>';
						echo '</section>';
					}
				$i+=1;
				endwhile;
				wp_reset_postdata(); 
			endif; 
	?>


<?php get_footer(); ?>