<?php
/*
Template Name: Hop Alpha Values
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">


			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="tabs">
					<div class="alpha_values">
						<header class="article-header">

							<h1 class="page-title" itemprop="headline"><?php echo date('Y'); ?> <?php the_title(); ?>
							</h1> 
						</header>
							
					get_template_part( 'includes/partials/content', 'alpha_values' );
					
					</div> //alpha_values
				</div> //.tabs
			
			<?php the_content(); ?>

				</div>

			</div>
		</div>
								<?php get_footer(); ?>


