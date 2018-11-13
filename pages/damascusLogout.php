<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
<?php include "../lib/head.php" ?>
</head>
    <div class="form">
          <h1>You are now logging out of Damascus Way.</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="home.php"><button class="button button-block"/>Home</button></a></br></br>

    </div>
</div>

	<?php include "../lib/footer.php" ?>
	<?php include "../lib/script.php" ?>
</body>
</html>