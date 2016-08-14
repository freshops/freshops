<?php # The content loop for the index page. ?>

<h3 class="entry-title">
	<a
		href="<?php the_permalink(); ?>"
		rel="bookmark"
		title="<?php the_title_attribute(); ?>"
	>
			<?php the_title(); ?>
	</a>
</h3>

<p class="byline entry-meta vcard">


	<?php
		printf(
			__('Posted %1$s by %2$s', 'freshops_rhizome'),
			'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
			'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link(get_the_author_meta('ID')) . '</span>'
		);
	?>


</p>

<section class="entry-content cf">

	<?php the_post_thumbnail( 'portrait-300' ); ?>


	<?php the_excerpt(); ?>

	<footer class="article-footer">

		<p class="tags"><?php
echo get_the_tag_list('<p>Tags: ',', ','</p>');
?>
		<?php the_tags('<span class="tags-title">' . __('Tags:', 'freshops_rhizome') . '</span> ', ', ', ''); ?></p>

	</footer>

</section>

<?php if (function_exists('freshops_page_navi')): ?>


	<?php freshops_page_navi(); ?>


<?php else: ?>


	<nav class="wp-prev-next">



		<ul class="clearfix">
			<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', 'freshops_rhizome')); ?></li>
			<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', 'freshops_rhizome')); ?></li>
		</ul>



	</nav>


<?php endif; ?>
