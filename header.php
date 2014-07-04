<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title( ' | ', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
		<!--<link rel="stylesheet" href="http://basehold.it/25">-->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>	
  
	  <!--navigation bar-->
	  
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo home_url(); ?>" class="main-logo pull-left"><img src="<?php bloginfo('template_directory'); ?>/img/shea_logo.png" alt="J.F.Shea Logo" class="img-responsive"></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>	
			</div>
			<div id="top-navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<?php 
						$args = array(
							'menu'=>'main-menu',
							'container'=> '',
							'items_wrap'=>'%3$s'
						);
						wp_nav_menu( $args); 
						if (!current_user_can('edit_posts')){?> 
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php 
						$current_user = wp_get_current_user();
						if(!is_null($current_user->display_name)){
							echo $current_user->display_name;
						} else {
							echo $current_user->user_login;
						}
						?>&nbsp<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a href="<?php echo get_edit_user_link(); ?>">My Profile</a></li>
						<li><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
						</ul>
					</li>
					<?php 
					} 
					?>
					<li>	
						<?php get_search_form(); ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>