<div id="terms-popup"> 	    	
	<div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Terms of Use</h1>
		</div>
		<div id="terms-body">
			<ul id="touArticles" class="tabbed"></ul>
    	</div>
    </div> <!--your content end-->
</div> <!--toPopup end-->
<script type="text/javascript">
	$(document).ready(function() 
	{
		//Gets the articles for the Terms of Use.
		postData("services/data.php", "d=L[rO[]E[tMeRY]CrlRsDBD]STiFT[RI]EAceO[mE[", function(data)
		{             
			var articles = jQuery.parseJSON(data);

			if(articles != "FAILURE")
			{
				var amountOfArticles = articles.length;
				
				$('#touArticles').empty();
				
				for(var i = 0; i < amountOfArticles; i++)
				{
					$('#touArticles').append('<li>' + articles[i].Article + '</li>');
				}

			}
		});
	});
</script>