<?php
/**
 * Created by PhpStorm.
 * WebProject - index.php
 * User: Cole
 * Email: sterlinn@csp.edu
 * Date: 11/1/2018
 * Time: 11:34 AM
 *
 * This page is currently used for debugging and displaying different function data and should
 * not be navigated directly to
 *
 */
require_once (getcwd()."/lib/func/query-resident.php")

?>
<html>
<?php include "lib/head.php" ?>
<body>
<?php include "lib/menu.php" ?>
<div class="container">
    <p>This is the index</p>
    <br>
    <p>This page is for debugging, please hard redirect or delete if you do not need it</p>
    <?php listResidents(); ?>
</div>
<?php include "lib/footer.php" ?>
<?php include "lib/script.php" ?>

</body>
</html>
