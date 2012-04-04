jQuery(document).ready(function($){

	//Clear the text in the search box on focus
	var default_value = jQuery('#s').val();
	jQuery('#s').click(function(){
		if (jQuery(this).val() == default_value) jQuery(this).val("");
	});
	jQuery('#s').blur(function(){
		if (jQuery(this).val() == "") jQuery(this).val(default_value);
	});

});






















