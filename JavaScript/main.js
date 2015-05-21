<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> parent of 19d8426... New CSS + JS
( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="bg-one"></div><div id="bg-two"></div><div id="bg-three"></div><div id="bg-four"></div>');
});
} )( jQuery );

<<<<<<< HEAD
 
>>>>>>> origin/master
=======

 
>>>>>>> parent of 19d8426... New CSS + JS
 
(function($){  
  setInterval(function(){  
    $("#slideshow ul li:first-child").animate({"margin-left": -900}, 1500, function(){  
        $(this).css("margin-left",0).appendTo("#slideshow ul");  
    });  
  }, 4500);   
<<<<<<< HEAD
})(jQuery);
<<<<<<< HEAD

$(document).ready(function(){
    $("#login_link").click(function(){
        $("#password_box").css("display","block");

    });
});

$(document).ready(function(){
    $("#close_boutton").click(function(){
        $("#password_box").css("display","none");

    });
});

$(window).scroll(function(){
	
	var body = $("body");
	var top = body.scrollTop()
	
if(top!=0)
 $("#header_1").slideUp("slow");
else 
 $("#header_1").slideDown("slow");
	
		
});

=======
})(jQuery);
>>>>>>> origin/master
=======
>>>>>>> parent of 19d8426... New CSS + JS
