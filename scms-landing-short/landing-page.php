<?php /* Template Name: Landing Page */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template. 
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();


?>
<?php if(get_field('two_columns')){
	$twocol = get_field('two_columns');
$ratio = $twocol['column_ratio'];
if($ratio == '7:5'){
	$col1 = 'col-lg-7 col-xl-6 offset-xl-1';
} elseif($ratio == '5:7'){
	$col1 = 'col-lg-5 col-xl-4 offset-xl-1';
	$col2 = 'col-lg-7';
} else {
	$col1 = 'col-lg-6  col-xl-5 offset-xl-1';
}
}
?>
<?php if(have_rows('banner')):?>
<div class="homeBanner">
	<div id="hero" class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="6000" data-cycle-slides=">.slide">
		<?php while ( have_rows('banner') ) : the_row(); ?>
		<?php $banner_slide = get_sub_field('image');?>
			<div class="slide">
				<div class="slideImage" style="background-image:url(<?php echo $banner_slide['sizes']['banner']; ?>)">
					<?php echo wp_get_attachment_image($banner_slide[id],'banner');?>					
				</div>
				
			</div>
		<?php endwhile; ?>
	</div>
	<?php $opendayInfo = get_field('open_day_info');
	if($opendayInfo['text'] && $opendayInfo['link']):?>
	<div class="openDays">
		<div class="container">
			<div class="row">
				<div class="<?php echo $col1;?> opendayText">
					<div class="openCont"><?php echo $opendayInfo['text'];?></div>
					<?php $openlink = $opendayInfo['link'];?>
					<a href="<?php echo $openlink['url'];?>" target="<?php echo $openlink['target'];?>"><?php echo $openlink['title'];?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
</div>
<?php endif;?>

<div class="introText">
	<div class="container">
		<div class="row">
			<div class="<?php echo $col1;?> ">
				<?php the_field('intro_text');?>
			</div>
		</div>
	</div>
</div>
<?php if(have_rows('two_columns')):
	while(have_rows('two_columns')): the_row();?>
<section class="dynamicContent dynamic-two_columns intro-two" id="whyChoose">
	<?php get_template_part('template-parts/dynamic-content/dynamic', 'two_columns');?>
</section>
<?php endwhile;
endif;?>
<?php if( have_rows('landing_page_section') ):
	$i = 0;
     // loop through the rows of data
    while ( have_rows('landing_page_section') ) : the_row();
	$i++;
	$content_type =  get_row_layout(); 
	if(get_sub_field('custom_id')){
		$customID = get_sub_field('custom_id');
		$dynamicID = preg_replace("/[^A-Za-z0-9 ]/", '', $customID);
	} else {
		$dynamicID = 'sectionNo'.$i;
	}
	
	?>	
		
		<section class="dynamicContent dynamic-<?php echo $content_type;?> <?php echo $postcos;?>" id="<?php echo $dynamicID;?>">
			<?php get_template_part('template-parts/dynamic-content/dynamic', $content_type);?>
		</section>
    <?php 
	if($content_type == 'two_columns'){
		$postcos = 'postCols';
	} else {
		$postcos = '';
	}
	endwhile;

else :

    // no layouts found

endif;

?>



<?php get_footer(); ?>