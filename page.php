<?=get_header()?>

<?php if (have_posts()): ?>
	
	<?php while (have_posts()): ?>
		
		<?=the_post()?>
		
		<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
			<header>
				
				<?=get_template_part('includes/partials/content', 'header')?>
				
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
						'testimonials',
					);
					
				?>
				
				<?php if ((is_single() || is_page()) && in_array($name, $special)): ?>
					
					<?=get_template_part('includes/partials/content', $name)?>
					
				<?php else: ?>
					
					<?=get_template_part('includes/partials/content')?>
					
				<?php endif; ?>
				
			</section> <!-- /#content -->
			
		</article>
		
	<?php endwhile; ?>
	
<?php else: ?>
	
	<?=get_template_part('includes/partials/content', 'none')?>
	
<?php endif; ?>

<?=get_footer()?>
