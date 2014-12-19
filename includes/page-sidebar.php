<?php


	/**
	 * Template Name: Tabbed Content with Sidebar
	 */


?>

<?=get_header()?>

<?php if (have_posts()): ?>

	<?php while (have_posts()): ?>

		<?=the_post()?>

		<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header>

				<?=get_template_part('includes/partials/content', 'header')?>

			</header>


			<section id="content" itemprop="articleBody">

				<div class="fix">

					<div id="mainbar" class="m-all t-2of3 d-5of7">

						<?=get_template_part('includes/partials/content', 'page')?>

					</div> <!-- /#mainbar -->

					<div id="sidebar" class="sidebar m-all t-1of3 d-2of7 last-col" role="complementary">

						<?=get_sidebar()?>

					</div> <!-- /#sidebar -->

				</div> <!-- /.fix -->

			</section> <!-- /#content -->

		</article>

	<?php endwhile; ?>

<?php else: ?>

	<?=get_template_part('includes/partials/content', 'none')?>


<?php endif; ?>

<?=get_footer()?>
