<script type="text/javascript">
	addStyleSheet("news_feed");
</script>
<div id="newsFeed">
	<?php 
		include 'services/start_session.php';
		include 'services/check_session.php';
	
		if($_SESSION['isLoggedInUser'])
		{
	?>
			<div id="container-publish">
				<div id="publish-news" class="element-bottom element-top">
					<form id="newsForm" method="get">
						<textarea id="newsBox" class="newsBox element-bottom element-top" type="text" autocomplete="on" placeholder="Share with your followers" maxlength="255"></textarea>
					</form>
					<!-- IMPLEMENTING LATER -->
<!-- 					<img id="webNews-camera" src="images/web/icon_camera.png"/> -->
<!-- 					<img id="mobileNews-camera" src="images/mobile/icon_camera.png"/> -->
				</div>
				<div id="container-button-post" class="container-button-post element-bottom">
					<div id="loader-button-post" class="loader loader-button"></div>
					<button id="button-post" class="button element-bottom">Post</button>
				</div>
			</div>
	<?php 
		}				
	?>
	<div id="content-NewsFeedWrapper">
		<div id="loader-newsFeed" class="loader"></div>
		<div id="content-newsFeed"></div>
	</div>	
</div>
<script type="text/javascript">

	var isLoggedInUser = "<?php echo $_SESSION['isLoggedInUser']; ?>";

	$(document).ready(function() 
	{
		switchClass('#mobileFitnessLog', '#mobileNewsFeed', 'active');
		switchClass('#mobileNewsFeed', '#mobileFitnessLog', 'inactive');

		//Will switch the visible icon for newsfeed to being focused
		switchClass('#newsFeedMobileUnfocused', '#newsFeedMobileFocused', 'focused');
		switchClass('#newsFeedMobileFocused', '#newsFeedMobileUnfocused', 'unfocused');

		//Will switch the visible icon for fitnesslog to being unfocused	
		switchClass('#fitnessLogMobileFocused', '#fitnessLogMobileUnfocused', 'focused');
		switchClass('#fitnessLogMobileUnfocused', '#fitnessLogMobileFocused', 'unfocused');

		$("#searchBox").attr("placeholder", "Search for a person").blur();

		var urlPageVar = getURLParameter('page');

		var page = "news_feed";

		if(urlPageVar != page)
		{
			var addToUrl = false;

			if(isLoggedInUser)
			{
				addToUrl = false;
			}
			else
			{
				addToUrl = true;
			}

			modifyUrl("page=" + page, addToUrl);
		}

		refreshPosts(null);

		show('#search');
		
		$("#newsBox").keyup(function()
		{
			resizeTextArea("#newsBox");
	
			if($('#newsBox').val().length > 0)
			{
				$('#publish-news').removeClass('element-bottom');
	
				show('#container-button-post');
			}
			else
			{
				hidePostButton('#publish-news', '#container-button-post');
			}
		});
		
		$("#button-post").click(function()
		{
			createPost('#newsBox', '#container-button-post', '#loader-button-post', null);
		});	
	});

	/**
	* Hides the post button.
	*
	* @param textAreaId		The ID of the test area to add the element-bottom class.
	* @param postButtonId	The ID of the post button to hide.	
	*/
	function hidePostButton(textAreaId, postButtonId)
	{
		hide(postButtonId);
		
		$(textAreaId).addClass('element-bottom');
	}

	/**
	* Pulls posts from the database.
	*/
	function refreshPosts(postId)
	{
		var dataString = "";
		
		if(postId == null)
		{
			show('#loader-newsFeed');

			dataString = "d=L/]Leo)][Psd]Cgsi]Att(/";
		}
		else
		{
			dataString = "d=Lt/]Leov0][Ce(]Cgmsr]Atmn/a)&var=" + postId;
		}

		//Pulls the user's posts to the database as well as the user's posts from the people he or she is following.
		postData("services/data.php", dataString, function(data)
		{             
			var posts = jQuery.parseJSON(data); 
			
			if(posts != null && posts != "FAILURE")
			{
				var post = '#content-newsFeed';
				var removeCommentHtml = "";

				var postsLength = posts.length; 
				
				if(postId != null)
				{
					post = '#comment-wrapper_' + postId;
				}

				$(post).empty();
				
				for(var i = 0; i < postsLength; i++)
				{
					var commentHtml = "";
					var postImgUrl = posts[i].URL;
					var postText = "";
					
					if(postImgUrl === null)
					{
						postImgUrl = "images/web/no_profile_pic.png";
					}
					
					if(postId == null)
					{
						commentHtml = '<div id="comment-wrapper_' + posts[i].ID + '" class="comment-wrapper"></div>' +
										'<div id="post-commentContainer_' + posts[i].ID + '" class="post-commentContainer element-bottom element-top">' +
										'<textarea id="post-comment_' + posts[i].ID + '" class="post-comment element-bottom element-top" type="text" placeholder="Comment" maxlength="255"></textarea>' +
										'<div id="container-button-post_' + posts[i].ID + '" class="container-button-post element-bottom">' +
											'<div id="loader-button-post_' + posts[i].ID + '" class="loader loader-button"></div>' +
											'<button id="button-post_' + posts[i].ID + '" class="container-comment-button-post button element-bottom">Post</button>' +
										'</div>' +
									'</div>';

						postText = posts[i].Post;
					}
					else
					{
						postText = posts[i].Comment;
					}

					//Gets the userid from the database.
// 					postData("services/data.php", "d=L[EEel]E[[rHm//]CDOsEa'a]STFUW[lm']EIRMe[Ri!i", function(data)
// 					{           
// 						var id = jQuery.parseJSON(data);

// 						if(id != "FAILURE")
// 						{
// 							if(id[0].ID == posts[i].userId)
// 							{
// 								removeCommentHtml = '<a id="comment-remove_' + posts[i].ID + '" class="comment-remove">' +
// 														'<img src="images/web/icon_close.png"/>' +
// 													'</a>';
// 							}
// 						}

						$(post).append('<div id="postContainer_' + posts[i].ID + '" class="postContainer element-bottom element-top">' +
								'<a id="userProfileImg_' + posts[i].userId + '" class="userProfileImg"><img id="posters_image_" class="posters_image" src="' + postImgUrl + '"/></a>' +
								'<div id="post-header_" class="post-header">' +
									
									'<a id="userName_' + posts[i].userId + '" class="userName"><h2>' + posts[i].FirstName + ' ' + posts[i].LastName + '</h2></a>' +
									removeCommentHtml +
									
									'<h3>' + posts[i].Date + ' ' + posts[i].Time + '</h3>' +
								'</div>' +
								'<div id="posted-newsFeed_' + posts[i].ID + '" class="posted-newsFeed">' +
									'<p id="post-original_' + posts[i].ID + '" class="post-original">' + postText + '</p>' +
									commentHtml + 
								'</div>' +
							'</div>');

						refreshPosts(posts[i].ID);
// 					});
				}

				$(".userProfileImg, .userName").unbind("click");
				$(".userProfileImg, .userName").bind('click', function()
				{
					var splitElementId = $(this).attr('id').split("_");

					loadUser(splitElementId[1]);

					return false;
				});
			}
			else
			{
				if(postId == null)
				{
					if(isLoggedInUser)
					{
						$('#content-newsFeed').append('<div class="postContainer element-bottom element-top">' +
								'<p id="noPosts">You don\'t have any posts. Follow some more people or post something yourself.</p>' + 
							'</div>');
					}
					else
					{
						var firstName = "<?php echo $_SESSION['firstName']; ?>";
						var lastName = "<?php echo $_SESSION['lastName']; ?>";
						
						$('#content-newsFeed').append('<div class="postContainer element-bottom element-top">' +
															'<p id="noPosts">' + firstName + ' ' + lastName + ' hasn\'t posted anything yet.</p>' + 
														'</div>');
					}
				}	
			}

			if(postId == null)
			{
				postsFunctionality();

				hide('#loader-newsFeed');
			}
		});
	}

	/**
	* Holds all of the posts functionality
	*/
	function postsFunctionality()
	{
		$(".comment-remove").keyup(function()
		{
			//add remove functionality.
		});	
		
		$(".post-comment").keyup(function()
		{
			var splitElementId = $(this).attr('id').split("_");
			var postCommentId = "#post-comment_" + splitElementId[1];
			var postButtonId = "#container-button-post_" + splitElementId[1];

			resizeTextArea(postCommentId);

			if($(postCommentId).val().length > 0)
			{
				$(postCommentId).removeClass('element-bottom');
	
				show(postButtonId);
			}
			else
			{
				hidePostButton(postCommentId, postButtonId);
			}			
		});

		$(".container-comment-button-post").click(function()
		{
			var splitElementId = $(this).attr('id').split("_");
			var postCommentId = "#post-comment_" + splitElementId[1];
			var postButtonId = "#container-button-post_" + splitElementId[1];
			var loaderId = "#loader-button-post_" + splitElementId[1];

			createPost(postCommentId, postButtonId, loaderId, splitElementId[1]);

			return false;
		});	
	}

	/**
	* Gets the data ready to send to the server.
	*
	* @param postButtonId	The ID of the post button to show the error.
	* @param postCommentId	The ID of the textarea to change to a bottom element.
	* @param postLoaderId	The ID of the loader to hide.
	* @param postId			The ID of the post to comment to.
	*/
	function createPost(postCommentId, postButtonId, postLoaderId, postId)
	{
		var dataString = "";
		
		show(postLoaderId);
		
		var post = $(postCommentId).val();
		post = post.split("'").join("\\'");
		post = post.split('"').join('\\"');
		post = post.split(",").join("\\,");

		if(postId != null)
		{
			//Get Email from ID from the database.
			postData("services/data.php", "d=LR[Rd]E[aUrEi]Cm[MH[/]STiOeED/]EElF[sWI!", function(data)
			{             
				var object = jQuery.parseJSON(data);
				
				if(object != "FAILURE")
				{
					dataString = "d=Sms,aTm/0C)RM,']E[TtoEDi,VU(//rA(RI'a]RNCeIm,eonAS,a'RCET(2]ITOmPditmm)Ea'1UEUTE//]NI[on(tal,eCetLvrv/,DT,N_)vr)&var=" + postId + "," + email + "," + post;

					sendPost(dataString, postButtonId, postCommentId, postLoaderId);
				} 
			});                       
		}
		else
		{
			dataString = "d=Ss,eoV/D(Iv/]E[Tml,PAEl,R)UE)/']RNP(aT,t(m/U,R_Er)]ITOtitmsL'iCTCNM'0]NI[oEaDie)USea'AERTT(,a&var=" + post;

			sendPost(dataString, postButtonId, postCommentId, postLoaderId);
		}
	}

	/**
	* Sends the post to the server.
	*
	* @param dataString		The string of sql to send to the server.
	* @param postButtonId	The ID of the post button to show the error.
	* @param postCommentId	The ID of the textarea to change to a bottom element.
	* @param postLoaderId	The ID of the loader to hide.
	*/
	function sendPost(dataString, postButtonId, postCommentId, postLoaderId)
	{
		//Send the user's post or comment to the database.
		postData("services/data.php", dataString, function(data)
		{           			
			var object = jQuery.parseJSON(data);

			var postId = postCommentId.split("_");
			
			if(object != "FAILURE")
			{
				$(postCommentId).val('');
	
				hidePostButton(postCommentId, postButtonId);

				//Get the comments that were just posted.
				refreshPosts(postId[1]);
			}
			else
			{
				$(postButtonId).val('Post error');
				
				setTimeout(function() 
				{
					hidePostButton(postCommentId, postButtonId);
					
					$(postButtonId).val('Post');
			    }, 3000);
			}

			hide(postLoaderId);

			$(postButtonId).addClass('element-bottom'); 
		});
	}
</script>
