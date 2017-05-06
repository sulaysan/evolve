<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/*

 * widget

 */

if ( ! class_exists( 'CourseWidget') ) :

class CourseWidget extends WP_Widget {



	function CourseWidget() {

		// Instantiate the parent object

		parent::__construct( false, 'Learn Widget' );

	}



	function widget( $args, $instance ) {

		// add custom class contact box

		extract( $args );

		global $ct_options;
		echo wp_kses_post( $before_widget );
		$main_title="";
		$description="";
		$url="";
		$img="";

		if ( ! empty( $instance['title'] ) ) {
			$main_title=$instance['title'];
		} 
		if ( ! empty( $instance['description'] ) ) {
			$description=$instance['description'];


		} 
		if ( ! empty( $instance['url'] ) ) {
			$url=$instance['url'];

		} 
		if ( ! empty( $instance['img'] ) ) {
			$img=$instance['img'];

		} 
		
		?>
		<?php
		
		$args = array(
        'posts_per_page' => -1, //total productos por pagina -1 = todos
        'post_type' => 'product',
		'orderby'    => 'date',
		'order'      => 'DESC',
		'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => array( 'courses' ), // Don't display products in the courses category on the shop page
					'operator' => 'IN'
                )
          ),
		);	
	
		
		$thecourse = new WP_Query( $args );
		?>
		 
			
		<?php 
		if ( $thecourse-> have_posts() ) {
		
			global $more;
			
			$now=new DateTime();
			$today = $now->format('Y-m-d'); //use format whatever you are using
			
			$d = new DateTime($date);
			$timestamp = $d->getTimestamp(); // Unix timestamp
			$more = 0;
		//	$_pf = new WC_Product_Factory();  
		
			while ( $thecourse->have_posts() ) : $thecourse->the_post(); 
				global $post;
				global $product;
				
				$id=get_the_ID();
				
				$image ="";
				if ( has_post_thumbnail()) {
				$image = get_the_post_thumbnail( $id, 'single-course-thumbnail alignnone wp-image-73');
				}

				//$product = $_pf->get_product($id);
 
				$attributes = $product->get_attributes($id);
				
				if ( ! $attributes ) {
					continue;
				}else{
						
					
						$today = date("Y-m-d");
						
						foreach ( $attributes as $attribute ) {
							
							
							$date_session="";	
							$lstdates = $attribute->get_options();
							$has_date=false;
					
							foreach ($lstdates as $date){
								$exp=new DateTime($date);
								$expiry = $exp->format('Y-m-d');
								if (strtotime($today) > strtotime($expiry))
									 continue;
								else{
									if ($date_session=="") 	
									{	
									 $date_session=$expiry; 
									 $has_date=true;
									} 
								} 
							}	
						}
					
					if (!$has_date) continue;
					$city = get_post_meta( $id, 'course_city', true );
					$state = get_post_meta( $id, 'course_state', true );
					
					$d = new DateTime($date_session);
					$date_near = $d->format('F d, Y'); // 2003-10-16
					
					$location = strtoupper($date_near." / ". $city .", ". $state);	
					$content=break_text(get_the_content(),150);	
					
						$theproduct[]=array(
						"date_session"=>$date_session,
						"title"=>get_the_title(),
						"content"=>$content,
						"slug"=>get_permalink(),
						"location"=>$location,
						"image"=>$image,
						
						);
						
						
					}
				
		 endwhile;
		 
	
			sort($theproduct);

			$p=$theproduct[0];
		
			 
			 ?>
			 <img src="<?php echo $img ?>" class="single-course-thumbnail alignnone">
			  </div>		
			<div class="col-sm-4">
				<div class="first">
				<h2><?php echo $main_title; ?></h2>
				<p><?php echo $description; ?></p>
				<div class="button"><a href="<?php echo $url; ?>">AVAILABLE CLASSES</a></div>
				</div>
		
			<div class="last">
				<h2><?php echo $p["title"] ?></h2>
				<div class="date"><?php echo $p["location"]; ?></div>
				<p><?php echo $p["content"]; ?></p>
				<div class="button"><a href="<?php echo $p["slug"]; ?>">READ MORE</a></div>
			</div>
	
 		
		
		 
	<?php	
		echo wp_kses_post( $after_widget );
	 }
}


	function update( $new_instance, $old_instance ) {

		// Save widget options

		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
		
		return $instance;

	}



	function form( $instance ) {

		// Output admin widget options form

		$defaults = array( 'title' => 'Settings Title',
						   'description' => 'Located in Orlando, Florida and Las Vegas, Nevada, the Academy is the heart of the largest convention and live even markets in the United States',
						   'url'=>'academy-classes/',
						   'img'=>''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<p>

			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Title:</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" />

		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('description') ); ?>">Description:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('description') ); ?>" name="<?php echo esc_attr( $this->get_field_name('description') ); ?>" value="<?php echo esc_attr( $instance['description'] ) ?>" />
		</p>
	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('url') ); ?>">Page slug:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('url') ); ?>" value="<?php echo esc_attr( $instance['url'] ) ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('img') ); ?>">Image url:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('img') ); ?>" name="<?php echo esc_attr( $this->get_field_name('img') ); ?>" value="<?php echo esc_attr( $instance['img'] ) ?>" />
		</p>

	<?php }

}

endif;





function ct_register_widgets() {

	register_widget( 'CourseWidget' );

}



add_action( 'widgets_init', 'ct_register_widgets' );