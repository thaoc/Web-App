<!doctype html>

<html lang="en">
    
    <?php 
    
    include "../lib/include/head.php";
    
    require_once(getcwd( ) . "/../lib/func/case-note.php");    
    require_once(getcwd( ) . "/../lib/func/db-connect.php");
    
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
        if($conn->connect_error){
            die("Connection Failed! ". mysqli_connect_error());
        }

    
    if(isset($_POST['lstNote']) && !($_POST['lstNote'] == 'new')) {
        $sql = "SELECT Case_Notes_ID, DATE_FORMAT(Case_Notes_DateTime, '%m/%d/%Y %h:%i %p') Case_Notes_DateTime, Case_Notes_Title, Case_Notes_Record, Case_Notes_Resident_ID_FK, Case_Notes_Staff_ID_FK 
        FROM Case_Notes WHERE Case_Notes_ID =" . $_POST['lstNote'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // populate text boxes with info from database
        $thisNote = [
            "caseNoteID" => $row['Case_Notes_ID'],
            "caseNoteDateTime" => $row['Case_Notes_DateTime'],
            "caseNoteTitle" => $row['Case_Notes_Title'],
            "caseNoteRecord" => $row['Case_Notes_Record'],
            "caseNoteResidentID" => $row['Case_Notes_Resident_ID_FK'],
            "caseNoteStaffID" => $row['Case_Notes_Staff_ID_FK']
        ];
    }// end if lstNote


    // Switch statement for buttons
    switch($_POST['btnSubmit']){
        
        case 'delete':
            if($_POST["txtTitle"] == ""){
                echo "<h4 style='color: red;'>Please select a note to delete.</h4>";
            } else {
                $sql = "DELETE FROM Case_Notes WHERE Case_Notes_ID = " . $thisNote['caseNoteID'];
                $result = $conn->query($sql);
            }
           
            break;
            
        case 'new':
            if ($_POST['txtTitle'] === "" ||
                $_POST['txtDateTime'] === "" ||
                $_POST['txtResidentID'] === "" ||
                $_POST['txtStaffID'] === "" ||
                $_POST['txtRecord'] === "") {
                echo "<h4 style='color: red;'>Please enter in all fields</h4>";
            } else {
                $sql = "INSERT INTO Case_Notes (Case_Notes_ID, Case_Notes_Record, Assistance_ID, Case_Notes_DateTime, Case_Notes_Resident_ID_FK, Case_Notes_Staff_ID_FK, Case_Notes_Title)
                        VALUES (NULL, '"    . $_POST['txtRecord'] ."', NULL, '"
                                            . $_POST['txtDateTime'] ."', '"
                                            . $_POST['txtResidentID'] ."', '"
                                            . $_POST['txtStaffID'] ."', '"
                                            . $_POST['txtTitle'] ."')";
                $result = $conn->query($sql);
            }
            
            break;
/*            
        case 'update':
            if ($_POST['txtTitle'] == ""){
                echo "<h3>Please select a note to update.</h3>";
            } else {
                $sql = "UPDATE Case_Notes SET Case_Notes_Record = '" . $_POST['txtRecord'] . "', "
                                            . " Assistance_ID = NULL, "
                                            . " Case_Notes_DateTime = '" . $_POST['txtDateTime'] . "', "
                                            . " Case_Notes_Resident_ID_FK = '" . $_POST['txtResidentID'] . "', "
                                            . " Case_Notes_Staff_ID_FK = '" . $_POST['txtStaffID'] . "', "
                                            . " Case_Notes_Title = '" . $_POST['txtTitle'] . "'
                        WHERE Case_Notes_ID = " . $thisNote['caseNoteID']; 
                $result = $conn->query($sql);
                
            }
            
            break;
*/            
    }
    
    ?>

<body>

    <?php include "../lib/include/menu.php" ?>
    
     <h1 style="color: white;">Case Notes</h1>
   
    <div class="wrapper4">
        
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" 
              method="POST" name="frmCaseNote" id="frmCaseNote">
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lstNote">Select a case note</label>   
                <select name="lstNote" class="form-control" id="lstNote" onChange="this.form.submit();">
                    <option value="new">Add new note</option>         
                    <?PHP 
                    // pull case note titles from database for option list
                    $sql = "SELECT Case_Notes_ID, Case_Notes_Title FROM Case_Notes ORDER BY Case_Notes_DateTime DESC";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc())
                    { echo "<option value='" . $row['Case_Notes_ID'] . "'>" . $row['Case_Notes_Title'] . "</option>"; }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label  for="dateAndTime">Date and time</label>    
                <input type="datetime-local" class="form-control" name="txtDateTime" id="txtDateTime" value="<?PHP echo $thisNote['caseNoteDateTime']; ?>" > 
            </div>
        </div>    
         
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="txtTitle" id="txtTitle" placeholder="Title" value="<?PHP echo $thisNote['caseNoteTitle']; ?>" >
            </div>
            <div class="form-group col-md-3">
                <label for="residentID">Resident ID</label>
                <input type="text" class="form-control" name="txtResidentID" id="txtResidentID" placeholder="Resident ID" value="<?PHP echo $thisNote['caseNoteResidentID']; ?>" >
            </div>
            <div class="form-group col-md-3">
                <label for="staffID">Staff ID</label>
                <input type="text" class="form-control" name="txtStaffID" id="txtStaffID" placeholder="Staff ID" value="<?PHP echo $thisNote['caseNoteStaffID']; ?>" >
            </div>  
        </div>     
        
        <div class="form-group">
            <label for="note">Enter case note here</label>    
            <textarea name="txtRecord" class="form-control" id="txtRecord" rows="6" placeholder="Enter case note here" value="<?PHP echo $thisNote['caseNoteRecord']; ?>" >
            </textarea>
        </div>    
     
        <button type="submit" name="btnSubmit" value="delete" style="float: left; margin-left: 0em;" class="button" onclick="this.form.submit();">
        Delete
        </button>

        <button type="submit" name="btnSubmit" value="new" style="float:right; margin-right: 0em;" class="button" onclick="this.form.submit();">
        Add 
        </button>
 <!--       
        <button name="btnSubmit" value="update" style="float:right;" class="button" onclick="this.form.submit();">
        Update
        </button>
-->       
        </form><br><br><br><br><br>
        <hr><br><br>
        
        <?PHP showNote(); ?>

    </div>
    
    <script>
        // Insert values from selected note into text boxes
        document.getElementById("lstNote").value = "<?PHP echo $thisNote['caseNoteID']; ?>";    
        document.getElementById("txtTitle").value = "<?PHP echo $thisNote['caseNoteTitle']; ?>";
        document.getElementById("txtDateTime").value = "<?PHP echo $thisNote['caseNoteDateTime']; ?>";
        document.getElementById("txtResidentID").value = "<?PHP echo $thisNote['caseNoteResidentID']; ?>";
        document.getElementById("txtStaffID").value = "<?PHP echo $thisNote['caseNoteStaffID']; ?>";
        document.getElementById("txtRecord").value = "<?PHP echo $thisNote['caseNoteRecord']; ?>";   
    </script>
    
    <?php include "../lib/include/footer.php" ?>
	<?php include "../lib/include/script.php" ?>

</body>
</html>