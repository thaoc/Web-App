<!doctype html>

<html lang="en">

<?php include "../lib/include/head.php" ?>

<body>

<!-- TOP NAVBAR AND LOGO -->
  
<?php include "../lib/include/menu.php" ?>
<form>
<div class="wrapper">
<div class="resident">
	<h2>Check-In Log</h2>
	<div class="wrapper">
	<h3>Resident information including photo, links to Profile & Daily Planner, etc.</h3>
	<h3>Call Received by area populated by login information for staff member</h3>
	<!-- Resident Information like picture, name, etc and staff info autopop from database here -->
	</div>
	<div class="wrapper">
		<div class="column">
		<h3>Current Location:</h3>
			<label for="currentPhone">Phone number at current location:<span class="req"></span></label>
			<input type="phone" name="currentPhone" id="currentPhone" /></br></br>
			<label for="currentLocation">Calling from: <span class="req"></span></label>
			<input type="text" name="currentLocation" id="currentLocation" /></br></br>
			<label for="currentDate">Date <span class="req"></span></label>
			<!-- this should autopopulate from the computer's date -->
			<label for="currentTime">Time: <span class="req"></span></label>
			<!-- this should autopopulate from the computer's time BUT be editable -->
			<label for="currentLocPlannerChck">Matches Daily Planner Entry?</label>
			<input type="radio" name="currentLocPlannerChck" value="yes">Yes </br>
			<input type="radio" name="currentLocPlannerChck" value="no">No</br>
			<!-- link to daily planner for that specific resident so journal can be updated -->
			<label for="action">Action</label>  <select>
				<option value="">Select one</option>
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
			</select>
			<input type="text" name="actionOther" id="actionOther" value="Enter additional information here if you selected other">
			<label for="estTotalTime">Estimated total time at location: <span class="req"></span></label><br/><input type="text" name="estTotalTime" id="estTotalTime" value="How long will you be here?"><br /><br />
		</div>
		<div class="column">
		<h3>Next Location:</h3>
			<label for="nextLocation">Location Name:</label>
			<input type="text" name="nextLocation" id="nextLocation" value="Location heading to next">
			<label for="nextLocPlannerChck">Matches Daily Planner Entry?</label>
			<input type="radio" name="nextLocPlannerChck" value="yes">Yes </br>
			<input type="radio" name="nextLocPlannerChck" value="no">No</br>
			<!-- link to daily planner for that specific resident so journal can be updated -->
			<label for="commentsArea">Comments:</label>
			<textarea name="commentsArea" id="commentsArea" value="Additional comments">Additional comments</textarea><br /><br /><br />
		</div>
	
	</div>
</div>	

<div class="submit">
	<input type="submit" value="Submit" class="button">
</div>
</form>

	
</div>		
<?php include "../lib/include/footer.php" ?>
<?php include "../lib/include/script.php" ?>
</body>
</html>