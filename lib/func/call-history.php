<?php
$home = $_SERVER['HOME'];

require_once getcwd() . "/func/db-connect.php";
//echo getcwd() . "<br>";

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
    $sql = "SELECT Call_In_Action, Call_In_DateTime, Call_In_From, Call_In_Match_Planner, Call_In_Message, Call_In_PhoneNumber, Call_In_TimeLengthAtLocation, Call_In_To, Resident_LName, Resident_FName, Staff_FName, Staff_LName from Call_In
    JOIN Resident ON Call_In.Call_In_Resident_ID_FK = Resident.Resident_ID
    JOIN Staff ON Call_In.Call_In_Staff_ID_FK = Staff.Staff_ID
    ORDER BY Call_In_DateTime DESC";
    
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
            echo '<th scope="col">Date & Time</th>';
            echo '<th scope="col">Resident</th>';
            echo '<th scope="col">Phone Number</th>';
            echo '<th scope="col">Current Location</th>';
            echo '<th scope="col">Action</th>';
            echo '<th scope="col">Time Needed</th>';
            echo '<th scope="col">Next Location</th>';
            echo '<th scope="col">Matches Planner</th>';
            echo '<th scope="col">Message</th>';
            echo '<th scope="col">Staff</th>';
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
            echo '<td>' . $row['Call_In_Match_Planner'] . '</td>';
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
                echo '<td><Strong>No call history found.</Strong></td>';
            echo '</tr>';
            echo '</table>';
		echo "</div>";
    }
    
}