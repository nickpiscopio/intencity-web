<div id="approved_exercises_admin">
	<div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
       <h1>Exercise Review</h1>
       </div>
		<div class="approved_adminOverflow">
	   		<div class="actionsBody">
				<div id="reportHeader">
					<div class="settings_leftColumn">
						<p id="exercise_sumitted_name_">Exercise Name</p>
						<p id="exercise_sumitted_date_">Submitted Date</p>
						<p id="exercise_sumittedBy_">Submitted By</p>
					</div>
				</div>
				<div id="approvedDescription" class="settings_leftColumn">
					<h1>Description</h1>
					<p id="approvedDescription_">Description goes here</p>
				</div>
				<div id="approvedDirections" class="settings_leftColumn">
					<h1>Description</h1>
					<p id="approvedDirections_">Directions goes here</p>
				</div>
				<div class="settings_leftColumn">
					<video id="approved_exercise_video_" height="240" width="100%" controls="controls">
					    <source type="video/mp4" src="videos/coming_soon.mp4"></source>
					    <source type="video/ogg" src="videos/coming_soon.ogg"></source>
					    Your browser does not support the video tag.
					</video>
				</div>
				<div id="status" class="settings_leftColumn">
					<h1>Status:</h1>
					<form action="" method="get">
						<select id="approved_status_">
							<option id="furtherReview" placeholder="furtherReview" value="Needs Further Review">Needs Further Review</option>
		    				<option id="denied" placeholder="denied" value="Denied">Denied</option>
    						<option id="approved" placeholder="approved" value="Approved">Approved</option>
		    			</select>
					</form>
				</div>
				<div id="notes" class="settings_leftColumn notes">
					<h1>Notes:</h1>
					<textarea id="notes_" type="text"></textarea>
					<button id="submit-notes" type="submit" class="button element-top element-bottom">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div> <!--your content end-->