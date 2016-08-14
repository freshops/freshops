<?php # Comments template. ?>

<?php if (post_password_required()): ?>


	<?php # Password is required to comment. ?>


<?php else: ?>


	<?php if (have_comments()): ?>



		<h3 id="comments-title" class="h2">




			<?php comments_number(__('<span>No</span> Comments', 'freshops_rhizome'), __('<span>One</span> Comment', 'freshops_rhizome'), __('<span>%</span> Comments', 'freshops_rhizome'));?>




		</h3>



		<section class="commentlist">
			<?php
				wp_list_comments(array(
					'style'             => 'div',
					'short_ping'        => true,
					'avatar_size'       => 40,
					'callback'          => 'freshops_comments',
					'type'              => 'all',
					'reply_text'        => 'Reply',
					'page'              => '',
					'per_page'          => '',
					'reverse_top_level' => null,
					'reverse_children'  => ''
				));
			?>
		</section>



		<?php if ((get_comment_pages_count() > 1) && get_option('page_comments')): ?>




			<nav class="navigation comment-navigation" role="navigation">





				<div class="comment-nav-prev"><?php previous_comments_link(__('&larr; Previous Comments', 'freshops_rhizome')); ?></div>
				<div class="comment-nav-next"><?php next_comments_link(__('More Comments &rarr;', 'freshops_rhizome')); ?></div>





			</nav>




		<?php endif; ?>



		<?php if ( ! comments_open()): ?>




			<p class="no-comments">





				<?php _e('Comments are closed.', 'freshops_rhizome'); ?>





			</p>




		<?php endif; ?>



	<?php endif; ?>


	<?php comment_form(); ?>


<?php endif; ?>
