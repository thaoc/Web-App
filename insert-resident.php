<?php
$home = $_SERVER['HOME'];
require_once(getcwd() . "/db-connect.php");
require_once(getcwd() . "/form-helper.php");

databaseConnection("damascus_way");
$conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
if ($conn->connect_error) {
    die("Connection Failed! " . mysqli_connect_error());
}

$offenderFirstName     = $_REQUEST['offenderFirstName'];
$offenderMiddleName    = mysqli_real_escape_string($conn, $_REQUEST['offenderMiddleName']);
$offenderLastName      = mysqli_real_escape_string($conn, $_REQUEST['offenderLastName']);
$offenderImage         = mysqli_real_escape_string($conn, $_REQUEST['offenderImage']);
$offenderBirthplace    = mysqli_real_escape_string($conn, $_REQUEST['offenderBirthplace']);
$offenderOffense       = mysqli_real_escape_string($conn, $_REQUEST['offenderOffense']);
$sql                   = "SELECT Offense_ID from Offense WHERE Offense_Type LIKE '$offenderOffense'";
$result                = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $offenseID .= $row['Offense_ID'];
}

$sexOffender           = mysqli_real_escape_string($conn, $_REQUEST['sexOffender']);
$offenderRiskLevel     = mysqli_real_escape_string($conn, $_REQUEST['offenderRiskLevel']);
$offenderAdmitDate     = mysqli_real_escape_string($conn, $_REQUEST['offenderAdmitDate']);
$offenderExitDate      = mysqli_real_escape_string($conn, $_REQUEST['offenderExitDate']);
$offenderSex           = mysqli_real_escape_string($conn, $_REQUEST['offenderSex']);
$facility              = mysqli_real_escape_string($conn, $_REQUEST['facility']);
$offenderRoomNumber    = mysqli_real_escape_string($conn, $_REQUEST['offenderRoomNumber']);
$offenderCaseworker    = mysqli_real_escape_string($conn, $_REQUEST['offenderCaseworker']);
$offenderCWPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['offenderCWPhoneNumber']);
$offenderEyeColor      = mysqli_real_escape_string($conn, $_REQUEST['offenderEyeColor']);
$sql                   = "SELECT Eye_Color_ID from Eye_Color WHERE Eye_Color_Description LIKE '$offenderEyeColor'";
$result                = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $eyeColorID .= $row['Eye_Color_ID'];
}

$offenderHairColor        = mysqli_real_escape_string($conn, $_REQUEST['offenderHairColor']);
$sql                      = "SELECT Hair_Color_ID from Hair_Color WHERE Hair_Color_Description LIKE '$offenderHairColor'";
$result                   = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $hairColorID .= $row['Hair_Color_ID'];
}

$offenderHeight           = mysqli_real_escape_string($conn, $_REQUEST['offenderHeight']);
$offenderWeight           = mysqli_real_escape_string($conn, $_REQUEST['offenderWeight']);
$offenderRace             = mysqli_real_escape_string($conn, $_REQUEST['offenderRace']);
$sql                      = "SELECT Race_ID from Race WHERE Race_Description LIKE '$offenderRace'";
$result                   = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $raceID .= $row['Race_ID'];
}

$offenderDateOfBirth      = mysqli_real_escape_string($conn, $_REQUEST['offenderDateOfBirth']);
$offenderAgent            = mysqli_real_escape_string($conn, $_REQUEST['offenderAgent']);
$offengerAgentPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['offengerAgentPhoneNumber']);
$offenderAgentAddress     = mysqli_real_escape_string($conn, $_REQUEST['offenderAgentAddress']);
$offenderUsername         = mysqli_real_escape_string($conn, $_REQUEST['offenderUsername']);
$offenderPassword         = mysqli_real_escape_string($conn, $_REQUEST['offenderPassword']);

$sql = "insert into Resident(Resident_FName, Resident_MName, Resident_LName, Resident_Photo, Resident_Sex, Resident_Eye_Color_ID_FK, Resident_Hair_Color_ID_FK, Resident_Race_ID_FK, Resident_Height, Resident_Weight, Resident_DOB, Resident_Offense_ID_FK, Resident_Risk_Level_ID_FK, Resident_Sex_Offender, Resident_Birthplace, Resident_Username, Resident_Password)
    values ('$offenderFirstName', '$offenderMiddleName','$offenderLastName', '$offenderImage', '$offenderSex', '$eyeColorID', '$hairColorID', '$raceID', '$offenderHeight', '$offenderWeight', '$offenderDateOfBirth', '$offenseID', '$offenderRiskLevel', '$sexOffender', '$offenderBirthplace', '$offenderUsername', '$offenderPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo $eyeColorID;
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();