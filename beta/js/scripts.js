$(document).ready(function() {
	let scrollSpeed = 1250;

	let btnSignUp = '.btn-sign-up';

	let navHeight = $("#nav").height() * 2;

	// This is the materializedcss intitialization.
	$(".dropdown-trigger").dropdown();

    $("#mce-EMAIL").attr("placeholder", "Enter your email address");

    $("#down").click(function() {
        $("html, body").animate({
            scrollTop: $("#recommendation").offset().top - navHeight
        }, scrollSpeed);
    });
   
	$(btnSignUp).click(function() {
        $("html, body").animate({
            scrollTop: $("#survey").offset().top - navHeight
        }, scrollSpeed);
    });

	// This is the button click for the sign up button.
    $('#btn-sign-up').click(function() {
    	// This registers that the complete registration was clicked.
        fbq('track', 'CompleteRegistration');
    });
});

$(function() {
	// This swaps out the old background image of the ".hero" class with the new one when it loads.
    $(".img_high_res").off().on("load", function() {
         var id = $(this).attr("id");
         var highres = $(this).attr("src").toString();
         var target = ".hero";

         // $(target).css("transition", "background-image 250ms ease-in");
         $(target).css("background-image", "url(" + highres + ")");
  	});
});