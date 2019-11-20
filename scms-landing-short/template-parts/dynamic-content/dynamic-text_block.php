<?php $style = get_sub_field('style');
if(get_sub_field('image')){ $image = get_sub_field('image');}?>
<div class="textBlock <?php echo $style;?> <?php if($image){echo 'hasimg';}?>">
<?php if($image):?>
<div class="imageBackground" style="background-image:url(<?php echo $image['url'];?>)"></div>
<?php endif;?>
	<div class="container">
		<div class="row">
			<div class="<?php echo (get_sub_field('wide')) ? "col-sm-12" : "col-sm-12 col-lg-10 col-lg-offset-1" ;  ?>">
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