<?php
/**
 * Created by PhpStorm.
 * WebProject - query-resident.php
 * User: Cole
 * Email: sterlinn@csp.edu
 * Date: 11/1/2018
 * Time: 1:42 PM
 */
$home = $_SERVER['HOME'];
require_once "db-connect.php";

function listResidents() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM select_resident_default";
    $result = $conn->query($sql);

    displayResult($result, $sql);
    $conn->close();

}

