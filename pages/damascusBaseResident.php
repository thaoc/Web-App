<?PHP
   session_start();
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
   <body>
      <?php include "../lib/include/menu.php" ?>
      <form action="../lib/func/insert-resident.php" method="post">
         <div class="wrapper container-fluid dw-container">
         <div class="resident">
            <h2>Resident Intake</h2>
         </div>
         <div class="row dw-row">
            <!--<label class="form-control highlight">Offender ID:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderID" id="offenderInput" value="Offender ID"/></br></br>-->
            <div class="col-md-4">
               <label class="form-control highlight">First Name:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderFirstName" id="offenderInput" value="" tabindex="1"/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Middle Name:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderMiddleName" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Last Name:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderLastName" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Photo:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="file" name="offenderImage" id="offenderInput"></br></br>
            </div>	
            <div class="col-md-4">
               <label class="form-control highlight">Caseworker<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderCaseworker" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">CW Phone #:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="tel" name="offenderCWPhoneNumber" id="offenderInput" value=""/></br></br>
            </div>			
         </div>
         <!-- End Row 1 -->
         <div class="row">
            <div class="col-md-4">
               <label class="form-control highlight" for="offenderOffense">Offense:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderOffense" id="offenderInput">
                  <?PHP
                     // Loop through the runner table to build the <option> list
                     $sql = "SELECT Offense_ID, Offense_Type AS 'offense'
                     FROM Offense ORDER BY Offense_Type";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                     echo "<option value='" . $row['offense'] . "'>" . $row['offense'] . "</option>\n";
                     }
                     
                     ?>
               </select>
			  </br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Sex Offender?<span class="req"></span></label></br>
               <select class="form-control checkin"  name="sexOffender" id="offenderInput">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
               </select>
               <br><br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight" for="offenderRiskLevel">Risk Level:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderRiskLevel" id="offenderInput">
                  <?PHP
                     // Loop through the runner table to build the <option> list
                     $sql = "SELECT Risk_Level_ID, Risk_Level_Type AS 'riskLevel'
                     FROM Risk_Level ORDER BY Risk_Level_Type";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                     echo "<option value='" . $row['riskLevel'] . "'>" . $row['riskLevel'] . "</option>\n";
                     }
                     
                     ?>
               </select>
               <br><br>
            </div>
         </div>
         <!-- End Row 2 -->
         <div class = "row dw-row">
            <div class="col-md-4">
               <label class="form-control highlight">Admit Date:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="date" name="offenderAdmitDate" id="offenderInput"/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Exit Date (Est.):<span class="req"></span></label></br>
               <input class="form-control checkin"  type="date" name="offenderExitDate" id="offenderInput"/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Facility:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderFacility" id="offenderInput">
                  <option value="1">Rochester</option>
                  <option value="2">Golden Valley</option>
               </select>
               </br></br>
            </div>
			<div class="col-md-4">
               <label class="form-control highlight">Room #:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderRoomNumber" id="offenderInput" value=""/></br></br>
            </div>
         </div>
         <!-- End Row 3 -->
		 <div class ="row dw-row">
            <div class="col-md-4">
               <label class="form-control highlight">Agent Name:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderAgent" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Agent Phone #:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="tel" name="offengerAgentPhoneNumber" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Agent Address:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderAgentAddress" id="offenderInput" value=""/></br></br>
            </div>
			<div class="col-md-4">
			   <label class="form-control highlight">Agent Email:<span class="req"></span></label></br>
			   <input class="form-control checkin" type="text" name="offenderAgentEmail" id="offenderInput" value=""/></br></br>
			</div>
         </div>
         <!-- End Row 4 -->
         <br>
         <hr>
         <br>
         
         <div class="row dw-row">
            <div class="col-md-4">
               <label class="form-control highlight" for="offenderEyeColor">Eye Color:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderEyeColor" id="offenderInput">
                  <?PHP
                     // Loop through the runner table to build the <option> list
                     $sql = "SELECT Eye_Color_ID, Eye_Color_Description AS 'eyeColor'
                     FROM Eye_Color ORDER BY Eye_Color_Description";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                     echo "<option value='" . $row['eyeColor'] . "'>" . $row['eyeColor'] . "</option>\n";
                     }
                     
                     ?>
               </select>
               </br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight" for="offenderHairColor">Hair Color:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderHairColor" id="offenderInput">
                  <?PHP
                     // Loop through the runner table to build the <option> list
                     $sql = "SELECT Hair_Color_ID, Hair_Color_Description AS 'hairColor'
                     FROM Hair_Color ORDER BY Hair_Color_Description";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                     echo "<option value='" . $row['hairColor'] . "'>" . $row['hairColor'] . "</option>\n";
                     }
                     
                     ?>
               </select>
			   </br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Height(inches):<span class="req"></span></label></br>
               <input class="form-control checkin"  type="number" name="offenderHeight" value=""/></br></br>
            </div>
         </div>
         <!-- End Row 5 -->
         <div class="row dw-row">
            <div class="col-md-4">
               <label class="form-control highlight">Weight:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="number" name="offenderWeight" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Sex:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderSex"/>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
               </select>
               </br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight" for="offenderRace">Race:<span class="req"></span></label></br>
               <select class="form-control checkin"  name="offenderRace" id="offenderInput">
                  <?PHP
                     // Loop through the runner table to build the <option> list
                     $sql = "SELECT Race_ID, Race_Description AS 'race'
                     FROM Race ORDER BY Race_Description";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                     echo "<option value='" . $row['race'] . "'>" . $row['race'] . "</option>\n";
                     }
                     
                     ?>
               </select>
			   </br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Date of Birth:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="date" name="offenderDateOfBirth" id="offenderInput" placeholder="YYYY-MM-DD"/></br></br>
            </div>
			<div class="col-md-4">
               <label class="form-control highlight">Birthplace:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="text" name="offenderBirthplace" id="offenderInput" value=""/></br></br>
            </div>
			<div class="col-md-4">
               <label class="form-control highlight">Tattoos/Markings:<span class="req"></span></label></br>
			   <input class="form-control checkin" type="text" name="offenderTattoo" id="offenderInput" value=""/></br></br>
			</div>
         </div>
		 
         <!-- End Row 6 -->

         <div class="row dw-row">
            <div class="col-md-4">
               <label class="form-control highlight">Username:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="username" name="offenderUsername" id="offenderInput" value=""/></br></br>
            </div>
            <div class="col-md-4">
               <label class="form-control highlight">Password:<span class="req"></span></label></br>
               <input class="form-control checkin"  type="password" name="offenderPassword" id="offenderInput" value=""/></br></br>
            </div>
         </div>
         <!-- End Row 7 -->
         <div class="row dw-row">
            <div class="col-md-12">
               <div class="submit">
                  <input class="form-control checkin"  type="submit" value="Submit" class="button">
               </div>
            </div>
         </div>
      </form>
      <?php include "../lib/include/footer.php" ?>
      <?php include "../lib/include/script.php" ?>
   </body>
</html>