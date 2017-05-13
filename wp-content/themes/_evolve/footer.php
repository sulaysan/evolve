<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Evolve
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
            <div class="container-fluid">

                <div class="col-sm-8">
                    <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-1' ); ?>
                    <?php endif;?>

                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php endif;?>

                    <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-3' ); ?>
                    <?php endif;?>
                </div>
                <div class="footer-social-container col-sm-4">

                    <?php
                        $facebook=get_theme_mod( 'social_facebook', '' );
                        $twitter=get_theme_mod( 'social_twitter', '' );
                        $google_plus=get_theme_mod( 'social_google', '' );
                        $instagram=get_theme_mod( 'social_instagram', '' );

                        if ( $facebook || $twitter || $google_plus || $instagram) :
                        ?>
                        <ul id="footer-social-icons" class="nav navbar-nav navbar-default">
                            <?php if ( $facebook ):?>
                            <li>
                                <a href="<?php echo $facebook ?>" target="_blank" class="fa fa-2x fa-facebook"></a>
                            </li>
                            <?php endif;?>
                            <?php if ( $twitter ):?>
                            <li>
                                <a href="<?php echo $twitter ?>" target="_blank" class="fa fa-2x fa-twitter"></a>
                            </li>
                            <?php endif;?>
                            <?php if ( $google_plus ):?>
                            <li>
                                <a href="<?php echo $google_plus ?>" target="_blank" class="fa fa-2x fa-google-plus"></a>
                            </li>
                            <?php endif;?>
                            <?php if ( $instagram ):?>
                            <li>
                                <a href="<?php echo $instagram ?>" target="_blank" class="fa fa-2x fa-instagram"></a>
                            </li>
                            <?php endif;?>
                        </ul><!-- /#footer-social-icons -->
                        <?php endif;?>

                </div>


                    <!--div class="site-info">
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', '_evolve' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', '_evolve' ), 'WordPress' ); ?></a>
                            <span class="sep"> | </span>
                            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', '_evolve' ), '_evolve', '<a href="https://automattic.com/" rel="designer">ATS & Enigma</a>' ); ?>
                    </div--><!-- .site-info -->

            </div>

            <!--a href="#top" class="go-top">top</a-->
            <p id="btn-top" class=""><a href="#" class="go-top"></a></p>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
