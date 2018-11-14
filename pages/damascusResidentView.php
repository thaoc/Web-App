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
require_once getcwd() . "/resident-name.php";

include "../lib/head.php";
    
?>

<body>

<?php include "../lib/menu.php" ?>
		
<h1> Residents </h1>

<!-- Buttons to choose list or grid view -->
<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>

  <div class="search-container">
    <form action="/#.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
	  <br><br>
        
<div id="radio">
  <label>Sort By:</label>
  <ul>
    <li><input type="radio"  name = "sorter"> Golden Valley</li>
    <li><input type="radio"  name = "sorter" > Rochester </li>
  </ul>
</div>
    </form>
  </div>  
  
  <!-- Code will programmatically update with database values later and create links based on
  residents names drawn from database. This is only dummy data to show what it will look like when
  finished. -->

    <div class="container">
    <?php residentNames(); ?>
    </div>


	<?php include "../lib/footer.php" ?>
	<?php include "../lib/script.php" ?>

</body>
</html>