<?php # Single post template. ?>

<p class="byline vcard">


	<?=printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'freshopstheme'), get_the_time('Y-m-j'), get_the_time( get_option('date_format')), freshops_get_the_author_posts_link(), get_the_category_list(', '))?>


</p>

<?=the_content()?>

<footer class="article-footer">


	<?=the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'freshopstheme') . '</span> ', ', ', '</p>')?>


</footer>

<?=comments_template()?>
