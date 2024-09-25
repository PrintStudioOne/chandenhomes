<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chandenhomes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-76489233-23"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-76489233-23');
	</script>
	<link rel="profile" href="https://gmpg.org/xfn/11">
  	<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Playfair+Display" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/chandenhomes/slick/slick.css"/>
  	<link rel="stylesheet" type="text/css" href="/wp-content/themes/chandenhomes/slick/slick-theme.css"/>
	<link rel="icon" type="image/png" href="/wp-content/themes/chandenhomes/images/favicon.png">
	<!-- Add the slick-theme.css if you want default styling -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <!-- Add the slick-theme.css if you want default styling -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> 
             
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( '', 'chandenhomes' ); ?></a>


	<?php if (is_page('home')): ?>

	<header id="masthead" class="site-header">
		<div class="head-grad"></div>
		<div class="logo">
			<a href="/"><img src="/wp-content/themes/chandenhomes/images/logo.png" alt="Chanden Home Logo"></a>
		</div>
		<div class="button_container" id="toggle">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>

			<div class="overlay" id="overlay">
			<nav id="site-navigation3" class="overlay-menu menu-container">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>

		<div class="width-1700 center">
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
				<a target="_blank" style="display: inline-block;" href="https://www.instagram.com/chandenhomes/">
					<img src="/wp-content/themes/chandenhomes/images/instagram.png" alt="Instagram Icon">
				</a>			</nav><!-- #site-navigation -->
		</div>

	</header><!-- #masthead -->
<?php endif; ?>


	<?php if (!is_page('home')): ?>

		<header id="masthead2" class="site-header2">
			<div class="logo">
				<a href="/"><img src="/wp-content/themes/chandenhomes/images/logo.png" alt="Chanden Home Logo"></a>
			</div>
			<div class="button_container" id="toggle">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>

				<div class="overlay" id="overlay">
				<nav id="site-navigation3" class="overlay-menu menu-container">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>

				</nav><!-- #site-navigation -->
			</div>

			<div class="width-1700 center">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
					<a target="_blank" style="display: inline-block;" href="https://www.instagram.com/chandenhomes/">
					  <img src="/wp-content/themes/chandenhomes/images/instagram.png" alt="Instagram Icon">
					</a>
				</nav><!-- #site-navigation -->
			</div>

		</header><!-- #masthead -->
	<?php endif; ?>


	<a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up" aria-hidden="true"></i></a>


	<div id="content" class="site-content">
