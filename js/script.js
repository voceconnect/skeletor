jQuery(document).ready(function($){

    //Clear the text in the search box on focus
    var default_value = $('#s').val();
    $('#s').click(function(){
        if ($(this).val() == default_value) $(this).val("");
    });
    $('#s').blur(function(){
        if ($(this).val() == "") $(this).val(default_value);
    });

});






















