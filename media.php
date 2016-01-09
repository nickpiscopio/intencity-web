<div id="media">
	<div id="mediaHeader">
		<div id="photoHeader" class="active">
			<a id="photoHeader">
				<img id="mobilePhoto-picture" src="images/web/no_profile_pic.png"/>	
				<h2>Photos</h2>
			</a>
		</div>
		<div id="videoHeader">
			<a id="videoHeader">
				<img id="mobileVideo-picture" src="images/web/no_profile_pic_alternate.png"/>
				<h2>Videos</h2>
			</a>
		</div>
	</div>
	<div id="photoMobileDropdown"> 
	    <div class="close"></div>
	    <div id="popup_content"> <!--your content start-->
	       <div id="photoHeader-mobile" class="title popup">
				<h1>Photos</h1>
			</div>
			<div id="photoPictures">
				<img id="follow-picture" src="images/web/no_profile_pic.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic.png"/>
			</div>
	    </div> <!--your content end-->
   	</div> <!--toPopup end-->
 
 	<div id="videoMobileDropdown"> 
	    <div class="close"></div>
	    <div id="popup_content"> <!--your content start-->
	       <div id="videoHeader-mobile" class="title popup">
				<h1>Video</h1>
			</div>
			<div id="videoPictures">
				<img id="follow-picture" src="images/web/no_profile_pic_alternate.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic_alternate.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic_alternate.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic_alternate.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic_alternate.png"/>
				<img id="follow-picture" src="images/web/no_profile_pic_alternate.png"/>
			</div>
	    </div> <!--your content end-->
   	</div> <!--toPopup end-->  	
</div>  	
<script type="text/javascript">
$(document).ready(function() 
{	
	var mobileResolution = 959;
	var mobile = false;
		
	$("#photoHeader").click(function()
	{		
		if($(document).width() < mobileResolution)
		{	
			showPhotoMobile();
		}

		else
		{
			showPhotoWeb();

			//Makes the text blue for the active link
			switchClass('#videoHeader', '#photoHeader', 'active');
		}
		
		return false;
	});

	$("#videoHeader").click(function()
	{	
		if($(document).width() < mobileResolution)
		{	
			showVideoMobile();
		}

		else
		{
			showVideoWeb();

			//Makes the text blue for the active link
			switchClass('#photoHeader', '#videoHeader', 'active');
		}
		
		return false;
	});

	//When an id appears it will do the function
	$('#navbarTop h1').on('appear', function(event, $all_appeared_elements) 
	{
		if(!mobile)
		{
			// this element is now inside browser viewport
			hide('#photoMobileDropdown');     
			hide('#videoMobileDropdown');
		}
		
		mobile = true; 
    });

	//When the id disappears it will do this function
	$('#navbarTop h1').on('disappear', function(event, $all_appeared_elements) 
	{
		if($('#photoMobileDropdown').is(':visible'))
		{
			// this element is now inside browser viewport
			show('#photoMobileDropdown');         

			//Makes the text blue for the active link
			switchClass('#videoHeader', '#photoHeader', 'active');
					
			mobile = false; 
		}
	});	
});

/**
* Displays who you are following and your followers dialog. This is so we can call this function from the menu as well.
*/
function showPhotoMobile()
{
	loadPopup('#photoMobileDropdown', null);
}

function showVideoMobile()
{
	loadPopup('#videoMobileDropdown', null);
}

function showPhotoWeb()
{
	$('#videoMobileDropdown').fadeOut(0);
	
	$('#photoMobileDropdown').fadeIn(0);
	 
}

function showVideoWeb()
{
	$('#photoMobileDropdown').fadeOut(0);

	$('#videoMobileDropdown').fadeIn(0);
}
</script>