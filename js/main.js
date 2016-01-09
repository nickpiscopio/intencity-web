var FADE_IN_SPEED = 200;
var footerIsPresent = false;
var tabBarIsPresent = false;
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|IEMobile|webOS|Opera Mini)/);
var isIOS = navigator.userAgent.match(/(iPhone|iPod|iPad)/);
//We store the elementId so we can remove it later
var elementId = "";
var functionCallback = null;
//Stores the popup status. If it is 0, then show the popup.
//If not, hide the popup.
var popupStatus = 0;

/**
 * Displays the loading gif.
 */
function loading() 
{
	$("div.loader").show();  
}

/**
 * Closes the loading gif.
 */
function closeloading() 
{
	$("div.loader").fadeOut('normal');  
}

/**
 * Loads a designated popup.
 * 
 * @param element	The element ID to load.
 */
function loadPopup(element, callback) 
{ 
	elementId = element;
	
	functionCallback = callback;
		
	if(popupStatus == 0) 
	{ 
		// if value is 0, show popup
		$(elementId).fadeIn(500); // fadein popup div
		$(".backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
		$(".backgroundPopup").fadeIn(50); 
		loadPopupFunctionality();
		popupStatus = 1;
	}
}

/**
 * Removes a popup from the screen.
 */
function dismissPopup(dismissCallback) 
{
	if(popupStatus == 1) 
	{ 
		if(dismissCallback == null)
		{			
			$(elementId).fadeOut("normal");
		}
		else
		{			
			$(elementId).fadeOut("normal", function()
			{			
				dismissCallback();
			});  
		}		
		
		$(".backgroundPopup").fadeOut("normal");  
		popupStatus = 0;  // and set value to 0
	}
}

/**
 * Creates the popup functionality, so we can disable a popup on 
 * the close button, esc key, and clicking on the grey background.
 */
function loadPopupFunctionality()
{
	$(".close").click(function()
	{
		dismissPopup(functionCallback);  // function close pop up
	});
	
	$(this).keyup(function(event)
	{
		if (event.which == 27)
		{ // 27 is 'Ecs' in the keyboard
			dismissPopup(functionCallback);  // function close pop up
		}  	
	});
	
	$(".backgroundPopup").click(function() 
	{
		dismissPopup(functionCallback);  // function close pop up
	});
}

/**
 * Setter for elementId.
 * 
 * @param element	The element ID to set.
 */
function setElementId(element)
{
	elementId = element;
}

/**
 * Shows an element that is hidden.
 * 
 * @param elementName	The name of the element that is going to be shown. 
 * 						Needs the "#" for ids and "." for classes.
 */
function show(elementName)
{
	$(elementName).fadeIn(FADE_IN_SPEED);
}

/**
 * Hides an element that is shown.
 * 
 * @param elementName	The name of the element that is going to be shown. 
 * 						Needs the "#" for ids and "." for classes.
 */
function hide(elementName)
{
	$(elementName).fadeOut(FADE_IN_SPEED);
}

/**
 * Shows an element if it is hidden. Hides and element if it is visible.
 * 
 * @param elementName	The name of the element that is going to be shown. 
 * 						Needs the "#" for ids and "." for classes.
 */
function toggle(elementName)
{
	if($(elementName).is(':visible'))
	{
		$(elementName).fadeOut(FADE_IN_SPEED);
	}
	else
	{
		$(elementName).fadeIn(FADE_IN_SPEED);
	}
}

/**
 * Adds or removes a class from a specifed element depending on if it is currently active or not.
 * 
 * @param elementId		The ID of the element to add or remove the class from.
 * 						Needs a "." or "#" to differentiate between a class and an id.
 * @param className		The class name to add or remove from the element.
 */
function toggleClass(elementId, className)
{
	if($(elementId).hasClass(className))
	{
		$(elementId).removeClass(className);
	}
	else
	{
		$(elementId).addClass(className);
	}
}

/**
 * Clears a variable number of elements.
 * 
 * @param fieldNames 	The names of the fields to clear. 
 * 						Must include "#" for an id or "." for a class. 
 * 						Must be separated with a "," with no spaces.
 */
function clearField(fieldNames)
{
	var fields = fieldNames.split(",");
	
	for(var i = 0; i < fields.length; i ++)
	{
		if($(fields[i]).is(':checkbox'))
		{
			$(fields[i]).prop('checked', false);
		}
		else
		{
			$(fields[i]).val('');
		}
	}
}

/**
 * Appends and element.
 * 
 * @param elementName	The name of the element to append. 
 * 						Must include "#" for an id or "." for a class.
 * @param text			The text to add to the element.
 */
function setText(elementName, text)
{
	$(elementName).text(text);
}

/**
 * Loads a page into #centerColumn.
 * 
 * @param page	The page to load.
 */
function loadPage(page)
{
	replaceContent('#centerColumn-changeOut', page + ".php");
}

/**
 * Replaces content on the screen with new content.
 * It will retry if there was an error.
 * 
 * @param elementName	The name of the element that holds the content to be shown. 
 * 						Needs the "#" for ids and "." for classes.
 * @param pageName		The name of the page to be shown.
 */
function replaceContent(elementName, pageName)
{
	$(elementName).fadeOut(FADE_IN_SPEED, function()
	{
		$(elementName).load(pageName, function(response, status, xhr)
		{
			if(status == "error")
			{
				setTimeout(function() 
				{
					replaceContent(elementName, pageName);
			    }, 1500);
			}
			else
			{
				show(elementName);
			}
		});	
	});
}

/**
 * Adds parameters to the URL.
 * 
 * @param parameters	The parameters to add to the URL.
 * @param addToUrl		Boolean value of whether to add to the URL string.
 */
function modifyUrl(parameters, addToUrl)
{
	if(addToUrl)
	{
		window.history.pushState('intencity_page', 'Intencity', window.location.href + "&" + parameters);
	}
	else
	{
		window.history.pushState('intencity_page', 'Intencity', window.location.href.substr(0, window.location.href.lastIndexOf("/")) + "/?" + parameters);
	}
}

/**
 * Hides the footer.
 */
function hideFooter()
{
	if($('#navbarTop h1').is(':visible')) 
	{
		footerIsPresent = false;
		
		hide('#navbarTop');
		hide('#rightColumn');
		hide('#beta');
	}
	else
	{
		footerIsPresent = true;
	}
	
	hide('#footer');
}

/**
 * Shows the footer.
 */
function showFooter()
{
	if(!footerIsPresent)
	{		
		show('#navbarTop');
		show('#rightColumn');
	}
	else
	{
		footerIsPresent = false;
		
		$('#footer').attr('style', function(i, style)
		{
		    return style.replace(/display[^;]+;?/g, '');
		});
		
		show('#footer');
	}
	
	show('#beta');
}

/**
 * This function will remove a class from one div and put it on another 
 * div with the use of .click function.
 * 
 * @param removeActive		Div id that is currently holding the class
 * @param addActive			Div id that you want the class to go to
 * @param switchClass		Name of the class that is being exchanged
 */
function switchClass(removeActive, addActive, switchClass)
{
	$(removeActive).removeClass(switchClass);
	
	$(addActive).addClass(switchClass);
}

/**
 * Converts a string of time to a float.
 * 
 * @param time	The time to convert to a float.
 * 
 * @returns	A converted time to float.
 */
function timeToFloat(time) 
{
	var hoursMinutes = time.split(/[.:]/);
	var hours = parseInt(hoursMinutes[0], 10);
	var minutes = hoursMinutes[1] ? parseInt(hoursMinutes[1], 10) : 0;
	
	return hours + minutes / 60;
}

/**
 * Get's today's date in yyyy MM dd (with hyphens)
 * 
 * @param	date	The date for the user to get.
 * 
 * @returns Returns today's date in yyyy MM dd (with hyphens)
 */
function getDate(date)
{
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	
	if(month < 10)
	{
		month = "0" + month;
	}
	
	if(day < 10)
	{
		day = "0" + day;
	}
	
	return year + "-" + month + "-" + day;
}

/**
 * AJAX call to set the session vaiables for the user.
 * 
 * @param userId		The userId of the person to see.
 * @param email			The email of the user to set.
 * @param accountType	The account type of the user to set.
 * @param pushURL		A boolean value of whether to continue to 
 * 						the designated URL or not.
 * @param callback		The function to execute after the data is posted.
 */
function setSession(userId, email, accountType, pushURL, callback)
{
	var sessionDataString = "";
	
	if(userId != null)
	{
		sessionDataString = "userId=" + userId + "&email=" + email + "&account_type=" + accountType;
	}
	else
	{
		sessionDataString = "email=" + email + "&account_type=" + accountType;
	}
	
	postData("services/set_session.php", sessionDataString, function(data)
	{      
		if(pushURL)
		{
			loadIntencityURL(null);
		}
    	
    	callback();
	});
}

/**
 * Logs the user in.
 * 
 * @param userId		The userId of the person to see.
 * @param email			The email of the user to set.
 * @param accountType	The account type of the user to set.
 * @param pushURL		A boolean value of whether to continue to 
 * 						the designated URL or not.
 * @param callback		The function to execute after the data is posted.
 */
function logInUser(userId, email, accountType, pushURL, callback)
{
	//Gets the last login date for the user.
	postData("services/data.php", "d=LiRURma]E[stFsEa!]CaoDMeH[/0]STtn[[[Eiv']ELLgaeOrWEl'r/&var=" + email, function(data)
	{            
		var objects = jQuery.parseJSON(data);
		
		if(objects[0].LastLoginDate != getDate(new Date()))
		{
			//Sets the last login date to today.
			postData("services/data.php", "d=DTgaA)E/]A[esotD[E!v0]TsSLneREEa'r]UEr[LDCTW[la]PU[Eati!U(HRmi/'&var=" + email, function(data)
			{      
				postData("services/data.php", "d=Lt(a)]LrtUrr0][niT/01]CgPsev']Aaonos'/,&var=" + email, function(data)
				{             
					setSession(userId, email, accountType, pushURL, callback); 
				});
			});
		}
    	else
		{
    		setSession(userId, email, accountType, pushURL, callback);
		} 
	});
}

/**
 * Creates a cookie for the user and puts it in the database.
 * 
 * @param email			The email of the user to set the cookie.
 * @param accountType	The account type of the user.
 */
function setCookie(email, accountType)
{
	//Sets the cookies.
	postData("services/set_cookies.php", "email=" + email, function(data)
	{
		var token = jQuery.parseJSON(data);
		
		//Sets the token in the database for the cookie
		postData("services/data.php", "d=DTTn/Hi]A[eoe!0E[v1]TsSCk'r[m!a']UEr[iev'Ra//]PU[Eoko/aWEEl'r&var=" + token + "," + email , function(data) 
		{
			logInUser(null, email, accountType, true, null);
		});
	});	
}

/**
 * Pushes the Intecity URL and the designated URL string.
 * 
 * @param urlString		The string of parameters following the Intencity URL
 */
function loadIntencityURL(urlString)
{
	if(urlString == null)
	{
		window.location.replace(window.location.href.substr(0, window.location.href.lastIndexOf("/")));
	}
	else
	{
		window.location.replace(window.location.href.substr(0, window.location.href.lastIndexOf("/")) + "/" + urlString);
	}
}

/**
* Displays the specified user.
*
* @param userId		The userId of the user to display.
*/
function loadUser(userId)
{
	window.location.href = "?user=" + userId;
}

/**
 * Does an AJAX POST to a designated URL.
 * 
 * @param postUrl		The URL to POST to.
 * @param dataString	The string of data to post.
 * @param onSuccess		The callback for if the post was successful.
 */
function postData(postUrl, dataString, onSuccess)
{
	$.ajax({
		type: "POST",
		url: postUrl,
		data: dataString,
		success: function(data)
		{	
			onSuccess(data);
		}, 
		error: function (jqXHR, exception) 
		{   
			var opts = this;
    
			setTimeout(function () 
			{
				$.ajax(opts);
			}, 1500);
		}
	});
}

/**
 * Returns the URL variables from the URL string.
 */
function getURLParameter(name)
{
	  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [,""])[1].replace(/\+/g, '%20')) || null;
}

/**
 * Adds a stylesheet to the head if it isn't already there.
 * 
 * @param stylesheetName
 */
function addStyleSheet(stylesheetName)
{
	if(!$('link[href="css/' + stylesheetName + '.css"]').length)
	{
		$('head').append('<link rel="stylesheet" type="text/css" href="css/' + stylesheetName + '.css">');
	}
}


/**
 * This function will resize the TextArea so that it will grow 
 * and shrink depending on how much text is written.
 *
 * @param textArea		id or class name of the text area that you 
 *						want to scale. Use '#' or '.'.
 */
function resizeTextArea(textArea)
{
    $(textArea).css("height","0px");
    
    var scrollHeight = $(textArea).prop("scrollHeight");
    var minHeight = $(textArea).css("min-height").replace("px", "");
    
    $(textArea).css("height",Math.max(scrollHeight, minHeight)+"px"); 	
}

/**
 * This function will select all the equipment.
 */
function selectAllEquipment()
{
	postData("services/data.php", "d=LnREtEp[[BmN]E[umFqnRENeSNLRqpa]CqmNMueWueaIUGP[nm]STit[[p[Eit[OLOYit]EEpeaeOimH[qmnmNT[U[Euee", function(data)
	{             
		var objects = jQuery.parseJSON(data);
	
		if(objects != "FAILURE")
		{
			for(var i = 0; i < objects.length; i++)
			{
				if(!($('#equipmentItem_' + i).hasClass('selected')))
				{
					$('#equipmentItem_' + i).click();
				}
			}
		}
	});
	
	$('#selectAll').css("display", 'none');

	$('#deselectAll').css("display", 'inline-block');
}

/**
 * This function will deselect all the equipment.
 */
function deselectAllEquipment()
{
	postData("services/data.php", "d=LnREtEp[[BmN]E[umFqnRENeSNLRqpa]CqmNMueWueaIUGP[nm]STit[[p[Eit[OLOYit]EEpeaeOimH[qmnmNT[U[Euee", function(data)
	{             
		var objects = jQuery.parseJSON(data);
	
		if(objects != "FAILURE")
		{
			for(var i = 0; i < objects.length; i++)
			{
				if($('#equipmentItem_' + i).hasClass('selected'))
				{
					$('#equipmentItem_' + i).click();
				}
			}
		}
	});
	
	$('#deselectAll').css("display", 'none');

	$('#selectAll').css("display", 'inline-block');
	
}

/**
 * This function will do a check to see if the current selected equipment is all selected or not
 */
function checkEquipment()
{
	postData("services/data.php", "d=LnREtEp[[BmN]E[umFqnRENeSNLRqpa]CqmNMueWueaIUGP[nm]STit[[p[Eit[OLOYit]EEpeaeOimH[qmnmNT[U[Euee", function(data)
	{             
		var objects = jQuery.parseJSON(data);
	
		if(objects != "FAILURE")
		{
			for(var i = 0; i < objects.length; i++)
			{
				if(!($('#equipmentItem_' + i).hasClass('selected')))
				{
					$('#deselectAll').css("display", 'none');

					$('#selectAll').css("display", 'inline-block');
					
					return false;	
				}
			}
			
			$('#selectAll').css("display", 'none');

			$('#deselectAll').css("display", 'inline-block');
		}
	});

	return false;
}

/**
 * This function will set the appropriate height for the called popup.
 * 
 * @param popupCalled	The main popup being called use '#' or '.'
 * @param popupBody	    The body of the popup being called use '#' or '.'
 */
function popupHeight(popupCalled, popupBody)
{
	//changes position to relative so that the height can be read properly
	$(popupBody).css("position", "relative");
	
	var height = $(popupBody).outerHeight(true);
	
	var parsingHeight = parseInt(height, 10);
//	var position = $(popupBody).position();
	
	var positionTop = parseInt($(popupBody).css("top"));
	var positionBottom = parseInt($(popupBody).css("bottom"));
	var pixelSpacing = 11;
	
	var newHeight;
	
	if (popupCalled == '#about')
	{
		newHeight = parsingHeight + (positionTop + positionBottom - pixelSpacing);
	}
	else
	{
		newHeight = parsingHeight + (positionTop + positionBottom);
		if(popupCalled == '#terms-popup')
		{
			var popupMargin = parseInt($(popupBody).css("margin-top"));
			
			newHeight = newHeight - popupMargin;
		}
		if(popupCalled == '#search-resultPopup')
		{
			newHeight++;
		}
	}
	
	//changes the position back to absolute so that it will scroll properly.
	$(popupBody).css("position", "absolute");

	$(popupCalled).css("max-height", newHeight + 'px');
}

/**
* Function that will add the proper effects for the user to be able to focus on what to use in intencity
* 
* currentTutorialElement	The class being called use '#' or '.' for the currentTutorialElement
* nextTutorialElement		The class being called use '#' or '.' for the nextTutorialElement
*/
function addTutorialClips(currentTutorialElement,nextTutorialElement)
{
	//Adds the class to the tutorial Element
	$(nextTutorialElement).addClass('.background-popup');
	
	//Adds z-index to the Element
	$(nextTutorialElement).css('z-index','50');
	$(nextTutorialElement).css('position','relative');

	if(nextTutorialElement == '#menu-button' || nextTutorialElement == '#searchBox')
	{
		$('#header').css('z-index','inherit');
	}
	
	if(currentTutorialElement != null)
	{
		//Removes the class to the tutorial Element
		$(currentTutorialElement).removeClass('.background-popup');
		
		//Resets the z-index to the Element and Position
		$(currentTutorialElement).css('z-index','');
		$(currentTutorialElement).css('position', '');
		
		if(currentTutorialElement == '#menu-button' || currentTutorialElement == '#searchBox')
		{
			$('#header').css('z-index','1');
		}

	}

	$(".tutorialBackground").css("opacity", "0.7"); // css opacity, supports IE7, IE8
	$(".tutorialBackground").fadeIn(50);
	
	show('.tutorialBackground');
	
	if(nextTutorialElement == null)
	{
		$(".tutorialBackground").fadeOut("normal");  
	}
}
