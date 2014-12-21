<?=get_header()?>

<?php if (have_posts()): ?>

	<?php while (have_posts()): ?>

		<?=the_post()?>

		<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header>

				<?=get_template_part('includes/partials/content', 'header')?>

			</header>

			<section id="content" itemprop="articleBody">

				<?=get_template_part('includes/partials/content', 'page')?>

			</section> <!-- /#content -->

		</article>

	<?php endwhile; ?>

<?php else: ?>

	<?=get_template_part('includes/partials/content', 'none')?>

<?php endif; ?>

<?=get_footer()?>
