<?php
/**
* @param string $databaseName Enter the name of the database to connect to.
*
* @return void
*/
function databaseConnection($databaseName)
{
	// Set up connection constants
	$whitelist = array('127.0.0.1', '::1');
	// Check to see if we are on local host or web server
	if (in_array($_SERVER['REMOTE_ADDR'], $whitelist))
	{
		// Credentials for localhost (Using AMPPS)
		define('DBF_SERVER', 'localhost');
		define('DBF_NAME', $databaseName);
		define('DBF_USER', 'root');
		define('DBF_PASSWORD', 'mysql');
	} else
	{
		// credentials for main server
		define('DBF_SERVER', '107.180.46.186');
		define('DBF_NAME', $databaseName);
		define('DBF_USER', 'damascus_way_mob');
		define('DBF_PASSWORD', 'b^l}+mS_T0FH');
	}
}