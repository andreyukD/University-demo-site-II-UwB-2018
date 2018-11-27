<?php /* Template Name: page-galeria */ ?>

<?php get_header(); ?>

<div class="row">
	<div class="col">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
		<h1><?php the_title(); ?></h1>
		
		<div class="TheContentExcerpt"><?php the_content(); ?></div>
		<div class="row">
			<?php for($i=1;$i<46;$i++) { ?>
				<div class="col-xl-4 col-sm-6 colGal">
					<div class="sub relative" style="background-image:url(/wp-content/themes/theme/images/gallery/thumbs/image<?php echo $i;?>_r.jpg);">
						<div class="fa fa-plus"></div>
						<div class="overlay"></div>				
						<a rel="lightbox[r]" href="/wp-content/themes/theme/images/gallery/image<?php echo $i;?>.jpg" class="fill_div"></a>
					</div>
				</div>
			<?php } ?>
		</div><!--row-->
		
		<?php endwhile; else: ?>  
		
		<?php endif; ?> 
		
	</div>
</div>

<?php get_footer(); ?>