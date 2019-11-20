<div class="textBlock">
<div class="container">
<?php if(get_sub_field('top_text')):?>
	<div class="row">
		<div class="col-sm-12 col-lg-10 col-lg-offset-1">
			<?php the_sub_field('top_text');?>
		</div>
	</div>
<?php endif;?>
<?php if(have_rows('info_blocks')):?>
	<div class="row">
		<div class="col-sm-12 col-lg-10 col-lg-offset-1">
			<div class="owl-carousel infoCarousel">
				<?php while(have_rows('info_blocks')): the_row();
					$image = get_sub_field('Image');?>
					<div class="infoCarItem">
						<div class="infoCarImg">
							<?php echo wp_get_attachment_image($image['id'],'full');?>
						</div>
						<h3 class="carTitle"><?php the_sub_field('title');?></h3>
						<?php the_sub_field('text');?>
					</div>		
				<?php endwhile;?>
			</div>
		</div>
	</div>
<?php endif;?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.infoCarousel').owlCarousel({
			loop:false,
			items: 1,
			autoplay:false,
			margin:0,
			nav:true,
			responsive:{
				600:{
					items:2,
				},			
				992:{
					items:3,
				},
				1400: {
					items: 3,
					margin:20,
				}
			}
		});
	});
	</script>
</div>
</div>