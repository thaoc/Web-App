<?php
/**
 * Created by PhpStorm.
 * WebProject - query-resident.php
 * User: Cole
 * Email: sterlinn@csp.edu
 * Date: 11/1/2018
 * Time: 1:42 PM
 */
require_once getcwd()."/lib/func/db-connect.php";

function listResidents() {
    databaseConnection("damascus_way");
    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    if($conn->connect_error){
        die("Connection Failed! ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM select_resident_default";
    $result = $conn->query($sql);

    displayResult($result, $sql);

}

/**
 * @param $tableName - The table with the record being searched for
 * @param $idField - the ID Field, (Usually {Table-Name}_ID)
 * @param $fieldName - The field you are searching by
 * @param $searchTerm -  What you are searching for
 *
 * @return mysqli_result
 */
function GetRowValue ($tableName, $idField, $fieldName, $searchTerm) {
	databaseConnection("damascus_way");
	$conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
	if($conn->connect_error){
		die("Connection Failed! ". mysqli_connect_error());
	}

	$sql = "SELECT " . $idField . " FROM " . $tableName . " WHERE " . $fieldName . " LIKE " . $searchTerm;

	$result = $conn->query($sql);

	return $result;
}