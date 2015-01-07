
<article id="post-<?=the_ID()?>" role="article" itemscope itemtype="http://schema.org/Product">

	<section itemprop="articleBody">

		<div class="fix">

			<div id="mainbar" class="m-all t-all d-5of7">

				<div class="fix">
					<?php include (locate_template( 'includes/cart/single_product_builtin.php')); ?>
					<?php
						// HOP AND RHIZOME CONDITIONALS
						// If we're on a hop or rhizome product page, then include the single hop variety partial
					if 
						( ( has_term('hop', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) || (has_term('rhizomes', 'wpsc_product_category' ) && is_singular( 'wpsc-product' )) )  : ?>
					
					<?php include(locate_template('includes/cart/single_hop_or_rhizome_variety.php')); ?>
					
				<?php endif; ?>
				<?php $wpsc_product_tags = get_the_product_tags( wpsc_the_product_id() );
				if ($wpsc_product_tags) : ?>
					<p class="tagged-with">Product Tags:
				
					<?php	foreach ($wpsc_product_tags as $wpsc_product_tag) :
						$tagname = $wpsc_product_tag->name;
						$tagid = $wpsc_product_tag->term_id;
						$taglink = get_term_link( $wpsc_product_tag->slug, $wpsc_product_tag->taxonomy );
						echo '• <a href="'.$taglink.'">'.$tagname.'</a> ';
					endforeach;
				endif;
				?>
				</p>

			
			<?php echo wpsc_product_rater(); ?>

			<?php echo wpsc_also_bought(wpsc_the_product_id()); ?>

			<?php if (wpsc_show_fb_like()): ?>

				<div class="FB_like">

					<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo wpsc_the_product_permalink(); ?>&amp;layout=standard&amp;show_faces=true&amp;width=435&amp;action=like&amp;font=arial&amp;colorscheme=light" frameborder="0"></iframe>

				</div> <!-- /#FB_like -->

			<?php endif; ?>
			
		</div> <!-- /.fix -->

	</div> <!-- /#mainbar -->

	<div id="sidebar" class="sidebar m-all t-all d-2of7 last-col" role="complementary">


		<div id="cart">
			<?php if ( ! function_exists('dynamic_sidebar') || ( ! dynamic_sidebar('Shop Navigation'))): ?>
				<?=dynamic_sidebar('shop_nav')?>
			<?php endif; ?>
		</div>
	</div> <!-- /#sidebar -->

</div> <!-- /.fix -->

<form onsubmit="submitform(this); return false;"
action="<?php echo esc_url(wpsc_this_page_url()); ?>"
method="post"
name="product_<?php echo wpsc_the_product_id(); ?>"
id="product_extra_<?php echo wpsc_the_product_id(); ?>"
>

<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="prodid">
<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="item">

</form>
</section>
<section>
	<?php echo wpsc_product_comments(); ?>
</section>
</article>
