<?php
$home = $_SERVER['HOME'];
require_once (getcwd()."/db-connect.php");
require_once (getcwd()."/form-helper.php");

databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }

$offenderFirstName = mysqli_real_escape_string($conn, $_REQUEST['offenderFirstName']);
$offenderMiddleName = mysqli_real_escape_string($conn, $_REQUEST['offenderMiddleName']);
$offenderLastName = mysqli_real_escape_string($conn, $_REQUEST['offenderLastName']);
$offenderImage = mysqli_real_escape_string($conn, $_REQUEST['offenderImage']);
$offenderBirthplace = mysqli_real_escape_string($conn, $_REQUEST['offenderBirthplace']);
$offenderOffense = mysqli_real_escape_string($conn, $_REQUEST['offenderOffense']);
$sexOffender = mysqli_real_escape_string($conn, $_REQUEST['sexOffender']);
$offenderRiskLevel = mysqli_real_escape_string($conn, $_REQUEST['offenderRiskLevel']);
$offenderAdmitDate = mysqli_real_escape_string($conn, $_REQUEST['offenderAdmitDate']);
$offenderExitDate = mysqli_real_escape_string($conn, $_REQUEST['offenderExitDate']);
$offenderSex = mysqli_real_escape_string($conn, $_REQUEST['offenderSex']);
$facility = mysqli_real_escape_string($conn, $_REQUEST['facility']);
$offenderRoomNumber = mysqli_real_escape_string($conn, $_REQUEST['offenderRoomNumber']);
$offenderCaseworker = mysqli_real_escape_string($conn, $_REQUEST['offenderCaseworker']);
$offenderCWPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['offenderCWPhoneNumber']);
$offenderEyeColor = mysqli_real_escape_string($conn, $_REQUEST['offenderEyeColor']);
$offenderairColor = mysqli_real_escape_string($conn, $_REQUEST['offenderairColor']);
$offenderHeight = mysqli_real_escape_string($conn, $_REQUEST['offenderHeight']);
$offenderWeight = mysqli_real_escape_string($conn, $_REQUEST['offenderWeight']);
$offenderRace = mysqli_real_escape_string($conn, $_REQUEST['offenderRace']);
$offenderDateOfBirth = mysqli_real_escape_string($conn, $_REQUEST['offenderDateOfBirth']);
$offenderAgent = mysqli_real_escape_string($conn, $_REQUEST['offenderAgent']);
$offengerAgentPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['offengerAgentPhoneNumber']);
$offenderAgentAddress = mysqli_real_escape_string($conn, $_REQUEST['offenderAgentAddress']);
$offenderUsername = mysqli_real_escape_string($conn, $_REQUEST['offenderUsername']);
$offenderPassword = mysqli_real_escape_string($conn, $_REQUEST['offenderPassword']);

$sql ="insert into Resident(Resident_FName, Resident_MName, Resident_LName, Resident_Photo, Resident_Sex, Resident_Eye_Color_ID_FK, Resident_Hair_Color_ID_FK, Resident_Race_ID_FK, Resident_Height, Resident_Weight, Resident_DOB, Resident_Offense_ID_FK, Resident_Risk_Level_ID_FK, Resident_Sex_Offender, Resident_Birthplace, Resident_Username, Resident_Password)
	values ('$offenderFirstName', '$offenderMiddleName','$offenderLastName', '$offenderImage', '$offenderSex', '$offenderEyeColor', '$offenderairColor', '$offenderRace', '$offenderHeight', '$offenderWeight', '$offenderDateOfBirth', '$offenderOffense', '$offenderRiskLevel', '$sexOffender', '$Resident_Birthplace', '$Resident_Username', '$Resident_Password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
	echo $offenderEyeColor;
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
