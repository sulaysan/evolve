<?php

// "do_shortcode" but without the wrapping <p> of Shortcodes
function do_shortcode_boc( $content ) {

    $content = clean_content( $content );
    $content = do_shortcode( shortcode_unautop( $content ) );
    
    return $content;
}

function clean_content( $content ) {

    //$content = preg_replace( '#^<\/p>|^<br />|<p>|<br>$#', '', $content );
    $content = str_replace( '<p></p>', '', $content );
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

    return '<div class="slider-gallery row" id="home-carousel">
  <div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
    <img class="img-responsive thumbnail" src="'. get_template_directory_uri() . '/images/product1.jpg' .'">
    <div class="overlay">
        <h1>EPSON MEDIUM</h1>
        <h1>THROW ZOOM LENS</h1>
        <div class="separator"></div>
        <a href="#"><h2>READ MORE</h2></a>
    </div>
  </div>
  <div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
    <img class="img-responsive thumbnail" src="'. get_template_directory_uri() . '/images/product2.jpg' .'">
    <div class="overlay">
        <h1>EPSON MEDIUM</h1>
        <h1>THROW ZOOM LENS</h1>
        <div class="separator"></div>
        <a href="#"><h2>READ MORE</h2></a>
    </div>
</div>
  <div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
    <img class="img-responsive thumbnail" src="'. get_template_directory_uri() . '/images/product3.jpg' .'">
    <div class="overlay">
        <h1>EPSON MEDIUM</h1>
        <h1>THROW ZOOM LENS</h1>
        <div class="separator"></div>
        <a href="#"><h2>READ MORE</h2></a>
    </div>
  </div>
  <div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
    <img class="img-responsive thumbnail" src="'. get_template_directory_uri() . '/images/product4.jpg' .'">
    <div class="overlay">
        <h1>EPSON MEDIUM</h1>
        <h1>THROW ZOOM LENS</h1>
        <div class="separator"></div>
        <a href="#"><h2>READ MORE</h2></a>
    </div>
  </div>
  <div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
    <img class="img-responsive thumbnail" src="'. get_template_directory_uri() . '/images/product5.jpg' .'">
    <div class="overlay">
        <h1>EPSON MEDIUM</h1>
        <h1>THROW ZOOM LENS</h1>
        <div class="separator"></div>
        <a href="#"><h2>READ MORE</h2></a>
    </div>
  </div>
  <div class="col col-xs-12 col-sm-5 col-md-4 col-lg-3 container-thumbnail">
    <img class="img-responsive thumbnail" src="'. get_template_directory_uri() . '/images/product6.jpg' .'">
    <div class="overlay">
        <h1>EPSON MEDIUM</h1>
        <h1>THROW ZOOM LENS</h1>
        <div class="separator"></div>
        <a href="#"><h2>READ MORE</h2></a>
    </div>
  </div>
</div>
';
}
add_shortcode('carousel', 'shortcode_carousel_evolve');