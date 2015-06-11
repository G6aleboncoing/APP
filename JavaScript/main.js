 
/* Slideshow */
(function($){  
  setInterval(function(){  
    $("#slideshow ul li:first-child").animate({"margin-left": -900}, 2000, function(){  
        $(this).css("margin-left",0).appendTo("#slideshow ul");  
    });  
  }, 4500);   
})(jQuery);

//Password box displaying//

$(document).ready(function(){
    $("#login_link").click(function(){
        $("#password_box").css("display","block");

    });
});

// Close password box//

$(document).ready(function(){
    $("#close_button").click(function(){
        $("#password_box").css("display","none");

    });
});

//Scroll header 1//

$(window).scroll(function(){
	
	var body = $(document);
	var top = body.scrollTop()
	
if(top!=0)
 $("#header_1").slideUp("slow");
else 
 $("#header_1").slideDown("slow");
	
		
});

// Slide Aide//

$(document).ready(function(){
	
	
    $(".li_1 h3").click(function(){
		
		$("#help_section ul ul").slideUp("slow");
		$("#help_section ul ul p").slideUp("slow");
		
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown("slow");
		}
    });
});


$(document).ready(function(){
    $(".li_2 h4").click(function(){    
		
		$("#help_section ul ul p").slideUp("slow");
		
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown("slow");
		}

    });
});

//Afficher le numero de telephone sur l'annonce//

$(document).ready(function(){
    $(".view_number").click(function(){
        $("#view_number_1").css("display","none");
		$("#view_number_2").css("display","block");
		$(".view_number").css("cursor","default");

    });
});

//Slide Catégories//

$(document).ready(function(){
	
    $("#categories_section h4").click(function(){
		$(this).next().slideToggle("slow");

    });
	
});



// Vérification mot de passe//

function verify(element1, element2) {
var passed=false

	if (element1.value=='') {
		alert("Veuillez saisir un mot de passe")
		element1.focus()
	}
	
	else if (element2.value==''){
		alert("Veuillez confirmer le mot de passe")
		element2.focus()
	}

	else if (element1.value!=element2.value){
		alert("Les mots de passe saisis sont différents. Veuillez réessayer")
		element1.select()
	}

	else
	passed=true
	return passed
 }
 
 
// mot de passe fort//

$(document).ready(function() {
    $('#mdp, #confirmation_mdp').on('keyup', function() {
 
     if($('#mdp').val() != '' && $('#confirmation_mdp').val() != '' && $('#mdp').val() != $('#confirmation_mdp').val())
            {
               $('#passwordStrength').removeClass().addClass('alert alert-error').html('Mots de passe différents!');
 
            return false;
           }
 
        // Doit avoir des majuscules, minuscules et des chiffres et plus de 8 lettres
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$", "g");
 
        // Doit avoir des majuscules et des minuscules soit des minuscules et des chiffres et plus de 7 lettres
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
 
        // Doit faire plus de 6 lettres
        var weakRegex = new RegExp("(?=.{6,}).*", "g");
 
        if (weakRegex.test($(this).val()) === false) {
            // Si les mot de passe ne match pas
               $('#passwordStrength').removeClass().addClass('alert alert-error').html('Le mot de passe doit faire plus de 6 caractères');
 
        } else if (strongRegex.test($(this).val())) {
            // Si le mot de passe est fort
            $('#passwordStrength').removeClass().addClass('alert alert-success').html('Mot de passe FORT');
        } else if (mediumRegex.test($(this).val())) {
            // Si le mot de passe est moyen
            $('#passwordStrength').removeClass().addClass('alert alert-info').html('Mot de passe MOYEN, Utilise plus de majuscules et de nombres');
        } else {
            // Si le mot de passe est faible
            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Mot de passe FAIBLE, Utilise des majuscules et des nombres');
        }
 
        return true;
	});

});