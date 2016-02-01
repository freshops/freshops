<?php
	/**
	 * Template Name: No Sidebar
	 */
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>

	<?php while (have_posts()): ?>

		<?php the_post(); ?>

		<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header>

				<?php get_template_part('includes/partials/content', 'header'); ?>

			</header>

			<section id="content" itemprop="articleBody">

				<?php get_template_part('includes/partials/content', 'page'); ?>

			</section> <!-- /#content -->

		</article>

	<?php endwhile; ?>

<?php else: ?>

	<?php get_template_part('includes/partials/content', 'none'); ?>

<?php endif; ?>

<?php get_footer(); ?>
