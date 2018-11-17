<!doctype html>
<html lang="en">

<?php include "../lib/include/head.php" ?>

<body>
    

<div class="container dw-container">
        <fieldset>
        <legend>Welcome to Damascus Way!</legend><br>
           <form action="../pages/damascusStaffLogin.php">
				<input type="submit" value="Staff Login" />
			</form>
			
		<form action="../pages/damascusResidentLogin.php">
				<input type="submit" value="Resident Login" />
		</form>
		
        </fieldset>
</div>
     
<?php
    echo "<link rel='stylesheet' href='" . $homeDir . "../style/damascusOverrideCSS.css?v=1.0'>";
?>
    
<?php include "../lib/include/footer.php" ?>
<?php include "../lib/include/script.php" ?>
</body>    
</html>
