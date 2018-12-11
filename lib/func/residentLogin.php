<?php
// TODO: Please refactor this to use the db-connect.php
/* User login process, checks if user exists and password is correct */

// Kill page if access directly
if (!defined('ABSPATH')){
	exit; // No Script Kiddies
}

$Staff_Username = $mysqli->escape_string($_POST['Resident_Username']);
$result = $mysqli->query("SELECT * FROM Resident WHERE Resident_Username='$Resident_Username'");
if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that username doesn't exist!";
	echo $_SESSION['message']; 
}

else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($_POST['Resident_Password'], $user['Resident_Password']) ) {
        
        $_SESSION['Resident_Username'] = $user['Resident_Username'];
        $_SESSION['Resident_Logged_In'] = $user['Resident_Logged_In'];
        
        // This is how we'll know the user is logged in
        $_SESSION['Resident_Logged_In'] = true;
        header("location: ../pages/damascusBasePlanner.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
		echo $_SESSION['message']; 
    }
}