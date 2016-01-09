<div id="footer">
	<div class="container">
		<div id="leftColumn">
			<a id="about-anchor" class="leftFloat">About</a>
			
			<a id="terms-footer" class="leftFloat">Terms</a>
		</div>
		<div id="centerColumn">
			<copyright>&copy2014. All Rights Reserved. Intencity.</copyright>
		</div>
		<a id="button-socialNetworks" class="rightFloat">Social</a>

		<a id="button-feedback" class="rightFloat">Give Feedback</a>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() 
	{
		$("#button-feedback").click(function()
		{	
			showFeedback();

			return false;
		});
	});

	//Button click to load the popup.
	$('#about-anchor').click(function()
	{
		
		showAbout();
		
		return false;
	});

	//Loads the terms
	$("#terms-footer").click(function()
	{		
		showTerms();
		
		return false;
	});

	//Loads the terms
	$("#button-socialNetworks").click(function()
	{	
		showSocialNetwork();
		
		return false;
	});

	/**
	* Shows the feedback dialog. This needs to be a function 
	* for the mobile menu to work.
	*/
	function showFeedback()
	{
		$('#input-feedback').text('');
		 
		hide('#error-feedback');
		
		loadPopup('#feedback', null);

		$('#input-feedback').focus(); 
	}

	/**
	* Shows the about dialog.
	*/
	function showAbout()
	{
		loadPopup('#about', null);

		popupHeight('#about', '.overflow');
	}

	/**
	* Shows the social network dialog.
	*/
	function showSocialNetwork()
	{
		loadPopup('#social_networks', null);
	}

	function showTerms()
	{
		loadPopup("#terms-popup", null);

		popupHeight('#terms-popup', '#terms-body');
	}
</script>