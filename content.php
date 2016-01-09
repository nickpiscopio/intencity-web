<?php 
	include 'header.php';
	include 'search_results.php';
?>

<div id="userHeader" class="container"> 
	<div id="welcome-wrapper"></div>
	<div id="leftColumn"><!-- container to help keep the flow of the website intacked -->
		
		<?php include 'displayed_user_info.php'; ?>
		
		<div id="mobileTop-scrolling">
			
			<?php 
				include 'routines.php';
				include 'approved_exercises.php';
				include 'followers.php';
				//include 'media.php';
			?>
								
		</div>
 	</div>
 	<div id="centerColumn">
 		<?php
			include 'services/start_session.php';
 		
			if($_SESSION['isLoggedInUser'])
			{	
		?>
		 		<div id="navContainer">
		 			<div id="navbarTop">
		 				<div id="mobileBottom">
							<div id="mobileNewsFeed"> 
								<a id="newsFeedBottom" class="buttonLayout"> 
	 								<img id="newsFeedWeb" class="element-top element-bottom" src="images/web/icon_news_feed.png" title="News Feed"/>
	 								<div id="newsFeedMobile">
		 								<img id="newsFeedMobileUnfocused" class="newsFeedMobile element-top element-bottom focused" src="images/mobile/icon_news_feed.png"/>
		 								<img id="newsFeedMobileFocused" class="newsFeedMobile element-top element-bottom unfocused" src="images/mobile/icon_news_feed_selected.png"/>
	 									<h1>News Feed</h1>
	 								</div>		
								</a>
		 					</div>
		 					<div id="mobileFitnessLog"> 
								<a id="fitnessLogBottom" class="buttonLayout"> 
	 								<img id="fitnessLogWeb" class="element-top element-bottom" src="images/web/icon_fitness_log.png" title="Fitness Log"/>
	 								<div id="fitnessLogMobile">
		 								<img id="fitnessLogMobileUnfocused" class="fitnessLogMobile element-top element-bottom unfocused" src="images/mobile/icon_fitness_log.png"/>
		 								<img id="fitnessLogMobileFocused" class="fitnessLogMobile element-top element-bottom focused" src="images/mobile/icon_fitness_log_selected.png"/>
		 								<h1>Fitness Log</h1>
	 								</div>
								</a>
							</div>
		 				</div>
					</div>
					<div class="clearFloat"></div>
		 		</div>
 		<?php 
			}	
		?>		
			<div id="centerColumn-changeOut">
		<?php
			
			if($_SESSION['page'] != "")
			{
		?>								
				<script type="text/javascript">
				
					var page = "<?php echo $_SESSION['page']; ?>";

					loadPage(page);
					
				</script>			
		<?php
				
			}
			else
			{			
				if($_SESSION['isLoggedInUser'])
				{
					include 'fitness_log.php';
				}	
				else
				{
					include 'news_feed.php';
				}
			}
			
		?>
			</div>

			<script type="text/javascript">
			
				postData("services/data.php", "d=LcMe[ii]E[o[OrEl/]ChemU[Rmm/]STwoRsHE!a]ESWleF[WEa'el'", function(data)
				{
					var showWelcome = jQuery.parseJSON(data);
					
					if(showWelcome[0].ShowWelcome == 1)
					{
						 $("#welcome-wrapper").load("welcome.php");
					}
				});
				
			</script>
		<?php 			
			include 'about.php'; 
			include 'terms.php';
			include 'social_network_dialog.php';
		?>
	</div>
	<div id="rightColumn"></div>
	
</div>

<?php
	include 'footer.php';
	include 'dialog.php';
?>
<script type="text/javascript">
	var adNumber = "6";
	var backgroundColor = "FFFFFF";
	var textColor = "414042";
	
	var adWidth = 160;
	var adHeight = 600;
	var hasChangedToWeb = true;
	var hasChangedToMobile = false;

	$(document).ready(function()
	{
		$('#navbarTop h1').appear();
		
		if($(document).width() < 959)
	  	{
			hasChangedToWeb = false;
			hasChangedToMobile = true;

			mobileAds();
	  	}

		//Button click to load the news feed.
		$("#newsFeedBottom").click(function()
		{
			if(!$('#newsFeed').is(':visible'))
			{
				replaceContent('#centerColumn-changeOut', 'news_feed.php'); 
			}
					
			return false;
		});

		//Button click to load the fitness log.
		$("#fitnessLogBottom").click(function()
		{
			if(!$('#fitnessLog').is(':visible'))
			{
				replaceContent('#centerColumn-changeOut', 'fitness_log.php'); 
			}
					
			return false;
		});

		$("#newsFeedMobile").mousedown(function()
		{
			$("#newsFeedMobile").mousedown(function()
			{
				$(this).attr('src','../images/mobile/icon_news_feed_selected.png');		
			});
			
			$("#newsFeedMobile").mouseup(function()
			{
				$(this).attr('src','../images/mobile/icon_news_feed.png');
			});	
		});

		loadAds();
		
		$(window).resize(function() 
		{						
			if($(document).width() > 959)
			{
				if(!hasChangedToWeb)
				{
					$('#content-main').animate({right:'0'});
					$('#footer').animate({right:'0'});
					$('#navbarTop').animate({right:'0'});
					
					$('#menu').attr('style', function(i, style)
					{
					    return style.replace(/right[^;]+;?/g, '');
					});
					
	 				webAds();

					hasChangedToWeb = true;
					hasChangedToMobile = false;

	 				loadAds();
				}
			}
			else
			{
				if(!hasChangedToMobile)
				{
					if($('#menu').is(':visible'))
					{
						$('#menu').hide();

						$('#menu').attr('style', function(i, style)
						{
						    return style.replace(/right[^;]+;?/g, '-75%');
						});
					}
					
	 				mobileAds();

					hasChangedToWeb = false;
					hasChangedToMobile = true;

					loadAds();
				}
			}			
		});
		
		/**
		* Loads the mobile ads.
		*/	
		function mobileAds()
		{
			adNumber = "1";
			backgroundColor = "414042";
			textColor = "F6F6FF";
			adWidth = $(document).width() - 20;
			adHeight = 50;
		}

		/**
		* Loads the web ads.
		*/
		function webAds()
		{
			adNumber = "6";
			backgroundColor = "FFFFFF";	
			textColor = "414042";
			adWidth = $('#rightColumn').width();;
			adHeight = 600;
		}
		
		/**
		* Loads the ads if on the main site.
		*/
		function loadAds()
		{
			var pathname = window.location.pathname;

// 			if(pathname.indexOf("/dev/") != 0 && pathname.indexOf("/dev2/") != 0)
// 			{
// 				if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
// 				var unit = {"publisher":"thyleft","width":adWidth,"height":adHeight,"sid":"Chitika Default","color_site_link":"0000CC","color_bg":"FFFFFF"};
// 				var placement_id = window.CHITIKA.units.length;
// 				window.CHITIKA.units.push(unit);
// 				$('#rightColumn').empty();
// 				$('#rightColumn').append('<div id="chitikaAdBlock-' + placement_id + '"></div>');
// 				var ads = document.createElement('script');
// 				ads.type = 'text/javascript';
// 				ads.src = '//cdn.chitika.net/getads.js';
// 				try { document.getElementsByTagName('head')[0].appendChild(ads); } catch(e) { console.log("Ad generation failure.");}

// 				setTimeout(function()
// 				{
// 					//detects if adblocker is being used, if it is shows a message
// 					if($('#chitikaAdBlock-' + placement_id).height() == 0)
// 					{
// 						$('#rightColumn').append('<div id="adblocked"><p>Intencity is supported by advertisements. Please whitelist us so that we can keep everything running smoothly.</p></div>');
// 					}
// 				}, 5000);
// 			}

			if(pathname.indexOf("/dev/") != 0 && pathname.indexOf("/dev2/") != 0)
			{
				var adHtml = "";
				var adNumber = 0;

				$('#rightColumn').empty();
					
				if($(document).width() < 959)
				{
					adNumber = Math.floor(Math.random() * 10);
					
					switch(adNumber)
					{
						case 0:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=gift_certificates&banner=1ZMTYQQCPDNJYWMYWR82&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
					    	break;
					  	case 1:
					  		adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=hotnewreleases&banner=1HNM1EVYY12R5JNA9YR2&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0">';
						    break;
					  	case 2:
					  		adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=bestsellingproducts&banner=03JGEXJ8VWRFPFC6SYG2&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0">';
						    break;
						case 3:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=books&banner=1Q1EX20Z2R7864E3D582&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 4:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=gold&banner=1BQJPMSAWDM9NNWVYZ82&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 5:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=home&banner=1MZDQCPFPY5TSREH78G2&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 6:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=mostwishforitem&banner=00TMGBBBQ7NZSRVZZX02&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0">';
						    break;
						case 7:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=textbooks&banner=1AD3GEK9XAD5E7CCNGG2&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 8:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=topgiftideas&banner=18VCNR80T3TBDC3454G2&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 9:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=topratedproducts&banner=14RX1TYMN6HK8B515XR2&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0">';
						    break;
					  	default:
					  		adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=288&l=ur1&category=gift_certificates&banner=1ZMTYQQCPDNJYWMYWR82&f=ifr" width="320" height="50" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
					    	break;
					  }
				}
				else
				{
					adNumber = Math.floor(Math.random() * 5);
					
					switch(adNumber)
					{
						case 0:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=14&l=ur1&category=gift_certificates&banner=0S32YAVKXXKQGNQSSGG2&f=ifr" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
					    	break;
					  	case 1:
					  		adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=14&l=ur1&category=electronicsrot&f=ifr" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
					  	case 2:
					  		adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=14&l=ur1&category=electronics&f=ifr" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 3:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=14&l=ur1&category=amazonhomepage&f=ifr" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
						case 4:
							adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=14&l=ur1&category=musicandentertainmentrot&f=ifr" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
						    break;
					  	default:
					  		adHtml = '<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=intencity-20&o=1&p=14&l=ur1&category=amazonhomepage&f=ifr" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
					    	break;
					  }				
				}

				$('#rightColumn').append(adHtml);
			}
		}
	});	
</script>