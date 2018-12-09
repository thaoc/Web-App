<?php
$home = $_SERVER['HOME'];

require_once getcwd() . "/func/db-connect.php";
// require_once getcwd() . "/func/resident-name.php";
//echo getcwd() . "<br>";

//$id == 9;

/*************************************************
 * Function callHistory()
 * Retrieves the call history of a resident
 **************************************************/
function callHistory() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
    
    /**** QUERY TO VIEW ALL RESIDENTS ****/
    $sql = "SELECT Call_In_Action, DATE_FORMAT(Call_In_DateTime, '%m/%d/%Y %h:%i %p') Call_In_DateTime, Call_In_From, Call_In_Match_Planner, Call_In_Message, Call_In_PhoneNumber, Call_In_TimeLengthAtLocation, Call_In_To, Resident_LName, Resident_FName, Staff_FName, Staff_LName from Call_In
    JOIN Resident ON Call_In.Call_In_Resident_ID_FK = Resident.Resident_ID
    JOIN Staff ON Call_In.Call_In_Staff_ID_FK = Staff.Staff_ID
    ORDER BY Call_In_DateTime DESC";
    // WHERE Resident_ID = '$id'
    
    $result = $conn->query($sql);
    showHistory($result, $sql);
    
}

/**************************************************************
showHistory() - display Residents Call-In log history 
**************************************************************/
function showHistory($result, $sql){
    
    if ($result ->num_rows > 0)
	{
        echo "<div class='table-responsive-lg'>";
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
            echo '<th>Date & Time</th>';
            echo '<th>Resident</th>';
            echo '<th>Phone Number</th>';
            echo '<th>Current Location</th>';
            echo '<th>Action</th>';
            echo '<th>Time Needed</th>';
            echo '<th>Next Location</th>';
            echo '<th>Matches Planner</th>';
            echo '<th>Message</th>';
            echo '<th>Staff</th>';
        echo '<tr>';
        echo '<thead>';
        echo '<tbody>';

		// Output each record
		while ($row = $result ->fetch_assoc())
		{
            echo '<tr>';
            echo '<td>' . $row['Call_In_DateTime'] . '</td>';
            echo '<td>' . $row['Resident_LName'] . ', ' . $row['Resident_FName'] . '</td>';
            echo '<td>' . $row['Call_In_PhoneNumber'] . '</td>';
            echo '<td>' . $row['Call_In_From'] . '</td>';
            echo '<td>' . $row['Call_In_Action'] . '</td>';
            echo '<td>' . $row['Call_In_TimeLengthAtLocation'] . '</td>';
            echo '<td>' . $row['Call_In_To'] . '</td>';
            echo '<td>' . ($row['Call_In_Match_Planner'] ? 'Yes':'No') . '</td>';
            echo '<td>' . $row['Call_In_Message'] . '</td>';
            echo '<td>' . $row['Staff_LName'] . ', ' . $row['Staff_FName'] . '</td>';
            echo '</tr>';
		}
        echo '</tbody>';
        echo '</table>';
		echo "</div>";
        
// No results
    }

    else
    {
        echo "<div class='table-responsive-xl'>";
            echo '<table class="table">';
            echo '<tr>';
                echo '<td style="width: 15em;><Strong>No call history found.</Strong></td>';
            echo '</tr>';
            echo '</table>';
		echo "</div>";
    }    
}
?>