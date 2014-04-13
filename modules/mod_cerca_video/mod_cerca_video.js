jQuery(document).ready(function() {
	
	jQuery('#cerca_video2').click(function(event) {
		
		if($('#cerca_video').val()=="")
			event.preventDefault();
		});
	 
	});