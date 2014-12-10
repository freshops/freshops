<?php
/*
Template Name: Hop Alpha Values
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">


			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="tabs">
					<div class="alpha_values">
						<header class="article-header">

							<h1 class="page-title" itemprop="headline"><?php echo date('Y'); ?> <?php the_title(); ?></h1>
							<h2>Certified Hop Analysis</h2>
							<h3>USDA Hop Lab</h3>
						</header>

						<section class="entry-content clearfix" itemprop="articleBody">
							<table class="table-01">

								<thead>
									<tr>
										<th scope="col">Variety</th>
										<th scope="col">Acid Range (Alpha %)</th>
									</tr>
								</thead>
								<?php


// WP_Query arguments
								$args = array(
								              'post_type' => 'wpsc-product',
								              'tax_query' => array(
								                                   array(
								                                         'taxonomy' => 'wpsc_product_category',
								                                         'field' => 'slug',
								                                         'terms' => 'hop'
								                                         )
								                                   )
								              );

// The Query
								$query = new WP_Query( $args );

// The Loop
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										?>
										<tr>
											<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</td>
											<td><?php if(get_field('alpha')) { 
												echo get_field('alpha');} ?>&#37;</td>
										</tr>
										<?php
									}
								} else {
	// no posts found
								}

// Restore original Post Data
								wp_reset_postdata();
								?>
							</table>
						</div>
<?php the_content(); ?>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
</p>
</p>
</p>
</p>
</div>
</div>
</section>
</div>
</section>
</div>
</div>
</article>
</div>
</div>
</div>
								<?php get_footer(); ?>


