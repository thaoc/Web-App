<html lang="en">
   <?php
   
   include "../lib/include/head.php";
   require_once (getcwd()."/../lib/func/db-connect.php");
   require_once (getcwd()."/../lib/func/resident-profile.php");   
      databaseConnection("damascus_way");
          $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
          if($conn->connect_error){
              die("Connection Failed! ". mysqli_connect_error());
          }
      ?>
   <body>
      <?php include "../lib/include/menu.php" ?>
	  <form action="../lib/func/resident-profile.php" method="get">
	  <div class="wrapper container-fluid dw-container">
         <div class="resident">
            </br><h2>Resident Profile</h2></br>
         </div>
	  <div class="container">
            
			   <?php residentProfile(); ?>
			   
            
		</div></br></br>
      </div>
		</form>
      
      <?php include "../lib/include/footer.php" ?>
      <?php include "../lib/include/script.php" ?>
   </body>
</html>