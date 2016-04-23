<?php
class sw_latest_comments extends WP_Widget {

	function sw_latest_comments() {
		$widget_ops = array('description' => esc_html__('Show latest comments widget.', 'crystalskull') );
		parent::__construct(false, esc_html__('SW Latest Comments', 'crystalskull'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
			$title = $instance['title'];
			$comcount = $instance['comcount'];
		?>
		<?php
		$allowed_tags = array(
			'div' => array(
				'class' => array()
			),
			'h3' => array(
				'class' => array()
			),
		);
		?>
		<?php echo wp_kses($before_widget, $allowed_tags); ?>
		<?php if ($title) { echo  wp_kses($before_title, $allowed_tags) . esc_html($title ). wp_kses($after_title, $allowed_tags); } else { echo wp_kses($before_title, $allowed_tags) .'sw_latest_comments'. esc_attr($after_title, $allowed_tags); } ?>

		<ul>
			<?php

             $args = array(
					'number' => $comcount,
					'order' => 'DESC',
					'status' => 'approve',
					'post_type' => 'post',
				);

            $comments = get_comments( $args );

            foreach ($comments as $comment) {
            ?>

					<li class="comment-wrap">
						<div class="aavatar">
							<a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comment-<?php echo esc_attr($comment->comment_ID); ?>" title="on <?php echo esc_attr($comment->post_title); ?>"><?php echo get_avatar( $comment->user_id, 60, '', 'author image', array('class' => 'authorimg') ); ?></a>
						</div>
						<div class="com_details">
							<a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comment-<?php echo esc_attr($comment->comment_ID); ?>" title="on <?php echo esc_attr($comment->post_title); ?>"><?php echo strip_tags($comment->comment_author); ?> <i><?php _e('says:', 'crystalskull'); ?></i></a>
							<!-- <div class="com_title">
								<?php //echo substr(esc_attr($comment->post_title),0, 30);  ?>...
							</div>-->
							<div class="com_ex">
								<?php echo substr(strip_tags($comment->comment_content), 0, 100); ?>...
							</div>
						</div>
						<div class="clear"></div>
					</li>
            <?php
            } ?>
            </ul>
	<?php
	echo wp_kses($after_widget, $allowed_tags);
   }


   function form($instance) {

   		$defaults = array('title' => esc_html__('Latest Comments', 'crystalskull' ),'comcount' => '3');
		$instance = wp_parse_args((array) $instance, $defaults);

       $title = esc_attr($instance['title']);
	   $postcount = esc_attr($instance['comcount']);

       ?>
       	<p>
	   	   	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','crystalskull'); ?></label>
			<input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
       	</p>

       	<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'comcount' )); ?>"><?php esc_html_e('Number of comments', 'crystalskull') ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'comcount' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'comcount' )); ?>" value="<?php echo esc_attr($instance['comcount']); ?>" />
		</p>
      <?php
   }

}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("sw_latest_comments");'));

?>