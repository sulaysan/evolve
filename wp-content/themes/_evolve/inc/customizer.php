<?php
/**
 * Evolve Theme Customizer
 *
 * @package Evolve
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _evolve_customize_register( $wp_customize ) {
        /*
        $wp_customize->remove_control("header_image"); 
        $wp_customize->remove_section("colors");
        $wp_customize->remove_section("background_image");
         */

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        
        // Social Section
        $custom_section='_evolve_social';
        $wp_customize->add_section( $custom_section , array(
            'title'      => __( 'Social', '_evolve' ),
            'priority'   => 30,
        ) );
        
        // Facebook
        $custom_setting='social_facebook';
        $wp_customize->add_setting( $custom_setting , array(
                'type' => 'theme_mod', // or 'option'
                //'capability' => 'edit_theme_options',
                //'theme_supports' => '', // Rarely needed.
                'default' => '',
                'transport' => 'refresh', // or postMessage
                //'sanitize_callback' => '',
                //'sanitize_js_callback' => '', // Basically to_json.
        ) );
        
        $wp_customize->add_control( $custom_setting , array(
                                        'label'    => 'Facebook',
                                        'section'  => $custom_section,
                                        'settings' => $custom_setting,
                                        'type'     => 'text',
                                        'default'   => '',
        ) );
        
        // Twitter
        $custom_setting='social_twitter';
        $wp_customize->add_setting( $custom_setting , array(
                'type' => 'theme_mod', // or 'option'
                //'capability' => 'edit_theme_options',
                //'theme_supports' => '', // Rarely needed.
                'default' => '',
                'transport' => 'refresh', // or postMessage
                //'sanitize_callback' => '',
                //'sanitize_js_callback' => '', // Basically to_json.
        ) );
        
        $wp_customize->add_control( $custom_setting , array(
                                        'label'    => 'Twitter',
                                        'section'  => $custom_section,
                                        'settings' => $custom_setting,
                                        'type'     => 'text',
                                        'default'   => '',
        ) );
        
        // GooglePlus
        $custom_setting='social_google';
        $wp_customize->add_setting( $custom_setting , array(
                'type' => 'theme_mod', // or 'option'
                //'capability' => 'edit_theme_options',
                //'theme_supports' => '', // Rarely needed.
                'default' => '',
                'transport' => 'refresh', // or postMessage
                //'sanitize_callback' => '',
                //'sanitize_js_callback' => '', // Basically to_json.
        ) );
        
        $wp_customize->add_control( $custom_setting , array(
                                        'label'    => 'Google+',
                                        'section'  => $custom_section,
                                        'settings' => $custom_setting,
                                        'type'     => 'text',
                                        'default'   => '',
        ) );
        
        // GooglePlus
        $custom_setting='social_instagram';
        $wp_customize->add_setting( $custom_setting , array(
                'type' => 'theme_mod', // or 'option'
                //'capability' => 'edit_theme_options',
                //'theme_supports' => '', // Rarely needed.
                'default' => '',
                'transport' => 'refresh', // or postMessage
                //'sanitize_callback' => '',
                //'sanitize_js_callback' => '', // Basically to_json.
        ) );
        
        $wp_customize->add_control( $custom_setting , array(
                                        'label'    => 'Instagram',
                                        'section'  => $custom_section,
                                        'settings' => $custom_setting,
                                        'type'     => 'text',
                                        'default'   => '',
        ) );
        
}
add_action( 'customize_register', '_evolve_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _evolve_customize_preview_js() {
	wp_enqueue_script( '_evolve_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '_evolve_customize_preview_js' );
