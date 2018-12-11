<?php
/**
 * Created by PhpStorm.
 * WebProject - form-generator.php
 * User: Cole
 * Email: sterlinn@csp.edu
 * Date: 11/6/2018
 * Time: 11:25 AM
 *
 * This file should create dynamic forms based on the fields in the database (with some tweaking)
 * This may be a prototype that may or may not be used everywhere, but I figured give it a shot
 *
 */

//$home = $_SERVER['HOME'];
require_once "db-connect.php";

// TODO: Create helper functions to get the contents of tables
/*function createForm($formTitle, $formDescription)
{
    echo "<form>";
    echo "<div class='wrapper'>";
    echo "<div class='resident>'";
    echo "<h2>" . $formTitle . "</h2>";
    echo "<div class='wrapper'>";
    echo "<h3>" . $formDescription . "</h3>"; // NOTE, this could be loaded with JSON depending on what we want to do


    echo "</form>";
}*/

/**
 * @param $tableName
 * @param $columnName
 * @param $dropdownName
 * @param $itemPrefix
 */
function dropdownHelper($tableName, $columnName, $dropdownName, $itemPrefix) {

    try
    {
        databaseConnection("damascus_way");
        $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
        if ($conn->connect_error)
        {
            die("Connection Failed! " . mysqli_connect_error());
        }

        $sql = "SELECT " . $columnName . " FROM " . $tableName;
        $result = $conn->query($sql);

        displayAsDropdown($result, $sql, $dropdownName, $itemPrefix);
    }
    catch (Exception $exception){
        echo "<strong>Something went wrong, please try agian later</strong> " . $exception;
    }

}
