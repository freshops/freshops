<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part('includes/partials/content-single', $name); ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'freshopstheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'freshopstheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'freshopstheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
