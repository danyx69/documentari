		 

jQuery(document).ready(function() {
	

var cat=jQuery('#menu_cate img').width();
jQuery('#menu_cate li').height(cat*9/16);

$('#menu_cate').hide();


$( ".moduletable_categorie" ).click(function() {
	$('#menu_cate').slideToggle();
});

});