<?php get_header();?>
<!-- Page content
    ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class=" blog">
	<div class="container">
		<div class="row">

		<?php if(of_get_option('archive_template') == 'full'){ ?>

				<?php require_once(get_template_directory() .'/blog-roll-full-tmp.php'); ?>

		<?php }elseif(of_get_option('archive_template') == 'left'){ ?>

				<?php require_once(get_template_directory() .'/blog-roll-left-tmp.php'); ?>

		<?php }else{ ?>

				<?php require_once(get_template_directory() .'/blog-roll-right-tmp.php'); ?>

		<?php } ?>

		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.blog -->
<?php get_footer(); ?>