<?php
// Error handler that redirects to home if user is not logged in
?>
    <h1>Error</h1>
      <p>
         <?php 
            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
                echo $_SESSION['message'];    
            else:
                header( "location: pages/home.php" );
            endif;
            ?>
      </p>
      <a href="home.php"><button class="button button-block"/>Home</button></a>