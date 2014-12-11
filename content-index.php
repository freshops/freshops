<?php # The content loop for the index page. ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

	<header class="article-header">

		<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<p class="byline entry-meta vcard">
			<?php printf( __( 'Posted %1$s by %2$s', 'freshopstheme' ),
			             /* the time the post was published */
			             '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
			             /* the author of the post */
			             '<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
			); ?>
		</p>

	</header>

	<section class="entry-content cf">
		<?php the_content(); ?>
	</section>

</article>
