<?php 
	define("EMAIL", "nick.piscopio@gmail.com");
	define("FEEDBACK_SENT", "FEEDBACK_SENT");

	$feedback = $_POST['feedback']; 

	$email_subject = "IntencityApp.com Feedback";
	$email_body = "Intencity has some feedback. Here are the details:\n\n Feedback: \n $feedback"; 
	
	$headers = "From: IntencityApp.com\n"; 
	$headers .= "Reply-To: info@intencityapp.com";
	
	mail(EMAIL,$email_subject,$email_body,$headers);
	
	print json_encode(FEEDBACK_SENT);
?>