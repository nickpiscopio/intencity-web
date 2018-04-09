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
});