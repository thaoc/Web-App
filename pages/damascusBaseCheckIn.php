<!doctype html>

<html lang="en">

<?php include "../lib/head.php" ?>

<body>

<!-- TOP NAVBAR AND LOGO -->
  
<?php include "../lib/menu.php" ?>
<form>
<div class="wrapper3">
<div class="resident">
	<h2>Check-In Log</h2>
	<div class="wrapper">
	<h3>Resident information including photo, links to Profile & Daily Planner, etc.</h3>
	<h3>Call Received by area populated by login information for staff member</h3>
	<!-- Resident Information like picture, name, etc and staff info autopop from database here -->
	</div><br>
<!--	<div class="wrapper"> -->
		<div class="column3">
		<h3 class="green">Current Location:</h3>
			<label class="highlight" for="currentPhone">Phone Number: <span class="req"></span></label><br>
			<input type="phone" name="currentPhone" id="currentPhone" /><br><br>
            <label class="highlight" for="currentLocation">Calling from: <span class="req"></span></label><br>
			<input type="text" name="currentLocation" id="currentLocation" /><br><br>
			<label class="highlight2" for="currentDate">Date: <span class="req"></span></label>
			<!-- this should autopopulate from the computer's date -->
			<label class="highlight2" for="currentTime">Time: <span class="req"></span></label><br><br>
			<!-- this should autopopulate from the computer's time BUT be editable -->
			<label class="highlight" for="currentLocPlannerChck">Matches Daily Planner Entry?</label><br>
			<input type="radio" name="currentLocPlannerChck" value="yes">Yes <br>
			<input type="radio" name="currentLocPlannerChck" value="no">No<br><br>
			<!-- link to daily planner for that specific resident so journal can be updated -->
			<label class="highlight" for="action">Action</label><br>
            <select>
				<option value="">Select One</option>
				<option value="toWork">To Work</option>
				<option value="atWork">At Work</option>
				<option value="toFacility">To Facility</option>
				<option value="toSupport">To Support Group</option>
				<option value="atSupport">At Support Group</option>
				<option value="toChurch">To Church</option>
				<option value="atChurch">At Church</option>
				<option value="jobSearch">On Job Search (check Daily Planner)</option>
				<option value="pass">On Pass (check Daily Planner)</option>
				<option value="other">Other (please fill in the field below</option>
			</select><br><br>
			<input type="text" name="actionOther" id="actionOther" placeholder="Enter additional information here if you selected other"><br><br>
			<label class="highlight" for="estTotalTime">Estimated total time at location: <span class="req"></span></label><br><input type="text" name="estTotalTime" id="estTotalTime" placeholder="How long will you be here?"><br><br>
		</div>
    
		<div class="column4">
		<h3 class="green">Next Location:</h3>
			<label class="highlight" for="nextLocation">Location Name:</label><br>
			<input type="text" name="nextLocation" id="nextLocation" placeholder="Location heading to next"><br><br>
			<label class="highlight" for="nextLocPlannerChck">Matches Daily Planner Entry?</label><br>
			<input type="radio" name="nextLocPlannerChck" value="yes">Yes <br>
			<input type="radio" name="nextLocPlannerChck" value="no">No<br><br>
			<!-- link to daily planner for that specific resident so journal can be updated -->
			<label class="highlight" for="commentsArea">Comments:</label><br>
			<textarea name="commentsArea" id="commentsArea" placeholder="Additional comments">Additional comments</textarea>
		</div><br><br>
    
    <div class="submit">
	<input type="submit" value="Submit" class="button">
    </div><br>
	
	</div>
</div>	
	
</form>
<?php include "../lib/footer.php" ?>
<?php include "../lib/script.php" ?>
</body>
</html>