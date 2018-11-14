<!doctype html>

<html lang="en">
<?php include "../lib/head.php" ?>
	<body>
		<?php include "../lib/menu.php" ?>
		<h1>Resident Daily Planner</h1>
		<div> <!-- this is the div holding the Location Information and Event Information fieldsets -->
		<form> 
			<div> <!-- this is the div holding the Location Information field set --> 
				<fieldset>
				<legend>Location Information</legend>
				<label for="dp_location_name">Name:<span class="req"></span></label>     <input type="text" name="dp_location_name" id="dp_location_name" required>  <br/>
				<label for="dp_location_street">Address:<span class="req"></span></label>     <input type="text" name="dp_location_street" id="dp_location_street" required><br/>
				<label for="dp_location_city">City:<span class="req"></span></label>    <input type="text" name="dp_location_city" id="dp_location_street" required>     <label for="dp_location_state">State: <span class="req"></span></label>     <input type="text" name="dp_location_state" id="dp_location_state" required>     <label for="dp_location_zip">Zip Code:<span class="req"></span></label>     <input type="text" name="dp_location_zip" id="dp_location_zip" required><br/>
				<label for="dp_location_phone">Phone:<span class="req"></span></label>     <input type="text" name="dp_location_phone" id="dp_location_phone" required><br />
				<label for="dp_contact_name">Contact Name: <span class="req"></span>     <input type="text" name="dp_contact_name" id="dp_contact_name" required><br/>
				</fieldset>
			</div>
			<div> <!-- this is the div holding the event information field set -->
				<fieldset>
				<label for="dp_date">Date: <span class="req"></span></label>     <input type="date" name="dp_date" id="dp_date" required>     <label for="dp_time_needed">Time Needed:<span class="req"></span></label>     <input type="time" name="dp_time_needed" id="dp_time_needed" required><br/>
				<label for="dp_purpose">Purpose: <span class="req"></span></label>  <textarea name="dp_puprose" id="dp_purpose" placeholder="What is the reason for your visit?" required></textarea>
				<label for="dp_returning">Arrival Time:<span class="req"></span></label>     <input type="time" name="dp_returning" id="dp_returning" required>     <label for="dp_leaving">Departure Time: <span class="req"></span></label>     <input type="time" name="dp_leaving" id="dp_leaving" required><br/>
				<label for="dp_transport_mode">Transport Mode:<span class="req"></span></label><br/>
					<input type="radio" name="dp_transport_mode" id="dp_transport_mode" value="Bus">Bus <br/>
					<label for="dp_bus_route">Routes: </label> <textarea name="dp_bus_route" id="dp_bus_route" placeholder="Enter the route(s) you will take to get to the location"></textarea><br/>
					<input type="radio" name="dp_transport_mode" id="dp_transport_mode" value="Car">Car <br/>
					<label for="dp_driver_name">Driver's Name: </label>  <input type="text" name="dp_driver_name" id="dp_driver_name">
				</fieldset>
			</div>
			<div><!-- this is the fieldset for the button (although it doesn't have to be a field set; I just put it in one just in case) -->
				<fieldset>
					<input type="submit" value="Add">
				</fieldset>
		
		</form>
		<div class="wrapper">
			<h3>Daily Planner Schedule</h3>
			<p>Pulled from DB</p>
		</div>
		
        <?php include "../lib/footer.php" ?>
		  <?php include "../lib/script.php" ?>
	</body>
</html>