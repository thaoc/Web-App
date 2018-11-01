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
    
    <style>
        
        #btnLogin {
            border-radius: 2pt;
            /*background-color: #75A442; /* Kelly Green */
            box-shadow: 1pt 1pt 2pt #A9A9A9; /* light grey */
            font-family: 'Open Sans', sans-serif;
            font-size: 12pt;
        } 
        
        body{
            margin-top: 0;
        }
        
        fieldset{
            background-color: white;
            border-color: #75A442; /* Kelly Green */
            /* #037264 - Deep Teal         */
            border-radius: 3pt; 
            box-shadow: 2pt 2pt 5pt #A9A9A9; /* light grey */
        }
        
        form {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 8em;
            text-align: center;
            width: 25em;
        }
        
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
        }
        
        legend {
            font-family: 'Open Sans', sans-serif;
            font-size: 14pt;
            color: #75A442;
        }
       
    </style>

</html>