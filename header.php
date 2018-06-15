<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dutchtown
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/wp-content/themes/dutchtown/dist/favicons/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="/wp-content/themes/dutchtown/dist/favicons/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="/wp-content/themes/dutchtown/dist/favicons/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="/wp-content/themes/dutchtown/dist/favicons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="/wp-content/themes/dutchtown/dist/favicons/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="/wp-content/themes/dutchtown/dist/favicons/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="DutchtownSTL.org"/>
	<meta name="msapplication-TileColor" content="#000000" />
	<meta name="msapplication-TileImage" content="/wp-content/themes/dutchtown/dist/favicons/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="/wp-content/themes/dutchtown/dist/favicons/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="/wp-content/themes/dutchtown/dist/favicons/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="/wp-content/themes/dutchtown/dist/favicons/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="/wp-content/themes/dutchtown/dist/favicons/mstile-310x310.png" />


	<?php wp_head(); ?>

	<link rel="stylesheet" href="/wp-content/themes/dutchtown/dist/css/main.css">
	
</head>

<body <?php body_class( 'balance-text' ); ?>>
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content.', 'dutchtown' ); ?></a>

	<header class="site-header">
	
		<?php get_template_part( 'flexinav' ); ?>

	</header><!-- .site-header -->

	<div id="content" class="site-content">
