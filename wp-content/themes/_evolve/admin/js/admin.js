(function ($) {
	
 $(document).ready(function(){
	 var mediaUploader;
	 var mediaUploader2;
 
jQuery('#upload_image_button').on('click',function(e) {
		e.preventDefault();
		
		if (mediaUploader){
			
			mediaUploader.open();
			return;
			
		}
		
		mediaUploader=wp.media.frames.file_frame=wp.media({
			title: 'Choose a Header Image for Instructor',
			button:{
				text: 'Choose an Image'
			},
			multiple: false
			
		});
		
		mediaUploader.on('select',function() {
			attachment=mediaUploader.state().get('selection').first().toJSON();
			jQuery('#instructor_img_header').val(attachment.url);
			img_prev="<img src='"+attachment.url+"'/>";
			jQuery('#preview_header').html(img_prev);		
	});	
		

});

	


jQuery('#remove_image_button').on('click',function() {
	jQuery('#instructor_img_header').val("");  

 return false;
});


jQuery('#upload_image_button2').click(function(e) {
		e.preventDefault();
		
		if (mediaUploader2){
			mediaUploader2.open();
			return;
		}
		mediaUploader2=wp.media.frames.file_frame=wp.media({
			title: 'Choose a Body Image for Instructor',
			button:{
				text: 'Choose an Image'
			},
			multiple: false
			
		});
		
		mediaUploader2.on('select',function() {
			attachment=mediaUploader2.state().get('selection').first().toJSON();
			jQuery('#instructor_img_body').val(attachment.url);
			img_prev="<img src='"+attachment.url+"'/>";
			jQuery('#preview_body').html(img_prev);		
	});	
		

});


jQuery('#remove_image_button2').click(function() {
	jQuery('#instructor_img_body').val("");  

 return false;
});
	

});

	
}(jQuery));
	
