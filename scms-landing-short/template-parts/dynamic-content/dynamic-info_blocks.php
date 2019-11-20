<div class="infoBlocks">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-10 col-lg-offset-1">
				<div class="row">
				<?php $num = count(get_sub_field('block'));
				if($num == 4){
					$cols = 'col-sm-3 col-xs-6';
				} elseif($num == 3){
					$cols = 'col-xs-4';
				} elseif($num == 2){
					$cols = 'col-xs-6';
				} else {
					$cols = 'col-xs-12';
				}?>
					<?php if(have_rows('block')):?>
						<?php while(have_rows('block')): the_row();
						$image = get_sub_field('image');?>
							<div class="<?php echo $cols;?> infoBlock">
								<?php echo '<div class="image"><img src="' . $image['sizes']['medium-thumbnail'] . '"/></div>'; ?>						
							</div>
						<?php endwhile;?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>