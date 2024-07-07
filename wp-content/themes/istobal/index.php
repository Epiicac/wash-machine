<?php get_header(); ?>
	<div class="breadcrumbs first">
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
		?>
	</div>
<?php
	the_content();
	get_footer();
?>

