<div id="feedback"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Feedback</h1>
		</div>
		
		<p id="error-feedback" class="error">Please give use some feedback.</p>

		<textarea id="input-feedback" name="feedback" class="element" placeholder="Have an issue? Tell us about it, or just tell us what you think."></textarea>
		
		<div>
			<div id="loader-submitFeedback" class="loader loader-button loader-popup"></div>
			<button id="submit-feedback" type="submit" class="button element-top element-bottom">Send</button>
		</div>
		
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="sumbitted"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Success!</h1>
		</div>
		<p>Your feedback has been submitted.</p>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="error"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Error :(</h1>
		</div>
		<p>An error has occurred. Please try again tomorrow.</p>
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<div id="removeExercise"> 
    	
    <div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
			<h1>Remove Exercise</h1>
		</div>
		
		<div>
			<div id="loader-button-removeExercise-forToday" class="loader loader-button"></div>
			<button id="button-removeExercise-forToday" type="submit" class="button element-top-separated element-top">For today</button>
		</div>
		
		<div>
			<div id="loader-button-removeExercise-forever" class="loader loader-button"></div>
			<button id="button-removeExercise-forever"  type="submit" class="button separated element-bottom">Forever</button>
		</div>
		
    </div> <!--your content end-->
    
</div> <!--toPopup end-->

<script type="text/javascript">
	$("#submit-feedback").click(function()
	{
		var feedback = $('#input-feedback').val();
		var dataString = 'feedback=' + feedback;

		show('#loader-submitFeedback');

		if(feedback != "")
		{
			//Sends feedback.
			postData("services/feedback.php", dataString, function(data)
			{             
				var obj = jQuery.parseJSON(data);
	        	
	        	if(obj == "FEEDBACK_SENT")
        		{
	        		dismissPopup(null);

	        		clearField('#input-feedback');

	        		loadPopup('#sumbitted', null);

	        		setTimeout(function()
	    	        { 
	        			dismissPopup(null); 
	        		}, 3000);
        		}
	        	else
	        	{
	        		dismissPopup(null);

	        		loadPopup('#error', null);

	        		setTimeout(function()
    	    	    { 
	        			dismissPopup(null); 
    	       		}, 3000);
	        	}

	        	hide('#loader-submitFeedback'); 
			});
		}
		else
		{
			show('#error-feedback');

			hide('#loader-submitFeedback');	
		}		
	    
	    return false;
	});
</script>

	