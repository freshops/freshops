<?php
/*
Template Name: No Sidebars (Default)
*/
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

						<div id="badge"><div></div></div><div id="location"><h1 class="page-title"><?php the_title(); ?></h1>

<!-- tab panel navigation loop starts here -->
				<?php if( have_rows('tab_panels') ):
						?><div class="tabs"><div><ul>
				<?php	while ( have_rows('tab_panels') ) : the_row();
								$section_title = get_sub_field('section_title');
								$section_slug  = sanitize_title($section_title);
								?><li><a href="#<?php echo $section_slug;?>"><?php echo $section_title ?></a></li>
						<?php endwhile;
						?></ul> <?php
						else:
					endif;
//tab panel navigation loop ends here
//tab panel content loop starts here
				if( have_rows('tab_panels') ):
						?> <?php
						while ( have_rows('tab_panels') ) : the_row();
							$section_title= get_sub_field('section_title');
							$section_slug=sanitize_title($section_title);
							?>
							<div id="<?php echo $section_slug; ?>">
								<?php the_sub_field('section_content'); ?>
							</div><?php
							<div class="clear"></div>
						endwhile;
						?></div><?php //
						else:
				endif; ?>
<!-- tab panel content loop ends here -->
						</header>

						<section class="entry-content clearfix" itemprop="articleBody">




								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
							</section>

								<footer class="article-footer">
								</footer>


							</article>

							<?php endwhile; else : ?>

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

						</div>

				</div>

			</div>

<?php get_footer(); ?>
