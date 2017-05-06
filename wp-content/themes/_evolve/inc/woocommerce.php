<?php
add_theme_support( 'woocommerce' );

//Reposition WooCommerce breadcrumb 
function woocommerce_remove_breadcrumb(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}
add_action( 'woocommerce_before_main_content', 'woocommerce_remove_breadcrumb' );

function woocommerce_evolve_breadcrumb(){
    woocommerce_breadcrumb();
}
add_action( '_evolve_woocommerce_breadcrumb', 'woocommerce_evolve_breadcrumb' );

function _evolve_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', '_evolve_change_breadcrumb_delimiter' );

//http://ohsoren.github.io/reorder-single-product-template/
// Remove product category/tag meta from its original position
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// Add product meta in new position
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );

// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) { 
    unset($tabs['reviews']);
    return $tabs;
}

// Lista de Productos sin Cursos
function _evolve_pre_get_posts_query( $q ) {

    if ( ! $q->is_main_query() ) return;
    if ( ! $q->is_post_type_archive() ) return;

    if ( ! is_admin() && is_shop() ) {

        $q->set( 'tax_query', array(array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => array( 'courses' ), // Don't display products in this category on the shop page
                    'operator' => 'NOT IN'
        )));

    }

    remove_action( 'pre_get_posts', 'pre_get_posts' );
}
add_action( 'pre_get_posts', '_evolve_pre_get_posts_query' );

function prefix_post_class( $classes ) {
    if ( 'product' == get_post_type() ) {
        $classes = array_diff( $classes, array( 'first', 'last' ) );
        $classes[]='col-md-6';
    }
    return $classes;
}
add_filter( 'post_class', 'prefix_post_class', 21 );
?>