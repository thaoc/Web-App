<!doctype html>

<html lang="en">
<?php
// Head stuff
        /* Displays user information and some useful messages */
        session_start();
        // Check if user is logged in using the session variable
        if ( $_SESSION['logged_in'] != 1 ) {
            $_SESSION['message'] = "You must log in before viewing your profile page!";
            header("location: error.php");
        }
        else {
	        // Makes it easier to read
	        $user_name = $_SESSION['user_name'];
	        $email = $_SESSION['email'];
	        $active = $_SESSION['active'];
        }
include "../lib/include/head.php" ?>

	<body>

		<?php include "../lib/include/menu.php" ?>
		<h1>Daily Planner: <?php echo $user_name ?></h1>
		<p>Enter the information for one destination on your daily schedule in the form below, then click <strong>Add</strong>. Do this for each location you have on your schedule for the day.</p>
			<div class="wrapper2"><br>
			<h2>Event Entry</h2>
				<form action="insert-event.php" method="POST">
					<fieldset class="column5">
						<legend>Location Information</legend>
						<label for="locationName">Location Name: <span class="req"></span></label> <input class="right-align" type="text" name="locationName" id="locationName" value="Name of the location"/>
						<br /><br />
						<label for="locationStreet">Location Address: <span class="req"></span></label><input class="right-align" type="text" name="locationStreet" id="locationStreet" value="Street Address"/>
						<br /><br />
						<label for="locationCity">City: <span class="req"></span></label> <input class="right-align" type="text"  name="locationCity" id="locationCity" value="City">
						   <br /><br /> 
						<label for="locationState">State: <span class="req"></span></label>  <select class="right-align" name="locationState" id="locationState">
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
						<label for="locationZip">Zip Code:<span class="req"></span></label>  <input class="right-align" type="text" name="locationZip" id="locationZip" value="Zip Code" ><br /><br />
						<p>Contact Information for Location</p> 
						<label for="contactName">Contact at Location:<span class="req"></span></label>  <input class="right-align" type="text" name="contactName" id="contactName" value="Name of person visiting"><br /><br />
						<label for="locationPhone">Phone number at location: <span class="req"></span></label>  <input class="right-align" type="phone" name="locationPhone" id="locationPhone"><br />
					</fieldset>
   
					<fieldset class="column6">
						<legend>Event Information</legend>
						<label for="date">Date of Visit: <span class="req"></span></label> <input class="right-align-2" size="30" type="date" name="date" id="date"><br />
						<p>Please enter the times below in military time (for example: 11AM would be 11:00 but 11PM would be 22:00)</p>
						<label for="arriveTime">Estimated time of arrival at location: <span class="req"></span></label>  <input class="right-align-2" type="time" size="65" name="arriveTime" id="arriveTime"><br /><br />
						<!-- looking for a way to make the "Driver" or "Routes" text boxes pop up only if that transportation mode is selected -->
						<label for="transportMode">Method of transportation to location:</label>
                        <span class="totheright">
						<input type="radio" name="transportMode" value="car"> Car  
						<input type="radio" name="transportMode" value="bus"> Bus <br /></span>
						<p>If you selected "Car" above, please enter the information for the driver in the space below.  If you selected "Bus", please enter the information for <strong>all</strong> of the routes you will take.</p>						
						
						<label for="departTime">Estimated time of departure from location:<span class="req"></span></label> <input class="right-align-2" type="time"  name="departTime" id="departTime"><br /><br />
						<label for="estTotalTime">Estimated total time at location: <span class="req"></span></label><input class="right-align-2" type="text" name="estTotalTime" id="estTotalTime" value="How long will you be here?"><br /><br />
						<label for="reasonForVisit">Reason/Purpose of visit:<span class="req"></span></label><br />
						<textarea name="reasonForVisit" id="reasonForVisit" rows="4" cols="62" value="Why will you be at this location at this time?">Why will you be at this location at this time?</textarea><br /><br /><br />
					</fieldset><br>

					<div class="submit">
						<input type="submit" value="Submit" class="button">
					</div>
			</form><br>
                <hr><br>
                
                <h2>Event List</h2><br>
                <div class="eventlist">
                <div class="table-responsive-lg">
                    <table class="table table-striped">
                        <tr>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Arrive</th>
                            <th>Depart</th>
                            <th>Purpose</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <? php
							$home = $_SERVER['HOME'];
							require_once "db-connect.php";
							
							    databaseConnection("damascus_way");
								$conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
								if($conn->connect_error){
									die("Connection Failed! ". mysqli_connect_error());
								}

								$sql = "SELECT dp_location, dp_date, dp_returning, dp_leaving   FROM Daily_Planner WHERE resident_id = $user_name";
								$result = $conn->query($sql);
								
								if ($result -> num_rows > 0) {
									while ($row = $result -> fetch_assoc()) 
									{
										echo "<tr><td>" . $row['dp_location'] . "</td><td>" . $row['dp_date'] . "</td><td>" . $row['dp_returning'] . "</td><td>" . $row['dp_leaving'] ."</td></tr>";
										
									}
								}
								$conn->close();
						?>
					</table>    
                
            
                <br><br>
                
			</div>
				
        <?php include "../lib/include/footer.php" ?>
		  <?php include "../lib/include/script.php" ?>
	</body>
</html>