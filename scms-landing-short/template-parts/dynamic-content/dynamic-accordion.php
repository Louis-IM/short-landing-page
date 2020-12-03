<div class="textBlock">
	<div class="container">
		<div class="row">
			<div class="col col-xl-10 offset-xl-1">
			<?php the_sub_field('intro_text');?>
			
			<?php if(have_rows('accordions')):?>
			<div class="accordions">
				<?php while(have_rows('accordions')): the_row();?>
				<div class="accordion">
					<h3 class="title"><?php the_sub_field('title');?></h3>
					<div class="accordionContent">
						<?php the_sub_field('text');?>
					</div>
				</div>
				<?php endwhile;?>
			<?php endif;?>
			</div>
		</div>
	</div>	
</div>