<div id="userEquipment" class="logContainer">
	<div class="title centerText">
		<h1>Select available equipment:</h1>
		<a id="selectAll" class="rightFloat"><p id="selectAllText" class="equipmentSelect">all</p></a>
		<a id="deselectAll" class="rightFloat"><p id="deselectAllText" class="equipmentSelect">none</p></a>
	</div>
	<div id="equipmentList"></div>
	<div>
		<div id="loader-button-exerciseSurvey-submit" class="loader loader-button"></div>
		<button id="button-exerciseSurvey-submit" class="button element-bottom listItem">Submit</button>
	</div>
</div>

<script type="text/javascript">

	//Checks to see if the user has added equipment to the database.
	postData("services/data.php", "d=LnRUptEl]E[umFsi[E!ei]CqmNMeueEa'a]STit[[EmW[lm']EEpeaeOrqnHRmi//", function(data)
	{             
		var objects = jQuery.parseJSON(data);

		if(!objects)
		{			
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

					show('#userEquipment');

					hide('#loader-fitnessLog');
				}
				else
				{
					if($('#loader-fitnessLog').is(':hidden'))
					{
						show('#loader-fitnessLog');
					}

					replaceContent('#content-fitnessLog', 'fitness_log_exercise_log.php');
				}

				$(".equipmentLineItem").click(function()
				{
					var elementId = $(this).attr('id');

					toggleClass("#" + elementId, "selected");
					
					checkEquipment();
				});
			});
		}
		else
		{
			if($('#loader-fitnessLog').is(':hidden'))
			{
				show('#loader-fitnessLog');
			}
			
			replaceContent('#content-fitnessLog', 'fitness_log_fitness_means.php');
		} 
	});

	/**
	* Submits the user's equipment list to the database.
	*/
	$("#button-exerciseSurvey-submit").click(function()
	{
		var dataString = "statements=" + $('.selected').length;

		var i = 0;

		show('#loader-button-exerciseSurvey-submit');

		$("#equipmentList .selected").each(function()
		{ 
			var equipmentId = "#" + $(this).attr('id');

			dataString += "&table" + i + "=UserEquipment&columns" + i + "=EquipmentName&inserts" + i + "=" + $(equipmentId).text();

			i++;
		});	

		postData("services/complex_insert.php", dataString, function(data)
		{     
			show('#loader-fitnessLog');

			replaceContent('#content-fitnessLog', 'fitness_log_fitness_means.php');

			hide('#loader-button-exerciseSurvey-submit');
		});

		return false;
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