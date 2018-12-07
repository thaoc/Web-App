<!doctype html>

<html lang="en">

<?php include "../lib/include/head.php" ?>

<body>

<!-- TOP NAVBAR AND LOGO -->
  
<?php include "../lib/include/menu.php" ?>
<form>
<div class="wrapper3">
<div class="resident">
	<h2>Call In Log</h2>
	<div class="wrapper">
	<h3>Resident information including photo, links to Profile & Daily Planner, etc.</h3>
	<h3>Call Received by area populated by login information for staff member</h3>
	<!-- Resident Information like picture, name, etc and staff info autopop from database here -->
	</div><br>
<!--	<div class="wrapper"> -->
		<div class="column3">
		<h3 class="green">Current Location:</h3>
            <label class="highlight" for="currentLocation">Calling from: <span class="req"></span></label><br>
			<input class="checkin" type="text" name="currentLocation" id="currentLocation" /><br><br>
            <label class="highlight" for="currentPhone">Phone Number: <span class="req"></span></label><br>
			<input class="checkin" type="phone" name="currentPhone" id="currentPhone" /><br><br>
			<label class="highlight2" for="currentDate">Date: <span class="req"></span></label>
			<label class="highlight2" for="currentTime">Time: <span class="req"></span></label>
            <input type="date" id="dateNow" readonly> <input type="time" id="timeNow"><br><br>
			<label class="highlight" for="action">Action</label><br>
            <select class="checkin">
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
			<input class="checkin" type="text" name="actionOther" id="actionOther" placeholder="Enter additional information here if you selected other"><br><br>
			<label class="highlight" for="estTotalTime">Estimated total time at location: <span class="req"></span></label><br><input class="checkin" type="text" name="estTotalTime" id="estTotalTime" placeholder="How long will you be here?"><br><br>
		</div>
    
		<div class="column4">
		<h3 class="green">Next Location:</h3>
			<label class="highlight" for="nextLocation">Location Name:</label><br>
			<input class="checkin" type="text" name="nextLocation" id="nextLocation" placeholder="Location heading to next"><br><br>
			<label class="highlight" for="nextLocPlannerChck">Information matches planner:</label><br>
			<input type="radio" name="nextLocPlannerChck" value="yes" onclick="noUpdate();">Yes <br>
			<input type="radio" name="nextLocPlannerChck" value="no" onclick="updatePlanner();">No
            
            <!-- link to daily planner for that specific resident so journal can be updated -->
            <div id="link" class="hide">
                <a id="a-link" href="damascusBasePlanner.php">Update planner</a>
            </div><br><br>
            
			<label class="highlight" for="commentsArea">Comments:</label><br>
			<textarea name="commentsArea" id="commentsArea" placeholder="Additional comments"></textarea>
            
		</div><br><br>
    
    <div class="submit">
	<input type="submit" value="Submit" class="button">
    </div><br>
	
	</div>
</div>	
</form>
	
    <script>
        function noUpdate(){
            document.getElementById('link').style.display ='none';
        }
        
        function updatePlanner(){
            document.getElementById('link').style.display ='inline';
        }
        
    </script>
    
<?php include "../lib/include/footer.php" ?>
<?php include "../lib/include/script.php" ?>
</body>
</html>