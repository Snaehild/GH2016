<?php
/*
 * Template name: Blog - Full width
*/
?>
<?php get_header();?>
<?php $custombck = wp_get_attachment_url( get_post_thumbnail_id($wp_query->post->ID) ); ?>
<?php if(empty($custombck)){}else{ ?>
<?php require_once(get_template_directory() .'/css/header-image-page.css.php'); ?>
<?php } ?>
<!-- Page content
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="blog blog-ind">

	<div class="container">

		<div class="row">

			<?php require_once(get_template_directory() .'/blog-roll-full-tmp.php'); ?>

		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /containerblog -->

<?php get_footer(); ?>