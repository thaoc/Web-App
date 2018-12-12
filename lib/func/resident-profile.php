<?php
session_start();
include "../lib/include/head.php";
$residentID = (int) $_GET['varname'];

function getDescription($table, $id)
{
	require_once "../lib/func/db-connect.php";
        databaseConnection("damascus_way");
        $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
	
	$sql  = "SELECT ".$table."_Description from ".$table." WHERE ".$table."_ID = '$id'";
			$result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
			$value = $row[$table.'_Description'];
			return $value;
		}
		$conn->close();
			
}

function residentProfile() {
	require_once "../lib/func/db-connect.php";
        databaseConnection("damascus_way");
        $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
	
	$residentID = (int) $_GET['varname'];

    $sql = "SELECT * FROM Resident WHERE Resident_ID = $residentID";
    $result = $conn->query($sql);
	while ($row = $result ->fetch_assoc())
	{
		echo "<div class='table-responsive-lg'>";
		echo '<table class="table">';	
		echo '<tr>';
		echo '<th>Name</th><th>Sex</th><th>Race</th></tr>';
		echo "<td>" . $row['Resident_FName'] . " " . $row['Resident_MName'] . " " . $row['Resident_LName'] ."</td>";
		echo '<td>' . $row['Resident_Sex'] . "</td>";
		echo '<td>' . getDescription(Race, $row['Resident_Race_ID_FK']) . '</td>';
		echo '<tr>';
		echo '<th>Height</th><th>Weight</th><th>Hair Color</th></tr>';
		echo '<td>' . $row['Resident_Height'] . "</td>";
		echo '<td>' . $row['Resident_Weight'] . "</td>";
		echo '<td>' . getDescription(Hair_Color, $row['Resident_Hair_Color_ID_FK']) . '</td>';
		echo '<tr>';
		echo '<th>Birthplace</th><th>Photo</th><th>Eye Color</th></tr>';
		echo '<td>' . $row['Resident_Birthplace'] . '</td>';
		echo '<td>' . $row['Resident_Photo'] . '</td>';
		echo '<td>' . getDescription(Eye_Color, $row['Resident_Eye_Color_ID_FK']) . '</td>';
		echo '<tr>';
		echo '<th>Sex Offender</th><th>Username</th><th>Password</th></tr>';
		echo '<td>' . $row['Resident_Sex_Offender'] . '</td>';
		echo '<td>' . $row['Resident_Username'] . '</td>';
		echo '<td>' . $row['Resident_Password'] . '</td>';
	}
    $conn->close();
}
?>