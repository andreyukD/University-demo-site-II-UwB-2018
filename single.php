<?php get_header(); ?>

<?php if(get_the_ID()!=245) : //not studenci-glowna ?>
<div class="row">
	<div class="col">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
		<h1><?php the_title();?></h1>
		
		<?php if(is_singular('') && is_object_in_term( $post->ID, array('sci_cat','emp_cat','student_cat','news_cat') )) : ?>
		<div class="dateContent"><?php the_time('d.m.Y'); ?></div>
		<?php endif; ?>
		
		<div class="TheContentExcerpt"><?php the_content(); ?></div>
		
		<?php endwhile; else: ?>  
		
		<?php endif; ?> 
	</div>
</div>
<?php else: ?><!--single-->

<div class="row">
	<div class="col">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
		<h1><?php the_title();?></h1>
		
		<div class="TheContentExcerpt"><?php the_content(); ?></div>
		
	</div>
</div>

<div class="row">
	<!--query news_cat_ogloszenia-->
	<?php
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
			} else {
			$paged = 1;
		}
		
		$custom_query_args = array(
		'tax_query' => array(
        array (
		'taxonomy' => 'news_cat',
		'field' => 'slug',
		'terms' => 'aktualnosci-studentow',
        )
		),
		'post_type' => 'nowosci',
		'posts_per_page' => 9,
		'paged' => $paged,
		); 
		
		$custom_query = new WP_Query( $custom_query_args );
		
		while( $custom_query->have_posts() ) : $custom_query->the_post();
	?>
	
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
	<?php endwhile; ?>
</div><!--row-->

<?php if ($custom_query->max_num_pages > 1) : // custom pagination  ?>
<?php
	$orig_query = $wp_query; // fix for pagination to work
	$wp_query = $custom_query;
?>

<div class="row">
	<div class="col">
		<div class="navigation">
			<?php $big = 999999999; // need an unlikely integer
				echo paginate_links(array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'before_page_number' => '<span class="screen-reader-text">'.__(' ','textdomain').' </span>',
				'prev_next' => false
			)); ?>	
		</div>	
		
	</div>
</div><!--row-->
<?php $wp_query = $orig_query; // fix for pagination to work ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>		
<!---->
<?php endwhile; else: ?>  
<?php endif; ?> 
<!---->
<?php endif; ?>

<?php get_footer(); ?>	