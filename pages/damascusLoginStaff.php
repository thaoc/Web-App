<!doctype html>
<html lang="en">

<?php include "../lib/head.php" ?>

<body>
    <?php include "../lib/menu.php " ?>
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
<?php include "../lib/footer.php"?>
<?php include "../lib/script.php"?>
</body>    
</html>