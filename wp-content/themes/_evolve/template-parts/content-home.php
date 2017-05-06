<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evolve
 */

?>
<!--
<div class="home-hot-links row">
    <div class="col col-sm-4">
        <a href="#" class="rent-icon"></a>
        <p><?php echo esc_html__( 'RENT', '_evolve' )?></p>
    </div>
    <div class="col col-sm-4">
        <a href="#" class="buy-icon"></a>
        <p><?php echo esc_html__( 'BUY', '_evolve' )?></p>
    </div>
    <div class="col last col-sm-4">
        <a href="#" class="learn-icon"></a>
        <p><?php echo esc_html__( 'LEARN', '_evolve' )?></p>
    </div>
</div>

<div class="home-triflecta">
    <div class="triangle">
        <h1>PROVIDING THE<br>BEST GEAR</h1>
        <h2>FOR YOUR GIG</h2>
        <div class="line"></div>
        <p>With the training and support to<br>maximize performance.</p>
    </div>
</div>
-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', '_evolve' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_evolve' ),
				'after'  => '</div>',
			) );
		?>
            
            <div class="inner-content home-learn row scrollreveal">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Learn Area Home") ) : ?>
            <?php endif;?>
            </div>
            
            <div class="inner-content">
                <div class="instagram-title">Instagram Feed<br>@evolve_academy</div>
            </div>
            <div class="inner-content">
                <?php echo do_shortcode('[instagram-feed id="1298469698" num=8 cols=4 showfollow=false]')?>
            </div>
            
	</div><!-- .entry-content -->

	<!--footer class="entry-footer">
		<?php _evolve_entry_footer(); ?>
	</footer--><!-- .entry-footer -->
</article><!-- #post-## -->
