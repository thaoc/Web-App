<?php
$home = $_SERVER['HOME'];

require_once getcwd() . "/../lib/func/db-connect.php";
//echo getcwd() . "<br>";

/*************************************************
 * Function callHistory()
 * Retrieves the call history of a resident
 **************************************************/
function showNote() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
    
    $sql = "SELECT Case_Notes_Record, Case_Notes_DateTime, Case_Notes_Resident_ID_FK, Case_Notes_Staff_ID_FK, Case_Notes_Title FROM Case_Notes ORDER BY Case_Notes_DateTime DESC"; 
    $result = $conn->query($sql);
    noteTable($result, $sql);   
    
}

/**************************************************************
showNote() - display case notes for resident 
**************************************************************/
function noteTable($result, $sql){
    
    if ($result -> num_rows > 0){
        echo "<div class='table-responsive-lg'>";
        echo "<table class='table'>";
        echo "<thead>";
            echo "<tr>";
            echo "<th>Date & Time</th>";   
            echo "<th>Title</th>";
            echo "<th>Note</th>";
            echo "<th>Resident ID</th>";
            echo "<th>Staff ID</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        while ($row = $result -> fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $row['Case_Notes_DateTime'] . "</td>";
            echo "<td>" . $row['Case_Notes_Title'] . "</td>";
            echo "<td>" . $row['Case_Notes_Record'] . "</td>";
            echo "<td>" . $row['Case_Notes_Resident_ID_FK'] . "</td>";
            echo "<td>" . $row['Case_Notes_Staff_ID_FK'] . "</td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    // No Results    
    } else {
        
        echo "<div class='table-responsive-lg'>";
            echo '<table class="table">';
            echo '<tr>';
                echo '<td><Strong>There are no case notes for this resident.</Strong></td>';
            echo '</tr>';
            echo '</table>';
		echo "</div>";
    }          
}  