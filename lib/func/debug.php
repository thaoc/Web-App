<?php
/**
 * Created by PhpStorm.
 * Project Name: WebProject.
 * File Name: debug.php.
 * User: Cole
 * Date: 11/11/2018
 * Time: 7:26 PM
 */
echo "<html>";
/*if(isset($_REQUEST["offenderEyeColor"])){
	$draft= $_REQUEST["offenderEyeColor"];
	echo "<body>";
	echo "<p>" . $draft . "</p>";
	echo "</body>";
}*/
$offenderEyeColor = $_REQUEST['offenderEyeColor'];
$home = $_SERVER['HOME'];
define('__ROOT__', dirname(dirname(__FILE__)));
echo "<body>";
echo "<p>Sever Home: </p>";
echo $home;
echo "<br>";
echo "<p>__DIR__ Value: </p>";
echo __DIR__ . "/";
echo "<br>";
echo "<p>Get Current Working Dir</p>";
echo getcwd();
echo "<br>";
echo "<p>Get __ROOT__</p>";
echo __ROOT__ . "/";
echo "<br>";
echo "<p>The contents of the dropdown</p>";
if(isset ($offenderEyeColor))
{
    echo "<p>" . $offenderEyeColor . "</p>";
}
echo "</body>";

echo "</html>";