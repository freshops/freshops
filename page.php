<?php get_header(); ?>

<?php if (have_posts()): ?>

	<?php while (have_posts()): ?>

		<?php the_post(); ?>

		<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header>

				<?php get_template_part('includes/partials/content', 'header'); ?>

			</header>


			<section id="content" itemprop="articleBody">

				<div class="fix">

					<div id="mainbar" class="m-all t-2of3 d-5of7">

						<?php get_template_part('includes/partials/content', 'page');?>

					</div> <!-- /#mainbar -->

					<div id="sidebar" class="sidebar m-all t-1of3 d-2of7 last-col" role="complementary">

						<?php get_sidebar(); ?>

					</div> <!-- /#sidebar -->

				</div> <!-- /.fix -->

			</section> <!-- /#content -->

		</article>

	<?php endwhile; ?>

<?php else: ?>

	<?php get_template_part('includes/partials/content', 'none'); ?>

<?php endif; ?>

<?php get_footer(); ?>
