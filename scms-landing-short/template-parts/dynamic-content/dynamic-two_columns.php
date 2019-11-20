<div class="container">
<?php $ratio = get_sub_field('column_ratio');
if($ratio == '7:5'){
	$col1 = 'col-md-7 col-xl-6 offset-xl-1';
	$col2 = 'col-md-5';
} elseif($ratio == '5:7'){
	$col1 = 'col-md-5 col-xl-4 offset-xl-1';
	$col2 = 'col-md-7';
} else {
	$col1 = 'col-md-6  col-xl-5 offset-xl-1';
	$col2 = 'col-md-6';
}
if(get_sub_field('custom_id')){
	$customID = get_sub_field('custom_id');
	$dynamicID = preg_replace("/[^A-Za-z0-9 ]/", '', $customID);
	$dynamicID = $dynamicID.'-2';
}
?>
	<div class="row columnrow">
		<div class="<?php echo $col1;?>">
			<?php the_sub_field('column_one');?>
			<?php if( have_rows('column_one_highlights') ): ?>
				<div class="highlights">
				<?php while( have_rows('column_one_highlights') ): the_row(); 
					// vars
					$highlight_icon = get_sub_field('highlight_icon');
					$highlight_text = get_sub_field('highlight_text');
					$highlight_title = get_sub_field('highlight_title');

					?>
					<div class="col-md-6">
						<div class="highlight">

							<div class="highlight-icon"><img src="<?php echo $highlight_icon['url']; ?>" alt="<?php echo $highlight_icon['alt'] ?>" /></div>
							<div class="highlight-title"><?php echo $highlight_title; ?></div>

						</div>
					</div>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="<?php echo $col2;?> col2" id="whyChoose-2">
			<?php the_sub_field('column_two');?>
		</div>
	</div>
</div>