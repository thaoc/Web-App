<?php
// TODO: Please refactor this to use the db-connect.php
/* User login process, checks if user exists and password is correct */

$Staff_Username = $mysqli->escape_string($_POST['Staff_Username']);
$result = $mysqli->query("SELECT * FROM Staff WHERE Staff_Username='$Staff_Username'");
if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that username doesn't exist!";
	echo $_SESSION['message']; 
}

else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($_POST['Staff_Password'], $user['Staff_Password']) ) {
        
        $_SESSION['Staff_Username'] = $user['Staff_Username'];
        $_SESSION['Staff_Logged_In'] = $user['Staff_Logged_In'];
        
        // This is how we'll know the user is logged in
        $_SESSION['Staff_Logged_In'] = true;
        header("location: ../pages/damascusResidentView.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
		echo $_SESSION['message']; 
    }
}
