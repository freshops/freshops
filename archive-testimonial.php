f<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">

			<h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

			<?php if (have_posts()) {
				while (have_posts()) {
					the_post();
						get_template_part('includes/partials/content', 'testimonial'); ?>
				<?php } //endwhile; ?>
				<?php if ( function_exists( 'freshops_page_navi' ) ) { ?>
				<?php freshops_page_navi(); ?>
				<?php } else { ?>
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'freshopstheme' )) ?></li>
						<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'freshopstheme' )) ?></li>
					</ul>
				</nav>
				

			<?php } //else {};
		?>

				<article id="post-not-found" class="hentry clearfix">
					<header class="article-header">
						<h1><?php _e( 'Oops, Post Not Found!', 'freshopstheme' ); ?></h1>
					</header>
					<section class="entry-content">
						<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'freshopstheme' ); ?></p>
					</section>
					<footer class="article-footer">
						<p><?php _e( 'This is the error message in the custom posty type archive template.', 'freshopstheme' ); ?></p>
					</footer>
				</article>

			<?php } //endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>
