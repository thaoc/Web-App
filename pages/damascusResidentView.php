<!doctype html>

<html lang="en">
 
<?php 
// Always start a session
session_start();
/********** for testing purposes *************
echo getcwd() . "<br>";
$path = "../lib";
chdir($path);
echo getcwd() . "/resident-name.php";
**********************************************/
$path = "../lib";
chdir($path); // change directory
require_once getcwd() . "/func/resident-name.php"; 

include "../lib/include/head.php" ?>

<body>

<?php include "../lib/include/menu.php" ?>
		
<h1 style='color: white;'> Resident List</h1>
    
  <div class="search-container">
    <form action="damascusResidentView.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>      
	  <br>
        
    <div id="radio">
      <label style='color: white;'>Sort By:</label>
      <ul>
        <li style='color: white;'><input type="radio" name="facility" value="goldenvalley"> Golden Valley</li>
        <li style='color: white;'><input type="radio" name="facility" value="rochester"> Rochester</li>
      </ul>
    </div>
    </form>
  </div>  
  
  <!-- pulls last name and first name from database and displays it in a table -->
    <div class="container">
        <?php residentNames(); ?>
    </div>


	<?php include "../lib/include/footer.php" ?>
	<?php include "../lib/include/script.php" ?>

</body>
</html>