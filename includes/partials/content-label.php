<?php # The content loop for the Hop Variety Descriptions page. ?>

<div id="preview-box" class="fl">
	<div class="printable-area">
		<div id="variety-output">
		</div>
		<span id="year">
		</span>

		<div id="description">
			Fill in the fields above for a preview.
		</div>
		<p id="alpha" class="fl">
		</p>
		<p id="weight-output">
		</p>
	</div>
</div>
<div id="input-box">
	<label for="variety">
		Variety
	</label>
	<input id="variety" type="text" autofocus="">
	<input type="hidden" id="variety-id">
	<label for="weight">
		Weight
	</label>
	<input id="weight" type="text">
</div>
<?php


	# WP_Query arguments:
	$args = array(
		'post_type' => 'wpsc-product',
		'tax_query' => array(
		array(
		'taxonomy' => 'wpsc_product_category',
		'field' => 'slug',
		'terms' => 'hop'
		)
		),
		'order'                  => 'ASC',
		'orderby'                => 'title',
		'posts_per_page'         => '50',
	);

	# The Query:
	$query = new WP_Query($args);
	$label_set="";
?>

	<?php if ($query->have_posts()):
		$label_set="";
				while ($query->have_posts()): $query->the_post();
					$hop_title= get_the_title();
					$post_slug=$post->post_name;
					if (get_field('alpha') ) {
						$alpha= (get_field('alpha') );
					}
					elseif (get_field("alpha-min")) {
						$alpha= (get_field('alpha-min'));
						if (get_field('alpha-max')) {
							$alpha= $alpha .'-' . get_field('alpha-max');
						}
					}
					else {
						$alpha= "";
					};

					$alpha=$alpha. "%";
					$flavor= ( strip_tags ( addslashes (get_the_content() ) ) );
					if (get_field('year')) $year= ( strip_tags (get_field('year') ) ); else $year=''; //used for the hop description
					//create the JSON-formatted array of hop information for use in Variety autofill
					$label_row = "{ label: \"". $hop_title . "\", value: \"" . $post_slug . "\", alpha: \"" . $alpha . "\", year: \"" . $year ."\",  description: \"" . $flavor .  "\"},\n";
					$label_set= $label_set . $label_row; //append the row to the set
				endwhile;
			endif; 
		?>
<script>
	jQuery(function() {
		var hopdata = [ <?php echo (rtrim($label_set, ',')); //trim the comma off of the end of the array
	 ?>
	 ];
		jQuery(':text').click(function() { jQuery(this).focus().select(); }
		);

		jQuery("#variety")
			.autocomplete({
				autoFocus: false,
				minLength: 0,
				delay: 0,
				source: hopdata,
				focus: function(event, ui) {
					jQuery("#variety").val(ui.item.label);
					jQuery("#variety-id").val(ui.item.value);
					jQuery("#alpha").html(ui.item.alpha);
					jQuery("#description").html("<strong>" + ui.item.year + "</strong>&nbsp;" + ui.item.description);
					return false;
				},
				select: function(event, ui) {
				jQuery("#variety").val(ui.item.label);
				jQuery("#variety-id").val(ui.item.value);
				jQuery("#alpha").html(ui.item.alpha);
				jQuery("#description").html("<strong>" + ui.item.year + "</strong>&nbsp;" + ui.item.description);
				return false;
				}
			})
			.data("ui-autocomplete")._renderItem = function(ul, item) {
				return jQuery("<li><\/li>")
				.data('ui-autocomplete-item', item)
				.append("<a>" + item.label + "<br>" + item.alpha + "<\/a>")
				.appendTo(ul)
			}

		});
 </script>

<?php wp_reset_postdata(); ?>


<?php //Display page content from labeler page ?>
<div id="instructions">
	<?php the_content(); ?>
</div>
