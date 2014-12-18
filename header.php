<!doctype html>
<html class="no-touch no-js" lang="en" dir="ltr">

<head>

	<meta charset="utf-8">

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<script>/*! no-touch uglified | https://gist.github.com/mhulse/4704893 */!function(o,n,c){("ontouchstart"in o||o.DocumentTouch&&n instanceof DocumentTouch||c.MaxTouchPoints>0||c.msMaxTouchPoints>0)&&(n.documentElement.className=n.documentElement.className.replace(/\bno-touch\b/,"touch"))}(window,document,navigator);</script>
	<script>/*! no-js uglified | https://gist.github.com/mhulse/4704893 */!function(e){e.documentElement.className=e.documentElement.className.replace(/\bno-js\b/,"js")}(document);</script>

	<title><?=wp_title('')?></title>

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<meta name="msapplication-tileimage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<meta name="msapplication-tilecolor" content="#f01d4f">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?=wp_head()?>
	<!-- Google analytics code for freshops WP -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-57801308-1', 'auto');
 		ga('send', 'pageview');
	</script>
</head>
<body <?=body_class()?>>

	<div id="container">

		<h6 id="flag"><a href="<?=home_url()?>"><?=bloginfo('name')?></a></h6>
		<div id="secondary">

			<aside>

				<div id="order">

					<div id="cta"><a href="/shop/"><span>Place an order</span></a></div>

					<ul>
						<li><a href="/hops/">Order Whole Hops</a></li>
						<li><a href="/rhizomes/">Order Hop Rhizomes (plants)</a></li>
						<li><a href="/merchandise/">Order Merchandise</a></li>
						<li><a href="/testimonials/">Testimonials</a></li>
					</ul>

				</div> <!-- /#order -->

				<nav id="menu" role="navigtion">

					<?=freshops_main_nav()?>

				</nav>

				<div id="hops"><div></div></div>

			</aside>

		</div> <!-- /#secondary -->
		
		<main id="primary" role="main">

			<div id="wrap">
			
<a id="view-cart" href="#cart">View cart</a>

				<div id="badge"><div></div></div>
