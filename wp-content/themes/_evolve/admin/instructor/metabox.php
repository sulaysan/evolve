<?php

if ( ! function_exists( 'evolve_instructor_add_custom_metabox' ) ) {
function evolve_instructor_add_custom_metabox() {

	add_meta_box(
		'instructor_meta',
		__( 'Instructor Details' ),
		'instructor_meta_callback',
		'instructor',
		'normal',
		'core'
	);

}

add_action( 'add_meta_boxes', 'evolve_instructor_add_custom_metabox' );
}

if ( ! function_exists( 'instructor_meta_callback' ) ) {
function instructor_meta_callback( $post ) {
 
	
	wp_nonce_field( basename( __FILE__ ), 'evolve_instructor_nonce' );
	$evolve_instructor_stored_meta = get_post_meta( $post->ID ); ?>
    
	<div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="instructor_job_title" class="dwwp-row-title"><?php _e( 'Job Title', 'evolve' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="instructor_job_title" id="instructor_job_title"
				value="<?php if ( ! empty ( $evolve_instructor_stored_meta['instructor_job_title'] ) ) {
					echo esc_attr( $evolve_instructor_stored_meta['instructor_job_title'][0] );
				} ?>"/>
				
			</div>
		</div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="instructor_bio_title" class="dwwp-row-title"><?php _e( 'Bio Title', 'evolve' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="instructor_bio_title" id="instructor_bio_title"
				value="<?php if ( ! empty ( $evolve_instructor_stored_meta['instructor_bio_title'] ) ) {
					echo esc_attr( $evolve_instructor_stored_meta['instructor_bio_title'][0] );
				} ?>"/>
				
			</div>
		</div>
		<?php 
		$list_class=available_class();
		$my_classes=array();
		if ( ! empty ( $evolve_instructor_stored_meta['instructor_available_class'] ) ) {
			$my_classes= explode(",",$evolve_instructor_stored_meta['instructor_available_class'][0]);
		}
 
		?>
			<div class="meta-row">
			<div class="meta-th">
				<label for="instructor_available_class" class="dwwp-row-title"><?php _e( 'Class', 'evolve' ); ?></label>
			</div>
			<div class="meta-td">
				<select id="instructor_available_class" name="instructor_available_class[]" multiple>
				<?php foreach ($list_class as $c) {?>
				<option value="<?php echo $c["id"];?>" <?php if(in_array($c["id"],$my_classes)){
						   echo " selected";
				}?>><?php echo $c["title"];?></option>
				<?php } ?>
				<select>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="instructor_img_header" class="dwwp-row-title"><?php _e( 'Image Header', 'evolve' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="instructor_img_header" id="instructor_img_header"
				value="<?php if ( ! empty ( $evolve_instructor_stored_meta['instructor_img_header'] ) ) {
					echo esc_attr( $evolve_instructor_stored_meta['instructor_img_header'][0] );
				} ?>"/>
				<input type="button" class="button button-secundary" id="upload_image_button" value="Upload">
				<input type="button" class="button button-secundary" id="remove_image_button" value="Remove">
			</div>
			<?php if ( ! empty ( $evolve_instructor_stored_meta['instructor_img_header'] )  && ($evolve_instructor_stored_meta['instructor_img_header'][0]<>"" )) {
					$img= esc_attr( $evolve_instructor_stored_meta['instructor_img_header'][0] );
				?>
				<div class="meta-td">
				<strong>Preview</strong>
					<br/><br/>
				<div id="preview_header" style="width:680px;overflow:auto; height:300px;overflow:auto;"><img src="<?php echo $img; ?>" id="preview-header" /></div>
				
				
				
			</div>
			<?php
				} ?>
		</div>
	<div class="meta-row">
			<div class="meta-th">
				<label for="instructor_img_body" class="dwwp-row-title"><?php _e( 'Image Body', 'evolve' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="instructor_img_body" id="instructor_img_body"
				value="<?php if ( ! empty ( $evolve_instructor_stored_meta['instructor_img_body'] )  && ($evolve_instructor_stored_meta['instructor_img_body'][0]<>"" )) {
					echo esc_attr( $evolve_instructor_stored_meta['instructor_img_body'][0] );
				} ?>"/>
				<input type="button" class="button button-secundary" id="upload_image_button2" value="Upload">
				<input type="button" class="button button-secundary" id="remove_image_button2" value="Remove">
			</div>	
			<?php if ( ! empty ( $evolve_instructor_stored_meta['instructor_img_body'] ) ) {
					$img= esc_attr( $evolve_instructor_stored_meta['instructor_img_body'][0] );
				?>
				<div class="meta-td">
				<strong>Preview</strong>
				<br/><br/>
				<div id="preview_body" style="width:680px;overflow:auto; height:300px;overflow:auto;"><img src="<?php echo $img; ?>"/></div>
				
				
				
			</div>
			<?php
				} ?>
		</div>

	 </div>  
	<?php
}
}
if ( ! function_exists( 'instructor_meta_save' ) ) {

function instructor_meta_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'evolve_instructor_stored_meta' ] ) && wp_verify_nonce( $_POST[ 'evolve_instructor_stored_meta' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if ( isset( $_POST[ 'instructor_job_title' ] ) ) {
    	update_post_meta( $post_id, 'instructor_job_title', sanitize_text_field( $_POST[ 'instructor_job_title' ] ) );
    }
	if ( isset( $_POST[ 'instructor_bio_title' ] ) ) {
    	update_post_meta( $post_id, 'instructor_bio_title', sanitize_text_field( $_POST[ 'instructor_bio_title' ] ) );
    }
		if ( isset( $_POST[ 'instructor_available_class' ] ) ) {
		$strclasses=implode ( ',' ,  $_POST[ 'instructor_available_class' ] );
    	update_post_meta( $post_id, 'instructor_available_class', sanitize_text_field($strclasses));
    }
	if ( isset( $_POST[ 'instructor_img_header' ] ) ) {
    	update_post_meta( $post_id, 'instructor_img_header', sanitize_text_field( $_POST[ 'instructor_img_header' ] ) );
    }
	if ( isset( $_POST[ 'instructor_img_body' ] ) ) {
		
    	update_post_meta( $post_id, 'instructor_img_body', sanitize_text_field( $_POST[ 'instructor_img_body' ] ) );
    }
	 
 }
add_action( 'save_post', 'instructor_meta_save' );
}



?>