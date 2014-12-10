<?php
/*
Template Name: Rhizome Information page
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">

						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

					</header>

					<section class="entry-content clearfix" itemprop="articleBody">

						<table class="table-01">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Acid Range (Alpha %)</th>
									<th scope="col">Flavor Perception</th>
									<th scope="col">Commercial Example</th>
								</tr>
							</thead>
							<?php


// WP_Query arguments
$args = array (
	$args = array(
    'post_type' => 'wpsc-product',
    'tax_query' => array(
        array(
            'taxonomy' => 'wpsc_product_category',
            'field' => 'slug',
            'terms' => 'rhizomes'
        )
    )
);
);

// The Query
$query = new WP_Query( $args );



// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									?>
									<tr>
										<td><?php the_title();?></td>
										<td><?php if(get_field('flavor')){ echo get_field('flavor');} ?></td>
										<td><?php if(get_field('alpha')){ echo get_field('alpha');} ?>&#37;</td>
										<td><?php if(get_field('example')){ echo get_field('example');} ?></td>
									</tr>
									<?php
								}
							} else {
	// no posts found
							}

// Restore original Post Data
							wp_reset_postdata();?>
						</table>
					</section>
<section>
<?php the_content(); //the second tab comes from the content field>
					<footer class="article-footer">
					</footer>


				</article>

			</div>

		</div>

	</div>

	<?php get_footer(); ?>


