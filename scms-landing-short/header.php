<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="<?php bloginfo('template_url'); ?>/images/favicon.png" rel="shortcut icon">
	<link rel="profile" href="http://gmpg.org/xfn/11">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<?php wp_head(); ?>


</head>
<body id="body" <?php body_class(); ?>>
<div class="wrapper">
<header>
	<div class="headGroup">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="topHeadGrp row align-items-center">
						<div class="headerIcon col-auto">
							<a href="<?php bloginfo('url');?>" class="logo">
								<?php $logo = get_field('logo','options');
								echo wp_get_attachment_image($logo['id'],'medium');?>
							</a>
						</div>
						<div class="col">
							<div class="menuGroup ">
								<?php if(get_field('header_button_link')):
								$headerlink = get_field('header_button_link');?>						
									<div class="openDays">
										<a href="<?php echo $headerlink['url'];?>"><?php echo $headerlink['title'];?></a>
									</div>
								<?php endif;?>
								<div class="mainMenu">								
								<div class="menuToggle menu-toggle">
									<i class="fas fa-bars"></i>
								</div>
									<?php if(have_rows('top_navigation')):?>
									<div class="menuWrap"><div class="menuToggle toggleClose menu-toggle"><i class="fas fa-times"></i></div>
									<ul class="menu">
										<?php while(have_rows('top_navigation')): the_row();
										if(get_sub_field('id')){
											$dynamicID = '#'.get_sub_field('id');
										}
										?>
										<li>
											<a href="<?php echo $dynamicID;?>"><?php the_sub_field('text');?></a>
										</li>
										<?php endwhile;?>
									</ul>
									</div>
									<?php else:?>
									<?php //wp_nav_menu(array('theme_location'=>'main','depth'=>1,'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>'));?>
									<?php endif;?>
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</header>




	