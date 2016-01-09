<div class="container">
	<div class="callout calloutLeft">
		<img src="images/web/marketing_image1.png"/>
		<h1>Keep track of your exercises</h1>
		<p>Create your own routines or let Intencity do it for you</p>
	</div>
	
	<div class="callout calloutRight">
		<img src="images/web/marketing_image3.png"/>
		<h1>Earn money</h1>
		<p>Stay motivated by potentially earning money for using Intencity</p>
	</div>
</div>

<div class="container">

	<div class="callout calloutLeft">
		<img src="images/web/marketing_image2.png"/>
		<h1>Learn about new exercises</h1>
		<p>Explore user generated exercises as well as Intencity's own library</p>
	</div>
	
	<div class="callout calloutRight">
		<img src="images/web/marketing_image4.png"/>
		<h1>Be social</h1>
		<p>Follow your friends and share your exercises with them</p>
	</div>
</div>

<div class="clearFloat"></div>

<div id="getStartedWrapper" >
	<a id="btnGetStarted" class="button element">Get Started Now!</a>
</div>
<div id="wrapper-availableOnMobile"></div>

<!-- REGISTER SECTION START -->    
    <div id="register"> 
    	
        <div class="close"></div>
		<div id="popup_content"> <!--your content start-->
           <div class="title popup">
				<h1>Register</h1>
			</div>
			<p class="error error-email"></p>
			<p class="error error-password"></p>
		
			<form id="form-register" action="">
			
				<input id="firstName" class="element-top" type="text" name="first_name" placeholder="first name" required />
				<input id="lastName" class="element-center" type="text" name="last_name" placeholder="last name" required />
				<input id="email" class="element-center" type="email" name="email" placeholder="email" required />
				<input id="confirmEmail" class="element-center" type="email" name="confirm_email" placeholder="confirm email" required />
				<input id="password" class="element-center" type="password" name="password" placeholder="password" required />
				<input id="confirmPassword" class="element-bottom" type="password" name="confirm_password" placeholder="confirm password" required />
				<div id="terms">
					<input id="cbTerms" type="checkbox" name="terms" required>I agree to the <a id="termsLink-register" class="termsLink">Terms of Use</a>.
					
					<div id="termsOfUse-register" class="termsOfUse">
						<h1>Terms of Use</h1>
						<ul class="touArticles tabbed"></ul>
					</div>
				</div>
				<div id="wrapper-registerSubmit">
					<div id="loader-button-register" class="loader loader-button loader-popup"></div>
					<button id="submit" class="button element">Create Account</button>
				</div>
			</form>
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->
<!-- REGISTER SECTION END -->	
    
<script type="text/javascript">
	$(document).ready(function() 
	{
		//Gets the articles for the Terms of Use.
// 		postData("services/check_android.php", "", function(data)
// 		{             
// 			var response = jQuery.parseJSON(data);

			var isUIWebView = /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent);
			var isAndroidWebView = false;

// 			if(response == "INTENCITY_APP")
// 			{
// 				isAndroidWebView = true;
// 			}  

// 			console.log("response: " + response);
// 			console.log("isAndroid: " + isAndroidWebView);

			if(!isUIWebView && !isAndroidWebView)
			{
				$('#wrapper-availableOnMobile').append('<hr id="mobileAppHR">' +
														'<p id="header-mobileApp">Available for free on:</p>' +
														'<div id="getStartedMobile">' +
															'<a type="iOS" href="https://itunes.apple.com/us/app/intencity/id786650617?mt=8" target="_blank"><img src="images/web/apple-logo.svg"/></a>' +
															'<a href="https://play.google.com/store/apps/details?id=com.intencity.intencity" target="_blank"><img id="googlePlay" src="images/web/android-logo.svg"/></a>' +
														'</div>');
			}
// 		});		
		
		//Gets the articles for the Terms of Use.
		postData("services/data.php", "d=L[rO[]E[tMeRY]CrlRsDBD]STiFT[RI]EAceO[mE[", function(data)
		{             
			var articles = jQuery.parseJSON(data);

			if(articles != "FAILURE")
			{
				var amountOfArticles = articles.length;
				
				$('#touArticles').empty();
				
				for(var i = 0; i < amountOfArticles; i++)
				{
					$('.touArticles').append('<li>' + articles[i].Article + '</li>');
				}
			}  
		});
		
		$("#btnGetStarted").click(function()
		{		
			loadPopup('#register', null);
			
			$('#firstName').focus(); 
			
			hide('#signIn');

			return false;
		});

		$("#termsLink-register").click(function()
		{		
			show("#termsOfUse-register");

			return false;
		});
	});
</script>