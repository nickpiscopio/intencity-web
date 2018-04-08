$(document).ready(function() {

    $("#mce-EMAIL").attr("placeholder", "Enter your email address");


    $('#down').click(function() {
        $('html, body').animate({
            scrollTop: $("#recommendation").offset().top - ($("#nav").height() * 2)
        }, 1250);
    });

    $('#btn-sign-up').click(function() {
        $('html, body').animate({
            scrollTop: $("#survey").offset().top
        }, 1250);
    });
});