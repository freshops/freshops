<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="twelvecol first clearfix" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

					<header class="article-header">

						<h1 class="single-title custom-post-type-title"><?php if(get_field('year')) {echo get_field('year');} ?> <?php the_title(); ?></h1>
					</header>

					<section class="entry-content clearfix">
						<?php the_post_thumbnail( 'portrait-300' ); ?> </div>
							<?php if(get_field('alpha')){ ?>
							<dl><dt>Acid Range (Alpha &#37;):</dt>
								<dd> <?php echo get_field('alpha'); ?></dd>
							</dl>
							<?php
							}

							if(get_field('flavor')){ ?>
								<dl><dt><?php the_title(); ?> Flavor Perception:</dt>
									<dd> <?php echo get_field('flavor');?></dd>
								</dl>
								<?php
							}

							if(get_field('example')){ ?>
								<dl><dt>Commercial Examples: </dt>
									<dd> <?php echo get_field('example');?></dd>
								</dl>
								<?php
							}
							if(get_field('beta')){ ?>
								<dl><dt>Beta Range (&#37; of alpha acids)</dt>
									<dd> <?php echo get_field('beta');?></dd>
								</dl>
								<?php
							}

							if(get_field('cohumulone')){ ?>
								<dl><dt>Cohumulone (&#37; of alpha acids)</dt>
									<dd> <?php echo get_field('cohumulone');?></dd>
								</dl>
								<?php
							}
							if(get_field('total_oils')){ ?>
								<dl><dt>Total Oils (Mls. per 100 grams dried hops)</dt>
									<dd><?php echo get_field('cohumulone');?></dd></dl>
								<?php
							}
							if(get_field('myrcene')){ ?>
								<dl><dt>Caryophyllene (as &#37; of total oils)</dt>
									<dd> <?php echo get_field('caryophyllene');?></dd>
								</dl>
								<?php
							}
							if(get_field('caryophyllene')){ ?>
								<dl><dt>Caryophyllene (as &#37; of total oils)</dt>
									<dd> <?php echo get_field('caryophyllene');?></dd>
								</dl>
								<?php
							}
							if(get_field('humulene')){ ?>
								<dl><dt>Humulene (as &#37; of total oils)</dt>
									<dd> <?php echo get_field('humulene');?></dd>
								</dl>
								<?php
							}
							if(get_field('farnesene')){ ?>
								<dl><dt>Humulene (as &#37; of total oils)</dt>
									<dd> <?php echo get_field('farnesene');?></dd>
								</dl>
								<?php
							}
							if(get_field('storage')){ ?>
								<dl><dt>(as &#37; of alpha acids remaining after 6 months storage at 20&deg; C))</dt>
									<dd> <?php echo get_field('storage');?></dd>
								</dl>
								<?php
							}
							if(get_field('possible_substitutions')){ ?>
								<dl><dt>Possible Substitutions</dt>
									<dd> <?php echo get_field('possible_substitutions');?></dd>
								</dl>
								<?php
							}
							if(get_field('usda_hops_info')){ ?>
								<dl><dt>USDA Hops Information</dt>
									<dd> <?php echo get_field('possible_substitutions');?></dd>
								</dl>
								<?php
							}?>

						</div>

	</section>

	<footer class="article-footer">
		<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Tagged with:', 'freshopstheme' ) . '</span> ', ', ' ) ?></p>

	</footer>

</article>

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
			<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'freshopstheme' ); ?></p>
		</footer>
	</article>

<?php endif; ?>

</div>

</div>

</div>

<?php get_footer(); ?>
