<?php global $curLang; ?>

<!--from header.php -->
</div><!--col-9-wrapper-->
<?php get_sidebar(); ?>
</div><!--row-->
</div><!--container-->
</section><!--relative-->

<footer>
	<div class="container">
		<div class="row align-items-center justify-content-center justify-content-md-between">
			<div class="colFooter1 col-md-1 col-lg-1 col-xl-auto">
				<a href="http://uwb.edu.pl" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logo-uwb-kolko.png" alt="logo"></a>
			</div>
			
			<div class="colFooter2 col-md-3 col-lg-3 col-xl-3 colFooterUWB">
				<?php the_field('dane_kontaktowe',$curLang); ?>
			</div><!-- col-md-3 -->			
			
			<div class="colFooter3 col-md-3 col-lg-3 col-xl-auto">
				<?php the_field('dane_kontaktowe_2',$curLang); ?>
			</div><!-- col-md-3 -->
			
			<div class="colFooter4 col-md-2 col-lg-2 col-xl-auto">
				<ul>
					<?php if( have_rows('menu_stopka_1',$curLang) ): while ( have_rows('menu_stopka_1',$curLang) ) : the_row(); ?>
					
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
					<li><a href="<?php echo $link; ?>"><?php the_sub_field('nazwa'); ?></a></li>
					
					<?php endwhile; else : endif; ?><!--acf repeater-->		
				</ul>	
			</div><!--col-md-2-->
			
			
			<div class="colFooter5 col-md-3 col-lg-3 col-xl-auto">
				<div class="rekrutacja">
					<a data-toggle="tooltip" data-placement="top" title="<?php echo pll__('Dowiedz się więcej'); ?>" href="<?php the_field('link_rekrutacja_stopka',$curLang); ?>" class="fill_div" target="_blank"></a>
					<?php echo pll__('Rekrutacja <br> 2018'); ?>
				</div>
				<div class="text-center"><?php the_field('copyright_stopka',$curLang); ?></div>
			</div><!-- col-md-3 -->		
			
		</div><!--row-->
	</div><!--container-->
</footer>


<!---->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/slick.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/scrollreveal.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/skrollr.min.js"></script>
<!---->
<script src="<?php bloginfo('template_directory'); ?>/js/myskrollr.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/myreveal.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>

<!---->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery_cookie.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/mywcag.js"></script>

<div class="mywcagwrap">
	<a href="#" onclick="negativar()" ><?php echo pll__('Kontrast'); ?></a>
	<a href="#" onclick="increaseSize()"><?php echo pll__('A+'); ?></a>
	<a href="#" onclick="reduceSize()" ><?php echo pll__('A-'); ?></a>
</div>
<!---->
<link rel="stylesheet" id="font-awesome-css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" type="text/css" media="all">
<?php wp_footer(); ?>  

</body>  
</html>  		