<div id="add_exercise_admin">
	<div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
       <h1>Manage Exercise</h1>
       </div>
		<div class="add_exerciseOverflow">
	   		<div class="actionsBody">
	   			<form>
					<div id="add_exerciseHeader">
						<div class="settings_centerDivider">
							<div class="settings_leftColumn">
								<div>
									<h2>Exercise Name</h2>
								</div>
								<div class="textareaBorder element-bottom element-top">
									<div id="add_exerciseForm">
										<textarea id="exerciseName" placeholder="exercise name" type="text" onclick="" class="textarea element-top element-bottom"></textarea>
									</div>
								</div>
							</div>
							<div class="settings_leftColumn">
								<div>
									<h2>Alternative Names</h2>								
									<a><img src="images/web/icon_close.png" class="remove_alternativeName"></></a>
									<a><img src="images/web/icon_add.png" class="add_alternativeName"></></a>
								</div>
								<div id="add_alternativeName"></div>
							</div>
							<div class="settings_leftColumn">
								<div>
									<h2>Muscles</h2>
									<a><img src="images/web/icon_close.png" class="remove_muscles"></></a>
									<a><img src="images/web/icon_add.png" class="add_muscles"></></a>
								</div>
								<div id="wrapper-muscles"></div>
							</div>
							<div class="settings_leftColumn">
								<div>
									<h2>Muscles Groups</h2>
									<a><img src="images/web/icon_close.png" class="remove_muscleGroups"></></a>
									<a><img src="images/web/icon_add.png" class="add_muscleGroups"></></a>
								</div>
								<div id="add_muscleGroups"></div>
							</div>
						</div>
						<div class="settings_centerDivider">
							<div class="settings_centerColumn">
								<div class="equipmentAdd_admin">
									<h2>Equipment</h2>
									<a><img src="images/web/icon_close.png" class="remove_equipment"></></a>								
									<a><img src="images/web/icon_add.png" class="add_equipment"></></a>
								</div>
								<div id="add_equipment"></div>
							</div>
							<div class="settings_centerColumn">
								<div class="directionsAdd_admin">
									<h2>Directions</h2>
									<a><img src="images/web/icon_close.png" class="remove_directions"></></a>
									<a><img src="images/web/icon_add.png" class="add_directions"></></a>
								</div>
								<div id="add_directions"></div>
							</div>
							<div class="settings_centerColumn">
								<div class="addSummited_admin">
									<h2>Summited By</h2>
								</div>
								<div class="textareaBorder element-bottom element-top">
									<div id="add_exerciseForm">
										<textarea id="summitedBy_admin" placeholder="summited by" type="text" class="textarea element-top element-bottom"></textarea>
									</div>
								</div>
							</div>
							<div class="settings_centerColumn">
								<div class="addVideo_admin">
									<h2>Video URL</h2>
								</div>
								<div class="textareaBorder element-bottom element-top">
									<div id="add_exerciseForm">
										<textarea id="videoUrl" placeholder="add video" type="text" class="textarea element-top element-bottom"></textarea>
									</div>
								</div>
							</div>
							<div class="recommended_admin">
								<div>
									<input id="recommended" class="add_recommended_admin" type="checkbox" name="recommended" value="recommended"><p>Recommended</p></br>
								</div>
							</div>
							<div class="fitnessTypeAdd_admin settings_centerColumn">
								<select id="adminFitnessType" class="fitnessType_admin element-top element-bottom" required>
		    						<option id="default" disabled selected value="N">fitness type</option>
									<option value="E">Exercise</option>
							  		<option value="S">Stretch</option>
							  		<option value="W">Warm up</option>
					    		</select>
							</div>
						</div>
					</div>
					<div>
						<div id="loader-button-addExercise" class="loader loader-button"></div>
						<button id="button-addExercise"class="button button_submit element-top element-bottom">Submit</button>	
					</div>
				</form>			
			</div>
		</div>
	</div>
</div> <!--your content end-->
<script type="text/javascript">
	var alternativeNames = 0;
	var muscles = 0;
	var muscleGroups = 0;
	var equipment = 0;
	var directions = 0;
	var userAddedInput = 1;

	var numberOfElements = 0;
	$(document).ready(function()
	{
		//On document ready will load all the textareas once
		startup();

		//Commented out until fully working 
		$(document).on('input', '#exerciseName', function() 
		{
			$('#search-results').css('top', '7.938em');
			$('#search-results').css('z-index', '22');
			
			showEditResults();
// 			getEditableExerciseInfo('Chest Stretch');
		});
	});

	
	$('#button-addExercise').click(function()
	{
		var recommended = 0;
		var exerciseName = $('#exerciseName').val();
		var videoUrl = $('#videoUrl').val();
		var equipmentSql = "";
		var alternateNameSql = "";
	
		var muscleSql = convertToUrlString(1, ".muscle", "SsresNU,a]E[T(eNua)/r'r']RNMliaMlASv/1;]ITOcxsecmL'0//]NI[ueEcm,eeVE(a'v)");
		
		if($('#add_equipment_admin_0').val() == "")
		{
			equipmentSql = "&d" + numberOfElements + "=SuEc)Ur]E[Te(ieE';]RNEpesmAv/]ITOitrNVSa)]NI[qmnxeaL(/0'&var" + numberOfElements +"=" + exerciseName;

			numberOfElements++;
		}
		else
		{
			equipmentSql = convertToUrlString(1, ".equipment", "SuEc,imv/;]E[Te(iepnLS/'/r]RNEpesmqN)U',a']ITOitrNEmaA(r'1]NI[qmnxeaueteVEa0v/)");
		}
		
		var directionsSql = convertToUrlString(1, ".direction", "SrEc,eA//]E[Ti(ieco(v0v1)]RNDcesmi)U'ra']ITOenrNDtVSa,r;]NI[itoxearinLE/''/");
		var muscleGroupSql = convertToUrlString(2, ".muscleGroup", "Sspemuueur)Ur,']E[TGuraseeulpeiteEa'aa/;]RNMlEcN,rN,cEcPeASv/1'r)]ITOcoxsecomsrxscgL'0//v']NI[uer(ieMlGpaMGoreenaV(/'vr,/2");

		if($('#add_alternativeNames_admin_0').val() != "")
		{
			alternateNameSql = convertToUrlString(1, ".alternate", "SemresaAS/;]E[TsaixemrnV(v01)]RNEcVaEc,ei)'r,a]ITOrNatrNNatU//v']NI[xieen(iaemVaLEa''r/");
		}

		if($('#recommended').is(":checked"))
		{
			recommended = 1;
		}

		if(videoUrl == "")
		{
			videoUrl = "KcbeAo_JnSg";
		}
		
		var exerciseSql = "&d" + numberOfElements + "=SexiT,nLbLa'/vv4;]E[TsEs,RoVeRmtB(v,1a/'/r]RNEcreepmeiUidVE0'r,'r,a]ITOr(cayee,oStyU//v'r//v']NI[xieeNmecmddd,ue)AS'r/a/2,a3'/)&var" + 
							numberOfElements + "=" + exerciseName + "," + $('#adminFitnessType').val() + "," + recommended + "," + videoUrl + "," + "Intencity";

		numberOfElements++;
		
		var sqlString = "s=" + numberOfElements + muscleSql + equipmentSql + directionsSql + muscleGroupSql + alternateNameSql + exerciseSql;

		//Gets the user's equipment and selects the items that the user currently has.
		postData("services/data.php", sqlString, function(data)
		{             
			show('#loader-button-addExercise');
			
			var object = jQuery.parseJSON(data);

			if(object != "FAILURE")
			{
				hide('#loader-button-addExercise');
				
				dismissPopup(null);

				$('#add_alternativeName').empty();
				$('#wrapper-muscles').empty();
				$('#add_equipment').empty();
				$('#add_directions').empty();
				$('#add_muscleGroups').empty();

				clearField('#exerciseName,#videoUrl');

				$('#recommended').prop('checked', false);

				$('#adminFitnessType #default').attr("selected", "selected");
			}
		});

		return false;
	});

	function convertToUrlString(elementNumber, textBoxClassName, encryptedSql)
	{
		var urlString = "";

		var i = 1;
		
		$(textBoxClassName).each(function() 
		{
			var value = $(this).val();
			value = value.split("'").join("\\'");
			value = value.split('"').join('\\"');
			value = value.split(",").join("\\,");
			
			if(i == 1)
			{
				urlString += "&d" + numberOfElements + "=" + encryptedSql + "&var" + numberOfElements + "=" + $('#exerciseName').val() + "," + value;

				numberOfElements++;
			}
			else
			{
				urlString += "," + value;
			}		

			if(i < elementNumber) 
			{
				i++;
			}   
			else
			{
				i = 1;
			}
		});
		
		return urlString;
	}

	//Click event to get the correct textbox
	$('.textarea').click(function()
	{
		var textId = "#" + $(this).attr('id');
		$(textId).keyup(function()
		{
			resizeTextArea(textId);
		});
	});
	
	$('.muscleGroupTextarea').click(function()
	{
		var textId = "#" + $(this).attr('id');
		$(textId).keyup(function()
		{
			resizeTextArea(textId);
		});
	});

	$('.muscleGroupAmount_admin').click(function()
	{
		var textId = "#" + $(this).attr('id');
		$(textId).keyup(function()
		{
			resizeTextArea(textId);
		});
	});
	
	//Click events to add more text areas
	$('.add_alternativeName').click(function()
	{
		addAlternateName();
	});
	
	$('.add_muscles').click(function()
	{
		addMuscles();
	});
	
	$('.add_muscleGroups').click(function()
	{		
		addMusclesGroups();
	});
	
	$('.add_equipment').click(function()
	{
		addEquipment();
	});
	
	$('.add_directions').click(function()
	{
		addDirections();
	});
	
	//Click events to remove text areas
	$('.remove_alternativeName').click(function()
	{
		removeAlternativeName();
	});
	
	$('.remove_muscles').click(function()
	{
		removeMuscles();
	});
	
	$('.remove_muscleGroups').click(function()
	{
		removeMusclesGroups();
	});
	
	$('.remove_equipment').click(function()
	{
		removeEquipment();
	});
	
	$('.remove_directions').click(function()
	{
		removeDirections();
	});
	
	//function to remove unwanted textbox
	function removeAlternativeName()
	{
		if(alternativeNames > userAddedInput)
		{		
			alternativeNames = alternativeNames - 1;
			
			$('#alternativeNames_admin_' + alternativeNames).remove();
		}
	}
	
	function removeMuscles()
	{
		if(muscles > userAddedInput)
		{		
			muscles = muscles - 1;
			
			$('#addMuscles_admin_' + muscles).remove();
		}
	}
	
	function removeMusclesGroups()
	{
		if(muscleGroups > userAddedInput)
		{		
			muscleGroups = muscleGroups - 1;
			
			$('#addMuscleGroup_admin_' + muscleGroups).remove();
		}
	}
	
	function removeEquipment()
	{
		if(equipment > userAddedInput)
		{		
			equipment = equipment - 1;
			
			$('#addEquipment_admin_' + equipment).remove();
		}
	}
	
	function removeDirections()
	{
		if(directions > userAddedInput)
		{		
			directions = directions - 1;
			
			$('#addDirections_admin_' + directions).remove();
		}
	}

	/**
	* Shows the search results if the searchbox is the item that is focused.
	*/
	function showEditResults()
	{
		if($('#exerciseName').is(":focus"))
		{	
			search = $('#exerciseName').val();
			
			if(search != "")
			{
				show('#loader-search');

				if(typeof ajaxRequest !== "undefined")
				{
					ajaxRequest.abort();
				}

				searchPlaceholder = $('#searchBox').attr('placeholder');
				
				doSearch("d=LeOxWEs'a]E[eeRe[[eeI[r%]Cxia[reEcN[E0]STrNFEiHEimK//]EEcsm[McsRxreaL%v'&var=" + search);
				
			}
			else
			{
				if(typeof ajaxRequest !== "undefined")
				{
					ajaxRequest.abort();
				}
				
				$('#search-resultBody').empty();
				hide('#search-results');
				hide('#loader-search');
			}
			
		}
		else
		{
			$('#search-resultBody').empty();
			hide('#search-results');
		}
	}

	//first load textbox events
	function startup()
	{
		addNewTextbox("#add_alternativeName", "alternativeNames_admin_" + alternativeNames, "add_alternativeNames_admin_" +  alternativeNames, "alternative name", "alternate", alternativeNames++);
		addNewTextbox("#wrapper-muscles", "addMuscles_admin_" + muscles, "add_muscles_admin_" + muscles, "muscle", "muscle", muscles++);
		addNewTextbox("#add_equipment", "addEquipment_admin_" + equipment, "add_equipment_admin_" + equipment, "equipment", "equipment", equipment++);
		addNewTextbox("#add_directions", "addDirections_admin_" + directions, "add_directions_admin_" + directions, "directions", "direction", directions++);
		addMusclesGroups();
	}
	/**
		function that dynamically adds a new textbox for the designated area
		clickedId		Id to be appeneded to
		divId			The id of the div that holds the textarea
		textAreaId		The id of the text area being created
		placeHolder		The text that will be in the empty textarea
		className		The class name of textbox area
		textboxCounter	What variable should be added
	*/
	function addNewTextbox(clickedId, divId, textAreaId, placeHolder, className, textboxCounter)
	{

		$(clickedId).append('<div class="textareaBorder element-bottom element-top" id=' + divId + '><div id="add_exerciseForm"><textarea id=' + textAreaId + '  placeholder=' + placeHolder + ' type="text" class="' + className + ' textarea element-top element-bottom"></textarea></div></div>');

		textboxCounter; 
			
		//Unbinding event to rebind the keyup function to the new textboxes
		$('.textarea').unbind('keyup');		
		$('.textarea').bind('keyup', function()
		{
			var textId = "#" + $(this).attr('id');
			
			resizeTextArea(textId);
		});
	}

	/**
	* Gets information from a specified exercise.
	*
	* @param exerciseName	The name of the exercise to get the information.
	*/
	function getEditableExerciseInfo(exerciseName)
	{		
		var searchString = "d=LepeeiSF[EcNa']E[eeycddUtd[ErsErav]Cxia,on,LbtyxiWEsm/0]STrNTRmde,iBOeeRee!r]EEcsm,emeVoRumeRMc[H[xie'/&var=" + exerciseName;

		var directions = "d=LoDcEEN'Dt]E[rR[tHxc'a/EBD.]Cit[riWEsm/0R[eo]STenMenRee!rO[iiD]EDciFOio[[riaev[RYrcnI&var=" + exerciseName;
		
		var alternateName = "d=LiMemrEN!Dxian]E[m[Oraitxce'a/BEsVtD]CaanEcNVWEes/0ORreei]STeaRxseaHEimv'E[car.]ENVrtF[iean[R[raer[R[YeNmaI&var=" + exerciseName;
		
		var equipment = "d=LnREtEca'q.]E[umFqnREa!v[D[mt]CqmNMueWesm/OR[iD]STit[[p[ErN'0RBun]EEpeaeOimH[xieer/EYEpeI&var=" + exerciseName;
                                       		
		var muscleGroup = "d=Lr,cEceMlEsm0O[.]E[sNelpiPeR[eo[eierRRlrp]Cueuueuert[MGpEEN!a'Bueu]STcomsrxscgOsrW[ca//DYcoD]EMlGpaMGoreenaFucuHRxre'v[E[MsGI&var=" + exerciseName;

		var muscleNames = "d=La[cEemORI]E[sFMlRrsv0[[[s]CueeueEEN!a'Bue]STcmOsW[ca//DYcD]EMlN[RM[Hxiee'rREMl.&var=" + exerciseName;
		
		//Searches for a specific exercise and displays it to the user.
		postData("services/data.php", searchString, function(data)
		{             
			var objects = jQuery.parseJSON(data);

 			if(objects != "FAILURE" && objects != null)
			{	
				$('#exerciseName').val(objects[0].ExerciseName);
				
				$('#videoUrl').val(objects[0].VideoURL);
				
				$('#summitedBy_admin').val(objects[0].SubmittedBy);		

				if(objects[0].Recommended = 1)
				{
					$('.add_recommended_admin').prop('checked', true);
				}
				else
				{
					$('.add_recommended_admin').prop('checked', false);
				}

				$('#adminFitnessType').val(objects[0].Type);
				
				resizeTextArea('#videoUrl');
				resizeTextArea('#summitedBy_admin');
				resizeTextArea('#exerciseName');
				
			}
			else
			{
				alert("Couldn't find exercise information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup');
 			hide('#search-results'); 
		});


		//Searches for a specific directions and displays to edit.
		postData("services/data.php", directions, function(data)
		{             
			var objects = jQuery.parseJSON(data);
			
 			if(objects != "FAILURE" && objects != null)
			{	
 	 			for(var s = 0; s < objects.length; s++)
 	 			{
 	 	 			removeDirections();
 	 			}
 							
				for(var i = 0; i < objects.length; i++)
				{
					$('#add_directions_admin_' + i).val(objects[i].Direction);

					resizeTextArea('#add_directions_admin_' + i);

					if (i < objects.length - 1)
					{
							addDirections();
					}
				}
			}
			else
			{
				alert("Couldn't find directions information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup');
 			hide('#search-results'); 
		});
		//Searches for a specific alternate names of the exercise for editing.
		postData("services/data.php", alternateName, function(data)
		{             
			var objects = jQuery.parseJSON(data);
			
 			if(objects != "FAILURE" && objects != null)
			{	
 	 			for(var s = 0; s < objects.length; s++)
 	 			{
 	 				removeAlternativeName();
 	 			}
 							
				for(var i = 0; i < objects.length; i++)
				{
					$('#add_alternativeNames_admin_' + i).val(objects[i].NameVariant);

					resizeTextArea('#add_alternativeNames_admin_' + i);

					if (i < objects.length - 1)
					{
						addAlternateName();
					}
				}
			}

			else if (objects == 'FAILURE')
			{
				alert("Couldn't find alternate names information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup');
 			hide('#search-results'); 
		});

		//Searches for a specific muscle group of the exercise for editing.
		postData("services/data.php", muscleGroup, function(data)
		{             
			var objects = jQuery.parseJSON(data);
			
 			if(objects != "FAILURE" && objects != null)
			{	
 	 			for(var s = 0; s < objects.length; s++)
 	 			{
 	 				removeMusclesGroups();
 	 			}
 							
				for(var i = 0; i < objects.length; i++)
				{
					$('#add_muscleGroups_admin_' + i).val(objects[i].MuscleGroupName);

					$('#add_muscleGroupsAmount_admin_' + i).val(objects[i].MuscleGroupExercisePercentage);

					resizeTextArea('#add_muscleGroups_admin_' + i);
					
					resizeTextArea('#add_muscleGroupsAmount_admin_' + i);

					if (i < objects.length - 1)
					{
						addMusclesGroups();
					}
				}
			}
			else
			{
				alert("Couldn't find muscle groups information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup');
 			hide('#search-results'); 
		});

		//Searches for a specific the equipment of the exercise for editing.
		postData("services/data.php", equipment, function(data)
		{             
			var objects = jQuery.parseJSON(data);
			
 			if(objects != "FAILURE" && objects != null)
			{	
 	 			for(var s = 0; s < objects.length; s++)
 	 			{
					removeEquipment();
 	 			}
 							
				for(var i = 0; i < objects.length; i++)
				{
					$('#add_equipment_admin_' + i).val(objects[i].EquipmentName);

					resizeTextArea('#add_equipment_admin_' + i);

					if (i < objects.length - 1)
					{
						addEquipment();
					}
				}
			}
			else
			{
				alert("Couldn't find equipment information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup');
 			hide('#search-results'); 
		});

		//Searches for a specific the technical muscle names of the exercise for editing.
		postData("services/data.php", muscleNames, function(data)
		{             
			var objects = jQuery.parseJSON(data);
			
 			if(objects != "FAILURE" && objects != null)
			{	
 	 			for(var s = 0; s < objects.length; s++)
 	 			{
					removeMuscles();
 	 			}
 							
				for(var i = 0; i < objects.length; i++)
				{
					$('#add_muscles_admin_' + i).val(objects[i].MuscleName);

					resizeTextArea('#add_muscles_admin_' + i);

					if (i < objects.length - 1)
					{
						addMuscles();
					}
				}
			}
			else
			{
				alert("Couldn't find technical muscle names information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup');
 			hide('#search-results'); 
		});
	}

	//function to add more equipment textboxes 
	function addEquipment()
	{
		addNewTextbox("#add_equipment", "addEquipment_admin_" + equipment, "add_equipment_admin_" + equipment, "equipment", "equipment", equipment++);
	}

	//function to add more equipment textboxes 
	function addMuscles()
	{
		addNewTextbox("#wrapper-muscles", "addMuscles_admin_" + muscles, "add_muscles_admin_" + muscles, "muscle", "muscle", muscles++);
	}
	//function to add more direction textboxes 
	function addDirections()
	{
		addNewTextbox("#add_directions", "addDirections_admin_" + directions, "add_directions_admin_" + directions, "directions", "direction", directions++);
	}

	//function to add more Alternate Names textboxes 
	function addAlternateName()
	{
		addNewTextbox("#add_alternativeName", "alternativeNames_admin_" + alternativeNames, "add_alternativeNames_admin_" +  alternativeNames, "alternative name", "alternate", alternativeNames++);
	}
	//function to keep adding textbox for muscle groups
	function addMusclesGroups()
	{
		//Do not appened the two textareas together with + inbetween them it messesup the spacing
		$('#add_muscleGroups').append( '<div class="textareaBorder element-bottom element-top" id="addMuscleGroup_admin_'+ muscleGroups +'"><div id="add_exerciseForm"><textarea id="add_muscleGroups_admin_'+ muscleGroups +'"" type="text" placeholder="muscle group" class="muscleGroup muscleGroupTextarea element-top element-bottom"></textarea><textarea id="add_muscleGroupsAmount_admin_'+ muscleGroups +'" type="text" placeholder="%" class="muscleGroup element-top muscleGroupAmount_admin element-bottom"></textarea></div></div>');
	
		muscleGroups++;
		$('.muscleGroupTextarea').unbind('keyup');		
		
		$('.muscleGroupTextarea').bind('keyup',function()
		{
			var textId = "#" + $(this).attr('id');
		
			resizeTextArea(textId);

		});

		$('.muscleGroupAmount_admin').unbind('keyup');		
		
		$('.muscleGroupAmount_admin').bind('keyup', function()
		{
			var textId = "#" + $(this).attr('id');
			
			resizeTextArea(textId);
		});
	}
</script>