<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evolve
 */

get_header(); ?>

<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

                <?php
                echo do_shortcode('[rev_slider alias="equipment"]');

//			while ( have_posts() ) : the_post();
//
//				get_template_part( 'template-parts/content', 'page' );
//
//				// If comments are open or we have at least one comment, load up the comment template.
//				if ( comments_open() || get_comments_number() ) :
//					comments_template();
//				endif;
//
//			endwhile; // End of the loop.
                ?>

        </main><!-- #main -->
</div><!-- #primary -->
        
<article>

    <?php // Display blog posts
    $temp = $wp_query; $wp_query= null;
    $wp_query = new WP_Query(); $wp_query->query('posts_per_page=5' . '&paged='.$paged);
    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

    <div class="row col-md-6">
        
        <div class="col-md-6">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="col-md-6">
            <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
        </div>
        
    </div>
    
    <?php endwhile; ?>

    <?php if ($paged > 1) { ?>

    <!--nav id="nav-posts">
            <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
            <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
    </nav-->

    <?php } else { ?>

    <!--nav id="nav-posts">
            <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
    </nav-->

    <?php } ?>

    <?php wp_reset_postdata(); ?>

</article>

<?php
//get_sidebar();
get_footer();
