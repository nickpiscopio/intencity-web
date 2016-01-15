<div id="display-userInfo">
	<img id="public-userPicture"/>
	<h2>
		<?php 
			include 'services/start_session.php';
			include 'services/check_session.php';
			echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];
		?>
	</h2>
	
	<a id="userPoints"></a>
	
	<?php 
		if(!$_SESSION['isLoggedInUser'])
		{
	?>
			<div>
				<a id="follow_user"></a>
			</div>			
	<?php 
		}				
	?>
</div>

<div id="pointsDescription" class="dialog"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>What are these points?</h1>
		</div>
		<p id="description">Every user that has earned 1500 points or more will be entered in a raffle that will take place on the first Monday of every month. 
			A random person will be selected and will receive a $100 gift card to Amazon.com. After the winner has received the prize, the points 
			will then be reset back to 0 for every user.</p>

		<h2>How to gain points</h2>
		<p>The following ways will earn you points on a daily basis:</p>
		<ul class="tabbed">
			<li>Logging into Intencity</li>
			<li>Using Intencity's Fitness Log</li>
		</ul>
		
		<h2>Disclaimer</h2>
		<p class="disclaimer">Intencity has not started their raffles yet. They will start in the second half of 2014. Please be patient, and help us build Intencity to be the fitness application 
		it was meant to be.	Thank you.</p>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<script type="text/javascript">
	$(document).ready(function()
	{
		getCurrentUserProfile();
		getUserProfile();

		var isLoggedInUser = "<?php echo $_SESSION['isLoggedInUser'] ?>";

		if(!isLoggedInUser)
		{
			//Checks to see if the user is following the person he or she is viewing.
			postData("services/data.php", "d=LnFoEEeFoElOWE/]E[lR[wHml/A[wg[EiM[[!]Cow[liWE'a'Di!ETF[rEi]STlgMlgRa/lNln(CaRsHId]EFoiFOon[[i!mi[ol[SL[m[UeRD/)", function(data)
			{             
				var object = jQuery.parseJSON(data);
		    	
		    	var isFollowingUser = false;

	 			if(object !== null)
				{
	 				$('#follow_user').text("Unfollow");
	 				
	 				isFollowingUser = true;
				}
				else
				{
					$('#follow_user').text("Follow");

					isFollowingUser = false;
				}

	 			$("#follow_user").click(function()
				{	
 					var dataString = "";
 					
 					if(isFollowingUser)
 					{
 						dataString = "d=LlWE'aD!EFrEi]E[Oi[[!i'li[LTm[eR/]TRFoEEleAFogEElOWE!/]DEMlgRa/lNln(CaRsHId]EF[ownHmim/[[ow[S[i[MU[[D)";
 					}
 					else
 					{
 						dataString = "d=SlEliV/L[URD]E[Ti(,wAEl,EEiF[E!)]RNFoaFog(m/Sm[Me[/)]ITOlgilnL'i(CaRsHId]NI[ownmol)USea'ETlO[rWEi/";
 					}

 					//Follows/unfollows a user.
 					postData("services/data.php", dataString, function(data)
 					{             
 						if(isFollowingUser)
	 					{
 				    		$('#follow_user').text("Follow");
 				    		
 				    		isFollowingUser = false;
	 					}
	 					else
	 					{
	 						$('#follow_user').text("Unfollow");
	 						
	 						isFollowingUser = true;
	 					}	      
 					});
				});
			});
		}

		//Gets the earned points for a given user
		postData("services/data.php", "d=LoOsE!]E[rsReR//]Cadn[rEI]STniFUW[i]EEePt[M[HDd", function(data)
		{             
			var userPoints = jQuery.parseJSON(data);

 			if(userPoints != "FAILURE")
			{
 				setText('#userPoints', userPoints[0].EarnedPoints + " points");
			}
		});

		$("#userPoints").click(function()
		{	
			loadPopup('#pointsDescription', null);
		});
	});

	/**
	* Gets the profile picture for the current user.
	*/
	function getCurrentUserProfile()
	{
		postData("services/data.php", "d=LMdIIssi[WeDR[MCM]E[LeeNOeod.aUrmEs!OBU.[SI1]CRRUaNJ[[rimsElE./[EedIET]ST[[M[RNrUeE[eaHUIdDYraDL[]EUFOsriE[U[neMal!.i[R[ri/R[seiD[I", function(data)
		{             
			var object = jQuery.parseJSON(data);

 			if(object !== null && object != "FAILURE")
			{
 				// set img src
 			    $('#public-userPicture').attr('src', object[0].URL);
			}
			else
			{
				$('#public-userPicture').attr('src', 'images/web/no_profile_pic.png');
			}
		});
	}

	/**
	* Gets the profile picture for the current user.
	*/
	function getUserProfile()
	{		
		postData("services/data.php", "d=LMdWa''DS]E[LeeHm/aEBICIT]CRRUaEEllOR[[I]ST[[M[Eie/DYDL[]EUFOsriR[!mi[R[[EM1", function(data)
		{             
			var object = jQuery.parseJSON(data);

 			if(object !== null && object != "FAILURE")
			{
 				// set img src
 			    $('.profilePicture').attr('src', object[0].URL);
			}
			else
			{
				$('.profilePicture').attr('src', 'images/web/no_profile_pic.png');
			}
		});
	}
</script>
	