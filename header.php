<!doctype html>
<html class="no-touch no-js" lang="en" dir="ltr">

<head>
	
	<meta charset="utf-8">
	
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	
	<script>/*! no-touch uglified | https://gist.github.com/mhulse/4704893 */!function(o,n,c){("ontouchstart"in o||o.DocumentTouch&&n instanceof DocumentTouch||c.MaxTouchPoints>0||c.msMaxTouchPoints>0)&&(n.documentElement.className=n.documentElement.className.replace(/\bno-touch\b/,"touch"))}(window,document,navigator);</script>
	<script>/*! no-js uglified | https://gist.github.com/mhulse/4704893 */!function(e){e.documentElement.className=e.documentElement.className.replace(/\bno-js\b/,"js")}(document);</script>
	
	<title><?php wp_title(''); ?></title>
	
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<meta name="msapplication-tileimage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<meta name="msapplication-tilecolor" content="#f01d4f">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	
	<h6 id="flag"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h6>
	
	<div id="container">
		
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
				
				<nav id="menu">
					
					<?php freshops_main_nav(); ?>
					
				</nav>
				
				<div id="hops"><div></div></div>
				
			</aside>
			
		</div> <!-- /#secondary -->
		
		<main id="primary">
			
			<div id="wrap">
				
				<div id="badge"><div></div></div>
