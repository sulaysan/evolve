<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _evolve
 */

?>

<article id="instructor-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
            <?php 
                    $id=$post->ID;
                    $instructor_img_header = get_post_meta( $id, 'instructor_img_header', true );
                    $instructor_img_body = get_post_meta( $id, 'instructor_img_body', true );
                    $instructor_bio_title = get_post_meta( $id, 'instructor_bio_title', true );
                    $instructor_job_title = get_post_meta( $id, 'instructor_job_title', true );
            ?>
            <?php echo '<img src="'.$instructor_img_header.'">'; ?>

            <div class="entry-content-box">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php echo '<h2>'.$instructor_job_title.'</h2>' ?>
            </div>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
            <?php echo '<img src="'.$instructor_img_body.'">'; ?>
            <div class="entry-content-box">
		<?php echo '<h1>'.$instructor_bio_title.'</h1>'; ?>
		<?php the_content(); ?>
            </div>
 
	</div><!-- .entry-content -->
        
        <?php
        
        echo '<h1>'.esc_html__( 'AVAILABLE CLASSES', '_evolve' ).'</h1>';
        
        //carrusel de clases disponibles
        echo (do_shortcode('[carousel_available_class id="'.$id.'"]'));
        
        //carrusel de instructores
        echo (do_shortcode('[carousel_instructor count="10"]'));
        ?>

	<!--footer class="entry-footer">
		<?php _evolve_entry_footer(); ?>
	</footer--><!-- .entry-footer -->
</article><!-- #post-## -->
