<!doctype html>
<html lang="en">

<?php 
session_start();
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in
        require '../lib/func/residentLogin.php';
        
    }
}
?>

<?php include "../lib/include/head.php" ?>


<body>
    <?php include "../lib/include/menu.php" ?>
     <div class="form">

         <div id="login">   
          <h1>Resident Login</h1>
          
          <form action="damascusResidentLogin.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Username:<span class="req">*</span>
            </label>
            <input type="username" required autocomplete="off" name="Resident_Username"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password:<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="Resident_Password"/>
          </div>
          
          <br><br>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
     
<?php
    echo "<link rel='stylesheet' href='" . $homeDir . "../style/damascusOverrideCSS.css?v=1.0'>";
?>
    
<?php include "../lib/include/footer.php" ?>
<?php include "../lib/include/script.php" ?>
</body>    
</html>