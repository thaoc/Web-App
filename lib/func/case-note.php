<?php
$home = $_SERVER['HOME'];

require_once getcwd() . "/func/db-connect.php";
//echo getcwd() . "<br>";

/*************************************************
 * Function callHistory()
 * Retrieves the call history of a resident
 **************************************************
function insertNote() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
    
    
}

/**************************************************************
showNote() - display case notes for resident 
**************************************************************
function showNote($result, $sql){
    
} */