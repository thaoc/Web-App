<?php

try
{
    $home = $_SERVER['HOME'];
    require_once $home . "../lib/func/db-connect.php";
}

catch (Exception $e){
    echo "<p> issue loading resource file, please check the string:</p><br>";
    echo "<p>" . $e->getMessage() . "</p><br>";
}

databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
try
{

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


    $sql = "INSERT INTO Staff (Staff_FName, Staff_LName, Staff_Phone, Staff_Street1, Staff_City, Staff_State, Staff_Zip, Staff_Photo, Staff_Username, Staff_Password)
values ('$staffFirstName','$staffLastName','$staffPhoneNumber','$staffAddress','$staffCity','$staffState','$staffZip','$staffPhoto','$staffUsername','$staffPassword')";

    if ($conn->query($sql) === TRUE)
    {
        echo "New record created successfully";
    } else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
catch (Exception $e){
        echo "<p>There was a problem: " . $e->getMessage() . "</p>";
}



$conn->close();

success("Staff person successfully added", "damascusBaseStaff.php");

