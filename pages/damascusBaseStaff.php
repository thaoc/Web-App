<!doctype html>

<html lang="en">

<?php include "../lib/head.php" ?>

<body>

<?php include "../lib/menu.php" ?>
<form action="../lib/func/insert-staff.php" method="post">
<div class="wrapper">
<div class="resident">
	<h2>Staff Profile</h2>
</div>	
<div class="column">
	<label>Staff ID:<span class="req"></span></label></br>
	<input type="text" name="staffID" id="staffInput" value="Agent ID"/></br></br>
	
	<label>First Name:<span class="req"></span></label></br>
	<input type="text" name="staffFirstName" id="staffInput" value="First Name"/></br></br>
	
	<label>Last Name:<span class="req"></span></label></br>
	<input type="text" name="staffLastName" id="staffInput" value="Last Name"/></br></br>
	
	<label>Photo:<span class="req"></span></label></br>
	<input type="file" name="staffImage" id="staffInput"></br></br>
	
</div>

<div class = "column">

<label>Username:<span class="req"></span></label></br>
	<input type="username" name="staffUsername" id="staffInput" value="Username"/></br></br>
	
	<label>Password:<span class="req"></span></label></br>
	<input type="password" name="staffPassward" id="staffInput" value="Password"/></br></br>
	
	<label>Admin?:<span class="req"></span></label></br>
		<select name="staffAdmin"id="staffInput">
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select><br><br>
	
</div>

<div class="column">
	
	<label>Staff Phone #:<span class="req"></span></label></br>
	<input type="tel" name="staffPhoneNumber" id="staffInput" value="Phone #"/></br></br>
	
	<label>Staff Address:<span class="req"></span></label></br>
	<input type="text" name="staffAddress" id="staffInput" value="Street Address"/></br></br>
	
	<label>City:<span class="req"></span></label></br>
	<input type="text" name="staffCity" id="staffInput" value="City"/></br></br>
	
	<label>State:<span class="req"></span></label></br>
	<input type="text" name="staffState" id="staffInput" value="State"/></br></br>
	
	<label>Zip Code:<span class="req"></span></label></br>
	<input type="number" name="staffZip" id="staffInput" value="12345"/></br></br>

</div>
<div class="submit">
	<input type="submit" name = "submit" value="Submit" class="submit">
</div>
</form>
		
  <?php include "../lib/footer.php" ?>
  <?php include "../lib/script.php" ?>
</body>
</html>