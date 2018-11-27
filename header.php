<!doctype html>

<html <?php language_attributes(); ?>>
	
	<head>   
		<meta charset="utf-8" />
		
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
		<title><?php wp_title(''); ?></title> 	
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slick.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />  
		
		<?php wp_head(); ?>
	</head>
	
	<body>
		
		<?php global $curLang; $curLang = pll_current_language('slug'); ?>
		
		<header>
			<section class="secWrapMenuNTogglerBlack">
				<div class="titleToggler d-block d-md-none"><?php echo pll__('Menu'); ?></div>
				<button class="navbar-toggler ml-auto mTB" type="button" data-toggle="collapse" data-target="#menuTopBlack" aria-controls="menuTopBlack" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</button>
				<section class="collapse menuTopBlack d-md-block" id="menuTopBlack">
					<div class="container">
						<div class="row">
							<div class="col colMenuBlack1">
								<?php if( have_rows('menu_header_1',$curLang) ): while ( have_rows('menu_header_1',$curLang) ) : the_row(); ?>
								
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
								
								<a href="<?php echo $link; ?>"><?php the_sub_field('nazwa'); ?></a>
								
								<?php endwhile; else : endif; ?><!--acf repeater-->
							</div><!--col-->
							<div class="col-ml-auto colForAppendWcag">
								<?php //z footer jquery append wcag links here ?>
								<?php pll_the_languages(array('hide_current'=>1));?>
							</div><!--colForAppendWcag-->
						</div><!--row-->
					</div><!--container-->
				</section>
			</section>
			
			<div class="navbar-fixed-top1 oberMenu">
				<nav class="navbar navbar-expand-md fixed-top1 <?php if(!is_front_page()) : ?>innerNavbar<?php endif; ?>">
					<div class="container contHeaderMain">
						<div class="logo">
							<a href="<?php echo pll_home_url(); ?>">
								<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo">
							</a>
						</div>
						
						<div class="logoText">
							<span class="cDark"><?php echo pll__('INSTYTUT'); ?></span><br>
							<span class="cLight"><?php echo pll__('INFORMATYKI'); ?></span>
						</div>
						
						<div class="d-block d-md-none breakerMobile"></div>
						
						<div class="langSubFlex">
							
							<div class="iconsHeader">
								<?php if( have_rows('ikonki',$curLang) ): while ( have_rows('ikonki',$curLang) ) : the_row(); ?>
								
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
								<a data-toggle="tooltip" data-placement="top" title="<?php the_sub_field('opis'); ?>" href="<?php echo $link; ?>"><img src="<?php the_sub_field('obrazek'); ?>" alt=""></a>
								
								<?php endwhile; else : endif; ?><!--acf repeater-->
								<div class="clearfix"></div>
							</div>						
							
							
							<form action="<?php if($curLang=='en'): ?>/en<?php endif; ?>/" method="get">
								<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="<?php echo pll__('Wyszukaj'); ?>" />
								<input class="searchFormImg" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
								<input type="hidden" name="post_type[]" value="nowosci" />
								<input type="hidden" name="post_type[]" value="kola" />						
								<input type="hidden" name="post_type[]" value="student" />						
								<input type="hidden" name="post_type[]" value="pracownicy" />						
								<input type="hidden" name="post_type[]" value="kandydat" />								
								<input type="hidden" name="post_type[]" value="instytut" />						
							</form>
						</div>
						
						<div class="logoUWBHeader">
							<a href="http://uwb.edu.pl" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logo-uwb-kolko.png" alt="logoUWB"></a>
						</div>
						
					</div>
					<!--container-->
				</nav>
			</div>
			<!-- oberMenu -->
		</header>
		
		<section class="headerBgAndMenus">
			<nav class="navbar navbar-expand-md navbarMainMenu">
				<div class="container contBlueMenu">
					<div class="titleToggler d-block d-md-none"><?php echo pll__('Nawigacja'); ?></div>
					<button class="navbar-toggler mtBlue" type="button" data-toggle="collapse" data-target="#navbar-content-mainmenu" aria-controls="navbar-content-mainmenu" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</button>				
					
					<div class="collapse navbar-collapse mynavbarcollapsewydzialy" id="navbar-content-mainmenu">
						<?php 
							wp_nav_menu(array(  
							'theme_location'    => 'menu-main-header',
							'menu_class' => 'navbar-nav my_navbar_mainmenu',
							'container' => 'ul', 
							'walker' => new CSS_Menu_Maker_Walker()
							
							)); 
						?>
					</div><!--collapse-->
				</div><!--container-->
			</nav>
			
			<?php 
				$mainBgHeader = get_field('tlo_default','option');
				if((is_post_type_archive('nowosci') || is_singular('nowosci') || is_tax('news_cat')) && get_field('tlo_aktualnosci','option')) {$mainBgHeader = get_field('tlo_aktualnosci','option');}
				if(is_post_type('instytut') && get_field('tlo_instytut','option')) {$mainBgHeader = get_field('tlo_instytut','option');}
				if((is_singular('pracownicy') || is_tax('emp_cat')) && get_field('tlo_pracownicy','option')) {$mainBgHeader = get_field('tlo_pracownicy','option');}
				if(is_singular('kandydat') && get_field('tlo_kandydat','option')) {$mainBgHeader = get_field('tlo_kandydat','option');}
				if((is_singular('kola') || is_tax('sci_cat')) && get_field('tlo_kola','option')) {$mainBgHeader = get_field('tlo_kola','option');}
				if((is_singular('student') || is_tax('student_cat')) && get_field('tlo_student','option')) {$mainBgHeader = get_field('tlo_student','option');}
				if(get_field('main_bg_header') && get_field('main_bg_header')) {$mainBgHeader = get_field('main_bg_header');}
			?>
			<div class="mainBgHeader d-flex align-items-end" style="background-image:url(<?php echo $mainBgHeader; ?>);">
				<?php //<!--data-bottom-top='background-position: 50% 100%' data-top-bottom='background-position: 50% 30%'--> ?>
				
				<section class="secWrapMenuNTogglerWydzialy">
					<div class="titleToggler wydz d-block d-md-none"><?php echo pll__('Wydziały'); ?></div>
					<button class="navbar-toggler ml-auto mtWydz" type="button" data-toggle="collapse" data-target="#contWydzialy" aria-controls="contWydzialy" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</button>				
					<div class="container contWydzialy collapse d-md-block" id="contWydzialy">
						<div class="row no-gutters">
							<?php if( have_rows('menu_wydzialy',$curLang) ): while ( have_rows('menu_wydzialy',$curLang) ) : the_row(); ?>
							<div class="col-sm-6 col-lg-4 subContWydzialy">
								<div class="wrapa">
									<a href="<?php the_sub_field('wydzial_link'); ?>"><?php the_sub_field('wydzial_nazwa'); ?></a>
								</div>
							</div><!--col-->
							<?php endwhile; else : endif; ?><!--acf repeater-->	
						</div><!--row-->
					</div><!--container-->	
				</section>
			</div>
			
			<?php if(wp_is_mobile() && is_front_page()) : ?>
				<div class="d-block d-md-none mobileBgFront" style="background-image:url(<?php echo $mainBgHeader; ?>);"></div>
			<?php endif; ?>
		</section><!--headerBgMenus-->
		
		<section class="relative">
			<?php get_template_part('parts/part-numbers'); ?>	
			
			<!---->
			<div class="container mb40">
				<?php if(!is_front_page()) : ?>
				<div class="row">
					<div class="col colBreadCrumb"><div class="subColCrumb">
						<?php if(function_exists('bcn_display')){bcn_display();}?>
					</div></div><!--col-->
				</div><!--row-->
				<?php endif; ?>
				<div class="row">
				<div class="col-md-8 col-xl-9 col-content order-2">																																									