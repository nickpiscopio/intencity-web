<div id="menu">
	
	<div class="container">

		<div id="menuContainer" class="shadow">
		
			<a class="menu-icon">
				<img id="mobile-menu-settings" onclick="toggleMenu();" src="images/mobile/icon_settings.png"/>
			</a>	
			
			<!-- IMPLEMENTING LATER -->
<!-- 			<div id="menu-notifications"> -->
<!-- 				<div id="title"> -->
<!-- 					<h2>Notifications</h2> -->
<!-- 				</div> -->
<!-- 				<div id="notifications"> -->
<!-- 					<a id="notification-popup_"> -->
<!-- 						<div id="notification-container_" class="notification-container"> -->
<!-- 							<div class="notification-layout"> -->
<!-- 								<h3 id="notification-poster_" class="notification-poster">Who posted goes here:</h3> -->
<!-- 								<p id="notification-posted_" class="notification-posted">What the poster did goes here.</p> -->
<!-- 								<p id="notification-time_" class="notification-time">Date and time goes here</p> -->
<!-- 							</div> -->
<!-- 						</div> -->
<!-- 					</a> -->
<!-- 					<a id="notification-popup_"> -->
<!-- 						<div id="notification-container_" class="notification-container"> -->
<!-- 							<div class="notification-layout"> -->
<!-- 								<h3 id="notification-poster_" class="notification-poster">Who posted goes here:</h3> -->
<!-- 								<p id="notification-posted_" class="notification-posted">What the poster did goes here.</p> -->
<!-- 								<p id="notification-time_" class="notification-time">Date and time goes here</p> -->
<!-- 							</div> -->
<!-- 						</div> -->
<!-- 					</a> -->
<!-- 				</div> -->
<!-- 			</div> -->
			
			<div id="container-profileImage">
				<a><img id="menu-profileImage" class="profilePicture"/></a>
				<a id="editProfile" class="element-top element-bottom clearFloat"/>Edit</a>
				<input type="file" id="button-profilePic" name="profilePic" accept="image/*">
				<p id="container-profileImageP">Profile</p>
			</div>
			
			<div id="container-settings">	
				<a class="menu-icon">
					<img id="menu-settings" src="images/web/icon_settings.png"/>
				</a>	
				<p id="container-settingsP">Settings</p>
			</div>
			
			<div id="menu-nav">
				<div id="container-info">	
					<a id="menu-button-about" class="menu-icon"><img id="menu-info" src="images/mobile/icon_info.png"/></a>
				</div>
				
				<div id="container-info">	
					<a id="menu-button-terms" class="menu-icon"><img id="menu-info" src="images/mobile/icon_terms.png"/></a>
				</div>
				
				<div id="container-feedback">	
					<a id="menu-button-feedback" class="menu-icon"><img id="menu-feedback" src="images/mobile/icon_feedback.png"/></a>
				</div>
				
				<!-- IMPLEMENTING LATER -->
<!-- 				<div id="container-rate">	 -->
<!-- 					<a class="menu-icon"><img id="menu-rate" src="images/mobile/icon_rate.png"/></a> -->
<!-- 				</div> -->
				
				<div id="container-like">	
					<a id="menu-button-socialNetwork" class="menu-icon"><img id="menu-like" src="images/mobile/icon_like.png"/></a>
				</div>
				
				<div id="container-logOut">	
					<a href="logout.php" class="menu-icon">
						<img id="menu-logOut" src="images/web/icon_log_out.png"/>
						<img id="mobile-menu-logOut" src="images/mobile/icon_log_out.png"/>
					</a>
						
					<p id="container-logOutP">Log Out</p>
				</div>
			</div>
			
			<div id="arrow-menu" class="arrow-up white"></div>
		</div>
		<div id="menuToggler" onclick="toggleMenu();"></div>			
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function()
	{	
		$("#editProfile").click(function()
		{	
		    document.getElementById('button-profilePic').click();
		});

		$('#button-profilePic').on('change', function()
		{
			var file = $('#button-profilePic').get(0).files;

			// Create a formdata object and add the files
			var data = new FormData();
			
			$.each(file, function(key, value)
			{
				data.append(key, value);
			});

			$.ajax({
				url: 'services/upload_file.php?&file',
				type: 'POST',
		        data: data,
		        cache: false,
		        dataType: 'json',
		        processData: false, // Don't process the files
		        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		        success: function(data, textStatus, jqXHR)
		        {
		        	if(typeof data.error === 'undefined')
		        	{
		        		//Adds the user's profile picture to the database.
		        		postData("services/data.php", "d=SeElRe)a'cuai'E'I]E[Td(,UdTE'm,RTa'da,R/a/']RNUMaD,,pASeCA)nlsm/A)/0)]ITOraitLieU/lUEo(o/lCT'r,]NI[seimaeMayVL(i/D(,ctp/e/UD(,v)'&var=" + file[0].name, function(data)
						{             
		        			var object = jQuery.parseJSON(data);

				 			if(object != "FAILURE")
							{
				 				getCurrentUserProfile();
				 				getUserProfile();
							}
							else
							{
								alert("Couldn't submit profile picture at this time. Try again later.");
							}  
						});
		        	}
		        	else
		        	{
		        		// Handle errors here
		        		console.log('ERRORS: ' + data.error);
		        	}
		        },
		        error: function(jqXHR, textStatus, errorThrown)
		        {
		        	var opts = this;
				    
			    	setTimeout(function () 
					{
				      $.ajax(opts);
				    }, 1500);
		        }
		    });
		});
			
		$('#container-profilePic, #editProfile').mouseover(function() 
		{		
			if(!$('#editProfile').is(':visible'))
			{
				show('#editProfile');
			}
		});

		$('#container-profilePic').mouseout(function() 
		{
			if($('#editProfile').is(':hover'))
			{
				console.log('hover');
			}
			else if($('#editProfile').is(':visible'))
			{
				hide('#editProfile');
			}		  
		});
		
		$("#menu-button-feedback").click(function()
		{		
			hideMenu();
			
			showFeedback();

			return false;
		});

		$("#menu-button-about").click(function()
		{
			hideMenu();

			showAbout();

			return false;
		});

		$("#menu-button-socialNetwork").click(function()
		{
			hideMenu();

			showSocialNetwork();

			return false;
		});

		$("#menu-button-terms").click(function()
		{
			hideMenu();

			showTerms();

			return false;
		});
				

		//Button click to load the News Feed.
		$("#menu-profileImage").click(function()
		{
			loadIntencityURL(null);
		});

		//Button click to load the settings.
		$("#menu-settings").click(function()
		{
			toggle('#menu');
			
			loadSettings();
					
			return false;
		});
		
		//Button click to load the settings.
		$("#mobile-menu-settings").click(function()
		{
			loadSettings();
					
			return false;
		});
		
		/*
		*This is for when the notification is clicked it will go to the notification that the user selected
		*/
		$('#notification-popup_').click(function() 
		{
// 			alert("notification was clicked: " + "#notification-popup_");
		});
		
		$('#container-profileImage, #container-settings, #container-logOut').mouseover(function()
		{
			var elementId = "#" + $(this).attr("id") + "P";
			
			$(elementId).addClass('darkGrey');
		});

		$('#container-profileImage, #container-settings, #container-logOut').mouseout(function()
		{
			var elementId = "#" + $(this).attr("id") + "P";
			
			$(elementId).removeClass('darkGrey');
		});	

		/**
		* Loads the settings if they aren't already visible.
		*/
		function loadSettings()
		{			
			if(!$('#settings').is(':visible'))
			{
				replaceContent('#centerColumn-changeOut', 'settings.php'); 
			}
		}
	});
</script>
