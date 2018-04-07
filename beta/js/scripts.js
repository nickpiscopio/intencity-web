$(document).ready(function() {

    $("#mce-EMAIL").attr("placeholder", "Enter your email address");


    $('#down').click(function() {
        $('html, body').animate({
            scrollTop: $("#pie").offset().top
        }, 1250);
    });

    $('#beta-sign-up').click(function() {
        $('html, body').animate({
            scrollTop: $("#survey").offset().top
        }, 1250);
    });
});