(function ($) {
	
 $(document).ready(function(){

	 
	 if ($.datepicker) {
			
				
				
			$("#course_date").datepicker({ //
				dateFormat: "yy/mm/dd",
				//showOn: "both",
				//buttonImage: JS_base_url+"/js/cal.gif",
				buttonImageOnly: false,
				changeMonth: true,
				changeYear: true
			});
	 }	
	

});

	
}(jQuery));
	
