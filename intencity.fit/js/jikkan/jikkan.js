// Fade in slowly
$(window).load(function() {
	loadBackgrounds();
  	$('#wrapper').fadeIn(1000);
});

$(document).ready(function(){

	$('#wrapper').hide();
	
	// initiate page scroller plugin
	$('body').pageScroller({
		navigation: '#nav'
	});
});

/** 
 * Loads full size div backgrounds
 */
function loadBackgrounds()
{
	var intFadeIn = 1000;
	$('#sectionMission').backstretch("images/crossfit_woman.jpg", {fade: intFadeIn});
}