<div class="bodyContent">
<!-- page title -->
<h1 class="entry-title"><?php the_title(); ?></h1>

<?php if(has_post_thumbnail()):?>
<div class="postThumb">
	<?php the_post_thumbnail('landscape'); ?>
</div>
<?php endif;?>
<!-- main content -->

	<div class="row">
		<div class="col">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>
	</div>

</div>