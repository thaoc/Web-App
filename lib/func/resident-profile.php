<?php
session_start();
include "../lib/include/head.php";
$residentID = (int) $_GET['varname'];

function getDescription($table, $id)
{
	require_once "../lib/func/db-connect.php";
        databaseConnection("damascus_way");
        $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
	
	$sql  = "SELECT ".$table."_Description from ".$table." WHERE ".$table."_ID = '$id'";
			$result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
			$value = $row[$table.'_Description'];
			return $value;
		}
		$conn->close();
			
}

function residentProfile() {
	require_once "../lib/func/db-connect.php";
        databaseConnection("damascus_way");
        $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }
	
	$residentID = (int) $_GET['varname'];

    $sql = "SELECT * FROM Resident WHERE Resident_ID = $residentID";
    $result = $conn->query($sql);
	echo '<style>  .col-md-4 {font-size:2em; font-family:sans-serif;} </style>';
	while ($row = $result ->fetch_assoc())
	{
		//echo '<div class="wrapper container-fluid dw-container">';
		echo '<div class="row dw-row">';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Name:<span class="req"></span></label> ';
		echo $row['Resident_FName'] . " " . $row['Resident_MName'] . " " . $row['Resident_LName'];
        echo '</div>';
        echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">ID:<span class="req"></span></label>'." ";
		echo $row['Resident_ID'];
		echo '</div>';
        echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Sex:<span class="req"></span></label>';
		echo $row['Resident_Sex'];            
		echo '</div>';
        echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Photo:<span class="req"></span></label>';
		echo $row['Resident_Photo'];
        echo '</div>';
        echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Birthplace:<span class="req"></span></label>';
		echo $row['Resident_Birthplace'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Race:<span class="req"></span></label>';
		echo getDescription(Race, $row['Resident_Race_ID_FK']);
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Height:<span class="req"></span></label>';
		echo $row['Resident_Height'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Weight:<span class="req"></span></label>';
		echo $row['Resident_Weight'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Hair Color:<span class="req"></span></label>';
		echo getDescription(Hair_Color, $row['Resident_Hair_Color_ID_FK']);
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Tattoos:<span class="req"></span></label>';
		echo $row['Resident_Tattoo'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Birthplace:<span class="req"></span></label>';
		echo $row['Resident_Birthplace'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Eye Color:<span class="req"></span></label>';
		echo getDescription(Eye_Color, $row['Resident_Eye_Color_ID_FK']);
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">DOB:<span class="req"></span></label>';
		echo $row['Resident_DOB'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Sex Offender:<span class="req"></span></label>';
		echo $row['Resident_Sex_Offender'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Username:<span class="req"></span></label>';
		echo $row['Resident_Username'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Password:<span class="req"></span></label>';
		echo $row['Resident_Password'];
        echo '</div>';
		echo '<div class="col-md-4">';
        echo '<label class="form-control highlight">Facility:<span class="req"></span></label>';
		echo getDescription(Facility, $row['Resident_Facility_ID_FK']);
        echo '</div>';
		echo '</div>';
	}
    $conn->close();
}
?>