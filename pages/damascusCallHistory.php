<!doctype html>

<html lang="en">
    
    <?php 
    
    $path = "../lib";
    chdir($path); // change directory
    require_once getcwd() . "/func/call-history.php";
    
    include "../lib/include/head.php" ?>

<body>

    <?php include "../lib/include/menu.php" ?>
    
    <h1>Call History</h1>
    
<!--    
    <div class="search-container">
    <form action="damascusCallHistory.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
    </div> 
-->
    
    <div class="container">
        <?php callHistory(); ?>
    </div>
    
    
    <?php include "../lib/include/footer.php" ?>
	<?php include "../lib/include/script.php" ?>

</body>
</html>