$(document).ready(function()
{	
	var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    var new_ie = ua.indexOf('Trident/');

    if (msie > -1 || (new_ie > -1))      // If Internet Explorer, return version number
    {
		window.location.href = "browser_not_supported.html";
	}
			
	//Loads the register content to the main content area.
	//When that is finished it loads the rest of the items.
	$('#content-register').load('register.php', function()
	{
		/**
		 * Validates the register form and then does an AJAX POST.
		 * Returns to the user if the email address is already taken.
		 */
		$("#form-register").submit(function()
		{
			var firstName = $('#firstName').val();
			var lastName = $('#lastName').val();
			var email = $('#email').val();
			var confirmEmail = $('#confirmEmail').val();
			var password = $('#password').val();
			var confirmPassword = $('#confirmPassword').val();

			var toReplace = /\+/g;
			var replaceWith = '%2B';

			email = email.replace(toReplace, replaceWith);
			confirmEmail = confirmEmail.replace(toReplace, replaceWith);
			
			var dataString = 'first_name='+ firstName + '&last_name=' + lastName + '&email=' + email + '&password=' + password;
			
			var emailsMatch = false;
			var passwordsMatch = false;

			if(email != confirmEmail)
			{
				setText('#register .error-email', "Emails do not match.");
				
				$('#email').addClass('error');
				$('#confirmEmail').addClass('error');
			}
			else
			{
				setText('#register .error-email', "");
				
				$('#email').removeClass('error');
				$('#confirmEmail').removeClass('error');
				
				emailsMatch = true;
			}
			
			if(password != confirmPassword)
			{
				setText('#register .error-password', "Passwords do not match.");
				
				$('#password').addClass('error');
				$('#confirmPassword').addClass('error');
			}
			else
			{
				setText('#register .error-password', "");
				
				$('#password').removeClass('error');
				$('#confirmPassword').removeClass('error');
				
				passwordsMatch = true;
			}
			
			if(emailsMatch && passwordsMatch)
			{
				show('#loader-button-register');

				postData("services/account.php", dataString, function(data)
				{	
					var object = jQuery.parseJSON(data);
					
		        	if(object == "Email already exists")
	        		{
		        		setText('#register .error-email', "Email already exists.");
		        		
		        		$('#email').removeClass('error');
		    			$('#confirmEmail').removeClass('error');
		        		
		        		hide('#loader-button-register');
	        		}
		        	else
	        		{		        		
		        		logInUser(null, email, 'N', true, null);
	        		}
				});			    
			}
			
			return false;
		});
		
		/**
		 * Validates the register form and then does an AJAX POST.
		 * Returns to the user if the email address is already taken.
		 */
		$("#form-signIn").submit(function(event)
		{
			var email = $('#signInEmail').val();
			var password = $('#signInPassword').val();
			
			var dataString = 'email=' + email + '&password=' + password;
			
			show('#loader-button-signIn');
			
			postData("services/user_credentials.php", dataString, function(data)
			{		        	
				setText('#signIn .error-email', "");
        		setText('#signIn .error-password', "");
        		
        		$('#signInEmail').removeClass('error');
    			$('#signInPassword').removeClass('error');

	        	var objects = jQuery.parseJSON(data).split(",");
	        	
	        	if(objects[0] == "Valid credentials")
        		{        				    			
	    			var accountType = objects[1].split(":");

    				if($('#signInRememberMe').is(":checked"))
					{
    					setCookie(email, accountType[1]);
					}
    				else
					{
    					logInUser(null, email, accountType[1], true, null);
					}	    				
        		}
	        	else if(objects[0] == "Could not find email")
        		{
        			setText('#signIn .error-email', "Could not find email.");
        		
	        		$('#signInEmail').addClass('error');
	        		
	        		hide('#loader-button-signIn');
        		}
	        	else if(objects[0] == "Invalid password")
        		{
	        		setText('#signIn .error-password', "Invalid password.");
	        		
	        		$('#signInPassword').addClass('error');
	        		
	        		hide('#loader-button-signIn');
        		}
			});
		    
		    return false;
		});
	});
});