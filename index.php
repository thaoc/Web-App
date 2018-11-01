<?php
/**
 * Created by PhpStorm.
 * WebProject - index.php
 * User: Cole
 * Email: sterlinn@csp.edu
 * Date: 11/1/2018
 * Time: 11:34 AM
 */
require_once (getcwd()."/lib/func/query-resident.php")

?>
<html>
<?php include "lib/head.php"?>
<body>
<?php include "lib/menu.php"?>
<div class="container">
    <p>This is the index</p>
    <?php listResidents(); ?>
</div>
<?php include "lib/footer.php"?>
<?php include "lib/script.php"?>

</body>
</html>
