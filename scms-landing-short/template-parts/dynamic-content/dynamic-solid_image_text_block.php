<?php $style = '';
$style .= get_sub_field('style');
if(get_sub_field('image')){ $image = get_sub_field('image');}
if(get_sub_field('text_block_position') == 'Left'){
	$textcolbt = 'col-md-7 col-xl-5';	
	$textrow = 'justify-content-start';
	$style .= ' leftTxt';
}
if(get_sub_field('text_block_position') == 'Right'){
	$textcolbt = 'col-md-7 col-xl-5';	
	$textrow = 'justify-content-end';
	$style .= ' rightTxt';
}
?>
<div class="ImgtextBlock solidImgBlock <?php echo $style;?>">
	<div class="twocol-bg"><?php echo wp_get_attachment_image($image['id'],'banner');?></div>
	<div class="container">
		<div class="row <?php echo $textrow;?>">
			<div class="<?php echo $textcolbt;?>">
			<div class="textBlock <?php echo $style;?> hasimg">
				<?php the_sub_field('text');?>				
			</div>
			</div>
		</div>
	</div>	
</div>