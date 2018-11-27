<?php if(get_field('wlaczyc_animacje_0-1','option')) : ?>
<?php if(!wp_is_mobile()) : ?>
<div class="numbersLeft">
	<?php $randShow = "data-center='opacity:0;' data--500-bottom='opacity:0.5;'";?>
	<?php $randShow1 = "data-center='opacity:0;' data--500-bottom='opacity:0.3;'";?>
	<?php $randShow2 = "data-center='opacity:0;' data--500-bottom='opacity:0.7;'";?>
	<?php for($i=0;$i<100;$i++) { ?>
		<div>
			<?php for($j=0;$j<8;$j++) { ?>
				<span <?php $a = rand(0,3); $b = rand(0,3); $c=rand(0,3); if(!$a): echo $randShow; endif; if(!$b): echo $randShow1; endif; if(!$c): echo $randShow2; endif;?> ><?php echo rand(0,1); ?></span>
			<?php } ?>
		</div>
	<?php } ?>
</div><!--numbersLeft-->

<div class="numbersRight">
	<?php $randShow = "data-center='opacity:0;' data--500-bottom='opacity:0.5;'";?>
	<?php $randShow1 = "data-center='opacity:0;' data--500-bottom='opacity:0.3;'";?>
	<?php $randShow2 = "data-center='opacity:0;' data--500-bottom='opacity:0.7;'";?>
	<?php for($i=0;$i<100;$i++) { ?>
		<div>
			<?php for($j=0;$j<8;$j++) { ?>
				<span <?php $a = rand(0,3); $b = rand(0,3); $c=rand(0,3); if(!$a): echo $randShow; endif; if(!$b): echo $randShow1; endif; if(!$c): echo $randShow2; endif;?> ><?php echo rand(0,1); ?></span>
			<?php } ?>
		</div>
	<?php } ?>
</div><!--numbersRight-->
<?php endif; //!wp_is_mobile ?>
<?php endif; ?>