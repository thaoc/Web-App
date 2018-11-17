<!doctype html>

<html lang="en">
<?php include "../lib/head.php" ?>

	<body>

		<?php include "../lib/menu.php" ?>
		<h2>Resident Daily Planner</h2>
		<p>Enter the information for one destination on your daily schedule in the form below, then click <strong>Add</strong>. Do this for each location you have on your schedule for the day.</p>
			<div class="wrapper2">
			<h1>Event Entry:</h1>
				<form action="" method="POST">
					<fieldset>
						<legend>Location Information</legend>
						<label for="locationName">Location Name:<span class="req"></span></label>
						<input type="text" size="65" name="locationName" id="locationName" value="Name of the location"/><br /><br />
						<label for="locationStreet">Location Address:<span class="req"></span></label>
						<input type="text" size="65" name="locationStreet" id="locationStreet" value="Street Address"/><br /><br />
						<label for="locationCity">City<span class="req"></span></label> 
						<input type="text" size="30" name="locationCity" id="locationCity" value="City">   <br /><br /> 
						<label for="locationState">State<span class="req"></span></label>  <select name="locationState" id="locationState">
							<option value="">Select one . . .</option>
							<option value="AL">AL</option><option value="AK">AK</option><option value="AZ">AZ</option><option value="AR">AR</option>
							<option value="CA">CA</option><option value="CO">CO</option><option value="CT">CT</option>
							<option value="DE">DE</option><option value="DC">DC</option><option value="FL">FL</option>
							<option value="GA">GA</option><option value="HI">HI</option>
							<option value="ID">ID</option><option value="IL">IL</option><option value="IN">IN</option><option value="IA">IA</option>
							<option value="KS">KS</option><option value="KY">KY</option><option value="LA">LA</option>
							<option value="ME">ME</option><option value="MD">MD</option><option value="MA">MA</option>
							<option value="MI">MI</option><option value="MN">MN</option><option value="MS">MS</option>
							<option value="MO">MO</option><option value="MT">MT</option>
							<option value="NE">NE</option><option value="NV">NV</option><option value="NH">NH</option>
							<option value="NJ">NJ</option><option value="NM">NM</option><option value="NY">NY</option>
							<option value="NC">NC</option><option value="ND">ND</option>
							<option value="OH">OH</option><option value="OK">OK</option><option value="OR">OR</option>
							<option value="PA">PA</option><option value="RI">RI</option>
							<option value="SC">SC</option><option value="SD">SD</option>
							<option value="TN">TN</option><option value="TX">TX</option>
							<option value="UT">UT</option><option value="VT">VT</option><option value="VA">VA</option>
							<option value="WA">WA</option><option value="WV">WV</option><option value="WI">WI</option>
							<option value="WY">WY</option>
						</select><br /><br />
						<label for="locationZip">Zip Code:<span class="req"></span></label>  <input type="text" name="locationZip" id="locationZip" value="Zip Code" ><br /><br />
					</fieldset>
					<fieldset>
						<legend>Contact Information for Location:</legend>
						<label for="contactName">Contact at Location:<span class="req"></span></label>  <input type="text" size="65" name="contactName" id="contactName" value="Name of person visiting"><br /><br />
						<label for="locationPhone">Phone number for this location: <span class="req"></span></label>  <input type="phone" size="65" name="locationPhone" id="locationPhone"><br />
					</fieldset>
					<fieldset>
						<legend>Appointment Information:</legend>
						<label for="date">Date of Visit: <span class="req"></span></label> <input type="date" name="date" id="date"><br /><br />
						<p>Please enter the times below in military time (for example: 11AM would be 11:00 but 11PM would be 22:00)</p>
						<label for="arriveTime">Estimated time of arrival at this location: <span class="req"></span></label>  <input type="time" size="65" name="arriveTime" id="arriveTime"><br /><br />
						<!-- looking for a way to make the "Driver" or "Routes" text boxes pop up only if that transportation mode is selected -->
						<label for="transportMode">Method of transportation to location:</label><br />
						<input type="radio" name="transportMode" value="car"> Car  <br />
						<input type="radio" name="transportMode" value="bus"> Bus <br />
						<p>If you selected "Car" above, please enter the information for the driver in the space below.  If you selected "Bus", please enter the information for <strong>all</strong> of the routes you will take.</p>						
						<input type="radio" name="transportMode" value="female">
						<label for="departTime">Estimated time of departure from this location:<span class="req"></span></label> <input type="time" size="65" name="departTime" id="departTime"><br /><br />
						<label for="estTotalTime">Estimated total time at location: <span class="req"></span></label><br/><input type="text" size="65" name="estTotalTime" id="estTotalTime" value="How long will you be here?"><br /><br />
						<label for="reasonForVisit">Reason/Purpose of visit:<span class="req"></span></label><br />
						<textarea rows="15" cols="15" name="reasonForVisit" id="reasonForVisit" value="Why will you be at this location at this time?">Why will you be at this location at this time?</textarea><br /><br /><br />
					</fieldset>
		
					<div class="submit">
						<input type="submit" value="Submit" class="button">
					</div>
			</form>
			</div>
		<div class="wrapper">
			<h3>Daily Planner Schedule</h3>
			<p>Pulled from DB</p>
		</div>
				
			</div>		
        <?php include "../lib/footer.php" ?>
		  <?php include "../lib/script.php" ?>
	</body>
</html>