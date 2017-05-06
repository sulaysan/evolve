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
<div id="page" class="site">
	<!--a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_evolve' ); ?></a-->

        <?php if ( get_header_image() ): ?>
		<header id="masthead" class="site-header row" style="background-image: url(<?php header_image(); ?>)" role="banner">
	<?php else: ?>
		<header id="masthead" class="site-header row" role="banner">
	<?php endif; ?>

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
                    
                    
		<!--div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div--><!-- .site-branding -->

		<?php
		/*
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_evolve' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		*/
		?>
		
		<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>
                        
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                                <span class="sr-only"><?php _e('Toggle navigation', '_s'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--<a class="navbar-brand" href="#">Brand</a>-->
                        </div>

                        <div class="collapse navbar-collapse" id="navbar-collapse-main">
                                <ul class="nav navbar-nav">
                                        <?php if( has_nav_menu( 'primary' ) ) :
                                                wp_nav_menu( array(
                                                    'theme_location'  => 'primary',
                                                    'container'       => false,
                                                    //'menu_class'      => 'nav navbar-nav',//  'nav navbar-right'
                                                    'walker'          => new Bootstrap_Nav_Menu(),
                                                    'fallback_cb'     => null,
                                                            'items_wrap'      => '%3$s',// skip the containing <ul>
                                                )
                                            );
                                    else :
                                            wp_list_pages( array(
                                                            'menu_class'      => 'nav navbar-nav',//  'nav navbar-right'
                                                            'walker'          => new Bootstrap_Page_Menu(),
                                                            'title_li'        => null,
                                                    )
                                            );
                                        endif; ?>
                                </ul>

                                <?php //get_search_form(); ?>
            
			</div><!-- /.navbar-collapse -->

		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
