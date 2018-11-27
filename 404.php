<?php get_header(); ?>

<div class="row">
	<div class="col">
		
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		<p><?php echo pll__('Błąd 404'); ?></p>
		
	</div><!--col-->
</div><!--row-->

<?php get_footer(); ?>