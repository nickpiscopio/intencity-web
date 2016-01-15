<div id="routine">
	<div id="routineHeader" class="title">
		<a id="mobileRoutines">
			<img src="images/mobile/icon_routines.png"/>
		</a><h1>Routines</h1>
	</div>
	<div id="routineDropdown" class="title_popup">
		<div class="close"></div>
		<div id="popup_content">	
			<div id="routineHeader">
				<div class="title popup">
					<h1>Routines</h1>
				</div>
			</div>
		</div>
		<div id="background" class="element-bottom">
			<div id="container-routine"></div>
			<div>
<!-- 				<button id="routineAdd" class="button element-bottom">+</button> -->
			</div>
		</div>
	</div>
</div>

<div id="dialog-removeRoutine"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Remove Routine</h1>
		</div>
		
		<div>
			<div id="loader-button-removeRoutine" class="loader loader-button"></div>
			<button id="button-removeRoutine" type="submit" class="button element-top-separated element-top element-bottom">Remove the routine</button>	
		</div>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="dialog-copyRoutine" class="dialog"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Copy Routine</h1>
		</div>
		
		<div>
			<div id="loader-button-copyRoutine" class="loader loader-button"></div>
			<button id="button-copyRoutine" type="submit" class="button element-top-separated element-top element-bottom">Copy to your routines</button>			
		</div>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<!-- On click event to pop up routines -->
<script type="text/javascript">

	var mobileResolution = 959;

	var mobile = false;
	
	$(document).ready(function() 
	{
		$("#mobileRoutines").click(function()
		{		
			showRoutineMobile();
	
			return false;
		});

		//When an id appears it will do the function
		$('#navbarTop h1').on('appear', function(event, $all_appeared_elements) 
		{
			if(!mobile)
			{
			    // this element is now inside browser viewport
				hide('#routineDropdown');     
			}
			
			mobile = true; 
	    });

		//When the id disappears it will do this function
		$('#navbarTop h1').on('disappear', function(event, $all_appeared_elements) 
		{
			if($('#routineDropdown').is(':visible'))
			{
				// this element is now inside browser viewport
				show('#routineDropdown');     

				mobile = false; 
			}
	    });

		//Selects the routine names from the database for a specified user.
		postData("services/data.php", "d=L.ia[tE[Rl.i[r/on[ia]E[uRtmMi[IUroi.UrlE.!UBRemORtm]ConDeeOoN[Neuea!m[RsiGP[N[EYeeC]STtIuNFRnNOsntE[eaHUIdOYtaRBuNA]ERie,on[RueIRJ[o[nmi[sEWEeD/[R[uieDR[on[S", function(data)
		{             
			var objects = jQuery.parseJSON(data);

			if(objects != null)
			{
		    	var addRemove = "<?php echo $_SESSION['isLoggedInUser']; ?>";				
		    	
		    	for(var i = 0; i < objects.length; i++)
		    	{
			    	var routineAddRemove = '';
			    	
			    	if(addRemove)
			    	{
			    		routineAddRemove = '<a id="routineDelete_' + objects[i].ID + '" class="routine-delete actionElements">' +
												'<img src="images/web/icon_close.png"/>' +
											'</a>';
			    	}
			    	else
			    	{
			    		routineAddRemove = '<a id="routineAdd_' + objects[i].ID + '" class="routine-copy actionElements">' +
												'<img src="images/web/icon_add.png"/>' +
											'</a>';
			    	}
			    	
		    		$('#container-routine').append('<div id="routineBody_' + objects[i].ID + '" class="routine-body">' +
				    							 		'<input id="routineName_' + objects[i].ID + '" class="routine-name actionElements" type="text" value="' + objects[i].RoutineName + '">' +
				    							 		routineAddRemove + 
				    							 		'<div id="routineInfo_' + objects[i].ID + '" class="routine-info"></div>' +
												  	'</div>');
		    	}

		    	$(".routine-name").click(function()
	    		{
	    			var splitElementId = $(this).attr('id').split("_");

	    			var routineName = $('#routineName_' + splitElementId[1]).val();
	    			var routineInfo = '#routineInfo_' + splitElementId[1];
	    			
	    			//Shows the routine information.
	    			postData("services/data.php", "d=LeesOoNeN!.i[r/eeRRiS]E[eexeRunJNs[eEtelE.![un!v0[[nA]CxiacDF[[EOUU.iom[RsiARi'r[Eue[]STrNEiyMtI[[[smRnaHUIdDta//DYtIC]EEcsm,ra[RieNRIrOraluiEWEeD/[NoNma'ORBo.D&var=" + 
	    	    				routineName, function(data)
	    			{
						var objects = jQuery.parseJSON(data);

						if(objects != "FAILURE")
						{
							var routineInfoLength = objects.length;

							var routineInfoHtml = "";

							var week = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

							var exerciseDay = "";
							
							for(var i = 0; i < routineInfoLength; i++)
							{
								var day = parseInt(objects[i].ExerciseDay) - 1;
								
								if(exerciseDay != week[day])
								{
									exerciseDay = week[day];
									
									routineInfoHtml += "<h2>" + exerciseDay + "</h2><p>" + objects[i].ExerciseName + "</p>";
								}
								else
								{
									routineInfoHtml += "<p>" + objects[i].ExerciseName + "</p>";
								}
							}

							$(routineInfo).empty();
							$(routineInfo).append(routineInfoHtml);

							show(routineInfo);
						}
						
//	     		 		hide('#loader-button-removeRoutine');  
	    			});

	    			return false;
	    		});

	    		show('#routine');

			    $('#routine').css('display', 'inline-block');
			}

	    	if(addRemove)
	    	{
	    		loadDeleteRoutineFunctionality();
	    	}
	    	else
	    	{
	    		loadCopyRoutineFunctionality();
	    	}
		});
	});

	/**
	* Loads the routine functionality when the routine line items have been created.
	*/
	function loadDeleteRoutineFunctionality()
	{		
		$(".routine-delete").click(function()
		{
			var splitElementId = $(this).attr('id').split("_");

			var routineName = $('#routineName_' + splitElementId[1]).val();
			var routineListItemId = "#routineBody_" + splitElementId[1];

			dismissPopup(null);
			
			loadRemoveRoutineFunctionality(routineName, routineListItemId);

			return false;
		});
	}

	/**
	* Loads the copy routine functionality to copy a routine from a specified user into the routine list of the person logged in.
	*/
	function loadCopyRoutineFunctionality()
	{		
		$(".routine-copy").click(function()
		{
			var splitElementId = $(this).attr('id').split("_");

			var routineName = $('#routineName_' + splitElementId[1]).val();

			dismissPopup(null);
			
			if(mobile)
			{
				loadPopup('#dialog-copyRoutine', function()
				{
					loadPopup('#routineDropdown', null);
				});	
			}
			else
			{
				loadPopup('#dialog-copyRoutine', null);
			}
					
			$("#button-copyRoutine").click(function()
			{
				show('#loader-button-copyRoutine');

				//Copies a routine from someone else's routine list.
				postData("services/data.php", "d=EomS[tRIROEleaEdNom/ORtARSle[AiIUIt[*On[Lm]A[Bne[Ti.oi[[IUs.!niWrDiDoinav[[[I[DoiTEim;TRmS[L[S[uS[MopDPEoi]TA[t[SCo[MueJ[r[aRiEEU./[t.t!a'DonDPuepT'a'PuepTLNTTnETFtT;O[tT;]CELuTALRnFRnNOsNriu.lRe![RnuN'0RBu.UEteEa/lUEteE!;ENoeE[[imRARnp]RTERiepEEue*O[tNENe[Uemotm[H[sI/AueRieer/EYRie;T[nm[[m!i/D[onT[DNIR[ORiLCRRuee[TBuee&var=" + 
							routineName, function(data)
				{
					dismissPopup(null);

			 		hide('#loader-button-removeRoutine');  
				});			

				return false;
			});

			return false;
		});
	}

	function loadRemoveRoutineFunctionality(routineName, routineListItemId)
	{		
		if(mobile)
		{
			loadPopup('#dialog-removeRoutine', function()
			{
				loadPopup('#routineDropdown', null);
			});	
		}
		else
		{
			loadPopup('#dialog-removeRoutine', null);
		}
				
		$("#button-removeRoutine").click(function()
		{
			show('#loader-button-removeRoutine');

			removeRoutine(routineName, routineListItemId);			

			return false;
		});
	}

	function removeRoutine(routineName, routineListItemId)
	{
		//Removes a routine from a user's routine list.
		postData("services/data.php", "d=LuEEelR'r]E[OeHm//Ana!0]TRRiEa'aDuee/]DEMtW[lm'[imv']EF[on[Ri!i[NotN/a&var=" + routineName, function(data)
		{             
			$(routineListItemId).remove();

			dismissPopup(null);

	 		hide('#loader-button-removeRoutine');  
		});
	}
	
	/**
	* Displays the feedback dialog. This is so we can call this function from the menu as well.
	*/
	function showRoutineMobile()
	{
		loadPopup('#routineDropdown', null);
	}

	//Will switch the routine and the delete routine position
	function showRemoveRoutine()
	{	
		show('#dialog-removeRoutine');
	}		
</script>