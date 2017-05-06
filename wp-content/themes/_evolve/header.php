<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Evolve
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
    
    <!--a href="#" class="btn-down">Scroll</a-->
    <span class="btn-down">Scroll</span>
    <a class="chat-icon" data-toggle="tooltip" data-placement="left" title="Contact Us +999999"><span></span></a>
    
	<!--a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_evolve' ); ?></a-->

<?php if ( get_header_image() ): ?>
    <header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
<?php else: ?>
    <header id="masthead" class="site-header" role="banner">
<?php endif; ?>

        <nav id="site-navigation" class="navbar navbar-default_ navbar-fixed-top" role="navigation">
            <div class="navbar-container container">
                
                <?php // Display site icon or first letter as logo ?>
                <div class="site-logo">
                        <?php $site_title = get_bloginfo( 'name' ); ?>
                        <?php
                        if ( has_custom_logo() ):
                                the_custom_logo();
                        else: ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"-->
                                <?php if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php endif; ?>
                                </a>

                        <?php endif; ?>
                </div>

                <!--a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a-->
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                        <span class="sr-only"><?php _e('Toggle navigation', '_s'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a-->
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse-main">

                        <!--ul class="nav navbar-nav"-->

                                <?php if( has_nav_menu( 'primary' ) ) :

                                    wp_nav_menu( array(
                                        'menu'              => 'primary',
                                        'theme_location'  => 'primary',
                                        'depth'             => 2,

                                        //'container'         =>  'div',
                                        //'container_class'   =>  'navbar-collapse collapse dropdown',
                                        //'container_id'      => 'navbar-collapse-main', 

                                        'menu_class'        =>  'nav navbar-nav navbar-left',

                                        'walker'          => new Bootstrap_Nav_Menu(),
                                    ) );

                                    /*
                                        wp_nav_menu( array(
                                            'menu'              => 'primary',
                                            'theme_location'  => 'primary',
                                            'depth'             => 2,
                                            'container'       => false,
                                            'menu_class'      => 'nav navbar-nav',//  'nav navbar-right'
                                            'walker'          => new Bootstrap_Nav_Menu(),
                                            'fallback_cb'     => null,
                                            'items_wrap'      => '%3$s',// skip the containing <ul>
                                            )
                                        );

                                     */

                                    /*
                                    wp_nav_menu( array(
                                        'menu'              => 'primary',
                                        'theme_location'    => 'primary',
                                        'depth'             => 2,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'bs-navbar-collapse',
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker())
                                    );
                                     */
                                else :
                                        wp_list_pages( array(
                                                'menu_class'      => 'nav navbar-nav',//  'nav navbar-right'
                                                'walker'          => new Bootstrap_Page_Menu(),
                                                'title_li'        => null,
                                            )
                                        );
                                endif; ?>

                        <?php 
                        $facebook=get_theme_mod( 'social_facebook', '' );
                        $twitter=get_theme_mod( 'social_twitter', '' );
                        $google_plus=get_theme_mod( 'social_google', '' );
                        $instagram=get_theme_mod( 'social_instagram', '' );

                        if ( $facebook || $twitter || $google_plus || $instagram) :
                        ?>
                        <div class="social-icons-container">
                            <ul id="menu-social-icons" class="nav navbar-nav navbar-right">
                                <?php if ( $facebook ):?>
                                <li>
                                    <a href="<?php echo $facebook ?>" target="_blank" class="fa fa-lg fa-facebook"></a>
                                </li>
                                <?php endif;?>
                                <?php if ( $twitter ):?>
                                <li>
                                    <a href="<?php echo $twitter ?>" target="_blank" class="fa fa-lg fa-twitter"></a>
                                </li>
                                <?php endif;?>
                                <?php if ( $google_plus ):?>
                                <li>
                                    <a href="<?php echo $google_plus ?>" target="_blank" class="fa fa-lg fa-google-plus"></a>
                                </li>
                                <?php endif;?>
                                <?php if ( $instagram ):?>
                                <li>
                                    <a href="<?php echo $instagram ?>" target="_blank" class="fa fa-lg fa-instagram"></a>
                                </li>
                                <?php endif;?>
                            </ul><!-- /#menu-social-icons -->
                        </div><!-- /.social-icons-container -->
                        <?php endif;?>

                                <?php
                                if( has_nav_menu( 'secundary' ) ) :
                                    /* Create a social menu that displays icons for social networks 
                                    * it is special because it needs to integrate with the existing links                
                                    */
                                    wp_nav_menu( array(
                                        'menu'              => 'secundary',
                                        'theme_location'  => 'secundary',
                                        'depth'             => 1,

                                        //'container'         =>  'div',
                                        //'container_class'   =>  'navbar-collapse collapse dropdown',
                                        //'container_id'      => 'navbar-collapse-main', 

                                        'menu_class'        =>  'nav navbar-nav navbar-right',

                                        'walker'          => new Bootstrap_Nav_Menu(),
                                    ) );

                                endif;
                                ?>
                        <!--/ul-->

                        <?php //get_search_form(); ?>

                </div><!-- /.navbar-collapse -->

            </div>
            
	</nav><!-- #site-navigation -->

    </header><!-- #masthead -->

    <div id="content" class="site-content row">
        
        <?php _evolve_breadcrumbs(); ?>
