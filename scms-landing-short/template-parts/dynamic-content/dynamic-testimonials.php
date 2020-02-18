<?php $style = get_sub_field('style');
if(get_sub_field('image')){ $image = get_sub_field('image');}?>
<div class="textBlock testimonialBlock <?php echo $style;?> <?php if($image){echo 'hasimg';}?>">
	<div class="container">
	<?php if(get_sub_field('top_text')):?>
	<div class="row">
		<div class="col-sm-12 col-xl-10 offset-xl-1">
			<?php the_sub_field('top_text');?>
		</div>
	</div>
<?php endif;?>
		<div class="row">
			<div class="col-sm-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
				<div class="testimonialWrap">
					<?php if(have_rows('testimonial')):?>
						<div class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="10000" data-cycle-slides=">.slide">
						<?php while(have_rows('testimonial')): the_row();?>
							<div class="slide">
								<blockquote>
								<?php the_sub_field('text');?>
								</blockquote>
							</div>
						<?php endwhile;?>
						<div class="cycle-pager"></div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>	
</div>