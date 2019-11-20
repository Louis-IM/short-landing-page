<?php $style = get_sub_field('style');
if(get_sub_field('image')){ $image = get_sub_field('image');}
if(get_sub_field('text_block_position') == 'Left'){
	$textcolbt = 'col-sm-7 col-lg-5';	
}
if(get_sub_field('text_block_position') == 'Center'){
	$textcolbt = 'col-sm-6 col-sm-offset-3';	
}
if(get_sub_field('text_block_position') == 'Right'){
	$textcolbt = 'col-sm-7 col-lg-5 col-sm-offset-5 col-lg-offset-7';	
}
?>
<div class="ImgtextBlock">
<div class="imageBackground" style="background-image:url(<?php echo $image['sizes']['banner'];?>)"></div>
	<div class="container">
		<div class="row">
			<div class="<?php echo $textcolbt;?>">
			<div class="textBlock <?php echo $style;?> hasimg">
				<?php the_sub_field('text');?>
				<?php if(get_sub_field('read_more_link')):
				$link = get_sub_field('read_more_link');?>
					<div class="textLink">
						<a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">
							<?php echo $link['title'];?>
						</a>
					</div>
				<?php endif;?>
			</div>
			</div>
		</div>
	</div>	
</div>