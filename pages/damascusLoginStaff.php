<!doctype html>
<html lang="en">

<?php
// Always start a session so variables can be passed accross
session_start();
include "../lib/include/head.php"
?>

<body>
    <?php include "../lib/include/menu.php" ?>
    <div class="container dw-container wrapper">
        <form>
            <fieldset>
            <legend>Staff Login</legend><br>
                <label>Username:</label>
                <input class="form-control" type="text" name="Staff_Username" id="Staff_Username"><br><br>
                <label>Password:</label>
                <input class="form-control" type="password" name="Staff_Password" id="Staff_Password"><br><br><br><br><br>
                <input class="btn" type="submit" id="btnLogin" value="Login"></p><br>
            </fieldset>
        </form>
    </div>
<?php include "../lib/include/footer.php" ?>
<?php include "../lib/include/script.php" ?>
</body>    
</html>