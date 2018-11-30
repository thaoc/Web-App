<?php

/*
 * Following code will list all the products
 * https://www.androidhive.info/2012/05/how-to-connect-android-with-php-mysql/
 */

// array for JSON response
header('Content-Type: application/json');
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$link = mysqli_connect('localhost', 'root', 'mysql', 'damascus_way');
$result = mysqli_query($link, "SELECT * FROM Resident");

// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // residents node
    $response["residents"] = array();

    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $resident = array();
        $resident["Resident_ID"] = $row["Resident_ID"];
        $resident["Resident_LName"] = $row["Resident_LName"];
        $resident["Resident_FName"] = $row["Resident_FName"];
        $resident["Resident_MName"] = $row["Resident_MName"];
        $resident["Resident_Photo"] = $row["Resident_Photo"];
        $resident["Resident_Sex_Offender"] = $row["Resident_Sex_Offender"];
        $resident["Resident_Risk_Level"] = $row["Resident_Risk_Level"];
        $resident["Resident_Eye_Color"] = $row["Resident_Eye_Color"];
        $resident["Resident_Hair_Color"] = $row["Resident_Hair_Color"];

        // push single residents into final response array
        array_push($response["residents"], $resident);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no residents found
    $response["success"] = 0;
    $response["message"] = "No residents found";

    // echo no users JSON
    echo json_encode($response);
}
?>