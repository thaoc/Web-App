<?php

/*
 * Following code will list all the products
 * https://www.androidhive.info/2012/05/how-to-connect-android-with-php-mysql/
 */

// array for JSON response
header('Content-Type: application/json');
$response = array();
$link = mysqli_connect('107.180.46.186', 'damascus_way_mob', 'b^l}+mS_T0FH', 'damascus_way');

if (isset($_GET['location'])) {

    $location = $_GET['location'];

    if ($location=='Rochester') {
        $location = 1;
        echo $location;
    } elseif ($location=='Golden Valley') {
        $location = 2;
        echo $location;
    } else {
        echo "ERROR!!!";
    }
} else {
    echo "NO GET!!";
}
$result = mysqli_query($link, "SELECT * FROM Resident INNER JOIN Facility ON Resident.Resident_Facility_ID_FK=Facility.Facility_ID WHERE Resident.Resident_Facility_ID_FK = $location");

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
        $resident["Facility_Name"] = $row["Facility_Name"];

        $resident["check ins"] = array();
        $callResult = mysqli_query($link, "SELECT * FROM Check_In WHERE Check_In_Resident_ID_FK = $resID ORDER BY Check_In_Time DESC LIMIT 10");
        //echo "SELECT * FROM Call_In WHERE Call_In_Resident_ID_FK = $resID";
        if ($callResult == TRUE) {
            while ($row2 = mysqli_fetch_array($callResult) and $count < 10) {
                $checkin = array();
                $checkin["Check_In_Time"] = $row2["Check_In_Time"];
                $checkin["Check_In_Status"] = $row2["Check_In_Status"];
                $checkin["Check_In_Notes"] = $row2["Check_In_Notes"];
                array_push($resident["check ins"], $checkin);
            }
        } else {
            echo "FAIL!!!!!!";
        }

        $resident["call log"] = array();
        $callResult = mysqli_query($link, "SELECT * FROM Call_In WHERE Call_In_Resident_ID_FK = $resID ORDER BY Call_In_DateTime DESC LIMIT 10");
        //echo "SELECT * FROM Call_In WHERE Call_In_Resident_ID_FK = $resID";
        if ($callResult == TRUE) {
            while ($row2 = mysqli_fetch_array($callResult) and $count < 10) {
                $callLog = array();
                $callLog["Call_In_ID"] = $row2["Call_In_ID"];
                $callLog["Call_In_DateTime"] = $row2["Call_In_DateTime"];
                $callLog["Call_In_Action"] = $row2["Call_In_Action"];
                $callLog["Call_In_To"] = $row2["Call_In_To"];
                $callLog["Call_In_From"] = $row2["Call_In_From"];
                array_push($resident["call log"], $callLog);
            }
        } else {
            echo "FAIL!!!!!!";
        }

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
