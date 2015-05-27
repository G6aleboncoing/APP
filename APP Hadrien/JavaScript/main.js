 
(function($){  
  setInterval(function(){  
    $("#slideshow ul li:first-child").animate({"margin-left": -900}, 1500, function(){  
        $(this).css("margin-left",0).appendTo("#slideshow ul");  
    });  
  }, 4500);   
})(jQuery);

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
	
	var body = $(document);
	var top = body.scrollTop()
	
if(top!=0)
 $("#header_1").slideUp("slow");
else 
 $("#header_1").slideDown("slow");
	
		
});


$(document).ready(function(){
    $(".li_1").click(function(){    
		$(".li_2").slideToggle("slow");

    });
});

$(document).ready(function(){
    $(".li_2").click(function(){    
		$("#help_section ul p").slideToggle("slow");

    });
});


