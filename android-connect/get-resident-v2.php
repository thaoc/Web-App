<?php

/*
 * Following code will list all the products
 * https://www.androidhive.info/2012/05/how-to-connect-android-with-php-mysql/
 */

// array for JSON response
header('Content-Type: application/json');
$response = array();
$link = mysqli_connect('107.180.46.186', 'damascus_way_mob', 'b^l}+mS_T0FH', 'damascus_way');
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
        $resID = $row["Resident_ID"];
        //echo $resID;
        $resID = mysqli_real_escape_string($link, $resID);
        $resident["Resident_LName"] = $row["Resident_LName"];
        $resident["Resident_FName"] = $row["Resident_FName"];
        $resident["Resident_Photo"] = $row["Resident_Photo"];
        $resident["call log"] = array();

        $callResult = mysqli_query($link, "SELECT * FROM Call_In WHERE Call_In_Resident_ID_FK = $resID");
        //echo "SELECT * FROM Call_In WHERE Call_In_Resident_ID_FK = $resID";
        if ($callResult == TRUE) {
            while ($row2 = mysqli_fetch_array($callResult)) {
                $callLog = array();
                $callLog["Call_In_DateTime"] = $row2["Call_In_DateTime"];
                $callLog["Call_In_To"] = $row2["Call_In_To"];
                $callLog["Call_In_Action"] = $row2["Call_In_Action"];
                array_push($resident["call log"], $callLog);
            }
        } else {
            echo "FAIL!!!!!!";
        }
        array_push($resident["call log"], $callLog);

        // push single residents into final response array
        array_push($response["residents"], $resident);

    }
    // success
    //$response["success"] = 1;

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