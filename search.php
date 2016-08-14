<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'freshops_rhizome' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h3 class="search-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'freshops_rhizome' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'freshops_rhizome' ) ), freshops_get_the_author_posts_link(), get_the_category_list(', ') );
									?></p>

								</header>

								<section class="entry-content">
										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'freshops_rhizome' ) . '</span>' ); ?>

								</section>

								<footer class="article-footer">

								</footer>

							</article>

						<?php endwhile; ?>

								<?php if (function_exists('freshops_page_navi')) { ?>
										<?php freshops_page_navi(); ?>
								<?php } else { ?>
										<nav class="wp-prev-next">
												<ul class="clearfix">
													<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'freshops_rhizome' )); ?></li>
													<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'freshops_rhizome' )); ?></li>
												</ul>
										</nav>
								<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'freshops_rhizome' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'freshops_rhizome' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'freshops_rhizome' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>
<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">
							<?php get_sidebar(); ?>
							</div>

					</div>

			</div>

<?php get_footer(); ?>
