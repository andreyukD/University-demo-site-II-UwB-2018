<?php global $curLang; ?>

<section class="sliderSidebarHome mb15">
	<div class="sliderSidebarSlickGal">
		<?php if( have_rows('slider_sidebar',$curLang) ): while ( have_rows('slider_sidebar',$curLang) ) : the_row(); ?>
		<div>
			<img src="<?php the_sub_field('obrazek'); ?>" alt="slider">
		</div>
		<?php endwhile; else : endif; ?><!--acf repeater-->
	</div>
</section>

<section class="sliderSidebarTabs mb15">
	<div class="sliderSidebarSlickTabs">
		<?php if( have_rows('tabs',$curLang) ): while ( have_rows('tabs',$curLang) ) : the_row(); ?>
		<div class="wrapSlickTabsSidebar">
			<div class="nazwaTaby"><?php the_sub_field('nazwa'); ?></div>
			<div class="opisTaby"><?php the_sub_field('opis'); ?></div>
		</div>
		<?php endwhile; else : endif; ?><!--acf repeater-->
	</div>
	<div class="forAppendDotsTabsHome"></div>
</section>			

<section class="sliderSidebarHome">
	<div class="sliderSidebarSlickNews">
		<?php if( have_rows('bannery_sidebar',$curLang) ): while ( have_rows('bannery_sidebar',$curLang) ) : the_row(); ?>
		<div>
			<a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('obrazek'); ?>" alt="slider"></a>
		</div>
		<?php endwhile; else : endif; ?><!--acf repeater-->
	</div>
</section>