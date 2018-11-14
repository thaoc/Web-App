<?php
$home = $_SERVER['HOME'];

require_once getcwd()."/func/db-connect.php"; 
//echo getcwd() . "<br>";

function residentNames() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM select_first_last_resident ORDER BY Resident_LName";
    $result = $conn->query($sql);

    displayName($result, $sql);
    $conn->close();

}

