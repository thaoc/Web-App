<?php

$home = $_SERVER['HOME'];
require_once getcwd()."../../lib/func/db-connect.php";

databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
	
 
$staffFirstName = mysqli_real_escape_string($conn, $_REQUEST['staffFirstName']);
$staffLastName = mysqli_real_escape_string($conn, $_REQUEST['staffLastName']);
$staffPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['staffPhoneNumber']);
$staffAddress = mysqli_real_escape_string($conn, $_REQUEST['staffAddress']);
$staffCity = mysqli_real_escape_string($conn, $_REQUEST['staffCity']);
$staffState = mysqli_real_escape_string($conn, $_REQUEST['staffState']);
$staffZip = mysqli_real_escape_string($conn, $_REQUEST['staffZip']);
$staffPhoto = mysqli_real_escape_string($conn, $_REQUEST['staffPhoto']);
$staffUsername = mysqli_real_escape_string($conn, $_REQUEST['staffUsername']);
$staffPassword = mysqli_real_escape_string($conn, $_REQUEST['staffPassword']);


$sql ="INSERT INTO Staff (Staff_FName, Staff_LName, Staff_Phone, Staff_Street1, Staff_City, Staff_State, Staff_Zip, Staff_Photo, Staff_Username, Staff_Password)
values ('$staffFirstName','$staffLastName','$staffPhoneNumber','$staffAddress','$staffCity','$staffState','$staffZip','$staffPhoto','$staffUsername','$staffPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

?>


