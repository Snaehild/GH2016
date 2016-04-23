<?php get_header();?>
<?php $custombck = wp_get_attachment_url( get_post_thumbnail_id($wp_query->post->ID) ); ?>
<?php if(empty($custombck)){}else{ ?>
<style>
    body.page{
    background-image:url(<?php echo esc_url($custombck); ?>) !important;
    background-position:center top !important;
    background-repeat:  no-repeat !important;
}
</style>
<?php } ?>
<!-- Page content
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class=" blog default-blog">
	<div class="container">
	<div class="row">

		<?php require_once(get_template_directory() .'/blog-roll-right-tmp.php'); ?>

	</div><!-- /row -->
</div>
</div><!-- /containerblog -->

<?php get_footer(); ?>