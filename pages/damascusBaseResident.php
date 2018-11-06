<?PHP

    $home = $_SERVER['HOME'];
    require_once $home . "../lib/func/form-generator.php";
    //ini_set('display_errors', 1);
?>

<!doctype html>

<html lang="en">

<?php include "../lib/head.php" ?>

<body>

<?php include "../lib/menu.php" ?>

<form>
<div class="wrapper">
<div class="resident">
	<h2>Resident Profile</h2>
</div>	
<div class="column">
	<label>Offender ID:<span class="req"></span></label></br>
	<input type="text" name="offenderID" id="offenderInput" value="Offender ID"/></br></br>
	
	<label>First Name:<span class="req"></span></label></br>
	<input type="text" name="offenderFirstName" id="offenderInput" value="First Name"/></br></br>
	
	<label>Last Name:<span class="req"></span></label></br>
	<input type="text" name="offenderLastName" id="offenderInput" value="Last Name"/></br></br>
	
	<label>Photo:<span class="req"></span></label></br>
	<input type="file" name="offenderImage" id="offenderInput"></br></br>
	
	<label>Offense:<span class="req"></span></label></br>
	<input type="text" name="offenderOffense" id="offenderInput" value="Offense"/></br></br>
	
	<label>Sex Offender?<span class="req"></span></label></br>
		<select name="sexOffender" id="offenderInput">
			<option value="yes">Yes</option>
			<option value="no">No</option>
         </select><br><br>
		 
	<label>Risk Level:<span class="req"></span></label></br>
		<select name="offenderRiskLevel"id="offenderInput">
			<option value="low">Low</option>
			<option value="medium">Medium</option>
			<option value="High">High</option>
		</select><br><br>
</div>

<div class = "column">
	<label>Admit Date:<span class="req"></span></label></br>
	<input type="date" name="offenderAdmitDate" id="offenderInput"/></br></br>
	
	<label>Exit Date:<span class="req"></span></label></br>
	<input type="date" name="offenderExitDate" id="offenderInput"/></br></br>
	
	<label>Facility:<span class="req"></span></label></br>
		<select name="facility" id="offenderInput">
			<option value="minnepolis">Minneapolis</option>
			<option value="rochester">Rochester</option>
		</select></br></br>
		
	<label>Room #:<span class="req"></span></label></br>
	<input type="text" name="offenderRoomNumber" id="offenderInput" value="Room #"/></br></br>
	
	<label>Caseworker<span class="req"></span></label></br>
	<input type="text" name="offenderCaseworker" id="offenderInput" value="Caseworker"/></br></br>
	
	<label>CW Phone #:<span class="req"></span></label></br>
	<input type="tel" name="offenderCWPhoneNumber" id="offenderInput" value="CW Phone #"/></br></br>
	
</div>

<div class="column">

	<label>Eye Color:<span class="req"></span></label></br>
		<?php rowQueryHelper("Eye_Color", "Eye_description", "Eye_Color", "eye_color")?>
        <!--<select name="eyeColor" id="offenderInput">
			<option value="amber">Amber</option>
			<option value="blue">Blue</option>
			<option value="brown">Brown</option>
			<option value="green">Green</option>
			<option value="hazel">Hazel</option>
		</select></br></br>-->
		
	<label>Hair Color:<span class="req"></span></label></br>
		<select name="hairColor" id="offenderInput">
			<option value="auburn">Auburn</option>
			<option value="black">Black</option>
			<option value="blonde">Blonde</option>
			<option value="brown">Brown</option>
			<option value="gray">Gray</option>
			<option value="red">Red</option>
		</select></br></br>
		
	<label>Height:<span class="req"></span></label></br>
	<input type="number" name="offenderHeight" value="72"/></br></br>
	
	<label>Weight:<span class="req"></span></label></br>
	<input type="number" name="offenderWeight" id="offenderInput" value="125"/></br></br>
	
	<label>Race:<span class="req"></span></label></br>
		<select name="race" id="offenderInput">
			<option value="nativeAmerican">Native American</option>
			<option value="asian">Asian</option>
			<option value="africanAmerican">African American</option>
			<option value="caucasion">Caucasion</option>
			<option value="hispanicLation">Hispanic/Lation</option>
		</select></br></br>
		
	<label>Date of Birth:<span class="req"></span></label></br>
	<input type="date" name="offenderDateOfBirth" id="offenderInput"/></br></br>
</div>

<div class ="column">

	<label>Agent Name:<span class="req"></span></label></br>
	<input type="text" name="offenderAgent" id="offenderInput" value="Agent Name"/></br></br>
	
	<label>Agent Phone #:<span class="req"></span></label></br>
	<input type="tel" name="offengerAgentPhoneNumber" id="offenderInput" value="Agent Phone #"/></br></br>
	
	<label>Agent Address:<span class="req"></span></label></br>
	<input type="text" name="offenderAgentAddress" id="offenderInput" value="Agent Address"/></br></br>
	
	<label>Username:<span class="req"></span></label></br>
	<input type="username" name="offenderUsername" id="offenderInput" value="Username"/></br></br>
	
	<label>Password:<span class="req"></span></label></br>
	<input type="password" name="offenderPassward" id="offenderInput" value="Password"/></br></br>
	
	<label>Reenter Password:<span class="req"></span></label></br>
	<input type="password" name="offenderPassward" id="offenderInput" value="Password"/></br></br>

</div>
<div class="submit">
	<input type="submit" value="Submit" class="button">
</div>
</form>
<?php include "../lib/footer.php" ?>
<?php include "../lib/script.php" ?>
</body>
</html>