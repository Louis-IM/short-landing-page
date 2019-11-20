<?php $style = get_sub_field('style');
if(get_sub_field('image')){ $image = get_sub_field('image');}
$introImg = get_sub_field('blocks_intro_image');
$blockno = count(get_sub_field('info_blocks'));?>
<div class="textBlock default">
<?php if($image):?>
<div class="imageBackground" style="background-image(<?php echo $image['url'];?>)"></div>
<?php endif;?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xl-8 offset-xl-2">
				<?php the_sub_field('top_text');?>
			</div>
		<div class="row">
			<div class="col-sm-12 col-xl-8 offset-xl-2">
				<?php if(have_rows('info_blocks')):
						if($blockno >= 5){
							$cols = 'col-xs-4 col-sm-2';
						} elseif($blockno == 4){
							$cols = 'col-xs-3';
						}
						elseif($blockno == 3){
							$cols = 'col-xs-4';
						}
						elseif($blockno == 2){
							$cols = 'col-xs-6';
						} else{
							$cols = 'col-xs-12';
						}?>
					<div class="row innerInfoBlocks">
						<?php if($introImg):?>
						<div class="col-sm-4">
							<?php 
							echo wp_get_attachment_image($introImg['id'],'full');?>
						</div>						
						<div class="col-sm-8">
						<?php else:?>
						<div class="col-sm-12">
						<?php endif;?>
						<div class="row">
						<?php while(have_rows('info_blocks')): the_row();
						
						$image = get_sub_field('icon');?>
							<div class="<?php echo $cols;?>">
								<div class="innerInfo">
								<?php if($image){
									echo '<div class="image">'.wp_get_attachment_image($image['id']).'</div>';
								}?>
								<?php if(get_sub_field('image')){ $image = get_sub_field('image'); }?>
								<strong><?php the_sub_field('number');?></strong>
								<span><?php the_sub_field('text');?></span>
								</div>
							</div>
						<?php endwhile;?>
						</div></div>
					</div>
				<?php endif;?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xl-8 offset-xl-2">
			<?php the_sub_field('bottom_text');?>
			</div>
		</div>
		</div>
	</div>	
</div>