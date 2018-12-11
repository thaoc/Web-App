<!doctype html>

<html lang="en">
    
    <?php 
    session_start();
    $path = "../lib";
    chdir($path); // change directory
    require_once getcwd() . "/func/call-history.php";
    
    include "../lib/include/head.php" ?>

<body>

    <?php include "../lib/include/menu.php" ?>
    
    <h1 style="color:white;">Call History</h1>
    
<!--    
    <div class="search-container">
    <form action="damascusCallHistory.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
    </div> 
-->
    
    
        <?php callHistory(); ?>
    
    
    
    <?php include "../lib/include/footer.php" ?>
	<?php include "../lib/include/script.php" ?>

</body>
</html>