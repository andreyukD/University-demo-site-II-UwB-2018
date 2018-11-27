<?php /* Template Name: page-homepage */ ?>

<?php get_header(); global $curLang; ?>


<?php if(get_field('tekst_home')): ?>
<div class="text-center mb15 TheContentExcerpt"><?php the_field('tekst_home'); ?></div>
<?php endif; ?>

<div class="row rowTermsIndex mb25">
<?php if( have_rows('nowosci_linki_na_glownej') ): while ( have_rows('nowosci_linki_na_glownej') ) : the_row(); ?>
<?php 
	$arWithCatLinksHome1; $arWithCatLinksHome2; $arWithCatLinksHome3; $arWithCatLinksHome;
	if( get_row_layout() == 'aktualnosci' ) {
	$arWithCatLinksHome1 = get_sub_field('wybierz'); }
	if( get_row_layout() == 'studenci' ) {
	$arWithCatLinksHome2 = get_sub_field('wybierz'); }
	if( get_row_layout() == 'pracownicy' ) {
	$arWithCatLinksHome3 = get_sub_field('wybierz'); }
	if( get_row_layout() == 'kola' ) {
	$arWithCatLinksHome4 = get_sub_field('wybierz'); }
?>

<?php	
	endwhile; else : endif; 
	if($arWithCatLinksHome1 || $arWithCatLinksHome2 || $arWithCatLinksHome3 || $arWithCatLinksHome4) {
		$arrMerg = array_merge($arWithCatLinksHome1,$arWithCatLinksHome2,$arWithCatLinksHome3,$arWithCatLinksHome4);
	}
//acf flexible ?>

	<?php if($arrMerg) : ?>
	<?php $myar = array('news_cat','student_cat', 'sci_cat', 'emp_cat'); ?>
	<?php $terms = get_terms([
		'taxonomy' => $myar,
		'hide_empty' => false,
		'include' => $arrMerg,
		]); 
	?>
	<?php foreach ($terms as $term) { ?>
		<div class="col-sm-6 colTermHome">
			<h2>
				<a href="<?php echo get_term_link($term->term_id); ?>" class="fill_div"></a>
				<span><?php echo $term->name; ?></span>
				
				<?php if(get_field('icon',$term->taxonomy . '_' . $term->term_id)) : ?>
				<?php the_field('icon',$term->taxonomy . '_' . $term->term_id); ?>
				<?php else : ?>
				<i class="fa fa-book"></i>
				<?php endif; ?>
			</h2>
		</div>
	<?php } ?><!--foreach-->
	<?php endif; ?>
</div><!--row-->

<?php if($curLang=='pl') : ?>
<div class="row rowNewsHome">
	<?php $query = new WP_Query( array( 'post_type' => array('nowosci','kola','student','pracownicy'), 'showposts' => 9) ); ?>
	<?php while($query->have_posts()) : $query->the_post();?>
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
	<?php endwhile; wp_reset_query(); ?>
</div><!--row-->

<div class="row justify-content-end mb20">
	<div class="col-auto mb-1"><a href="<?php echo get_post_type_archive_link('nowosci'); ?>"><?php echo get_post_type_object('nowosci')->label; ?></a></div>
</div>
<?php endif; //curLang == pl ?>

<section class="naSkrotyHome mb30">
	<div class="galeriaSlickNaSkroty">
		<?php if( have_rows('na_skroty') ): while ( have_rows('na_skroty') ) : the_row(); ?>
		<div class="elementNaSkroty">
			<?php if( have_rows('link') ): while ( have_rows('link') ) : the_row(); ?>
			<?php $link; if( get_row_layout() == 'link_do_strony' ):
				$link = get_sub_field('link');
				elseif( get_row_layout() == 'link_do_kategorii' ):
				$link = get_term_link(get_sub_field('link'));
				elseif( get_row_layout() == 'link_inny' ):
				$link = get_sub_field('link');				
				endif;
				endwhile; else : endif;
			?><!-- acf flexible -->			
			<div class="iconFaSkroty text-center">
				<?php the_sub_field('icon'); ?>
			</div>
			<span class="naSkrotyLink"><?php the_sub_field('nazwa'); ?></span>
			<a href="<?php echo $link; ?>" class="fill_div"></a>
		</div>
		<?php endwhile; else : endif; ?><!--acf repeater-->
	</div><!--slick-->
</section>

<?php get_footer(); ?>	