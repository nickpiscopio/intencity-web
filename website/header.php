<div id="header">
	<div class="container">
		<a onclick="loadIntencityURL(null);">
			<img id="intencityLogo" src="images/web/logo_header.png"/>
		</a>
		
		<a id="menu-button" onclick="toggleMenu();"><img src="images/web/icon_menu.png" title="Menu"/></a>

		<div id="search">
			<input id="searchBox" type="text" class="element-top element-bottom">
			<img src="images/web/icon_search.png"/>
			<div id="loader-search" class="loader"></div>					
		</div>
		
	</div>
</div>
<script type="text/javascript">
	/**
	* Toggles the menu, and pushes the main content to the left.
	*/
	function toggleMenu()
	{
		if($('#intencityLogo').is(':visible'))
		{
			toggle('#menu');
		}
		else
		{
			if($('#menu').is(':visible'))
			{
				hideMenu();
			}
			else
			{
				$('#menu').fadeIn(0);
				$('#menu').animate({right:'0'});
				$('#content-main').animate({right:'75%'});
				$('#navbarTop').animate({right:'75%'});	

				hasChangedMenuAttribute = false;
			}
		}
	}

	/**
	* Hides the menu.
	*/
	function hideMenu()
	{
		$('#menu').animate({right:'-75%'});
		$('#content-main').animate({right:'0'});
		$('#navbarTop').animate({right:'0'});
		$('#menu').fadeOut(FADE_IN_SPEED);
	}	
</script>

