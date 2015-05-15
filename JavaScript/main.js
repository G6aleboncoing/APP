( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="bg-one"></div><div id="bg-two"></div><div id="bg-three"></div><div id="bg-four"></div>');
});
} )( jQuery );

 
 
(function($){  
  setInterval(function(){  
    $("#slideshow ul li:first-child").animate({"margin-left": -900}, 1500, function(){  
        $(this).css("margin-left",0).appendTo("#slideshow ul");  
    });  
  }, 4500);   
})(jQuery);