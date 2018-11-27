<?php global $curLang; ?>

<div class="<?php if(is_front_page()) : ?>mobileOrderLast<?php endif; ?> col-md-4 col-xl-3 col-sidebar order-1 relative">
	
	<div class="<?php if(is_front_page()) : ?>mobiledNone<?php endif; ?> showSidebarBtn d-flex align-items-center d-md-none">
		<div class="myiconmob"></div>
		<div class="ml-2"><?php echo pll__('Panel boczny'); ?></div>
	</div>
	<div class="showSidebar <?php if(is_front_page()) : ?>showSidebarFrontPage<?php endif; ?>">
		
		<?php if($curLang=='pl') : ?>
		<?php if(is_front_page() || is_page_template('page-galeria.php') || is_404() || is_search()): ?>
		<?php get_template_part('parts/part-sidebar-home'); ?>
		<?php endif; ?>
		
		<?php if(is_post_type_archive('nowosci') || is_singular('nowosci') || is_tax('news_cat')): ?>
		<?php 
			wp_nav_menu(array(  
			'theme_location'    => 'sidebar-menu-news',
			'container_id' => 'cssmenu', 
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>
		
		<div class="mt30 mysidebar">
			<?php dynamic_sidebar( 'sidebar-aktualnosci' ); ?>
		</div>
		<?php endif; ?>
		
		<?php if(is_post_type('instytut')) : ?>
		<?php 
			wp_nav_menu(array(  
			'theme_location'    => 'sidebar-menu-instytut',
			'container_id' => 'cssmenu', 
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>		
		<?php endif; ?>
		
		<?php if(is_singular('pracownicy') || is_tax('emp_cat')): ?>
		<?php 
			wp_nav_menu(array(  
			'theme_location'    => 'sidebar-menu-pracownicy',
			'container_id' => 'cssmenu', 
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>
		<?php endif; ?>
		
		<?php if(is_singular('kandydat')): ?>
		<?php 
			wp_nav_menu(array(  
			'theme_location'    => 'sidebar-menu-kandydat',
			'container_id' => 'cssmenu', 
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>
		<?php endif; ?>
		
		<?php if(is_singular('kola') || is_tax('sci_cat')): ?>
		<?php 
			wp_nav_menu(array(  
			'theme_location'    => 'sidebar-menu-nauka',
			'container_id' => 'cssmenu', 
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>
		<?php endif; ?>
		
		<?php if(is_singular('student') || is_tax('student_cat')): ?>
		<?php 
			wp_nav_menu(array(  
			'theme_location'    => 'sidebar-menu-student',
			'container_id' => 'cssmenu', 
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>
		<?php endif; ?>	
		<?php //curlang==pl 
		else : //eng ?>
		<div class="mb30">
			<?php 
				wp_nav_menu(array(  
				'theme_location'    => 'sidebar-menu-onlyen',
				'container_id' => 'cssmenu', 
				'walker' => new CSS_Menu_Maker_Walker()
				)); 
			?>
		</div>
		<?php get_template_part('parts/part-sidebar-home'); ?>
		<?php endif; ?>
		
	</div><!--showSidebar-->
</div><!--col-sidebar-->