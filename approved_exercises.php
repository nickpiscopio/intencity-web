<div id="approvedExercise">
	<div id="approvedHeader" class="title">
		<a id="mobileApproved">
			<img src="images/mobile/icon_approved_exercises.png"/>
		</a>
		<?php 
			if($_SESSION['isLoggedInUser'])
			{
		?>
				<h1>My Exercises</h1>	
		<?php 
			}	
			else
			{
		?>
				<h1>Exercises</h1>
		<?php 
			}			
		?>
		
	</div>
	<div id="approvedDropdown">
		<div class="close"></div>
		<div id="popup_content">
			<div id="approvedHeader">
				<div class="title popup">
					<?php 
						if($_SESSION['isLoggedInUser'])
						{
					?>
							<h1>My Exercises</h1>	
					<?php 
						}	
						else
						{
					?>
							<h1>Exercises</h1>
					<?php 
						}			
					?>
				</div>
			</div>
		</div>
		<div id="background" class="element-bottom">
			<div id="container-approvedExercises"></div>	

			<div>
				<div id="approvedExercise-submissionContainer">
					<div class="listItem">
						<h2>Exercise Submission</h2>
						<a id="approvedExercise-close" class="arrow-up dark"></a>
					</div>
					<div class="listItem listItemInput">
						<input id="approvedExercise-name"  type="text" placeholder="exercise name">
					</div>
					
					<div class="listItem selectInput">
						<select id="fitnessType">
							<option disabled selected value="N">fitness type</option>
							<option value="E">Exercise</option>
					  		<option value="S">Stretch</option>
					  		<option value="W">Warm up</option>
						</select>
					</div>
					
					<div id="container-selectExercise"class="listItem listItemInput">
						<p id="exerciseVideoFile">Select file (.mp4)</p>
						<button type="button" id="button-getExerciseVideo" class="button element-top element-bottom">Select video</button>
						<input type="file" id="button-exerciseVideo" name="exerciseVideo" accept="video/*">
					</div>			
					 
				</div>
				
				<?php 
					if($_SESSION['isLoggedInUser'])
					{
				?>
						<div>
							<div id="loader-button-addRoutine" class="loader loader-button"></div>
							<button id="submitExercise" class="button element-bottom">+</button>
						</div>		
				<?php 
					}				
				?>
				
			</div>
			
		</div>
	</div>
</div>

<div id="dialog-submittedExercise" class="dialog"> 
	<div class="close"></div>
	<div id="popup_content">
	   <div class="title popup">
			<h1>Success!</h1>
		</div>
		<p>Your exercise has been submitted.</p>
	</div>
</div>

<div id="dialog-error-noExercise" class="dialog"> 
	<div class="close"></div>
	<div id="popup_content">
	   <div class="title popup">
			<h1>Exercise name error!</h1>
		</div>
		<p>Please fill in the name of the exercise you are submitting.</p>
	</div>
</div>

<div id="dialog-error-noFitnessType" class="dialog"> 
	<div class="close"></div>
	<div id="popup_content">
	   <div class="title popup">
			<h1>Fitness type error!</h1>
		</div>
		<p>Please select the exercise's fitness type.</p>
	</div>
</div>

<div id="dialog-error-noVideo" class="dialog"> 
	<div class="close"></div>
	<div id="popup_content">
	   <div class="title popup">
			<h1>Exercise video error!</h1>
		</div>
		<p>Please select an exercise video that shows the user how to do the exercise in MP4 format.</p>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() 
	{		
		var mobile = false;
		var canSubmitExercise = false;
		var file;
		
		$("#mobileApproved").click(function()
		{		
			showApprovedMobile();
			return false;
		});

		$("#button-getExerciseVideo").click(function()
		{	
		    document.getElementById('button-exerciseVideo').click();
		});

		$('#button-exerciseVideo').on('change', function()
		{
			file = $('#button-exerciseVideo').get(0).files;

			$('#exerciseVideoFile').text(file[0].name);
		});

		//Select approved exercises from the database.
		postData("services/data.php", "d=LeOuEcE[Sra!m[sASREc[]E[eeRbdi[IUruieem[EWRDi[tu'[[ie]Cxia[meeN[NebtxilU.i[r!/a![EesmS]STrNFStxsNOsnmdcE[eaHUIdDtADYrNA]EEcsm[MitreIRJ[o[tEes.isrlEEe./N[s'ORBxeaC", function(data)
		{             
			var objects = jQuery.parseJSON(data);

 			if(objects != "FAILURE")
			{
 				$('#container-approvedExercises').empty();

 				if(objects != null)
 				{
 	 				var objectsLength = objects.length;
 	 				
 					for(var i = 0; i < objectsLength; i++)
 	 				{
 						$('#container-approvedExercises').append('<div class="approvedExercise-body">' + 
																		'<p>' + objects[i].ExerciseName + '</p>' + 
																	'</div>');
 	 				}

 					loadMobileApproved();

					show('#approvedExercise');
 					
				    $('#approvedExercise').css('display', 'inline-block');	
 				}
 				else
 				{
 					var isLoggedInUser = "<?php echo $_SESSION['isLoggedInUser'] ?>";

 					if(isLoggedInUser)
 					{
 						$('#container-approvedExercises').append("<div class='approvedExercise-body'>" + 
																	"<p class='disclaimer'>Don't you want to be Intencity famous? Submit an exercise or two, and if we like them we will add them to Intencity and credit you with the submission.</p>" + 
																"</div>");
 						loadMobileApproved();

						show('#approvedExercise');
 						
 					    $('#approvedExercise').css('display', 'inline-block');
 					}
 					else
 					{
 	 					hide('#approvedExercise');
 					}
 				}
			}
		});

		$("#submitExercise").click(function()
		{		
			if(canSubmitExercise)
			{				
				var exerciseName = $('#approvedExercise-name').val();
				var fitnessType = $('#fitnessType').val();

				if(exerciseName == "")
				{
					loadPopup('#dialog-error-noExercise', null);

	 				setTimeout(function()
			        { 
		    			dismissPopup(null); 
		    		}, 3000);
				}
				else if(fitnessType != "E" && fitnessType != "S" && fitnessType != "W")
				{
					loadPopup('#dialog-error-noFitnessType', null);

	 				setTimeout(function()
			        { 
		    			dismissPopup(null); 
		    		}, 3000);
				}
				else if(typeof file === "undefined" || $('#exerciseVideoFile').text() == "Select file (.mp4)")
				{
					loadPopup('#dialog-error-noVideo', null);

	 				setTimeout(function()
			        { 
		    			dismissPopup(null); 
		    		}, 3000);
				}
				else
				{
					show('#loader-button-addRoutine');

				    // Create a formdata object and add the files
					var data = new FormData();
					
					$.each(file, function(key, value)
					{
						data.append(key, value);
					});

					$.ajax({
						url: 'services/upload_file.php?file_name=' + exerciseName + '&file',
        				type: 'POST',
				        data: data,
				        cache: false,
				        dataType: 'json',
				        processData: false, // Don't process the files
				        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				        success: function(data, textStatus, jqXHR)
				        {
				        	if(typeof data.error === 'undefined')
				        	{
					        	var dataString = "d=Sbxilti,e)'aREr'odl,(//)]E[TtEsiexmTeoLtU(iU(''a/ntueiCE/r/,']RNSireaDreepUSuAelCAv//1c'o//UT,/a'P]ITOmdcE,,cayiRaVSm'D)a,r[apsa'D)v/3']NI[utee(maEesN,Vd,tsLE//,T,/0'v,c(la/m/RA'a2vr)&var=" + 
							    					exerciseName + "," + fitnessType + "," + exerciseName + "," + file[0].name;
		    					
				        		//Call function to add exercise to the database
				        		postData("services/data.php", dataString, function(data)
								{             
				        			var object = jQuery.parseJSON(data);

						 			if(object != "FAILURE")
									{
						 				loadPopup('#dialog-submittedExercise', null);

						 				setTimeout(function()
				 				        { 
				 			    			dismissPopup(null); 
				 			    		}, 3000);
									}
									else
									{
										alert("Couldn't submit exercise at this time. Try again later.");
									}

						 			clearSubmitExercise();
								});
				        	}
				        	else
				        	{
				        		// Handle errors here
				        		console.log('ERRORS: ' + data.error);
				        	}
				        },
				        error: function(jqXHR, textStatus, errorThrown)
				        {
				        	var opts = this;
						    
					    	setTimeout(function () 
							{
						      $.ajax(opts);
						    }, 1500);
				        }
				    });
				}	
			}
			else
			{
				$('#submitExercise').text("Submit");

				show('#approvedExercise-submissionContainer');

				canSubmitExercise = true;
			}

			return false;
		});

		$('#approvedExercise-close').click(function()
		{
			clearSubmitExercise();
		});

		/**
		* Clears the submit exercise container back to its default state and hides it.
		*/
		function clearSubmitExercise()
		{
			$('#submitExercise').text("+");

			hide('#approvedExercise-submissionContainer');

			$('#approvedExercise-name').val('');

			$('#fitnessType').prop('selectedIndex',0);

			var exerciseVideo = $('#button-exerciseVideo');

			exerciseVideo.replaceWith(exerciseVideo.val('').clone(true));

			$('#exerciseVideoFile').text('Select file (.mp4)');

			canSubmitExercise = false;

			hide('#loader-button-addRoutine');
		}
		
	
		/**
		* Displays the feedback dialog. This is so we can call this function from the menu as well.
		*/
		function showApprovedMobile()
		{
			loadPopup('#approvedDropdown', null);
		}

		function loadMobileApproved()
		{
			//When an id appears it will do the function
			$('#navbarTop h1').on('appear', function(event, $all_appeared_elements) 
			{
				if(!mobile)
				{	
				    // this element is now inside browser viewport
					hide('#approvedDropdown');     
				}
				
				mobile = true; 
		    });
		
			//When the id disappears it will do this function
			$('#navbarTop h1').on('disappear', function(event, $all_appeared_elements) 
			{
				if($('#approvedDropdown').is(':visible'))
				{
				    // this element is now inside browser viewport
					show('#approvedDropdown');     
			
					mobile = false; 
				}
			});	
		}
	});
</script>