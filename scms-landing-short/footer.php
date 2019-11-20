<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

$privpol = get_field('privacy_policy_link','options');
?>



<footer class="footer">
	<div class="map" <?php if(get_field('footer_background_image','options')){
		$ftbg = get_field('footer_background_image','options');
		echo 'style="background-image:url('.$ftbg['url'].');"';
	}?>>
	<?php if(get_field('map_link','options')):
	$map_link = get_field('map_link','options');?>
		<a href="<?php echo $map_link['url'];?>"><?php echo $map_link['title'];?></a>
	<?php endif;?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="footerTop">
					<?php the_field('contact_text','options');?>
				</div>
				<div class="footerBottom">
					<p>&copy; Copyright <?php echo date('Y');?> <?php the_field('copyright_text','options');?> <?php  if($privpol):?>| <a href="<?php echo $privpol;?>" target="_blank">Privacy Policy</a> <?php endif;?>| Digital Agency: <a href="https://www.innermedia.co.uk" target="_blank">Innermedia</a></p>
				</div>
			</div>
		</div>
	</div>

</footer>
</div>			
<?php wp_footer(); ?>

</body>
</html>