<?php
/**
 * Created by PhpStorm.
 * Project Name: WebProject.
 * File Name: success-router.php.
 * User: Cole
 * Date: 11/11/2018
 * Time: 7:57 PM
 *
 * Simple class that will transfer the user to the previous page upon success.
 * This probably does not need it's own file, but it could be super useful
 *
 */


/**
 * @param $successMsg
 * @param $pageToRedirectTo
 *
 *  NOTE: pages MUST be in the page directory for this function to work properly at this time
 *
 * TODO: make this function work outside of the PAGE directory as well
 *
 */

function success($successMsg, $pageToRedirectTo) {

    // URL builder
    $home = $_SERVER['home'];
    $PageDestination = $home . '/pages/' . $pageToRedirectTo;

    // Page Anatomy bits
    echo "<html>";
    include $home . "/lib/head.php";
    echo "<body>";
    include $home . "/lib/head.php";
    echo "<div class='container'>";
    echo "<p>" . $successMsg . "</p><br>";
    echo "<p>Add another? " . $PageDestination . "</p><br>";
    echo "</div>";
    include $home . "/lib/footer.php";
    include $home . "/lib/script.php";
    echo "</body>";
    echo "</html>";

}