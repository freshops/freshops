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
											<td><?php the_title(); ?></td>
											<td><?php if(get_field('alpha')){ echo get_field('alpha');} ?>&#37;</td>
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

						<div id="ordering_instructions">
							<section class="entry-content clearfix" itemprop="articleBody">
								<div class="clear">
									<div class="sixcol first">
										<div class="sixcol last">
										<h2>Ordering Instructions</h2>


														<h2>Ordering Options</h2>

														<ol>
															<li>Online
															<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo-center/Security_Banner_234x60_4a.gif" border="0" alt="PayPal Logo"></a></td></tr></table><!-- PayPal Logo -->
															<img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_60x38.gif" alt="Paypal acceptance mark" /></a><img src="/images/visa_mc.gif" alt="Visa and Mastercard accepted" width="127" height="37" /></li>

															<li>Call 1-800 460-6925</li>

															<li>Send check or money order to:<br>
																Freshops<br>
																36180 Kings Valley Hwy.<br>
																Philomath, OR 97370</li>

																<li>Fax your order to (541) 929-2702</li>
																</ol>
															</div>
														</div>


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


