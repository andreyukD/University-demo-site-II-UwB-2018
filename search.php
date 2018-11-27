<?php get_header(); ?>

<div class="row">
	<div class="col">
	
		<h1 class="naglInner"><?php echo pll__('Wyniki wyszukiwania'); ?> <b>"<?php echo get_search_query(); ?>"</b></h1>
		
		<div class="row rowNewsHome mb20">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
		<div class="col-sm-6 col-xl-4 colNewsHome">
			<div class="newsBlokHome">
				<div class="timeNews"><b><?php the_time('d/m'); ?></b><?php the_time('/Y'); ?></div>
				<h2 class="titleNews"><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></h2>
				<?php if(has_post_thumbnail()) : ?>
				<div class="imgNewsArchMin relative" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);">
					<div class="fa fa-plus"></div>
					<div class="overlay"></div>
					<a class="fill_div" href="<?php the_permalink() ?>"></a>			
				</div>
				<?php endif; ?>
				<div class="opisNews"><?php echo excerpt(20); ?></div>
			</div>
		</div>
		
		<?php endwhile; else: ?>  
		<div class=""><?php echo pll__('Nie znaleziono'); ?></div>
		<?php endif; ?>  
		</div><!--row-->
		
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</div><!--col-->
</div><!--row-->


<?php get_footer(); ?>	