jQuery(document).ready(function() {
	
	jQuery('.video_like,.video_dislike').one("click",function() {
	
   var id_video=jQuery('input#id_video').val(); 
      
    var like=jQuery(this).find("input#input_like").val();
	  dati= {"like":like,"id":id_video};   
	 	console.log(like);
    console.log(id_video);
     jQuery.ajax({
			url: "index.php?option=com_documentary&format=raw&task=video.calcolalike",
			type: "GET",
			data: dati,
			async: true,
			dataType: 'text json',
			success: function(response) {
// 			     div.find('span').html(parseInt(div.find('span').text())+1);	
// 			     var l=parseInt($(".cfinfo-funding-like").find("span").text());
// 			     var dl=parseInt($(".cfinfo-funding-dislike").find("span").text());
// 			     var tot=(l*100)/(l+dl);
// 			     tot=tot.toFixed(2);
// 			     $("#likeperc").html(tot+"%");
// 			     if(f==1)
// 			     {
// 			    	 $(".cfinfo-funding-like").find("img").addClass("hoverl");
// 			    	 $(".cfinfo-funding-dislike").find("img").removeClass("hoverdl");
// 			   	 }
// 			     else if(f==-1)
// 			     {
// 			    	 $(".cfinfo-funding-dislike").find("img").addClass("hoverdl");
// 			    	 $(".cfinfo-funding-like").find("img").removeClass("hoverl");
// 			   	 }
				// aggiorna il numero vicino all'immagine pero la percentuale no :)
         console.log(response);
			  },
			  error: function(richiesta, stato, errore){
				  console.log(richiesta);
				  console.log("Stato: "+stato);
				  console.log("Errore: " +errore);
			  }
				
			})});
		
		
		});
	
