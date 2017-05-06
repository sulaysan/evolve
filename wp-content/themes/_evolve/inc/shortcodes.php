<?php

// "do_shortcode" but without the wrapping <p> of Shortcodes
function do_shortcode_boc( $content ) {

    $content = clean_content( $content );
    $content = do_shortcode( shortcode_unautop( $content ) );
    //$content = do_shortcode( $content );
    
    return $content;
}

function clean_content( $content ) {

    //$content = preg_replace( '#^<\/p>|^<br />|<p>|<br>$#', '', $content );
    //$content = str_replace( '<p></p>', '', $content );
    $content = str_replace( '<br>', '', $content );
    $content = str_replace( '<br />', '', $content );
    $content = str_replace( '<p>&nbsp;</p>', '<p></p>', $content );
    return $content;
}

/*
[full_width class="home-slider"]
CONTENT
[/full_width]
 */
function shortcode_full_width( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'class' => ''
    ), $attributes ) );
    
    return '<div class="full-width '.$class.'">'.do_shortcode_boc($content).'</div>';
}
add_shortcode('full_width', 'shortcode_full_width');

/*
[inner_width class=""]
CONTENT
[/inner_width]
 */
function shortcode_inner_width( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'class' => ''
    ), $attributes ) );
    
    return '<div class="inner-content '.$class.'">'.do_shortcode_boc($content).'</div>';
}
add_shortcode('inner_width', 'shortcode_inner_width');

/*
[triflecta_home title="PROVIDING THE<br>BEST GEAR" subtitle="FOR YOUR GIG"]
With the training and support to<br>maximize performance.
[/triflecta_home]
 */
function shortcode_triflecta_home( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'title' => '',
            'subtitle' => ''
    ), $attributes ) );

    return '<div class="home-triflecta">
    <div class="triangle">
        <h1>'.$title.'</h1>
        <h2>'.$subtitle.'</h2>
        <div class="line"></div>
        <p>'.do_shortcode_boc($content).'</p>
    </div>
</div>';
}
add_shortcode('triflecta_home', 'shortcode_triflecta_home');

/*
[triflecta_hotlinks][/triflecta_hotlinks]
 */
function shortcode_triflecta_hotlinks( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'rent_link' => '#',
            'buy_link' => '#',
            'learn_link' => '#',
    ), $attributes ) );

    return '<div class="home-hot-links row">
    <div class="col first col-sm-4">
        <a href="'.$rent_link.'" class="rent-icon animated bounce"></a>
        <p>'.esc_html__( 'RENT', '_evolve' ).'</p>
    </div>
    <div class="col col-sm-4">
        <a href="'.$buy_link.'" class="buy-icon"></a>
        <p>'.esc_html__( 'BUY', '_evolve' ).'</p>
    </div>
    <div class="col last col-sm-4">
        <a href="'.$learn_link.'" class="learn-icon"></a>
        <p>'.esc_html__( 'LEARN', '_evolve' ).'</p>
    </div>
</div>';
}
add_shortcode('triflecta_hotlinks', 'shortcode_triflecta_hotlinks');

/*
[carousel][/carousel]
 */
function shortcode_carousel_evolve( $attributes, $content = null ) {
    /*
    extract( shortcode_atts( array(
            'rent_link' => '#',
            'buy_link' => '#',
            'learn_link' => '#',
    ), $attributes ) );
    */

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
					'operator' => 'NOT IN'
                )
          ),
);	
 $products = new WP_Query( $args );

   $carrusel='<div class="slider-gallery row" id="home-carousel">'; 
   
       while ( $products->have_posts() ) {
		   $products->the_post();
				//global $post;
	  	 $title = get_the_title();
         $slug = get_permalink();	
		 $image ="";   
		
		if ( has_post_thumbnail()) {
			$image = get_the_post_thumbnail( get_the_ID(), 'img-responsive thumbnail');
		}	
			
			$carrusel.='
			<div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
             '.$image.'
			<div class="overlay">
				<h1>'.$title.'</h1>
				<div class="separator"></div>
				<a href="'.$slug.'"><h2>READ MORE</h2></a>
			</div>
			</div>';

		} 
                
  $carrusel.=' </div>';  
 	
return $carrusel;

    
}
add_shortcode('carousel', 'shortcode_carousel_evolve');

/*
[inner-content][/inner-content]
 */
function shortcode_inner_content( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'title' => '',
        
            'link_text' => '',
            'link' => '#',
        
            'link2_text' => '',
            'link2' => '#',
        
            'video' => '',
            
            'position' => 'left',
            'class' => ''
    ), $attributes ) );
    
    $return = '<div class="inner-content row inner-box '.$class.'">';
    
    if ($position=="left") {
        $return .= '<div class="col-sm-5">';
        $return .= '<h2>'.$title.'</h2>';
        $return .= do_shortcode_boc($content);
        
        $return .= '<div class="buttons">';
        if (!empty($link_text)) {
            $return .= '<div class="button"><a href="'.$link.'">'.$link_text.'</a></div>';
        }
        if (!empty($link2_text)) {
            $return .= '<div class="button"><a href="'.$link2.'">'.$link2_text.'</a></div>';
        }
        $return .= '</div>';
        
        $return .= '</div>';
        
        $return .= '<div class="col-sm-7">';
        if (!empty($video)) {
            $return .= do_shortcode('[video src="'.$video.'"]');
        } else if (!empty($attributes['src'])) {
            $return .= '<img src="'.$attributes['src'].'" alt="" />';
        }
        $return .= '</div>';
    } else {
        $return .= '<div class="col-sm-7">';
        if (!empty($video)) {
            $return .= do_shortcode('[video src="'.$video.'"]');
        } else if (!empty($attributes['src'])) {
            $return .= '<img src="'.$attributes['src'].'" alt="" />';
        }
        $return .= '</div>';
        
        $return .= '<div class="col-sm-5">';
        $return .= '<h2>'.$title.'</h2>';
        $return .= do_shortcode_boc($content);
        
        $return .= '<div class="buttons">';
        if (!empty($link_text)) {
            $return .= '<div class="button"><a href="'.$link.'">'.$link_text.'</a></div>';
        }
        if (!empty($link2_text)) {
            $return .= '<div class="button"><a href="'.$link2.'">'.$link2_text.'</a></div>';
        }
        $return .= '</div>';
        
        $return .= '</div>';
    }

    $return .= '</div>';
    
    return $return;
}
add_shortcode('inner-content', 'shortcode_inner_content');

/*
[learn-content][/learn-content]
 */
function shortcode_learn_content( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'title' => '',
        
            'link_text' => '',
            'link' => '#',
        
            'text_image' => '',
            'learn_link' => '#',
        
            'position' => 'left',
            'class' => ''
    ), $attributes ) );
    
    $return = '<div class="learn-content row inner-box '.$class.'">';
    
    if ($position=="left") {
        $return .= '<div class="col-sm-5">';
        $return .= '<h2>'.$title.'</h2>';
        $return .= do_shortcode_boc($content);
        
        if (!empty($link_text)) {
            $return .= '<div class="buttons">';
            $return .= '<div class="button"><a href="'.$link.'">'.$link_text.'</a></div>';
            $return .= '</div>';
        }
        
        $return .= '</div>';
        
        $return .= '<div class="col-sm-7 image-content">';
        if (!empty($attributes['src'])) {
            $return .= '<img src="'.$attributes['src'].'" alt="" />';
        }
        
        if (!empty($text_image)) {
            $return .= '<div class="col col-sm-4">';
            $return .= '<a href="'.$learn_link.'" class="academy-icon"></a>';
            $return .= '<p>'.$text_image.'</p>';
            $return .= '</div>';
        }
    
        $return .= '</div>';
    } else {
        $return .= '<div class="col-sm-7 image-content">';
        if (!empty($attributes['src'])) {
            $return .= '<img src="'.$attributes['src'].'" alt="" />';
        }
        
        if (!empty($text_image)) {
            $return .= '<div class="col col-sm-4">';
            $return .= '<a href="'.$learn_link.'" class="academy-icon"></a>';
            $return .= '<p>'.$text_image.'</p>';
            $return .= '</div>';
        }
        
        $return .= '</div>';
        
        $return .= '<div class="col-sm-5">';
        $return .= '<h2>'.$title.'</h2>';
        $return .= do_shortcode_boc($content);
        
        if (!empty($link_text)) {
            $return .= '<div class="buttons">';
            $return .= '<div class="button"><a href="'.$link.'">'.$link_text.'</a></div>';
            $return .= '</div>';
        }
        
        $return .= '</div>';
    }

    $return .= '</div>';
    
    return $return;
}
add_shortcode('learn-content', 'shortcode_learn_content');

/*
[quote-content][/quote-content]
 */
function shortcode_quote_content( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'author' => '',
        
            'position' => 'left',
            'class' => ''
    ), $attributes ) );
    
    $return = '<div class="full-width quote-content">';
    
    $return .= '<div class="row inner-box '.$class.'">';
    
    if ($position=="left") {
        $return .= '<div class="col-sm-5 blockquote">';
        $return .= do_shortcode_boc($content);
        
        $return .= '<h3>'.$author.'</h3>';
        
        $return .= '</div>';
        
        $return .= '<div class="col-sm-7 image-content">';
        if (!empty($attributes['src'])) {
            $return .= '<img src="'.$attributes['src'].'" alt="" />';
        }
        
        $return .= '</div>';
    } else {
        $return .= '<div class="col-sm-7 image-content">';
        if (!empty($attributes['src'])) {
            $return .= '<img src="'.$attributes['src'].'" alt="" />';
        }
        
        $return .= '</div>';
        
        $return .= '<div class="col-sm-5">';
        $return .= do_shortcode_boc($content);
        
        $return .= '<h3>'.$author.'</h3>';
        
        $return .= '</div>';
    }

    $return .= '</div>';
    
    $return .= '</div>';
    
    return $return;
}
add_shortcode('quote-content', 'shortcode_quote_content');

/*
[triflecta_rent][/triflecta_rent]
 */
function shortcode_triflecta_rent( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'buy_link' => '#',
            'learn_link' => '#',
    ), $attributes ) );

    $return = '<div class="inner-content row no-gutter triflecta-box '.$class.'">';
    
    $return .= '<div class="col-sm-6 triflecta-content">';
    $return .= '<img src="'.get_template_directory_uri() . '/images/pic_module.jpg'.'" alt="" />';
    
    $return .= '<div class="col col-sm-4">';
    $return .= '<a href="'.$buy_link.'" class="buy-icon"></a>';
    $return .= '<p>'.esc_html__( 'BUY', '_evolve' ).'</p>';
    $return .= '</div>';
    
    $return .= '<div class="triangle"></div>';
    
    $return .= '</div>';
    
    $return .= '<div class="col-sm-6 triflecta-content">';
    $return .= '<img src="'.get_template_directory_uri() . '/images/pic_learn_module.jpg'.'" alt="" />';
    
    $return .= '<div class="col col-sm-4">';
    $return .= '<a href="'.$learn_link.'" class="learn-icon"></a>';
    $return .= '<p>'.esc_html__( 'LEARN', '_evolve' ).'</p>';
    $return .= '</div>';
    
    $return .= '<div class="triangle"></div>';
    
    $return .= '</div>';
    
    $return .= '</div>';
    
    return $return;
}
add_shortcode('triflecta_rent', 'shortcode_triflecta_rent');

/*
[triflecta_buy][/triflecta_buy]
 */
function shortcode_triflecta_buy( $attributes, $content = null ) {
    extract( shortcode_atts( array(
            'learn_link' => '#',
            'rent_link' => '#',
    ), $attributes ) );

    $return = '<div class="inner-content row no-gutter triflecta-box '.$class.'">';
    
    $return .= '<div class="col-sm-6 triflecta-content">';
    $return .= '<img src="'.get_template_directory_uri() . '/images/pic_learn_module.jpg'.'" alt="" />';
    
    $return .= '<div class="col col-sm-4">';
    $return .= '<a href="'.$learn_link.'" class="learn-icon"></a>';
    $return .= '<p>'.esc_html__( 'LEARN', '_evolve' ).'</p>';
    $return .= '</div>';
    
    $return .= '<div class="triangle"></div>';
    
    $return .= '</div>';
    
    $return .= '<div class="col-sm-6 triflecta-content">';
    $return .= '<img src="'.get_template_directory_uri() . '/images/pic_module.jpg'.'" alt="" />';
    
    $return .= '<div class="col col-sm-4">';
    $return .= '<a href="'.$rent_link.'" class="rent-icon"></a>';
    $return .= '<p>'.esc_html__( 'RENT', '_evolve' ).'</p>';
    $return .= '</div>';
    
    $return .= '<div class="triangle"></div>';
    
    $return .= '</div>';
    
    $return .= '</div>';
    
    return $return;
}
add_shortcode('triflecta_buy', 'shortcode_triflecta_buy');