<div class="imageBlock">
	<?php if(get_sub_field('type') == 'gallery'):
	$uid = rand(1,999);
		$gallery = get_sub_field('images');?>
		<div class="container">
			<div class="row"><div class="col col-xl-10 offset-xl-1">
			<?php if($gallery):?>
			<div class="blockGallery">
				<div class="row">
					<?php foreach($gallery as $image):?>
					<div class="col col-sm-6 col-md-3 blockGalleryItem">
						<a href="<?php echo $image['sizes']['large'];?>" data-fancybox="fbgallery-<?php echo $uid;?>">
							<?php echo wp_get_attachment_image($image['id'],'medium-thumbnail');?>
						</a>
					</div>
					<?php endforeach;?>
				</div>						
			</div>			
			<?php endif;?>
			</div></div>
		</div>	
	<?php elseif(get_sub_field('type') == 'carousel'):
		$gallery = get_sub_field('images');?>
		<div class="container">
			<div class="row"><div class="col col-xl-10 offset-xl-1">
			<?php if($gallery):?>
			<div class="blockCarousel imgBlockCar owl-carousel">
				<?php foreach($gallery as $image):?>
				<div class="blockGalleryItem">
					<a href="<?php echo $image['sizes']['large'];?>" data-fancybox="fbgallery-<?php echo $uid;?>">
						<?php echo wp_get_attachment_image($image['id'],'medium-thumbnail');?>
					</a>
				</div>
				<?php endforeach;?>
			</div>			
			<?php endif;?>
			</div></div>
		</div>	
	
	<?php elseif(get_sub_field('type') == 'single'):
		$image = get_sub_field('image');?>
		<div class="imageWrap" style="background-image:url(<?php echo $image['sizes']['banner'];?>)"><?php echo wp_get_attachment_image($image['id'],'large');?></div>
	<?php else:?>
	<?php endif;?>

</div>