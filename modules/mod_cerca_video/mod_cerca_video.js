jQuery(document).ready(function() {
	
	jQuery('#cerca_video2').click(function(event) {
		
		var key = jQuery.trim(jQuery('#cerca_video').val());
		
		if(key=="")
			event.preventDefault();
		});
	 
	});