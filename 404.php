<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">

						<article id="post-not-found" class="hentry clearfix">

							<header class="article-header">

								<h1 class="page-title"><?php _e( 'Sorry, Page not Found', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The page you were looking for was not found at that address and returned a 404 error. Try using the navigation or the search bar below to find what you seek.', 'bonestheme' ); ?></p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

							<footer class="article-footer">

									<p><?php _e( 'This is the 404.php template.', 'bonestheme' ); ?></p>

							</footer>

						</article>

					</div>

				</div>

			</div>

<?php get_footer(); ?>