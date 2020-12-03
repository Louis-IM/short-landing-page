<div class="textBlock">
<div class="container">
<?php if(get_sub_field('top_text')):?>
	<div class="row">
		<div class="col-sm-12 col-xl-10 offset-xl-1">
			<?php the_sub_field('top_text');?>
		</div>
	</div>
<?php endif;?>
<?php $blocksNo = count(get_sub_field('info_blocks'));
if($blocksNo == 4){
	$rowcount = 2;
} else {
	$rowcount = 3;
}
if(have_rows('info_blocks')):?>
	<div class="row">
		<div class="col-sm-12 col-xl-10 offset-xl-1">
			<div class="linkBlocks">
				<div class="row">
				<?php $i = 0;
				while(have_rows('info_blocks')): the_row();
				$i++;
					$image = get_sub_field('Image');
					$link = get_sub_field('link');?>
					<div class="linkBlock col-md">
					<a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">
						<div class="linkBlockimg" style="background-image:url(<?php echo wp_get_attachment_image_url($image['id'],'post-thumbnail');?>)">
							<?php echo wp_get_attachment_image($image['id'],'post-thumbnail');?>
						</div>
						<div class="lnkTitle">
							<?php echo $link['title'];?>
						</div>
					</a>
					</div>	
				<?php if($i % $rowcount == 0){echo '<div class="w-100"></div>';}?>
				<?php endwhile;?>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
</div>
</div>