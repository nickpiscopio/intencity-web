<div id="welcome"> 	    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
		<div class="title popup">
			<h1>Welcome</h1>
		</div>
		<div class="welcomeOverflow">
			<div id="welcome-content">
					<p>Thank you for using Intencity!</p>
			       
<!-- 					<p>Intencity is a fitness application designed to help you with your everyday fitness needs. It is currently in Open Beta, so please be patient with any hiccups along the way.</p> -->
					<p>Intencity is a fitness application designed to help you with your everyday fitness needs.</p>
					<p>If you find any issues or have any improvements to suggest, please let us know!</p>
			       		
					<p>-The Intencity Team</p>
				       		
					<p>Follow us on your favorite social networks:</p>
			       
					<?php include 'social_networks.php'; ?>
<!-- 			       <button id="button-tutorial" class="button element-bottom element-top tutorial">Tutorial</button> -->
					<div>
						<input id="cb_welcome" type="checkbox" class="checkBox"><p id="doNotShowWelcome">Don't show again</p></input>
					</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">	
	$(document).ready(function()
	{
// 		var tutorialInitialize = false;
		var tutorialQuery = 0;
		
		loadPopup('#welcome', null);
		
		$('#cb_welcome').click(function()
		{
			//Inserts into user to not show the welcome again
			postData("services/data.php", "d=DTleEaa]A[eoe!Ri']TsSSo0EEel]UEr[WmW[lm']PU[Ehwc[Hm!/i/", function(data) { });
		});	

// 		Uncomment out when working on tutorial
// 		Click event that will go through the tutorial for the users
		$('#button-tutorial').click(function()
		{	
			dismissPopup(null);
					
			addTutorialClips(null, '#mobileInjury');

			if(tutorialQuery != 0)
			{
				tutorialQuery = 0;
			}

// 			tutorialInitialize = true;
		});
		
		$('.tutorialBackground').click(function()
		{				
			//Switch that will go through each tutorial element and isolate the desired element		
			switch (tutorialQuery)
			{
				case 0:
				{
					addTutorialClips( '#mobileInjury', '#mobileFitnessLog');
					
					tutorialQuery++;
					break;
				}
				case 1:
				{
					addTutorialClips('#mobileFitnessLog', '#menu-button');
					tutorialQuery++;
					break;
				}
				case 2:
				{
					addTutorialClips('#menu-button', '#approvedExercise');
					tutorialQuery++;
					break;
				}
				case 3:
				{
					addTutorialClips('#approvedExercise', '#searchBox');
					tutorialQuery++;
					break;
				}
				case 4:
				{
					addTutorialClips('#searchBox', '#content-fitnessLogWrapper');
					tutorialQuery++;
					break;
				}
				case 5:
				{
					addTutorialClips('#content-fitnessLogWrapper', null);
					break;
				}
				default:
				{
					dismissPopup(null);
				}
			}		
		});	
	}); 
</script>