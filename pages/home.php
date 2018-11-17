<!doctype html>
<html lang="en">

<?php include "../lib/head.php" ?>

<body>
    
        <fieldset>
        <legend>Welcome to Damascus Way!</legend><br>
           <form action="../pages/damascusStaffLogin.php">
				<input type="submit" value="Staff Login" />
			</form>
			
		<form action="../pages/damascusResidentLogin.php">
				<input type="submit" value="Resident Login" />
		</form>
		
        </fieldset>
     
<?php
    echo "<link rel='stylesheet' href='" . $homeDir . "../style/damascusOverrideCSS.css?v=1.0'>";
?>
    
<?php include "../lib/footer.php"?>
<?php include "../lib/script.php"?>
</body>    
</html>
