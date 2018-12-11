<!doctype html>
<html lang="en">

<?php
session_start();
include "../lib/include/head.php"
?>

<body>
    <?php include "../lib/include/menu.php" ?>
    
    <form>
        <fieldset>
        <legend>Staff Login</legend><br>
            <p>Username:     
            <input type="text" name="userName" id="userName"><br><br>
            Password: 
            <input type="password" name="passWord" id="passWord"><br><br><br><br><br>
            <input type="submit" id="btnLogin" value="Login"></p><br>
        </fieldset>
    </form>
     
<?php
    echo "<link rel='stylesheet' href='" . $homeDir . "../style/damascusOverrideCSS.css?v=1.0'>";
?>
    
<?php include "../lib/include/footer.php" ?>
<?php include "../lib/include/script.php" ?>
</body>    
</html>
