jQuery(document).ready(function(){

    jQuery.post('https://40.121.65.234:8085/public/option-name', {}, function(response){ 
        console.log(response);  
    });
});