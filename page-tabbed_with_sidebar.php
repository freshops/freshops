<?php
/*
Template Name: Tabbed Content with Sidebar
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">

						<div id="badge"><div></div></div><div id="location"><h1 class="page-title"><?php the_title(); ?></h1>
						<?php
				//tab panel navigation list
					if( have_rows('tab_panels') ):
						?><div class="tabs nav"><div><ul>
				<?php	while ( have_rows('tab_panels') ) : the_row();
					$page_title=
								$section_title = get_sub_field('section_title');
								$section_slug  = sanitize_title($section_title);

								?><li><a href="#<?php echo $section_slug;?>"><?php echo $section_title ?></a></li>
				<?php endwhile;
				?></ul> <?php
						else:
					endif;

				//tab panel content
				if( have_rows('tab_panels') ):
						?> <?php
						while ( have_rows('tab_panels') ) : the_row();
							$section_title= get_sub_field('section_title');
							$section_slug=sanitize_title($section_title);
							?><div class="clear"></div>
							<div id="<?php echo $section_slug; ?>">
							<?php the_sub_field('section_content');

						?> </div> <?php
						endwhile;
						?> </div></header><?php
						else: ?> </header> <?php
				endif; //end tab panels repeater ?>

					<section class="entry-content clearfix" itemprop="articleBody">
				<?php the_content(); ?>
			</section>

			<footer class="article-footer">
				<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

			</footer>

			<?php comments_template(); ?>

		</article>

	<?php endwhile; else : ?>

	<article id="post-not-found" class="hentry clearfix">
		<header class="article-header">
			<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
		</header>
		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
		</section>
		<footer class="article-footer">
			<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
		</footer>
	</article>

<?php endif; ?>

</div>

</div>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
