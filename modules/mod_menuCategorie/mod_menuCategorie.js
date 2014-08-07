		 

jQuery(document).ready(function() {



$(".icon-category" ).click(function(event) {
	event.preventDefault();
	
	if(!$('.icon-category').hasClass('button_categoria_click'))
	{
		$('#menu_cate').stop().animate({width: 'toggle'},'fast');
//		$('#content').css({position: 'relative'});
//		$('#content').stop().animate({left: '21%'},'fast');
		
		$('#ombra_lato').css({ 'box-shadow' : '-25px 0px 15px -20px rgba(0, 0, 0, 0.5) inset' }, "fast");
		$("#ombra_lato").width('10%');
		
//		$('.video_titolo').css({'text-align':'left'}, "fast");
//		$('.video_video').css({'margin-left':'0px'}, "fast");
		
//		$('.video_desc').animate({width:'70%'});
		
	}
	else
	{	
		    $('#menu_cate').stop().animate({width: 'toggle'},'fast');
		    
//		    $('#content').stop().animate({left: '0%'},'fast',function() {
//		    	
//			$('#content').css({position:''});});
		

			$("#ombra_lato").width('0%');
	
//			$('.video_titolo').css({'text-align':'center'}, "fast");
//			$('.video_video').css({'margin-left':'auto'}, "fast");
			
//			$('.video_desc').animate({width:'100%'});
	}

		    $('.icon-category').toggleClass( "button_categoria_click" );

});

//$("#menu_cate").swipe({
//	swipeLeft:function(event, direction, distance, duration, fingerCount) {
//		
//			if($('#button_categoria').hasClass('button_categoria_click'))
//				{
//				$("#button_categoria" ).trigger( "click" );
//				}
//			
//		  }	
//	});

$("#ombra_lato").mouseenter(
		  function() {
				if($('.button_categoria_click').hasClass('button_categoria_click'))
				{
				$(".button_categoria_click").trigger( "click" );
				}

		  });

$("#content").click(
		  function() {
				if($('.button_categoria_click').hasClass('button_categoria_click'))
				{
				$(".button_categoria_click" ).trigger( "click" );
				}

		  });


$( "#menu_cate li a" ).hover(
		  function() {
		    $( this ).find('span').stop().animate({ 'padding-left' : '15px' }, "fast");
		  }, function() {
		    $( this ).find('span').stop().animate({ 'padding-left' : '10px' }, "fast");
		  }
		);


$( "#headertop" ).hover(
		  function() {

		    $('#button_categoria').toggleClass("button_categoria_hover");
		  }, function() {
			
			  $('#button_categoria').toggleClass("button_categoria_hover");
		  }
		);


});