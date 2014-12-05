<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // Google Chrome Frame for IE ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- alexa verification code -->
	<meta name="alexaVerifyID" content="QYDJ_cs5ZwQGkUU1SfRwlPJxQQQ" />

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<?php // or, set /favicon.ico for IE10 win ?>
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<?php // wordpress head functions ?>

			<?php wp_head(); ?>
			<?php // end of wordpress head ?>

			<?php // drop Google Analytics Here ?>
			<?php // end analytics ?>
		</head>

		<body <?php body_class(); ?>>

			<div id="container">

				<header class="header" role="banner">
					<div id="sitelogo">
						<h1 class="image-replacement"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?>
						</a></h1>
					</div>
					<nav role="navigation">

					<div id="order">
						<div><a href="/shop"></a></div>
						<ul class="order">
							<li><a href="/hops/">Order Whole Hops</a></li>
							<li><a href="/rhizomes/">Order Hop Rhizomes (plants)</a></li>
							<li><a href="/merchandise/">Order Merchandise</a></li>
							<li><a href="/testimonials/">Testimonials</a></li>
						</ul>
					</div>
					<?php
					// order_nav();
					 bones_main_nav(); ?>
					<div id="hops"> <div></div>
					</div>
					</nav>

	<div id="inner-header" class="wrap clearfix">

	</div>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':62182/autorefresh.js"></' + 'script>')</script>

</header>