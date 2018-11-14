<?php
try {
	$home = $_SERVER['HOME'];
	require_once getcwd()."/db-connect.php";
	require_once getcwd()."/form-helper.php";

	databaseConnection("damascus_way");
		$conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
		if($conn->connect_error)
		{
			die("Connection Failed! ". mysqli_connect_error());
		} else 
		{
			if ($user != NULL) 
			{
				$sql = "SELECT * FROM Daily_Planner WHERE Resident_ID_FK = $user";
				
				if ($conn->query($sql) === TRUE) 
				{
					echo $user;
				} else 
				{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			else 
			{
				echo "go annoy cole";
			}	
		}

		$conn->close();
}
catch (Exception $e){
	echo "Error: " . $e->getMessage();	
}

?>
