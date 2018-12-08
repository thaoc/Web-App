<?PHP
   $home = $_SERVER['HOME'];
   require_once $home . "../lib/func/form-helper.php";
   //ini_set('display_errors', 1);
   session_start();
	// Check if user is logged in using the session variable
	if ( $_SESSION['logged_in'] != 1 ) {
		$_SESSION['message'] = "You must log in before viewing your profile page!";
		header("location: error.php");    
	}
	else {
		// Makes it easier to read
		$user_name = $_SESSION['user_name'];
		$email = $_SESSION['email'];
		$active = $_SESSION['active'];
	}
   ?>
<!doctype html>
<html lang="en">
   <?php
		include "../lib/include/head.php";
		require_once (getcwd()."/../lib/func/db-connect.php");
      
		databaseConnection("damascus_way");
			$conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
			if($conn->connect_error){
				die("Connection Failed! ". mysqli_connect_error());
			}
     ?>
<html lang="en">
	<body>	
		<?php include "../lib/include/menu.php" ?>
		<h1>Daily Planner: <?php echo $user_name ?> </h1>
		
		<?php		
			echo "<table>";
			echo "<tr><th>Location</th><th>Arrival Time</th><th>Departure Time</th><th>Purpose</th></tr>";
			if ($result ->num_rows > 0)
			{
				echo "<div class='container dw-container wrapper'>\n";

				// Output each record
				while ($row = $result ->fetch_assoc())
				{
					//print_r($row);
					//echo "<br>";
					echo "<div class='row dw-row'>\n";
					// Print the data
					foreach ($row as $key=>$value)
					{
						$formattedText = str_replace("_", " ", $key);
						echo "<div class='col-md-4 dw-col'>" . $formattedText . ": <br> " . $value . "</div>\n";
					}
					echo "</div>\n";
				}
				echo "</div>\n";
			}
			else
			{
				echo"<Strong>Zero results using SQL: </Strong>" . $sql;
			}		
			echo "</table>";
		?>

		
		
		</table>
		<?php include "../lib/include/footer.php" ?>
		<?php include "../lib/include/script.php" ?>
	</body>
</html>