<?php # Single post template. ?>

<p class="byline vcard">
	<?php
		if (is_singular('post')):
			printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> &amp; filed under %3$s.', 'freshopstheme'), get_the_time('Y-m-j'), get_the_time( get_option('date_format')), 
			       	get_the_category_list(', '));
		elseif (is_singular('bne_testimonials')):
			?> <!-- Testimonial byline --> <?php
		endif;
	?>
</p>

<?php the_content(); ?>

<footer class="article-footer">
	<?php if (is_singular('bne_testimonials')): ?>
		<p class="alignright"><b>~<?php the_title(); ?></b></p>
	<?php endif;?>

	<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'freshopstheme') . '</span> ', ', ', '</p>'); ?>

</footer>

<?php comments_template(); ?>

