<?php
$home = $_SERVER['HOME'];
require_once "db-connect.php";

function listResidents() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
	
	$residentID = 9;
	
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
	$r = $row['Resident_Race_ID_FK'];
			$sql  = "SELECT Race_Description from Race WHERE Race_ID = '$r'";
			$res = mysqli_query($conn, $sql);
			while ($row = $res ->fetch_assoc()) {
			$race = $row['Race_Description'];
			}
	echo '<td>' . $race . '</td>';
	}
	
	$sql = "SELECT * FROM Resident WHERE Resident_ID = $residentID";
    $result = $conn->query($sql);
	while ($row = $result ->fetch_assoc())
	{
		echo "<div class='table-responsive-lg'>";
        echo '<table class="table">';
		
		echo '<tr>';
		echo '<th>Height</th><th>Weight</th><th>Hair Color</th></tr>';
	echo '<td>' . $row['Resident_Height'] . "</td>";
	echo '<td>' . $row['Resident_Weight'] . "</td>";
	$hc = $row['Resident_Hair_Color_ID_FK'];
			$sql  = "SELECT Hair_Color_Description from Hair_Color WHERE Hair_Color_ID = '$hc'";
			$res = mysqli_query($conn, $sql);
			while ($row = $res ->fetch_assoc()) {
			$hairColor = $row['Hair_Color_Description'];
			}
	echo '<td>' . $hairColor . '</td></br></br>';
	}
	
	$sql = "SELECT * FROM Resident WHERE Resident_ID = $residentID";
    $result = $conn->query($sql);
	while ($row = $result ->fetch_assoc())
	{
		echo "<div class='table-responsive-lg'>";
        echo '<table class="table">';
		
		echo '<tr>';
		echo '<th>Birthplace</th><th>Photo</th><th>Eye Color</th></tr>';
		echo '<td>' . $row['Resident_Birthplace'] . '</td>';
		echo '<td>' . $row['Resident_Photo'] . '</td>';
		$ec = $row['Resident_Hair_Color_ID_FK'];
			$sql  = "SELECT Eye_Color_Description from Eye_Color WHERE Eye_Color_ID = '$ec'";
			$result = mysqli_query($conn, $sql);
			while ($row = $result ->fetch_assoc()) {
			$eyeColor = $row['Eye_Color_Description'];
			};
		echo '<td>' . $eyeColor . "</td></br></br>";
	}
	
	$sql = "SELECT * FROM Resident WHERE Resident_ID = $residentID";
    $result = $conn->query($sql);
	while ($row = $result ->fetch_assoc())
	{
		echo "<div class='table-responsive-lg'>";
        echo '<table class="table">';
		
		echo '<tr>';
		echo '<th>Sex Offender</th><th>Username</th><th>Password</th></tr>';
		echo '<td>' . $row['Resident_Sex_Offender'] . '</td>';
		echo '<td>' . $row['Resident_Username'] . '</td>';
		echo '<td>' . $row['Resident_Password'] . '</td>';
	}
    //displayResult($result, $sql);
    $conn->close();
}
?>