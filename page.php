<?php get_header(); ?>

<?php if (have_posts()): ?>
	
	<?php while (have_posts()): ?>
		
		<?php the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
			<header>
				
				<div id="location"><div><h1><?php the_title(); ?></h1></div></div>
				
				<?php if (have_rows('tab_panels')): ?>
					
					<div id="submenu" class="deck tabs">
						
						<div>
							
							<ul>
								<?php while (have_rows('tab_panels')): ?>
									
									<?php
										the_row();
										$section_title = get_sub_field('section_title');
										$section_slug = sanitize_title($section_title);
									?>
									
									<li><a href="#<?php echo $section_slug; ?>"><?php echo $section_title; ?></a></li>
									
								<?php endwhile; ?>
								
							</ul>
							
						</div>
						
					</div> <!-- /#submenu -->
					
				<?php elseif (has_deck()): ?>
					
					<div id="subhead" class="deck"><div><h2><?php echo get_deck(); ?></h2></div></div>
					
				<?php endif; ?>
				
			</header>
			
			<section id="content" itemprop="articleBody">
				
				<?php
					
					global $post;
					
					$name = $post->post_name;
					
					# Add special partial template names here:
					$special = array(
						'alpha-acid-percentages',
						'hops-rhizome-information',
						'hop-variety-descriptions',
					);
					
				?>
				
				<?php if ((is_single() || is_page()) && in_array($name, $special)): ?>
					
					<?php get_template_part('includes/partials/content', $name); ?>
					
				<?php else: ?>
					
					<?php get_template_part('includes/partials/content'); ?>
					
				<?php endif; ?>
				
			</section> <!-- /#content -->
			
		</article>
		
	<?php endwhile; ?>
	
<?php else: ?>
	
	<?php get_template_part('includes/partials/content', 'none'); ?>
	
<?php endif; ?>

<?php get_footer(); ?>
