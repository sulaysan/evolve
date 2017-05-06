<?php
//courses
// Image size for single posts
add_image_size( 'single-course', 700, 470, false );

function _evolve_course_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Learn Area Home', '_evolve' ),
		'id'            => 'learn-1',
		'description'   => esc_html__( 'Add widgets here.', '_evolve' ),
		'before_widget' => '<div class="col-sm-7">',
		'after_widget'  => '</div>',
	) );
}	
add_action( 'widgets_init', '_evolve_course_widgets_init' );	

/*********************************************************************/

add_filter("the_content_lenght", "break_text");
function break_text($text,$length="100"){
    if(strlen($text)<$length+10) return $text;//don't cut if too short

    $break_pos = strpos($text, ' ', $length);//find next space after desired length
    $visible = substr($text, 0, $break_pos);
    return balanceTags($visible);
}

require_once(CT_ADMIN_DIR.'/course/widget.php');

add_filter("show_available_class", "available_class");
/*********************************************************************/
function available_class(){
	
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
	
		$list_available=array();
		$thecourse = new WP_Query( $args );
		
		if ( $thecourse-> have_posts() ) {
		while ( $thecourse->have_posts() ) : $thecourse->the_post(); 
			global $post;	
			$image ="";
			if ( has_post_thumbnail()) {
				$image = get_the_post_thumbnail( $id, 'single-course-thumbnail alignnone wp-image-73');
			}
			$list_available[]=array(
			 "order"=>1,
			 "id"=>$post->ID,	
			 "title"=>get_the_title(),
			 "content"=>break_text(get_the_content(),150),
			 "url"=>get_permalink(),
			 "image"=>$image,
			);
		 endwhile;	
		}	
	return $list_available;
}
add_filter("detail_available_class", "get_detail_class");

/*********************************************************************/
function get_detail_class($id){
	
		$post=get_post($id);

			//	global $post;	
			
			$image ="";
			$image = get_the_post_thumbnail( $id, 'single-course-thumbnail alignnone wp-image-73');
			
			$mydetail=array(
			 "order"=>0,
			 "id"=>$id,	
			 "title"=>$post->post_title,
			 "content"=>break_text($post->post_content,150),
			 "url"=>get_permalink(id),
			 "image"=>$image,
			);
	
	return $mydetail;
}
/************************************************************/
/*SHORTCODES
/************************************************************/

function carousel_available_class( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'id'      => $atts[ 'id' ],
        'count'      => $atts[ 'count' ],
    ), $atts );
		
    $carrousel_class=array();
    if ($atts[ 'id' ]!=""){
        //buscamos las clases del instructor
        $instructor_available_class = get_post_meta($atts[ 'id' ], 'instructor_available_class', true );
        $have_class=false; 
        if (!empty($instructor_available_class)) $my_classes= explode(",",$instructor_available_class);
        if (count($my_classes)>0){
            $have_class=true;
            foreach ( $my_classes as $mc){
                 $carrousel_class[]=get_detail_class($mc);
            }
        }	
    }
    //buscamos todas las clases
    $all_class=available_class();
    if ( $have_class){
        foreach ($all_class as $a){
                $exist=false;
                 foreach ( $carrousel_class as $mc){
                         if ($mc["id"]==$a["id"]) 
                         {
                          $exist=true;		
                          continue;
                         }
                 }
                 if (!$exist) $carrousel_class[]=$a; 
        }
    }else{
        $carrousel_class=$all_class;
    }
        sort($carrousel_class);

    $carrusel.='<div class="full-width carousel-courses">';
    
    $carrusel.='<a href="#" id="coursesprevious" class="previous">previous</a>';
    $carrusel.='<a href="#" id="coursesnext" class="next">next</a>';
    
    $carrusel.='<div class="slider-courses row" id="courses-carousel">'; 
    
    foreach ($carrousel_class as $item) {
        $carrusel.='<div class="col col-sm-6 row">
                        <div class="col col-sm-6">
                            <!--img class="img-responsive thumbnail" src="https://unsplash.it/400/300?image=735"-->
                            '.$item['image'].'
                        </div>
                        <div class="col col-sm-6">
                            <h2>'.$item['title'].'</h2>
                            <p>'.$item['content'].'</p>
                            <a href="'.$item['url'].'">'.esc_html__( 'LEARN MORE', '_evolve' ).'</a>
                        </div>
                    </div>';
    }
    
    $carrusel.='</div>';
    
    $carrusel.='</div>';
        
    return $carrusel;
}

add_shortcode( 'carousel_available_class', 'carousel_available_class' );		
/**********************************************************************/
function carousel_instructor( $atts, $content = null ) {
	
        $atts = shortcode_atts( array(
            'count'      => $atts[ 'count' ],
        ), $atts );
		
        $args = array(
            'posts_per_page' => -1,  
            'post_type' => 'instructor',
            'orderby'    => 'title',
            'order'      => 'ASC',
        );	
	
        $list_instructor=array();
        $lista = new WP_Query( $args );
        if ( $lista-> have_posts() ) {
            while ( $lista->have_posts() ) : $lista->the_post(); 

                global $post;	
                $image ="";
                if ( has_post_thumbnail()) {
                    $image = get_the_post_thumbnail( $id, 'instructor-featured-thumb');
                }
                $list_instructor[]=array(
                    "id"=>$post->ID,	
                    "title"=>get_the_title(),
                    "job_title"=>get_post_meta( $post->ID, 'instructor_job_title', true ),
                    "content"=>break_text(get_the_content(),150),
                    "url"=>get_permalink(),
                    "image"=>$image,
                );
                
            endwhile;	
	} 
		
    $carrusel.='<div class="full-width carousel-instructors">';
    
    $carrusel.='<a href="#" id="instructorsprevious" class="previous">previous</a>';
    $carrusel.='<a href="#" id="instructorsnext" class="next">next</a>';
    
    $carrusel.='<div class="slider-instructors row" id="instructors-carousel">'; 
    
    foreach ($list_instructor as $item) {
        $carrusel.='<div class="col col-sm-3 nopadding">
                            '.$item['image'].'
                        <div class="slider-box">
                            <a href="'.$item['url'].'">'.$item['title'].'</a>
                            <p>'.$item['job_title'].'</p>
                        </div>
                    </div>';
        
        
     
    }
    
    $carrusel.='</div>';
    
    $carrusel.='</div>';
        
    return $carrusel;
    

		
}
add_shortcode( 'carousel_instructor', 'carousel_instructor' );		
//instructor



add_image_size( 'instructor-header-thumb', 1440, 891, true ); // Hard Crop Mode
add_image_size( 'instructor-body-thumb', 1920, 1080, true ); // Hard Crop Mode
add_image_size( 'instructor-featured-thumb', 375, 477, true ); // Hard Crop Mode

require_once(CT_ADMIN_DIR.'/instructor/main.php');
require_once(CT_ADMIN_DIR.'/instructor/metabox.php');



?>