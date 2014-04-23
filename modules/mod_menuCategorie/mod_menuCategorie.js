		 

jQuery(document).ready(function() {

//var cat=jQuery('#menu_cate img').width();
//jQuery('#menu_cate li').height(cat*9/16);
//
//$('#menu_cate').hide();


$("#button_categoria" ).click(function() {
	if(!$('#button_categoria').hasClass('button_categoria_click'))
	{
		$('#menu_cate').stop().animate({width: 'toggle'},'fast');
		$('#content').css({position: 'relative'});
		$('#content').stop().animate({left: '26%'},'fast');
		//$("#videos").width('75%');
		$('#ombra_lato' ).css({ 'box-shadow' : '-25px 0px 15px -20px rgba(0, 0, 0, 0.5) inset' }, "fast");
		$("#ombra_lato").width('10%');
	}
	else
	{	
		$('#menu_cate').stop().animate({width: 'toggle'},'fast');
		$('#content').stop().animate({left: '0%'},'fast',function() {
			$('#content').css({position: ''});
		  });
		

		$("#ombra_lato").width('0%');

		
	}

	$('#button_categoria').toggleClass( "button_categoria_click" );
	//jQuery.fn.setAutoHeight();
});

$("#menu_cate").swipe({
	swipeLeft:function(event, direction, distance, duration, fingerCount) {
		
			if($('#button_categoria').hasClass('button_categoria_click'))
				{
				$("#button_categoria" ).trigger( "click" );
				}
			
		  }	
	});

$("#ombra_lato").mouseenter(
		  function() {
				if($('#button_categoria').hasClass('button_categoria_click'))
				{
				$("#button_categoria" ).trigger( "click" );
				}

		  });



$( "#menu_cate li" ).hover(
		  function() {
		    $( this ).stop().animate({ 'padding-left' : '15px' }, "fast");
		  }, function() {
		    $( this ).stop().animate({ 'padding-left' : '10px' }, "fast");
		  }
		);


$( "header" ).hover(
		  function() {

		    $('#button_categoria').toggleClass("button_categoria_hover");
		  }, function() {
			  console.log(1);
			  $('#button_categoria').toggleClass("button_categoria_hover");
		  }
		);


});