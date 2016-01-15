<div class="logContainer">
	<a id="button-exerciseLog-back">
		<img src="images/web/icon_back.png"/>
	</a>
	<div class="clearFloat"></div>
	<div id="fitnessLogTitle" class="title">
		<div class="centerText">
			<h1 id="log_todayExercise" ></h1>
		</div>
		<div id="fitnessLogTomorrow" class="centerText">
			<h1 id="log_tomorrowsExercise"></h1>
		</div>
		<a id="fitnessTypeInfo">
			<img onclick="fitnessGoalInfo();" src="images/web/icon_info_white.png" title="Info" height="20px" width="19px"/>
		</a>	
	</div>
	<div id="exerciseList"></div>
	
	<div>
		<div id="loader-button-nextExercise" class="loader loader-button"></div>
		<button id="button-newExercise" class="listItem button element-bottom">Start exercising</button>
	</div>
	
	<div id="saveRoutineWrapper">
		<div id="saveRoutineContainer">
			<div id="saveRoutineNameFields" class="listItem">
				<input id="saveRoutine-name" type="text" placeholder="Routine Name"/>
				<!-- NEED TO IMPLIMENT LATER -->
	<!-- 			<select id="saveRoutine-dropDown"> -->
	<!-- 				<option>1</option> -->
	<!-- 			    <option>2</option> -->
	<!-- 			</select> -->
			</div>
			
			<div id="routineDays">
				<div id="question" class="listItem">
					<p>When to do this routine?</p>
				</div>
				<div class="listItem">
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-sunday-1">Sun</p>
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-monday-2">Mon</p>
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-tuesday-3">Tues</p>
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-wednesday-4">Wed</p>
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-thursday-5">Thur</p>
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-friday-6">Fri</p>
					<p class="routineDay element-top element-bottom" id="button-exerciseDay-saturday-7">Sat</p>
				</div>
			</div>
		</div>
	
		<div>
			<div id="loader-button-saveRoutine" class="loader loader-button"></div>
			<button id="button-saveRoutine" class="listItem button element-bottom">Save this routine</button>
		</div>
	</div>
	
</div>

<div id="dialog-fitnessGoal" class="dialog"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>What is your fitness goal?</h1>
		</div>
		
		<ul>
			<li id="button-gainWeight" class="fitnessGoals listItem equipmentLineItem">Gain weight</li>
			<li id="button-sustain" class="fitnessGoals listItem equipmentLineItem">Sustain weight</li>
			<li id="button-loseWeight" class="fitnessGoals listItem equipmentLineItem">Lose weight</li>
			<li id="button-tone" class="fitnessGoals element-bottom listItem equipmentLineItem">Tone my body</li>
		</ul>

		<div id="fitness_goal_recommendations">
			<div class="fitness_goal_recommendations">
				<h3><span id="recommended_parameters"></span> recommendations:</h3>
				<ul class="tabbed">
					<li>Weight: <p id="recommended_weight"></p></li>
					<li>Reps: <p id="recommended_reps"></p></li>
					<li>Rest between exercises: <p id="recommended_time"></p></li>
					<li>Cardio day: <p id="recommended_cardio"></p></li>
				</ul>
			</div>
			<div>
				<div id="loader-button-fitness_goal" class="loader loader-button"></div>
				<button id="submit_fitness_goal" class="button element-bottom listItem">Submit</button>
			</div>
		</div>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="existingExercise"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Existing Exercise!</h1>
		</div>
		<p>There is an existing exercise for some of the days selected. Would you like to overwrite them?</p>
		
		<div id="button-existingExercise-overwriteWrapper">
			<div id="loader-button-existingExercise-overwrite" class="loader loader-button loader-container"></div>
			<button id="button-existingExercise-overwrite" class="button element-top">Overwrite</button>
		</div>
		
		<button id="button-existingExercise-cancel" class="button listItem element-bottom">Cancel</button>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="savedRoutine"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Success!</h1>
		</div>
		<p>Your routine has been saved.</p>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="dialog-selectExerciseDays"> 
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Select routine days</h1>
		</div>
		
		<p>Please select when to do this routine.</p>

		<button id="button-selectExerciseDays-ok" type="submit" class="button element-top-separated element-top element-bottom">OK</button>

    </div> <!--your content end-->
</div> <!--toPopup end-->

<div id="dialog-insertExerciseToContinue"> 	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Missing Exercise</h1>
		</div>
		
		<p>Please insert the exercise you've completed before continuing.</p>

		<button id="button-insertExerciseToContinue-ok" type="submit" class="button element-top-separated element-top element-bottom">OK</button>

    </div> <!--your content end-->
</div> <!--toPopup end-->

<div id="dialog-shareOnFacebook" class="dialog"> 
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Share on Facebook</h1>
		</div>
		
		<p>Nice job in completed your workout! Go ahead and brag a little. You deserve it!</p>

		<div class="element-top-separated">
			<div id="loader-button-shareOnFacebook" class="loader loader-button loader-container"></div>
			<button id="button-shareOnFacebook" type="submit" class="button element-top">Share on Facebook</button>
		</div>
		
		<button id="button-shareOnFacebook-cancel" type="submit" class="button element-bottom listItem">Maybe next time</button>
<!-- 		<div> -->
<!-- 			<input id="cb_doNotShowSocial" type="checkbox" class="checkBox"><p id="doNotShowWelcome">Don't show again</p></input> -->
<!-- 		</div> -->
    </div> <!--your content end-->
</div> <!--toPopup end-->

<script type="text/javascript">	
	
	var currentExerciseId = 0;
	var removeExerciseNum = 0;
	var exerciseNum = 0;
	var showBackButtonNum = 2;
	var currentFitnessMean = "";
	var fitnessGoal = ""; 
	var exerciseDayGroupName = "my workout";
	var shareOnSocialMediaText = "Share on social media";

	hide('#loader-fitnessLog');

	/**
	 * Button click to tell the database the user's fitness type is to gain weight.
	 */
	$("#button-gainWeight").click(function()
	{		
		setText("#recommended_parameters", 'Gaining weight');
		$('#recommended_weight').html('medium &#x2013; high');
		$('#recommended_reps').html(' 3 &#8211; 5');
		$('#recommended_time').html("2 &#8211; 2.5 minutes");
		$('#recommended_cardio').html("25 minutes total");
		
		displayFitnessRecommendation();
	
		fitnessGoal = "G";
	
		return false;
	});

	/**
	 * Button click to tell the database the user's fitness type is to sustain his or her weight.
	 */
	$("#button-sustain").click(function()
	{		
		setText("#recommended_parameters", 'Sustaining weight');
		setText('#recommended_weight', "medium");
		$('#recommended_reps').html('8 &#8211; 10');
		$('#recommended_time').html("1.5 &#8211; 2 minutes");
		$('#recommended_cardio').html("30 minutes total");
		
		displayFitnessRecommendation();

		fitnessGoal = "S";

		return false;
	});

	/**
	 * Button click to tell the database the user's fitness type is to lose weight.
	 */
	$("#button-loseWeight").click(function()
	{	
		setText("#recommended_parameters", 'Losing weight');
		$('#recommended_weight').html('low &#8211; medium');
		$('#recommended_reps').html('8 &#8211; 12');
		$('#recommended_time').html("45 seconds &#8211; 1 minute");
		$('#recommended_cardio').html("35 minutes total");
			
		displayFitnessRecommendation();
		
 		fitnessGoal = "L";

		return false;
	});

	/**
	 * Button click to tell the database the user's fitness type is to tone his or her body.
	 */
	$("#button-tone").click(function()
	{		
		setText("#recommended_parameters", 'Toning');
		$('#recommended_weight').html('low &#8211; medium');
		$('#recommended_reps').html('8 &#8211; 12');
		$('#recommended_time').html("20 &#8211; 30 seconds");
		$('#recommended_cardio').html("45 minutes total");
		
		displayFitnessRecommendation();

		fitnessGoal = "T";
		
		return false;
	});

	/**
	 * Button click to tell the database the user's fitness type is to sustain his or her weight.
	 */
	$("#submit_fitness_goal").click(function()
	{
		show('#loader-button-submit');
		
		//Inserts the fitnes goal for the user to sustain his or her weight.
		insertFitnessGoal(fitnessGoal);

		return false;
	});

	//click function that will highlight the users selection
	$(".fitnessGoals").click(function()
 	{	
	 	var elementId = "#" + $(this).attr('id');
		
		$(".fitnessGoals").removeClass("selected");	
		toggleClass(elementId, "selected");

 		return false;
 	});

	/**
	* Displays the fitess recommendations if it isn't already displayed.
	*/
 	function displayFitnessRecommendation()
 	{
 		if($("#fitness_goal_recommendations").is(':hidden'))
		{
			show("#fitness_goal_recommendations");

			$('#button-tone').removeClass('element-bottom');
		}
 	}
	
	/**
	* Inserts a fitness type into the settings of the user.
	*
	* @param fitnesstype	The type of fitness the user will embark.
	*						The following values are available:
	*							S	Sustain Weight
	*							T	Tone Body
	*							G	Gain Weight
	*							L	Lose Weight
	*/
	function insertFitnessGoal(fitnessType)
	{	
		//Inserts the fitness type into the settings for a specified user.	
		postData("services/data.php", "d=Dstsv/[i]A[tTiT/'Hl/a]TenSey'rRm!m]UEt[Fsea[Eie/]PSigE[np!0WEEa'l'&var=" + fitnessType, function(data)
		{             
			var objects = jQuery.parseJSON(data);

			show('#loader-button-fitness_goal');

			if(objects == "FAILURE")
			{
				alert("There was an error inserting your fitness goal. Please try again later.");
			}

			dismissPopup(null);
			
			hide('#loader-button-fitness_goal');
		});
	}

	//Gets the CurrentFitnessMean for the user.
	postData("services/data.php", "d=LFeFtsEl]E[reMRt[E!ei]CuntnOenEa'a]STris[[iW[lm']ECetnsaMSgHRmi//", function(data)
	{             
		var fitnessMean = jQuery.parseJSON(data);
		
    	//Only get today and tomorrow's exercises if the user is using the fitness guru.
		if(fitnessMean != "FAILURE")
		{
			currentFitnessMean = fitnessMean[0].CurrentFitnessMean;

			if(currentFitnessMean == "G")
			{
				//Checks to see if the user has a fitness type from the settings.
				postData("services/data.php", "d=LTMtH[/]E[t[OtWEil]CispSi[R!m/]STnyRegEm'i]EFeseF[nsEalea'", function(data)
				{             
					var fitnessType = jQuery.parseJSON(data);

			    	if(fitnessType[0].FitnessType == null)
					{
						loadPopup('#dialog-fitnessGoal', null);
					}
					else
					{			
						fitnessGoal = fitnessType[0].FitnessType;
					}
				});

				//Check to see what exercises are for today and tomorrow.
				postData("services/data.php", "d=Lyrsl]LeicG(i][Dluu'a']CgsMepe/]Atpaslo/m)", function(data)
				{             
					var muscleGroups = jQuery.parseJSON(data);

					if(muscleGroups != "FAILURE" && muscleGroups[0].currentMuscleGroup !== null)
					{
						$('#log_todayExercise').text("Today: " + muscleGroups[0].currentMuscleGroup);
						$('#log_tomorrowsExercise').text("Tomorrow: " + muscleGroups[0].futureMuscleGroup);

						exerciseDayGroupName = muscleGroups[0].currentMuscleGroup;
					}

					show('#fitnessTypeInfo');
				});		
			}

			exerciseLogFunctionality();
		} 
	});

	/**
	* Loads the exercise log functionality.
	*/
	function exerciseLogFunctionality()
	{
		//Checks to see if the user exercised today.
		postData("services/data.php", "d=Lc,rgEReasu[mtia'DUTEYS]E[,NecixcErstnxfcFoexHEm/a/tCED[m]CDesxietspxiiEcDtRClreEEelADD(R[[]STEimeehee,cuoeeiyMpdcW[lm'[!A[RTA]EIxreaEsW,rieseDr,riiflO[eEes[Ri!i[NaeR)OBieC", function(data)
		{             
			var objects = jQuery.parseJSON(data);
	    	
			if(objects != "FAILURE" && objects !== null)
			{
				for(var i = 0; i < objects.length; i++)
		    	{
					handleNextExercise(objects[i].ID, objects[i].ExerciseName, objects[i].ExerciseWeight, objects[i].ExerciseReps, objects[i].ExerciseDuration, objects[i].ExerciseDifficulty, null, false);
		    	}
			}

			loadExerciseListFunctionality();

			hide('#loader-fitnessLog'); 
		});	
	}

	$("#button-exerciseLog-back").click(function()
	{		
		show('#loader-fitnessLog');

		postData("services/data.php", "d=LmxiEaatU]E[OtEsRi'[DaRT)]TRClreEEelADD(]DEMpdcW[lm'[!A]EF[oeee[Hm!/i/NeCE", function(data)
		{             
			replaceContent('#content-fitnessLog', 'fitness_log_fitness_means.php'); 
		});		
 		
		return false;
	});	

	/**
	* Loads the exercise list functionality.
	*/
	function loadExerciseListFunctionality()
	{
		//Checks to see if the user has set his or her current fitness means.
		postData("services/data.php", "d=LFeFtsEl]E[reMRt[E!ei]CuntnOenEa'a]STris[[iW[lm']ECetnsaMSgHRmi//", function(data)
		{             
			var currentFitnessMeans = jQuery.parseJSON(data);

	 		/**
			 * Button click to give the user one of their routines.
			 */
			$("#button-newExercise").click(function()
			{					
				$('#button-newExercise').attr("disabled", true);
				
				show('#loader-button-nextExercise');

		 		var currentFitnessMean = currentFitnessMeans[0].CurrentFitnessMean;

		 		var nextExercise = "";

		 		if(currentFitnessMean == "W")
		 		{			
			 		if($('#exerciseName_' + currentExerciseId).val() == "")
			 		{
			 			hide('#loader-button-nextExercise');
			 			
			 			loadPopup('#dialog-insertExerciseToContinue', null);

			 			$("#button-insertExerciseToContinue-ok").click(function()
		 			 	{		
			 				dismissPopup(null);

		 			 		return false;
		 			 	});

				 		$('#button-newExercise').attr("disabled", false);
			 		}
			 		else
			 		{
			 			insertExercise(nextExercise, "", "", "", "", "");
			 		}
		 		}
		 		else if(currentFitnessMean == "G")
		 		{
		 			if(fitnessGoal == "")
		 			{
		 				hide('#loader-button-nextExercise');
		 				
		 				loadPopup('#dialog-fitnessGoal', null);

		 				$('#dialog-fitnessGoal h1').text("Please select a fitness goal");
		 				
		 				$('#button-newExercise').attr("disabled", false);
		 			}
		 			else
		 			{
		 				getNextExercise();
 			 		}
		 		}
		 		else
		 		{
		 			getNextExercise();
		 		}
		 		
				return false;
			});	
		});
	}

	/**
	* Calls the stored procedure to get the next exercise.
	*/
	function getNextExercise()
	{
		//Gets the next exercise
		postData("services/data.php", "d=Lsi)]Lex/a][Ec(/]Cgeem']Atri'el", function(data)
		{             
 			var object = jQuery.parseJSON(data);
		    	
	    	if(object == "FAILURE" || object[0].COMPLETED == "COMPLETED" || object === null)
	    	{
		    	disableNextExercise();

			    hide('#loader-button-nextExercise');
			    
			    if(object[0].COMPLETED == "COMPLETED")
			    {
			    	shareOnSocialMedia(); 
			    }
	    	}
	    	else
	    	{
		    	var nextExerciseWeight = "";
		    	var nextExerciseReps = "";
		    	var nextExerciseDuration = "";
		    	var nextExerciseDifficulty = "";
		    	var exerciseAmountLeft = "";
		    	
		    	if(typeof object[0].nextExercise !== "undefined")
		    	{
		    		nextExercise = object[0].nextExercise;

		    		nextExerciseWeight = object[0].nextExerciseWeight;
			    	nextExerciseReps = object[0].nextExerciseReps;
			    	nextExerciseDuration = object[0].nextExerciseDuration;
			    	nextExerciseDifficulty = object[0].nextExerciseDifficulty;
			    	exerciseAmountLeft = object[0].exerciseAmountLeft;
		    	}

		    	insertExercise(nextExercise, nextExerciseWeight, nextExerciseReps, nextExerciseDuration, nextExerciseDifficulty, exerciseAmountLeft);
	    	}
		});
	}

	/**
	* Inserts and exercise into the database.
	*
	* @param nextExercise			The exercise to insert into the database.
	* @param exerciseAmountLeft		The amount of exercises left.
	*/
	function insertExercise(nextExercise, nextExerciseWeight, nextExerciseReps, nextExerciseDuration, nextExerciseDifficulty, exerciseAmountLeft)
	{		
		var exerciseWeight = "";
		var exerciseReps = "";
		var exerciseDuration = "";
		var exerciseDifficulty = "";

		if(nextExerciseWeight == "" || nextExerciseWeight == null)
		{
			exerciseWeight = null;
		}
		else
		{
			exerciseWeight = nextExerciseWeight;
		}

		if(nextExerciseReps == "" || nextExerciseReps == null)
		{
			exerciseReps = null;
		}
		else
		{
			exerciseReps = nextExerciseReps;
		}

		if(nextExerciseDuration == "" || nextExerciseDuration == null)
		{
			exerciseDuration = null;
		}
		else
		{
			exerciseDuration = "'" + nextExerciseDuration + "'";
		}

		if(nextExerciseDifficulty == "" || nextExerciseDifficulty == null)
		{
			exerciseDifficulty = null;
		}
		else
		{
			exerciseDifficulty = nextExerciseDifficulty;
		}

		var dataString = "d=SmxiltE,rER,eaeu)aRE)vv,r]E[TtEsieiiNeceiceEstnefcVU('U((a/,a/3/r]RNClreaDeesmietepxiuEcDiASelA)W',r/2/a)]ITOpdcE,,,caxsgxssrDixsftL'iCTN,r//rv,4]NI[oeee(maTmxreEeWh,rieecro,riilyE/m/,D,O/0'a1v/av/&var=" + 
							nextExercise + "," + exerciseWeight + "," + exerciseReps + "," + exerciseDuration + "," + exerciseDifficulty + "&r=1";
		
		//Inserts the exercise the user did into the database.
		postData("services/data.php", dataString, function(data)
		{             
			var exerciseId = jQuery.parseJSON(data);

	    	if(exerciseId != "FAILURE")		
	    	{
	    		handleNextExercise(exerciseId, nextExercise, nextExerciseWeight, nextExerciseReps, nextExerciseDuration, nextExerciseDifficulty, exerciseAmountLeft, true);
	    		
	    		$('#button-newExercise').attr("disabled", false);
	    	}
	    	else
	    	{
	    		disableNextExercise();
	    	}

	    	hide('#loader-button-nextExercise');	
		});
	}

	/**
	* Handles the data for the next exercise.
	*
	* @param tempObjId					The object's Id to place in the list.
	* @param tempExerciseName			The exercise name to place to display to the user.
	* @param tempExerciseWeight			The exercise weight of the exercise to display to the user.
	* @param tempExerciseReps			The reps of the exercise to display to the user.
	* @param tempExerciseDuration		The exercise duration of the exercise to display to the user.
	* @param tempExerciseDifficulty		The difficulty of the exercise to display to the user.
	* @param exerciseAmountLeft			The amount of exercises left to display to the user.
	* @param arePlaceholders			Boolean value for whether the values from the database should 
	*									be displayed as placeholders.
	*/
	function handleNextExercise(tempObjId, tempExerciseName, tempExerciseWeight, tempExerciseReps, tempExerciseDuration, tempExerciseDifficulty, exerciseAmountLeft, arePlaceholders)
	{
		var exerciseName = tempExerciseName;
		var exerciseWeight = tempExerciseWeight;
		var exerciseAmount = "";
		var exerciseReps = tempExerciseReps;
		var exerciseDuration = tempExerciseDuration;
		var exerciseDifficulty = tempExerciseDifficulty;

		var exerciseAmountDropDown = "";

		if(exerciseName == "/var0/")
		{
			exerciseName = "";
		}

		if(exerciseWeight == null)
		{
			exerciseWeight = "";
		}

		if(exerciseReps == null && exerciseDuration == null)
		{
			exerciseAmount = "";
		}
		else if(exerciseReps != null)
		{
			exerciseAmount = exerciseReps;
			exerciseAmountDropDown = "reps";
		}
		else
		{
			exerciseAmount = exerciseDuration;
			exerciseAmountDropDown = "time";
		}

		if(exerciseDifficulty == null)
		{
			exerciseDifficulty = "";
		}

    	populateExerciseListItems(tempObjId, exerciseName, exerciseAmountLeft, exerciseWeight, exerciseAmount, exerciseAmountDropDown, exerciseDifficulty, arePlaceholders);
	}

	/**
	* Populates the exercise list with list items of exercises.
	*
	* @param exerciseName	The name of the exercise to populate the list item.
	*/	
	function populateExerciseListItems(exerciseId, exerciseName, exerciseAmountLeft, exerciseWeight, exerciseAmount, exerciseAmountDropDown, exerciseDifficulty, arePlaceholders)
	{			
		exerciseNum++;

		if(exerciseNum > showBackButtonNum - 1)
		{
 			hide('#button-exerciseLog-back');
		}

		if(exerciseNum == 9)
		{
			//Gets the earned fitness points date from the database.
			postData("services/data.php", "d=LiiDMe[i]E[rsoaOrHl/a]CadnttRURm!m]STntPs[[[Eie/]EEeFesneFsWEEa'l'", function(data)
			{             
				var object = jQuery.parseJSON(data);

				var today = new Date();
				var yesterday = new Date(today);
				yesterday.setDate(today.getDate() - 1);

				if(object[0].EarnedFitnessPointsDate == getDate(yesterday))
    			{
					postData("services/data.php", "d=Lt(m0]LrtUra1][niT/i,]CgPsee/)]Aaonos'l'", function(data) { });
    			}

	        	if(object[0].EarnedFitnessPointsDate != getDate(new Date()))
    			{
        			//Gets the first exercise from the current date that the user did.
        			postData("services/data.php", "d=LOeE[R!Na)BiLT]E[molxeEma/AtCDD[m[[]CiF[eesHi/i[eREO[eCM]STeMpdcW[lm'[!A[RTAI1]ET[RCmtriEEa'elDDUT(REY[SI", function(data)
					{             
        				var firstExercise = jQuery.parseJSON(data);

    		        	//Gets the last exercise that the user did on the current date.
    		        	postData("services/data.php", "d=LOeE[R!Na)Bi[I]E[molxeEma/AtCDD[mCT]CiF[eesHi/i[eREO[eSI]STeMpdcW[lm'[!A[RTDL[]ET[RCmtriEEa'elDDUT(REY[EM1", function(data)
						{             
    		        		var currentExercise = jQuery.parseJSON(data);
				        	var currentExerciseTime = timeToFloat(currentExercise[0].Time);
				        	var firstExerciseTime = timeToFloat(firstExercise[0].Time);	
				        	var exerciseTime = currentExerciseTime - firstExerciseTime;

				        	//If the exerciseTime is greater than 10 minutes
				        	if(exerciseTime > 0.16)
				        	{
				        		postData("services/data.php", "d=Lt(m1]LrtUra1][niT/i,)]CgPsee/5]Aaonos'l'", function(data)
		        				{             
				        			//Sets the earned fitness points to today.
				        			postData("services/data.php", "d=DtFeseEa']A[erdst!RHEm/a/]TsSEtsnaA)EEel]UEr[enoDCTW[lm']PU[eaniPitUD([Ri!i", function(data){});
		        				});
				        	}
						});
					});
    			} 
			});
		}
		
		currentExerciseId = exerciseId;

		if(exerciseAmountLeft > 0 && exerciseAmountLeft !== "undefined" && exerciseAmountLeft != "")
		{
			$('#button-newExercise').text("Next exercise (" + exerciseAmountLeft + " left)");
			$('#button-newExercise').removeClass('element-bottom');
			
			show('#saveRoutineWrapper');
		}
		else if(currentFitnessMean == "W")
		{
			$('#button-newExercise').text("Next exercise");
			$('#button-newExercise').removeClass('element-bottom');
			
			show('#saveRoutineWrapper');
		}
		else if(exerciseAmountLeft == 0)
		{
			$('#button-newExercise').text(shareOnSocialMediaText);
		}
		else
		{
			$("#button-newExercise").text("Next exercise");
			$('#button-newExercise').removeClass('element-bottom');
			
			show('#saveRoutineWrapper');
		}

		var weightPlaceholder = "weight";
		var amountPlaceholder = "amount";

		if(arePlaceholders)
		{
			if(exerciseWeight == "")
			{
				weightPlaceholder = "weight";
			}
			else
			{
				weightPlaceholder = exerciseWeight;
			}

			if(exerciseAmount == "")
			{
				amountPlaceholder = "amount";
			}
			else
			{
				amountPlaceholder = exerciseAmount;
			}			

			exerciseWeight = "";
			exerciseAmount = "";
		}

		var weightTitle = "Enter the weight you lifted for this exercise.";
		var amountTitle = "Enter the reps or duration of the exercise.";
		var amountTitle = "Select the reps or time for the exercise.";
		var intensityTitle = "Select how intense this exercise was for you.";

		var infoButtonHTML = "";

		if(currentFitnessMean == "G")
		{
			infoButtonHTML = '<a id="exercise-info_' + exerciseId + '" class="exercise-info"><img src="images/web/icon_info_selected.png" title="Info" height="20px" width="19px"/></a>';
		}
			
		$('#exerciseList').append('<div id="exerciseId_' + exerciseId + '" class="exerciseLineItem">' +
						    			/*'<a class="actionElements" href="images/web/icon_copy_exercise.png">' +
						    				'<img class="actionElements" src="images/web/icon_copy_exercise.png"/>' +
						    			'</a>' +*/
						    			infoButtonHTML + 
						    			'<input id="exerciseName_' + exerciseId + '" class="fitnessLogInput-name" type="text" value="' + exerciseName + '" placeholder="exercise name">' +
						    			'<a id="removeExercise_' + exerciseId + '" class="button-removeExercise"><img src="images/web/icon_close.png"/></a>' +
										'<div id="mobileRow">' +
							    			'<input id="exerciseWeight_' + exerciseId + '" placeholder="' + weightPlaceholder + '" class="fitnessLogInput-weight" type="text" value="' + exerciseWeight + '" title="' + weightTitle + '" maxlength="3"><p id="weightProperties" title="' + weightTitle + '">lbs</p>' +
							    			'<input id="exerciseAmount_' + exerciseId + '" placeholder="' + amountPlaceholder + '" class="fitnessLogInput-amount" type="text" value="' + exerciseAmount + '" title="' + amountTitle + '" maxlength="8">' +
							    				'<select id="exerciseAmount-dropDown_' + exerciseId + '" title="' + amountTitle + '" class="fitnessLogInput-amount-dropDown">' +
								    				'<option id="option_reps" placeholder="reps" value="reps">reps</option>' +
								    				'<option id="option_time" placeholder="time" value="time">time</option>' +
								    			'</select>' +
							    			'<p id="difficultyProperties" title="' + intensityTitle + '" class="fitnessLogDifficulty">Intensity:</p><select id="exerciseDifficulty_' + exerciseId + '" title="' + intensityTitle + '" class="fitnessLogInput-difficulty">' +
							    				'<option id="option_10" value="10">10</option>' +
							    				'<option id="option_9" value="9">9</option>' +
							    				'<option id="option_8" value="8">8</option>' +
							    				'<option id="option_7" value="7">7</option>' +
							    				'<option id="option_6" value="6">6</option>' +
							    				'<option id="option_5" value="5">5</option>' +
							    				'<option id="option_4" value="4">4</option>' +
							    				'<option id="option_3" value="3">3</option>' +
							    				'<option id="option_2" value="2">2</option>' +
							    				'<option id="option_1" value="1">1</option>' +
							    			'</select>' +
						    			'</div>' +
						    		'</div>');

		$('#exerciseAmount-dropDown_' + exerciseId + ' #option_' + exerciseAmountDropDown).attr("selected", "selected");

    	$('#exerciseDifficulty_' + exerciseId + ' #option_' + exerciseDifficulty).attr("selected", "selected");

    	$(".button-removeExercise").unbind("click");
		$(".button-removeExercise").bind('click', function()
		{
			var splitElementId = $(this).attr('id').split("_");

			removeExerciseNum = splitElementId[1];

 			loadPopup("#removeExercise", null);

			return false;
		});

		$(".exercise-info").unbind("click");
		$(".exercise-info").bind('click', function()
		{
			var splitElementId = $(this).attr('id').split("_");

			var exerciseName = $('#exerciseName_' + splitElementId[1]).val();

			getExerciseInfo(exerciseName);

			return false;
		});
		
		$('.fitnessLogInput-weight, .fitnessLogInput-amount').unbind('keyup');		
		$('.fitnessLogInput-weight, .fitnessLogInput-amount').bind('keyup', function(e)
		{
			var code = e.keyCode || e.which;
			
			if(code != 13) 
			{ 
				$(this).val(function (i, v) 
				{
			        return v.replace(/[^0-9.]/g, '');
			    });
			}
		});

		$('.fitnessLogInput-amount').unbind('blur');		
		$('.fitnessLogInput-amount').bind('blur', function()
		{
			if($('#exerciseAmount-dropDown_' + splitElementId[1]).val() == "time")
			{
				var elementId = $(this).attr('id');
				var splitElementId = elementId.split("_");
				var value = $("#" + elementId).val();
				
				$('#exerciseAmount_' + splitElementId[1]).val(formatTime(value));
			}
		});

		$('.fitnessLogInput-name, .fitnessLogInput-weight, .fitnessLogInput-amount, .fitnessLogInput-amount-dropDown, .fitnessLogInput-difficulty').unbind('change');		
		$('.fitnessLogInput-name, .fitnessLogInput-weight, .fitnessLogInput-amount, .fitnessLogInput-amount-dropDown, .fitnessLogInput-difficulty').bind('change', function()
		{
			var elementId = $(this).attr('id');
			var splitElementId = elementId.split("_");
			var column = "";
			var value = $("#" + elementId).val();
			
			if(splitElementId[0] == "exerciseName")
			{
				column = "ExerciseName";
			}
			else if(splitElementId[0] == "exerciseWeight")
			{
				if(value.length == 0)
				{
					value = "";
					column = "ExerciseWeight=null";
				}
				else
				{
					column = "ExerciseWeight";
				}
			}
			else if(splitElementId[0] == "exerciseAmount" || splitElementId[0] == "exerciseAmount-dropDown")
			{
				value = $('#exerciseAmount_' + splitElementId[1]).val();

				if($('#exerciseAmount-dropDown_' + splitElementId[1]).val() == "time")
				{
					$('#exerciseAmount_' + splitElementId[1]).attr("placeholder", "hhmmss");

					if(value.length > 0)
					{					
						$('#exerciseAmount_' + splitElementId[1]).val(formatTime(value));
						
						value = $('#exerciseAmount_' + splitElementId[1]).val();
						
						column = "ExerciseReps=null,ExerciseDuration";
					}
					else
					{
						value = "";
						
						column = "ExerciseReps=null,ExerciseDuration=null";
					}
				}
				else
				{
					$('#exerciseAmount_' + splitElementId[1]).attr("placeholder", "amount");

					if(value.length > 0)
					{
						column = "ExerciseDuration=null,ExerciseReps";
					}
					else
					{
						value = "";

						column = "ExerciseDuration=null,ExerciseReps=null";
					}
				}
			}
			else //splitElementId[0] == "exerciseDifficulty"
			{
				column = "ExerciseDifficulty";
			}

			var dataString = "table=CompletedExercise&set=" + column + "='" + value + "'&where=ID=" + splitElementId[1];

			//Updates the database with the data for the exercises the user did.
			postData("services/complex_update.php", dataString, function(data) { });

			return false;
		});

		if(isMobile)//|| $(window).width < 960)
		{	
			$('.fitnessLogInput-name, .fitnessLogInput-weight, .fitnessLogInput-amount').unbind('focus');		
			$('.fitnessLogInput-name, .fitnessLogInput-weight, .fitnessLogInput-amount').bind('focus', function() 
			{
				hideFooter();				
			});

			$('.fitnessLogInput-name, .fitnessLogInput-weight, .fitnessLogInput-amount').unbind('blur');
			$('.fitnessLogInput-name, .fitnessLogInput-weight, .fitnessLogInput-amount').bind('blur', function() 
			{
				showFooter();
			});
		}

		//Detects if the operating system is mac
		if (navigator.appVersion.indexOf("Mac")!=-1)
		{
			$('.fitnessLogInput-difficulty').css("background-position",'1.64em 0.35em');
			$('.fitnessLogInput-amount-dropDown').css("background-position",'2.5em 0.35em');
		}
	}

	$("#button-removeExercise-forToday").click(function()
 	{		
		show('#loader-button-removeExercise-forToday');
				
 		removeExercise(0);

		return false;
 	});

	$("#button-removeExercise-forever").click(function()
	{
		show('#loader-button-removeExercise-forever');
		 		
	 	removeExercise(1);

	 	return false;
	});	

	/**
	* Formats the time of an input.
	*
	* @param value		The value to format
	*/
	function formatTime(value)
	{
		var values = value.split(":");
		var tempValue = "";

		for(var i = 0; i < values.length; i++)
		{
			tempValue += values[i];
		}

		tempValue = tempValue.substring(0,6);
		
		var valueLength = tempValue.length;

		for(var i = 6; i > valueLength; i--)
		{
			tempValue = "0" + tempValue;
		}

		var formattedValue = "";

		for(var i = 0; i < tempValue.length; i++)
		{
			if(i % 2 == 0 && i != 0)
			{
				formattedValue += ":" + tempValue[i];
			}
			else
			{
				formattedValue += tempValue[i];
			}
		}

		return formattedValue;
	}

	/**
	* Disables the next exercise button.
	*/
	function disableNextExercise()
	{
    	if(currentFitnessMean != "W")
    	{
    		$('#button-newExercise').text("Please come back tomorrow for more");
		    $('#button-newExercise').attr("disabled", true);
    	}
	}

    /**
    * Pops up the dialog to share on social media.
    */
	function shareOnSocialMedia()
	{
// 	  	//Checks to see if the user has social network notifications on.
// 		postData("services/data.php", "d=LiiiMtH/i]E[oofoOtgEi'l]CholanRS[Rm!/]STwait[[iW[lm']ESScNtcsFensEEaea", function(data)
// 		{             
// 			var socialNotificationSettings = jQuery.parseJSON(data);

// 			if(socialNotificationSettings[0].ShowSocialNotifications == 1)
// 			{
		    	hide('#loader-button-shareOnFacebook');
			    
			    loadPopup('#dialog-shareOnFacebook', null);

			    $('#button-shareOnFacebook').click(function()
	    		{
			    	show('#loader-button-shareOnFacebook');
			    	
			    	window.fbAsyncInit = function() {
				        FB.init({
				          appId      : '256882641152821',
				          status     : true,
				          xfbml      : true
				        });

				        FB.ui({ method: 'feed',
								name: 'I finished ' + exerciseDayGroupName + ' with Intencity!',
								caption: '',
								description: ('The fitness app that keeps you motivated by give you the potential to earn money.'),
								link: 'http://www.intencityapp.com',
								picture: 'http://www.intencityapp.com/images/web/logo_facebook.png'
						},
						function(response) 
						{
							dismissPopup(null);
						});
				      };

				      (function(d){
				       var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
				       js = d.createElement('script'); js.id = id; js.async = true;
				       js.src = "//connect.facebook.net/en_US/all.js";
				       d.getElementsByTagName('head')[0].appendChild(js);
				     }(document));

					return false;
	    		});

			    $('#button-shareOnFacebook-cancel').click(function()
	    		{
		    		dismissPopup(null);

		    		return false;
	    		});
// 		    }

// 			$('#cb_doNotShowSocial').click(function()
//     		{
// 	    		var showSocial = $(this).is(':checked') ? 0 : 1;
	    		
//     			//Inserts into settings to show or not show the social notifications
//     			postData("services/data.php", "d=Dsocftv[i]A[tThiiis'HEl/a]TenSSatc'r[R!m/]UEt[SoNio//Em'i]PSigE[wloan!a0WEael'&var=" + showSocial, function(data) { });
// 	    	});
// 		});
	}

	/**
	* Removes and exercise from the database.
	*
	* elementId			The ID of the exercise to remove.
	* excludeForever	Boolean value of whether or not to exclude the exercise forever. 
	*					Accepts either a 0 or a 1.
	*/
	function removeExercise(excludeForever)
	{	
		var exerciseLineItem = $('#exerciseId_' + removeExerciseNum);
		var exerciseName = $('#exerciseName_' + removeExerciseNum).val();

		//Removes the exercise from the database with a specified ID.
		postData("services/data.php", "d=LmxiEaa!r]E[OtEsRi'[DD0]TRClreEEelAI/]DEMpdcW[lm'[v]EF[oeee[Hm!/i/N/a&var=" + removeExerciseNum, function(data)
		{             
			var object = jQuery.parseJSON(data);

	 		if(object != "FAILURE")
	 		{
		 		//Adds an item to the exclusion table.
		 		postData("services/data.php", "d=ScEleelxsUa',av]E[Ti(,dv,nmEiTe'm,/r'']RNEuaEuoxsN,opASl/0/'r)]ITOlnicFecoeln)Ee/a'1//]NI[xsomxlrrEuiacuyVL(/ivrv/,a2&var=" + excludeForever + "," + exerciseName + ",E", function(data)
				{             
		 			var object = jQuery.parseJSON(data);

			 		if(object != "FAILURE")
			 		{
			 			exerciseNum--;

			 			if(exerciseNum < showBackButtonNum)
			 			{
				 			show('#button-exerciseLog-back');
			 			}
			 			
			 			dismissPopup(null);

			 			$(exerciseLineItem).remove();

	 					if($('#exerciseList').children().length < 1) 
		 				{
	 						$("#button-newExercise").text("Start exercising");
	 						
	 						hide('#saveRoutineWrapper');
	 					}
	 					else if($('#button-newExercise').text() == shareOnSocialMediaText)
	 					{
			 				$('#button-newExercise').text("Next exercise");
	 					}
				 	}
				 	else
				 	{
				 		alert('There was an error removing the exercise. Continue by clicking the "Next Exercise" button.');
			 		}

			 		removeLoaderForRemoveExerciseDialog(excludeForever); 
				});
	 		}
	 		else
	 		{
		 		alert('There was an error removing the exercise. Continue by clicking the "Next exercise" button.');

		 		removeLoaderForRemoveExerciseDialog(excludeForever);
	 		}  
		});
	}

	/**
	* Removes the loader for the Remove Exercise Dialog.
	*
	* @param excludeForever		A boolean value (0 or 1) for which button was pressed for remove exercise.
	*/
	function removeLoaderForRemoveExerciseDialog(excludeForever)
	{
		if(excludeForever == 0)
 		{
 			hide('#loader-button-removeExercise-forToday');
 		}
 		else
 		{
 			hide('#loader-button-removeExercise-forever');
 		}
	}

	var canSaveRoutine = false;

	$("#button-saveRoutine").click(function()
 	{		
	 	if(!canSaveRoutine)
	 	{
	 		show("#saveRoutineContainer");

	 		canSaveRoutine = true;
	 	}
	 	else
	 	{
			var exerciseDays = [];

		 	var routineName = "";
		 	var whereConditions = "";
 			var operators = "";
 			var exerciseDayLength = 0;

 			show('#loader-button-saveRoutine');
		 		
	 		$("#routineDays .selected").each(function()
 			{ 
 				var exerciseDayId = "#" + $(this).attr('id');

 				var splitExerciseDayIds = exerciseDayId.split("-");

				routineName = $('#saveRoutine-name').val(); 

				if(routineName == "")
				{
					var fullDate = new Date();

					var twoDigitMonth = fullDate.getMonth() + "";
						
					if(twoDigitMonth.length == 1)
					{
						twoDigitMonth++;
					}
						
					var twoDigitDate = fullDate.getDate(new Date()) + "";
					
					var currentDate = twoDigitMonth + "/" + twoDigitDate + "/" + fullDate.getFullYear();
					
					routineName = "Routine " + currentDate;
				}

				var dayOfWeek = splitExerciseDayIds[splitExerciseDayIds.length - 1];
					
				exerciseDays.push(dayOfWeek);									
 			});

	 		exerciseDayLength = exerciseDays.length;

	 		if(exerciseDayLength != 0)
	 		{
	 			//Loop through the exercise days to split up the where clause and place it into the dataString.
	 			for(var i = 0; i < exerciseDayLength; i++)
	 			{
	 	 			whereConditions += "&where" + i + "=RoutineName,ExerciseDay&conditions" + i + "=" + routineName + "," + exerciseDays[i];
	 			}

	 			//Loop through the exerciseDay length again, but this time multiply it by 2 so we can get the number of operators in the statement.
 				for(var i = 0; i < exerciseDayLength * 2; i++)
 				{
 	 				if(i != 0 && i % 2 == 0)
 	 				{
 	 					operators += "&operator" + i + "=OR";
 	 				}
 				}
					
	 			var dataString = "select_columns=ExerciseDay&table=Routine&condition_num=" + exerciseDays.length + whereConditions + operators;

	 			postData("services/complex_select.php", dataString, function(data)
 				{             
	 				var object = jQuery.parseJSON(data);

		 			if(object.length > 1)
					{
			 			loadPopup('#existingExercise', null);

			 			$("#button-existingExercise-overwrite").click(function()
		 			 	{		
			 				show('#loader-button-existingExercise-overwrite');
			 				
			 				var deleteString = "table=Routine&condition_num=" + exerciseDays.length + whereConditions + operators;

			 				postData("services/complex_delete.php", deleteString, function(data)
	 						{             
			 					saveRoutine(routineName, exerciseDays);  
	 						});

		 			 		return false;
		 			 	});

		 				$("#button-existingExercise-cancel").click(function()
		 			 	{		
		 					dismissPopup(null);

		 			 		return false;
		 			 	});
					}
					else
					{
						saveRoutine(routineName, exerciseDays);
					}

		 			hide('#loader-button-saveRoutine');     
 				});
 			}
 			else
 			{
	 			loadPopup('#dialog-selectExerciseDays', null);

	 			hide('#loader-button-saveRoutine');

	 			$("#button-selectExerciseDays-ok").click(function()
 			 	{		
	 				dismissPopup(null);

 			 		return false;
 			 	});
 			}
 		}		

 		return false;
 	});

	$(".routineDay").click(function()
 	{		
	 	var elementId = "#" + $(this).attr('id');
		toggleClass(elementId, "selected");

 		return false;
 	});
 		
	/**
	* Saves a routine to the database.
	*
	* @param routineName	The name of the routine to save.
	* @param dayOfWeek		The day of the week to save the routine to.
	*/
 	function saveRoutine(routineName, exerciseDays)
 	{ 	 				
 		var saveRoutineSegment = "";
 					
 		var statementNum = 0;
 			
 	 	for(var i = 0; i < exerciseDays.length; i++)
 	 	{
 	 		$(".fitnessLogInput-name").each(function()		
 	 		{ 		
 	 			var exerciseNameId = "#" + $(this).attr('id');

 	 			var exerciseName = $(exerciseNameId).val();

 	 			if(exerciseName != "")
 	 			{ 	 					
 	 	 			saveRoutineSegment += "&table" + statementNum + "=Routine&columns" + statementNum + "=RoutineName,ExerciseDay,ExerciseName&inserts" + statementNum + "=" + routineName + "," + exerciseDays[i] + ","  + exerciseName;

 	 	 			statementNum++;
 	 	 		}
	 	 	});
 	 	}

 	 	var saveRoutineString = "statements=" + statementNum + saveRoutineSegment;

 	 	postData("services/complex_insert.php", saveRoutineString, function(data)
 	 	{             
 	 		dismissPopup(null);

 			hide('#loader-button-existingExercise-overwrite');
 				
	 		hide('#saveRoutineContainer');

 	 		canSaveRoutine = false;

 	 		loadPopup('#savedRoutine', null);

    		setTimeout(function()
	        { 
    			dismissPopup(null); 
    		}, 3000);	      
 	 	});
 	}

	/**
	* Loads the fitness goal information.
	*/
 	function fitnessGoalInfo()
 	{
 	 	loadPopup('#dialog-fitnessGoal', null);

 	 	//Checks to see if the user has a fitness type from the settings.
		postData("services/data.php", "d=LTMtH[/]E[t[OtWEil]CispSi[R!m/]STnyRegEm'i]EFeseF[nsEalea'", function(data)
		{             
			var fitnessType = jQuery.parseJSON(data);
			
			switch(fitnessType[0].FitnessType)
			{
				case 'G':
					$("#button-gainWeight").click();
			    	break;
			  	case 'S':
			  		$("#button-sustain").click();
				    break;
			  	case 'L':
			  		$("#button-loseWeight").click();
				    break;
				case 'T':
					$("#button-tone").click();
				    break;
			  	default:
					break;
			  }
		});
 	}
</script>