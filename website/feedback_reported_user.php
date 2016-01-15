<div id="feedback_reported_user">
	<div class="close"></div>
    <div id="popup_content"> <!--your content start-->
       <div class="title popup">
       <h1>Reports</h1>
       </div>
		<div class="feedbackOverflow">
	   		<div class="actionsBody">
				<div id="reportHeader">
					<div class="settings_leftColumn">
						<p id="people_reported_">Person Being Reported</p>
						<p id="people_report_date_">Submitted Date</p>
						<p id="people_reporter_">Submitted By</p>
					</div>
					<div class="settings_centerColumn">
						<p id="people_reportTotal_">Reported Total: </p>
						<p id="people_reportAccepted">Accepted Total: </p>
					</div>
				</div>
				<div id="reportedReasons" class="settings_leftColumn">
					<h1>Reason</h1>
					<p id="reportedReason_">Reasons go here</p>
				</div>
				<div class="settings_leftColumn">
					<video id="reported_video_" height="240" width="100%" controls="controls">
					    <source type="video/mp4" src="videos/coming_soon.mp4"></source>
					    <source type="video/ogg" src="videos/coming_soon.ogg"></source>
					    Your browser does not support the video tag.
					</video>
					<img id="reported_image_" class="media_reported" src="images/mobile/logo.png"/>
				</div>
				<div id="actions" class="settings_leftColumn">
					<h1>Actions:</h1>
					<form action="" method="get">
						<div>
							<input id="report_removeContent" class="report_removeContent" type="checkbox" name="contentRemove" value="contentRemove"><p>Remove Content</p></br>
						</div>
						<div class="report_radioButton">
							<input id="report_suspendUser_" class="report_suspendUser" type="radio" name="action" value="suspend"><p>Suspend User</p>
							<input id="report_removeUser_" class="report_removeUser" type="radio" name="action" value="remove"><p>Remove User</p>
						</div>
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
