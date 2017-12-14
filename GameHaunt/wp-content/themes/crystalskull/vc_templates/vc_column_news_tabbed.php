<?php
$el_news_tabbed_number_posts = $el_news_tabbed_categories =  $el_news_tabbed_title = $border_color = $el_class = '';
$posts = array();
extract( shortcode_atts( array(
    'el_news_tabbed_title' => '',
    'el_news_tabbed_number_posts' => '',
    'el_class' => '',
    'el_news_tabbed_categories' => '',
     'border_color' => '',
), $atts ) );
if(empty($css)) $css = '';
global $wp_query;
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
wp_enqueue_script('jquery-ui-tabs');
?>

<div class="<?php echo esc_attr($css_class); if(!empty($el_class)) echo esc_attr($el_class); ?>">
    <div class="wpb_wrapper">
        <div class="title-wrapper">
            <h3 class="widget-title" style="border-color: <?php echo esc_attr($border_color); ?>"><i class="fa fa-newspaper-o"></i> <?php if(!empty($el_news_tabbed_title)) echo esc_attr($el_news_tabbed_title); ?></h3>
            <div class="clear"></div>
        </div>
        <div class="news_tabbed">
        <div id="block_tabs_<?php echo  rand(1, 100); ?>" class="block_tabs">
            <div class="tab-inner">
                <ul class="nav cf nav-tabs">

                 <?php

                    $ct = array();
                    if ( $el_news_tabbed_categories != '' ) {
                        $el_news_tabbed_categories = explode( ",", $el_news_tabbed_categories );
                        foreach ( $el_news_tabbed_categories as $category ) {
                            array_push( $ct, $category );
                        }
                    }

				   $posts = new WP_Query(array(

                    'category__in' => $ct
                    ));

                    $args = array( 'taxonomy' => 'category', 'hide_empty' => true, 'include' => $ct  );
                    $terms = get_terms('category', $args);

                    $count = count($terms); $i=0;
                    if ($count > 0) {
                    foreach ($terms as $term) {
                    $i++;

                    echo '<li >
                            <a href="#tab-' .esc_attr($i).'">' . esc_attr($term->name) . '</a>
                        </li>';
                                                }
                                    }  ?>
                </ul>
                <div class="wcontainer">
                <?php
                $j=0;
                foreach ($terms as $term) {
                $j++;
                $termsarray=array();
                $termsarray[]= $term->term_id; ?>
                    <div class="tab tab-content" id="tab-<?php echo esc_attr($j); ?>" >
                        <ul class="newsbv">
                        <?php $post_ids = get_objects_in_term( $termsarray, 'category' ); ?>

                            <?php query_posts(array(  'posts_per_page' => $el_news_tabbed_number_posts, 'post__in' => $post_ids )); ?>
                            <?php $i = 0; ?>
                            <?php $k = 0; ?>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            	 	<?php global $post;
                                        $prim_cat = get_post_meta($post->ID, 'prim_cat', true);
                                        if($prim_cat) {
                                            $cat_data = get_option("category_$prim_cat");
                                            $cat_id = $prim_cat;
                                        } else {
                                            $categories = wp_get_post_categories($post->ID);
                                            $cat_id = $categories[0];
                                            $cat_data = get_option("category_$cat_id");
                                        }
                                     ?>
                                <li class="<?php if( $i == 0 ) { ?>newsbv-item-first<?php }else{ echo 'newsbv-item'; }?>">
                                    <div class="newsb-thumbnail">

                    <?php if($i == 0 ){ ?>
					<?php $overall_rating = get_post_meta($post -> ID, 'overall_rating', true); ?>
					<?php if(of_get_option('rating_type') == 'numbers'){ ?>


			                	<?php
					if($overall_rating != "0" && $overall_rating=="0.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 0.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 1</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 1.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 2</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 2.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 3</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 3.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 4</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 4.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 5</b>/5
					</div>
					<?php } ?>



					<?php }else{ ?>

			                	<?php
					if($overall_rating != "0" && $overall_rating=="0.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<?php } ?>

					<?php } ?>
				<?php } ?>
                                        <a rel="bookmark" href="<?php the_permalink(); ?>">
											<i class="fa fa-hand-pointer-o" style="text-shadow: 0px 0px 10px <?php echo esc_attr($cat_data['catBG']); ?>"></i>


                                            <?php if(strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ){

                                                    $thumb = get_post_thumbnail_id();
                                                    $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL

                                                    if($i == 0){
                                                    $image = crystalskull_aq_resize( $img_url, 422, 300, true, '', true ); //resize & crop img

                                                        }else{
                                                    $image = crystalskull_aq_resize( $img_url, 120, 95, true, '', true ); //resize & crop img
                                                        }
                                                    ?>
                                                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" />

                                            <?php } else{
                                                        if($i == 0){ ?>
                                                        <img src="<?php echo get_template_directory_uri().'/img/defaults/305x305.jpg'?> " alt="<?php the_title(); ?>" />
                                                    <?php }else{  ?>
                                                        <img src="<?php echo get_template_directory_uri().'/img/defaults/75x75.jpg'?> " alt="<?php the_title(); ?>" />
                                            <?php   }

                                                }?>
                                            <div class="clear"></div>
						                    <span class="overlay-link"></span>
						                    <span class="line_effect" style="background: <?php echo esc_attr($cat_data['catBG']); ?>"></span>
                                        </a>
                                    </div><!--newsb-thumbnail -->
                                    	<?php if($k == 0){ ?>

							                	<a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="ncategory" style="background-color: <?php echo esc_attr($cat_data['catBG']); ?> !important" >
							       					<?php echo get_cat_name($cat_id); ?>
												</a>
											<?php } ?>
							                <h4 class="newsb-title">
							                	 <?php if($k != 0){ ?>
							                	<?php global $post;
                                                    $prim_cat = get_post_meta($post->ID, 'prim_cat', true);
                                                    if($prim_cat) {
                                                        $cat_data = get_option("category_$prim_cat");
                                                        $cat_id = $prim_cat;
                                                    } else {
                                                        $categories = wp_get_post_categories($post->ID);
                                                        $cat_id = $categories[0];
                                                        $cat_data = get_option("category_$cat_id");
                                                    }
                                                ?>
							                	<a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="ncategory" style="background-color: <?php echo esc_attr($cat_data['catBG']); ?> !important" >
							       					<?php echo get_cat_name($cat_id); ?>
												</a>
												<?php } ?>
							                	<a rel="bookmark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p class="post-meta">

						                	<?php if( $wp_query->current_post == 0){ ?>
						                	<?php echo get_avatar( get_the_author_meta('ID'), 60, '', 'author image', array('class' => 'authorimg') ); ?>
						                	<?php } ?>

						    	 				<?php esc_html_e('by','crystalskull'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo get_the_author(); ?></a> <?php esc_html_e('on', 'crystalskull'); ?> <?php the_time('F j, Y'); ?> <?php esc_html_e('with', 'crystalskull'); ?>
						                      <?php if ( is_plugin_active( 'disqus-comment-system/disqus.php' )){ ?>
						                        <a  href="<?php echo the_permalink(); ?>#comments" >
						                        <?php comments_number( esc_html__('0', 'crystalskull'), esc_html__('1', 'crystalskull'), esc_html__('%', 'crystalskull') ) ?> <i class="fa fa-comments-o"></i></a>
						                       <?php }else{ ?>
						                        <a data-original-title="<?php comments_number( esc_html__('No comments in this post', 'crystalskull'), esc_html__('One comment in this post', 'crystalskull'), esc_html__('% comments in this post', 'crystalskull')); ?>" href="<?php echo the_permalink(); ?>#comments" data-toggle="tooltip">
						                         <?php comments_number( esc_html__('0', 'crystalskull'), esc_html__('1', 'crystalskull'), esc_html__('%', 'crystalskull') ) ?> <i class="fa fa-comments-o"></i></a>

						                       <?php } ?>

						                </p>
                                        <?php if( $i == 0 ) : ?>
                                        <?php global $more; $more = 1; echo substr(get_the_excerpt(), 0,198);echo '...' ?>
                                        <?php endif; ?>

                                </li>
                        <?php $i++; $k++; endwhile;endif; ?>

                    <?php wp_reset_query(); ?>
                        </ul>
                        <div class="clear"></div>
                    </div><!--tab-content -->
                 <?php } ?>
            </div>
        </div>
    </div>
</div>
    </div>
</div>