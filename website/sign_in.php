<!DOCTYPE html>
	<head>
		<title>Intencity | Sign In</title>
		<meta charset="UTF-8">
		
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/sign_in.css">
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:300,400'>

		<link rel="shortcut icon" href="images/favicon.ico">
		
		<!-- JavaScript -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/sign_in.js"></script>

	</head>	
	<body>
	
		<!-- Google Analytics -->
		<?php include_once("google_analytics.php"); ?>

		<div class="container">
		
			<div id="signInHeader">
			
			<!-- NEED TO IMPLEMENT LATER -->
 			<a id="btnDemo" class="button element-bottom">Try it</a>
				
			<a id="btnSignIn" class="button element-bottom">Sign In</a>
				
			</div>
				
			<div class="clearFloat"></div>
			<img id="heroLogo" src="images/web/logo.png"/>
			
			<div id="signIn"> 
			
				<div class="close"></div>
				<div id="popup_content">
		           <div class="title popup">
						<h1>Sign In</h1>
					</div>
				
						<p class="error error-email"></p>
						<p class="error error-password"></p>
					
						<form id="form-signIn" action="">
						
							<input id="signInEmail" class="element-top" type="text" name="email" placeholder="email" required />
							<input id="signInPassword" class="element-bottom" type="password" name="password" placeholder="password" required />
							
							<p id="forgotPassword"><a id="button-signIn-forgotPassword">Forgot Password?</a> or <a id="button-signIn-register">Register here</a> for Intencity.</p>
							
							<input id="signInRememberMe" class="rememberUser" type="checkbox" name="rememberMe"/><p id="rememberText">Remember me</p>
							
							<div id="wrapper-signInSubmit">
								<div id="loader-button-signIn" class="loader loader-button loader-popup"></div>
								<button id="submit" class="button element">Sign In</button>
							</div>
						</form>
		        </div>
		    
		    </div>
		    
		    <div id="dialog-passwordEmailed"> 
			    <div class="close"></div>
			    <div id="popup_content">
			       <div class="title popup">
						<h1>Success!</h1>
					</div>
					<p>Your password has been emailed to you. Please check your email.</p>
			    </div> 
			</div>
			
			 <div id="dialog-trial" class="dialog"> 
			    <div class="close"></div>
			    <div id="popup_content">
			       <div class="title popup">
						<h1>Trial Account</h1>
					</div>
					<p>You are creating a trial account. Trial accounts get deleted after 1 week.</p>
					
					<form id="form-trial">
						<div id="terms">
							<input id="cbTerms" type="checkbox" name="terms" required>I agree to the <a id="termsLink-trial" class="termsLink">Terms of Use</a>.
						
							<div id="termsOfUse-trial" class="termsOfUse">
								<h1>Terms of Use</h1>
								<ul class="touArticles tabbed"></ul>
							</div>
						</div>
						
						<div id="wrapper-trialConfirmation" class="space">
							<div id="loader-button-trial" class="loader loader-button loader-popup"></div>
							<button id="submit" class="button element">Create trial account</button>
						</div>
					</form>
					
			    </div> 
			</div>
			
			<div id="content-register"></div>
		</div>
   		<div class="backgroundPopup"></div>
		
	</body>	
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$("#btnSignIn").click(function()
			{		
				loadPopup('#signIn', null);
				
				$('#signInEmail').focus();
	
				clearField('#signInEmail,#signInPassword'); 
	
				setText('#signIn .error-email', ''); 
				setText('#signIn .error-password', '');	
	
				$('#signInEmail').removeClass('error'); 
				$('#signInPassword').removeClass('error');
	
				return false;
			});

			$("#btnDemo").click(function()
			{		
				loadPopup('#dialog-trial', null);
	
				return false;
			});

			$("#form-trial").submit(function()
			{		
				show('#loader-button-trial');

				var date = new Date();
				var email = "user" + date.getTime() + "@intencity.com";
				var accountType = "T";
				
				postData("services/account.php", 'first_name=Anonymous&last_name=User&email=' + email + '&password=intencityuser&account_type=' + accountType, function(data)
				{	
					setCookie(email, accountType);
				});		
	
				return false;
			});

			//Detects if the operating system is windows
			if (navigator.appVersion.indexOf("Win")!=-1)
			{
// 				var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
				
// 				if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
// 				{
// 				     //Do Firefox-related activities
// 					$('#button-exerciseLog-back').css("padding",'0.75em 0.625em 0.625em');
// 				}
				$('.loader-popup').css("top",'1.5em');
				$("#loader-button-addRoutine").css("top",'1.5em');
			}
			
			$("#button-signIn-forgotPassword").click(function()
			{		
				var email = $('#signInEmail').val();
				var getPasswordString = "email=" + email;
	
				if(email == "")
				{
					setText('#signIn .error-email', 'Please enter your email.'); 
					
					$('#signInEmail').addClass('error'); 
				}
				else
				{
					show('#loader-button-signIn');
	
					$('#wrapper-signInSubmit #submit').text("Generating password...");

					//Emails the user their forgotten password.
					postData("services/forgot_password.php", getPasswordString, function(data)
					{             
						var object = jQuery.parseJSON(data);
						
				 		if(object == "SUCCESS")
				 		{				 			
				 			dismissPopup(null);

				 			loadPopup('#dialog-passwordEmailed', null);

				    		setTimeout(function()
					        { 
				    			dismissPopup(null); 
				    		}, 4500);
				 		}
				 		else
				 		{
				 			setText('#signIn .error-email', "Your email wasn't found. Please register for Intencity."); 
							
							$('#signInEmail').addClass('error'); 
				 		}

				 		hide('#loader-button-signIn');

				 		$('#wrapper-signInSubmit #submit').text("Sign In");
					});
				}
			});
	
			$("#button-signIn-register").click(function()
			{		
				show('#register'); 
				
				$('#firstName').focus(); 
	
				hide('#signIn');
	
				setElementId('#register');
	
				return false;
			});

			$("#termsLink-trial").click(function()
			{		
				show('#termsOfUse-trial');
	
				return false;
			});
		});
	</script>
</html>