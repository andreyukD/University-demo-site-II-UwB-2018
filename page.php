<?php get_header(); ?>

<div class="row">
	<div class="col">
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
	
	<h1><?php the_title(); ?></h1>
	
	<div class="TheContentExcerpt"><?php the_content(); ?></div>
  
    <?php endwhile; else: ?>  
  
    <?php endif; ?> 

	</div>
</div>

<?php get_footer(); ?>