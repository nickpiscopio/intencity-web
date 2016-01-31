<!DOCTYPE html>
	<head>
		<?php include 'head.php' ?>
	</head>
	<body>
		<!-- Google Analytics -->
		<?php include_once("google_analytics.php") ?>
		
		<!-- Facebook -->
		<div id="fb-root"></div>
		
		<!-- 
			This is the main content area. Swaps out this content with other content for when the user logs in. 
		-->
 		<div id="content-main"></div>
		
		<?php include 'menu.php' ?>
		
		<!-- Dark background to bring the user's attention to a specific element. -->
   		<div class="backgroundPopup"></div>
   		<div class="tutorialBackground"></div>

		<!-- 		
			Starts the session so we can keep use the user information throughout his or her session of using Intencity.
		-->
		<?php 
			define("SESSION_SET", "SESSION_SET");
			define("SESSION_NOT_SET", "SESSION_NOT_SET");
			
			include 'services/start_session.php';
			
			if(isset($_COOKIE['email']) && isset($_COOKIE['cookie_token']) && !isset($_SESSION['email']) && !isset($_SESSION['accountType']))
			{
		?>
				<script id="loginJS" type="text/javascript">
							
					var email = "<?php echo $_COOKIE['email']; ?>";
					var token = "<?php echo $_COOKIE['cookie_token']; ?>";

					//Gets the token from the database.
					postData("services/data.php", "d=LTkoMe[0]E[c,okOrHl/r]CcnpeeRURm!a]SToyoT[[[Eiv']EAuteCinFsWEEa'/&var=" + email, function(data) 
					{
						var object = jQuery.parseJSON(data);
						
						if(object != null && token == object[0].CookieToken)
						{
							logInUser(null, email, object[0].AccountType, false, function()
							{
								replaceContent('#content-main', 'content.php');
							});

							$('#loginJS').remove();
						}
						else
						{
							window.location.href = "demo.html";
						}												
					});
					
				</script>
		<?php 
			}		
			else if(isset($_SESSION['email']) && isset($_SESSION['accountType']))
			{
				include 'url_parameters.php';
				
				if(!empty($userId))
				{
					?>
						<script id="loginJS" type="text/javascript">
							var userId = <?php echo $userId; ?>;
							var email = "<?php echo $_SESSION['email']; ?>";
							var accountType = "<?php echo $_SESSION['accountType']; ?>";

							setSession(userId, email, accountType, false, function()
							{
								replaceContent('#content-main', 'content.php');
							});

							$('#loginJS').remove();
						</script>
					<?php
				}
				else 
				{
					?>							
						<script id="loginJS" type="text/javascript">
							
							var email = "<?php echo $_SESSION['email']; ?>";
							var accountType = "<?php echo $_SESSION['accountType']; ?>";

							setSession(null, email, accountType, false, function()
							{
								replaceContent('#content-main', 'content.php');
							});

							$('#loginJS').remove();
						</script>	
															
					<?php
				}		
			}
			else
			{
		?>
 				<script type="text/javascript">
 					window.location.href = "demo.html";
				</script>
		<?php 
		
			}
		?>
		
<!-- 		<p id="beta" class="element-top element-bottom">Beta</p> -->
	</body>
</html>