<?php 
Class Latest_Portfolio_List_Widget extends WP_Widget{

	public function __construct(){
		parent::__construct('bdevs-portfolio-cats', 'Klinixer Portfolio List', array(
			'description'	=> 'Klinixer Portfolio List'
		));
	}


	public function widget($args, $instance){

		extract($args);
	 	echo $before_widget; 
	 	if($instance['title']):
     	echo $before_title; ?> 
     	<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
     	<?php echo $after_title; ?>
     	<?php endif; ?>
        	<div class="more-service-list">
                <ul class="cat">
		        	
		    <?php 
			$q = new WP_Query( array(
			    'post_type'     => 'bdevs-portfolio',
			    'posts_per_page'=> ($instance['count']) ? $instance['count'] : '3',
			    'order'			=> ($instance['posts_order']) ? $instance['posts_order'] : 'DESC'
			));

			if( $q->have_posts() ):
			while( $q->have_posts() ):$q->the_post();
				$icon_id = get_post_meta(get_the_id(), 'service_icon_thumb_id_id', true);
	            $icon_url = wp_get_attachment_image_src( $icon_id, 'thumbnail' );
				?>
	            <li>
	                <a href="<?php the_permalink(); ?>">
	                   <?php the_title(); ?>
	                </a>
	            </li>
				<?php 
				endwhile; wp_reset_query();           
			endif; 
			?> 
		        </ul>
		    </div>

		<?php echo $after_widget; ?>

		<?php
	}



	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'bdevs-toolkits' );
		$posts_order = ! empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', 'bdevs-toolkits' );
	?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">How many posts you want to show ?</label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_order'); ?>">Posts Order</label>
			<select name="<?php echo $this->get_field_name('posts_order'); ?>" id="<?php echo $this->get_field_id('posts_order'); ?>" class="widefat">
				<option value="" disabled="disabled">Select Post Order</option>
				<option value="ASC" <?php if($posts_order === 'ASC'){ echo 'selected="selected"'; } ?>>ASC</option>
				<option value="DESC" <?php if($posts_order === 'DESC'){ echo 'selected="selected"'; } ?>>DESC</option>
			</select>
		</p>

	<?php }


}




add_action('widgets_init', function(){
	register_widget('Latest_Portfolio_List_Widget');
});