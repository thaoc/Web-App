<?PHP
   $home = $_SERVER['HOME'];
   require_once $home . "../lib/func/form-helper.php";
   //ini_set('display_errors', 1);
   ?>
<!doctype html>
<html lang="en">
   <?php
   include "../lib/include/head.php";
   require_once (getcwd()."/../lib/func/db-connect.php");
      
      databaseConnection("damascus_way");
          $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
          if($conn->connect_error){
              die("Connection Failed! ". mysqli_connect_error());
          }
      ?>
<html lang="en">
	<body>	
		<?php include "../lib/include/menu.php" ?>
		<h1>Daily Planner: <?php echo $user_name ?> </h1>
		<p>Enter the information for one destination on your daily schedule in the form below, then click <strong>Add</strong>. Do this for each location you have on your schedule for the day.</p>
			<div class="wrapper2"><br>
			<h2>Event Entry</h2>
				<form action="lib/func/insert-event.php" method="POST">
					<fieldset class="column5">
						<legend>Location Information</legend>
						<label for="locationName">Location Name: <span class="req"></span></label> <input class="right-align form-control" type="text" name="locationName" id="locationName" value="Name of the location"/>
						<br /><br />
						<label for="locationStreet">Location Address: <span class="req"></span></label><input class="right-align form-control" type="text" name="locationStreet" id="locationStreet" value="Street Address"/>
						<br /><br />
						<label for="locationCity">City: <span class="req"></span></label> <input class="right-align form-control" type="text"  name="locationCity" id="locationCity" value="City">
						   <br /><br /> 
						<p>Contact Information for Location</p> 
						<label for="contactName">Contact at Location:<span class="req"></span></label>  <input class="right-align form-control" type="text" name="contactName" id="contactName" value="Name of person visiting"><br /><br />
						<label for="locationPhone">Phone number at location: <span class="req"></span></label>  <input class="right-align form-control" type="phone" name="locationPhone" id="locationPhone"><br />
					</fieldset>
   
					<fieldset class="column6">
						<legend>Event Information</legend>
						<label for="date">Date of Visit: <span class="req"></span></label> <input class="right-align-2 form-control" size="30" type="date" name="date" id="date"><br />
						<br/>
						<label for="arriveTime">Estimated time of arrival at location: <span class="req"></span></label> 
						<input type="time" class="without_ampm right-align-2 form-control"  name="arriveTime" id="arriveTime"><br /><br />
						<label for="transportMode">Method of transportation to location:</label><br/>
						<input type="radio" name="transportMode" value="car"> Car     <br />         
						<input type="radio" name="transportMode" value="bus"> Bus <br /></span>
						 <br />
						<label for="transportInfo">Bus Routes or Car Driver's Name/Phone</label><br/>
						<input class="form-control" size="60" type="text" name="transportInfo" id="transportInfo" value="Enter the routes, if you selected Bus or the driver's name and number, if you selected Car" /><br /> 
						<label for="departTime">Estimated time of departure from location:<span class="req"></span></label> <input type="time" class="without_ampm right-align-2 form-control" name="departTime" id="departTime"><br /><br />
						<label for="estTotalTime">Estimated total time at location: <span class="req"></span></label><input class="right-align-2 form-control" type="text" name="estTotalTime" id="estTotalTime" value="How long will you be here?"><br /><br />
						<label for="reasonForVisit">Reason/Purpose of visit:<span class="req"></span></label><br />
						<textarea name="reasonForVisit" id="reasonForVisit" rows="4" cols="62" value="Why will you be at this location at this time?">Why will you be at this location at this time?</textarea><br /><br /><br />
					</fieldset><br>

					<div class="submit">
						<input class="form-control" type="submit" value="Submit" class="button">
					</div>
			</form><br>
		</div>
		<?php include "../lib/include/footer.php" ?>
		<?php include "../lib/include/script.php" ?>
	</body>
</html>