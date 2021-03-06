<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package chestnut_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- TEMPORARY HARD LINK TO STYLESHEET TO PREVENT CACHING - REMOVE WHEN READY TO LAUNCH -->
<link rel="stylesheet" id="chestnut_theme-style-css" href="http://www.chestnut-learning.com/wp-content/themes/chestnut-theme/style.css" type="text/css" media="all">

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php force_login(); ?>
<div id="page" class="hfeed site">
	<header id="masthead" class="<?php echo of_get_option('header_layout'); ?>">
		<div class="mid-content clearfix">
		<div id="site-logo">
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
		</a>
		<?php else:?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
		<div class="menu-toggle"><?php _e( 'Menu', 'chestnut_theme' ); ?></div>
					
			<?php 
			$sections = of_get_option('parallax_section');
			if(of_get_option('enable_parallax')==1 && !empty($sections) && ('page' != get_option( 'show_on_front'))): ?>
			<ul class="nav">
			<?php
				if(of_get_option('show_slider')== "yes") : ?>
					<li class="current"><a href="#main-slider">Home</a></li>
				<?php endif;
				
				foreach ($sections as $single_sections): 
					if($single_sections['layout'] != "action_template" && $single_sections['layout'] != "blank_template" && $single_sections['layout'] != "googlemap_template" && !empty($single_sections['page'])) :
					$title = get_the_title($single_sections['page']); ?>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#<?php echo sanitize_title($title); ?>"><?php echo $title; ?></a></li>
					<?php 
					endif;
				endforeach; ?>
			</ul>

			<?php else: 
				wp_nav_menu( array( 
					'theme_location' => 'primary' , 
					'container'      => '',
					'menu_class'      => 'nav',
					'fallback_cb'     => 'wp_page_menu',
					) );
			endif; ?>
		
		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

