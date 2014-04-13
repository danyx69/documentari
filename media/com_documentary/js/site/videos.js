
// primo metedo per creare una funzione Jquery style plugin
jQuery.fn.extend({

	setAutoHeight : function(){
		
		 var w=jQuery('#videos').width();
		 var w2=jQuery('#videos .video_container').outerWidth();
	

		 
		 
		 var mar=(w*0.4)/100;

		 
		 jQuery('.video_container').height((w2-mar-1)*9/16);
		 
		 var ht=jQuery('.video_container').find('.video_title').height();
		// console.log(ht+'titolo_prima');
		 jQuery('.video_container').find('.front').find('.video_title').css('font-size',ht-1+'px');
		 
		 
		 
		 //jQuery('.video_container').find('.back').find('.video_description').find('.video_title').css('font-size',ht-1+'px');
		 //jQuery('.video_container').find('.video_description').css('font-size',ht+'px');		
		 //jQuery.fn.setHeight;
	}

});

var BrowserDetect = 
{
    init: function () 
    {
        this.browser = this.searchString(this.dataBrowser) || "Other";
        this.version = this.searchVersion(navigator.userAgent) ||       this.searchVersion(navigator.appVersion) || "Unknown";
    },

    searchString: function (data) 
    {
        for (var i=0 ; i < data.length ; i++)   
        {
            var dataString = data[i].string;
            this.versionSearchString = data[i].subString;

            if (dataString.indexOf(data[i].subString) != -1)
            {
                return data[i].identity;
            }
        }
    },

    searchVersion: function (dataString) 
    {
        var index = dataString.indexOf(this.versionSearchString);
        if (index == -1) return;
        return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
    },

    dataBrowser: 
    [
        { string: navigator.userAgent, subString: "Chrome",  identity: "Chrome" },
        { string: navigator.userAgent, subString: "MSIE",    identity: "Explorer" },
        { string: navigator.userAgent, subString: "Firefox", identity: "Firefox" },
        { string: navigator.userAgent, subString: "Safari",  identity: "Safari" },
        { string: navigator.userAgent, subString: "Opera",   identity: "Opera" }
    ]

};
BrowserDetect.init();










jQuery(document).ready(function() {

	 jQuery(this).find(".play_link").hide();
	   
   	  jQuery(".flip_n").on('flipdiv',function() {
   		
   		
   		 
   		  if(BrowserDetect.browser=='Other')
   		  {
   			
   			 if(!jQuery(this).nextAll(".video").find(".back").hasClass('flipped_ie'))
   				 { 			
		   			 jQuery(this).nextAll(".video").find(".back").addClass('flipped_ie');
		   			 jQuery(this).nextAll(".video").find(".back").css('transform','rotateY(0deg)');
		   			 jQuery(this).nextAll(".video").find(".front").fadeOut(500);
		   			 jQuery(this).nextAll(".video").find(".back").fadeIn(500);
   				 }
   			 else
   				 {
	   			 jQuery(this).nextAll(".video").find(".back").css('transform','rotateY(180deg)');
	   			 jQuery(this).nextAll(".video").find(".back").removeClass('flipped_ie');
	   			 jQuery(this).nextAll(".video").find(".back").fadeOut(500); 
	   			 jQuery(this).nextAll(".video").find(".front").fadeIn(500);
   				 }
   		  
   		  }
   		  else
   		  	{	
   			  
   			  jQuery(this).nextAll(".video").toggleClass('flipped');
   			   
   		  	}
   		      jQuery(this).nextAll(".play").toggle();
   		      jQuery(this).nextAll(".play_link").toggle();
   		      jQuery(this).nextAll(".cate_link").toggle();
   		      
   		   
   		   $(this).nextAll(".video").find(".back").find(".video_description").dotdotdot({
    			watch: 'window'
    		});
   	  });
   	  	
	});


jQuery(document).ready(function() {
	
	jQuery( this ).find(".info").hide();

	 jQuery('.video_container').hover(
			  function() {
				     
				      jQuery( this ).find(".link_mini").css('text-shadow','0px 0px 10px rgb(32, 162, 68)');
			      
			  		  jQuery( this ).find(".front .video_title").css('text-shadow','0px 0px 10px rgb(32, 162, 68)'); 
			  		  
			  		  jQuery( this ).find(".flip_n").stop().animate({width: '40px'},function(){
					  jQuery( this ).find(".info").show();
					  });
			  		  jQuery( this ).find(".flip_n").trigger("flipdiv");

			  		  
				  }, function() {

//					  if(!jQuery( this ).find(".video").hasClass('flipped') && !jQuery( this ).find(".video").find(".back").hasClass('flipped_ie'))
//						  {
//						 
//						  }
						  jQuery( this ).find(".info").hide();
					  	  jQuery( this ).find(".flip_n").stop(1,0).animate({width: '11px'});
					  	  jQuery( this ).find(".front .video_title").css('text-shadow','0px 0px 0px');
	    				  
					  	  jQuery( this ).find(".link_mini").css('text-shadow','0px 0px 0px');
					  	  
					  	  //jQuery( this ).find(".flip_n").show();
					  	  
					  	  jQuery( this ).find(".flip_n").trigger("flipdiv");
					  	
				  }
			     );
	 
	});





jQuery(document).ready(function() {
	
	jQuery(window).scroll(function() {
		 
		var scroll=jQuery(document).scrollTop();
		//console.log(scroll);
			if(scroll>0)
			{
			jQuery('header').css('box-shadow','0px 0px '+10+'px 0px');
			}
			else
			{
			jQuery('header').css('box-shadow','0px 0px 0px 0px');
			}
		});
	 
	});

//jQuery(document).ready(function() {
//	
//
// 	  jQuery( ".tutto" ).click(function() {
// 		
// 		 jQuery( ".flip_n" ).trigger( "flipdiv" );	
// 		
// 	  });
//	 
//	});

jQuery(document).ready(jQuery.fn.setAutoHeight);
jQuery(window).resize(jQuery.fn.setAutoHeight);



