<div id="search-results" class="lastElementPadding">
	<div id="search-resultBody"></div>
</div>

<p id="resultsNotFound">0 results were found.</p>

<script type="text/javascript">

	var ajaxRequest;
	
	var search = "";
	var searchPlaceholder = "";

	$(document).ready(function()
	{		
		$(document).on('click', function(event) 
		{
			$('#search-results').css('top', '0');
			$('#search-results').css('z-index', '1');
			
			if(!$(event.target).is('#searchBox') && !$(event.target).is('#search-resultBody') && !$(event.target).is('.backgroundPopup') && $('#search-results').is(':visible'))
			{	
				hide('#search-results');

				return false;
			}
		});
		
		$(document).on('input', '#searchBox', function() 
		{
			showResults();
		});
	});

	/**
	* Shows the search results if the searchbox is the item that is focused.
	*/
	function showResults()
	{
		if($('#searchBox').is(":focus"))
		{	
			search = $('#searchBox').val();
			
			if(search != "")
			{
				show('#loader-search');

				if(typeof ajaxRequest !== "undefined")
				{
					ajaxRequest.abort();
				}

				searchPlaceholder = $('#searchBox').attr('placeholder');
				
				if(searchPlaceholder == "Search for a person")
				{
					doSearch("d=LtsmU[Oa[m[vANuANy[[oT'aa]E[,eae[WR(rN',aLEa[OAp'[OAo!'Ncy[EBLm]CDraN[Me[CFt[LN)%r'Dcte'TcteNOcn'OR[e]STFNLaRsHCTse'seK//NToyTD[upDD[upRDYt]EIism,tFOrEENAim,[ta[I'0%[[cnT!N[cnT['ATAte![R[sN&var=" + search);
				}
				else
				{
					doSearch("d=LeOxWEs'a[cN]E[eeRe[[eeI[r%OEra]Cxia[reEcN[E0[EYsm]STrNFEiHEimK//RBee]EEcsm[McsRxreaL%v'DR[xie&var=" + search);
				}
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

	/**
	* Searches the database.
	*
	* @param dataString		The string that data.php accepts to search.
	*/
	function doSearch(dataString)
	{
		ajaxRequest = $.ajax({
						    type: "POST",
						    url: "services/data.php",
						    data: dataString,
						    success: function(data)
						    {	    					
						 		var objects = jQuery.parseJSON(data);
				
						 		var objectsLength = 0;
						 		
						 		if(objects)
							 	{
						 			objectsLength = objects.length;	
							 	}
				
					 			if(objectsLength > 0)
								{
					 				$('#search-resultBody').empty();
					 				
									for(var i = 0; i < objectsLength; i++)
									{
										if(searchPlaceholder == "Search for a person")
										{
											addToSearchResult(objects[i].ID, objects[i].FirstName + " " + objects[i].LastName);
										}
										else
										{
											addToSearchResult(i, objects[i].ExerciseName);
										}
									}	
				
									$(".searchResult-item").unbind("click");
									$(".searchResult-item").bind('click', function()
									{
										var splitElementId = $(this).attr('id').split("_");

										if(searchPlaceholder == "Search for a person")
										{
											loadUser(splitElementId[1]);
										}
										else if ($('#add_exercise_admin').is(':visible'))
										{
											var searchItemName = $('#searchResult-exercise_' + splitElementId[1]).text();

											getEditableExerciseInfo(searchItemName);
											
										}
										else
										{
											var searchItemName = $('#searchResult-exercise_' + splitElementId[1]).text();
											
											getExerciseInfo(searchItemName);
										}
				
										return false;
									});	
				
									show('#search-results');	
									hide('#loader-search');					
								}
								else
								{
									hide('#search-results');
									
									show('#resultsNotFound');
									
									hide('#loader-search');
				
									setTimeout(function()
							        { 
										hide('#resultsNotFound');
						    		}, 3000);
								}
						    }, 
						    error: function (jqXHR, exception) 
						    {   
						    	if(jqXHR.status && jqXHR.status == 500)
							    {
								    var opts = this;
									    
							    	setTimeout(function () 
									{
								      $.ajax(opts);
								    }, 1500);
				                }								   
							}
						});	
	}

	/**
	* Adds an item to the list of search results.
	*
	* @param ID				The ID to add to the search result.
	* @param searchResult	The retrieved item to add to the result list.
	*/
	function addToSearchResult(ID, searchResult)
	{		
		$('#search-resultBody').append('<div id="searchResult-item_' + ID + '" class="searchResult-item">' +
				'<p id="searchResult-exercise_' + ID + '" class="searchResult-exercise">' + searchResult + '</p>' +
//												'<a id="searchResult-add_' + i + '" class="searchResult-add">+</a>' +
			'</div>');
	}

	/**
	* Gets information from a specified exercise.
	*
	* @param exerciseName	The name of the exercise to get the information.
	*/
	function getExerciseInfo(exerciseName)
	{	
		if($('#search-resultPopup').length > 0)
		{
			$('#search-resultPopup').remove();
		}
		
		$('#content-main').append('<div id="search-resultPopup">' +
									    '<div class="close"></div>' +
									    '<div id="popup_content">' +
										    '<div class="title popup">' +
												'<h1 id="search-resultPopupTitle">&nbsp;</h1>' +
											'</div>' +
									    '</div>' +
									    '<div id="loader-search-resultPopup" class="loader loader-button loader-title"></div>' +
									'</div>');

		show('#loader-search-resultPopup');


		loadPopup('#search-resultPopup', null);
				
		var searchString = "d=Lesmt,LyOIIi[E.erc[RiEN'Dt]E[eeiecVemtBMxcROrnxccemei.NeEcxc'a/EBD.]CxiEN,eoUSid[reN[eoNsxiacnesH[resm/0R[eo]STr.caiiiRbeFEiNJDtOeerNDtEimExsee!rO[iiD]EEcsxreDrndo,ut[Res[E[Nci[riEes!ioxreaWEe.riaev[RYrcnI&var=" + 
								exerciseName;

		//Searches for a specific exercise and displays it to the user.
		postData("services/data.php", searchString, function(data)
		{             
			var objects = jQuery.parseJSON(data);

 			if(objects.length > 1)
			{
				var directionsPTags = "<ol class='tabbed'>";
				
				for(var i = 0; i < objects.length; i++)
				{
					directionsPTags += "<li>" + objects[i].Direction + "</li>";
				}

				directionsPTags += "</ol>";
				
				createExerciseResultPopup(objects[0].ExerciseName, directionsPTags, objects[0].SubmittedBy, objects[0].VideoURL);

				popupHeight('#search-resultPopup', '#exerciseInfoOverflow');
			
			}
			else
			{
				alert("Couldn't find exercise information for: " + exerciseName);
			}

 			hide('#loader-search-resultPopup'); 
		});
	}

	/**
	* Creates the popup that shows the exercise information from the database.
	*
	* @param exerciseName	The exercise name to get the infomation for.
	* @param directions		The directions for the exercise.
	* @param submittedBy	The account email of the person that submitted the exercise.
	* @param videoSRC		The the source of the video for the exercise.
	*/
	function createExerciseResultPopup(exerciseName, directions, submittedBy, videoSRC)
	{				
		$('#search-resultPopupTitle').text(exerciseName);
		
		$('#search-resultPopup #popup_content').append('<div id="exerciseInfoOverflow">' +
															'<div id="info-content">' +
																'<h4 id="mistakeFound"><a>Found a mistake?</a></h4>' +
																'<h2>Directions</h2>' +
																directions + 
																'<h3>Submitted by: <a id="submittedBy">' + submittedBy + '</a></h3>' +
																'<div class="videoWrapper">' + 
																	'<iframe src="//www.youtube.com/embed/' + videoSRC + '?rel=0" frameborder="0" allowfullscreen></iframe>' + 
																'</div>' +
															'</div>'+
														'</div>');

		$("#mistakeFound").unbind("click");
		$("#mistakeFound").bind('click', function()
		{			
			dismissPopup();

			hide('#error-feedback');

			$('#input-feedback').text("I found an issue with " + exerciseName + ". It is...");
			
			loadPopup('#feedback', null);
				
			return false;
		});	
	}
</script>