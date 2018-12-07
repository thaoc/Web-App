<!doctype html>

<html lang="en">
 
<?php 
    
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
		
<h1> Residents </h1>

  <div class="search-container">
    <form action="damascusResidentView.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>      
	  <br><br>
        
    <div id="radio">
      <label>Sort By:</label>
      <ul>
        <li><input type="radio"  name = "sorter"> Golden Valley</li>
        <li><input type="radio"  name = "sorter" > Rochester</li>
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