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
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="site-logo">
                        <?php $site_title = get_bloginfo( 'name' ); ?>
                              <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496.8 170"><title>logo2</title><path d="M404.11,329.24v-23h2.63l7.5,19.73,0,.21,0-.21,7.53-19.73h2.63v23h-2.63V313.1l0-.51-.12.51-6.19,16.14H413l-6.19-16.14-.12-.48,0,.48v16.14Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M447.43,329.24v-23h9.51a27.69,27.69,0,0,0,3.14-.15v2.39h-10v7.71h8.52v2.28h-8.52V327h7.29a27.89,27.89,0,0,0,3.14-.15v2.42Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M482.12,329.24V306.61a47.46,47.46,0,0,1,6.19-.54c5.53,0,10.82,1.73,10.82,11.81,0,7.23-3.86,11.36-9.39,11.36h-7.62Zm6.25-20.93a20,20,0,0,0-3.62.33V327h5c3.86,0,6.76-3.41,6.76-9.09S494.76,308.31,488.36,308.31Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M521.35,329.24v-23H524v23Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M556.39,306.22l8.49,23H562.1l-2.9-7.83h-8.4l-2.87,7.83h-2.78l8.49-23Zm-1.58,4.36-3.17,8.55h6.73l-3.17-8.55a6.4,6.4,0,0,1-.18-1.44A7.34,7.34,0,0,1,554.8,310.59Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M629.07,324.84c0,2.72-3.71,4.79-7.2,4.84C613,329.69,611,323,611,318.24c0-9.33,6.18-12.46,10.7-12.46a9.28,9.28,0,0,1,7.17,3.53L627.12,311a6.83,6.83,0,0,0-5.29-3c-3.23,0-8.1,2.81-8.1,10.19,0,3.64,1.47,9.06,8,9.06,1.76,0,4.81-1.31,4.81-2.72v-4.3h-2.69a6,6,0,0,1-2.72-.39v-2.15a12.08,12.08,0,0,0,2.81.21h5.11Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M652.07,329.24v-23h2.63v.92a9.29,9.29,0,0,1,5.05-1.37c3.77,0,6.13,2.51,6.37,6.58,0,4.69-2.63,6.51-5.2,7.05,2.63,2.12,5,7.56,7.86,9.78v.06h-3.2c-2.6-2.06-5.32-8.67-8.46-9.63H654.7v9.63Zm11.48-16.89a3.94,3.94,0,0,0-4.22-4.22,7.89,7.89,0,0,0-4.63,1.47v7.78h4.42C661,317.34,663.52,316.42,663.55,312.35Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M707.82,317.7c0,9.42-4.81,12-9.53,12-4.39,0-9.51-2.54-9.51-11.93s5.11-12,9.59-12S707.8,308.46,707.82,317.7Zm-16.41,0c0,7.44,3.85,9.71,6.87,9.71,3.29,0,6.87-2.24,6.91-9.66s-3.62-9.74-6.82-9.74S691.42,310.38,691.42,317.7Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M737.75,329.6c-2.54,0-7.68-.84-7.71-7.5V306.22h2.63V322c0,4.63,3.38,5.26,5.08,5.26s5-.74,5.05-5.2V306.22h2.63V322.1C745.41,328.82,740.27,329.6,737.75,329.6Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M768.4,329.24v-23H771v.9a9.93,9.93,0,0,1,4.9-1.35c4.1,0,6.94,3.11,6.94,7.56,0,5.74-2.66,8.73-7.15,8.73a7.94,7.94,0,0,1-4.69-1.55v8.73Zm6.67-21.16a6.82,6.82,0,0,0-4,1.52v8.13a7.21,7.21,0,0,0,4.82,1.94c2.66,0,4.48-2.07,4.48-6.34A4.94,4.94,0,0,0,775.07,308.08Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M344.14,239.18v-.34c0-24.71,17.37-44.41,40.41-44.41,23.88,0,39.08,19.37,39.08,44.59a21.44,21.44,0,0,1-.17,3.34H352.82c1.5,21.21,16.7,33.56,33.4,33.56,13.19,0,22.21-5.84,29.22-13.36l5.68,5c-8.68,9.35-18.87,16-35.23,16C363.51,283.6,344.14,265.73,344.14,239.18ZM414.77,235c-1.17-17.2-11-33.07-30.56-33.07-16.87,0-29.89,14.19-31.4,33.07Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M428,193.42h21.71l23.72,64.8,23.88-64.8h21.21l-36.07,88.84H464.2Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M521.65,237.34V237c0-25.72,20.71-46.59,48.59-46.59,27.72,0,48.27,20.54,48.27,46.26V237c0,25.72-20.71,46.59-48.6,46.59C542.19,283.6,521.65,263.06,521.65,237.34Zm71.81,0V237c0-13.19-9.52-24.71-23.55-24.71-14.53,0-23.21,11.19-23.21,24.38V237c0,13.2,9.51,24.72,23.54,24.72C584.77,261.73,593.46,250.53,593.46,237.34Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M629.69,159.69h25.39V281.6H629.69Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M662.58,192.09h26.89l20,60,20.21-60h26.38l-35.24,90.18h-23Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/><path d="M753.1,236.25v-.33c0-25.55,18.21-46.59,44.25-46.59,29.9,0,43.59,23.21,43.59,48.6,0,2-.16,4.34-.34,6.67H778.31c2.51,11.53,10.53,17.54,21.88,17.54,8.52,0,14.69-2.67,21.71-9.19l14.53,12.86c-8.35,10.36-20.37,16.7-36.57,16.7C773,282.5,753.1,263.64,753.1,236.25Zm63.13-7.51c-1.51-11.36-8.18-19-18.88-19-10.52,0-17.36,7.51-19.37,19Z" transform="translate(-344.14 -159.69)" style="fill:#fff"/></svg>
                        <?php ?>
                </div>
              </a>

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

        <?php  do_action('_evolve_woocommerce_breadcrumb'); ?>
