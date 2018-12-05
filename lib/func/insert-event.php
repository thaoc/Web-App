<?php
try {
	$home = $_SERVER['HOME'];
	require_once "db-connect.php";
	require_once "form-helper.php";

	databaseConnection("damascus_way");
	$conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);

	// Check if connection is good
	if($conn->connect_error)
	{
		die("Connection Failed! ". mysqli_connect_error());
	} else
	{
		// Check to see if the current user is logged in.
		// This currently does not work
		// It needs to check the current focused resident.
		if ($user != NULL)
		{
			// Form items
			// Location info
			$locationName = mysqli_real_escape_string($conn, $_REQUEST['locationName']);
			$locationStreet = mysqli_real_escape_string($conn, $_REQUEST['locationStreet']);
			$locationCity = mysqli_real_escape_string($conn, $_REQUEST['locationCity']);
			$locationState = mysqli_real_escape_string($conn, $_REQUEST['locationState']);
			$locationZip = mysqli_real_escape_string($conn, $_REQUEST['locationZip']);
			$locationPhone = mysqli_real_escape_string($conn, $_REQUEST['locationPhone']);

			// Location details
			$locationDate = mysqli_real_escape_string($conn, $_REQUEST['locationDate']);
			$locationPurpose = mysqli_real_escape_string($conn, $_REQUEST['locationPurpose']);
			$locationTimeRequired = mysqli_real_escape_string($conn, $_REQUEST['locationTimeRequired']);
			$locationContactName = mysqli_real_escape_string($conn, $_REQUEST['locationContactName']);
			$locationTimeLeaving = mysqli_real_escape_string($conn, $_REQUEST['locationTimeLeaving']);
			$locationTimeReturning = mysqli_real_escape_string($conn, $_REQUEST['locationTimeReturning']);
			$locationTransportMode = mysqli_real_escape_string($conn, $_REQUEST['locationTransportMode']); // This might be a dropdown
			$locationBusRoute = mysqli_real_escape_string($conn, $_REQUEST['locationBusRoute']); // can be null
			$locationDriverName = mysqli_real_escape_string($conn, $_REQUEST['locationDriverName']); // can be null

			// Sub query for resident_ID and staff_ID
			/**********************************************************************************/
            $residentID             = mysqli_real_escape_string($conn, $_REQUEST['residentID']);
            $sql                      = "SELECT Resident_ID from Resident WHERE Resident_FName LIKE '$residentID'";
            $result                   = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                $raceID .= $row['Resident_ID'];
            }

            // Sub query for resident_ID and staff_ID
            $staffID             = mysqli_real_escape_string($conn, $_REQUEST['staffID']);
            $sql                      = "SELECT Staff_ID from Staff WHERE Staff_FName LIKE '$staffID'";
            $result                   = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                $raceID .= $row['Staff_ID'];
            }
			/**********************************************************************************/

			// The final query to insert the items into the database
			// This needs to be a stored procedure
			$sql = "INSERT INTO Daily_Planner(
								DP_Resident_ID_FK, 
								DP_Staff_ID_FK, 
								DP_Date, 
								DP_Location_Name, 
								DP_Location_Street, 
								DP_Lcation_City, 
								DP_Location_State,
								DP_Location_Zip,
								DP_Location_Phone,
								DP_Purpose,
								DP_Time_Needed,
								DP_Contact_Name,
								DP_leaving,
								DP_Returning,
								DP_Transport_Mode,
								DP_Bus_Route,
								DP_Driver_Name
								) VALUES (
								'$residentID',
								'$staffID',
								'$locationDate',
								'$locationName',
								'$locationStreet',
								'$locationCity',
								'$locationState',
								'$locationZip',
								'$locationPhone',
								'$locationPurpose',
								'$locationTimeRequired',
								'$locationContactName',
								'$locationTimeLeaving',
								'$locationTimeReturning',
								'$locationTransportMode',
								'$locationBusRoute',
								'$locationDriverName'
								)";
		}
		else
		{
			echo "go annoy cole";
		}
	}

	if ($conn->query($sql) === TRUE) {
		echo "<div class='pop-up-insert'>New record created successfully</div>";
	}
	else {
		echo "<div class='pop-up-insert'>Something went wrong: " . $sql . "<br>" . $onn->error . "</div>";
	}

	$conn->close();
}
catch (Exception $e){
	echo "Error: " . $e->getMessage();	
}

