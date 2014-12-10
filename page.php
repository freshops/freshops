<?php get_header(); ?>

<?php if (have_posts()): ?>
	
	<?php while (have_posts()): ?>
		
		<?php the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
			<header>
				
				<div id="location"><div><h1><?php the_title(); ?></h1></div></div>
				
				<?php if (have_rows('tab_panels')): ?>
					
					<div id="submenu" class="tabs">
						
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
					
					<h2 class="sh4"><?php echo get_deck(); ?></h2>
					
				<?php endif; ?>
				
			</header>
			
			<section id="content" itemprop="articleBody">
				
				<?php the_content(); ?>
				
			</section> <!-- /#content -->
			
		</article>
		
	<?php endwhile; ?>
	
<?php else: ?>
	
	<?php # Move to include file: ?>
	
	<article id="post-not-found" class="hentry clearfix">
		
		<header class="article-header">
			<h1><?php _e( 'Oops, Post Not Found!', 'freshopstheme' ); ?></h1>
		</header>
		
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'freshopstheme' ); ?></p>
		</section>
		
		<footer class="article-footer">
			<p><?php _e( 'This is the error message in the page.php template.', 'freshopstheme' ); ?></p>
		</footer>
		
	</article>
	
<?php endif; ?>

<?php get_footer(); ?>
