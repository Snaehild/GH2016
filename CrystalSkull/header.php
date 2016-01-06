<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
    <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php //globals
    global $post, $page, $paged, $woocommerce;
	?>

    <?php include_once 'css/colours.css.php'; ?>
	<?php $currentlang = apply_filters( "wpml_home_url", esc_url(home_url('/')));  ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main_wrapper">

    <!-- NAVBAR
    ================================================== -->
      <div class="navbar-wrapper ">
      	<div class="top-menu-bar">
      	<div class="container">

        <div class="top-menu">
        	 <?php if(has_nav_menu('top-menu')) { ?>
			<?php wp_nav_menu( array( 'theme_location'  => 'top-menu', 'depth' => 0,'sort_column' => 'menu_order', 'items_wrap' => '<ul  class="nav navbar-nav">%3$s</ul>') ); ?>
		 	<?php } ?>
		 </div>

				<div class="social-top">
		            <?php if ( of_get_option('rss') ) { ?> <a class="rss" data-toggle="tooltip" data-placement="bottom" title="RSS" target="_blank" href="<?php  echo esc_url(of_get_option('rss_link'));  ?>"><i class="fa fa-rss"></i> </a><?php } ?>
		            <?php if ( of_get_option('dribbble') ) { ?> <a class="dribbble" data-toggle="tooltip" data-placement="bottom" title="Dribbble" target="_blank" href="<?php  echo esc_url(of_get_option('dribbble_link'));  ?>"><i class="fa fa-dribbble"></i> </a><?php } ?>
		            <?php if ( of_get_option('vimeo') ) { ?> <a class="vimeo" data-toggle="tooltip" data-placement="bottom" title="Vimeo" target="_blank" href="<?php echo esc_url(of_get_option('vimeo_link'));   ?>"><i class="fa fa-vimeo-square"></i> </a><?php } ?>
		            <?php if ( of_get_option('youtube') ) { ?> <a class="youtube" data-toggle="tooltip" data-placement="bottom" title="YouTube" target="_blank" href="<?php echo esc_url(of_get_option('youtube_link'));   ?>"><i class="fa fa-youtube"></i> </a><?php } ?>
		            <?php if ( of_get_option('twitch') ) { ?> <a class="twitch" data-toggle="tooltip" data-placement="bottom" title="Twitch" target="_blank" href="<?php echo esc_url(of_get_option('twitch_link'));   ?>"><i class="fa fa-twitch"></i></a><?php } ?>
		            <?php if ( of_get_option('steam') ) { ?> <a class="steam" data-toggle="tooltip" data-placement="bottom" title="Steam" target="_blank" href="<?php echo esc_url(of_get_option('steam_link'));   ?>"><i class="fa fa-steam"></i></a><?php } ?>
		            <?php if ( of_get_option('pinterest') ) { ?> <a class="pinterest" data-toggle="tooltip" data-placement="bottom" title="Pinterest" target="_blank" href="<?php  echo esc_url(of_get_option('pinterest_link'));   ?>"><i class="fa fa-pinterest"></i> </a><?php } ?>
		            <?php if ( of_get_option('googleplus') ) { ?> <a class="google-plus" data-toggle="tooltip" data-placement="bottom" title="Google+" target="_blank" href="<?php echo esc_url(of_get_option('google_link'));   ?>"><i class="fa fa-google-plus"></i></a><?php } ?>
		            <?php if ( of_get_option('twitter') ) { ?> <a class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter" target="_blank" href="<?php  echo esc_url(of_get_option('twitter_link'));   ?>"><i class="fa fa-twitter"></i></a><?php } ?>
		            <?php if ( of_get_option('facebook') ) { ?> <a class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook" target="_blank" href="<?php echo esc_url(of_get_option('facebook_link'));   ?>"><i class="fa fa-facebook"></i></a><?php } ?>
		        </div>

    </div><!-- /.container -->
    </div><!-- /.top-menu-bar -->

       <div class="navbar navbar-inverse navbar-static-top container" role="navigation">
       	<div class="logo col-lg-3 col-md-3">
            		<a class="brand" href="<?php  echo esc_url(site_url('/')); ?>"> <img src="<?php echo esc_url(of_get_option('logo')); ?>" alt="logo"  /> </a>
          		</div>
			 <?php if(!function_exists( 'ubermenu' )){ ?>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"><?php esc_html_e('Toggle navigation', 'crystalskull'); ?></span>
                <span class="fa fa-bars"></span>
              </button>
            </div>
            <?php } ?>

            <div class="navbar-collapse <?php if(!function_exists( 'ubermenu' )){ echo 'collapse'; } ?>">


                <?php if(has_nav_menu('header-menu')) { ?>
              <?php if(function_exists( 'ubermenu' )){ ?>
              	<?php ubermenu( 'main' , array( 'theme_location' => 'header-menu' ) ); ?>
			  <?php }else{ ?>
              <?php wp_nav_menu( array( 'theme_location'  => 'header-menu', 'depth' => 0,'sort_column' => 'menu_order', 'items_wrap' => '<ul  class="nav navbar-nav">%3$s</ul>', 'walker'  => new crystalskull_Walker_Quickstart_Menu()) ); ?>
                <?php } ?>

                <?php }else { ?>
                   <ul  class="nav"><li>
                   <a href="#"><?php esc_html_e('No menu assigned!', 'crystalskull'); ?></a>
                   </li></ul>
                <?php } ?>

                 <?php if ($woocommerce) { if(is_woocommerce()){ ?>
	                    <div class="cart-outer">
	                        <div class="cart-menu-wrap">
	                            <div class="cart-menu">
	                                <a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>"><div class="cart-icon-wrap"><i class="fa fa-shopping-cart"></i> <?php  esc_html_e('Your cart.', 'crystalskull'); ?><div class="cart-wrap"><span><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?> </span></div> </div></a>
	                            </div>
	                        </div>

	                        <div class="cart-notification">
	                            <span class="item-name"></span> <?php  esc_html_e('was successfully added to your cart.', 'crystalskull'); ?>
	                        </div>

	                         <!-- If woocommerce -->
		                <?php if ($woocommerce) { if(is_woocommerce()){ ?>
		                        <?php
		                            // Check for WooCommerce 2.0 and display the cart widget
		                            if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
		                                the_widget( 'WC_Widget_Cart', 'title= ' );
		                            } else {
		                                the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
		                            }
		                        ?>

		                 <?php }} ?>
                 			<!-- Endif woocommerce -->

                       </div>
						<?php }} ?>
            </div><!--/.nav-collapse -->

          </div><!-- /.navbar-inner -->

    </div><!-- /.navbar -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<?php
if(is_plugin_active('buddypress/bp-loader.php') && function_exists( 'bp_current_component' ) ){
    $component = bp_current_component();
    if($component == 'members'){ ?>
        <div class="title_wrapper container">

            <div class="col-lg-12">
           		<h1><?php esc_html_e('Search members', 'crystalskull'); ?></h1>
            </div>

        <div class="clear"></div>
</div>
    <?php }
}else{
    $component = false;
}
?>
<?php if(is_singular('clan') or $component or is_front_page() or is_page_template('tmp-home.php')  or is_page_template('tmp-no-title.php') or is_page_template('tmp-home-left.php') or is_page_template('tmp-home-right.php') or is_page_template('tmp-home-news.php')){}elseif(is_search()){ ?>
<div class="title_wrapper container">

            <div class="col-lg-12"><h1><?php esc_html_e('Search: ', 'crystalskull');  echo get_search_query(); ?></h1></div>
            <div class="col-lg-12 breadcrumbs"><strong><?php crystalskull_breadcrumbs(); ?></strong></div>

</div>
<?php }else{ ?>
<div class="title_wrapper container">


            <div class="col-lg-12">

            	<?php if(is_single() && ( get_post_type($post->ID) == 'post')){
				  	$categories = wp_get_post_categories($post->ID);
					echo "<div class='cat-single'>";
					foreach ($categories as $category) { ?>
					<?php $cat_data = get_option("category_$category");  ?>
					<a href="<?php echo esc_url(get_category_link($category)); ?>" class="ncategory" style="background-color: <?php echo esc_attr($cat_data['catBG']); ?> !important" >
       							  <?php	echo esc_attr(get_cat_name($category)); ?>
					</a>
					<?php }
					echo "</div>";
				}  ?>
             <h1><?php
                 if ( is_plugin_active( 'woocommerce/woocommerce.php' )){
                    if (is_shop()){ echo get_the_title(skywarrior_get_id_by_slug ('shop'));}
                    else{ if(is_tag()){esc_html_e("Tag: ",'crystalskull');echo get_query_var('tag' ); }elseif(is_category()){esc_html_e("Category: ",'crystalskull');echo get_the_category_by_ID(get_query_var('cat'));}elseif(is_author()){esc_html_e("Author: ",'crystalskull');echo get_the_author_meta('user_login', get_query_var('author' ));}elseif(is_archive()){ ?>
				  	<?php if ( is_day() ) : ?>
				        <?php printf( esc_html__( 'Daily Archives: %s', 'crystalskull' ), get_the_date() ); ?>
				    <?php elseif ( is_month() ) : ?>
				        <?php printf( esc_html__( 'Monthly Archives: %s', 'crystalskull' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'crystalskull' ) ) ); ?>
				    <?php elseif ( is_year() ) : ?>
				        <?php printf( esc_html__( 'Yearly Archives: %s', 'crystalskull' ), get_the_date( _x( 'Y', 'yearly archives date format', 'crystalskull' ) ) ); ?>
				    <?php else : ?>
				        <?php esc_html_e( 'Blog Archives', 'crystalskull' ); ?>
				    <?php endif; }else{the_title();} }
                 }else{  if(is_tag()){esc_html_e("Tag: ",'crystalskull');echo get_query_var('tag' );}elseif(is_category()){esc_html_e("Category: ",'crystalskull');echo get_the_category_by_ID(get_query_var('cat'));}elseif(is_author()){esc_html_e("Author: ",'crystalskull');echo get_the_author_meta('user_login', get_query_var('author' ));}elseif(is_archive()){ ?>
				  	<?php if ( is_day() ) : ?>
				        <?php printf( esc_html__( 'Daily Archives: %s', 'crystalskull' ), get_the_date() ); ?>
				    <?php elseif ( is_month() ) : ?>
				        <?php printf( esc_html__( 'Monthly Archives: %s', 'crystalskull' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'crystalskull' ) ) ); ?>
				    <?php elseif ( is_year() ) : ?>
				        <?php printf( esc_html__( 'Yearly Archives: %s', 'crystalskull' ), get_the_date( _x( 'Y', 'yearly archives date format', 'crystalskull' ) ) ); ?>
				    <?php else : ?>
				        <?php esc_html_e( 'Blog Archives', 'crystalskull' ); ?>
				    <?php endif; }else{the_title();} } ?>
            </h1>
            </div>
            <div class="col-lg-12 breadcrumbs"><strong><?php crystalskull_breadcrumbs(); ?></strong></div>

        <div class="clear"></div>
</div>
<?php } ?>


<?php
if(is_page_template('tmp-home.php')){
if(get_post_meta($post->ID, '_smartmeta_slider_short', true)){ ?>
<div id="sliderhome">
<div class="container">
<?php
        $key_1_value = get_post_meta($post->ID, '_smartmeta_slider_short', true);
        if($key_1_value != '') {
            echo do_shortcode($key_1_value);
        }
?>
</div>
</div>
<?php } }?>


<?php if(of_get_option('newsticker')){ ?>
        <div class="after-nav ">
        	<div class="container">
                <div class="ticker-title"><i class="fa fa-bullhorn"></i> &nbsp;<?php if(of_get_option('tickertitle')){ echo of_get_option('tickertitle'); } ?></div>
                <?php if(of_get_option('ticker_category') != 0){   ?>
                	<?php if(of_get_option('ticker_category') == 999){
                		$args = array('orderby' => 'rand');
                	}else{
                		$args = array('category' => of_get_option('ticker_category'));
					} $posts_array = get_posts( $args ); ?>
                	 <ul id="webticker" >
                        <?php $i = 0; foreach ($posts_array as $post) { $i ++; ?>
                            <li id='item<?php echo esc_attr($i); ?>'>
                               	<?php $categories = wp_get_post_categories($post->ID); $cat_data = get_option("category_$categories[0]"); ?>
                            	<a href="<?php echo esc_url(get_category_link($categories[0])); ?>" class="ticker_cat" style="background-color: <?php echo esc_attr($cat_data["catBG"]); ?> !important" >
						       		<?php echo esc_attr(get_cat_name($categories[0])); ?>
								</a>

								<a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>

                <?php }else{ ?>
                <?php  if(of_get_option('tickeritems')){ $news = explode('||', of_get_option('tickeritems')); ?>
                    <ul id="webticker" >
                        <?php $i = 0; foreach ($news as $new) { $i ++; ?>

                            <li id='item<?php echo esc_attr($i); ?>'>
                                <?php $crystalskull_allowed = wp_kses_allowed_html( 'post' ); ?>
                                <?php echo wp_kses($new,$crystalskull_allowed); ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php } ?>
                 <div class="search-top">
		                <form method="get" id="sform" action="<?php echo esc_url( site_url( '/' ) ); ?>">
		                    <input type="search" autocomplete="off" name="s">
		                    <input type="hidden" name="post_type[]" value="post" />
		                    <input type="hidden" name="post_type[]" value="page" />
		                    <i class="fa fa-search"></i>
		                </form>
		            </div>

            </div>
        </div>

<?php } ?>