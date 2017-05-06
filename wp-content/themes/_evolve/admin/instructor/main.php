<?php
if ( ! function_exists( 'instructor_register_post_type' ) ) {
function instructor_register_post_type() {

	$singular = __( 'Instructor' );
	$plural = __( 'Instructors' );
    
    $plural_slug = str_replace( ' ', '_', $singular );

        //Setup all the labels to accurately reflect this post type.
	$labels = array(
		'name' 					=> $plural,
		'singular_name' 		=> $singular,
		'add_new' 				=> 'Add New',
		'add_new_item' 			=> 'Add Name ' . $singular,
		'edit'		        	=> 'Edit',
		'edit_item'	        	=> 'Edit Item ' . $singular,
		'new_item'	        	=> 'New item ' . $singular,
		'view' 					=> 'view ' . $singular,
		'view_item' 			=> 'view ' . $singular,
		'search_term'   		=> 'Search ' . $plural,
		'parent' 				=> 'Parent ' . $singular,
		'not_found' 			=> 'Not Found ' . $plural,
		'not_found_in_trash' 	=> 'Not Found ' . $plural .' in trash'
	);
	
	//Define all the arguments for this post type.
	$args = array(
		'labels' 			  => $labels,
		'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 9,
        'menu_icon'           => 'dashicons-media-text',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
	//	'capabilities' => $capabilities,
		'supports'       => array( 
        	'title',
			'editor',
			'thumbnail',
			'page-attributes',
        )
	);

     //Create the post type using the above two varaiables.
	register_post_type( 'instructor', $args);
}
add_action( 'init', 'instructor_register_post_type' );
}

/***************************************/

if ( ! function_exists( 'instructor_load_templates' ) ) {
function instructor_load_templates( $original_template ) {

       if ( get_query_var( 'post_type' ) !== 'instructor' ) {

              return $original_template;

       }

       if ( is_archive() || is_search() ) {
		   
		 

               if ( file_exists( get_stylesheet_directory(). '/archive-instructor.php' ) ) {

                     return get_stylesheet_directory() . '/archive-instructor.php';

               } else {

                       return plugin_dir_path( __FILE__ ) . 'templates/archive-instructor.php';

               }

       } elseif(is_singular('instructor')) {
		 

               if (  file_exists( get_stylesheet_directory(). '/single-instructor.php' ) ) {

                       return get_stylesheet_directory() . '/single-instructor.php';

               } else {

                       return  'admin/templates/single-instructor.php';

               }

       }else{
       	return get_page_template();
       }

        return $original_template;


}
add_action( 'template_include', 'instructor_load_templates' );
}
if ( ! function_exists( 'admin_enqueue_scripts' ) ) {
function admin_enqueue_scripts() {
	global $typenow;

	if ( $typenow == 'instructor') {
		 wp_enqueue_media();
		 wp_enqueue_script('media-upload');
		 wp_register_script('my-upload',  get_template_directory_uri()  .'/admin/js/admin.js', array('jquery'),'1.0.0',true);
		 wp_enqueue_script('my-upload');
		wp_enqueue_style( 'admin-css',get_template_directory_uri() .'/admin/css/admin.css');
	}

}
add_action('admin_enqueue_scripts', 'admin_enqueue_scripts' );
}


?>