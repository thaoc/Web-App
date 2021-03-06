<?php
//ini_set('display_errors', 1);

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
		define('DBF_SERVER', '107.180.46.186');
		define('DBF_NAME', $databaseName);
		define('DBF_USER', 'damascus_way_mob');
		define('DBF_PASSWORD', 'b^l}+mS_T0FH');
	} else
	{
		// credentials for main server
		define('DBF_SERVER', '107.180.46.186');
		define('DBF_NAME', $databaseName);
		define('DBF_USER', 'damascus_way_mob');
		define('DBF_PASSWORD', 'b^l}+mS_T0FH');
	}
}

/**
 * displayResult( ) - Execute a query and display the result
 *
 * @param string $result result set to display as 2D array
 * @param string $sql SQL string used to display an error msg
 *
 *
 * @return void
 */
function displayResult($result, $sql) {

	if ($result ->num_rows > 0)
	{
		echo "<div class='container dw-container wrapper'>\n";

		// Output each record
		while ($row = $result ->fetch_assoc())
		{
			//print_r($row);
			//echo "<br>";
			echo "<div class='row dw-row'>\n";
			// Print the data
			foreach ($row as $key=>$value)
			{
				$formattedText = str_replace("_", " ", $key);
				echo "<div class='col-md-4 dw-col'>" . $formattedText . ": <br> " . $value . "</div>\n";
			}
			echo "</div>\n";
		}
		echo "</div>\n";
// No results
    }

    else
    {
        echo"<Strong>Zero results using SQL: </Strong>" . $sql;
    }
} // end of displayResult( )

/**
 * @param $result
 * @param $sql
 * @param $dropdownName
 * @param $itemPrefix
 *
 * TODO: add an onchange that queries the database for row value
 */
function displayAsDropdown ($result, $sql, $dropdownName, $itemPrefix) {

    if ($result ->num_rows > 0)
    {
        echo "<select name='" . $dropdownName . "'>";
        echo "<option selected='true' disabled='disabled' onchange=''>Make a Selection</option>";
        while ($row = $result->fetch_assoc())
        {
            foreach ($row as $key => $value)
            {
                $formattedText = str_replace(" ", "_", $value);
                $formattedText = strtolower($formattedText);
                echo "<option value='" . $itemPrefix . "_" . $formattedText . "'>" . $value . "</option>";
            }

        }
        echo "</select>";
    }
    else {
        echo"<Strong>Dropdown does not contain any values: </Strong>" . $sql;
    }
}

/********************************************
 * runQuery( ) - Execute a query and display message
 * @param string $conn        - Creates a connection string
 * @param string $sql         -  SQL String to be executed.
 * @param string $msg         -  Text of message to display on success or error
 *
 * ___$msg___ successful.    Error when: __$msg_____ using SQL: ___$sql____.
 *
 * @param string $echoSuccess - boolean True=Display message on success
 *
 ********************************************/
function runQuery($conn, $sql, $msg, $echoSuccess) {
    //global $conn;

// run the query
    if ($conn->query($sql) === TRUE) {
        if($echoSuccess) {
            echo "<span class='errMsg'>" . $msg . " successful.</span><br />";
        }
    } else {
        echo "<strong>Error when: " . $msg . "</strong> using SQL: " . $sql . "<br />" . $conn->error;
    }
} // end of runQuery( )

/**
 * @param $tableName - The table with the record being searched for
 * @param $idField - the ID Field, (Usually {Table-Name}_ID)
 * @param $fieldName - The field you are searching by
 * @param $searchTerm -  What you are searching for
 *
 * @return mysqli_result
 */
function searchGetRowId ($tableName, $idField, $fieldName, $searchTerm) {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }

    $sql = "SELECT " . $idField . " FROM " . $tableName . " WHERE " . $fieldName . " LIKE " . $searchTerm;

    $result = $conn->query($sql);

    return $result;
}