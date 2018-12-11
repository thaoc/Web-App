<?php
$home = $_SERVER['HOME'];

require_once getcwd() . "/func/db-connect.php";
//echo getcwd() . "<br>";

/*************************************************
 * Function residentNames
 * Retrieves a list of residents from the database
 *
 **************************************************/
function residentNames() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
    
    if(isset($_POST['search']))
    {
        $search = $_POST['search'];
        
        if(isset($_POST['facility']))
        {
            $facility = $_POST['facility'];    
        
            if($facility == "goldenvalley") {
                $sql = "SELECT Resident_LName, Resident_FName FROM Resident WHERE (`Resident_Facility_ID_FK` = 2) AND (`Resident_LName` LIKE '%$search%' OR `Resident_FName` LIKE '%$search%')";
                $result = $conn->query($sql);
                displayName($result, $sql);
            } else { 
                $sql = "SELECT Resident_LName, Resident_FName FROM Resident WHERE (`Resident_Facility_ID_FK` = 1) AND (`Resident_LName` LIKE '%$search%' OR `Resident_FName` LIKE '%$search%')";
                $result = $conn->query($sql);
                displayName($result, $sql);
            } 
        // if facility is not selected, select search query for both facilities
        } else {
            $sql = "SELECT Resident_LName, Resident_FName FROM Resident WHERE (`Resident_LName` LIKE '%$search%') OR (`Resident_FName` LIKE '%$search%')";
            $result = $conn->query($sql);
            displayName($result, $sql);
        } // end if facility
        
    // display all Residents    
    } else {
        $sql = "SELECT * FROM select_first_last_resident ORDER BY Resident_LName";
        $result = $conn->query($sql);
        displayName($result, $sql);
    }// end if search
   
    // close the database
    $conn->close();

}

/**************************************************************
displayName() - display Resident Last Name and First Name only 
**************************************************************/

function displayName($result, $sql) {

	if ($result ->num_rows > 0)
	{
        echo "<div class='table-responsive-lg'>";
        echo '<table class="table">';
        echo '<tbody>';

		// Output each record
		while ($row = $result ->fetch_assoc())
		{
            echo '<tr>';
            echo '<td>' . $row['Resident_LName'] . ',' . '</td>';
            echo '<td>' . $row['Resident_FName'] . '</td>';
            echo '<td class="tdSmall">' . '<a href="../pages/damascusBaseCallLog.php" title="Log Call">
            <img src="../img/interface/png/phone-book.png" class="icon"/></a>' . '</td>';
            echo '<td class="tdSmall">' . '<a href="../pages/damascusCallHistory.php" title="Call History">
            <img src="../img/interface/png/layers.png" class="icon"/></a>' . '</td>';
            echo '<td class="tdSmall">' . '<a href="../pages/damascusResidentProfile.php" title="Profile">
            <img src="../img/interface/png/user-3.png" class="icon"/></a>' . '</td>';
            echo '<td class="tdSmall">' . '<a href="../pages/damascusCaseNote.php" title="Case Notes">
            <img src="../img/interface/png/document.png" class="icon"/></a>' . '</td>';
	    echo '<td class="tdSmall">' . '<a href="../pages/damascusResidentPlanner.php" title="Resident Planner">
            <img src="../img/interface/png/pencil.png" class="icon"/></a>' . '</td>';
            echo '</tr>';
		}
        echo '</tbody>';
        echo '</table>';
		echo "</div>";
        
// No results
    }

    else
    {
        echo "<div class='table-responsive-lg'>";
            echo '<table class="table">';
            echo '<tr>';
                echo '<td style="width: 15em;"><Strong>Zero search results found.</Strong></td>';
            echo '</tr>';
            echo '</table>';
		echo "</div>";
    }
} // end of displayName( )

