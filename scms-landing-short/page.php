<?php
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

<div class="container body-container">
<div class="row">

		<div class="col">		
		<!-- breadcrumbs -->	
			<?php while ( have_posts() ) :
				the_post();
				$post_type = get_post_type( $post_id );
				get_template_part( 'template-parts/content', $post_type );


			endwhile; // End of the loop.?>

		</div>
		
	</div>

</div> <!-- /container -->



<?php get_footer(); ?>