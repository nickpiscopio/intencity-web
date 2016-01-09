<script type="text/javascript">	
	addStyleSheet("fitness_log");
</script>
<div id="fitnessLog">
	<hr id="hrTop">		
	<div id="navbarBottom">
		<div id="fitnessText">
			<h1>Fitness Log</h1>
		</div>
		<div id="bottomIcon">
	<!-- 		<div id="mobileProgress"> -->
	<!-- 			<a id="progressMobile" class="buttonLayout" href="#">  -->
	<!-- 				<img id="iconProgressWeb" class="element-bottom" src="images/web/icon_progress.png" title="Progress"/> -->
	<!-- 				<img id="iconProgressMobile" class="element-top element-bottom" src="images/mobile/icon_progress.png"/> -->
	<!-- 				<h2>Progress</h2> -->
	<!-- 			</a> -->
	<!-- 		</div> -->
	<!-- 		<div id="mobileTimer"> -->
	<!-- 			<a id="timerMobile" class="buttonLayout" href="#">  -->
	<!-- 				<img id="iconTimerWeb" class="element-bottom" src="images/web/icon_timer.png" title="Timer"/> -->
	<!-- 				<img id="iconTimerMobile" class="element-top element-bottom" src="images/mobile/icon_timer.png"/> -->
	<!-- 				<h2>Timer</h2>	 -->
	<!-- 			</a>	 -->
	<!-- 		</div> -->
			<div id="mobileInjury">
				<a id="injuryMobile" class="buttonLayout"> 
					<img id="iconInjuryWeb" class="element-bottom" src="images/web/icon_exclusion_list.png" title="Exclusion List"/>
					<img id="iconInjuryMobile" class="element-top element-bottom" src="images/web/icon_exclusion_list_grey.png"/>
					<h2>Exclusion List</h2>	
				</a>
			</div>
		</div>	
	</div>

	<?php include 'exclusion_list.php'; ?>
	
	<hr id="hrBottom">
	<div class="clearFloat"></div>
	
	<div id="content-fitnessLogWrapper">
		<div id="loader-fitnessLog" class="loader"></div>
		<div id="content-fitnessLog"></div>
	</div>
</div> <!-- fitnessLog END -->

<script type="text/javascript">
	$(document).ready(function() 
	{		
		switchClass('#mobileNewsFeed', '#mobileFitnessLog', 'active');
		switchClass('#mobileFitnessLog', '#mobileNewsFeed', 'inactive');

		//Will switch the visible icon for newsfeed to being unfocused
		switchClass('#newsFeedMobileFocused', '#newsFeedMobileUnfocused', 'focused');
		switchClass('#newsFeedMobileUnfocused', '#newsFeedMobileFocused', 'unfocused');

		//Will switch the visible icon for fitnesslog to being focused
		switchClass('#fitnessLogMobileUnfocused', '#fitnessLogMobileFocused', 'focused');
		switchClass('#fitnessLogMobileFocused', '#fitnessLogMobileUnfocused', 'unfocused');		

		$("#searchBox").attr("placeholder", "Search for an exercise").blur();

		modifyUrl("page=fitness_log", false);
		
		show('loader-fitnessLog');

		show('#search');
				
		replaceContent('#content-fitnessLog', 'fitness_log_user_equipment.php');
		
		//Click event for exclusion list
		$("#injuryMobile").click(function()
    	{
			show('#loader-exclusionList');
			
			loadPopup("#exclusionList", null);

			postData("services/data.php", "d=LueOs[m/RueDxs[]E[,nmMuWR'mlO[[nmEEiN]CDciF[lo[i/iUYciOR[lmS]STEsaRxiHE!a[PEsaRBcoe]EIxloN[EcnEEale'GBxloN[[YunaAC", function(data)
			{             
				var exclusions = jQuery.parseJSON(data);

		 		$('#exclusionBody').empty();

		 		if(exclusions !== null)
		 		{
		 			var exclusionsLength = exclusions.length;
			 		
			 		for(var i = 0; i < exclusionsLength; i++)
			 		{
				 		var exclusionId = exclusions[i].ID;

				 		$('#exclusionBody').append('<div id="exclusionLineItem_' + exclusionId + '">' + 
														'<a id="exclusionRemove_' + exclusionId + '" class="exclusion-remove">' + 
															'<img src="images/web/icon_close.png"/>' + 
														'</a>' + 
														'<input id="exclusionName_' + exclusionId + '" class="exclusion-name" type="text" value="' + exclusions[i].ExclusionName + '"disabled>' + 
//															 '<select id="exclusionRules" class="exclusionList-dropDown">' + 
//																'<option id="exclusion-option_1" value="1">exclusionTest</option>' + 
//																'<option id="exclusion-option_2" value="2">exclusionTest2</option>' + 
//																'<option id="exclusion-option_3" value="3">exclusionTest3</option>' + 
//															'</select>' + 
													'</div>');
			 		}
		 		}

		 		hide('#loader-exclusionList');

		 		$(".exclusion-remove").click(function()
 				{
 					var splitElementId = $(this).attr('id').split("_");

 					var exclusionName = $('#exclusionName_' + splitElementId[1]).val();
 					var exclusionListItem = "#exclusionLineItem_" + splitElementId[1];

 					//Removes an excluded exercise from the exclusion list in the database.
 					postData("services/data.php", "d=LcWE'aDa']E[Oi[[!i'liN/r']TREuEEleAEunv/]DEMlnRa/lNcoea]EF[xsoHmim/[[xsm!0&var=" + exclusionName, function(data)
					{             
 						$(exclusionListItem).remove();
					});

 					return false;
 				});
			});

			return false;			
    	});
	});
</script>