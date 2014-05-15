jQuery(document).ready(function() {
	
	jQuery(window).scroll(function() {
		 
		var scroll=jQuery(document).scrollTop();
		console.log(scroll);
			if(scroll>0)
			{
			jQuery('#headertop').css('box-shadow','0px 0px '+10+'px 0px');
			}
			else
			{	
			jQuery('#headertop').css('box-shadow','0px 0px 0px 0px');
			}
			
			if(scroll>70)
				{
				//jQuery('#headerbottom').slideUp('100');
				//jQuery('#menu_cate').animate({'top': '41px' },'100');
				}
			else
				{
				//jQuery('#headerbottom').stop(1,1).slideDown('200');
				//jQuery('#menu_cate').stop(1,1).animate({'top': '70px' },'200');
				}
		});
	 
	});