<?PHP
   $home = $_SERVER['HOME'];
   require_once $home . "../lib/func/query-helper.php";
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
	  
<script type = "text/javascript" src ="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type = "text/javascript">
$(function() {
	$('input:text:first').focus();
    var $inp = $('input:text');
    $inp.bind('keydown', function(e) {
     var key = e.which;
        if (key == 13) {
        e.preventDefault();
        var nextIndex = $('input:text').index(this) + 1;
        var maxIndex = $('input:text').length;
        if (nextIndex < maxIndex) {
        $('input:text:eq(' + nextIndex+')').focus();
        }
        if  (nextIndex == maxIndex ) {
        $('textarea').focus();
        }
        }
                 
        });
    });
    </script>

<body>

<?php include "../lib/include/menu.php" ?>
<form action="../lib/func/insert-staff.php" method="post">
<div class="wrapper container-fluid dw-container">
<div class="resident">
	<h2>Staff Entry</h2>
</div>	
<div class="column">
	<label>Staff ID:<span class="req"></span></label></br>
	<input type="text" name="staffID" id="staffInput" value=""/></br></br>
	
	<label>First Name:<span class="req"></span></label></br>
	<input type="text" name="staffFirstName" id="staffInput" value=""/></br></br>
	
	<label>Last Name:<span class="req"></span></label></br>
	<input type="text" name="staffLastName" id="staffInput" value=""/></br></br>
	
	<label>Photo:<span class="req"></span></label></br>
	<input type="file" name="staffImage" id="staffInput"></br></br>
	
</div>

<div class = "column">

<label>Username:<span class="req"></span></label></br>
	<input type="username" name="staffUsername" id="staffInput" value=""/></br></br>
	
	<label>Password:<span class="req"></span></label></br>
	<input type="password" name="staffPassward" id="staffInput" value=""/></br></br>
	
	<label>Admin?:<span class="req"></span></label></br>
		<select name="staffAdmin"id="staffInput">
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select><br><br>
	
</div>

<div class="column">
	
	<label>Staff Phone #:<span class="req"></span></label></br>
	<input type="tel" name="staffPhoneNumber" id="staffInput" value=""/></br></br>
	
	<label>Staff Address:<span class="req"></span></label></br>
	<input type="text" name="staffAddress" id="staffInput" value=""/></br></br>
	
	<label>City:<span class="req"></span></label></br>
	<input type="text" name="staffCity" id="staffInput" value=""/></br></br>
	
	<label>State:<span class="req"></span></label></br>
	<input type="text" name="staffState" id="staffInput" value=""/></br></br>
	
	<label>Zip Code:<span class="req"></span></label></br>
	<input type="number" name="staffZip" id="staffInput" value=""/></br></br>

</div>
<div class="submit">
	<input type="submit" name = "submit" value="Submit" class="submit">
</div>
</form>
		
  <?php include "../lib/include/footer.php" ?>
  <?php include "../lib/include/script.php" ?>
</body>
</html>