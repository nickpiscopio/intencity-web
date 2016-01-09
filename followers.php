<div id="follow">
	<div id="followHeader">
		<div id="followingHeader" class="active">
			<a id="followingHeader">
				<img id="mobileFollowing-picture" src="images/web/no_profile_pic.png"/>	
				<h2>Following</h2>
			</a>
		</div>
		<div id="followerHeader">
			<a id="followerHeader">
				<img id="mobileFollower-picture" src="images/web/no_profile_pic_alternate.png"/>
				<h2>Followers</h2>
			</a>
		</div>
	</div>
	<div id="followingMobileDropdown"> 	
	    <div class="close"></div>
	    <div id="popup_content"> <!--your content start-->
	       <div id="followHeader-mobile" class="title popup">
				<h1>Following</h1>
			</div>
			<div id="followingPictures"></div>
		</div> <!--your content end-->
	</div> <!--toPopup end-->

	<div id="followerMobileDropdown"> 	
	    <div class="close"></div>
	    <div id="popup_content"> <!--your content start-->
	       <div id="followHeader-mobile" class="title popup">
				<h1>Followers</h1>
			</div>
			<div id="followersPictures"></div>
		</div> <!--your content end-->
	</div> <!--toPopup end-->
</div>

<script type="text/javascript">
$(document).ready(function() 
{
	var mobileResolution = 959;
	var mobile = false;

	//Gets the user's followers.
	getFollow(true);
	getFollow(false);
	
	$("#followingHeader").click(function()
	{		
		if($(document).width() < mobileResolution)
		{	
			showFollowingMobile();
		}

		else
		{
			showFollowingWeb();

			//Makes the text blue for active link
			switchClass('#followerHeader', '#followingHeader', 'active');
		}
		
		return false;
	});

	$("#followerHeader").click(function()
	{	
		if($(document).width() < mobileResolution)
		{	
			showFollowerMobile();
		}

		else
		{
			showFollowerWeb();

			//Makes the text blue for the active link
			switchClass('#followingHeader', '#followerHeader', 'active');
		}
		
		return false;
	});

	//When an id appears it will do the function
	$('#navbarTop h1').on('appear', function(event, $all_appeared_elements) 
	{	
		if(!mobile)
		{	
		    // this element is now inside browser viewport
			hide('#followingMobileDropdown');     
			hide('#followerMobileDropdown');
		}
		
		mobile = true; 
    });

	//When the id disappears it will do this function
	$('#navbarTop h1').on('disappear', function(event, $all_appeared_elements) 
	{
		if($('#followingMobileDropdown').is(':visible'))
		{
			// this element is now inside browser viewport
			show('#followingMobileDropdown');         

			//Makes the text blue for active link
			switchClass('#followerHeader', '#followingHeader', 'active');
					
			mobile = false; 
		}
	});	
});

/**
* Displays who you are following and your followers dialog. This is so we can call this function from the menu as well.
*/
function showFollowingMobile()
{
	loadPopup('#followingMobileDropdown', null);
}

function showFollowerMobile()
{
	loadPopup('#followerMobileDropdown', null);
}

function showFollowingWeb()
{
	$('#followerMobileDropdown').fadeOut(0);
	
	$('#followingMobileDropdown').fadeIn(0);
	 
}

function showFollowerWeb()
{
	$('#followingMobileDropdown').fadeOut(0);

	$('#followerMobileDropdown').fadeIn(0);
}

function getFollow(followers)
{
	var dataString = "";
	
	if(followers)
	{
		dataString = "d=L,ra.tEdUrH[imrR[DI[RR[FolowraEEle[MH[)]E[erimrNe[eeRFMiWUda!iOEUrdSL1UOURO[wgNnFieiWli.!ECml[WI/]CsIsteea(EUMLOseRse.sElDse.DI)[[eN[NiOowlnsEEFog(EU.RU[Rd]STrUFNULaSTra[[M[EraieaRBei[[TaLMrEIln[o.o!.lRlnaSTriOeED/]EU.De.s,ssm,LCsi.RUedaEeMElU.m[[YMaIECM[sF[sINJol[FliglgUm[H[owmiL[sEaFsrE!i";
	}
	else
	{
		dataString = "d=L,ra.tEdUrH[imrR[DI[RR[Folm!aWloge[MH[)]E[erimrNe[eeRFMiWUda!iOEUrdSL1UOURO[wgNnEUmHEnFl!ECml[WI/]CsIsteea(EUMLOseRse.sElDse.DI)[[eN[NiOowisElFogl(EU.RU[Rd]STrUFNULaSTra[[M[EraieaRBei[[TaLMrEIln[o.lriEoioiSTriOeED/]EU.De.s,ssm,LCsi.RUedaEeMElU.m[[YMaIECM[sF[sINJol[Fligae.[R[lw.wnL[sEaFsrE!i";
	}
	
	//Gets the user's followers / people following the user.
	postData("services/data.php", dataString, function(data)
	{             
		var following = jQuery.parseJSON(data);

		if(following != null && following != "FAILURE")
		{
			var totalFollowing = following.length;

			if(followers)
			{
				$('#followingPictures').empty();
			}
			else
			{
				$('#followersPictures').empty();
			}
			
			for(var i = 0; i < totalFollowing; i++)
			{
				var profileImgUrl = "images/web/no_profile_pic.png";
				
				if(following[i].URL != null)
				{
					profileImgUrl = following[i].URL;
				}

				var followId = "";
				
				if(followers)
				{
					followId = "#followingPictures";
				}
				else
				{
					followId = "#followersPictures";
				}

				$(followId).append('<a id="follow_' + following[i].ID + '" class="follow-picture"><img src="' + profileImgUrl + '" title="' + following[i].FirstName + ' ' + following[i].LastName + '" height="60px" width="60px"/>');
			}

			$(".follow-picture").unbind("click");
			$(".follow-picture").bind('click', function()
			{
				var splitElementId = $(this).attr('id').split("_");

				loadUser(splitElementId[1]);

				return false;
			});
		}
	});
}
</script>