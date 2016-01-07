<footer>
	<div class="container">
		<?php if ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'footer' ) ) : ?>

			<?php dynamic_sidebar( 'footer' ); ?>

		<?php endif; ?>

	</div>
</footer>

<div class="copyright">
	<div class="container">

	<p>© <?php echo date("Y"); ?>&nbsp;

		<?php if(of_get_option('copyright')!=""){
			 echo of_get_option('copyright'); ?>
		<?php } ?>

	<?php if(of_get_option('terms')!= "" or of_get_option('termsname') != ""){ ?> || <?php } ?>


	<?php if(of_get_option('terms') != ""){?> <a href="<?php echo esc_url(of_get_option('terms')); ?>"> <?php } ?>

	<?php if(of_get_option('termsname')!=""){ echo of_get_option('termsname');} ?>

	<?php if(of_get_option('terms')!=""){?> </a> <?php } ?>
	&nbsp;

	<div class="social">
	<?php if ( of_get_option('rss') ) { ?> <a class="rss" target="_blank" href="<?php  echo esc_url(of_get_option('rss_link'));  ?>"><i class="fa fa-rss"></i> </a><?php } ?>
	<?php if ( of_get_option('dribbble') ) { ?> <a class="dribbble" target="_blank" href="<?php  echo esc_url(of_get_option('dribbble_link'));  ?>"><i class="fa fa-dribbble"></i> </a><?php } ?>
	<?php if ( of_get_option('vimeo') ) { ?> <a class="vimeo" target="_blank" href="<?php echo esc_url(of_get_option('vimeo_link'));   ?>"><i class="fa fa-vimeo-square"></i> </a><?php } ?>
	<?php if ( of_get_option('youtube') ) { ?> <a class="youtube" target="_blank" href="<?php echo esc_url(of_get_option('youtube_link'));   ?>"><i class="fa fa-youtube"></i> </a><?php } ?>
	<?php if ( of_get_option('twitch') ) { ?> <a class="twitch" target="_blank" href="<?php echo esc_url(of_get_option('twitch_link'));   ?>"><i class="fa fa-twitch"></i></a><?php } ?>
	<?php if ( of_get_option('steam') ) { ?> <a class="steam" target="_blank" href="<?php echo esc_url(of_get_option('steam_link'));   ?>"><i class="fa fa-steam"></i></a><?php } ?>
	<?php if ( of_get_option('pinterest') ) { ?> <a class="pinterest" target="_blank" href="<?php  echo esc_url(of_get_option('pinterest_link'));   ?>"><i class="fa fa-pinterest"></i> </a><?php } ?>
	<?php if ( of_get_option('googleplus') ) { ?> <a class="google-plus" target="_blank" href="<?php echo esc_url(of_get_option('google_link'));   ?>"><i class="fa fa-google-plus"></i></a><?php } ?>
	<?php if ( of_get_option('twitter') ) { ?> <a class="twitter" target="_blank" href="<?php  echo esc_url(of_get_option('twitter_link'));   ?>"><i class="fa fa-twitter"></i></a><?php } ?>
	<?php if ( of_get_option('facebook') ) { ?> <a class="facebook" target="_blank" href="<?php echo esc_url(of_get_option('facebook_link'));   ?>"><i class="fa fa-facebook"></i></a><?php } ?>
	</div>

	</div>
</div>


</div> <!-- End of container -->
<?php wp_footer(); ?>
</body></html>