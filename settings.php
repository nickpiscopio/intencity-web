<script type="text/javascript">	
	addStyleSheet("settings");
	addStyleSheet("reported");
	addStyleSheet("fitness_log");
</script>
<div id="settings">
	<hr>
	<h1 id="settingsHeader">Settings</h1>
	<?php 
		include 'services/start_session.php';
		include 'services/check_session.php';

		if($_SESSION['accountType'] == 'A')
		{
	?>
			<div id="admin_settings">
				<?php
					include 'feedback_reported_user.php';
					include 'approved_exercises_admin.php';
					include 'add_exercise_admin.php';
				?>
				<div id="add_exercise_settings">
					<button id="add_exercise_settings_" class="button element-bottom element-top centerText add_exercise_settings">
						<h2 id="feedbackSummiter_feedback_" class="addExercise centerText">Manage Exercise</h2>
					</button>
				</div>
				<div id="exercise_review_settings">
					<div class="title centerText">
						<h1>Exercise Review</h1>
					</div>
					<button id="exercise_review_" class="exercise_review button centerText">
						<p id="exerciseName_review_" class="settings_leftColumn">Pullups</p>
						<p id="exerciseDate_review_" class="settings_centerColumn">Date</p>
						<p id="exerciseSubmitter_review_" class="settings_rightColumn">User's Name</p>
					</button>
				</div>
				<div id="video_report_settings">
					<div class="title centerText">
						<h1>Video Reports</h1>
					</div>
					<button id="video_report_" class="button centerText">
						<p id="video_reported_" class="settings_leftColumn">Offender</p>
						<p id="video_report_date_" class="settings_centerColumn">12/12/2013</p>
						<p id="video_reporter_" class="settings_rightColumn">Who Reported</p>
					</button>
				</div>
				<div id="photo_report_settings">
					<div class="title centerText">
						<h1>Photo Reports</h1>
					</div>
					<button id="photo_report_" class="button centerText">
						<p id="photo_reported_" class="settings_leftColumn">Offender</p>
						<p id="photo_report_date_" class="settings_centerColumn">12/12/2013</p>
						<p id="photo_reporter_" class="settings_rightColumn">Who Reported</p>
					</button>
				</div>
				<div id="people_report_settings">
					<div class="title centerText">
						<h1>People Reports</h1>
					</div>
					<button id="people_report_" class="people_report button centerText">
						<p id="people_reported_" class="settings_leftColumn">Offender</p>
						<p id="people_report_date_" class="settings_centerColumn">12/12/2013</p>
						<p id="people_reporter_" class="settings_rightColumn">Who Reported</p>
					</button>
				</div>
				<div id="feedback_settings">
					<div class="title centerText">
						<h1>Feedback</h1>
					</div>
					<button id="feedback_settings_" class="button centerText">
						<p id="feedbackSummiter_feedback_" class="settings_leftColumn">Who gave feedback</p>
						<p id="feedbackDate_feedback_" class="settings_centerColumn">12/12/2013</p>
					</button>
				</div>
				<hr>
			</div>	
	<?php 
		}				
	?>
	
	<div id="user_settings">
	<!-- IMPLEMENTING LATER -->
<!-- 		<div id="notification_settings"> -->
<!-- 			<div class="title centerText"> -->
<!-- 				<h1>Notifications Settings</h1> -->
<!-- 			</div> -->
<!-- 			<div class="listItem"> -->
<!-- 				<p class="settings_leftColumn">Email me when:</p>	 -->
<!-- 			</div> -->
<!-- 			<button id="notification_commentReceive" class="button centerText multiHoverable"><p>I recive a comment</p></button> -->
<!-- 			<button id="notification_videoReviewed" class="button centerText multiHoverable"><p>One of my videos was reviewed</p></button> -->
<!-- 			<button id="notification_approvalStatus" class="button centerText multiHoverable"><p>My exercise's approval status has changed</p></button> -->
<!-- 			<button id="notification_newFollower" class="button centerText multiHoverable"><p>I received a new follower</p></button> -->
<!-- 			<button id="notification_newsletter" class="button centerText element-bottom multiHoverable"><p>Intencity has a new newsletter</p></button> -->
<!-- 		</div> -->
<!-- 		<div id="privacy_settings"> -->
<!-- 			<div class="title centerText"> -->
<!-- 				<h1>Privacy Settings</h1> -->
<!-- 			</div> -->
<!-- 			<div class="listItem"> -->
<!-- 				<p class="privacy_settings settings_leftColumn">Anyone can search for you</p> -->
<!-- 				<div id="searchablePrivacy" class="settings_centerColumn"> -->
<!-- 					<a id="privacy_searchable" class="hoverable element-top element-bottom"><p>Yes</p></a> -->
<!-- 					<a id="pricacy_nonsearchable" class="hoverable element-top element-bottom"><p>No</p></a> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<div class="listItem"> -->
<!-- 				<p class="privacy_settings  settings_leftColumn">Anyone can follow you</p> -->
<!-- 				<div id="followablePrivacy" class="settings_centerColumn"> -->
<!-- 					<a id="privacy_followable" class="hoverable element-top element-bottom"><p>Yes</p></a> -->
<!-- 					<a id="pricacy_nonfollowable" class="hoverable element-top element-bottom"><p>No</p></a> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<div class="listItem"> -->
<!-- 				<p class="privacy_settings  settings_leftColumn">Remind me to share on social networks</p> -->
<!-- 				<div id="followablePrivacy" class="settings_centerColumn"> -->
<!-- 					<a id="postable_social" class="hoverable element-top element-bottom"><p>Yes</p></a> -->
<!-- 					<a id="nonpostable_social" class="hoverable element-top element-bottom"><p>No</p></a> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<div id="privacy_settingCenter"> -->
<!-- 				<div class="listItem"> -->
<!-- 					<p class="settings_leftColumn">Who can view your page?</p> -->
<!-- 					<div id="vieablePrivacy" class="settings_centerColumn"> -->
<!-- 						<a id="privacy_pageViewable_everyone" class="hoverable element-top element-bottom"><p>Everyone</p></a> -->
<!-- 						<a id="pricacy_pageViewable_followers" class="hoverable element-top element-bottom"><p>My followers</p></a> -->
<!-- 						<a id="pricacy_pageViewable_self"class="hoverable element-top element-bottom"><p>Only me</p></a> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 				<div class="listItem"> -->
<!-- 					<p class=" settings_leftColumn">Who can view your media?</p> -->
<!-- 					<div id="mediaPrivacy" class="settings_centerColumn"> -->
<!-- 						<a id="privacy_mediaViewable_everyone" class="hoverable element-top element-bottom"><p>Everyone</p></a> -->
<!-- 						<a id="pricacy_mediaViewable_followers" class="hoverable element-top element-bottom"><p>My followers</p></a> -->
<!-- 						<a id="pricacy_mediaViewable_self" class="hoverable element-top element-bottom"><p>Only me</p></a> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 				<div class="listItem"> -->
<!-- 					<p class="settings_leftColumn">Who can post comments?</p> -->
<!-- 					<div id="commentPrivacy" class="settings_centerColumn"> -->
<!-- 						<a id="privacy_pageComments_everyone" class="hoverable element-top element-bottom"><p>Everyone</p></a> -->
<!-- 						<a id="pricacy_pageComments_followers" class="hoverable element-top element-bottom"><p>My followers</p></a> -->
<!-- 						<a id="pricacy_pageComments_self" class="hoverable element-top element-bottom"><p>Only me</p></a> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 				<div class="listItem element-bottom"> -->
<!-- 					<p class="settings_leftColumn">Who can see your age?</p> -->
<!-- 					<div id="agePrivacy" class="settings_centerColumn"> -->
<!-- 						<a id="privacy_pageViewableAge_everyone" class="hoverable element-top element-bottom"><p>Everyone</p></a> -->
<!-- 						<a id="pricacy_pageViewableAge_followers" class="hoverable element-top element-bottom"><p>My followers</p></a> -->
<!-- 						<a id="pricacy_pageViewableAge_self" class="hoverable element-top element-bottom"><p>Only me</p></a> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div id="login_settings"> -->
<!-- 			<div class="title centerText"> -->
<!-- 				<h1>Login Settings</h1> -->
<!-- 			</div> -->
<!-- 			<div class="listItem element-bottom"> -->
<!-- 				<p class="settings_leftColumn">I want to see after logging in:</p> -->
<!-- 				<div id="settingsLogin" class="settings_centerColumn"> -->
<!-- 					<a id="login_settings_newsFeed" class="hoverable element-top element-bottom"><p>News Feed</p></a> -->
<!-- 					<a id="login_settings_fitnessLog" class="hoverable element-top element-bottom"><p>Fitness Log</p></a> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div id="submitted_exercises"> -->
<!-- 			<div class="title centerText"> -->
<!-- 				<h1>Summitted Exercises</h1> -->
<!-- 			</div> -->
<!-- 			<button id="summitted_review_" class="button centerText"> -->
<!-- 				<p id="summittedName_review_" class="settings_leftColumn">Pullups</p> -->
<!-- 				<p id="summittedDate_review_" class="settings_centerColumn">12/12/2013</p> -->
<!-- 				<p id="summittedStatus_review_" class="settings_rightColumn">Status</p> -->
<!-- 			</button> -->
<!-- 		</div> -->
		<div id="current_equipment_settings">
			<div class="title centerText">
				<h1>Available equipment:</h1>
				<a id="selectAll" class="rightFloat"><p id="selectAllText" class="equipmentSelect">all</p></a>
				<a id="deselectAll" class="rightFloat"><p id="deselectAllText" class="equipmentSelect">none</p></a>
			</div>
			<div id="equipmentList"></div>
			<div>
				<div id="loader-button-exerciseSurvey-submit" class="loader loader-button"></div>
				<button id="button-exerciseSurvey-submit" class="button element-bottom listItem">Submit</button>
			</div>
		</div>
		<hr>
	</div>
	<a id="changePassword"><p id="button-changePassword">Change my password<p></a>
	<a id="deleteAccount"><p id="button-delete-account">Delete my account<p></a>
	
	<div id="dialog-changePassword" class="dialog"> 
	    <div class="close"></div>
	    <div id="popup_content"> <!--your content start-->
	       <div class="title popup">
				<h1>Change Password</h1>
			</div>
			<p id="changePassword-invalid" class="error">Invalid Password<p>
			<form>
				<input id="changePassword-old" type="password" placeholder="old password" class="element-top centerText" required/>
				<input id="changePassword-new" type="password" placeholder="new password" class="centerText" required/>
				<input id="changePassword-new-confirm" type="password" placeholder="confirm new password" class="element-bottom centerText" required/>
				<div id="wrapper-button-changePassword" class="space">
					<div id="loader-button-changePassword-submit" type="submit" class="loader loader-button"></div>
					<button id="button-changePassword-submit" class="button delete element-top listItem">Change my password</button>
				</div>
				<button id="button-changePassword-cancel" class="button delete element-bottom listItem">Cancel</button>
			</form>
	    </div> 
	</div>
	
	<div id="dialog-deleteAccount" class="dialog"> 
	    <div class="close"></div>
	    <div id="popup_content"> <!--your content start-->
	       <div class="title popup">
				<h1>Delete Account</h1>
			</div>
			<p>We're sorry to see you go. If you really want to delete your account, type your password below and then click, "Delete my account". Warning once deleted you will have to resignup to use Intencity again.</p>
			<p id="delete-invalidPassword" class="error">Invalid password<p>
			<form>
				<input id="delete-password" type="password" placeholder="password" class="element-top element-bottom centerText" required/>
				<div id="wrapper-button-deleteAccount">
					<div id="loader-button-deleteAccount-submit" type="submit" class="loader loader-button"></div>
					<button id="button-deleteAccount-submit" class="button delete element-top listItem">Delete my account</button>
				</div>
				<button id="button-deleteAccount-cancel" class="button delete element-bottom listItem">Cancel</button>
			</form>
	    </div> 
	</div>
</div>

<div id="dialog-passwordChanged" class="dialog"> 
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Success!</h1>
		</div>
		<p>Your password has been changed.</p>
    </div> <!--your content end-->
</div> <!--toPopup end-->

<script type="text/javascript">
	$(document).ready(function()
	{
		switchClass('#mobileNewsFeed', '#mobileFitnessLog', 'inactive');
		switchClass('#mobileFitnessLog', '#mobileNewsFeed', 'inactive');

		$('#mobileFitnessLog').addClass('inactive');
		
		//Will switch the visible icon for newsfeed to being unfocused
		switchClass('#newsFeedMobileFocused', '#newsFeedMobileUnfocused', 'unfocused');
		switchClass('#newsFeedMobileUnfocused', '#newsFeedMobileFocused', 'unfocused');

		//Will switch the visible icon for fitnesslog to being focused
		switchClass('#fitnessLogMobileFocused', '#fitnessLogMobileUnfocused', 'unfocused');
		switchClass('#fitnessLogMobileUnfocused', '#fitnessLogMobileFocused', 'unfocused');

		modifyUrl("page=settings", false);

		hide('#search');

	});
	
	//Click events for the excercise review
	$(".exercise_review").click(function()
	{
		var splitElementId = $(this).attr('id').split("_");

		var exerciseReview = $('#exercise_review_' + splitElementId[2]).val();

		loadPopup('#approved_exercises_admin', null);
		
		popupHeight('#approved_exercises_admin', '.approved_adminOverflow');	
	});

	$(".people_report").click(function()
	{
		var splitElementId = $(this).attr('id').split("_");

		var peopleReport = $('#people_report_' + splitElementId[2]).val();

		loadPopup('#feedback_reported_user', null);
		
		popupHeight('#feedback_reported_user', '.feedbackOverflow');
	});

	//Click events for the excercise review
	$(".add_exercise_settings").click(function()
	{
		var splitElementId = $(this).attr('id').split("_");

		var addExercise = $('#add_exercise_settings_' + splitElementId[2]).val();

		loadPopup('#add_exercise_admin', null);
		
		popupHeight('#add_exercise_admin', '.add_exerciseOverflow');	
	});
	
	//Gets all the equipment needed from the Equipment table.
	postData("services/data.php", "d=LnREtEp[[BmN]E[umFqnRENeSNLRqpa]CqmNMueWueaIUGP[nm]STit[[p[Eit[OLOYit]EEpeaeOimH[qmnmNT[U[Euee", function(data)
	{             
		var objects = jQuery.parseJSON(data);

		if(objects != "FAILURE")
		{
			for(var i = 0; i < objects.length; i++)
			{
				$('#equipmentList').append('<p id="equipmentItem_' + i + '" class="equipmentLineItem">' + objects[i].EquipmentName + '</p>');
			}

			//Gets the user's equipment and selects the items that the user currently has.
			postData("services/data.php", "d=LnRUptEl]E[umFsi[E!ei]CqmNMeueEa'a]STit[[EmW[lm']EEpeaeOrqnHRmi//", function(data)
			{             
				var userEquipment = jQuery.parseJSON(data);

				if(userEquipment != "FAILURE")
				{
					var equipmentLength = userEquipment.length;

					//Goes through the user's equipment list.
					for(var i = 0; i < equipmentLength; i++)
					{
						//Goes through the database full of equipment.
						$(".equipmentLineItem").each(function()
						{ 
							var equipmentId = "#" + $(this).attr('id');

							if(userEquipment[i].EquipmentName == $(equipmentId).text())
							{
								$(equipmentId).addClass('selected');
							}
						});	
					}
				}
			});

			checkEquipment();
		}
		
		$(".equipmentLineItem").click(function()
		{
			var elementId = $(this).attr('id');

			toggleClass("#" + elementId, "selected");

			checkEquipment();
		}); 
	});

// 	//Checks to see if the user has social network notifications on.
// 	postData("services/data.php", "d=LiiiMtH/i]E[oofoOtgEi'l]CholanRS[Rm!/]STwait[[iW[lm']ESScNtcsFensEEaea", function(data)
// 	{             
// 		var showSocialNetworkNotifications = jQuery.parseJSON(data);

// 		if(showSocialNetworkNotifications[0].ShowSocialNotifications == 1)
// 		{
// 			$('#postable_social').addClass("selected");
// 		}
// 		else
// 		{
// 			$('#nonpostable_social').addClass("selected");
// 		}
// 	});
	
	/**
	* Submits the user's equipment list to the database.
	*/
	$("#button-exerciseSurvey-submit").click(function()
	{
		show('#loader-button-exerciseSurvey-submit');

		postData("services/data.php", "d=LeeWa'']E[OumHm/a]TRUEtEEll]DEMrp[Eie/]EF[sqinR[!mi", function(data)
		{             
			var dataString = "statements=" + $('.selected').length;

			var i = 0;

			$("#equipmentList .selected").each(function()
			{ 
				var equipmentId = "#" + $(this).attr('id');

				dataString += "&table" + i + "=UserEquipment&columns" + i + "=EquipmentName&inserts" + i + "=" + $(equipmentId).text();

				i++;
			});

			postData("services/complex_insert.php", dataString, function(data)
			{             
				$('#button-exerciseSurvey-submit').text("Equipment saved");

				hide('#loader-button-exerciseSurvey-submit');

				setTimeout(function () 
				{
					$('#button-exerciseSurvey-submit').text("Submit");
			    }, 3000);  
			});
		});

		return false;
	});

	$("#button-changePassword").click(function()
 	{	
	 	loadPopup('#dialog-changePassword', null);

	 	hide('#changePassword-invalid');

	 	$('#changePassword-old').removeClass('error');
		$('#changePassword-new').removeClass('error');
    	$('#changePassword-new-confirm').removeClass('error');

    	$('#changePassword-old').val("");
		$('#changePassword-new').val("");
    	$('#changePassword-new-confirm').val("");

	 	$("#button-changePassword-submit").click(function()
 		{	
 			var oldPassword = $('#changePassword-old').val();
 			var newPassword = $('#changePassword-new').val();
 			var newPasswordConfirm = $('#changePassword-new-confirm').val();	

 			if(oldPassword == "")
 			{
 				$('#changePassword-invalid').text('Enter your password');
	 				
 				show('#changePassword-invalid');

 				$('#changePassword-old').addClass('error');
 			}
 			else if(newPassword == "")
 			{
 				$('#changePassword-invalid').text('Enter a new password');
 				
 				show('#changePassword-invalid');

 				$('#changePassword-new').addClass('error');
 			}
 			else if(newPasswordConfirm == "")
 			{
				$('#changePassword-invalid').text('Confirm your new password');
 				
 				show('#changePassword-invalid');

 				$('#changePassword-new-confirm').addClass('error');
 			}
 			if(newPassword == newPasswordConfirm)
 			{
 	 			show('#loader-button-changePassword-submit'); 	

 				postData("services/user_credentials.php", "password=" + oldPassword, function(data)
 		 		{
 					var objects = jQuery.parseJSON(data).split(",");
 		        	
 		        	if(objects[0] == "Valid credentials")
 	        		{
 		        		postData("services/change_password.php", "password=" + newPassword, function(data)
 		        		{             
 		        			var object = jQuery.parseJSON(data);

 		        			if(object == "SUCCESS")
 		        			{
 	 		        			dismissPopup(null);

 	 		        			loadPopup('#dialog-passwordChanged');
 	 		        			
		        			 	setTimeout(function () 
	 		       				{
		        			 		dismissPopup(null);
		 		   			    }, 3000);				
 		        			}
 		        			else
 		        			{
		        			 	$('#changePassword-invalid').text('Error changing your password. Try again later.');
 		        				
 		        				show('#changePassword-invalid');
 		        			}

 		        			hide('#loader-button-changePassword-submit');
 		        		});
 	        		}
 		        	else
 		        	{
 		        		$('#changePassword-invalid').text('Invalid password');
 		 				
 		 				show('#changePassword-invalid');

 		 				$('#changePassword-old').addClass('error');

 		 				hide('#loader-button-changePassword-submit');
 		        	}
 		 		});
 			}
 			else
 			{
 				$('#changePassword-invalid').text('New passwords do not match');
 				
 				show('#changePassword-invalid');

 				$('#changePassword-new').addClass('error');
	        	$('#changePassword-new-confirm').addClass('error');
 			}

 		 	return false;
 		});
 		 		
 		$("#button-changePassword-cancel").click(function()
 		{
 	 		dismissPopup(null);

 		 	return false;
 		});

 		return false;
 	});

	$("#button-delete-account").click(function()
 	{	
	 	loadPopup('#dialog-deleteAccount', null);

	 	hide('#delete-invalidPassword');
		
		$('#delete-password').removeClass('error');
		$('#delete-password').val("");

	 	$("#button-deleteAccount-submit").click(function()
 		{	
 			show('#loader-button-deleteAccount-submit'); 		 	

 			postData("services/user_credentials.php", "password=" + $('#delete-password').val(), function(data)
 	 		{
 	 			var objects = jQuery.parseJSON(data).split(",");
 	 		        	
 	 		    if(objects[0] == "Valid credentials")
				{
					hide('#delete-invalidPassword');

					$('#delete-password').removeClass('error');
					
					postData("services/data.php", "d=Lom/]Lev(e'][ocni)]Creu/l]AmAct'a", function(data)
					{             
						loadIntencityURL("logout.php");
					});
				}
				else
				{
					show('#delete-invalidPassword');
	        		
	        		$('#delete-password').addClass('error');
				}

				hide('#loader-button-deleteAccount-submit');
			});

 		 	return false;
 		});
 		 		
 		$("#button-deleteAccount-cancel").click(function()
 		{
 	 		dismissPopup(null);

 		 	return false;
 		});

 		return false;
 	});

	//click function that will highlight the users selection
	$(".hoverable").click(function()
 	{	
	 	var elementId = "#" + $(this).attr('id');
		
		$(elementId).parent().children().removeClass("selected");	
		toggleClass(elementId, "selected");

 		return false;
 	});

	//click function that will highlight the users selection
	$(".multiHoverable").click(function()
 	{	
	 	var elementId = "#" + $(this).attr('id');
		
		toggleClass(elementId, "selected");

 		return false;
 	});

 	//click function that will allow posting to facebook after workingout
 	$('#postable_social').click(function()
 	{
 	 	//Inserts into settings to show or not show the social notifications
		postData("services/data.php", "d=DsocftW'a]A[tThiiis[a!i']TenSSatc1EEll]UEt[SoNio[Eie/]PSigE[wloan!HRm/m", function(data) { });
 	});

 	//click function that will takeaway posting to social after workingout
 	$('#nonpostable_social').click(function()
 	{
		//Inserts into settings to show or not show the social notifications
		postData("services/data.php", "d=DsocftW'a]A[tThiiis[a!i']TenSSatc0EEll]UEt[SoNio[Eie/]PSigE[wloan!HRm/m", function(data) { });
 	});

	//Selects all equipment when clicked
 	$('#selectAllText').click(function()
 	{
 	 	selectAllEquipment();
 	});

	//Deselects all equipment when clicked
 	$('#deselectAllText').click(function()
 	{
 		deselectAllEquipment();
 	});
</script>