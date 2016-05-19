// Fade in slowly
$(window).load(function() {
	loadBackgrounds();
	loadUtilizations();
    setChangeImageListener('#instagram', 'social_media_instagram');
    setChangeImageListener('#twitter', 'social_media_twitter');
    setChangeImageListener('#facebook', 'social_media_facebook');		    
    setChangeImageListener('#youtube', 'social_media_youtube');	
  	$('#wrapper').fadeIn(1000);
});

$(window).unload(function()
{
	hideSpinner();
});

$(document).ready(function()
{
	var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
    var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
    var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
    var isSafari = navigator.userAgent.indexOf("Safari") > -1;
    var is_opera = navigator.userAgent.toLowerCase().indexOf("op") > -1;
    if ((is_chrome)&&(isSafari)) {isSafari=false;}
    if ((is_chrome)&&(is_opera)) {is_chrome=false;}

	$('#wrapper').hide();

	$('#btnDonate').click(function()
	{
		if (!isSafari)
		{
			addSpinner();
		}  		

		$('#donateForm').submit();

		// We retrun false so the screen doesn't refresh.
		return false;
	});
	
	// initiate page scroller plugin
	$('body').pageScroller({
		navigation: '#nav'
	});
});

/**
 * Adds a spinner to the screen.
 */
function addSpinner()
{
	var opts = {
	  lines: 9, // The number of lines to draw
	  length: 4, // The length of each line
	  width: 4, // The line thickness
	  radius: 7, // The radius of the inner circle
	  corners: 1, // Corner roundness (0..1)
	  rotate: 0, // The rotation offset
	  color: '#309ddb', // #rgb or #rrggbb
	  speed: 1, // Rounds per second
	  trail: 55, // Afterglow percentage
	  shadow: false, // Whether to render a shadow
	  hwaccel: false, // Whether to use hardware acceleration
	  className: 'spinner', // The CSS class to assign to the spinner
	  zIndex: 9999, // The z-index (defaults to 2000000000)
	  top: 'auto', // Top position relative to parent in px
	  left: 'auto' // Left position relative to parent in px
	};
	var spinner = new Spinner(opts).spin();
	$("#pageLoader").append(spinner.el);
}

/**
 * Removes the spinner from the page view.
 */
function hideSpinner()
{
	$('#pageLoader').empty();
}

/** 
 * Loads full size div backgrounds
 */
function loadBackgrounds()
{
	var fadeInMillis = 1000;
	$('#sectionMission').backstretch("images/crossfit_woman.jpg", {fade: fadeInMillis});
}

/**
 * Loads the utilization sections.
 */
function loadUtilizations()
{
	var images = [], x = -1;
	images[0] = "images/image_utilization_web_host.svg";
	images[1] = "images/image_utilization_server.svg";
	images[2] = "images/image_utilization_ad_free.svg";
	images[3] = "images/image_utilization_employees.svg";

	var titles = [], x = -1;
	titles[0] = "Web Hosting";
	titles[1] = "Servers";
	titles[2] = "Ad Free";
	titles[3] = "Employees";

	var descriptions = [], x = -1;
	descriptions[0] = "Currently, Intencity’s web host is through NixiHost.com. We want to insure that as we scale, our app continues to run smoothly for our users. This means that we may need another web host in the future.";
	descriptions[1] = "Intencity currently is using a server bundled with its web host, but we wish to switch to a more scalable server structure in the future. Possibly Amazon Web Services?";
	descriptions[2] = "Ads have always been an option for Intencity. We could include moderate ads to counter balance the price of development. However, we understand this isn’t the most popular solution among users.";
	descriptions[3] = "Intencity employs a small group of developers passionate about a few things: fitness and making the world a better place. These developers have left secure jobs in pursuit of helping others and work on Intencity full time, so a small percentage of contributions will go towards the livelihood of Intencity’s employees.";

	var length = images.length;
	for (var i = 0; i < length; i++)
	{
		$('#utilizations').append('<div class="row">' +

      									'<div class="twelve columns">' +

											'<div class="utilization">' +

												(i > 0 ? '<div class="divider colorPrimary"></div>' : '') +

												'<div' + (i == 0 ? ' id="firstUtilization" ' : '') + 'class="utilizationDescription-wrapper">' +

													'<img src="' + images[i] + '">' +

													'<div class="description rightFloat">' +
														'<h2>' + titles[i] + '</h2>' +
														'<p>' + descriptions[i] + '</p>' +
													'</div>' +

												'</div>' +

											'</div>' +

										'</div>' +

									'</div>');
	}
}