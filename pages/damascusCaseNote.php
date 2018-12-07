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
        $sql = "SELECT Case_Notes_ID, Case_Notes_DateTime, Case_Notes_Title, Case_Notes_Record, Case_Notes_Resident_ID_FK, Case_Notes_Staff_ID_FK 
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
    
    function clearNote() {
        $thisNote['caseNoteID'] = "";
        $thisNote['caseNoteDateTime'] = "";
        $thisNote['caseNoteTitle'] = "";
        $thisNote['caseNoteRecord'] = "";
        $thisNote['caseNoteResidentID'] = "";
        $thisNote['caseNoteStaffID'] = "";
    }
    
    
    // Switch statement for buttons
    switch($_POST['btnSubmit']){
        // ------------ DELETE ----------
        case 'delete':
            if($_POST["txtTitle"] == ""){
                echo "Please select a note to delete.";
            } else {
                $sql = "DELETE FROM Case_Notes WHERE Case_Notes_ID = " . $thisNote['caseNoteID'];
                $result = $conn->query($sql);
            }
            
            // make text fields blank
            clearNote();
            break;
            
        case 'new':
            if ($_POST['txtTitle'] === "" ||
                $_POST['txtDateTime'] === "" ||
                $_POST['txtResidentID'] === "" ||
                $_POST['txtStaffID'] === "" ||
                $_POST['txtRecord'] === "") {
                echo "Please type in the title, date and time, resident ID, Staff ID, and note.";
            } else {
                $sql = "INSERT INTO Case_Notes (Case_Notes_ID, Case_Notes_Record, Assistance_ID, Case_Notes_DateTime, Case_Notes_Resident_ID_FK, Case_Notes_Staff_ID_FK, Case_Notes_Title)
                        VALUES (NULL, '"    . $_POST['txtRecord'] ."', NULL, '"
                                            . $_POST['txtDateTime'] ."', '"
                                            . $_POST['txtResidentID'] ."', '"
                                            . $_POST['txtStaffID'] ."', '"
                                            . $_POST['txtTitle'] ."')";
                $result = $conn->query($sql);
            }
            
            clearNote();
            break;
            
        case 'update':
            if ($_POST['txtTitle'] == ""){
                echo "Please select a note to update.";
            } else {
               // $isSuccessful = false;
                $sql = "UPDATE Case_Notes SET Case_Notes_Record = '" . $_POST['txtRecord'] . "', "
                                            . " Case_Notes_DateTime = '" . $_POST['txtDateTime'] . "', "
                                            . " Case_Notes_Resident_ID_FK = '" . $_POST['txtResidentID'] . "', "
                                            . " Case_Notes_Staff_ID_FK = '" . $_POST['txtDateTime'] . "', "
                                            . " Case_Notes_Title = '" . $_POST['txtTitle'] . "'
                        WHERE Case_Notes_ID = " . $thisNote['caseNoteID'];
                $result = $conn->query($sql);
          /*      
                if($result) {
                    $isSuccessful = true;
                }
                
                if(!$result) {
                    $isSuccessful = false;
                }
                
         */       
                // If update is successful
                if($isSuccessful) {
                    echo "Update successful!";
                    $thisNote['caseNoteID'] = $_POST['caseNoteID'];
                    $thisNote['caseNoteRecord'] = $_POST['txtRecord'];
                    $thisNote['caseNoteDateTime'] = $_POST['txtDateTime'];
                    $thisNote['caseNoteResidentID'] = $_POST['txtResidentID'];
                    $thisNote['caseNoteStaffID'] = $_POST['txtStaffID'];
                    $thisNote['caseNoteTitle'] = $_POST['txtTitle'];
                    
                    // Save array as a serialized session variable
                    $_SESSION['sessionThisNote'] = urlencode(serialize($thisNote));
                }
            }
            clearNote();
            break;
    }
    
    ?>

<body>

    <?php include "../lib/include/menu.php" ?>
    
    <h1>Case Notes</h1>
    
    <div class="wrapper4">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" 
              method="POST" name="frmCaseNote" id="frmCaseNote">
            
        <label for="lstNote">Select case note</label>   
        <select name="lstNote" id="lstNote" style="width:18em;" onChange="this.form.submit();">
        <option value="new">Select a name</option> 
            <?PHP
            // pull case note titles from database for option list
            $sql = "SELECT Case_Notes_ID, Case_Notes_Title FROM Case_Notes ORDER BY Case_Notes_DateTime DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc())
            { echo "<option value='" . $row['Case_Notes_ID'] . "'>" . $row['Case_Notes_Title'] . "</option>"; }
            ?>
        </select>
            
        <input type="datetime-local" name="txtDateTime" id="txtDateTime" style="float:right; margin-right: 2.5em;"
               value="<?PHP echo $thisNote['caseNoteDateTime']; ?>" >    
            
            <br><br>
            
        <input type="text" name="txtTitle" id="txtTitle" class="txtbox" size="40" 
               placeholder="Title" value="<?PHP echo $thisNote['caseNoteTitle']; ?>" >
            
        <input type="text" name="txtResidentID" id="txtResidentID" class="txtbox"
               placeholder="Resident ID" value="<?PHP echo $thisNote['caseNoteResidentID']; ?>" >
            
        <input type="text" name="txtStaffID" id="txtStaffID" class="txtbox"
               placeholder="Staff ID" value="<?PHP echo $thisNote['caseNoteStaffID']; ?>" ><br><br>
            
        <textarea name="txtRecord" id="txtRecord" rows="8" cols="103"
                  placeholder="Enter case note here" value="<?PHP echo $thisNote['caseNoteRecord']; ?>" >
        </textarea>
        
        <button name="btnSubmit"
            value="delete"
            style="float: left; margin-left: 0em;"
            class="button"
            onclick="this.form.submit();">
        Delete
        </button>

        <button name="btnSubmit"
            value="new"
            style="float:right;"
            class="button"    
            onclick="this.form.submit();">
        Add 
        </button>
        
        <button name="btnSubmit"
            value="update"
            style="float:right;"
            class="button"    
            onclick="this.form.submit();">
        Update
        </button>
       
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