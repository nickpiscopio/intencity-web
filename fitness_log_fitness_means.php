<div id="fitnessMean" class="logContainer">
	<div class="title centerText">
		<h1>How would you like to exercise today?</h1>
	</div>
	
	<div>
		<div id="loader-button-wingIt" class="loader loader-button"></div>
		<button id="button-wingIt" class="button listItem">I'll wing it</button>
	</div>
	
	<div>
		<div id="loader-button-tellMe" class="loader loader-button"></div>
		<button id="button-tellMe" class="button element-bottom listItem">Tell me what to do</button>
	</div>

	<div id="exerciseMean-myRoutineWrapper">
		<div id="loader-button-myRoutine" class="loader loader-button"></div>
		<div id="exerciseMean-myRoutine" class="element-bottom">
			<div>
				<p>My routine: </p>
				<select id="myRoutine-dropDown"></select>
				<button id="button-myRoutine" class="button">Select</button> 
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">		

	var fitnessMeansString = "d=DsrtM!'tN'Ell]A[tTuFs'artua!vE[!i]TenSeisa0Ceom/1Wa'a']UEt[Cnne//rRnea[Eie/]PSigE[rtenvr,unie'r/HRm/m&var=";
	var currentFitnessMeans = "";
	var currentRoutineName = "";

	//Removes the excluded items from the Exclusion table that were only placed in there for the day.
	postData("services/data.php", "d=LcWE'aDe!]E[Oi[[!i'ler0]TREuEEleAEuo]DEMlnRa/lNcFe]EF[xsoHmim/[[xdvr", function(data)
	{             
		//Checks to see if the user exercised today.
		postData("services/data.php", "d=L[eeH[/[e]E[[ptrWEil[D!RT]CDOoEc[R!m/NCA)]STFCexsEm'iAaUE]EIRMmldieEalea'DtD(", function(data)
		{
			var objects = jQuery.parseJSON(data);

			if(objects === null)
			{
				show('#fitnessMean');

				//Gets the routines that can be done today for the user.
				postData("services/data.php", "d=LiF[[R!NxA((P[NYuC]E[,a[ReEma/AeiDWK)URtOEBtem]CDueOonHi/i[re!OO)OBnmR[iaA]STRneMtW[lm'[caYEWG[oe[RRne]EIotNmRuiEEa'elDEsyDFEN[RYuiaeD[oN[S", function(data)
				{             
					var objects = jQuery.parseJSON(data);

		 			if(objects != "FAILURE" && objects !== null)
		 			{
						var optionsString = "";
						
						for(var i = 0; i < objects.length; i++)
						{
							var routineName = objects[i].RoutineName;
							
							optionsString += "<option value=" + routineName + ">" + routineName + "</option>";
						}
						
						$("#myRoutine-dropDown").append(optionsString);

						$('#button-tellMe').removeClass('element-bottom');
						
						show('#exerciseMean-myRoutineWrapper');
					}

					hide('#loader-fitnessLog'); 
				});
			}
			else
			{
				if($('#loader-fitnessLog').is(':hidden'))
				{
					show('#loader-fitnessLog');
				}
				
				replaceContent('#content-fitnessLog', 'fitness_log_exercise_log.php');
			} 
		});
	});

	/**
	 * Button click to give the user one of their routines.
	 */
	$("#button-wingIt").click(function()
	{
		show('#loader-button-wingIt');

		currentFitnessMeans = "W";
		currentRoutineName = "";

		//Sets the fitness means to winging it.
		postData("services/data.php", fitnessMeansString + currentFitnessMeans + "," + currentRoutineName, function(data)
		{             
			show('#loader-fitnessLog');
	    	
	    	replaceContent('#content-fitnessLog', 'fitness_log_exercise_log.php');

	    	hide('##loader-button-wingIt');  
		});

		return false;
	});

	/**
	 * Button click to give the user one of their routines.
	 */
	$("#button-tellMe").click(function()
	{
		show('#loader-button-tellMe');

		currentFitnessMeans = "G";
		currentRoutienName = "";

		//Inserts the stored procedure to get the muscle groups.
		postData("services/data.php", "d=LG/i]Leup'l][Mlom/]Cgsr(a)]Atceuse'", function(data)
		{             
			var object = jQuery.parseJSON(data);

			if(object != "FAILURE")
			{
				//Sets the fitness mean to the fitness guru.
				postData("services/data.php", fitnessMeansString + currentFitnessMeans + "," + currentRoutineName, function(data)
				{             
					show('#loader-fitnessLog');
			    	
			    	replaceContent('#content-fitnessLog', 'fitness_log_exercise_log.php');

			    	hide('#loader-button-tellMe');
				});
			}
			else
			{
				hide('#button-tellMe');
				
				alert("There was a problem generating exercises. Please select another form of exercising for today.");
			}  
		});
		
		return false;
	});
		
	/**
	 * Button click to give the user one of their routines.
	 */
	$("#button-myRoutine").click(function()
	{
		show('#loader-button-myRoutine');

		currentFitnessMeans = "R";

		currentRoutineName = $('#myRoutine-dropDown').text();

		//Sets the current fitness mean to the user's routine.
		postData("services/data.php", fitnessMeansString + currentFitnessMeans + "," + currentRoutineName, function(data)
		{             
			//Copies the routine the user selected into the current routine.
			postData("services/data.php", "d=Lni)]LoR/a][yt(/]Ccoem']Apui'el", function(data)
			{             
				show('#loader-fitnessLog');
				
		    	replaceContent('#content-fitnessLog', 'fitness_log_exercise_log.php');

		    	hide('#loader-button-myRoutine');
			}); 
		});	

		return false;
	});
		
</script>